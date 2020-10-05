<?php
//include "Mastermind.php"; // PLUS NÉCESSAIRE AVEC AUTOLOAD !
function __autoload($classname){ // avant le session_start !
  include './' . $classname . '.php';
}
session_start(); 
if (isset($_POST['nouveau'])){    // SI nouvelle partie
  $_SESSION=array();
}
ini_set('display_errors', 1); error_reporting(E_ALL); 
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8" /> 
<title>Site de jeu : Mastermind</title>
</head>
<body>
<h1 align="center">Mastermind</h1>
<form method="post"> 
<p>Veuillez saisir successivement des combinaisons de

<?php
$i=1;
if(isset($_SESSION['jeu'])){	// restauration objet Mastermind
  $jeu=$_SESSION['jeu'];
  // print_r($jeu);  // DEBUG
  $taille=$jeu->getTaille();
}else {				// début de partie
  if(!empty($_GET['taille'])){
    $taille=(int)$_GET['taille'];
  }else{
    $taille=4;
  }
  $jeu=new Mastermind($taille);
  $_SESSION['jeu']=$jeu;
}
echo $taille;
?> chiffres jusqu'à la victoire !
</p>
<table>
 <tr>
  <th align="left" valign="middle">Num&eacute;ro</th>
  <th align="left" valign="middle">Proposition</th>
  <th align="left" valign="middle">Bien plac&eacute;(s)</th>
  <th align="left" valign="middle">Mal plac&eacute;(s)</th>
 </tr>
<?php
  foreach($jeu->getEssais() as $code=>$res){
    echo "<tr><td>$i</td><td>".$code."</td><td>".$res['bon'].
      "</td><td>".$res['mal']."</td></tr>\n";
    $i++;
  }
if (!empty($_POST['prop'])){		// une proposition
  $r=$jeu->test($_POST['prop']); // résultat
  
  if ($r===false){		// proposition invalide
    echo "<tr><td>Incorrect</td><td>".$_POST['prop'].
      "</td><td></td><td></td></tr>\n";
  }else {			// valide !
    echo "<tr><td>$i</td><td>".$_POST['prop']."</td><td>".$r["bon"].
      "</td><td>".$r["mal"]."</td></tr>\n";
    $_SESSION['jeu']=$jeu;
    $i++;
  }
  if ($r===false || $r["bon"]!=$taille){   // tq pas gagné !
    echo "<tr><td>$i</td><td>";
    echo "<input type='text' name='prop' autofocus size='".$jeu->getTaille().
      "'</td><td></td><td></td></tr>\n";
?>
   </table>
   <input type="submit" value="OK">
<?php
  }else{			// GAGNE
?>
    <tr><td></td><td>GAGNE !</td><td></td></tr>
    </table>
<?php
  }
}else{				// pas de proposition
  echo "<tr><td>$i</td><td>";
  echo "<input type='text' name='prop' autofocus size='".$jeu->getTaille().
    "'</td><td></td><td></td></tr>\n";
?>
    </table>
    <input type="submit" value="OK">
<?php
}
?>
    <input type="submit" name="nouveau" value="Nouvelle Partie">
   </form>
  </body>
</html>
