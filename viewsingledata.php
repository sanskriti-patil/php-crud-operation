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
        <h1>User Details</h1>
        <form method="POST">

        <table-border='2'>
        <tr>
            <th>no:</th>
            <td><input type="text" name="n1"></td>
        </tr>
        <tr>
            <th><input type="submit" value="submit" name="submit"></th>
        </tr>
    </table>
        </form>
    </div>
</body>
</html>


<?php
include("connectioncode.php");

if(isset($_POST['submit'])) {
    $fname = $_POST['n1'];
    
    $sql = "SELECT * FROM filldata WHERE fname=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $fname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        echo "<table border='1'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Email ID</th>
                    <th>Address</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["lname"] . "</td>
                    <td>" . $row["mobno"] . "</td>
                    <td>" . $row["emailid"] . "</td>
                    <td>" . $row["address"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No record found";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
