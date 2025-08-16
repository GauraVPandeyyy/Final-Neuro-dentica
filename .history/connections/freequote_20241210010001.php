<?php

// $server = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mkappointmentdb";

// $con = mysqli_connect($server , $username ,$password , $dbname);

// if(!$con){
//     echo "not connected";
// }
//start 
include '../config.php';

$name =$_POST['name'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$message =$_POST['message'];

$sql = "INSERT INTO `freequoteuser03`( `name`, `email`, `phone`,`message`) VALUES ('$name' ,'$email','$phone','$message')";

$result = mysqli_query($conn, $sql);
echo "<script> alert('Submitted your Quote Success');</script>";
header('Location: ../index.html?message=success');

exit;


?>