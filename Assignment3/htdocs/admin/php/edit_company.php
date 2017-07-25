<!-- Edits a Leverandør-->
<?php
	require("../../../../../../private/CuU17/include/connect.php");
	if(isset($_GET['id'])){
	$id= $_GET['id'];

	$query = "SELECT * FROM company WHERE id='$id' LIMIT 1";
		$result = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));
		while($row = mysqli_fetch_assoc($result)){
			$name = $row['name'];
			$description = $row['description'];
			$website = $row['website'];
			$image = $row['image'];

			echo "<form>";
			echo "<input type='text' name='name' value='$name'><br>";
			echo "<textarea type='textarea' name='description' value='$description'>$description</textarea><br>";
			echo "<input type='text' name='website' value='$website'><br>";
			echo "<input type='text' name='img' value='$image'><br>";
			echo "</form>";
		}
	}
?>