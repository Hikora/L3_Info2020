<?php 
session_start();
if(isset($_SESSION['id'])){
 /*if(isset($_FILES['photo']) AND !empty($_FILES['f_photo']['name'])) {
   $tailleMax = 2097152;
   $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['f_photo']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['f_photo']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionValide)) {
         $chemin = "forum/photo/".$_SESSION['id']."-".$f_photo.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['f_photo']['tmp_name'], $chemin);
         if($resultat) {
            $joinphoto = $bdd->query('INSERT INTO f_reponse(f_photo) VALUES (?) WHERE f_pid=?');
            $joinphoto->execute(array($_SESSION['id']."-".$f_photo.".".$extensionUpload , $_SESSION['id']));
            header('Location:forum.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
   */
   if(isset($_GET['fa_id']) AND !empty($_GET['fa_id'])) {
   $getfid = intval($_GET['fa_id']);
  /* NB_F_POST */
   $bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
if(isset($_SESSION['id'])) {
  /* $bdd1 = new PDO('mysql:host=localhost;dbname=compte', 'root', '');
   $reqtuser = $bdd1->prepare("SELECT * FROM user_compte WHERE id = ?");
   $reqtuser->execute(array($_SESSION['id']));
   $userinfo = $reqtuser->fetch();
   */
    if(isset($_POST['submit_post'])) {
      
      if(isset($_POST['fc_post']) AND !empty($_POST['fc_post'])) {
         $fc_post = htmlspecialchars($_POST['fc_post']);
         $ft_post = htmlspecialchars($_POST['ft_post']);
        /* $date =;*/
            $instforum = $bdd->prepare("INSERT INTO f_post ( fa_id, f_titre ,f_sujet, f_pseudo, f_date, nb_post, f_contenu) VALUES (?,?,?,?,NOW(),?,?)");
            $instforum->execute(array($get_fid,$ft_post,$ $_SESSION['pseudo'],$nb_fpost, $fcpost));
            $f_msg = "<span style='color:rgb(80,80,80)'>Votre sujet a bien été posté !</span>";
            
         }
       else {
         $f_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
}
else
{
    $f_msg = "<span style='color:white'>Connectez vous pour pouvoir poster votre sujet </span>";
}
   $fsujet = $bdd->prepare('SELECT fa_id , f_titre, f_sujet, f_pseudo, f_date,nb_post, f_contenu, DAY(f_date) AS day, MONTH(f_date) AS month, YEAR(f_date) AS year, HOUR(f_date) AS hour, MINUTE(f_date) AS minute, SECOND(f_date) AS seconde, f_contenu FROM f_post WHERE fa_id = ? ORDER BY nb_post DESC');
   $f_sujet->execute(array($get_fid));

?>
<!DOCTYPE HTML>
<html> <!-- lang="fr" -->
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="forum.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
        <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/411EF5FC-D149-1C41-8497-9DFF1E04D1C2/main.js" charset="UTF-8"></script> -->
    </head>
    <header>

              <?php include("header_bar.php"); ?>
              <?php include("profil_bar.php"); ?>
              <?php include("jeux-top_bar.php"); ?>
    </header>
    <body>
      <div class="video_fond2">
        <video autoplay loop muted autobuffer> 
                <source src="forum_backg.mp4" type="video/mp4">
                Mettez à jour votre navigateur
          </video>
          </div>
    <table id="forum">
      <tr>
        <td>PSEUDO</td>
        <td><a href="forum/titre.php">TITRE</a></td>
        <td>$nb_reponse</td>
        <td>date_reponse </td> <!-- date de chaque commentaire repértorie sur page du titre puis la premiere de id decroissant -->
        <!-- if nb_reponse >6  -->


<br />       
<a href="<?php if(!isset($_SESSION['id'])){echo"connexion.php";} ?>"><?php if(!isset($_SESSION['id'])){echo "Connectez vous"; } ?></a>
<meta charset="utf-8" />

<html>

   <header>
        <link rel="stylesheet" href="commentaire.css" />
  </header>
  <div class="commentary">
  <body >
    <br />
<form method="POST" action="forum.php?<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id']."&amp;";}?>fa_id=1">
      <ul>
      
        <li><select name="sujet" id="sujet" class="f_sujet" required>
                      <option selected="<?php if(isset($f_sujet)){echo "selected";}?>"><?php if(isset($f_sujet)){echo$f_sujet;}else{echo"Selectionnez votre Sujet";}?></option> <!-- <option selected="<?php /*if(isset($pays)){echo "selected";}?>" disabled="<?php if(!isset($pays)){echo"disabled";}?>"><?php if(isset($pays)){echo$pays;}else{echo"Selectionnez votre Pays";}*/?></option>--> <!-- ou appliquer même méthode que $erreur -->
                      <optgroup label="MMORPG">
                      <option value="wow">WOW</option>
                      <option value="teso">TESO</option>
                      <option value="warframe">Warframe</option>
                      <option value="atlas">ATLAS</option>
                      <option value="ark">ARK</option>
                     </optgroup>
                     <optgroup label="FPS">
                      <option value="csgo">CSGO</option>
                      <option value="ow">OW</option>
                      <option value="cod">COD</option>
                      <option value="bf">BF</option>
                    </optgroup>

                     <optgroup label="BR">
                     <option value="fornite">FORNITE</option>
                     <option value="pubg">PUBG</option>
                     <option value="battlerite">BattelRite</option>
                     <option value="h1z1">H1Z1</option>
                     </optgroup>
                      <optgroup label="MOBA">
                     <option value="lol">LOL</option>
                     <option value="hots">HOTS</option>
                     </optgroup>

               <optgroup label="Autres">
               <option value="politique">Politique</option>
               <option value="culture">Culture</option>
               <option value="debat">Debat</option>
           </optgroup>
       </select>
         <li><textarea name="titre" placeholder="Le titre de votre sujet..." rows="1" cols="90 " class="fs_titre" maxlength="100"></textarea></li> 
         <li><textarea name="contenu" placeholder="Le contenu de votre sujet" rows="8" cols="90" class="f_contenu"></textarea></li>
         <br />
         <li> <input type="submit" value="Poster mon sujet " name="submit_sujet" class="classe_input"></input>
        </li>
         <li><input type="file" name="f_photo"></li>
  

   <?php if(isset($f_msg)) { echo $f_msg; } ?> 

</form>
<br />
<h2  style="font-size:25px; color:rgb(240,240,240);text-align:center; text-decoration:underline;">VOX POPULI: </h2>
<table>
<?php while($f = $f_sujet->fetch()) { ?>
      <a href='".php?".echo$f['f_id'].".php"if(isset($_SESSION['if'])){echo"?id=".$_SESSION['id']; ?>'>
            <tr>"
        <td><img src="forum/sujet/<?php echo$f['f_sujet']; ?>"></td>
        <td><?php echo$f['f_titre'];?></td>
        <td><?php echo$f['f_pseudo'];?></td>
        <td><?php echo$f['nb_rep'];?></td>
        <td><?php echo$f['f_date']; ?></td>   
      </tr>
    </a>


<?php  } ?>
</table>
<?php
}

?>
</body>
</html>
</div>
