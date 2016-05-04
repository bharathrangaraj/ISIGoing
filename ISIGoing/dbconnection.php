<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- script for connection to database -->
<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="isigoing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 