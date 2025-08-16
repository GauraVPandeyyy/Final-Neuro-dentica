<?php
session_start();
include '../config.php';

if (isset($_POST['login'])) {
    

    $query= "SELECT * FROM `admin_users` WHERE `username` = `$_POST[  AND password = ?";
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>