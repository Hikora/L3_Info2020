
<br />      
<a href="<?php if(!isset($_SESSION['id'])){echo"connexion.php";} ?>"><?php if(!isset($_SESSION['id'])){echo "Connectez vous"; } /* 12/05/2019 : juste pour que ca soit plus rapide à enlever */?></a>
<meta charset="utf-8" />
<?php
   $nb_message = 0;
   $bdd = new PDO('mysql:host=localhost;dbname=chat', 'root', '');
if(isset($_SESSION['id'])) {
  /* $bdd1 = new PDO('mysql:host=localhost;dbname=compte', 'root', '');
   $reqtuser = $bdd1->prepare("SELECT * FROM user_compte WHERE id = ?");
   $reqtuser->execute(array($_SESSION['id']));
   $userinfo = $reqtuser->fetch();
   */
    if(isset($_POST['submit_message'])) {
      
      if(isset($_POST['message']) AND !empty($_POST['message'])) {
         $message = htmlspecialchars($_POST['message']);
        /* $date =;*/
            $instmessage = $bdd->prepare("INSERT INTO chat_gen (p_id, m_pseudo, message, m_color, m_droit, m_date) VALUES (?,?,?,?,?,NOW())");
            $instmessage->execute(array( $_SESSION['id'], $_SESSION['pseudo'], $message, $_SESSION['color'], $_SESSION['droit']));

         }
       else {
         $m_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
}


   $messages = $bdd->query('SELECT p_id, m_pseudo, message, m_color, m_droit, HOUR(m_date) AS hour, MINUTE(m_date) AS minute, SECOND(m_date) AS seconde FROM chat_gen ORDER BY m_id DESC LIMIT 0,15');
   /*$messages->execute(array(if($nb_message-15<0){echo"0"}else{echo$nb_message},$nb_message));
   if($nb_message>15){
    $instmessage =$bdd->prepare("DELETE FROM m_id WHERE m_id<
   }
   */
   
?>
<html>
   <header>
        <link rel="stylesheet" href="chat.css" />
  </header>
  <body >
    
    <div id="chat">
      <h4 style="font-size:20px; color:rgb(200,200,200);text-align:center; text-decoration:underline;" >CHAT :</h4>
<div class="t_chat">
  
<?php while($m = $messages->fetch()) { ?>
   
      <!--- id="<?php /*if($nb_message==9){echo"m_ancre";}; */?>"-->
         <p><b style="font-size:17px;  color:<?php echo$m['m_color'] ; ?>; word-wrap: none;"><?php echo$m['m_pseudo'];?></b><!-- enlever le saut de ligne -->
        <img src="<?php echo"chat/icon/emote".$m['m_droit']; ?>" style="border-radius:5px; background-color:<?php echo$m['m_color'] ; ?>;">
      <?php echo": ".$m['message']; ?></p>  

<?php $nb_message+=1; } ?>
</div>
<?php if(isset($_SESSION['id'])){ ?>
<form method="POST" action="Zevent-2018.php?<?php if(isset($_SESSION['id'])){echo"id=".$_SESSION['id']."&amp;";}?>a_id=1#chat">
   
   <textarea name="message" placeholder="Ecriver votre message ..." rows="3" cols="34 " maxlength="100" class="chat_textarea" style="margin-left:12px;"></textarea>  
<br />
   <input type="submit" value="Envoyer votre message" name="submit_message" class="chat_input"></input>
    <?php if(isset($m_msg)) { echo $m_msg; } ?> 
    <br />
</form>
<?php }else{echo"<a style='color:white; padding-left:18px;' href='connexion.php'>Connectez vous pour accéder au chat</span></a>";}?>


</body>
</html>
</div>