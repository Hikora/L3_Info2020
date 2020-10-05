<?php 

/* connection a la base de données */
$bdd = new PDO('mysql:host=localhost;dbname=quizz', 'root', '');

/*
   $RQuestion1 ="P3";
   $RQuestion2 ="M3";
   $RQuestion3 ="H4";

    $insertmbr = $bdd->prepare("INSERT INTO Quizz(Question1, Question2, Question3) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($RQuestion1, $RQuestion2, $RQuestion3)); 
   */
$cpt=0;
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


  if(isset($_GET['qcm']) AND $_GET['qcm']>0)
{
    $getQcm = intval($_GET['qcm']);
    $reqtQcm = $bdd->prepare('SELECT * FROM Quizz WHERE id = ?');
    $reqtQcm ->execute(array($getQcm));
    $Qcminfo = $reqtQcm->fetch();


if(isset($_POST['formquizz'])) /* si var existe on peu continuer */
   { 
   $Question1 = $_POST['Question1']; 
   $Question2 = $_POST['Question2'];
   $Question3 = $_POST['Question3'];
   $Bonus = htmlspecialchars($_POST['Bonus']);
   

if(!empty($_POST['Question1']) AND !empty($_POST['Question2']) AND !empty($_POST['Question3']) AND !empty($_POST['Bonus']))
{
   if($Question1 == $Qcminfo['Question1'] )
   {
     $cpt+=1;
   }
   else 
   {
     
   }
   if($Question2 == $Qcminfo['Question2'] )
   {
     $cpt+=1;
   }
   else 
   {
     
   }
   if($Question3 == $Qcminfo['Question3']  )
   {
     $cpt+=1;

   }
   else 
   {
     
   }
   /*
   if($cpt ==3){openvideo()}
   /*elouan 
   ?>
   <script type="text/javascript">
   var video = document.getElementById("videofond");
      var srcVideo = video.getAttribute("src");

     if (cpt == 3) 
     {
      srcVideo = nomVideo;
      video.setAttribute("src", srcVideo);
      }
      else
      {
      console.log("nomVideo et srcVideo sont identiques");
    }
  </script>
  <?php*/
}
else 
{
 $erreur="Répondez à toutes les questions ";
}
}
}





?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="cv_julien.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title>
    </head>
    <header >
       <?php include("cv_topbar.php"); ?>
       
    </header>
    <body>
      <!--  <video autoplay loop muted autobuffer  class="gif" id="videofond"><source src="<?php /* if(isset($cpt)){if($cpt==3){echo"clapping3";}if($cpt==2){echo"clapping2";}} */ ?>.mp4" type="video/mp4"></video>
     <div id="bloque">
       

      </div>
        <script src="append.js" type="text/javascript"></script>-->
       <?php include("cv_rightbar.php"); ?>
    	<aside id="information">
        <picture>
    	<img src="cv_julien.jpg" alt="JULIEN" title="JULIEN" class="image_flotttante">
      <figcaption>Fabrice le developer</figcaption>
    </picture>
    
    <table class="tableur">
      <caption><h4>Information générales :</h4></caption>
   <tr>
       <td>Nom</td>
       <td>William</td>
   </tr>
   <tr>
       <td>Age</td>
       <td>32 ans</td>
   </tr>
   <tr>
       <td>Pays</td>
       <td>France, Arcachon(33)</td>
   </tr>
   <tr>
       <td>Profession</td>
       <td>Developer Scratch</td>
   </tr>
