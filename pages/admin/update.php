<?php
include_once(dirname(__FILE__) . "/../../src/datas/users.php");
?>
<?php if (!isset($_POST['mail'], $_POST['name'], $_POST['firstName'])) { ?>
  <form class="form" action="/index.php?page=admin&action=update&name=<?=$_GET['name']?>&firstName=<?=$_GET['firstName']?>&mail=<?=$_GET['mail']?>" method="POST">
  <label for="name">Nom :</label>
  <input type="text" name="name" id="name" value=<?=$_GET['name']?>>
  <label for="firstName">Prenom :</label>
  <input type="text" name="firstName" id="firstName" value=<?=$_GET['firstName']?>>
  <label for="mail">Mail :</label>
  <input type="email" name="mail" id="mail" value=<?=$_GET['mail']?>>
  <label for="pwd">Password :</label>
  <input type="password" name="pwd" id="pwd">
  <input type="submit" value="Modifier">
</form>
<?php } ?>

<?php
if (isset($_POST['mail'], $_POST['name'], $_POST['firstName'], $_POST['pwd'])) {
  $content = [];
  foreach ($users as $user) {
    if ($user[0] == $_GET['firstName'] && $user[1] == $_GET['name'] && $user[2] == $_GET['mail']) {
      $content[] = $_POST['firstName'].', '. $_POST['name'].', '.$_POST['mail'].', '. password_hash(trim($_POST['pwd']), PASSWORD_DEFAULT)."\n";
    }else{
      $content[] = implode(",",$user);
    } 
  }
  $content = implode($content);
  $f = dirname(__FILE__) . "/../../src/datas/users.csv";
  if (file_exists($f)) {
    $file = fopen($f, 'w');
    fwrite($file, $content);
    fclose($file);
  } else {
    echo "ERROR: Le fichier n'existe pas.";
  }

include(dirname(__FILE__).'/../../pages/membres.php');
}

?>
