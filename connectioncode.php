<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mydatabase';


$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
die('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>
