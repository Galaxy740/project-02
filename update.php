<?php

session_start();
 
$title = 'Update';
include "includes/header.php";

$flights_id = $_GET['flight'];

$read_query = "SELECT destination_id,`date_departure` dd,destination_point dp, `flights_id`,prurchases_seats, (seats-prurchases_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination ";
$read_query .= "WHERE f.flights_id=". $flights_id;

$result = mysqli_query($conn, $read_query);

$row_flight = mysqli_fetch_assoc($result);

$destination_query = "SELECT * FROM destination";
$destination_result = mysqli_query($conn, $destination_query);



?>
<div class="container">
	<div class="row justify-content-md-center">
		<h2>Update</h2>
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">			
			<form method="post" action="">
				<div class="form-group">
					<label for="product_name">Date picker</label>
					<input type="datetime" class="form-control" id="date_picker" name="date_picker" value="<?= $row_flight['date_departure'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Purchased seats</label>
					<input type="datetime" class="form-control" id="date_picker" name="date_picker" value="<?= $row_flight['prurchases_seats'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Flight code</label>
					<input type="text" class="form-control" id="flight_code" name="flight_code" value="<?= $row_flight['flight_code'] ?>">
				</div>
				<div class="form-group">
					<label for="manufacturer">Example select</label>
					<select class="form-control" id="destination" name="destination_id">
						<?php if(mysqli_num_rows($destination_result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($destination_result)){ ?>

								<option value="<?= $row['destination_id']; ?>" <?php if( $row['destination_id'] == $row_flight['destination_id']) { echo 'selected'; } ?> ><?= $row['destination_point'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">SAVE new flight</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
		
		$flight_code 			= $_POST['flight_code'];
		
		$destination 			= $_POST['destination_id'];
		
		$date_modified 			= date('Y-m-d h:i:s');

		//to do add hidden field product id
		$flight_update_query = "UPDATE flight SET flight_code=" . $flight_code .", ";
		$flight_update_query .= "destination_id=" . (int)$destination . ", ";
		$flight_update_query .= "date_departure=" . $date_modified;
		$flight_update_query .= " WHERE flights_id=" . $flights_id ;
		$result_update = mysqli_query($conn, $flight_update_query);

		// $product_description_update_query = "UPDATE product_description SET name='$product_name'";
		// $product_description_update_query .= " WHERE product_id = $product_id";	
		// 	var_dump($product_description_update_query);
		// $result = mysqli_query($conn, $product_description_update_query);

		if($result){
		// echo "Success!";
			header('Location: read.php');
		} else {
			echo mysqli_error($conn);
		// echo "Please, try again later!";
		}

}



include "includes/footer.php";



