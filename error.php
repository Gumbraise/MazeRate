<?php
echo '
<body>
    <div class="hidden"></div>';
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=mazerate', 'root', '');
    
    include("pages/error.php");
        if(isset($_GET['id'])){
            switch ($_GET['id']) {
                case 1 :
                    include("pages/errors/".$_GET['id'].".php");
                    break;
                case 2 :
                    include("pages/errors/".$_GET['id'].".php");
                    break;
                case 3:
                    include("pages/errors/".$_GET['id'].".php");
                    break;
                default:
                    include("pages/errors/404.php");
                    break;
            }
        }
        else
        {
            include("pages/errors/404.php");
        }
echo '
</body>
</html>';