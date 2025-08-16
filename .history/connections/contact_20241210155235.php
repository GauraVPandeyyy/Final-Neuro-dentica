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
$subject =$_POST['subject'];
$message =$_POST['message'];

$sql = "INSERT INTO `contactuser04`( `name`, `email`, `subject`, `message`) VALUES ('$name' ,'$email','$subject','$message')";

$result = mysqli_query($conn, $sql);

echo "<script>
    alert('Submitted your Quote Successfully!');
    window.location.href = '../index.html';
</script>";
exit;


?>