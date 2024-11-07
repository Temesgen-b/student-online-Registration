<?php
include 'db.php';
  
  $conn = mysqli_connect($host, $user, $password, $database);
  
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
// SQL queries to create tables
$query1 = "CREATE TABLE  Schedule  (
     type_id INT(11) NOT NULL primary key AUTO_INCREMENT,
    Type VARCHAR(50) NOT NULL
)";

$query2 ="CREATE TABLE Files (
    Files_id INT (11) PRIMARY KEY AUTO_INCREMENT,
    documents BLOB
    )";

/*$query3 = "CREATE TABLE admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(10) NOT NULL UNIQUE ,
    email VARCHAR(25) NOT NULL  )"; */

$query4 ="CREATE TABLE current_address (
    current_address_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    city VARCHAR(50) NOT NULL,
    sub_city VARCHAR(50),
    woreda VARCHAR(50)
)";

$query5 ="CREATE TABLE department (
    dep_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    dep_name VARCHAR(50) NOT NULL,
    level VARCHAR(10)
)";

$query6 ="CREATE TABLE placeofbirth (
    placeofbirth_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    city VARCHAR(25) NOT NULL,
    sub_city VARCHAR(15),
    woreda INT(11)
)";

$query7 = "CREATE TABLE secondary_school (
    secondary_school_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name_of_school VARCHAR(100) NOT NULL,
    town VARCHAR(50),
    year_of_attendance INT(4),
    last_grade_completed VARCHAR(20)
)";

$query8 ="CREATE TABLE subject (
    subject_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    Civic INT(11),
    English INT(11),
    Maths INT(11),
    physics INT(11),
    chemistry INT(11),
    Biology INT(11),
    Aptiude INT(11),
    Economics INT(11),
    Geography INT(11),
    History INT(11),
    GPA INT(11)
)";
$query9 ="CREATE TABLE eslce (
    eslce_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    stream VARCHAR(50),
    year_of_attendance date,
    subject_id INT(11),
    FOREIGN KEY (subject_id ) REFERENCES subject( subject_id)
    
)";

$query10 ="CREATE TABLE Students  (
    stud_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(15) NOT NULL,
    last_name VARCHAR(15) NOT NULL,
    sex VARCHAR(15) NOT NULL,
    age INT(3) NOT NULL,
    Citizenship VARCHAR(25) NOT NULL,
    dob DATE NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    mob INT(11) NOT NULL UNIQUE,
    physical_disability VARCHAR(25),
    type_id INT(11),
    FOREIGN KEY (type_id) REFERENCES Schedule(type_id),
    dep_id INT(11),
    FOREIGN KEY (dep_id) REFERENCES department(dep_id),
    placeofbirth_id INT(11),
    FOREIGN KEY (placeofbirth_id) REFERENCES placeofbirth(placeofbirth_id),
    current_address_id INT(11),
    FOREIGN KEY (current_address_id) REFERENCES current_address(current_address_id),
    secondary_school_id INT(11),
    FOREIGN KEY (secondary_school_id) REFERENCES secondary_school(secondary_school_id),
    eslce_id INT(11),
    FOREIGN KEY (eslce_id) REFERENCES eslce(eslce_id),
    Files_id INT (11),
    FOREIGN KEY (Files_id) REFERENCES  Files (Files_id)
)";


// Execute the queries
mysqli_query($conn, $query1);
mysqli_query($conn, $query2);
/*mysqli_query($conn, $query3);*/
mysqli_query($conn, $query4);

mysqli_query($conn, $query5);
mysqli_query($conn, $query6);
mysqli_query($conn, $query7);
mysqli_query($conn, $query8);
mysqli_query($conn, $query9);
mysqli_query($conn, $query10);



// Check if the tables were created successfully
if (mysqli_errno($conn) != 0) {
    echo "Error creating tables: " . mysqli_error($conn);
} else {
    echo "all Tables created successfully!";
}

// Close the database connection
mysqli_close($conn);

?>