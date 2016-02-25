<?php
	
	// include the connection to the database
	include ("connect.php");
	
	// Make sure that $_POST is set, if not error
	
	if (isset($_POST)) {
		
		// use id from the POST value to return all the values of the selected game
		
		$id = pg_escape_string($connect, $_POST['id']);
		
		$statement = "DELETE FROM GAMES WHERE (ID='$id')";
		
		$result = pg_query($connect, $statement);
		
		$rows = pg_affected_rows($result);
		
		if($rows > 0)
		{
			echo "Deleted row successfully";
			
		} else {
			
			die('Value cannot be found in the database');
			
		}
		
	} else {
		
		die("No information has been passed");
		
	}
	
	// disconnect from the database
	include ("disconnect.php");

?>