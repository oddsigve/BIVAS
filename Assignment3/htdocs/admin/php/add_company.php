<!-- Adds Leverandærer to the databse -->
<style type="text/css">
	
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('http://bradsknutson.com/wp-content/uploads/2013/04/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
	}

</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	})
</script>
<div class="loader"></div>
	<?php
	
	require("../../../../../../private/CuU17/include/connect.php");
	$msg = null;
	if (mysqli_connect_errno()) {
  		$msg =  "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$errors = array();

		if (isset($_POST['name'])) {
			$name =trim($_POST['name']);
		} else  {
			$errors[] = 'Please enter the company name!';
		}
		
		if (isset($_POST['description'])) {
			$description =trim($_POST['description']);
		} else  {
			$errors[] = 'Please enter a description!';
		}

		if (isset($_POST['website'])) {
			$website =trim($_POST['website']);
		} else  {
			$errors[] = 'Please enter a website!';
		}

		$target_dir = "/var/www/dikult205/public/CuU17/Assignment3/uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$image_link = "https://dikult205.k.uib.no/CuU17/Assignment3/uploads/" . basename($_FILES["fileToUpload"]["name"]);

		// Check if image file is a actual image or fake image

		/*if(isset($_POST["submit"]) && isset($_FILES['file'])) {
		    $file_temp = $_FILES['file']['tmp_name'];   
		    $info = getimagesize($file_temp);
		} else {
		    print "File not sent to server succesfully!";
		    exit;
}*/

		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $msg = "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $msg = "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    $msg = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		       $msg ="Leverandør har blitt lagt til i databasen!";
		    } else {
		        $msg = "Sorry, there was an error uploading your file.";
		    }
		}
	
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);

	$query = "INSERT INTO company (name, description, website, image)
		VALUES ('$name', '$description', '$website', '$image_link')";
	mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	$err = "true";
	if($msg == "Leverandør har blitt lagt til i databasen!"){
		$err = "false";
	}
	header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php?page=company&err=$err&msg=$msg");
	}
?>