<?php
   error_reporting(0);
   include 'connection.php';
   if(isset($_POST['email'])){
         $email = $_POST['email'];
         $email=trim($email);
         if(isset($email)){
            $checkUser = "SELECT id, email FROM registration WHERE email = '$email'";
            $result = mysqli_query($conn, $checkUser);
            if ($result->num_rows > 0) {
               $data = mysqli_fetch_array($result);
               $id= $data['id'];
               $from ='rockystar10.11@gmail.com';
               $to = $email;
               $hash = sha1('DB_SALT'.$id);
               $hashId = $hash.'_'.$id;
               $link = 'http://localhost/Test_php/reset-password.php?id='.$hashId;
               $subject = 'Reset Password Link';
               $headers = "From:".$from;
               $headers .= "MIME-Version: 1.0\r\n";
               $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
               $message = '<!doctype html> <html lang="en-US"> <head> <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/> <title>Reset Password Email Template</title> <meta name="description" content="Reset Password Email Template."> <style type="text/css"> a:hover{text-decoration: underline !important;}</style> </head> <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0"> <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: Arial, Helvetica, sans-serif;"> <tr> <td> <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td style="height:80px;">&nbsp;</td></tr><tr> <td style="height:20px;">&nbsp;</td></tr><tr> <td> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);"> <tr> <td style="height:40px;">&nbsp;</td></tr><tr> <td style="padding:0 35px;"> <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have requested to reset your password</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span> <p style="color:#455056; font-size:17px;line-height:24px; margin:0;"> We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions. </p><a href="'.$link.'" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset Password</a> </td></tr><tr> <td style="height:40px;">&nbsp;</td></tr></table> </td><tr> <td style="height:20px;">&nbsp;</td></tr><tr> <td style="height:80px;">&nbsp;</td></tr></table> </td></tr></table> </body> </html>';
               $successfull = mail($to, $subject, $message, $headers);
                  if($successfull){
                     $msg = "<span style='color:green;'>Please check your email we can send reset password link in your mail</span>"; 
                     echo $msg;
                  }else{
                     $msg = "<span style='color:red;'>something went to wrong please try letter</span>"; 
                     echo $msg;
                  }
            }else{
               $msg = "<span style='color:red;'>Please enter your registered email</span>";
               echo $msg;
            }
         }
   }else{
         if(!empty($_POST['id'])){
               $hash = $_POST['id'];
               $splitToken = explode('_', $hash);
               if (count($splitToken) != 2) {
                  return false;
               }
               list($_, $id) = $splitToken;
               if (sha1('DB_SALT'.$id).'_'.$id != $hash) {
                  $msg = 'error';
                  echo $msg;
               } else {
                  $password = $_POST['password'];
                  $sql = "UPDATE registration SET password='$password' WHERE id='$id'";
                  if (mysqli_query($conn, $sql)) {
                     $msg = "change your password successfully please logn here";
                     echo $msg;
                  } else {
                     $msg = 'error';
                     echo $msg;
                  }
               }
         }else{
            $msg = 'error';
            echo $msg;
         }      
   }
   mysqli_close($conn);
?>