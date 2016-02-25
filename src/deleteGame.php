<?php
	
	// include the connection to the database
	include ("connect.php");
	
	// Make sure that $_POST is set, if not error
	
	if (isset($_POST)) {
		
		// use id from the POST value to return all the values of the selected game
		
		$id = pg_escape_string($connect, $_POST['gameID']);
		
		$statement = "SELECT * FROM GAMES WHERE (ID='$id')";
		
		$result = pg_query($connect, $statement);
		
		if($result)
		{
			// create the JSON string to be returned to original caller
			while ($row = pg_fetch_assoc($result)) 
			{
				$data = array("title" => $row['title'], "rating" => $row['rating'],
							 "genre" => $row['genre'], "description" => $row['description'],
							 "platform" => $row['platform']);
			}
			
			echo json_encode($data);
			
		} else {
			
			die('Value cannot be found in the database');
			
		}
		
	} else {
		
		die("No information has been passed");
		
	}
	
	// disconnect from the database
	include ("disconnect.php");

?>