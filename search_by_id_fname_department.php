<?php
include 'db.php';
  
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function executeQuery($conn, $sql, $params = []) {
    $stmt = $conn->prepare($sql);

    if (!empty($params)) {
        $types = '';
        $bindParams = [];

        foreach ($params as $param) {
            $types .= 's';
            $bindParams[] = &$param;
        }

        array_unshift($bindParams, $types);

        call_user_func_array([$stmt, 'bind_param'], $bindParams);
    }

    $stmt->execute();

    return $stmt;
}

// Rest of the code remains the same...

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the search term and criteria from the form
    $searchTerm = $_GET['search'];
    $criteria = $_GET['criteria'];

    // Prepare the SQL query based on the selected criteria
    $sql = '';
    $params = [];

    if ($criteria === 'stud_id') {
        $sql = 'SELECT * FROM students WHERE stud_id = ?';
        $params = [$searchTerm];
    } elseif ($criteria === 'first_name') {
        $sql = 'SELECT * FROM students WHERE first_name LIKE ?';
        $params = ["%$searchTerm%"];
    } elseif ($criteria === 'department') {
        $sql = 'SELECT d.dep_name FROM department d INNER JOIN Students s ON d.dep_id = s.dep_id WHERE department.dep_name LIKE ?';
        $params = ["%$searchTerm%"];
    } elseif ($criteria === 'stream') {
        $sql = 'SELECT * FROM students JOIN eslce ON  eslce.eslce_id = students.eslce_id WHERE eslce.stream LIKE ?';
        $params = ["%$searchTerm%"];
    }  



    // Execute the query
// Execute the query
$stmt = executeQuery($conn, $sql, $params);
$resultSet = $stmt->get_result();
$results = [];

while ($row = $resultSet->fetch_assoc()) {
    $results[] = $row;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
    <style>
        /* CSS styles for your search form and table */
        /* Add your own styles here */
    </style>
</head>
<body>
    <div class="search-container">
        <!--<form method="GET" action="">
            <input type="text" name="search" placeholder="Search...">
            <select name="criteria">
                <option value="stud_id">Student ID</option>
                <option value="first_name">First Name</option>
                <option value="department">Department</option>
                <option value="stream">Stream</option>
            </select>
            <button type="submit">Search</button>
        </form> -->
    </div>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .action-buttons a {
        display: inline-block;
        padding: 4px 8px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 4px;
    }

    .action-buttons a:hover {
        background-color: #45a049;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>

<?php if (isset($results) && !empty($results)): ?>
    <table>
        <thead>
            <tr>
                <th>Stud_ID</th>
                <th>F_Name</th>
                <th>L_Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Citizenship</th>
                <th>DoB</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Department</th>
                <th>Stream</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['stud_id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['Citizenship']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mob']; ?></td>
                    <td><?php echo $row['dep_name']; ?></td>
                    <td><?php echo $row['stream']; ?></td>
                    <td class="action-buttons">
                        <a href="up.php?id=<?php echo $row['stud_id']; ?>">Edit</a> |
                        <a href="#" onclick="confirmDelete(<?php echo $row['stud_id']; ?>)">Delete</a>
                        <script>
                        function confirmDelete(studentId) {
                            var confirmation = confirm("Do you want to delete the student?");

                            if (confirmation) {
                            // Redirect to delete_page.php with the student ID
                            window.location.href = "delete_page.php?id=" + studentId;
                            } else {
                            // Stay on the current page
                            return false;
                            }
                        }
                        </script>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
elseif (isset($results) && empty($results)):
?>
    <script>
        alert("No results found.");
        window.history.back();
    </script>
<?php
endif;
?>







