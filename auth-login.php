<?php
error_reporting(0);
include 'connection.php';
$email = $_POST['email'];
$email=trim($email);
$password = $_POST['password'];
if(isset($email)){
   $checkUser = "SELECT first_name, last_name, email FROM registration WHERE email = '$email' AND password = '$password'";
   $result = mysqli_query($conn, $checkUser);
   if ($result->num_rows > 0) {
      $data = mysqli_fetch_array($result);
      $name= $data['first_name'].' '.$data['last_name'];
      $email= $data['email'];
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      $msg = 'OK';
      echo $msg;
   }else{
      $msg = "<span style='color:red;'>Username or Password is Invalid</span>";
      echo $msg;
   }
   mysqli_close($conn);
}
?>