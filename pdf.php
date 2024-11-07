<?php
require_once('tcpdf/tcpdf.php');
require_once('phpmailer/PHPMailerAutoload.php');

// Database connection details
include 'db.php';

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Students Data to PDF Conversion');

// Add a page
$pdf->AddPage();

// Set font and size
$pdf->SetFont('helvetica', '', 12);

// Connect to the database
  
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Check if there is data in the table
if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Write the data onto the PDF
        $pdf->Write(0, "First Name: " . $row["first_Name"] . "\n");
        $pdf->Write(0, "Last Name: " . $row["last_Name"] . "\n");
        $pdf->Write(0, "Sex: " . $row["sex"] . "\n");
        $pdf->Write(0, "Age: " . $row["Age"] . "\n");
        $pdf->Write(0, "Citizenship: " . $row["Citizenship"] . "\n");
        $pdf->Write(0, "DOB: " . $row["DOB"] . "\n");
        $pdf->Write(0, "Email: " . $row["Email"] . "\n");
        $pdf->Write(0, "Mobile: " . $row["Mobile"] . "\n");
        $pdf->Write(0, "Occupation: " . $row["Occupation"] . "\n");
        $pdf->Write(0, "Level: " . $row["Level"] . "\n");
        $pdf->Write(0, "Physical Disability: " . $row["Physhical_dis"] . "\n");
        $pdf->Ln(); // Add a line break
    }
} else {
    $pdf->Write(0, "No data found in the students table.");
}

// Close the database connection
$conn->close();

// Generate PDF content
$pdfContent = $pdf->Output('students_data.pdf', 'S');

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration (if using SMTP)
$mail->IsSMTP();
$mail->Host = 'smtp.example.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'your_email@example.com';
$mail->Password = 'your_email_password';

// Sender and recipient details
$mail->SetFrom('your_email@example.com', 'Your Name');
$mail->AddAddress('recipient_email@example.com', 'Recipient Name');

// Email subject and body
$mail->Subject = 'Students Data PDF';
$mail->Body = 'Please find attached the students data PDF.';

// Attach the PDF to the email
$mail->AddStringAttachment($pdfContent, 'students_data.pdf');

// Send the email
if ($mail->Send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
?>