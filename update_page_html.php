<!DOCTYPE html>
<html>
<head>
    <title>Student Information Form</title>
</head>
<body>
    <h2>Student Information</h2>
    <form action="update_page.php" method="POST">
        <label for="stud_id">Student ID:</label>
        <input type="text" id="stud_id" name="stud_id" value="<?php echo $stud_id; ?>" required><br><br>
    
        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" value="<?php echo $first_name; ?>" required><br><br>
    
        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" value="<?php echo $last_name; ?>" required><br><br>
    
        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="male" <?php if ($sex == 'male') echo 'selected'; ?>>Male</option>
            <option value="female" <?php if ($sex == 'female') echo 'selected'; ?>>Female</option>
            <option value="other" <?php if ($sex == 'other') echo 'selected'; ?>>Other</option>
        </select><br><br>
    
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>" required><br><br>
    
        <label for="citizenship">Citizenship:</label>
        <input type="text" id="citizenship" name="citizenship" value="<?php echo $citizenship; ?>" required><br><br>
    
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
    
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required><br><br>
    
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="<?php echo $department; ?>" required><br><br>
    
        <label for="stream">Stream:</label>
        <input type="text" id="stream" name="stream" value="<?php echo $stream; ?>" required><br><br```php
        <input type="submit" value="Submit">
    </form>
</body>
</html>