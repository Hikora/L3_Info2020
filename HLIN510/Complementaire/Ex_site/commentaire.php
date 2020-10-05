<br />       
<a href="<?php if(!isset($_SESSION['id'])){echo"connexion.php";} ?>"><?php if(!isset($_SESSION['id'])){echo "Connectez vous"; } ?></a>
<meta charset="utf-8" />
<?php

if(isset($_GET['a_id']) AND !empty($_GET['a_id'])) {
   
   $nb_com = 0;
   $bdd = new PDO('mysql:host=localhost;dbname=article_commentaire', 'root', '');
if(isset($_SESSION['id'])) {
  /* $bdd1 = new PDO('mysql:host=localhost;dbname=compte', 'root', '');
   $reqtuser = $bdd1->prepare("SELECT * FROM user_compte WHERE id = ?");
   $reqtuser->execute(array($_SESSION['id']));
   $userinfo = $reqtuser->fetch();
   */
    if(isset($_POST['submit_commentaire'])) {
      
      if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
         $commentaire = htmlspecialchars($_POST['commentaire']);
        /* $date =;*/
            $instcoment = $bdd->prepare("INSERT INTO commentaires ( c_pseudo, c_avatar, commentaire, c_color, c_droit, a_id, c_date) VALUES (?,?,?,?,?,?,NOW())");
            $instcoment->execute(array( $_SESSION['pseudo'], $_SESSION['avatar'], $commentaire, $_SESSION['color'], $_SESSION['droit'], $getaid));
            $c_msg = "<span style='color:rgb(80,80,80)'>Votre commentaire a bien été posté !</span>";
            
         }
       else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
}
else
{
    $c_msg = "<span style='color:white'>Connectez vous pour pouvoir poster votre message </span>";
}
   $commentaires = $bdd->prepare('SELECT c_pseudo, c_avatar, commentaire, c_color, c_droit, a_id, DAY(c_date) AS day, MONTH(c_date) AS month, YEAR(c_date) AS year, HOUR(c_date) AS hour, MINUTE(c_date) AS minute, SECOND(c_date) AS seconde FROM commentaires WHERE a_id = ? ORDER BY c_id DESC');
   $commentaires->execute(array($getaid));

?>

<html>

   <header>
        <link rel="stylesheet" href="commentaire.css" />
  </header>
  <div class="commentary">
  <body >
    <br />
<form method="POST" action="Zevent-2018.php?<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id']."&amp;";}?>a_id=1#commentary">
   <table class="poster">
   <tr>
      <td>
      <ul>
      <li style="padding: 8px; box-shadow:2px 2px 2px 2px  rgba(50,50,50,0.4);  border-radius:20px; background-color:<?php if(isset($_SESSION['color'])){ echo $_SESSION['color'];}else{echo"rgb(128,128,255)";} ?>;"><img src="<?php if(isset($_SESSION['avatar'])){ echo "compte/avatars/".$_SESSION['avatar'] ;}else{echo"compte/avatars/user-icon.png";}?>"  alt="Profil" title="<?php if(isset($_SESSION['avatar'])){ echo"Votre photo de Profil";}else{echo"";} ?>"  ></li>
         <br />

         <li style="font-size:17px;"><B>Pseudo : </B><?php  if(isset($_SESSION['pseudo'])){ echo $_SESSION['pseudo'];}else{echo"";} ?> </li>

         <br />
         <li style="font-size:17px;"><B>Statut : </B><?php if(isset($_SESSION['droit'])){if($_SESSION['droit']==0){echo" Paysan ";}if($_SESSION['droit']==1){echo" :Chevalier ";}}else{echo"";} ?></li>
      </ul>
   </td>

   <td>
      <br />
   <textarea name="commentaire" placeholder="Votre Commentaire..." rows="7" cols="90 " style="padding:10px;"class="c_textarea"></textarea>  
</td>
</tr>
<tr></tr>
<tr>
   <td>
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire" class="c_input"></input>
</td>
<td>
   <?php if(isset($c_msg)) { echo $c_msg; } ?> 
</td>
</tr>
</form>
</table>
<br />
<h2  style="font-size:25px; color:rgb(240,240,240);text-align:center; text-decoration:underline;">Commentaires: </h2>
<table id="<?php if($nb_com>=3){echo"plus";} ?>">
<?php while($c = $commentaires->fetch()) { ?>
   
      <tr>
      </tr>
      <tr>
        <td>
          <ul>
            <li><img class="plus_arrow"src="arrow-grey-up.png"></li>
            <li><img class="moins_arrow"src="arrow-grey-down.png"></li>
            </td>
    <td>     
   <ul >
      
      <li style="padding: 8px; box-shadow:2px 2px 2px 2px rgba(60,60,60,0.4);  border-radius:20px; background-color:<?php echo $c['c_color']; ?>;" ><img src="<?php echo"compte/avatars/".$c['c_avatar']; ?>" alt="Profil de <?php echo$c['c_pseudo']; ?>" title="Votre photo de Profil"  ></li>
         <br />

         <li style="font-size:17px;"><B>Pseudo : </B><?php echo$c['c_pseudo'];?> </li>

         <br />
         <li style="font-size:17px;"><B>Statut : </B><?php if($c['c_droit']==0){echo" Paysan ";}if($c['c_droit']==1){echo"Chevalier ";} ?></li>
      </ul>
      </td>

   <td>
 <?php
 $years=$co['year']-$c['year'];
$months=$co['month']-$c['month'];
 $days=$co['day']-$c['day'];
  $hours=$co['hour']-$c['hour'];
 $minutes=$co['minute']-$c['minute'];
 if($years!=0){if($years>1){echo"Il y à".$years." ans";}else{echo"Il y à plus d'un an";}}
 else if($months!=0){if($months>1){echo"Il y à ".$months." mois";}else{echo"Il y à plus d'un moi";}}
 else if($days!=0){if($days>1){echo"Il y à ".$days." jours";}else{echo"Il y à quelques jours";}}
 else if($hours!=0){if($hours>1){echo"Il y à ".$hours." heures";}else{echo"Il y à plus d'une heure";}}
 else if($minutes!=0){if($minutes>1){echo"Il y à ".$minutes." minutes";}else{echo"Il y à quelques minutes";}}
 /*if(date_sub($c['year'], INTERVAL $co['year'] YEAR)!=0)){echo"Il y à".date_sub($c['year'], INTERVAL $co['year'] YEAR)."ans";}
 else if(date_sub($c['month'], INTERVAL $co['month'] MONTH))!=0){echo"Il y à".date_sub($c['month'], INTERVAL $co['month'] MONTH)."mois";}
 else if(date_sub($c['day'], INTERVAL $co['day'] DAY))!=0){echo"Il y à".date_sub($c['day'], INTERVAL $co['day'] DAY)."jours";}
 else if(date_sub($c['minute'], INTERVAL $co['minute'] MINUTE))!=0){echo"Il y à".date_sub($c['minute'], INTERVAL $co['minute'] MINUTE)."minutes";}
/*
if($c['month']==1){echo" Janvier ";} if($c['month']==2){echo" Février ";} if($c['month']==3){echo" Mars ";} if($c['month']==4){echo" Avril ";} if($c['month']==5){echo" Mai ";} if($c['month']==6){echo" Juin ";} if($c['month']==7){echo" Juillet";} if($c['month']==8){echo" Aout ";}if($c['month']==9){echo" Septembre ";} if($c['month']==10){echo" Octobre ";} if($c['month']==11){echo" Novembre ";} if($c['month']==12){echo" Décembre ";}
*/
   ?>
<?php /* echo $c['year']." à ".$c['hour'].":".$c['minute'];*/?>
 <p class="co_text" align="left" style="padding:10px;"><br /><?php echo$c['commentaire'] ?></p>
</td>
</tr>
<tr>
  <td></td>
  <td>
<a href="#plus" class="affiche"><?php if($nb_com==3){echo"Afficher Plus";} ?></a>
</td>
</tr>
<?php $nb_com+=1; } ?>
</table>
<?php
}

?>
</body>
</html>
</div>
