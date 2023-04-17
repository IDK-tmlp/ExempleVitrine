<?php 
include(dirname(__FILE__)."/../src/datas/users.php");
// var_dump($users)
?>

<table class='table table-dark table-striped'>
    <thead>
        <th scope='col'>Prenom</th>
        <th scope='col'>Nom</th>
        <th scope='col'>Mail</th>
        <?php if (isset($_SESSION) && $_SESSION["logged"]) {  ?>
            <th scope='col'><a class="text-white" href="/index.php?page=admin&action=add">Ajouter</a></th>
        <?php } ?>
    </thead>

<?php 
foreach ($users as $user) {
    echo "<tr><td>$user[0]</td><td>$user[1]</td><td>$user[2]</td>";
    if (isset($_SESSION) && $_SESSION["logged"]) {
        echo '<td><a class="text-white" href="/index.php?page=admin&action=delete&name=' . $user[1] . '&firstName=' . $user[0] . '&mail=' . $user[2] . '">Supprimer</a> <a class="text-white" href="/index.php?page=admin&action=update&name=' . $user[1] . '&firstName=' . $user[0] . '&mail=' . $user[2] . '">Modifier</a></td></tr>';
    }
}
?>
</table>
<?php
if (isset($_SESSION) && $_SESSION["logged"]) {
    echo '<a href="'.$_SERVER['SERVER_NAME'].'/../src/datas/users.csv" download="users.csv" class="btn btn-secondary">Téléchargez le CSV</a> ';
    ?>

<form enctype="multipart/form-data" class="form" action="/index.php?page=membres" method="POST">
    <!-- MAX_FILE_SIZE doit précéder le champ input de type file &action=addCSV-->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
    Upload : <input type="file" id="file-upload" name="uploadedFile" >
    <input type="submit" value="Envoyer le fichier" class="btn btn-secondary" />
</form>

<?php
}

if (isset($_FILES) && isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    $uploaddir = dirname(__FILE__) . "/../src/datas/";
    $uploadfile = $uploaddir . basename($_FILES['uploadedFile']['name']);
    if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadfile)) {
      echo "Le fichier est valide, et a été téléchargé
             avec succès.";

        // header('Refresh:0');
        echo("<meta http-equiv='refresh' content='1'>");
    }
}
?>

