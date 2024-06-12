<?php
include("connectioncode.php");

if(isset($_POST['submit'])) {
    // Assuming 'id' is passed via GET method
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Deleting record from 'users' table
        $result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

        // Deleting record from 'filldata' table
        $fname = $_POST['n1'];
        $sql = "DELETE FROM filldata WHERE fname=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $fname);
        if(mysqli_stmt_execute($stmt)) {
            echo "One record deleted";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: ID not provided.";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    /* Popup box styling */
    .popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .popup-box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Button styling */
    .popup-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }
</style>
</head>
<body>

<!-- Button to trigger the popup box -->
<button onclick="showPopup()">delete given data</button>

<!-- Popup container -->
<div id="popupContainer" class="popup-container">
    <!-- Popup box -->
    <div class="popup-box">
        <p>Are you sure you want to proceed?</p>
        <!-- "Yes" button -->
        <button class="popup-btn" onclick="confirmAction(true)">Yes</button>
        <!-- "No" button -->
        <button class="popup-btn" onclick="confirmAction(false)">No</button>
    </div>
</div>

<script>
    // Function to display the popup box
    function showPopup() {
        document.getElementById("popupContainer").style.display = "block";
    }

    // Function to handle user's response (Yes or No)
    function confirmAction(response) {
        if (response) {
            alert("one record deleted!");
            // Add your action for "Yes" here
        } else {
            alert("record is not deleted!");
            // Add your action for "No" here
        }
        // Close the popup box after user's response
        document.getElementById("popupContainer").style.display = "none";
    }
</script>

</body>
</html>
