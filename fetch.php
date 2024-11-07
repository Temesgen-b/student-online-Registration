<?php
include 'db.php';
$conn = mysqli_connect($host, $user, $password, $database);

$query = "SELECT documents FROM Files";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo' <a href="uploads">open file path</a> <br>';
        echo "File name: " . $row["documents"] . "<br>";
        
    }
} else {
    echo "No files found.";
}

?>
