<?php 
session_start();
$title = 'Create';
include "includes/header.php";

$destination_query = "SELECT * FROM destination";
$destination_result = mysqli_query($conn, $destination_query);

?>
<div class="container">
	<div class="row justify-content-md-center">
		
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">			
			<form method="post" action="">

					
						<div class="form-group">
							<label for="destination">Destination select</label>
								<select class="form-control" id="destination" name="destination_id">
									<?php if(mysqli_num_rows($destination_result) > 0){ ?>
							
										<?php while($row = mysqli_fetch_assoc($destination_result)){ ?>

									<option value="<?= $row['destination_id'] ?>"><?= $row['destination_point'] ?></option>

									<?php } ?>

								<?php } ?>
								</select>
						</div>
						<div class="form-group">
						<label for="flight_code">Flight code</label>
						<input type="text" class="form-control" id="flight code" name="flight_code" placeholder="flight code here ...">
					</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-success">Save</button>
							</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
		
		$destination_point 	= $_POST['destination_id'];
		$date_departure 	= date('Y-m-d h:i:s');
		$flight_code = $_POST['flight_code'];

		$flight_create_query = "INSERT INTO flight (flight_code, date_departure, destination_id)";
		
		$flight_create_query .= " VALUES ('" . $flight_code . "', '" . $date_departure . "', " . (int)$destination_point . ")";
		
		$result = mysqli_query($conn, $flight_create_query);

		// $last_destination_id = mysqli_insert_id($conn);
		
		// $destination_create_query = "INSERT INTO destination (destination_id, destination_point)";
		// $destination_create_query .= " VALUES (" . (int)$destination_id . ", '" . $destination_point . "')";
		
		// $result = mysqli_query($conn, $destination_create_query);

		if($result){
		// echo "Success!";
			header('Location: read.php');
		} else {
			echo mysqli_error($conn);
		// echo "Please, try again later!";
		}
	}
include 'includes/footer.php';
?>
