<body>
<?php if(!isset($_SESSION['id'])) { ?>
    <div class="middle">
        <div class="animated fadeInDown slow">
            <img src="img/huawei.png">
        </div>
        <div class="animated fadeInUp slow delay-500ms">
            <div class="reger">
                <div class="logo">
                    <img class="logo" src="img/mazeratelogo1.png">
                </div>
                <div class="text">
                    <p><font class="bold">R</font>ate <font class="bold">a</font>ll <font class="bold">a</font>round <font class="bold">y</font>ou</p>
                </div>
                <div class="form">
                    <form action="actions/register.php" method="POST" name="reg">
                        <input type="email" name="mail" placeholder="E-mail"><br>
                        <input type="text" name="prenom" placeholder="Firstname"><br>
                        <input type="text" name="nom" placeholder="Name"><br>
                        <input type="password" name="pass" placeholder="Password"><br>
                        <input type="submit" name="reg" value="Register"><br>
                    </form>
                </div>
                <div class="cgu">
                    <p class="cgu">We hope you going to enjoy the new version of social networks. Rate your friends every days with this app. <br><br>This application and website was created by Kellis LE LOUËR aka. Gumbraise.</p>
                </div>
                <br>
                <br>
                <div class="account">
                    <p class="acc">You already have an account ? <a class="login" href="?page=login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
<?php } else { header("Location: ?page=home"); } ?>
</body>
</html>