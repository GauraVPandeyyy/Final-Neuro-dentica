<?php
$host = "localhost";
$user = "root";        // Default XAMPP username
$password = "";        // Default XAMPP password
$dbname = "nmkappointmentdb
"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>