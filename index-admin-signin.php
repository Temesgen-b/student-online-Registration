<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  // Here, you can add the necessary PHP code to save the user registration data to your database.

  // For demonstration purposes, we'll simply display the user data on the webpage.
  echo "<h2>sign in Successful</h2>";
  echo "<p>Username: " . $username . "</p>";
  echo "<p>Email: " . $email . "</p>";
}
?>
<?php
  include 'db.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST["email"];
  
  $sql = "INSERT INTO admins (username, password, email)
          VALUES ('$username', '$password' ,'$email')";
  
  if (mysqli_query($conn, $sql)) {
    echo "<p style='color:green;'>Data inserted successfully</p>";
     // Redirect to form.php page or any other desired page
     header("Location:Dashbord_Admin.php");
  } else {
    echo "Error inserting data: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>