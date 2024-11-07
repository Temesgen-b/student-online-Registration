<?php
// Database connection and login check

  include 'db.php';
  
  mysqli_select_db($conn, $database);

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the admins table
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login, redirect to form2.php
        header('Location: form2.php');
        exit;
    } else {
        // Invalid login, show error message
        echo "The username and password combination is incorrect.";
    }
}

// Close connection
$conn->close();
?>

