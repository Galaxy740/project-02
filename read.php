<body style="background-image: url('images/background.jpg');">
<div class="container">

		<?php

        session_start();

		$title = 'Read';
		include "includes/header.php";

		$q_read = "SELECT `date_departure` dd,destination_point dp, `flights_id`, (seats-prurchases_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination";
		$result = mysqli_query($conn, $q_read);



			if(mysqli_num_rows($result) > 0){
		?>
						<?php 	include "includes/nav/nav.html"; ?>
		        <div class="table100 ver3 m-b-110">
		            <table data-vertable="ver3">

				<thead>

		        <tr class="row100 head">
		            <th class="column100 column1 " data-column="column1"><a class="btn btn-danger" href="includes/modules/logout_module.php"><i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>Sign out</a></th>
								
								<th class="column100 column2" data-column="column2">Destination</th>
		            <th class="column100 column3" data-column="column3">d&t of departure</th>
		            <th class="column100 column4" data-column="column4">Available seats</th>
		            <?php	if (isset($_SESSION['user_type']) == 'admin') { ?>
                    <th class="column100 column5" data-column="column5">Modify</th>
                    <th class="column100 column6" data-column="column6">del</th>
                    <?php }

		            ?>
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

				<?php if (isset($_SESSION['user_type']) == 'admin') {

				    ?>
		            <td class="column100 column5">
		                <a class="btn btn-outline-warning" href="update.php?id=<?=$row['flights_id']?>">Update</a>
		            </td>
		            <td class="column100 column5">
		                <a class="btn btn-outline-danger" href="#?id=<?=$row['flights_id']?>">Delete</a>
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
						if (isset($_SESSION['user_type']) == 'admin') { ?>
							<a class="btn btn-primary" href="create.php">Add new flight</a>
						<?php
                        }
                        elseif (isset( $_SESSION['user_type']) == 'user'){
                            echo "hello";
                        }

			}
?>

		<?php
		include 'includes/footer.php';


		?>

</div>
</body>
