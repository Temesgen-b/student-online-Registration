
<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
</head>
<body>
    <form action="update_page.php" method="post">
       <!-- <input type="text" name="id" placeholder="ID"> 

        <input type="text" name="new_data_1" placeholder="New Data 1">
        <input type="text" name="new_data_2" placeholder="New Data 2">  -->

        <label for="stud_id">Student ID:</label>
        <input type="text" id="stud_id" name="stud_id"  required value="<?php echo $row['column1']; ?>" ><br><br>
    
        <label for="f_name">First Name:</label>
        <input type="text" id="f_name" name="f_name" required value="<?php echo $row['column1']; ?>" ><br><br>
    
        <label for="l_name">Last Name:</label>
        <input type="text" id="l_name" name="l_name" required value="<?php echo $row['column1']; ?>" ><br><br>
    
        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="male" >Male</option>
            <option value="female" >Female</option>
            <option value="other" >Other</option>
        </select><br><br>
    
        <label for="age">Age:</label>
        <input type="number" id="age" name="age"  required value="<?php echo $row['column1']; ?>" ><br><br>
    
        <label for="citizenship">Citizenship:</label>
        <input type="text" id="citizenship" name="citizenship"  required value="<?php echo $row['column1']; ?>" ><br><br>
    
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"  required value="<?php echo $row['column1']; ?>"><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  required value="<?php echo $row['column1']; ?>"><br><br>
    
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile"  required value="<?php echo $row['column1']; ?>"><br><br>
    
        <label for="department">Department:</label>
        <input type="text" id="department" name="department"  required value="<?php echo $row['column1']; ?>"><br><br>
    
        <label for="stream">Stream:</label>
        <input type="text" id="stream" name="stream"  required value="<?php echo $row['column1']; ?>"><br><br>


        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
