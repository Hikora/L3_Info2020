<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=article;charset=utf8','root','');
if(isset($_GET['a_id']) AND $_GET['a_id']==1) {
   $getaid = intval($_GET['a_id']);
   $reqtarticle = $bdd->prepare('SELECT * FROM articles WHERE a_id = ?');
   $reqtarticle->execute(array($getaid));
   $infoarticle = $reqtarticle->fetch();
}
else
{
   header('Location: troll.php');
}
/*
  if(isset($_GET['qcm']) AND $_GET['qcm']>0)
{
    $getQcm = intval($_GET['qcm']);
    $reqtQcm = $bdd->prepare('SELECT * FROM Quizz WHERE id = ?');
    $reqtQcm ->execute(array($getQcm));
    $Qcminfo = $reqtQcm->fetch();
else
{
   header('Location: troll.php');
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Zevent2018.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title>
    </head>
    <header >
        <?php include("feuille_de_co.php"); ?>
       <?php include("header_bar.php");?>
      <?php include("profil_bar.php"); ?>
      <?php include("jeux-top_bar.php"); ?>
      <div class="articlev_fond">
        <video autoplay loop muted autobuffer> 
                <source src="article_backg.mp4" type="video/mp4">
                Mettez à jour votre navigateur
          </video>
          </div>
    </header>
    <body >
<?php include("chat.php") ?>
        <section id="corps">
        <div id="head_page">
        <h1>Zevent2018:Un événement qui a marqué les esprits</h1>
        <p>Mis à jour<time datetime="2018-12-14T20:15:00"> le 14 Décembre 2018 à 20 heure 15</time> par: <a href="profil.php">JRB</a></p>
       
         <ul class="hreseau">
                 <li class="hsuivre"><a href="https://fr-fr.facebook.com"><img src="Facebook.png"  alt="Facebook" title="Facebook"></a></li>
                 <li class="hsuivre"><a href="https://www.reddit.com/"><img src="reddit-icon.png"  alt="Reddit" title="Reddit"></a></li>
                 <li class="hsuivre"><a href="https://twitter.com/?lang=fr"><img src="Twitter.png" alt="Twitter" title="Twitter"></a></li>
                 <li class="hsuivre"><a href="https://plus.google.com/"><img src="google+.png" alt="Google+" title="Google+"></a></li>
                 <li class="hsuivre"><a href="https://www.instagram.com/?hl=fr"><img src="Instagram.png" alt="Instagram" title="Instagram"></a></li>
                 <li class="hsuivre"><a href="https://discordapp.com"><img src="Discord.png"  alt="Discord" title="Discord"></a></li>
        </ul>
    </div>
    <article>
        <h3>- Depuis le Zevent2018 la communauté des Gamers habitué à être dénigré et critiqué par les journalistes c'est vue glorifié par la presse , preuve que les mentalités changent</h3>
        <br />
         <br />
        <figure >
        <a href="Zevent2018.jpg"><img src="Zevent2018_mini.jpg" alt="Cliquez pour agrandir" title="Zevent2018 picture"></a>
        <figcaption>Zevent2018 </figcaption>
    </figure>
     <br />
        <aside id="texte">
            <br />
            <p><?php if(isset($infoarticle['a_id'])){echo$infoarticle['a_texte'];} ?></p>
           <br />
           <p>
            seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens 
            </p>
            <br />
            <p>
            mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur
            </p>
            <br />
            <p>
             ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.
        </p>
        <br />
</aside>
</article>
</section>

 <?php include("commentaire.php") ?>
    </body>
    <footer>
        <?php include("footer.php")?>
    </footer>
    </html>
