<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');

if(isset($_POST['reg'])) {
    if(!empty($_POST['mail']) AND !empty($_POST['pass']) AND !empty($_POST['prenom']) AND !empty($_POST['nom'])) {
        $mail = $_POST['mail'];
        $prenom = ucfirst(strtolower($_POST['prenom']));
        $nom = ucfirst(strtolower($_POST['nom']));
        $pass = sha1($_POST['pass']);
        $ip = $_SERVER['REMOTE_ADDR'];

        $reqip = $bdd->prepare("SELECT * FROM users WHERE ip = ?");
        $reqip->execute(array($ip));
        $ipexist = $reqip->rowCount();
        if($ipexist == 0) {
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                $insertmbr = $bdd->prepare("INSERT INTO users(firstname, name, mail, password, ip, picture, points, prime, perm, ban, defban, finish, work, date) VALUES(?, ?, ?, ?, ?, 0, 2.500, 0, 0, 0, 0, 0, 0, UNIX_TIMESTAMP())");
                $insertmbr->execute(array($prenom, $nom, $mail, $pass, $ip));

                $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND password = ?");
                $requser->execute(array($mail, $pass));
                $userinfo = $requser->fetch();

                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['key'] = md5(time());
                $requser = $bdd->prepare("UPDATE users SET ip = ? WHERE id = ?");
                $requser->execute(array($_SERVER['REMOTE_ADDR'], $userinfo['id']));

                $reqfinish = $bdd->prepare("SELECT * FROM users WHERE id = ?");
                $reqfinish->execute(array($_SESSION['id']));
                $finish = $reqfinish->fetch();
                  
                if($finish['finish'] == 0) {
                    header("Location: ../index.php?page=finish");
                } else {
                    header("Location: ../index.php");
                }
                
            } else {
                header("Location: ../error.php?id=1");
            }
        } else {
            header("Location: ../error.php?id=1");
        }
    } else {
        header("Location: ../error.php?id=2");
    }
} else {
    header("Location: ../error.php?id=1");
}
?>