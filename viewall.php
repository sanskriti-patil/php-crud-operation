<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        .form-container {
            width: 55%; 
            margin: 90px auto; 
            padding: 16px;
            border: 8px solid gray; 
        }

        .data-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th, .data-table td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>View all record</h1>
        <div class="data-box">
            <table class="data-table">
                
                
                <?php
include("connectioncode.php");

$sql = "SELECT * FROM filldata";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
    echo "<table border='1'>"; // Opening table tag
    echo "<tr><th>No</th><th>First Name</th><th>Last Name</th><th>Mobile Number</th><th>Emailid</th><th>Address</th><th>Date</th><th>Photo</th><th>Edit</th></tr>"; // Table headers

    while ($row = mysqli_fetch_assoc($result)) {
        $userID = $row["no"];
        echo "<tr>";
        echo "<td>" . $row["no"] . "</td>";
        echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["lname"] . "</td>";
        echo "<td>" . $row["mobno"] . "</td>";
        echo "<td>" . $row["emailid"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["photo"] . "</td>";
        echo "<td>";
        echo "<button><a href='update.php/?user_id=$userID' target='f3'>Edit</a></button>"; // Edit button 1
        echo "<button><a href='viewsingledata.php' target='f3'>View record</a></button>"; // Edit button 2
        echo "<button><a href='random.php' target='f3'>Delete</a></button>"; // Edit button 3
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>"; // Closing table tag
} else {
    echo "No record found";
}

mysqli_close($conn);
?>




            </table>
        </div>
    </div>
</body>
</html>
<?php session_start(); ?>

