<!-- Deletes Leverandør from the database-->
<?php
require("../../../../../../private/CuU17/include/connect.php");
if(isset($_GET['id'])){
	$id= $_GET['id'];

	$query = "DELETE FROM company WHERE id='$id'";
	echo $query;
		mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));

	header('Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php?page=company');

}

?>