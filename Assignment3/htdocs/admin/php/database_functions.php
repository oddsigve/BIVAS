<!-- Deletes from databse based on id-->
<?php
	function delete($id, $table){
		$query = "DELETE FROM $table WHERE id='$id'";
		mysqli_query($connect, $query) or die("Could not add $name to database..." . mysqli_error($connect));
	}
?>