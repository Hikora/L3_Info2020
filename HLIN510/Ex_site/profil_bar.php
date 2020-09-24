<?php


$bdd = new PDO('mysql:host=127.0.0.1;dbname=compte', 'root', '');
/*
if(isset($_GET['id']))
{
  if( $_GET['id'] ==  $_SESSION['id']) 
     { 


     }
else
{
   header('Location: troll.php');
}
}
*/
/* changer pour userinfo */


?>
<html>
   <header>
   <meta charset="utf-8" />
        <link rel="stylesheet" href="profil_bar.css" />
  </header>
  <body>
<div id="hide">
<div id="profil_bar" class="barre">
      <ul>
      
         <li><a href="#hide" class="hiding"><font color="<?php if(isset($_SESSION['color'])){echo$_SESSION['color'];}else{echo"pink";}?>"><span class="titre_profil">Profil de <?php if(isset($_SESSION['pseudo'])) {echo$_SESSION['pseudo']; }else{echo "Dylan";}?></span></font><img class="arrow_w" src="play-white.png"><img class="hide_arrow" src="play-grey.png"></a></li>
         
         <br /> 
          <li><a href="<?php if(isset($_SESSION['id'])){echo"deconnexion.php";}else{echo"connexion.php";}?>"><?php if(isset($_SESSION['id'])){echo"Se deconnecter";}else{echo"Connectez-vous";}?></a></li>
         <br />
         <br /> 
          <li class="lien_photoP" style= "background-color:<?php if(isset($_SESSION['color'])){ echo $_SESSION['color'];}else{echo"pink";} ?>; border-radius: 20px;"alt="Profil" title="<?php if(isset($_SESSION['id'])){echo"Cliquez pour modifier votre photo de Profil";}else{echo"Miroir";}?>"><a  href="<?php if(isset($_SESSION['id'])){echo"edition.php?id=".$_SESSION['id'];}else{echo"connexion.php";}?>"><img src="<?php if(isset($_SESSION['avatar'])){ echo "compte/avatars/".$_SESSION['avatar'] ;}else{echo"compte/avatars/tobey3.jpg";}?>"style="padding-top: 5px; padding-bottom: 1px;" ></a></li>
          <br />
         <br /> 
        <li style="font-size:17px;"><B>Pseudo : </B><?php  if(isset($_SESSION['pseudo'])){ echo $_SESSION['pseudo'];}else{echo"Tobey Maguire";} ?> </li>

         <br />
         <li style="font-size:17px;"><B>Statut : </B><?php if(isset($_SESSION['droit'])){if($_SESSION['droit']==0){echo" :Paysan ";}if($_SESSION['droit']==1){echo" :Chevalier ";}}else{echo"Bouffon";} ?></li>
         <br /> 
         <li style="font-size:17px;"><B>Mail : </B><?php if(isset($_SESSION['mail'])){ echo $_SESSION['mail']; }else{echo"D4rkSasuke@gmail.com";}?></li>
         <br />
         <br />
         
           <B style="font-size:20px;">Description:</B>
            <li><p class="Description" style="border: 2px groove grey;width: 180px; height:150px; padding-top:50%;"><?php if(isset($_SESSION['description'])){echo$_SESSION['description'];}else{echo"Tu n'es pas le bienvenue";}?></p>
          </li>
          <li><a href="<?php if(isset($_SESSION['id'])){echo"edition.php";}?>"><?php if(isset($_SESSION['id'])){echo"Edition";}?></a></li>

    </ul>

</div>
</div>
</body>
</html>