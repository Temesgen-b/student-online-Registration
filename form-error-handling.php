<?php
include 'db.php'; 
$first_Name = $_POST['fname']; 
$last_Name = $_POST['lname'];
$sex = $_POST['sex'];
$Age = $_POST['age'];
$Citizenship = $_POST['Citizenship'];
$DOB = $_POST['dob'];
$Email = $_POST['email'];
$Mobile = $_POST['Mob']; 
$Occupation = $_POST['occupation']; 
$Level = $_POST['level'];  
$Physhical_dis = $_POST['phy_dis'];

$City = $_POST['brith_city'];
$Sub_city = $_POST['sub_city'];
$Woreda = $_POST['woreda']; 

$Current_Sub_city = $_POST['current_Sub_city'];
$current_Woreda = $_POST['current_Woreda'];
$current_City = $_POST['current_City'];

$Name_of_school = $_POST['names_of_chool'];
$Town = $_POST['town'];
$second_Year_of_attend = $_POST['second_year_attendance'];
$Last_gread_compleated = $_POST['gread_compleated'];

$streem = $_POST['streem']; 
$prip_Year_of_attend = $_POST['Priparatory_year_of_attendance'];
$GSLCE_result = $_POST['GSLCE_result'];
$Application = $_POST ['Schedule'] ;


$Civic = $_POST['Civ'];
$english = $_POST['eng'];
$Maths = $_POST['mat'];
$physics = $_POST['phy'];
$chemistry = $_POST['chemo'];
$Biology = $_POST['bio'];
$Aptiude = $_POST['appt'];
$Economics = $_POST['econ'];
$Geography = $_POST['Geo'];
$History = $_POST['Hist'];
$GPA = $_POST['GSLCE_result'];
//$insertData = false;  

// Validate the mobile number length
if (strlen($Mobile) != 10) {
    echo "<script>alert('Invalid mobile number. Mobile number must contain 10 digits.'); window.history.back();</script>";
    exit;
}

include 'db.php';
$conn = mysqli_connect($host, $user, $password, $database);

// Prepare and execute the query to compare the email against the user table
$sql = "SELECT email FROM Users WHERE email = '$Email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid email address
    // Continue with your logic here

    //student 
    $sql = "INSERT INTO Students  (first_name , last_name, sex, age, Citizenship,dob,email, mob,physical_disability)
    VALUES ('$first_Name ', ' $last_Name' ,'$sex',' $Age','  $Citizenship','$DOB',' $Email','$Mobile' , '$Physhical_dis')"; 
    
} else {
    // Invalid email address
    echo "<script>alert('Invalid email. Email address does not exist in the user table.'); window.history.back();</script>";
    exit;
}

// Validate and insert data based on the stream value
if ($streem == "Natural") {
    // Validate the field values for the natural stream
    if (empty($Civic) || empty($english) || empty($Maths) || empty($physics) || empty($chemistry) || empty($Biology) || empty($Aptiude)) {
        echo "<script>alert('All fields are required for the natural stream.'); window.history.back();</script>";
        exit;
    }

    // Validate the value range for the natural stream
    $validRange = range(1, 100);
    if (!in_array($Civic, $validRange) || !in_array($english, $validRange) || !in_array($Maths, $validRange) || !in_array($physics, $validRange) || !in_array($chemistry, $validRange) || !in_array($Biology, $validRange) || !in_array($Aptiude, $validRange)) {
        echo "<script>alert('Invalid value range for the natural stream. Values must be between 1 and 100.'); window.history.back();</script>";
        exit;
    }

    // Insert data into the subject table for the natural stream
    // Continue with your logic here 
//  subject



} elseif ($streem == "Social") {
    // Validate the field values for the social stream
    if (empty($Civic) || empty($english) || empty($Maths) || empty($Aptiude) || empty($Economics) || empty($Geography) || empty($History)) {
        echo "<script>alert('All fields are required for the social stream.'); window.history.back();</script>";
        exit;
    }

    // Validate the value range for the social stream
    $validRange = range(1, 100);
    if (!in_array($Civic, $validRange) || !in_array($english, $validRange) || !in_array($Maths, $validRange) || !in_array($Aptiude, $validRange) || !in_array($Economics, $validRange) || !in_array($Geography, $validRange) || !in_array($History, $validRange)) {
        echo "<script>alert('Invalid value range for the social stream. Values must be between 1 and 100.'); window.history.back();</script>";
        exit;
    }

    // Insert data into the subject table for the social stream


    
    // Continue with your logic here
} else {
    echo "<script>alert('Invalid stream value.'); window.history.back();</script>";
    exit;
}

// Validate the GSLCE_result value range
$validGSLCERange = range(125, 700);
if (!in_array($GSLCE_result, $validGSLCERange)) {
    echo "<script>alert('Invalid value range for GSLCE_result. Value must be between 125 and 700.'); window.history.back();</script>";
    exit;
}
//Students table

$sql = "INSERT INTO Students  (first_name , last_name, sex, age, Citizenship,dob,email, mob,physical_disability)
          VALUES ('$first_Name ', ' $last_Name' ,'$sex',' $Age','  $Citizenship','$DOB',' $Email','$Mobile' , '$Physhical_dis')"; 

// department

