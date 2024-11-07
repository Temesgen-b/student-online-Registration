<?php
include 'db.php';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Count male and female students
$query = "SELECT COUNT(*) AS total_students, SUM(CASE WHEN sex = 'male' THEN 1 ELSE 0 END) AS male_count, SUM(CASE WHEN sex = 'female' THEN 1 ELSE 0 END) AS female_count FROM students";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$totalStudents = $row['total_students'];
$maleCount = $row['male_count'];
$femaleCount = $row['female_count'];

// Calculate percentage
$malePercentage = ($maleCount / $totalStudents) * 100;
$femalePercentage = ($femaleCount / $totalStudents) * 100;

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .circle {
            width: 200px;
            height: 200px;
            position: relative;
            border-radius: 50%;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .mask {
            width: 100%;
            height: 100%;
            position: absolute;
            clip: rect(0, 100px, 200px, 0);
        }
        .full {
            border-radius: 50%;
            background-color: #3498db;
        }
        .half {
            border-radius: 50% 0 0 50%;
            background-color: #e74c3c;
        }
        .fill {
            width: 50%;
            height: 100%;
            background-color: inherit;
        }
        .inside-circle {
            position: absolute;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="circle">
    <div class="mask full">
        <div class="fill"></div>
    </div>
    <div class="mask half">
        <div class="fill"></div>
    </div>
    <div class="inside-circle">M <?php echo round($malePercentage); ?>% | F <?php echo round($femalePercentage); ?>%</div>
</div>
</body>
</html>