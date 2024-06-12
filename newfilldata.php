<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form</title>
<style>
    .form-container {
        width: 30%; 
        margin: 50px auto; 
        padding: 20px;
        border: 30px solid gray; 
    }
</style>
</head>
<body>
    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
        <center>
        <h2>Fill Data</h2>
        <br>
        <h3>Fill Below Form</h3>
        
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="n2" required><br><br>
        
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="n3" required><br><br>
      
        <label for="mobno">Enter your mobile number:</label><br>
        <input type="text" id="mobno" name="n4" required><br><br>
    
        <label for="emailid">Enter your email id:</label><br>
        <input type="email" id="emailid" name="n5" required><br><br>
      
        <label for="address">Enter your address:</label><br>
        <textarea id="address" name="n6" rows="6" required></textarea><br><br>

        <label for="date">Enter Date:</label><br>
        <input type="date" id="date" name="n7" required><br><br>
        

        <label for="photo">Upload Photo:</label><br>
        <input type="file" id="photo" name="n8" required><br><br>
      
        <input type="submit" name="submit" value="submit" style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">
        </center>
        <h4 align="center"><a href="viewall.php" target="f3">| VIEW ALL |</a></h4>
        </form>
    </div>
</body>
</html>

<?php
include("connectioncode.php");

// Check if the directory exists
$directory = "phpcurdoperation/photo/";
if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

if(isset($_POST['submit']))
{
    // 1. Retrieve the last "no" value from the database and increment it by 1
    $sql_sequence = "SELECT MAX(no) as max_no FROM filldata";
    $result_sequence = mysqli_query($conn, $sql_sequence);
    $row_sequence = mysqli_fetch_assoc($result_sequence);
    $no = $row_sequence['max_no'] + 1;

    // 2. Get other form data
    $fname = $_POST['n2'];
    $lname = $_POST['n3'];
    $mobno = $_POST['n4'];
    $emailid = $_POST['n5'];
    $address = $_POST['n6'];
    $date = $_POST['n7'];
    
    // Check if file is uploaded
    if(isset($_FILES['n8'])) {
        $photo = $_FILES['n8']['name'];
        $tphoto = $_FILES['n8']['tmp_name'];
        $photo_destination = $directory . $photo;
        
        // Move uploaded file to destination
        if(move_uploaded_file($tphoto, $photo_destination)) {
            // 3. Insert data into the database
            $sql = "INSERT INTO filldata (no, fname, lname, mobno, emailid, address, date, photo) VALUES ('$no', '$fname', '$lname', '$mobno', '$emailid', '$address', '$date', '$photo')";

            if(mysqli_query($conn, $sql)) {
                echo "One record inserted";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

