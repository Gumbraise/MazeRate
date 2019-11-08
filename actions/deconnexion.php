<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');
if(isset($_SESSION['id'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
}
else
{
    header("Location: ../error.php?id=4");
}
?>