<html>
<header>
<meta charset="utf-8" />
<link rel="stylesheet" href="footer.css" />
</header>
<body>
<div id="container2">
<ul class="bas">
        <ul class="contact">
                 <h3>Information:</h3>      
                 <li class="lien_contact"><a href="cvs.php<?php if(isset($_SESSION['id'])) {echo "?id=".$_SESSION['id'];}?>">Qui sommes nous</a></li>
                 <li class="lien_contact"><a href="mailto:RandomCorp@gmail.com">Contactez-nous</a></li>
                 <li class="lien_contact"><a href="#">Recrutement</a></li>
                 <li class="lien_contact"><a href="#">Informations légales</a></li>
                 <li class="lien_contact"><a href="#">Politique de confidentialité</a></li>

        </ul>
        
        <ul class="reseau">
                  <h3>Nous suivre:</h3>
                 <li class="suivre"><a href="https://fr-fr.facebook.com"><img src="Facebook.png" class="imageflottante" alt="Facebook" title="Facebook"></a></li>
                 <li class="suivre"><a href="https://twitter.com/?lang=fr"><img src="Twitter.png" class="imageflottante" alt="Twitter" title="Twitter"></a></li>
                 <li class="suivre"><a href="https://www.instagram.com/?hl=fr"><img src="Instagram.png" class="imageflottante" alt="Instagram" title="Instagram"></a></li>
                 <li class="suivre"><a href="https://discordapp.com"><img src="Discord.png" class="imageflottante" alt="Discord" title="Discord"></a></li>
        </ul>
        <div class="trophée">
                 <h3>Médaillé d'or du concour issou 2018 :</h3>
                <p>"La plus haute distinction du jury à été attribué à la RandomCorp.cie pour avoir fait un site d'aussi bonne qualité "</p>
                
          </div>      
        </ul>
  
    </ul>
</div>
</body>
</html>