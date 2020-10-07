<!DOCTYPE html>
<?php 
session_start();
?>
<html> 
<head> 
	<title> Multiplication et session </title>
</head>
<body>
	<h1> Multiplication et session </h1>
	<?php 
		if (isset($_SESSION['historique'])){
			$historique=unserialize($_SESSION['historique']); //tableau
			//print_r($historique);
			foreach($historique as $tab){ // tableau 'x' => 2,'y' => 3 , 'r' => 6
				echo "{$tab['x']} * {$tab['y']} = {$tab['r']} <br/>\n";
			}
			echo "<hr/>\n"; //pour délimiter l'historique
		}
		else { // début de session
			$historique=array();
			$_SESSION['historique']=serialize($historique);
		}
		if (isset($_POST['mult'])) {//nouvelle mult
			echo "Mult courante : {$_POST['x']} * {$_POST['y']} = " . $_POST['x'] * $_POST['y'] . " !<br/>";
			$tab=array('x' => $_POST['x'] , 'y' => $_POST['y'] , 'r' => $_POST['x'] * $_POST['y']);
			$historique[]=$tab; //ajout dans l'historique
			$_SESSION['historique']=serialize($historique);
			echo "<hr/> Nouvelle Multiplication : <br/>";
		}
	?>
<form action=" <?php 
					echo "{$_SERVER['PHP_SELF']}" . (strlen(SID)? '?' : '');
			  ?> "
	  method="post">
	  X <input type='text' name="x" size="10"> <br/>
	  Y <input type="text" name="y" size="10"> <br/>
	  <input type="submit" value="Multiplier !" name="mult">
</form>
</body>
</html>



