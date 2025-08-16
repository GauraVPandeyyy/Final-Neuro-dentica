<?php
session_start();
include '../config.php';

if (isset($_POST['login'])) {
    

    $query= "SELECT * FROM `admin_users` WHERE `username` = `$_POST[username]` AND `password` = $_POST[password]";
    
    $result = mysqli_query($conn , $query);

    if (num_rows === 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>