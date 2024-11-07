
<?php
// Connect to the database
include 'db.php';
$conn = mysqli_connect($host, $user, $password, $database);

// Get the ID of the record to update
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record based on the ID
    $query = "SELECT * FROM Students WHERE stud_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        // Display the form with the record data
        echo "
            <form method='post'>
               

                <form action='' method='post'>
         
                 <label for='stud_id'>Student ID:</label>
                 <input type='text' id='stud_id' name='stud_id'  value='".$row['stud_id']."'><br><br>
             
                 <label for='f_name'>First Name:</label>
                 <input type='text' id='f_name' name='f_name' required value='".$row['first_name']."'><br><br>
             
                 <label for='l_name'>Last Name:</label>
                 <input type='text' id='l_name' name='l_name' required value='".$row['last_name']."' ><br><br>
             
                 <label for='sex'>Sex:</label>
                 <select id='sex' name='sex' required>
                     <option value='male'>Male</option>
                     <option value='female' >Female</option>
                     <option value='other' >Other</option>
                 </select><br><br>
             
                 <label for='age'>Age:</label>
                 <input type='number' id='age' name='age'  required value='".$row['age']."'><br><br>
             
                 <label for='citizenship'>Citizenship:</label>
                 <input type='text' id='citizenship' name='citizenship'  required value='".$row['Citizenship']."'><br><br>
             
                 <label for='dob'>Date of Birth:</label>
                 <input type='date' id='dob' name='dob'  required value='".$row['dob']."'><br><br>
             
                 <label for='email'>Email:</label>
                 <input type='email' id='email' name='email'  required value='".$row['email']."'><br><br>
             
                 <label for='mobile'>Mobile:</label>
                 <input type='tel'id='mobile' name='mobile'  required value='".$row['mob']."'><br><br>
             
                 <label for='department'>Department:</label>
                 <input type='text' id='department' name='department'  required value='".$row['dep_name']."'><br><br>
             
                 <label for='stream'>Stream:</label>
                 <input type='text' id='stream' name='stream'  required value='".$row['stream']."'><br><br>
         
         
                 <button type='submit' name='update'>Update</button>
             </form>

            
        ";

        // Handle form submission
        if(isset($_POST['update'])) {
            $new_data1 = $_POST['data1'];
            $new_data2 = $_POST['data2'];

            $I = $_POST['stud_id'];
            $F = $_POST['f_name'];
            
            $L = $_POST['l_name'];
            $S = $_POST['sex'];
        
            $A = $_POST['age'];
            $C = $_POST['citizenship'];
        
            $D = $_POST['dob'];
            $E = $_POST['email'];
        
            $M = $_POST['mobile'];

            // Update the record in the database
            
            $update_query = "UPDATE Students SET stud_id = '$I', first_name = '$F', last_name = '$L',
                                sex = '$S', age = '$A', Citizenship = '$C', dob = '$D',  email = '$E',
                                mob = '$M' WHERE stud_id = $id";
                                mysqli_query($conn, $update_query);

            // Redirect to the page displaying the updated data
            header("Location: .php");
            exit();
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "ID parameter is missing in the URL.";
}
?>


