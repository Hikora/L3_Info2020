<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8" /> 
<title>Commande</title></head><body>
<h1>Commande</h1>
<form method="get">
<?php
$larticle=array('marteau'=>10, 'tenaille'=>5, 'vis'=>5.2, 'clou'=>5.8, 
'tournevis'=>7, 'ciseau'=>4, 'toile emeri'=>3);
$total=0;
foreach($larticle as $nom => $prix){
  // si pas article en cours et existe comme champ caché avec qté>0
  if ($_GET[$nom]>0 && strcmp($nom,$_GET['article'])){
    echo "<input type='hidden' name='$nom' value='{$_GET[$nom]}'>"; // recopie
    echo "{$_GET[$nom]} $nom = ".$prix*$_GET[$nom]."<br/>"; // affiche
    $total+=$prix*$_GET[$nom];
  }
}
if($_GET['ajouter']){
  if($_GET['quantite']>0){
    echo "{$_GET['quantite']} {$_GET['article']} = ".
      $larticle[$_GET['article']]*$_GET['quantite']."<br/>";
    $total+=$larticle[$_GET['article']]*$_GET['quantite'];
    echo "<input type='hidden' name='{$_GET['article']}' 
           value='{$_GET['quantite']}'>";
  }
  else 
    echo "Quantité incorrecte ! Remise à zéro des {$_GET['article']}.<br/>";
}
echo "TOTAL : $total<br/>";

if ($_GET['ajouter']){
  echo "<hr/> Nouvel article :<br/>";
}
?>
Article : 
<select size="1" name="article">
  <?php
  foreach($larticle as $nom => $prix){
    echo "<option>$nom</option>";
  }
  ?>
</select>
 quantité voulue : <input type="number" name="quantite" size="10" 
			  pattern="\d+"><br>
<input type="submit" value="Ajouter !" name="ajouter">
</form>
</body></html>
