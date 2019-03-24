<?php
session_start();

$title = 'Update';
include "includes/header.php";


$flights_id = $_GET['flight'];


$read_query = "SELECT d.destination_id,`date_departure` dd,destination_point dp, `flights_id`,purchased_seats,flight_code, (seats-purchased_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination d ON f.destination_id = d.destination_id ";
$read_query .= "WHERE f.flights_id=". $flights_id;

$result = mysqli_query($conn, $read_query);

$row_flight = mysqli_fetch_assoc($result);

$destination_query = "SELECT * FROM destination";
$destination_result = mysqli_query($conn, $destination_query);


?>

    <div class="container">
        <?php include "includes/nav/nav.php";?>
        <div class="row justify-content-md-center">
            <h2>Update</h2>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-10">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="product_name">Date picker</label>
                        <input type="datetime-local" class="form-control" id="date_picker" name="date_picker" value="<?= date('Y-m-d\TH:i:s',strtotime($row_flight['dd'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Purchased seats</label>
                        <?php
                        if(isset($_SESSION['seat_error'])){
                            echo '<span style="color:#f00">'.$_SESSION['seat_error'].'<span>';
                        }
                        unset($_SESSION['seat_error']);
                        ?>
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
		if ($purchased_seats < $row_flight['Available']) {

		
		$flight_update_query = "UPDATE flight SET flight_code=" . $flight_code .", ";
		$flight_update_query .="purchased_seats=" . (int)$purchased_seats . ", ";
		$flight_update_query .= "destination_id=" . (int)$destination . ", ";
		$flight_update_query .= "date_departure='$date_field' ";
		$flight_update_query .= "WHERE flights_id = $flights_id";
		// var_dump($flight_update_query)
		$result_update = mysqli_query($conn, $flight_update_query);

		//var_dump($result_update);

		if($result){

		} else {
			echo mysqli_error($conn);
		// echo "Please, try again later!";
		}
	}else {
		$_SESSION['seat_error'] = 'is not a valid purchase request !!!';
		//header("Location: update.php?flight=.$flights_id");
		//exit();

		}

}