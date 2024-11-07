<?php
include 'db.php';
  
$conn = mysqli_connect($host, $user, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the search term and criteria from the form
    $searchTerm = $_GET['search'];
    $criteria = $_GET['criteria'];

    // Construct the SQL query based on the selected criteria
    $sql = "SELECT stud_id, first_name, last_name, sex, age, Citizenship, dob, email, mob, dep_name, stream
            FROM Students
            INNER JOIN Department ON Students.dep_id = Department.dep_id
            INNER JOIN eslce ON Students.eslce_id = eslce.eslce_id
            WHERE $criteria LIKE '%$searchTerm%'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Iterate over the result set and display the data
        while ($row = mysqli_fetch_assoc($result)) {
            // Access the data fields
            $studId = $row['stud_id'];
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $sex = $row['sex'];
            $age = $row['age'];
            $citizenship = $row['Citizenship'];
            $dob = $row['dob'];
            $email = $row['email'];
            $mob = $row['mob'];
            $depName = $row['dep_name'];
            $stream = $row['stream'];

            // Display the data or perform any other actions (e.g., create a table with the results)
            echo "Student ID: $studId<br>";
            echo "First Name: $firstName<br>";
            echo "Last Name: $lastName<br>";
            echo "Sex: $sex<br>";
            echo "Age: $age<br>";
            echo "Citizenship: $citizenship<br>";
            echo "Date of Birth: $dob<br>";
            echo "Email: $email<br>";
            echo "Mobile Number: $mob<br>";
            echo "Department: $depName<br>";
            echo "Stream: $stream<br>";

            // Additional code for displaying the edit and delete buttons
            echo "<button>Edit</button>";
            echo "<button>Delete</button>";
            echo "<br><br>";
        }
    } else {
        echo "No results found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>