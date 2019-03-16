<?php

session_start();
$title = "Modify";
include "includes/header.php";

//var_dump($_GET);
if (!empty($_GET)) {
    $id = $_GET['id'];
    $update_query = "SELECT * FROM  `Available`  WHERE id = $id;";
    $result = mysqli_query($conn, $update_query);
    var_dump($result);
}
?>




<?php
include "includes/footer.php";

?>

