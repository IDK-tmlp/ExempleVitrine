<?php 
  $_SESSION["logged"] = false;
  // les headers ne fonctionne plus chez moi donc ajout de bouton
  header('location: http://'.$_SERVER['SERVER_NAME'].':8000/index.php');
?>
<meta http-equiv='refresh' content='1'>
<h2>Vous êtes maintenant déconnecté</h2>
<a href="index.php"> Acceuil</a>
