<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=compte', 'root', '');

if(isset($_SESSION['id'])) {
   $reqtuser = $bdd->prepare("SELECT * FROM user_compte WHERE id = ?");
   $reqtuser->execute(array($_SESSION['id']));
   $userinfo = $reqtuser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $inserpseudo = $bdd->prepare("UPDATE user_compte SET pseudo = ? WHERE id = ?");
      $inserpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: refont.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insermail = $bdd->prepare("UPDATE user_compte SET mail = ? WHERE id = ?");
      $insermail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
    if(isset($_POST['newcolor']) AND !empty($_POST['newcolor']) AND $_POST['newcolor'] != $userinfo['color']) {
      $newcolor = $_POST['newcolor'];
      $insercolor = $bdd->prepare("UPDATE user_compte SET color = ? WHERE id = ?");
      $insercolor->execute(array($newcolor, $_SESSION['id']));
      header('Location: refont.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newdescription']) AND !empty($_POST['newdescription']) AND $_POST['newdescription'] != $userinfo['description']) {
      $newdescription= htmlspecialchars($_POST['newdescription']);
      $inserdescription = $bdd->prepare("UPDATE user_compte SET description = ? WHERE id = ?");
      $inserdescription->execute(array($newdescription, $_SESSION['id']));
      header('Location: refont.php?id='.$_SESSION['id']);
   }

   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insermdp = $bdd->prepare("UPDATE user_compte SET pass = ? WHERE id = ?");
         $insermdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: refont.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mot de passe ne correspondent pas !";
      }
   }
      if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionValide)) {
         $chemin = "compte/avatars/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE user_compte SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location:refont.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
   }
   
?>
<!DOCTYPE HTML>
<!-- Faire un popup ou alert pour informer que les maj du compte seront sauvegarder seulement après la déconnexion -->
<html>
<head>
  <meta charset="utf-8" />
        <link rel="stylesheet" href="edition.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
        <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/411EF5FC-D149-1C41-8497-9DFF1E04D1C2/main.js" charset="UTF-8"></script> -->
    </head>
   
   <body>
      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="left">
            <a href="refont.php">Retour à l'acceuil </a>
            <br /><br /><br />
               <br />
            <form method="POST" action="" enctype="multipart/form-data">
               
               <table>
                  <tr>
                   <input type="submit" value="Mettre à jour mon profil" class="valid" />
                   <td></td>
                   </tr>
                 
                  <tr>
                  <td align="right">
               <label>Pseudo : </label>
               </td><td>
               <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $userinfo['pseudo']; ?>" /><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label>Mail : </label>
               </td><td>
               <input type="text" name="newmail" placeholder="Mail" value="<?php echo $userinfo['mail']; ?>" /><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label >Couleur : </label>
               </td><td>
               <input type="color" name="newcolor" value="<?php echo $userinfo['color']; ?>"/><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label >Avatar : </label>
               </td><td>
               <input type="file" name="avatar" value="<?php echo $userinfo['avatar']; ?>"><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label>Mot de passe : </label>
               </td><td>
               <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label>Confirmation - mot de passe : </label>
               </td><td>
               <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
            </td></tr>
            <tr>
                  <td align="right">
               <label for="newdescription">Description : </label><br />
            </td><td>
               <textarea name="newdescription" placeholder="Votre Description..." id="newdescription" rows="12" cols="45"><?php if(isset($userinfo)){echo $userinfo['description'];} ?></textarea>    
               </td>
            </tr> 
            <tr><td></td></tr> <tr><td></td></tr>

            </table>
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>

