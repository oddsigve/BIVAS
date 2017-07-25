<?php
session_start();
    if($_SESSION['status'] == "online"){
    }else{
        header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>BIV Admin</title>
    <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width" initial-scale="1" />
    <link rel="stylesheet" type="text/css" href="css/components.css">
    <link rel="stylesheet" type="text/css" href="css/content_main.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/topNav.css">
    <script src="js/functions.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="img/bivLogoMini.ico" />
    
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">  
</head>
<body>
    <div id="container">
        <?php
            include "../php/html_generator.php";
            include "pages/header.php";
            include "pages/topNav.php";
        ?>
        <nav id="page">
            <?php
            $msg = null; 
            $err = null;
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
            }

            if(isset($_GET['err'])){
                $err = $_GET['err'];
            }
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch($page) {
                        case 'company':
                            include "pages/company.php";
                            break;
                        case 'category':
                            include "pages/category.php";
                            break;
                        case 'specifications':
                            include "pages/specifications.php";
                            break;
                        case 'tool':
                            include "pages/tool.php";
                            break;
                        case 'edit':
                            if(isset($_GET['id']) && isset($_GET['table'])){
                                $id = $_GET['id'];
                                $table = $_GET['table'];
                                include "pages/edit.php";
                            }else{
                                echo "<p>Du mangler id eller table</p>";
                            }
                        default:
                    }
                }else{
                   include "pages/content_main.php";
                }
            ?>
        </nav>
        <?php
            include "pages/footer.php";
        ?>
    </div>
</body>
</html>
