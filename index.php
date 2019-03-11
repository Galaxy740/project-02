<html>

<?php
session_start();
$title = "LOGIN";
include "includes/header.php";
?>

<?php
if (!empty($_POST['username'])&& !empty('password')){
   $username = $_POST['username'];
   $password = $_POST['password'];
}
   if (isset($username) && isset($password)){
   // $q_read = "SELECT  `firstname`, `password`, `role` FROM `customer` WHERE firstname=$username password=$password";
   $q_read ="SELECT * FROM user where first_name='".$username."' and password='".$password."'" ;
   $result = mysqli_query($conn, $q_read);
   if(mysqli_num_rows($result) >0){
      // echo "Success!";
      while ($row = mysqli_fetch_assoc($result)){
      $_SESSION['role'] = $row['user_type'];
   }
      header('Location: read.php');
      // echo 'success';
      // echo "<a href='read.php'>Read DB</a>";
   } else {
      echo mysqli_error($conn);
      echo "<p><script type='text/javascript' src='fil.js'></script></p>";
   }

} ?>
       <div class="limiter">
           <div class="container-login100" style="background-image: url('images/airplane.jpg');">
               <div class="wrap-login100 p-t-30 p-b-50" style="padding-left:15px; padding-right: 15px ">
				<span class="login100-form-title p-b-41">
					 Login
				</span>
                   <form class="login100-form validate-form p-b-33 p-t-5" action="#" method="post">

                       <div class="wrap-input100 validate-input" data-validate = "Enter username">
                           <input class="input100 box" type="text" name="username" placeholder="User name">
                           <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                       </div>

                       <div class="wrap-input100 validate-input" data-validate="Enter password">
                           <input class="input100" type="password" name="password" placeholder="Password">
                           <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                       </div>

                       <div class="container-login100-form-btn m-t-32">
                           <button class="login100-form-btn" type="submit" value="submit">
                               Login
                           </button>
                       </div>
                       <div style="padding-top: 15px">
                            <p><a href="read.php" class="login100-form-btn "  >Continue as guest</a></p>
                       </div>
                   </form>
               </div>
           </div>
       </div>



<?php 
include 'includes/footer.php';
?>




