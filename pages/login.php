<body>
<?php if(!isset($_SESSION['id'])) { ?>
    <div class="middle">
        <div class="animated">
            <div class="loger">
                <div class="logo">
                    <img class="logo" src="img/mazeratelogo1.png">
                </div>
                <div class="text">
                    <p><font class="bold">R</font>ate <font class="bold">a</font>ll <font class="bold">a</font>round <font class="bold">y</font>ou</p>
                </div>
                <div class="form">
                    <form action="actions/login.php" method="POST" name="login">
                        <input type="email" name="mail" placeholder="E-mail"><br>
                        <input type="password" name="pass" placeholder="Password"><br>
                        <input type="submit" name="login" value="Login"><br>
                    </form>
                </div>
                <br>
                <br>
                <div class="account">
                    <p class="acc">You don't have account ? <a class="login" href="?page=register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<?php } else { header("Location: ?page=home"); } ?>
</html>