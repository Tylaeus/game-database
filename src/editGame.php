<?php
	
	// include the connection to the database
	include ("connect.php");
	
	// Make sure that $_POST is set, if not error
	
	if (isset($_POST)) {
		
		// use id from the POST value to return all the values of the selected game
		
		$id = pg_escape_string($connect, $_POST['id']);
		$title = pg_escape_string($connect, $_POST['title']);
		$rating = pg_escape_string($connect, $_POST['rating']);
		$genre = pg_escape_string($connect, $_POST['genre']);
		$description = pg_escape_string($connect, $_POST['description']);
		$platform = pg_escape_string($connect, $_POST['platform']);
		
		$statement = "UPDATE GAMES SET (title, rating, genre, description, platform) = ('$title', '$rating', '$genre', '$description', '$platform') WHERE (ID=$id)";
		
		$prepared = pg_query($connect, $statement);
		
		$result = pg_affected_rows($prepared);
		
		if (1 == $result) {
			
			echo "Success";
					
		} else {
			
			die('Value cannot be found in the database');
			
		}
		
	} else {
		
		die("No information has been passed");
		
	}
	
	// disconnect from the database
	include ("disconnect.php");

?>