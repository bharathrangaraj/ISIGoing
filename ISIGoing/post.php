<?php
// ajax call to edit photo description
sleep(1);

include 'dbconnection.php';
$pk = $_POST['pk'];
$name = $_POST['name'];
$value = $_POST['value'];



if (!empty($value) && mysqli_query($conn, 'update photo set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where idPhoto = "'.mysql_escape_string($pk).'"')) {

$result = mysqli_query($conn, 'update photo set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where idPhoto = "'.mysql_escape_string($pk).'"');

} else {
    
    header('HTTP 400 Bad Request', true, 400);
    echo "This field is required!";
}
?>