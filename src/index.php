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
          </button>
          <a class="navbar-brand" href="#">Game Database</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a class="view-menu" href="#"><span class="glyphicon glyphicon-th-large"></span> View Games</a></li>
            <li><a href="#" data-toggle="modal" data-target="#addNewModal"><span class="glyphicon glyphicon-plus"></span> Add Game</a></li>
            <li><a href="#" data-toggle="modal" data-target="#aboutModal"><span class="glyphicon glyphicon-user"></span> About</a></li>
          </ul>
        </div>
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
	
	<div class="modal fade" id="aboutModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">About</h4>
				</div>
				<div class="modal-body">
					<p>Created By Mark Espie</p>
					<p>Using <a href="http://glyphicons.com">Glyphicons</a></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
	<div class="row">
		<span class="col-sm-6 col-md-4 col-lg-3"><h4>Title</h4></span>
		<span class="col-sm-6 col-md-4 col-lg-3"><h4>Platform</h4></span>
		<span class="col-sm-12 col-md-8 col-lg-6"> </span>
	</div>
		<?php include ("body.php"); ?>
		
	<!--
	<table class="table table-condensed">
	<thead>
	<tr>
		<th class='col-md-6'>Title</th>
		<th class='col-md-3'>Platform</th>
		<th class='col-md-3'></th>
	</tr>
	</thead>
	<tbody>
	
	
	
	</tbody>
	</table>
	-->
	</div>
	
</body>
</html>