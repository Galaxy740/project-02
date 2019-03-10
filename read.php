<?php

session_start();
include "includes/header.php";
$title = 'Read';

$q_read = "SELECT `date_departure` dd,destination_point dp, `flights_id`, (seats-prurchases_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination";
$result = mysqli_query($conn, $q_read);


	
	if(mysqli_num_rows($result) > 0){
?>
	<table border=1 class="table table-hover">
		<tr class="warning">
			<td>#</td>
			<td>Destination</td>
			<td>d&t of departure</td>
			<td>Available seats</td>
		<?php	if (($_SESSION['role']=='admin')) { ?>
			<td>***</td>
			<td>***</td>
		<?php } ?>
		</tr>
		
		<?php
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr class="warning">
		<td>
			<?= $row['flights_id']?>
		</td>
		<td>
			<?= $row['dp']?>
		</td>
		<td>
			<?= $row['dd']?>
		</td>
		<td>
			<?= $row['Available']?>
		</td>
		<?php if (($_SESSION['role']=='admin')) { ?>
		<td>
			<a class="btn btn-outline-warning" href="update.php?id=<?=$row['flight_id']?>">Update</a>
		</td>
		<td>
			<a class="btn btn-outline-danger" href="delete.php?id=<?=$row['flight_id']?>">Delete</a>
		</td>
	<?php } ?>
		</tr>
		<?php 
	}
	?>
	</table>
	<?php
	}
	
	if (($_SESSION['role']=='admin')) { ?>
		<a class="alert-link" href="create.php">Add new flight</a>
	<?php 
	} 
	
 
include 'includes/footer.php';
?>