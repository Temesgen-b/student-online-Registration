<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  // Here, you can add the necessary PHP code to save the user registration data to your database.

  // For demonstration purposes, we'll simply display the user data on the webpage.
 /* echo "<h2>sign in Successful</h2>";
  echo "<p>Username: " . $username . "</p>";
  echo "<p>Email: " . $email . "</p>";*/
}
?>
<?php
  include 'db.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST["email"];

  if (mysqli_connect_error()){
    die("Connect Error " . $conn->connect_error);
  } else {
    if (empty($username) || empty($password) || empty($email)) {
      echo '<script type="text/javascript">alert("Empty value");window.location=\'Stud_login_form.html\';</script>';
    } else {
      if (strlen($password) >= 4) {
        $sql = "INSERT INTO Users (username, password, email)
                VALUES ('$username', '$password' ,'$email')";

        if ($conn->query($sql) === TRUE) {
          echo '<script type="text/javascript">alert("sign up successfully to register click ok");window.location=\'A_Register form.html\';</script>';
        } else {
          echo '<script type="text/javascript">alert("Error: Failed to insert into table");window.location=\'Stud_login_form.html\';</script>';
        }
      } else {
        echo '<script type="text/javascript">alert("Enter a password of more than 4 characters");window.location=\'Stud_login_form.html\';</script>';
      }
    }
  }
  mysqli_close($conn);
?>