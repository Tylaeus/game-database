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
		
		echo "<div class='row accordion-toggle' data-toggle='collapse' data-target='#".$row['id']."'>";
		echo "<span class='col-sm-6 col-md-4 col-lg-3'>" . $row['title'] . "</span>";
		echo "<span class='col-sm-6 col-md-4 col-lg-3'>" . $row['platform'] . "</span>";
		echo "<span class='col-sm-12 col-md-8 col-lg-6'>";
		echo "<div class='btn-toolbar'><button class='btn btn-info' type='button' onClick='openEditModal(" . $row['id'] . ")'><span class='glyphicon glyphicon-pencil'></span> Edit</button>";
		echo "<button class='btn btn-danger' type='button' data-toggle='modal' data-target='#deleteModal' onClick='deleteModal(".$row['id'].")' )><span class='glyphicon glyphicon-trash'></span> Delete</button></div>";
		echo "</span></div>";
		echo "<div class='row accordion-body collapse' id='".$row['id']."'>";
		echo "<span class='col-sm-6 col-md-4 col-lg-3'>" . $row['genre'] . "</span>";
		echo "<span class='col-sm-6 col-md-4 col-lg-3'>" . $row['rating'] . "</span>";
		echo "<span class='col-sm-12 col-md-8 col-lg-6'>".$row['description']."</span>";
		echo "</div>";
		
		/*    Keep this in just in case my new ideas do not work properly.
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
		echo "</tr>"; */
	}
}

include ("disconnect.php");

?>
