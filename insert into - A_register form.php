<html>
    <head>
        <style>
            .style{
                color:5bff02;
                font-size: 25px;
                margin: 0%;
            }  
            .wait{
                color:ffd700;
                font-size: 25px;
                margin: 0%;
            } 
            .error{
                color:red;
                font-size: 15px;
                margin: 0%;
            }
        </style>
    </head>
</html>


<?php
//student_info  table 

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


//error handling


$errors = []; // Initialize an empty array to store errors

// Check if first name last name  etc  is empty
if (empty($first_Name)) {
    $errors[] = "First name is required.";
}


if (empty($last_Name)) {
    $errors[] = "Last name is required.";
}


if (empty($Age) || !is_numeric($Age)) {
    $errors[] = "Age is required and must be a number.";
}


if (empty($Email) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email is required and must be a valid email address.";
}


if (empty($Mobile) || !preg_match('/^[0-9]{10}$/', $Mobile)) {
    $errors[] = "Mobile number is required and must be a valid 10-digit number.";
}


if (empty($Occupation)) {
    $errors[] = "Occupation is required.";
}


if (empty($Level)) {
    $errors[] = "Level is required.";
}


if (!empty($errors)) {
    // Display the errors
    echo "The following errors occurred:<br>";
    foreach ($errors as $error) {
        echo "- " . $error . "<br>";
    } 
}


 // table  place of brith

$City = $_POST['brith_city'];
$Sub_city = $_POST['sub_city'];
$Woreda = $_POST['woreda']; 

//table current address

$Current_Sub_city = $_POST['current_Sub_city'];
$current_Woreda = $_POST['current_Woreda'];
$current_City = $_POST['current_City'];

//secondary school attendance 


$Name_of_school = $_POST['names_of_chool'];
$Town = $_POST['town'];
$second_Year_of_attend = $_POST['second_year_attendance'];
$Last_gread_compleated = $_POST['gread_compleated'];

//Priparatory school attendance

$streem = $_POST['streem']; //input names 
$prip_Year_of_attend = $_POST['Priparatory_year_of_attendance'];

//heer  subject table 

// image files 
//$high_school_transcript = $_POST['pdfFile']; 
$GSLCE_result = $_POST['GSLCE_result'];


//subject error hanndling 


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

// Define a helper function to check if a value is within the valid range
function validateValue($value) {
    return is_numeric($value) && $value >= 1 && $value <= 100;
}

// Check if the values are within the valid range
if (!validateValue($Civic)) {
    // Handle the error, for example, display an error message
    echo '<p class="error">  Civic field must contain a value between 1 and 100 </p>.';
}

if (!validateValue($english)) {
    echo '<p class="error">  English field must contain a value between 1 and 100. </p>';
}

if (!validateValue($Maths)) {
    echo '<p class="error"> Maths field must contain a value between 1 and 100. </p> <br>';
}

/*if (!validateValue($physics)) {
    echo '<p class="error">  Physics field must contain a value between 1 and 100. </p> <br>';
} */

/*if (!validateValue($chemistry)) {
    echo '<p class="error">  Chemistry field must contain a value between 1 and 100. </p> <br>';
}*/

/*if (!validateValue($Biology)) {
    echo '<p class="error">  Biology field must contain a value between 1 and 100. </p> <br>';
}*/

if (!validateValue($Aptiude)) {
    echo '<p class="error">  Aptiude field must contain a value between 1 and 100. </p> <br>';
}

/*if (!validateValue($Economics)) {
    echo '<p class="error">  Economics field must contain a value between 1 and 100. </p> <br>';
}

if (!validateValue($Geography)) {
    echo '<p class="error">  Geography field must contain a value between 1 and 100 </p>. <br>';
}

if (!validateValue($History)) {
    echo  '<p class="error">  History field must contain a value between 1 and 100 </p>.<br>';
}*/

//subject error hanndling 


//values 

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



$insertData = false;
$streem = $_POST['streem'];
if ($streem == "Natural") {
    if ($Biology >= 1 && $Biology <= 100 && $chemistry >= 1 && $chemistry <= 100 && $physics >= 1 && $physics <= 100 && $Civic >= 1 && $Civic <= 100 && $Maths >= 1 && $Maths <= 100) {
        $insertData = true;
    } 
}

if ($insertData) {
    // Perform the insertion into the database table
    // Code for database insertion goes here
    echo "Data is valid and will be inserted into the database.";
} else {
    echo "Data is not valid and will not be inserted into the database.";
}



// Define a helper function only if it doesn't already exist
if (!function_exists('validateValue')) {
    function validateValue($value) {
        return is_numeric($value) && $value >= 1 && $value <= 100;
    }
}

// Check if all values are within the valid range
if (
    validateValue($Civic) &&
    validateValue($english) &&
    validateValue($Maths) &&
    /*validateValue($physics) &&
    validateValue($chemistry) &&
    validateValue($Biology) &&*/
    validateValue($Aptiude) 
   /* validateValue($Economics) &&
    validateValue($Geography) &&
    validateValue($History)*/
) {
    // All values are valid, proceed with inserting data into the table

    // Your code to insert the data into the table goes here

   /* echo "Data inserted successfully.";*/
} else {
    // At least one value is not within the valid range, do not insert data into the table

    echo  '<p class="error">  Invalid data. Cannot insert into the table. </p> <br>';
}

$GPA = $_POST['GSLCE_result'];

// Check if the GPA value is within the valid range
if (!is_numeric($GPA) || $GPA < 1 || $GPA > 700) {
    // Handle the error, for example, display an error message
    echo "GPA field must contain a value between 1 and 700.";
} else {
    // The GPA value is valid, proceed with further processing

    // Your code to process the GPA value goes here

    // Display success message or perform further actions
   /* echo "GPA value successfully processed. <br>";*/
}




include 'db.php';

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

// Close the database connection
mysqli_close($conn);
?>