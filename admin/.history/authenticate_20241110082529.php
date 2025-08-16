<?php
session_start();
include '../config.php';

if (isset($_POST['login'])) {
    

    $query= "SELECT * FROM `admin_users` WHERE `username` = `$_POST[username]` AND `password` = $_POST[password]";
    
    $result = mysqli_query($conn , $query);

    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['admin_logged_in'] = $_POST['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script> alert";
    }
}
?>