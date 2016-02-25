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
		// this also now closes the modal and reloads the main page.
		
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

function openEditModal(id) {
	
	// open the edit modal and add the details of the currently selected game
	
	var gameID = id;
	var dataString = 'gameID=' + gameID;
	
	$.ajax({
		type: 'POST',
		url: 'viewGame.php',
		data: dataString,
		dataType: 'json',
		cache: false,
		success: function(data) {
			var result = data;
			$('#editTitle').val(result['title']);
			$('#editRating').val(result['rating']);
			$('#editGenre').val(result['genre']);
			$('#editDescription').val(result['description']);
			$('#editPlatform').val(result['platform']);
			document.getElementById('editGameBtn').setAttribute('onclick', 'editGame(' + gameID + ')');
		}
	});
	
	$('#editModal').modal('show');
	
	return;
	
}

function editGame(id) {
	
	// apply the edit changes and update the database to reflect them
	
	// ajax to send the updated details to the database and update the game chosen
	// this will send to the edit game php file and return if it is successful or not.
	// alert only if this doens't work properly.
	
	var gameID = id;
	var title = document.getElementById('editTitle').value;
	var rating = document.getElementById('editRating').value;
	var genre = document.getElementById('editGenre').value;
	var description = document.getElementById('editDescription').value;
	var platform = document.getElementById('editPlatform').value;
	
	var dataString = "id=" + gameID + "&title=" + title + "&rating=" + rating + "&genre=" + genre +
					 "&description=" + description + "&platform=" + platform;
					 
	if ('' == title || '' == rating || '' == genre || '' == description || '' == platform)
	{
		
		alert("Please make sure none of the fields are empty");
		
	} else {
		
		$.ajax({
			type: 'POST',
			url: 'editGame.php',
			data: dataString,
			cache: false,
			success: function(data) {
				$('#editModal').modal('hide');
				document.location.reload();
			}
		});
		
	}
	
	return;
	
}

function deleteModal(id) {
	var btn = document.getElementById('deleteBtn');
	var gameID = id;
	
	btn.setAttribute('data-id', gameID);
}

function deleteGame() {
	
	// This function will pop up a window for confirmation of the deletion oof the selected item
	
	var btn = document.getElementById('deleteBtn');
	var gameID = $(btn).data("id");
	
	var dataString = "id=" + gameID;
	
	$.ajax({
		type: 'POST',
		url: 'deleteGame.php',
		data: dataString,
		cache: false,
		success: function(data) {
			alert(data);
			$('#deleteModal').modal('hide');
			document.location.reload();
		}
	});
	
}