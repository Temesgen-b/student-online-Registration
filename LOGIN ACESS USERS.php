<?php
// this is our db connection 
include 'db.php';

mysqli_select_db($conn, $database);
// Retrieve the login form inputs
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the user table in the database
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  // Check if the query returns any result
  if (mysqli_num_rows($result) == 1) {
    // Successful login
    // Start the session and set the 'username' session variable
    session_start();
    $_SESSION['username'] = $username;

    // Redirect to the desired page (Form.html in this case)
    echo '<script type="text/javascript">alert("Login success");window.location=\'A_Register form.php\';</script>';
    header("Location:A_Register form.html");
    exit;
  } else {
    // Invalid login credentials
    echo "<script>alert('Invalid username or password'); window.history.back();</script>";
    $error = "Invalid username or password";
  }
}
?>