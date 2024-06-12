<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        .form-container {
            width: 78%; 
            margin: 300px auto; 
            padding: 16px;
            border: 8px solid gray; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>User Management</h1>
        <h2><a href="newfilldata.php" target="f3">Add New User</a></h2>
        <form method="POST">
            <label for="id">#:</label>
            <input type="text" id="id" name="id" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="created_date">Created Date:</label>
            <input type="text" id="created_date" name="created_date" required>

            <label for="action">Action:</label>
            <input type="text" id="action" name="action" required>

        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $created_date = $_POST['created_date'];
    $action = $_POST['action'];

    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (id, name, email, mobile, created_date, action)
            VALUES ('$id', '$name', '$email', '$mobile', '$created_date', '$action')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
