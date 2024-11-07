<?php
include 'db.php';
  
  $conn = mysqli_connect($host, $user, $password, $database);
  
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // SQL queries to create tables
  $query1 = "CREATE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(10) NOT NULL,
    email VARCHAR(25) NOT NULL UNIQUE)";

$query2 = "CREATE TABLE admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(10) NOT NULL UNIQUE ,
    email VARCHAR(25) NOT NULL  )";

    //execute the queries 
mysqli_query($conn, $query1);
mysqli_query($conn, $query2);


// Check if the tables were created successfully
if (mysqli_errno($conn) != 0) {
    echo "Error creating tables: " . mysqli_error($conn);
} else {
    echo "user and admin  Tables created successfully!";
}

// Close the database connection
mysqli_close($conn);

?>