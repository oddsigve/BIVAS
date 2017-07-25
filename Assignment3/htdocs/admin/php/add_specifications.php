<!-- Adds Spsifikasjoner to the databse -->
<?php

require("../../../../../../private/CuU17/include/connect.php");

if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$errors = array();

	if (isset($_POST['type'])) {
		$type =trim($_POST['type']);
	} else  {
		$errors[] = 'Please enter the company name!';
	}
	
	$type = mysqli_real_escape_string($connect, $_POST['type']);

	$query = "INSERT INTO specification_dropDown (type)
		VALUES ('$type')";
	mysqli_query($connect, $query) or die("Could not add $type to database..." . mysqli_error($connect));

	echo "<p>$type has been added to the database </p>";
	}
?>