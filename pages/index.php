<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');

include("css.php");
if(isset($_SESSION['id'])) {
    if(isset($_GET['page'])) {
        switch ($_GET['page']){
            case 'profile':
                include("profile.php");
                break;
            case 'login':
                include("login.php");
                break;
            case 'register':
                include("accueil.php");
                break;
            case 'deconnexion':
                include("actions/deconnexion.php");
                break;
            case 'finish':
                include("pages/finish.php");
                break;
            case 'home':
                include("pages/home.php");
                break;
            default:
                include("error.php");
                break;
        }
    }
    else {
        include("accueil.php");
    }
}
else {
    if(isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'login':
                include("login.php");
                break;
            case 'register':
                include("accueil.php");
                break;
            default:
                include("accueil.php");
                break;
        }
    }
    else {
        include("accueil.php");
    }
}
?>