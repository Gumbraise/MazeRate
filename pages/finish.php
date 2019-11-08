<body>
    <?php
        $reqfinish = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $reqfinish->execute(array($_SESSION['id']));
        $finish = $reqfinish->fetch();
        
        if($finish['finish'] == 1) {
            header("Location: index.php");
        }
    ?>

    <div class="middle">
        <form method="POST" action="actions/upload.php" name="upload" enctype="multipart/form-data">
            <div class="cercle">
                <i class="fas fa-camera fa-4x"></i>
                <input type="hidden" name="upload" value="upload">
                <input type="file" name="image" onchange="form.submit()">
            </div>
            <div class="upload">
                <p class="upload"><font class="strong">U</font>pload <font class="strong">a p</font>rofile <font class="strong">p</font>icture</p>
            </div>
        </form>
    </div>
</body>
</html>