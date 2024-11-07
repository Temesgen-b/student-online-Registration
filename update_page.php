<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'dbname');

// Fetch data by ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "
    SELECT t1.column1, t2.column2, t3.column3 
    FROM table1 t1 
    JOIN table2 t2 ON t1.id = t2.table1_id 
    JOIN table3 t3 ON t2.id = t3.table2_id
    WHERE t1.id = $id
    ";
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
    
if($row) {
    // Display the form with the fetched data
    echo "
        <form method='post'>
            <input type='text' name='data1' value='".$row['column1']."'><br>
            <input type='text' name='data2' value='".$row['column2']."'><br>
            <input type='text' name='data3' value='".$row['column3']."'><br>
            <input type='submit' name='update' value='Update Data'>
        </form>
    ";

    // Handle form submission
    if(isset($_POST['update'])) {
        $new_data1 = $_POST['data1'];
        $new_data2 = $_POST['data2'];
        $new_data3 = $_POST['data3'];

        // Update the data in the tables
        $update_query1 = "UPDATE table1 SET column1 = '$new_data1' WHERE id = $id";
        $update_query2 = "UPDATE table2 SET column2 = '$new_data2' WHERE id = $row['table2.id']";
        $update_query3 = "UPDATE table3 SET column3 = '$new_data3' WHERE id = $row['table3.id']";
        
        mysqli_query($conn, $update_query1);
        mysqli_query($conn, $update_query2);
        mysqli_query($conn, $update_query3);

        // Redirect to the page displaying the updated data
        header("Location: display_page.php");
        exit();
    }
} else {
    echo "No data found.";
}
?>
