<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');
if(isset($_POST['login'])){
      $mail = $_POST['mail'];
      $pass = sha1($_POST['pass']);
      if(!empty($mail) AND !empty($pass)) {
            $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND password = ?");
            $requser->execute(array($mail, $pass));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
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
                  header("Location: register.php?e=You don't have an account!");
            }
      } else {
            header("Location: login.php?e=Some areas are empty!");
      }
} else { 
      header("Location: ../login.php"); 
}
?>
