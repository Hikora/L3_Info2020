<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=compte', 'root', '');


if(isset($_POST['formconnexion'])) 
{
   $comail = htmlspecialchars($_POST['co_mail']);
   $comdp = sha1($_POST['co_mdp']);

   if(!empty($comail) AND !empty($comdp)) 
   {
      $reqtuser = $bdd->prepare("SELECT * FROM user_compte WHERE mail = ? AND pass = ?");
      $reqtuser->execute(array($comail, $comdp));
      $userexiste = $reqtuser->rowCount();

      if($userexiste == 1)
       {
         $userinfo = $reqtuser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['color'] = $userinfo['color'];
         $_SESSION['daten'] = $userinfo['daten'];
         $_SESSION['avatar'] = $userinfo['avatar'];
         $_SESSION['description'] = $userinfo['description'];
         $_SESSION['droit'] = $userinfo['droit'];
         header("Location: refont.php?id=".$_SESSION['id']/*&color=.$_SESSION['color] rajouter */);
      } 
      else
       {
         $erreur = "Mauvais mail ou mot de passe !";
      }

   }
    else 
      {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE HTML>
<html>
   <head>
     <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="connexion.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
        <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/411EF5FC-D149-1C41-8497-9DFF1E04D1C2/main.js" charset="UTF-8"></script> -->
    </head>
    
   <body>
      <div align="center" id="connexion">
         <h2>Connexion</h2>
         <br />
         <?php
         if(isset($erreur)) {
            echo '<font color="white">'.$erreur."</font>";
         }
         ?>
         <br /><br />
         <form method="POST" action="">
          <table>
            <tr><td></td></tr>
             <tr><td></td></tr>
        <tr>
          <td>
            <input type="email" name="co_mail" placeholder="Mail" />
          </td><td>
            <input type="password" name="co_mdp" placeholder="Mot de passe" />
          </td>
            <td></td>
            <td>
      
            <input class="connecter" type="submit" name="formconnexion" value="Se connecter" />
          </td>
        </tr>
        </table>
            <br />
           
         </form>

         
        
         <br />

          <a href="formulaire_inscription.php">Vous n'avez pas de compte ? Créer un compte.</a>
        
         <br />

       
         <br />
      
        
         <a href="refont.php" class="acceuil">Retour à l'acceuil</a>
         
         
      </div>
   </body>
</html>