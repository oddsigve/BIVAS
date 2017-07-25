<?php
	// remove all session variables
	session_start();
	$_SESSION = [];
	session_unset();
	session_destroy(); 
	 

	// destroy the session 

	session_regenerate_id(true);
	echo "session destroyed";
	header("Location: https://dikult205.k.uib.no/CuU17/Assignment3/htdocs/");
?>