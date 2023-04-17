
<header>
    <nav class="navbar justify-content-center">
        <ul class="list-unstyled d-flex gap-3">
            <li><a href="./index.php" class="btn btn-secondary">Accueil</a></li>
            <li><a href="./index.php?page=membres" class="btn btn-secondary">Membres</a></li>
            <li><a href="./index.php?page=quiSommesNous" class="btn btn-secondary">Qui sommes nous ?</a></li>
            <?php if (isset($_SESSION) && !$_SESSION["logged"] ) {  ?>
                <li><a href="/index.php?page=login" class="ms-4 btn btn-warning">Se connecter</a></li>
            <?php } ?>
            <?php if (isset($_SESSION) && $_SESSION["logged"]) {  ?>
                <li><a href="/index.php?page=logout" class="ms-5 btn btn-warning">Se Déconnecter</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>