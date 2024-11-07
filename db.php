
<?php
  $host = "localhost";
  $user = "@Misrak";
  $password = "123";
  $database = "E_Registration";
  
  $conn = mysqli_connect($host, $user, $password, $database);
  
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>