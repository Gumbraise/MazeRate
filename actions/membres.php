<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');

if(isset($_POST['ajax'])){
    $recherche = $_POST['recherche'];
    $requser = $bdd->prepare("SELECT * FROM users WHERE firstname = ?");
    $requser->execute(array($recherche));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
        echo "YESSS";
    }
}
?>