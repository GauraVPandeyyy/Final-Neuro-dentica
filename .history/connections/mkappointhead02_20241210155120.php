<?php

// $server = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mkappointmentdb";

// $con = mysqli_connect($server , $username ,$password , $dbname);

// if(!$con){
//     echo "not connected";
// }
include '../config.php';
//start 


$name =$_POST['name'];
$email =$_POST['email'];
$date =$_POST['date'];
$time =$_POST['time'];
$message =$_POST['message'];

$sql = "INSERT INTO `mkappointheader02`( `name`, `email`, `date`, `time`, `message`) VALUES ('$name' ,'$email','$date','$time','$message')";

$result = mysqli_query($conn, $sql);

echo "<script>
    alert('S Successfully!');
    window.location.href = '../index.html';
</script>";
exit;


?>