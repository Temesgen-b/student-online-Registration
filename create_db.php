<?php
  include 'db.php';
  
  mysqli_select_db($conn, $database);
?>
<?php
  include 'db.php';
  
  $sql = "CREATE DATABASE E_Registration";
  
  if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>