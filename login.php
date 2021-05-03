<?php
  if(isset($_GET['msg'])){
       $success_change = $_GET['msg'];
  }else{
    $success_change = '';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/registration.css" rel="stylesheet" media="all">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
       @media only screen and (max-width: 600px) {
            #login {
                margin: 0% 34%;
            }
        }   
    </style>
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo form-box">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <div  id="msg1" style="text-align:center;"><span style='color:green;'><?php echo $success_change; ?></span></div><br>
                    <div  id="msg" style="text-align:center;"></div><br>
                    <h2 class="title" style="text-align:center;">Login</h2>
                    <form id="login_form">
                        <div class="input-group">
                            <input type="email" class="input--style-1" placeholder="Your Email *" size="50" name="email" required/>
                        </div>
                        <div class="input-group">
                            <input type="password" class="input--style-1" placeholder="Password *" name="password" required/>
                        </div>
                        <div class="p-t-10">
                            <button id="login" class="btn btn--radius btn--green" type="submit">Login</button>
                        </div>
                        <div class="p-t-20">
                            <a href="forget-password.php">forget Password</a>
                            <a href="registration-form.php" style="float:right;">Create new account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/login.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
