<?php
	//process spesifikasjoner
	require("../../../../../../private/CuU17/include/connect.php");

    if(isset($_POST['spec']) && !empty($_POST['spec'])) {

    		$spec = $_POST['spec'];
    		$query = "SELECT * FROM specification_dropDown WHERE type='$spec'";
			$result = mysqli_query($connect, $query) or die("Could not get categories to database..." . mysqli_error($connect));
			
			while($row = mysqli_fetch_assoc($result)){
				$type = $row['measurment'];
			}

        echo json_encode(array("array"=>$type));
    }
?>