</table>
  </aside>
    <div id="introduction">
    <p>Mensarum enim voragines et varias voluptatum inlecebras, ne longius progrediar, praetermitto illuc transiturus quod quidam per ampla spatia urbis subversasque silices sine periculi metu properantes equos velut publicos signatis quod dicitur calceis agitant, familiarium agmina tamquam praedatorios globos post terga trahentes ne Sannione quidem, ut ait comicus, domi relicto. quos imitatae matronae complures opertis capitibus et basternis per latera civitatis cuncta discurrunt.Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium.</p>
    </div>  
    	<ul class="sommaire">
    	<li class="titre"><a href="#Compétences"><em>Compétences</em></a>
        <ul class="sous-titre1">
                   <li><a href="#A11"><h3>1.1 titre</h3></a></li>
                   <li><a href="#A12"><h3>1.2 titre</h3></a></li>
                   <li><a href="#A13"><h3>1.3 titre</h3></a></li>
                </ul>
          </li>
        <li class="titre"><a href="#Parcour"><em>Parcour</em></a> 
               <ul class="sous-titre2">
                   <li><a href="#B21"><h3>2.1 titre</h3></a></li>
                   <li><a href="#B22"><h3>2.2 titre</h3></a></li>
                   <li><a href="#B23"><h3>2.3 titre</h3></a></li>
               </ul>
          </li>
          <li class="titre"><a href="#Futur"><em>Futur</em></a> 
            <ul class="sous-titre3">
                   <li><a href="#C31"><h3>3.1 titre</h3></a></li>
                   <li><a href="#C32"><h3>3.2 titre</h3></a></li>
                   <li><a href="#C33"><h3>3.3 titre</h3></a></li>
            </ul>
         </li>
         <li class="titre"><a href="#Quizz"><em>Quizz</em></a></li>

          </ul>
      <div id="corps">
        <ul class="art">
               <li id="Compétences"><a href="#Compétences"><h2>Compétences</h2></a>
                <a class="ferme1 ferme" href="#ferme1">Fermer</a>
                 <ul class="sous-titre1">
                 <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies.</p>
                   <li id="A11" class="pg11 pg"><h3>1.1 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme11 ferme" href="#ferme11">Fermer</a></li>

                   <li id="A12" class="pg12 pg"><h3>1.2 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme12 ferme" href="#ferme12">Fermer</a></li>

                   <li id="A13" class="pg13 pg"><h3>1.3 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme13 ferme" href="#ferme13">Fermer</a></li>

                </ul>
                </li>
               <li id="Parcour"><a href="#Parcour"><h2>Parcour</h2></a>
                 <a  class="ferme2 ferme" href="#ferme2">Fermer</a>
                <ul class="sous-titre2">
                  <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies.</p>
                   <li id="B21" class="pg21 pg"><h3>2.1 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme21 ferme" href="#ferme21">Fermer</a></li>

                   <li id="B22"class="pg22 pg"><h3>2.2 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme22 ferme" href="#ferme22">Fermer</a></li>

                   <li id="B23"class="pg23 pg"><h3>2.3 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme23 ferme" href="#ferme23">Fermer</a></li>
               </ul>
               </li>
               <li id="Futur"><a href="#Futur"><h2>Futur</h2></a>
                <a class="ferme3 ferme" href="#ferme3">Fermer</a>
               <ul class="sous-titre3">
                <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies.</p>
                   <li id="C31" class="pg31 pg"><h3>3.1 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme31 ferme" href="#ferme31">Fermer</a></li>

                   <li id="C32"class="pg32 pg"><h3>3.2 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme33 ferme" href="#ferme32">Fermer</a></li>

                   <li id="C33"class="pg33 pg"><h3>3.3 corps</h3><p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p><a class="ferme33 ferme" href="#ferme33">Fermer</a></li>
                </ul>
              </li>
               <li id="Quizz"><h2>Quizz:</h2><!-- FORMULAIRE -->
    <form method="post" action="" class="question" required>
    <h4 class="obligé1">Veuillez choisir une réponse</h4>
   <p>
       <h3>Quel est la profession de Fabrice le developeur Scratch?</h3>
       <input type="radio" name="Question1" value="P1" id="Question11" /> <label for="Question11">Verbicruciste</label><br />
       <input type="radio" name="Question1" value="P2" id="Question12" /> <label for="Question12">Gardien d'île</label><br />
       <input type="radio" name="Question1" value="P3" id="Question13" /> <label for="Question13">Developeur Scratch</label><br />
       <input type="radio" name="Question1" value="P4" id="Question14" /> <label for="Question14">Nounou pour pandas</label>
   </p>
<h4 class="obligé2">Veuillez choisir une réponse</h4>
   <p>
       <h3>Les réactions irréversibles de la glycolyse et de la néoglucogénèse :</h3>
       <input type="radio" name="Question2" value="M1" id="Question21" /> <label for="Question21">La glucokinase et la glucose-6-phosphatase sont présentes dans le foie.</label><br />
       <input type="radio" name="Question2" value="M2" id="Question22" /> <label for="Question22">L'hexokinase et la glucose-6-phosphate sont présentes dans le muscle.</label><br />
       <input type="radio" name="Question2" value="M3" id="Question23" /> <label for="Question23">La phosphofructokinase-1 est activée par l'ATP et le citrate alors que la fructose-1,6-bisphosphatase est activée par l'AMP et le fructose-2,6-bisphosphate.</label><br />
       <input type="radio" name="Question2" value="M4" id="Question24" /> <label for="Question24">La pyruvate kinase et la pyruvate carboxylase sont des enzymes cytosoliques.</label><br />
       <input type="radio" name="Question2" value="M5" id="Question25" /> <label for="Question25">L'insuline inhibe la glucose-6-phosphatase et active la glucokinase.</label>
   </p>
 
 <h4 class="obligé3">Veuillez choisir une réponse</h4>
   <p>
       <h3>Au cours de quel événement historique fut crée le pancake ?</h3>
       <input type="radio" name="Question3" value="H1" id="Question31" /> <label for="Question31">A. En 1618,pendant la guerre des croissants au beurre</label><br />
       <input type="radio" name="Question3" value="H2" id="Question32" /> <label for="Question32">B. En 1702,pendant le massacre du Saint Panini</label><br />

       <input type="radio" name="Question3" value="H3" id="Question33" /> <label for="Question33">C. En 112, avant Céline Dion pendant la prise de la brioche</label><br />
       <input type="radio" name="Question3" value="H4" id="Question34" /> <label for="Question34">D. La réponse D</label>
   </p>
   <br />
          
   
       <h3>Question à 1000 euro:</h3>
       
   <p>
       <label for="Bonus"><h4>-Démontrer la conjecture de Hodge :</h4></label><br />
       <textarea name="Bonus" id="Bonus" rows="30" cols="120">
       Remplissez correctement ce champ pour pouvoir gagner 1000 Euros ...
       </textarea>       
   </p>
<p><input type="submit"  name ="formquizz" value="Envoyer" /> votre Quizz .</p>
   </form>
</li>
       </ul>
       <?php
         if(isset($erreur)) 
         {
            echo '<font color="red">'.$erreur."</font>"; /* renvoies l'erreur déclenché dans le traitement */
         }
         ?>
   </body>
   <footer>
   </footer>
   </html>

      