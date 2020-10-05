<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=article_commentaires;charset=utf8','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $getid = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($getid));
   $article = $article->fetch();
if(isset($_SESSION['id'])) {
   $reqtuser = $bdd->prepare("SELECT * FROM user_compte WHERE id = ?");
   $reqtuser->execute(array($_SESSION['id']));
   $userinfo = $reqtuser->fetch();
    if(isset($_POST['submit_commentaire'])) {
      if(isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
         $commentaire = htmlspecialchars($_POST['commentaire']);
            $ins = $bdd->prepare('INSERT INTO commentaires (c_id, c_pseudo,c_avatar, commentaire, c_date) VALUES (?,?,?,?,?)');
            $ins->execute(array($getid,$userinfo['pseudo'],$userinfo['avatar'],$commentaire,$getid));
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
         }
       else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
}
}
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE c_id = ? ORDER BY id DESC');
   $commentaires->execute(array($getid));
?>
   ?>
<h2>Article:</h2>
<p><?= $article['texte'] ?></p>
<br />

<h2>Commentaires:</h2>
<form method="POST">
   <a href="<?php if(!isset($_SESSION['id'])){echo"connexion.php"} ?>"><?php if(!isset($_SESSION['id'])){echo"Connectez vous"} ?></a>
   <table>
   <tr>
      <td>
   <input type="image" name="avatar" value="<?php echo $userinfo['avatar']; ?>" />
</td>
<td>
   <input type="text" name="pseudo" placeholder="Votre pseudo" value="<?php echo $userinfo['pseudo']; ?>" />
</td>
<tr>
   <td>
   <textarea name="commentaire" placeholder="Votre commentaire..."/>
</td>
</tr>
<tr>
   <td>
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
</td>
</tr>
</form>
<?php if(isset($c_msg)) { echo $c_msg; } ?>
<br /><br />
<?php while($c = $commentaires->fetch()) { ?>
   <b><?= $c['pseudo'] ?>:</b> <?= $c['commentaire'] ?><br />
<?php } ?>
<?php
}
?>