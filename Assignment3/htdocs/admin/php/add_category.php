<!-- Adds Kategorier to the databse -->
<?php
require("../../../../../../private/CuU17/include/connect.php");

if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	$errors = array();

	if (!empty($_POST['type'])) {
		$type =trim($_POST['type']);
	} else  {
		$errors[] = 'Please enter the category!';
	}

	if($type != null){
		$query = "INSERT INTO category (type) VALUES ('$type')";
		mysqli_query($connect, $query) or die("Could not add $type to database..." . mysqli_error($connect));
		header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php?page=category");
	}
}

?>