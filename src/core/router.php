<?php

$page = 'accueil.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'membres':
            $page = "membres.php";
            break;
        case 'quiSommesNous':
            $page = "quiSommesNous.php";
            break;
        case 'login':
            $page = "loginForm.php";
            break;
        case 'logincheck':
            $page = "login.php";
            break;
        case 'logout':
            $page = "logout.php";
            break;
        case 'admin':
            if ($_SESSION["logged"]) {
                if (isset($_GET['action'])) {
                    switch ($_GET['action']) {
                        case 'add':
                            $page = "admin/add.php";
                            break;
                        case 'update':
                            $page = "admin/update.php";
                            break;
                        case 'delete':
                            $page = "admin/delete.php";
                            break;
                        default:
                            break;
                    }
                }
            } else $page = "loginForm.php";
        default:
            break;
    }
}



include(dirname(__FILE__).'/../../pages/'.$page);
?>