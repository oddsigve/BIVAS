<!DOCTYPE html>
<html>
<head>
    <title>BIV AS</title>
	<link href="css/about.css" rel="stylesheet" type="text/css">
    <link href="css/company.css" rel="stylesheet" type="text/css">
    <link href="css/contact.css" rel="stylesheet" type="text/css">
    <link href="css/content_main.css" rel="stylesheet" type="text/css">
    <link href="css/footer.css" rel="stylesheet" type="text/css">
    <link href="css/header.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link href="css/nav_bottom.css" rel="stylesheet" type="text/css">
    <link href="css/item-display-x1.css" rel="stylesheet" type="text/css">
    <link href="css/item-display-x4.css" rel="stylesheet" type="text/css">
    <link href="css/item-display-h3.css" rel="stylesheet" type="text/css">
    <link href="css/top_nav.css" rel="stylesheet" type="text/css">
    
	<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet"> 


    <link rel="shortcut icon" type="image/x-icon" href="img/bivLogoMini.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
</head>
<body>
    <div id="container">
    	<?php
    		$id=null;
    		$company=null;
    		$category=null;
            $search=null;
    	?>
    	<?php
        //includes the header and main navigation
    	 include "pages/header.php";
    	 include "pages/top_nav.php";
    	 ?>
        	 <section>
            	 <?php
                 //checks if page is set and gets the pages: tool, company, category, contact, about, news, search and content_main.
            		if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            switch($page) {
                                case 'tool':
                                	if(isset($_GET['id'])){
                                		$id = $_GET['id'];
                                		include "pages/tool.php";
                                	}else{
                                		include "error.php";
                                	}
                                    break;
                                case 'company':
                                	if(isset($_GET['company'])){
                                		$company = $_GET['company'];
                                		include "pages/company.php";
                                	}else{
                                		include "error.php";
                                	}
                                    break;
                                case 'category':
                                	if(isset($_GET['category'])){
                                		$category = $_GET['category'];
                                		include "pages/category.php";
                                	}else{
                                		include "error.php$cause=id";
                                	}
                                    break;
                                case 'contact':
                                		include "pages/contact.php";
                                    break;
                                case 'about':
                                		include "pages/about.php";
                                    break;
                                case 'news':
                                        include "pages/news.php";
                                     break;
            				default:
            				
                            }
            		}else {
            			if(isset($_GET['search'])) {

                            $search = $_GET['search'];
                            include "pages/search.php";
                        }else {

                            include "pages/content_main.php";
                        }
            		}
            	?>
        	</section>
    	<?php
        //includes the logonavigation and the footer to the index
    	include "pages/nav_bottom.php";
    	include "pages/footer.php";
    	?>
    </div>
</body>
</html>