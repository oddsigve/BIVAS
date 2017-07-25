<?php
require("../../../../../private/CuU17/include/connect.php");
$id1 = null;
$id2 = null;

if(isset($_GET['id1'])){
	$id1 = $_GET['id1'];
}

if(isset($_GET['id2'])){
	$id2 = $_GET['id2'];
}
if($id1 != null && $id2 != null){

	/////////////////////
	// DATABASE ACCESS //
	/////////////////////


	//TOOL 1 AND 2
	$query1 = "SELECT * FROM tool WHERE id='$id1' LIMIT 1";
    
    $result1 = mysqli_query($connect, $query1) or die("Could not get companies to database..." . mysqli_error($connect));

    $row1 = mysqli_fetch_assoc($result1);

    $query2 = "SELECT * FROM tool WHERE id='$id2' LIMIT 1";
    
    $result2 = mysqli_query($connect, $query2) or die("Could not get companies to database..." . mysqli_error($connect));

    $row2 = mysqli_fetch_assoc($result2);




    //THE DIFFERENT SPECS
    $spec_query = "SELECT * FROM specification_dropDown";
    
    $spec_result = mysqli_query($connect, $spec_query) or die("Could not get companies to database..." . mysqli_error($connect));


    $spec_list = array();
    $best_list = array();
    //ADD SpeCS TO ARRAY FOR BEST VALUE AND BEST TOOL AND ADDS THE KEYS TO THE ARRAY
	while ($spec_row = mysqli_fetch_assoc($spec_result)) {
	   	$spec_list[$spec_row['type']] = null;
	   	$best_list[$spec_row['type']] = null;
 	}


	//SPECS FOR FIRST tool
	$spec_query1 = "SELECT * FROM specifications WHERE toolId='$id1'";
    
    $spec_result1 = mysqli_query($connect, $spec_query1) or die("Could not get companies to database..." . mysqli_error($connect));

    //Since this is the first tool all values is the best
	while ($spec_row1 = mysqli_fetch_assoc($spec_result1)) {
	   	$spec_list[$spec_row1['type']] = $spec_row1['value'];
	   	$best_list[$spec_row1['type']] = $id1;
 	}


 	//SPECS FOR SECOND tool
	$spec_query2 = "SELECT * FROM specifications WHERE toolId='$id2'";
    
    $spec_result2 = mysqli_query($connect, $spec_query2) or die("Could not get companies to database..." . mysqli_error($connect));

    //Since this is the first tool all values is the best
	while ($spec_row2 = mysqli_fetch_assoc($spec_result2)) {
		if($spec_row2['value'] ==  $spec_list[$spec_row2['type']]){
	   		$spec_list[$spec_row2['type']] = $spec_row2['value'];
	   		$best_list[$spec_row2['type']] = "both";
 		}

		if($spec_row2['value'] >  $spec_list[$spec_row2['type']]){
	   		$spec_list[$spec_row2['type']] = $spec_row2['value'];
	   		$best_list[$spec_row2['type']] = $id2;
 		}
 	}

    /////////////////////////
    // DECLARING VARIABLES //
    /////////////////////////

    //FIRST TOOL
    $name1 = $row1['name'];
    $company1 = $row1['company'];
    $image1 = $row1['image'];

    //SECOND TOOL
    $name2 = $row2['name'];
    $company2 = $row2['company'];
    $image2 = $row2['image'];
	}
	?>

<div id="tool1">
	<img src=<?php echo $image1;?>/>
	<p><?php echo $name1?></p>
	<p><?php echo $company1?></p>

	<?php 	
	$spec_query1 = "SELECT * FROM specifications WHERE toolId='$id1'";
    
    $spec_result1 = mysqli_query($connect, $spec_query1) or die("Could not get companies to database..." . mysqli_error($connect));

    //Since this is the first tool all values is the best
	while ($spec_row1 = mysqli_fetch_assoc($spec_result1)) {
		# code...
	
	   	$type1 = $spec_row1['type'];
	   	$value1 = $spec_row1['value'];
	   	$measurement1 = $spec_row1['measurement'];
	   	if($type1 != null && $type1 != ""){
	   		echo "<p style='display:inline-block'>$type1 $value1 $measurement1     </p>";
	   	}
	   	if($best_list[$spec_row1['type']] == $id1 || $best_list[$spec_row1['type']] == "both"){
	   		if($best_list[$spec_row1['type']] == "both"){
	   			echo "<p style='display:inline-block; font-size:48px; color: #FFA500;'><b>=</b></p>";
	   		}else{
	   			echo "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true' style='color:green;'></i>";
	   		}
	   	}else{
	   		if($best_list[$spec_row1['type']] != "" || $best_list[$spec_row1['type']] != null ){
	   			echo "<i class='fa fa-window-close-o fa-2x' aria-hidden='true' style='color:red;'></i>";
	   		}
	   	}
	   	echo "<br>";

 	}

 	?>
</div>

<div id="tool2">
	<img src=<?php echo $image2;?>/>
	<p><?php echo $name2?></p>
	<p><?php echo $company2?></p>

	<?php 	
	$spec_query1 = "SELECT * FROM specifications WHERE toolId='$id2'";
    
    $spec_result1 = mysqli_query($connect, $spec_query1) or die("Could not get companies to database..." . mysqli_error($connect));

    //Since this is the first tool all values is the best
	while ($spec_row1 = mysqli_fetch_assoc($spec_result1)) {
		# code...
	
	   	$type1 = $spec_row1['type'];
	   	$value1 = $spec_row1['value'];
	   	$measurement1 = $spec_row1['measurement'];
	   	if($type1 != null && $type1 != ""){
	   		echo "<p style='display:inline-block'>$type1 $value1 $measurement1     </p>";
	   	}
	   	if($best_list[$spec_row1['type']] == $id1 || $best_list[$spec_row1['type']] == "both"){
	   		if($best_list[$spec_row1['type']] == "both"){
	   			echo "<p style='display:inline-block; font-size:48px; color: #FFA500;'><b>=</b></p>";
	   		}else{
	   			echo "<i class='fa fa-check-circle-o fa-2x' aria-hidden='true' style='color:green;'></i>";
	   		}
	   	}else{
	   		if($best_list[$spec_row1['type']] != "" || $best_list[$spec_row1['type']] != null ){
	   			echo "<i class='fa fa-window-close-o fa-2x' aria-hidden='true' style='color:red;'></i>";
	   		}
	   	}
	   	echo "<br>";

 	}

 	?>
</div>