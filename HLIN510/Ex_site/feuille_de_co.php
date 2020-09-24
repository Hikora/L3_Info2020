<?php 


$bdd = new PDO('mysql:host=127.0.0.1;dbname=article;charset=utf8','root','');
if(isset($_GET['a_id']) AND !empty($_GET['a_id'])) {

if(isset($_SESSION['id']))
{
 
	 $instco = $bdd->prepare("INSERT INTO feuille_connexion(co_a, co_id, co_date) VALUES (?,?,NOW())");
	 $instco ->execute(array($getaid, $_SESSION['id']));
}
else
{
	$instco = $bdd->prepare("INSERT INTO feuille_connexion(co_a, co_id, co_date) VALUES (?,?,NOW())");
	 $instco ->execute(array($getaid,0));
}

$paramconnexion = $bdd->prepare('SELECT co_a, co_id, DAY(co_date) AS day, MONTH(co_date) AS month, YEAR(co_date) AS year, HOUR(co_date) AS hour, MINUTE(co_date) AS minute, SECOND(co_date) AS seconde FROM feuille_connexion WHERE co_a = ? AND co_id=? ORDER BY nb_co DESC LIMIT 0,1');
/* modif 12/05/2019 sans connaissance etat laissé avant : 

$co = $paramconnexion->fetch();
$paramconnexion ->execute(array($getaid, $_SESSION['id']))
*/
if(isset($_SESSION['id']))
{
$paramconnexion ->execute(array($getaid, $_SESSION['id']));
}else{$paramconnexion ->execute(array($getaid, 0));}
$co = $paramconnexion->fetch();

}
?>