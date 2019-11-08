<body>
    <div class="hidden"></div>
    <?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');
    
    include("pages/error.php");
        if(isset($_GET['id'])){
            switch ($_GET['id']) {
                case 1 :
                    echo "<div class='middle'><p class='error'><font class='texterror'>You already have an account, please login</font></p></div>";
                    break;
                case 2 :
                    echo "<div class='middle'><p class='error'><font class='texterror'>There are blanks. Re-test</font></p></div>";
                    break;
                case 3:
                    echo "<div class='middle'><p class='error'><font class='texterror'>There are blanks. Re-test</font></p></div>";
                    break;
                case 4:
                    echo "<div class='middle'><p class='error'><font class='texterror'>You're actually not connected to this service</font></p></div>";
                    break;
                default:
                    echo "<div class='error'><p class='error'>404<br><br><font class='texterror'>There is nothing here :/</font></p></div>";
                    break;
            }
        }
        else
        {
            echo "<div class='error'><p class='error'>404<br><br><font class='texterror'>There is nothing here :/</font></p></div>";
        }
    ?>
</body>
</html>