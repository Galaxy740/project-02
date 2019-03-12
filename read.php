<?php

session_start();
$title = 'Read';
include "includes/header.php";


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
<div class="table100 ver3 m-b-110">
    <table data-vertable="ver3">
        <thead>
        <tr class="row100 head">
            <th class="column100 column1" data-column="column1"></th>
            <th class="column100 column2" data-column="column2">Sunday</th>
            <th class="column100 column3" data-column="column3">Monday</th>
            <th class="column100 column4" data-column="column4">Tuesday</th>
            <th class="column100 column5" data-column="column5">Wednesday</th>
            <th class="column100 column6" data-column="column6">Thursday</th>
            <th class="column100 column7" data-column="column7">Friday</th>
            <th class="column100 column8" data-column="column8">Saturday</th>
        </tr>
        </thead>
        <tbody>
        <tr class="row100">
            <td class="column100 column1" data-column="column1">Lawrence Scott</td>
            <td class="column100 column2" data-column="column2">8:00 AM</td>
            <td class="column100 column3" data-column="column3">--</td>
            <td class="column100 column4" data-column="column4">--</td>
            <td class="column100 column5" data-column="column5">8:00 AM</td>
            <td class="column100 column6" data-column="column6">--</td>
            <td class="column100 column7" data-column="column7">5:00 PM</td>
            <td class="column100 column8" data-column="column8">8:00 AM</td>
        </tr>

    
        </tbody>
    </table>
</div>
