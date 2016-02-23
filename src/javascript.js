// function to change the submit button on the addNewGame modal to ajax
// enabling a game to be added without redirecting the page to the addGame.php script.

function addGame() {
	
	// set the variables equal to the values from the modal
	var title = document.getElementById('gameTitle').value;
	var rating = document.getElementById('gameRating').value;
	var genre = document.getElementById('gameGenre').value;
	var description = document.getElementById('gameDescription').value;
	var platform = document.getElementById('gamePlatform').value;
	
	// set the string to be sent via ajax to php
	var dataString = 'title=' + title + '&rating=' + rating + '&genre=' + genre +
					 '&description=' + description + '&platform=' + platform;
					 
	if (title == '' || rating == '' || genre == '' || description == '' || platform == '') {
		
		// if any values are empty then alert the user that they need to fill all the fields
		alert("Please fill in all the fields to add a new game.");
	
	} else {
		
		// if all the fields are filled in, pass everything to the php via ajax
		$.ajax({
			type: 'POST',
			url: 'addGame.php',
			data: dataString,
			cache: false,
			success: function() {
				$('#addNewModal').modal('hide');
				document.location.reload();
			}
		});

	}
	return false;
}