<?php
     session_start();

     $bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');

     if(isset($_POST['upload'])) {
          $image = "";
          $image .= $_FILES['image']['name'];

          $dossier = '../img/picture/';
          $fichier = basename($_FILES['image']['name']);

          $target_dir = "../img/picture/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


          if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

               $temp = explode(".", $_FILES["image"]["name"]);
               $newfilename = round(microtime(true)) . '.' . end($temp);
               move_uploaded_file($_FILES["image"]["tmp_name"], $dossier . $newfilename);

               if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $newfilename))
               {
                    echo 'Echec de l\'upload !';
               }
               else
               {
                    echo 'Upload effectué avec succès !';
                    $requser = $bdd->prepare("UPDATE users SET picture = ? WHERE id = ?");
                    $requser->execute(array($newfilename, $_SESSION['id']));
                    $requser = $bdd->prepare("UPDATE users SET finish = 1 WHERE id = ?");
                    $requser->execute(array($_SESSION['id']));
                    header("Location: ../?page=profile&id=". $_SESSION['id']);
               }
          }
          else
          {
               echo 'Mauvais format';
               echo $image;
               echo $dossier;
          }
     }
     else
     {
          header("Location: ../index.php");
     }
    
?>