<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Form</title>
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
        <h2>Update Data</h2>
        <br>
        <h3>Update Your Info</h3>

        <label for="no">No.:</label><br>
        <input type="text" id="no" name="no" required><br><br>
        
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br><br>
        
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required><br><br>
      
        <label for="mobno">Enter your mobile number:</label><br>
        <input type="text" id="mobno" name="mobno" required><br><br>
    
        <label for="emailid">Enter your email id:</label><br>
        <input type="email" id="emailid" name="emailid" required><br><br>
      
        <label for="address">Enter your address:</label><br>
        <textarea id="address" name="address" rows="4" required></textarea><br><br>

        <label for="date">Enter date:</label><br>
        <input type="date" id="date" name="date" required><br><br>
        
        <label for="photo">Upload photo:</label><br>
        <input type="file" id="photo" name="photo" required><br><br>
        
      
        <input type="submit" name="submit" value="update" style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">

        </center>
        </form>
    </div>
</body>
</html>

<?php
include("connectioncode.php");

$userID = $_GET['user_id'];
echo "User ID From URl== ".$userID ;

$sql = "select * FROM filldata WHERE no="$userID;

echo ""
if(isset($_POST['submit']))
{
    $no = $_POST['no'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname']; 
    $mobno = $_POST['mobno'];
    $emailid = $_POST['emailid'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    
    $photo_destination = "phpcurdoperation/photo/" . $photo;

    if(move_uploaded_file($photo_tmp, $photo_destination)) {
        $sql = "UPDATE filldata SET lname='$lname', mobno='$mobno', emailid='$emailid', address='$address', date='$date', photo='$photo' WHERE no='$no'";

        if(mysqli_query($conn, $sql)) {
            echo "One record updated";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
}

mysqli_close($conn);
?>
