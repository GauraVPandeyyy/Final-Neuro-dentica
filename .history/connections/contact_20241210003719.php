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

$name =$_POST['name'];
$email =$_POST['email'];
$subject =$_POST['subject'];
$message =$_POST['message'];

$sql = "INSERT INTO `contactuser04`( `name`, `email`, `subject`, `message`) VALUES ('$name' ,'$email','$subject','$message')";

$result = mysqli_query($con, $sql);

header('Location: ../index.html');
exit;


?>