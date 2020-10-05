<?php

$bdd = new PDO('mysql:host=localhost;dbname=compte', 'root', '');

if(isset($_POST['inscription_formulaire'])) 
   { 
      
   $pays = htmlspecialchars($_POST['pays']);
   $prenom = htmlspecialchars($_POST['prenom']); 
   $color = $_POST['color'];
   $daten = date($_POST['date_naissance']);
   $nom = htmlspecialchars($_POST['nom']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $description =htmlspecialchars($_POST['pseudo']);
   $strcheck= htmlspecialchars("Selectionnez votre Pays");
   

  

   $mdp = sha1($_POST['mdp']); 
   $mdp2 = sha1($_POST['mdp2']);

 

   if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['color']) AND !empty($_POST['date_naissance']) AND !empty($_POST['pays']) AND ($_POST['pays']!=$strcheck)) 
   {
      $pseudosize = strlen($pseudo); /* compte caractères pseudo*/
     
      if($pseudosize <= 25) /* vérification caractères inferieur a 25*/
      {
         
         if($mail == $mail2) 
         {
          
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) /* filtration : vérification de la  validité email par la fonction :FILTER_VALIDATE_EMAIL */
            {
               
               $reqtdifmail = $bdd->prepare("SELECT * FROM user_compte WHERE mail = ?");
               $reqtdifmail->execute(array($mail));
               $mailexiste = $reqtdifmail->rowCount(); /* compte le nombre de colonne prise en partant de 0 */

               if($mailexiste == 0) /* vérification que l'email n'existe pas deja dans la base données  si 1 ou plus alors ca signifie qu'il y aura 2 mail ou plus */
               {
                  
               $reqtdifpseudo = $bdd->prepare("SELECT * FROM user_compte WHERE pseudo = ?");
               $reqtdifpseudo->execute(array($pseudo));
               $pseudoexiste = $reqtdifpseudo->rowCount();

               if($pseudoexiste == 0) /* pareil pour pseudo */
               {
                    
                  if($mdp == $mdp2) {
                   

                     $insermbr = $bdd->prepare('INSERT INTO user_compte(pseudo, mail, pass, color, daten, pays, description, droit, avatar ) VALUES(?, ?, ?, ?, ?, ?, ?, 0,"user-icon.png")');
                     $insermbr->execute(array($pseudo, $mail, $mdp, $color, $daten, $pays , $description)); 
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     /* $_SESSION['creacompte']= "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     header('Location: refont.php');*/

                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }

                  }else
                  {
                    $erreur = "Pseudo déjà utilisé" ;
                  }

               } else {
                  $erreur = "Adresse mail déjà utilisée ";
               }

            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }

         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 25 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8" />
        <link rel="stylesheet" href="formulaire_inscription.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
       
   </head>

    
   <body>
      <div align="center">
         <h2>Créer un compte</h2>
         <br /><br />

         <form method="POST" action="">
            <table>
              <tr>
                <td align="right">
                  <label for="pays">Dans quel pays habitez-vous</label>
                </td>
                <td>
                <select name="pays" id="pays" class="case3" required>
                      <option selected="<?php if(isset($pays)){echo "selected";}?>"><?php if(isset($pays)){echo$pays;}else{echo"Selectionnez votre Pays";}?></option> <!-- <option selected="<?php /*if(isset($pays)){echo "selected";}?>" disabled="<?php if(!isset($pays)){echo"disabled";}?>"><?php if(isset($pays)){echo$pays;}else{echo"Selectionnez votre Pays";}*/?></option>--> <!-- ou appliquer même méthode que $erreur -->
                      <optgroup label="Europe de l'Ouest">
                      <option value="France">France</option>
                      <option value="Royaume-uni">Royaume-uni</option>
                      <option value="Espagne">Espagne</option>
                      <option value="Italie">Italie</option>
                      <option value="Allemagne">Allemagne</option>
                     </optgroup>
                     <optgroup label="Europe de l'Est">
                      <option value="Russie">Russie</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="Bielorussie">Biélorussie</option>
                    </optgroup>

                     <optgroup label="Amérique du Nord">
                     <option value="Etats-unis">Etats-Unis</option>
                     <option value="Canada">Canada</option>
                     </optgroup>
                      <optgroup label="Amérique du Sud">
                     <option value="Bresil">Brésil</option>
                     <option value="Argentine">Argentine</option>
                     </optgroup>

               <optgroup label="Asie">
               <option value="Chine">Chine</option>
               <option value="Japon">Japon</option>
               <option value="Inde">Inde</option>
           </optgroup>
       </select>
   </td>
 </tr>

               <tr>
                  <td align="right">
                      <label for="prenom">Prénom :</label>
                  </td>
                  <td >
                      <input type="text" class="case2"  placeholder="Nicolas" id="prenom"  name="prenom" value="<?php if(isset($prenom)) { echo $prenom; }?>" />
                      <label for="nom">Nom :</label>
                   <input type="text"  class="case2" placeholder="Supiot"  id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; }   ?>"/>
                    </td></tr>
               <tr>
                  <td align="right">

                      <label for="date_naissance">Votre date de naissance :</label>
                   </td>
                  <td >
                  <input type="date" class="case" name="date_naissance" value="<?php if(isset($daten)) { echo $daten; }?>" id="date_naissance" required />
                   </td>
              </tr>
               <tr>
                  <td align="right">
                      <label for="color">Choisissez la couleur de votre avatar :</label>
                  </td>
                  <td >
                      <input type="color" class="case"  name="color" id="color" value="<?php if(isset($color)) { echo $color; }?>" required />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" class="case"  placeholder="Michel Dumas" id="pseudo" name="pseudo"  value="<?php if(isset($pseudo)) { echo $pseudo; } /* conserve valeur même si erreur déclenché */ ?>" /> 
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Votre boîte mail :</label>
                  </td>
                  <td>
                     <input type="email" class="case"  placeholder="risitas@gmail.com" id="mail" name="mail"  value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" class="case"  placeholder="Confirmez votre mail" id="mail2" name="mail2"  value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" class="case"  placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" class="case"  placeholder="Confirmez votre mdp" id="mdp2" name="mdp2"  />
                  </td>
               </tr>
               <tr><td></td></tr>
               <tr>
                   <td align="left">
                     <a href="refont.php" ><p> Retour à l'acceuil</p></a>
                   </td>
                  <td align="center">
                     <input type="submit"class="valide" name="inscription_formulaire" value="Je m'inscris" />

                  </td>
                  
               </tr>
            </table>
         </form>
         <br />
        
         <?php
         if(isset($erreur)) 
         {
            echo '<font color="red">'.$erreur."</font>"; 
         }
         ?>
      </div>
   </body>
</html>