<?php
$host = "localhost";
$user = "root";        // Default XAMPP username
$password = "";        // Default XAMPP password
$dbname = "mkappointmentdb"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

if(mysqli_connect_error()){
    echo "Can not Connect";
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>