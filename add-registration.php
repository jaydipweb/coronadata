<?php
error_reporting(0);
include 'connection.php';
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$email=trim($email);
$phone_no = $_POST['txtEmpPhone'];
$gender=$_POST['gender'];
$password = $_POST['password'];
$birthdate = $_POST['birthdate'];

if(isset($email)){
   $checkMail = "SELECT email FROM registration WHERE email = '$email'";
   $result = mysqli_query($conn, $checkMail);
   if ($result->num_rows > 0) {
      $msg = "<span style='color:red;'>Email is Already exits please try different email</span>";
      echo $msg;
   }else{
      $sql ="INSERT INTO registration (first_name, last_name, email, phone_no, password, gender, birthdate) VALUES ('$first_name', '$last_name', '$email', '$phone_no', '$password', '$gender', '$birthdate')";
 
      if(mysqli_query($conn, $sql)){
           $msg = "<span style='color:green; font-size:22px;'> Your form successfully submitted</span>";
           echo $msg;
      }
      else{
         $msg = "<span style='color:red;'>Something went to wrong please try letter....</span>";
         echo $msg;
      }
   }
   mysqli_close($conn);
}
?>