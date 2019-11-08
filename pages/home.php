<body>
    <?php
        $reqfinish = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $reqfinish->execute(array($_SESSION['id']));
        $finish = $reqfinish->fetch();
        
        if($finish['finish'] == 0) {
              header("Location: index.php?page=finish");
        } else {
              echo "yes";
        }
    ?>

    
</body>
</html>