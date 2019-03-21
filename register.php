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

    </div>



////////////////////////////////////////////////////////////////////////////////
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>



                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-1" type="text" name="phone">
                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" href="includes/modules/logout_module.php" >Back</button>
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="includes/register-form/vendor/jquery/jquery.min.js"></script>

    <script src="includes/register-form/vendor/select2/select2.min.js"></script>
    <script src="includes/register-form/vendor/datepicker/moment.min.js"></script>
    <script src="includes/register-form/vendor/datepicker/daterangepicker.js"></script>


    <script src="js/global.js"></script>


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