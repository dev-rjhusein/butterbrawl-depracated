<?php

function connDB(){
	global $connection;
	
	// connect to the database
	$connection = new mysqli("localhost",'user','booger420',"family_weight_tracker");

	// if failed
	if (mysqli_connect_errno()){
		printf("Connection failed: %s\n ",mysqli_connect_error());
		exit();
	}
}

?>