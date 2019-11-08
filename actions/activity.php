<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');
if(isset($_SESSION['id'])) {
    if(isset($_POST['activity'])) {
        $insertmbr = $bdd->prepare("INSERT INTO activity(description, id_user, date) VALUES(?, ?, UNIX_TIMESTAMP())");
        $insertmbr->execute(array($_POST['description'], $_SESSION['id']));
    }
    else 
    {
        header("Location: ../error.php?id=2");
    }
}
else
{
    header("Location: ../error.php?id=4");
}
?>