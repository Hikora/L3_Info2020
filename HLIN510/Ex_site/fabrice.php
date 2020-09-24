<meta charset="utf-8" />
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=article_commentaire;charset=utf8','root','');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $getid = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($getid));
   $article = $article->fetch();
   if(isset($_POST['submit_commentaire'])) {
      if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
         $pseudo = htmlspecialchars($_POST['pseudo']);
         $commentaire = htmlspecialchars($_POST['commentaire']);
          $avatar="compte/avatars/tobey3.jpg";
         if(strlen($pseudo) < 25) {
            $ins = $bdd->prepare('INSERT INTO commentaires ( c_id ,c_pseudo,c_avatar, commentaire) VALUES (?,?,?,?)');
            $ins->execute(array($getid,$pseudo,$avatar,$commentaire));
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
         } else {
            $c_msg = "Erreur: Le pseudo doit faire moins de 25 caractères";
         }
      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE c_id = ? ORDER BY id DESC');
   $commentaires->execute(array($getid));
?>
<h2>Article:</h2>
<p><?= $article['a_texte'] ?></p>
<br />
<h2>Commentaires:</h2>
<form method="POST">
   <input type="text" name="pseudo" placeholder="Votre pseudo" /><br />
   <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
</form>
<?php if(isset($c_msg)) { echo $c_msg; } ?>
<br /><br />
<?php while($c = $commentaires->fetch()) { ?>
   <b><?= $c['pseudo'] ?>:</b> <?= $c['commentaire'] ?><br />
<?php } ?>
<?php
}
?>