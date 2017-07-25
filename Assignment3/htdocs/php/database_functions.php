<?php

	
	function delete($connect, $id, $table){
        $query = "DELETE FROM " . $table . " WHERE id=" . $id;
        $row = mysqli_query($connect, $query) or die("Could not get companies to database..." . mysqli_error($connect));

        if($table == "tool"){
        	$spec_query = "DELETE FROM specifications WHERE toolId=" . $id;
        	$row = mysqli_query($connect, $spec_query) or die("Could not get companies to database..." . mysqli_error($connect));
        }
        mysqli_close($connect);

    }
?>