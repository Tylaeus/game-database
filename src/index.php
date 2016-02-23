<!DOCTYPE html>
<html>
<head>
	<title>Game Database</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link href="style.css" rel="stylesheet" type="text/css" >-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
</head>
<body style='padding-top:70px;'>
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
            <li class="active"><a class="view-menu" href="#" data-for=".view">View Games</a></li>
            <li><a href="#" data-toggle="modal" data-target="#addNewModal">Add Game</a></li>
            <li><a  class="about-menu" href="#" data-for=".about">About</a></li>
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
				<form action="addGame.php" method="POST">
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
	
	<!-- KEPT IN JUST FOR REFERENCE PURPOSES, WILL BE REMOVED LATER ON
	
	<div class="container">
		<div class="row">
			<div class = "col-xs-6 col-sm-3" style = "background-color: #dedef8;
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
      
      <div class = "col-xs-6 col-sm-3" style = "background-color: #dedef8;
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
            enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat.</p>
         
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
            eiusmod tempor incididunt ut.</p>
      </div>

      <div class = "clearfix visible-xs"></div>
      
      <div class = "col-xs-6 col-sm-3" style = "background-color: #dedef8;
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         
         <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco 
            laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      
      <div class = "col-xs-6 col-sm-3" style = "background-color: #dedef8;
         box-shadow: inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
            enim ad minim</p>
      </div>
	</div> -->
	<div class="well">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Title</th>
		<th>Platform</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
	
	// This is now working so I can get onto the more advanced stuff and get things working properly.
	// Still need to do some research into the best practices for web interfaces to databases.
	
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
			echo "</td><td><a href='#' data-toggle='modal' data-target='#editModal' name=" . $row['id'] . ">Edit</a>";
			echo "</td></tr><tr>";
			echo "<td colspan='3' style='padding: 0;'><div class='accordion-body collapse' id='".$row['id']."'>" . $row['description'] . "</td>";
			echo "</tr>";
		}
	}
	
	include ("disconnect.php");
	
	?>
	</tbody>
	</table>
	</div>
	  
	</div>
	
</body>
</html>