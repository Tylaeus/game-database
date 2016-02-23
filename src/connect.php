<?php

	// Connect to the database
	
	$host = "host=localhost";
	$port = "port=5432";
	$dbname = "dbname=Games_List";
	$credentials="user=postgres password=Nephilim89!";
	$connect = pg_connect("$host $port $dbname $credentials");
	
	if (!$connect) {
		die("Error: Unable to open database");
	}

?>