<?php

session_start();
$title = 'Read';
include "includes/header.php";


$q_read = "SELECT `date_departure` dd,destination_point dp, `flights_id`, (seats-prurchases_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination";
$result = mysqli_query($conn, $q_read);


	
	if(mysqli_num_rows($result) > 0){
?>



        <div class="table100 ver3 m-b-110">
            <table data-vertable="ver3">

		<thead>
        <tr class="row100 head"><?php

            if (!empty($_SESSION)){

            if (!empty($_SESSION["role"])) { ?>
                <th class="column100 column1 " data-column="column1"><a class="btn btn-outline-danger" href="index.php" onclick="session_destroy();" >Sing out</a></th>
                <?php
            }
            }
            ?>
            <th class="column100 column2" data-column="column2">Destination</th>
            <th class="column100 column3" data-column="column3">d&t of departure</th>
            <th class="column100 column4" data-column="column4">Available seats</th>
            <?php	if (($_SESSION['role']=='admin')) { ?>
                <th class="column100 column1" data-column="column5">Modify</th>
                <th class="column100 column1" data-column="column6">del</th>
            <?php } ?>
        </tr>

        </thead>
            <tbody>
		<?php
	while($row = mysqli_fetch_assoc($result)){
		?>
		<tr class="row100">
		<td class="column100 column1">
			<?= $row['flights_id']?>
		</td>
		<td class="column100 column2">
			<?= $row['dp']?>
		</td>
		<td class="column100 column3">
			<?= $row['dd']?>
		</td>
		<td class="column100 column4">
			<?= $row['Available']?>
		</td>

		<?php if ($_SESSION['role']=='admin') {

		    ?>
            <td class="column100 column5">
                <a class="btn btn-outline-warning" href="update.php?id=<?=$row['flight_id']?>">Update</a>
            </td>
            <td class="column100 column5">
                <a class="btn btn-outline-danger" href="delete.php?id=<?=$row['flight_id']?>">Delete</a>
            </td>

	    <?php }// end of session check ?>

		<?php 
	    }//end of while
	    ?>
        </tr>
            </tbody>
        </table>
        </div>



	<?php
	}
	
	if (($_SESSION['role']=='admin')) { ?>
		<a class="alert-link" href="create.php">Add new flight</a>
	<?php 
	} 
	
 

?>

<?php
include 'includes/footer.php';


?>