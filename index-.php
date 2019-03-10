<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

</body>
</html> -->

<?php
session_start();
include "includes/header.php";
?>
<html>
   
   <head>
      <title>Login Page</title>
      
   </head>
   
   
              <p>User name - admin, Password 1234// username- user password 123</p> 
            
   
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
      // header('Location: read.php');
      echo 'success';
      // echo "<a href='read.php'>Read DB</a>";
   } else {
      echo mysqli_error($conn);
      echo "Wrong user name or password!";
   }

}else ?>
<form action = "" method = "post">
      <input type = "text" name = "username" class = "box"/>
      <input type = "password" name = "password" class = "box" />
      <input type = "submit" value = " Submit "/><br />
</form>
<?php 
include 'includes/footer.php';
?>