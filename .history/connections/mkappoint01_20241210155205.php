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

$department = $_POST['department'];
$name =$_POST['name'];
$email =$_POST['email'];
$date =$_POST['date'];
$time =$_POST['time'];
$phone =$_POST['phone'];

/*
$department = $_POST['department'];
if (empty($department)) {
    echo "Department value is empty. Please select a department.";
} else {
    // SQL query run karne se pehle department ki value ko echo kar ke check karein
    echo "Selected department: " . $department;
}
*/

$sql = "INSERT INTO `mkappointuser`(`department`, `name`, `email`, `date`, `time`, `phone`) VALUES ('$department','$name' ,'$email','$date','$time','$phone')";

$result = mysqli_query($conn, $sql);

echo "<script>
    alert('Appointment Booking Successfully !');
    window.location.href = '../index.html';
</script>";
exit;


?>