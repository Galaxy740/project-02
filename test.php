<?php
$('#datetimepicker').datetimepicker({
  format: 'dd/MM/yyyy hh:mm:ss',
  
});
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript"src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

<div id="datetimepicker" class="input-append date">
    <input type="text" placeholder="dd/MM/yyyy hh:mm:ss"/>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
     </span>
</div>
$read_query = "SELECT d.destination_id,`date_departure` dd,destination_point dp, `flights_id`,purchased_seats,flight_code, (seats-purchased_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id ";
$read_query .= "WHERE f.flights_id=" . $flights_id;
>>>>>>> bc536d72529332ca45903cb8bb51dc2ea5a863d0

$result = mysqli_query($conn, $read_query);

$row_flight = mysqli_fetch_array($result);

$destination_query = "SELECT * FROM destination";
$destination_result = mysqli_query($conn, $destination_query);


?>
<<<<<<< HEAD
<div class="container">
	<div class="row justify-content-md-center">
		<h2>Update</h2>
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">			
			<form method="post" action="">
				<div class="form-group">
					<label for="product_name">Date picker</label>
					<input type="datetime-local" class="form-control" id="date_picker" name="date_picker" value="<?= $row_flight['date_departure'] ?>">
				</div>
				<div class="form-group">
					<label for="product_name">Purchased seats</label>
					<input type="text" class="form-control" id="purchased_seats" name="purchased_seats" value="<?= $row_flight['purchased_seats'] ?>">
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
					<button type="submit" name="submit" class="btn btn-success">SAVE changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
		
		$flight_code 			= $_POST['flight_code'];
		$purchased_seats        = $_POST['purchased_seats'];
		$destination 			= $_POST['destination_id'];

		$date_field         = date('Y-m-d H:i:s',strtotime($_POST['date_picker']));
		// var_dump($date_field);
		// die;
		// $date_departure 		= date('Y-m-d h:i:s');

		
		$flight_update_query = "UPDATE flight SET flight_code=" . $flight_code .", ";
		$flight_update_query .="purchased_seats=" . (int)$purchased_seats . ", ";
		$flight_update_query .= "destination_id=" . (int)$destination . ", ";
		$flight_update_query .= "date_departure='$date_field' ";
		$flight_update_query .= "WHERE flights_id = $flights_id";
		// var_dump($flight_update_query)
		$result_update = mysqli_query($conn, $flight_update_query);

		var_dump($result_update);

		if($result){
		// echo "Success!";
			// header('Location: read.php');
		} else {
			echo mysqli_error($conn);
		// echo "Please, try again later!";
		}