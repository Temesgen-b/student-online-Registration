<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file is an image or document
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } elseif ($imageFileType == "pdf" || $imageFileType == "doc") {
        $uploadOk = 1;
    } else {
        echo "File is not an image or document.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "File already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "File is too large.";
    $uploadOk = 0;
}

// Upload file
if ($uploadOk == 0) {
    echo "File was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        // Insert file path into database
        include 'db.php';
        $conn = mysqli_connect($host, $user, $password, $database);
        
        $filePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        $query = "INSERT INTO Files (documents) VALUES ('$filePath')";
        $conn->query($query);
    } else {
        echo "Error uploading file.";
    }
}

?>

