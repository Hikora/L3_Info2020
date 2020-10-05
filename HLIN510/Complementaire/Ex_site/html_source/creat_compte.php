<?php
/* session_start(); */

$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');

if(isset($_POST['valider']))
{

$prenom = htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']);
$nom = htmlspecialchars($_POST['nom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$pass = sha1($_POST['pass']);
$pass2 = sha1($_POST['pass2']);
$taillepseudo = strlen($pseudo);

  if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['date']) AND !empty($_POST['color']) AND !empty($_POST['pseudo'] )AND !empty($_POST['pass']) AND !empty($_POST['pass2']))
  {
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
     {
     	       $idemmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $idemmail->execute(array($email));
               $mailexiste = $idemmail->rowCount();
               if($mailexiste == 0) 
               {
               	$idepseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
               $idemmail->execute(array($pseudo));
               $pseudoexiste = $idempseudo->rowCount();
               if($pseudoexiste == 0) 
               {


	   if($pass == $pass2)
	    {
	    	 $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, avatar) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($mail, $pseudo, $mdp, "user-icon.png"));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                    /* $_SESSION['creacompte']= "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     header('Location: refont.php');*/

	    }
	    else
	    {
	  	  $erreur = "Vos mots de passes ne correspondent pas";
	    }
	  }
	  else
	  {
	  	$erreur = "Pseudo déjà utilisé" ;
	  }
	}
	     else {
                  $erreur = "Adresse mail déjà utilisée ";
               }
	  }
	 }
	 else
	 {
	  	$erreur = "Votre mail n'est pas valide ";
	 }

}
else
{
 	$erreur ="Votre pseudo ne doit pas dépasser 25 caractères";
}

}
else
{
  	$erreur = " Renseignez tous les champs ";
}



/*

if(isset($_POST['prenom'])AND !empty($_POST['prenom']))
{
	$_SESSION ['prenom'] =$_POST['prenom'];
}
if(isset($_POST['email'])AND !empty($_POST['email']))
{
	$_SESSION ['email'] =$_POST['email'];
}
if(isset($_POST['date'])AND !empty($_POST['date']))
{
	$_SESSION ['date'] =$_POST['date'];
}
if(isset($_POST['color'])AND !empty($_POST['color']))
{
	$_SESSION ['color'] =$_POST['color'];
}
if(isset($_POST['pseudo'])AND !empty($_POST['pseudo']))
{
	$_SESSION ['pseudo'] =$_POST['pseudo'];
}
if(isset($_POST['pass'])AND !empty($_POST['pass']))
{
	$_SESSION ['pass'] =$_POST['pass'];
}
*/

?> 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="creat_compte.css" />
        <link rel="shortcut icon" type="image/png" href="IssouIndustries.png"/>
        <title>RandomProject</title> 
        <!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/411EF5FC-D149-1C41-8497-9DFF1E04D1C2/main.js" charset="UTF-8"></script> -->
    </head>
    <header>
    </header>
    <body>
    	<div id="inscription">
        		<h3>Créer votre compte</h3>
    	<form method="POST" action="">
        <table>
    		<tr>
    			<td>
    			<label for="prenom">Prénom:</label>
    			</td>
    		<td>
    			<input type="text" name="prenom" id="prenom"  placeholder="Nicolas" required value="<?php if(isset($prenom)) { echo $prenom; } ?>"/>
    		</td>
    			<td>
    		    <label for="nom">Nom</label>
    		    </td>
    		<td>
    		    <input type="text" name="nom" id="nom"  placeholder="Supiot" required value="<?php if(isset($nom)) { echo $nom; } ?>"/>
    		</td>
    	</tr>

    		<tr>
    			<td>
    			<label for="email">Votre boîte mail :</label>
    			</td>
    		<td>
    			<input type="email" name="email" id="email" placeholder="Ex:risitas@gmail.com" required value="<?php if(isset($email)) { echo $email; } ?>" />
    		</td>
    		</tr>
    		<tr>
    			<td>

    			<label for="date_naissance">Votre date de naissance :</label>
    			</td>
    		<td>
    			<input type="date" name="date_naissance" id="date_naissance" required />
    		</td>
    		</tr>>
                <tr>
                	<td>
    			<label for="color">Choisissez la couleur de votre avatar</label>
    			</td>
    		<td>
    			<input type="color" name="color" id="color" required />
    		</td>
    		</tr>
    		<tr>
    			<td>

    			<label for="pseudo">Votre pseudo :</label>
    		</td>
    		<td>
    			<input type="text" name="pseudo" id="pseudo" required placeholder="Ex:Michel Dumas"  maxlength="25" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
    		</td>
    		</tr>
               <tr>
               	<td>
    			<label for="pass">Votre mot de passe :</label>
    			</td>
    		<td>
    			<input type="password" name="pass" id="pass" required  placeholder="Votre mot de passe" maxlength="25"/>
    </td>
</tr>
    <tr>
    	<td>
    <label for="pass2">Confirmé le mot de passe :</label>
    			</td>
    		<td>
    			<input type="password" name="pass2" id="pass2" required maxlength="25"/>
    </td>
</tr>
</table> 
    <input type="submit" name="valider" value="Valider" />
</form>
<?php
if(isset($erreur))
{
	echo $erreur;
}
?>
</div>
</body>
</html>

