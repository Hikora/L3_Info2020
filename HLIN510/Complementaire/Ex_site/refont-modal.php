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
<html>
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
         
            <nav id="slide"> 
    <div id="position1">
        <div id="position2">
           <div id="position3"> 
                <a class="suivant suivant1" href="#position2"><img src="fleche_suiv.png" alt="Suivant"title="Cliquez pour avancer"></a> 
                <a class="précédent précédent2" href="#position1"><img src="fleche_prec.png" alt="précédent"title="Cliquez pour reculer"></a> - <a class="suivant suivant2" href="#position3"><img src="fleche_suiv.png" alt="Suivant"title="Cliquez pour avancer"></a> 
               <a class="précédent précédent3" href="#position2"><img src="fleche_prec.png" alt="précédent"title="Cliquez pour reculer"></a> 
                
       <ul id="top_bar" class="onglets">
                <li class="element2"><a href="Fornite.html"><img src="Fornite.jpg" alt="Fornite"title="Cliquez pour voir les actus Fornite"><em>Fornite</em></a>
                <ul class="déroulant">
    
                        <li><a href="Fornite:p1">GosSaga Construction</a></li>
                        <li><a href="Fornite:p2">GosSaga Edition</a></li>
                        <li><a href="Fornite:p3">GosSaga Technics</a></li>
                </ul>
                </li>

                <li class="element2"><a href="CSGO.html"><img src="CSGO.jpg" alt="CS:GO"title="Cliquez pour voir les actus CS:GO"><em>CS:GO</em></a>

                <ul class="déroulant">
                    
                        <li><a href="CSGO:p1">Suka Blyat rush B</a></li>
                        <li><a href="CSGO:p2">How to Ninja Defuse like a pro</a></li>
                        <li><a href="CSGO:p3">KennyS :pro Tips</a></li>
                </ul>
                </li>

                <li class="element2"><a href="League of Legends.html"><img src="LoL.png" alt="League of Legends"title="Cliquez pour voir les actus League of Legends"><em>LoL</em></a>

                <ul class="déroulant">
                    
                       <li><a href="LoL:p1">OTP Singed</a></li>
                       <li><a href="LoL:p2">Beemo</a></li>
                       <li><a href="LoL:p3">How to play Garen</a></li>
                </ul>
               </li>

                <li class="element2"><a href="Hearsthone.html"><img src="Hearsthone.png" alt="Hearsthone"title="Cliquez pour voir les actus Hearsthone"><em>Hearsthone</em></a>

                <ul class="déroulant">
                    
                       <li><a href="Hearsthone:p1">Why face is the place ?</a></li>
                       <li><a href="Hearsthone:p2">Everyone get in here !!!</a></li>
                       <li><a href="Hearsthone:p3">You Face Jaraxus</a></li>
                </ul>
                </li>                

                <li class="element2"><a href="Overwatch.html"><img src="Overwatch.png" alt="Overwatch"title="Cliquez pour voir les actus Overwatch"><em>Overwatch</em></a>
                <ul class="déroulant">
                    
                       <li><a href="Overwatch:p1">Hero never die , again...</a></li>
                       <li><a href="Overwatch:p2">The sad story  of Shit-mada brother</a></li>
                       <li><a href="Overwatch:p3">Why Mei is cancer ? by Dr.Junkstein</a></li>
                </ul>
                </li>
                

                <li class="element2"><a href="WoW.html"><img src="World of Warcraft.png" alt="World of Warcraft"title="Cliquez pour voir les actus World of Warcraft"><em>WoW</em></a>

                <ul class="déroulant">
                
                        <li><a href="WoW:p1">At least I have chicken</a></li>
                        <li><a href="WoW:p2">Did someone say Thunderfury ?</a></li>
                        <li><a href="WoW:p3">New : Elsa the frozen throne !</a></li>
                </ul>
                </li>
                <li class="element2"><a href="hots.html"><img src="hots.png" alt="Heroes of the Storm"title="Cliquez pour voir les actus HOTS"><em>HOTS</em></a>
                <ul class="déroulant">
                    
                       <li><a href="hots:p1">Top10 reasons of why Lol is better</a></li>
                       <li><a href="hots:p2">Fusion of USSR/EU server </a></li>
                       <li><a href="hots:p3">This game is dead</a></li>
                </ul>
                </li>
                <li class="element2"><a href="Diablo3.html"><img src="Diablo3.png" alt="Diablo3"title="Cliquez pour voir les actus Diablo3"><em>Diablo3</em></a>
                <ul class="déroulant">
                    
                       <li><a href="Diablo3:p1">Bunny Barbarian (B.B)</a></li>
                       <li><a href="Diablo3:p2">AFK Barbarian(Whirlwind) GR 118</a></li>
                       <li><a href="Diablo3:p3"> Barbarian Tips by Garen </a></li>
                </ul>
                </li>
                <li class="element2"><a href="Battlerite.html"><img src="Battlerite.png" alt="Battlerite Royale "title="Cliquez pour voir les actus Battlerite Royale"><em>Battlerite.R</em></a>
                <ul class="déroulant">
                    
                       <li><a href="Battlerite:p1">"Ashka is balanced" said developper</a></li>
                       <li><a href="Battlerite:p2">Barrel secret strat by Teemo</a></li>
                       <li><a href="Battlerite:p3">Taya > Ashka by kappa inc</a></li>
                </ul>
                </li>
                <li class="element2"><a href="FIFA19.html"><img src="FIFA19.png" alt="FIFA19"title="Cliquez pour voir les actus FIFA19"><em>FIFA19</em></a>
                <ul class="déroulant">
                    
                       <li><a href="FIFA19:p1">K.Mitroglou is OP</a></li>
                       <li><a href="FIFA19:p2">Neymar simulation (Pro Tips)</a></li>
                       <li><a href="FIFA19:p3">Need for Speed:Mbappé</a></li>
                </ul>
                </li>
                <li class="element2"><a href="DiabloIm.html"><img src="Diablo_Immortal.png" alt="Diablo Immortal"title="Cliquez pour voir les actus Diablo Immortal"><em>Diablo Immortal</em></a>
                <ul class="déroulant">
                    
                       <li><a href="DiabloIm:p1">Disappointement</a></li>
                       <li><a href="DiabloIm:p2">Why Blizzard ?by Red shirt Guy</a></li>
                       <li><a href="DiabloIm:p3">This is not an out-of-Season April Fool's Joke</a></li>
                </ul>
                </li>
                <li class="element2"><a href="COD.html"><img src="COD.png" alt="Call of Duty"title="Cliquez pour voir les actus Call of Duty"><em>CoD</em></a>
                <ul class="déroulant">
                    
                       <li><a href="COD:p1">Space Zombie mode</a></li>
                       <li><a href="COD:p2">Space Battle Royal</a></li>
                       <li><a href="COD:p3">Space Battle Royal with Zombies</a></li>
                </ul>
                </li>
                

           </ul>
           </div>
        </div>
      </div>
         </nav>
    </header>
    <body>
      <div class="video_fond">
        <video autoplay loop muted autobuffer> 
                <source src="Cyber-City.mp4" type="video/mp4">
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
        <article id="evenement" >
         <!-- <font color="<?php/* echo $_SESSION['color']; */?>"><h6>JERIS</h6></font>  -->
        <section class="article">
            <picture>
               <a href="Zevent2018.jpg" target="_blank">
                <img src="Zevent2018_mini.jpg" data-large="Zevent2018.jpg" class="imageflottante" alt="Zevent-2018" title="cliquez pour agrandir">
            </picture>
            <aside class="texte" >

                <ul class="puce">
                     <li ><a href="Zevent-2018.php"><h2>Ces G@merZ au grand coeur:</h2>
                         <p>Du vendredi 9 novembre au soir du dimanche 11 novembre c'est tenu l'un des plus grands événements e-sportif caritatif de France pour soutenir la fondation Médecin sans frontière . Cet événement organisé par Adrien Nougaret (dit Zerator) et Alex Dash à permit de lever des fonds considérable pour Medecin sans frontière . En effet ca serait plus de 1 Millions d'euros qui serait reverser directement à l'association .</p></a></li> 

                </ul>
         </aside>
        </section>
        <section class="article">
            <picture>
               <a href="RDR.jpg" target="_blank">
                <img src="RDR_mini.jpg" data-large="RDR.jpg" class="imageflottante" alt="Read dead Redemption" title="cliquez pour agrandir">
            </picture>
            <aside>
                <ul class="puce">
                     <li ><a href="RedDeadRedemption.php"><h2>Red Dead Redemption :test complet par Risitas</h2>
                         <p>"Les cactus sont d'un réalisme incroyable" tel sont les propos de risitas l'un des plus grand testeur de jeu-vidéo.Rockstar était connu pour son souci du détail mais rien de comparable à jamais était fait dans l'histoire du jeu vidéo.</p></a></li> 
                </ul>
            </aside>
            </div>
        </section>
    
        <section class="article">
            <picture >
               <a href="Hitman2.jpg" target="_blank">
               <img src="Hitman2_mini.jpg" data-large="Hitman2.jpg" class="imageflottante" alt="Hitman2" title="cliquez pour agrandir">
            </picture>
            <aside>
                <ul class="puce">
                     <li><a href="Hitman2.php"><h2>Hitman 2: Ou comment faire pleuvoir les OP par IO</h2>
                        <p>Dans l'histoire du jeu-vidéo nous n'avons vue de campgane publicitaire aussi agressive que celle entreprise par la Warner avec la sortie de Hitman2 ,tous les influenceurs sont solicités.Des contenus exclusifs sont vendu de paire avec la précomande du jeu ,goodies et produits dérivés mal fait sont de rigueur .</p></a></li> 
                </ul>
            </aside> 
      </section>
      </article>

    <div id="imgOverlay" class="modal">
        <div>
            <img id="img" class="modal-img" src="" alt="" />
        </div>
         <script>
(function() {
    'use strict';

    let modal = {
        selector: document.getElementById("imgOverlay"),
        close: function () {
            modal.selector.classList.remove('shown');
        },
        open: function(ev) {
            ev.preventDefault();
            
            let img = ev.target;
            let link = img.parentNode;
            
            let flickrLink = link.href;
            let imgLink = img.getAttribute('data-large');
            let caption = img.alt;

            // Cleaning IMG div
            let targetImg = modal.selector.querySelector("img#img");
            let parentContainer = targetImg.parentNode;
            parentContainer.removeChild(targetImg);

            let newImg = document.createElement('img');
            newImg.classList.add('modal-img');
            newImg.id = "img";

            newImg.src = imgLink;
            newImg.alt = caption;

            parentContainer.appendChild(newImg);

          

            modal.selector.classList.add("shown");
        }
    };

    modal.selector.onclick = modal.close;
    
    Array.from(document.querySelectorAll("article.photo-list>section"))
        .forEach(function(s) {
            s.onclick = modal.open;
        });
})();
    </script>

    </body>
    <footer id="container2" >
      <?php include("footer.php"); ?>
 </footer>
</html>