<?php
/* connection a la base de données */
$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');

if(isset($_POST['forminscription'])) /* si var existe on peu continuer */
   { 
      /* empêche l'insertion de code html ...  dans les barres de textes grâce a la transformation des chevrons */

   $prenom = htmlspecialchars($_POST['prenom']); 
   $nom = htmlspecialchars($_POST['nom']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);

   /* hachage des codes pour les sécurisés même si la base de données est craké */

   $mdp = sha1($_POST['mdp']); 
   $mdp2 = sha1($_POST['mdp2']);

 /* vérification des variables != vide */

   if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) 
   {
      $pseudolength = strlen($pseudo); /* compte caractères pseudo*/

      if($pseudolength <= 25) /* vérification caractères inferieur a 25*/
      {
         if($mail == $mail2) /* puis le check mail */
         {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) /* filtration : vérification de la  validité email par la fonction :FILTER_VALIDATE_EMAIL */
            {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount(); /* compte le nombre de colonne prise en partant de 0 */

               if($mailexist == 0) /* vérification que l'email n'existe pas deja dans la base données  si 1 ou plus alors ca signifie qu'il y aura 2 mail ou plus */
               {
                  $idempseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
               $idempseudo->execute(array($pseudo));
               $pseudoexiste = $idempseudo->rowCount();

               if($pseudoexiste == 0) /* pareil pour pseudo */
               {

                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, avatar) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($mail, $pseudo, $mdp "user-icon.png"));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     /* $_SESSION['creacompte']= "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     header('Location: refont.php');*/

                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
                  }
                     else
                  {
                    $erreur = "Pseudo déjà utilisé" ;
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
