<h2>Gestion du login</h2>
<?php
include(dirname(__FILE__) . "/../src/core/manage_users.php");
include_once(dirname(__FILE__) . "/../src/datas/users.php");
if (isset($_POST) && $_POST["mail"] &&  $_POST["pwd"]) {
  // erreur condition if
  if (isLoggedIn($users, $_POST["pwd"], $_POST["mail"])) {
    // La personne est bien identifiée donc j'utilise le mécanisme des sessions
    if (isset($_SESSION)) {
      $_SESSION["logged"] = true;
      header('location: http://'.$_SERVER['SERVER_NAME'].':8000/index.php');
      echo 'Vous etes connecté <br>';
      echo '<a href="index.php"> Retour Accueil</a>';
    }
  } else {
    echo PHP_EOL . "<br>" . "<h3>pb de mail ou de mot de passe</h3>";
    echo PHP_EOL . "<br>" . '<a href="index.php?page=login">Retour au formulaire d\'identification</a>';
  }
  // récupération du mail et pwd venus de la méthode post
}

?>
<meta http-equiv='refresh' content='1'>