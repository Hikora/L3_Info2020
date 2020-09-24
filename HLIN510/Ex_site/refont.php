<!-- MAIN PAGE : LES LIENS SERONT COMPLETES AU FUR A MESURE DE L'AVANCEMENT DU PROJET VEUILLEZ LAISSER LES LIENS TEL QUEL -->
<?php 
session_start();
/*
if(isset($_GET['id']) AND $_GET['id'] > 0) 
{
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
}*//*
if(isset($_GET['id']))
{
  if( $_GET['id'] ==  $_SESSION['id']) 
     {
      header('Location: refont.php?id='.$_SESSION['id']);

     }
else
{
   header('Location: troll.php');
}
}
else
{
  header('Location:refont.php');
}

if (isset($_SESSION['pseudo']) && isset($_SESSION['mail']) && isset($_SESSION['color']))
 {
 }*/
?>
<!DOCTYPE HTML>
<html> <!-- lang="fr" -->
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="refont.css" />
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
      <div class="video_fond">
        <video autoplay loop muted autobuffer> 
                <source src="refont_backg.mp4" type="video/mp4">
                Mettez à jour votre navigateur
          </video>
          </div>
     <!-- <div id="profil_bar" class="P_bar">
      <ul>
        <li><a href="edition.php">Edition </a></li>
         <li><img src="$avatar" ></li>
         <li><p>Pseudo : <?php /*echo= "$Pseudo" */?></p></li>
         <li><?php /* echo= "$mail" */?></li>
         <li><?php/* echo="$description" */ ?></li>
      </ul>
</div>
-->
        <div id="evenement">
         <!-- <font color="<?php/* echo $_SESSION['color']; */?>"><h6>JERIS</h6></font>  -->
        <ul>
        <li class="article">
            <picture>
                <a href="Zevent2018.jpg"><img src="Zevent2018_mini.jpg" class="imageflottante" alt="Zevent-2018" title="cliquez pour agrandir"></a>
            </picture>
            <aside >

                <ul class="puce">
                     <li ><a href="Zevent-2018.php?<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id']."&amp;";}?>a_id=1"><h2>Ces G@merZ au grand coeur:</h2>
                         <p>Du vendredi 9 novembre au soir du dimanche 11 novembre c'est tenu l'un des plus grands événements e-sportif caritatif de France pour soutenir la fondation Médecin sans frontière . Cet événement organisé par Adrien Nougaret (dit Zerator) et Alex Dash à permit de lever des fonds considérable pour Medecin sans frontière . En effet ca serait plus de 1 Millions d'euros qui serait reverser directement à l'association .</p></a></li> 

                </ul>
         </aside>
        </li>
        <li class="article">
            <picture>
                <a href="RDR.jpg"><img src="RDR_mini.jpg" class="imageflottante" alt="Read dead Redemption" title="cliquez pour agrandir"></a>
            </picture>
            <aside>
                <ul class="puce">
                     <li ><a href="RedDeadRedemption.php<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id'];}?>&amp;a_id=2"><h2>Red Dead Redemption :test complet par Risitas</h2>
                         <p>"Les cactus sont d'un réalisme incroyable" tel sont les propos de risitas l'un des plus grand testeur de jeu-vidéo.Rockstar était connu pour son souci du détail mais rien de comparable à jamais était fait dans l'histoire du jeu vidéo.</p></a></li> 
                </ul>
            </aside>
            
        </li>
    
        <li class="article">
            <picture>
                <a href="Hitman2.jpg"><img src="Hitman2_mini.jpg" class="imageflottante" alt="Hitman2" title="cliquez pour agrandir"></a>
            </picture>
            <aside>
                <ul class="puce">
                     <li><a href="Hitman2.php?<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id'];}?>&amp;a_id=3"><h2>Hitman 2: Ou comment faire pleuvoir les OP par IO</h2>
                        <p>Dans l'histoire du jeu-vidéo nous n'avons vue de campgane publicitaire aussi agressive que celle entreprise par la Warner avec la sortie de Hitman2 ,tous les influenceurs sont solicités.Des contenus exclusifs sont vendu de paire avec la précomande du jeu ,goodies et produits dérivés mal fait sont de rigueur .</p></a></li> 
                </ul>
            </aside> 
      </li>
    </ul>
      </div>
    </body>
    <footer>
      <?php include("footer.php"); ?>
 </footer>
</html>