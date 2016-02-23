<?php
	
	// include the connection to the database
	include ("connect.php");
	
	// Make sure that $_POST is set, if not error
	
	if (isset($_POST)) {
		
		// save all the POST VALUES
		// Check that all the values are set, and valid (error check)
		// If all ok, continue to add the record to the database.
		// If not ok, re-route back to the pop up and show errors
		
		$title = pg_escape_string($_POST['title']);
		$rating = pg_escape_string($_POST['rating']);
		$genre = pg_escape_string($_POST['genre']);
		$description = pg_escape_string($_POST['description']);
		$platform = pg_escape_string($_POST['platform']);
		
		$statement = "INSERT INTO GAMES (title, rating, genre, description, platform) VALUES ('$title', '$rating', '$genre', '$description', '$platform')";
		
		$prepared = pg_query($connect, $statement);
		
		$result = pg_affected_rows($prepared);
		
		if ($result > 0) {
			
			echo "Success";
			
		} else {
			
			return;
			
		}
		
	} else {
		
		die("No information has been passed");
		
	}
	
	// disconnect from the database
	include ("disconnect.php");

?>