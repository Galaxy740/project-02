<?php
session_start();
include 'includes/db_connect.php';

$id = $_GET['flight'];

$delete_flight = "DELETE FROM `flight` WHERE `flights_id`=$id";
$result = mysqli_query($conn, $delete_flight);

if($result){
	header('Location: read.php');
} else {
	//echo mysqli_error($conn);
}