$sql2 = "INSERT INTO department (dep_name, level) VALUES ('$Occupation', '$Level')";
/*if ($conn->query($sql2) === TRUE) {
    echo "Data inserted into department Table  successfully<br>";
} else {
    echo "Error inserting data into department: " . $conn->error . "<br>";
}  */
  
// placeofbirth 

$sql3 = "INSERT INTO placeofbirth (city, sub_city, woreda ) VALUES ('$City', '$Sub_city','$Woreda')";


//  current_address

$sql4 = "INSERT INTO current_address (city, sub_city,woreda) VALUES ('$current_City', '$Current_Sub_city', '$current_Woreda')";


// secondary_school

$sql5 = "INSERT INTO secondary_school (name_of_school, town, year_of_attendance, last_grade_completed) 
 VALUES ('$Name_of_school', '$Town', '$second_Year_of_attend', '$Last_gread_compleated')";


// eslce

$sql6 = "INSERT INTO eslce (stream, year_of_attendance) 
 VALUES ('$streem', '$prip_Year_of_attend' )";

//  subject

$sql7 = "INSERT INTO subject (Civic, English, Maths, physics, chemistry, Biology, Aptiude, Economics, Geography, History, GPA) 
 VALUES ('$Civic', '$english', '$Maths', '$physics', '$chemistry', '$Biology', '$Aptiude', '$Economics', '$Geography', '$History', '$GPA')";

//data  gathering 
$Application = $_POST ['Schedule'] ;

//Schedule

$sql8 ="INSERT INTO Schedule (Type) VALUES ('$Application')";


// Execute the queries
mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);
mysqli_query($conn, $sql3);
mysqli_query($conn, $sql4);

mysqli_query($conn, $sql5);
mysqli_query($conn, $sql6);
mysqli_query($conn, $sql7);
mysqli_query($conn, $sql8);



// Check if the tables were created successfully
if (mysqli_errno($conn) != 0) {
    echo "Error creating tables: " . mysqli_error($conn);
} else {
    echo '<p class="style">Data inserted successfully!</p><br><p class="wait">Please wait for approval!</p>';
    echo '<script>
        alert("Data inserted successfully! Please wait for approval!");
        window.history.back();
    </script>';
}


// All validations are successful
echo "<script>alert('Your registration is in process. Please wait for approval. write  requist by email An email will be sent to you.'); window.location.href = 'email.php?email=$Email';</script>";
// inset function 


//js code 
/*
// Get the form element
const form = document.querySelector('form');

// Add a submit event listener to the form
form.addEventListener('submit', (event) => {
  // Prevent the form from submitting
  event.preventDefault();

  // Reset the error styles
  resetErrorStyles();

  // Get the input values
  const streem = document.querySelector('#streem');
  const Civic = document.querySelector('#Civ');
  const english = document.querySelector('#eng');
  const Maths = document.querySelector('#mat');
  const physics = document.querySelector('#phy');
  const chemistry = document.querySelector('#chemo');
  const Biology = document.querySelector('#bio');
  const Aptiude = document.querySelector('#appt');
  const Economics = document.querySelector('#econ');
  const Geography = document.querySelector('#Geo');
  const History = document.querySelector('#Hist');
  const GSLCE_result = document.querySelector('#GSLCE_result');

  // Validate and display error messages
  if (streem.value === 'natural') {
    if (!validateRange(Civic.value, 1, 100)) {
      displayErrorMessage(Civic, 'Invalid value range. Value must be between 1 and 100.');
    }
    if (!validateRange(english.value, 1, 100)) {
      displayErrorMessage(english, 'Invalid value range. Value must be between 1 and 100.');
    }
    // Validate other fields for the natural stream
    // ...

  } else if (streem.value === 'social') {
    if (!validateRange(Civic.value, 1, 100)) {
      displayErrorMessage(Civic, 'Invalid value range. Value must be between 1 and 100.');
    }
    if (!validateRange(english.value, 1, 100)) {
      displayErrorMessage(english, 'Invalid value range. Value must be between 1 and 100.');
    }
    // Validate other fields for the social stream
    // ...

  } else {
    displayErrorMessage(streem, 'Invalid stream value.');
  }

  if (!validateRange(GSLCE_result.value, 125, 700)) {
    displayErrorMessage(GSLCE_result, 'Invalid value range. Value must be between 125 and 700.');
  }

  // Submit the form if there are no errors
  if (!document.querySelector('.error-message')) {
    form.submit();
  }
});

// Function to validate if a value is within a specific range
function validateRange(value, min, max) {
  return value >= min && value <= max;
}

// Function to display an error message for a field
function displayErrorMessage(field, message) {
  const errorMessage = document.createElement('div');
  errorMessage.classList.add('error-message');
  errorMessage.textContent = message;
  field.classList.add('error');
  field.parentNode.insertBefore(errorMessage, field.nextSibling);
}

// Function to reset the error styles and remove error messages
function resetErrorStyles() {
  const errorMessages = document.querySelectorAll('.error-message');
  errorMessages.forEach((errorMessage) => {
    errorMessage.remove();
  });

  const errorFields = document.querySelectorAll('.error');
  errorFields.forEach((field) => {
    field.classList.remove('error');
  });
}*/





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







// Close the database connection
$conn->close();
?>


























