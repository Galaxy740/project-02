<?php

session_start();
include "includes/header.php";


$q_read = "SELECT `flights_id`, (seats-prurchases_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id";
$result = mysqli_query($conn, $q_read);
// if(mysqli_num_rows($result) > 0){
// 	while($row = mysqli_fetch_assoc($result)){
// 		echo "<pre>";
// 		var_dump($row);
// 		echo "</pre>";
// 	}
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php 
	if(mysqli_num_rows($result) > 0){
		?>
		<a class="alert-link" href="create.php">Add new language</a>
	<table border=1 class="table table-hover">
		<tr class="warning">
			<td>#</td>
			<td>name</td>
			<td>code</td>
			<td>locale</td>
			<td>image</td>
			<td>directory</td>
			<td>sort order</td>
			<td>status</td>
			<td>Update</td>
			<td>Delete</td>
		</tr>
		
		<?php
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr class="warning">
		<td>
			<?= $row['language_id']?>
		</td>
		<td>
			<?= $row['name']?>
		</td>
		<td>
			<?= $row['code'] ?>
		</td>
		<td>
			<?= $row['locale'] ?>
		</td>
		<td>
			<?= $row['image'] ?>
		</td>
		<td>
			<?= $row['directory'] ?>
		</td>
		<td>
			<?= $row['sort_order'] ?>
		</td>
		<td>
			<?= $row['status'] ?>
		</td>
		<td>
			<a class="btn btn-outline-warning" href="update.php?id=<?=$row['language_id']?>">Update</a>
		</td>
		<?php if (($_SESSION['role']=='admin')) { ?>
		<td>
			<a class="btn btn-outline-danger" href="delete.php?id=<?=$row['language_id']?>">Delete</a>
		</td>
	<?php } ?>
		</tr>
		<?php 
	}
	?>
	</table>
	<?php
	}
	?>
	
</body>
</html>