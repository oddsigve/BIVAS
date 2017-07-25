<?php
	require_once("database_functions.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	if(isset($_GET['table'])){
		$table = $_GET['table'];
	}
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}

	if($id != null && $table != null && $page != null){
		delete($id, $table);
		header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/admin/admin.php?page=$page");
	}

?>