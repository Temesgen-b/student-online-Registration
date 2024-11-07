<?php
include 'db.php';

$conn = mysqli_connect($host, $user, $password, $database);

// Check if the student ID parameter is present in the URL
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Delete student from the student table
    $deleteStudentQuery = "DELETE FROM Students WHERE stud_id = $studentId";
    mysqli_query($conn, $deleteStudentQuery);

    // Delete student from the department table
    $deleteDepartmentQuery = "DELETE FROM department WHERE dep_id = $studentId";
    mysqli_query($conn, $deleteDepartmentQuery);

    // Delete student from the elace table
    $deleteElaceQuery = "DELETE FROM eslce WHERE eslce_id = $studentId";
    mysqli_query($conn, $deleteElaceQuery);

    // Delete student from the prith place table
    $deletePrithPlaceQuery = "DELETE FROM placeofbirth WHERE placeofbirth_id = $studentId";
    mysqli_query($conn, $deletePrithPlaceQuery);

   // Delete student from the secondary_school  table
   $deletePrithPlaceQuery = "DELETE FROM secondary_school WHERE secondary_school_id = $studentId";
   mysqli_query($conn, $deletePrithPlaceQuery);

   // Delete student from the subject  table
   $deletePrithPlaceQuery = "DELETE FROM subject WHERE subject_id = $studentId";
   mysqli_query($conn, $deletePrithPlaceQuery);

      // Delete student from the prith place table
      $deletePrithPlaceQuery = "DELETE FROM current_address WHERE current_address_id = $studentId";
      mysqli_query($conn, $deletePrithPlaceQuery);

        // Delete student from the Files  table
   $deletePrithPlaceQuery = "DELETE FROM Files WHERE Files_id = $studentId";
   mysqli_query($conn, $deletePrithPlaceQuery);

     // Delete student from the Schedule  table
     $deletePrithPlaceQuery = "DELETE FROM Schedule WHERE type_id = $studentId";
     mysqli_query($conn, $deletePrithPlaceQuery);



    // Redirect to a success page or display a success message
    echo '<script>
    alert("Deleted successfully");
    window.history.back();
</script>';
} else {
    // Student ID parameter not found, handle the error or redirect as needed
    echo 'Error: Student ID parameter not provided.';
}
?>


