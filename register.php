<?php

session_start();

$title = 'Register';
include "includes/header.php";
?>
    <form action="" method="post">
        <input type="text" id="first_name" class="fadeIn second" name="first_name" placeholder="first name">
        <input type="text" id="last_name" class="fadeIn third" name="last_name" placeholder="last name">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">

        <button type="submit" class="btn" name="reg_user">Register</button>
    </form>


    <div id="formFooter">
        <a class="underlineHover" href="index.php">Sign in</a>
    </div>
    <div id="formFooter">
        <a class="underlineHover" href="index.php" onclick="<?php session_destroy(); ?>">Back</a>
    </div>
    </div>
    </div>


<?php
// initializing variables
// $username = "";

// $errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project_02');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);

    $password = mysqli_real_escape_string($db, $_POST['password']);

    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);

    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);

    $user_check_query = "SELECT * FROM user WHERE username='" . $username . "'";
    $result = mysqli_query($db, $user_check_query);
    
    if(mysqli_num_rows($result) > 0){
        echo "taken";
    }else{
        $query = "INSERT INTO user (username, password, first_name, last_name) VALUES ('$username', '$password', '$first_name', '$last_name')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        header('location: read.php');
    }
}

include "includes/footer.php";