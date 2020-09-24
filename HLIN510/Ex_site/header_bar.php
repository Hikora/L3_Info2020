	 <html>
   <header>
   <meta charset="utf-8" />
        <link rel="stylesheet" href="header_bar.css" />
  </header>
  <body>
   <nav id="overlay" >
            <ul class="aide">
                 <li class="photo_profil element " style= "background-color:<?php if(isset($_SESSION['color'])){ echo $_SESSION['color'];} ?>;"><a href="<?php if(isset($_SESSION['id'])){echo"#profil_bar";} else{ echo"connexion.php";} ?>"><img src="<?php if(isset($_SESSION['avatar'])){ echo "compte/avatars/".$_SESSION['avatar'] ;}else{echo"compte/avatars/user-icon.png";}?>"class="imageflottante " alt="Profil" title="Cliquez pour voir votre Profil"><!--<img class="src="play-white4.png"> --></a>   <!-- id="link" -->  
                     <ul class="déroulant3">

                         <li><a href="formulaire_inscription.php"><em>Creér votre compte</em></a></li>
                         <li><a href="connexion.php"><em>Connectez vous </em></a></li>
                         <li><a href="edition.php?id=<?php if(isset($_SESSION['id']))  {echo$_SESSION['id']; }?>"><em>Editer votre profil</em></a></li>

                      </ul>
                      <!-- <?php/* 
                      if(isset($_SESSION['id']))
                      {
                      <script>
                     if (window.matchMedia("(min-width: 1000px)").matches) {
                     onclick="document.getElementById('link').href='profil.php;"
                     } 
                    </script>
                     }*/
                     ?> -->
               </li>
                <li class="menu element"><a><img src="menu_deroulant.png" class="imageflottante" alt="Menu" title="Déroulez"></a>
                     <ul class="déroulant1">

                         <li><a href="refont.php?id=<?php if(isset($_SESSION['id'])){ echo$_SESSION['id']; } ?>"><em>Actualité</em></a></li>
                         <li><a href="forum.php?id=<?php if(isset($_SESSION['id'])){ echo$_SESSION['id']; } ?>"><em>Forum</em></a></li>

                     </ul>
                  </li>
                 <li class="element portail"><a href="Issou_Gate.php"><img src="IssouIndustries.png" class="imageflottante" alt="Acceuil"title="Cliquez pour voir retourner à l'acceuil"><strong>RandomProject</strong></a></li>
                 <li class="rubrique element"><a href="refont.php?id=<?php if(isset($_SESSION['id'])){ echo$_SESSION['id']; } ?>"><em>Actualité</em></a></li>
                <li class="rubrique element"><a href="forum.php?id=<?php if(isset($_SESSION['id'])){ echo$_SESSION['id']; } ?>"><em>Forum</em></a></li>
           <li class="element">
           	<form action="#" method="post">
              <input type="search" name="q" id="search" placeholder="Recherche..." />
           </form>
       </li>
       </ul>
         </nav>
  </body>
  </html>