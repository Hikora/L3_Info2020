<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] ==  $_SESSION['id']) 
{
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}
else
{
  header('Location: troll.php');
}
?>
<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8" />
        <link rel="stylesheet" href="profil.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
        <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/411EF5FC-D149-1C41-8497-9DFF1E04D1C2/main.js" charset="UTF-8"></script> -->
   </head>
 
   <body>
      <div align="center">
        <font color="<?php echo$userinfo['color'];?>"><h2>Profil de <?php echo $userinfo['pseudo']; ?></h2></font>
         <br /><br />
          <img src="membres/avatars/<?php if(isset($userinfo['avatar'])){ echo $userinfo['avatar'];}?>" ></br></br>
         Pseudo = <?php echo $userinfo['pseudo']; ?> 

         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="edition.php?id=<?php echo$_SESSION['id']; ?>">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <a href="refont.php?id=<?php echo$_SESSION['id']; ?>">acceuil</a>

         <?php
         }
         ?>
      </div>
   </body>
</html>
