<?php
require("../../../../../private/CuU17/include/connect.php");
if($id != null && $table != null){
	//switch for handling edit selection
	switch($table){
		case "company":
			print_edit_company($id, $connect);
			break;
		case "category":
			print_edit_category($id, $connect);
			break;
		case "specification":
			print_edit_specification($id, $connect);
			echo "<p>edit</p>";
			break;
		case "tool":
			print_edit_tool($id, $connect);
			break;
	}
}
?>