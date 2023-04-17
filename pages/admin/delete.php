<?php
include_once(dirname(__FILE__) . "/../../src/datas/users.php");
// Suppression de l'utilisateur dans $users
$content = [];
foreach ($users as $user) {
    if (!($user[0] == $_GET['firstName'] && $user[1] == $_GET['name'] && $user[2] == $_GET['mail'])) {
        $content[] = implode(",",$user);
    }
}
$content = implode($content);
$f = dirname(__FILE__) . "/../../src/datas/users.csv";
if (file_exists($f)) {
  $file = fopen($f, 'w');
  fwrite($file, $content);
  fclose($file);
//   echo "<h2>Suppression de ".$_GET['firstName']." ". $_GET['name'] ." effectuée</h2>";
} else {
  echo "ERROR: Le fichier n'existe pas.";
}
?>
<?php
include(dirname(__FILE__).'/../../pages/membres.php');
?>