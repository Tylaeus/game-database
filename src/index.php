<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Include a link to the glyphicons website as part of using them in bootstrap 
		 This will be on the about page once that is added into the table -->

	<title>Game Database</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link href="style.css" rel="stylesheet" type="text/css" >-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
</head>
<body style="padding-top: 70px;">
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Game Database</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a class="view-menu" href="#" data-for=".view"><span class="glyphicon glyphicon-th-large"></span> View Games</a></li>
            <li><a href="#" data-toggle="modal" data-target="#addNewModal"><span class="glyphicon glyphicon-plus"></span> Add Game</a></li>
            <li><a  class="about-menu" href="#" data-for=".about"><span class="glyphicon glyphicon-user"></span> About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="modal fade" id="addNewModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Game</h4>
				</div>
				<form>
				<div class="modal-body">
					<table class="table">
						<tr><td>Game Title: </td>
						<td><input type="text" name="gameTitle" id="gameTitle"></td>
						</tr><tr><td>Game Rating:</td>
						<td><input type="text" name="gameRating" id="gameRating"></td>
						</tr><tr><td>Game Genre:</td>
						<td><input type="text" name="gameGenre" id="gameGenre"></td>
						</tr><tr><td>Game Description:</td>
						<td><input type="text" name="gameDescription" id="gameDescription"></td>
						</tr><tr><td>Game Platform:</td>
						<td><input type="text" name="gamePlatform" id="gamePlatform"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" name="submit" onClick="addGame()">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="editModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div  class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Game</h4>
				</div>
				<form>
				<div class="modal-body">
					<table class="table">
						<tr><td>Game Title: </td>
						<td><input type="text" name="editTitle" id="editTitle"></td>
						</tr><tr><td>Game Rating:</td>
						<td><input type="text" name="editRating" id="editRating"></td>
						</tr><tr><td>Game Genre:</td>
						<td><input type="text" name="editGenre" id="editGenre"></td>
						</tr><tr><td>Game Description:</td>
						<td><input type="text" name="editDescription" id="editDescription"></td>
						</tr><tr><td>Game Platform:</td>
						<td><input type="text" name="editPlatform" id="editPlatform"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" name="submit" id="editGameBtn">Edit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div  class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Confirm Delete</h4>
				</div>
				<form>
				<div class="modal-body">
					Are you sure you want to delete this game?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" name="submit" id="deleteBtn" onClick="deleteGame()" data-id="">Delete</button>
					<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container-fluid">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th class='col-md-6'>Title</th>
		<th class='col-md-3'>Platform</th>
		<th class='col-md-3'></th>
	</tr>
	</thead>
	<tbody>
	<?php
	
	// This is now working so I can get onto the more advanced stuff and get things working properly.
	// Still need to do some research into the best practices for web interfaces to databases.
	// maybe need to change it so the click to expand is only on the title and nothing else.
	// will try this sometime soon so that I can utilise the edit button properly
	// not sure if the edit button is working correctly yet. need to finalise the opening of the modal first.
	// will move this to an external php file at some point, but for now it can stay here to keep it easier to modify.
	
	include ("connect.php");
	
	$sql = "SELECT * FROM GAMES ORDER BY title;";
		
	$ret = pg_query($connect, $sql);
	
	if (!$ret) {
		echo pg_last_error($connect);
	} else {
		while ($row = pg_fetch_assoc($ret)) {
			echo "<tr data-toggle='collapse' data-target='#". $row['id'] ."' class='accordion-toggle'><td>";
			echo $row['title'];
			echo "</td><td>";
			echo $row['platform'];
			echo "</td><td><div class='btn-toolbar'><button class='btn btn-info' type='button' onClick='openEditModal(" . $row['id'] . ")'><span class='glyphicon glyphicon-pencil'></span> Edit</button>";
			echo "<button class='btn btn-danger' type='button' data-toggle='modal' data-target='#deleteModal' onClick='deleteModal(".$row['id'].")' )><span class='glyphicon glyphicon-trash'></span> Delete</button></div></td>";
			echo "</tr><tr>";
			echo "<td colspan='3' style='padding: 0;'><div class='accordion-body collapse' id='".$row['id']."'>";
			echo "<div class='row'>";
			echo "<div class='col col-md-2'>".$row['genre']."</div>";
			echo "<div class='col col-md-2'>".$row['rating']."</div>";
			echo "<div class='col col-md-6'>" . $row['description'] . "</div></div></div></td>";
			echo "</tr>";
		}
	}
	
	include ("disconnect.php");
	
	?>
	
	</tbody>
	</table>
	</div>
	
</body>
</html>