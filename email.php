<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4070f4;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #white;
        }
        
        form {
            max-width: 420px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            font-size: 14px;
        }
        
        input[type="submit"] {
            background-color: #7d2ae8;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; 
    
        }
        
        input[type="submit"]:hover {
            background-color: #2980b9;
        } 
    
    </style>
</head>
<body>
    <h1> Approval Request</h1>
    <form action="https://formsubmit.co/temesgenb439@gmail.com"  method="POST"> 
        <input type="hidden" name="_captcha" value="false">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required class="put"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required class="put"><br><br>
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required class="put"><br><br>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" required ></textarea><br><br>
        
       <center>  <input type="submit" value="Send Email"></center>
       <center> <a href=""> Finshed </a></center>

    </form>
</body>
</html>

