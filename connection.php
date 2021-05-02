
 <?php

 $servername = "127.0.0.1:3308";
 $database = "my_db";
 $username = "root";
 $password = "";
 
 // Create connection
 $conn = new mysqli( $servername, $username, $password, $database);
 
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
  
 
 

 ?>

