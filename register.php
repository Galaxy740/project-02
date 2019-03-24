<?php

session_start();

$title = 'Register';
include "includes/header.php";
?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">First name</label>

                                    <input type="text" id="first_name" class="input--style-4" name="first_name"
                                           placeholder="first name here..." required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">Last name</label>

                                    <input type="text" id="last_name" class="input--style-4" name="last_name"
                                           placeholder="last name here.." required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email"  placeholder="e-mail here.." required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone"  placeholder="phone number here.." required>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input type="password" id="password" class="input--style-4" name="password"
                                       placeholder="password" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <label class="label">Username</label>
                                <input type="text" id="username" class="input--style-4" name="username" placeholder="username" required>
                            </div>
                        </div>


                </div>
                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue" href="includes/modules/logout_module.php">Back</button>
                    <button type="submit" class="btn btn--radius-2 btn--blue" name="reg_user">Register</button>

                        <a type="button" class="btn btn--radius-2 btn btn-danger" href="index.php">Sign In</a>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="includes/register-form/vendor/jquery/jquery.min.js"></script>
    <script src="includes/register-form/vendor/select2/select2.min.js"></script>
    <script src="includes/register-form/vendor/datepicker/moment.min.js"></script>
    <script src="includes/register-form/vendor/datepicker/daterangepicker.js"></script>
    <script src="includes/register-form/js/global.js"></script>


<?php
// initializing variables
// $username = "";

// $errors = array(); 

// connect to the database


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);

    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $user_check_query = "SELECT * FROM user WHERE username='" . $username . "'";
    $result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "User name is taken";


    }
    else {
        $query = "INSERT INTO user (username, password, first_name, last_name, phone, email) VALUES ('$username', '$password', '$first_name', '$last_name', '$phone', '$email')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        header('location: read.php');
    }

}

include "includes/footer.php";