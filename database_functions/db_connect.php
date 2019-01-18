<!-- The use of this script relies on database_functions/debug/resetUserAccoutTable.php being ran first -->

<?php

function connDB(){
	global $connection;
	
	//Connect to the database
	$connection = new mysqli("localhost",'user','password',"database_name");

	// if failed
	if (mysqli_connect_errno()){
		printf("Connection failed: %s\n ",mysqli_connect_error());
		exit();
	}
}

?>