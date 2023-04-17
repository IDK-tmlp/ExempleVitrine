<h2>Ajouter un utilisateur</h2>
<form class="form" action="/index.php?page=admin&action=add" method="POST">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
            <label for="firstName">Prenom :</label>
            <input type="text" name="firstName" id="firstName">
            <label for="mail">Mail :</label>
            <input type="email" name="mail" id="mail">
            <label for="pwd">Password :</label>
            <input type="password" name="pwd" id="pwd">
            <input type="submit" value="Ajouter">
</form>

<?php
if (isset($_POST['name'], $_POST['firstName'], $_POST['pwd'], $_POST['mail'])) {

  // récupération du fichier 
  $f = dirname(__FILE__) . "/../../src/datas/users.csv";
  if (file_exists($f)) {
    // Ouvrir le fichier en mode a : Le pointeur de fichier commence à la fin du fichier.
    $file = fopen($f, 'a');
    // Ecrire dans le fichier
    fwrite($file, PHP_EOL . $_POST['firstName'].', '.$_POST['name'].', '.$_POST['mail'].', '.password_hash(trim($_POST['pwd']), PASSWORD_DEFAULT));
    // Fermer le fichier
    fclose($file);
    echo  '<h2>'.$_POST['firstName'].' '.$_POST['name'].' ajouté</h2>';
  } else {
    echo "ERROR: Le fichier n'existe pas.";
  }
}
?>