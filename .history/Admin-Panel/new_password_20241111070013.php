<?php
session_start();
require '../config.php';

if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update_password'])) {
    $new_password = $_POST['new_password'];
    $email = $_SESSION['email'];

    // Update the password in the database
    $query = "UPDATE admin SET password = '$new_password' WHERE email = '$email'";
    if (mysqli_query($conn, $query)) {
        echo "Password has been reset successfully.";
        // Clear session variables
        unset($_SESSION['otp'], $_SESSION['email'], $_SESSION['otp_verified']);
        header("Location: login.php");
        exit();
    } else {
        echo "Failed to reset password. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Password</title>
</head>
<body>
    <form action="new_password.php" method="POST">
        <label>Enter New Password:</label>
        <input type="password" name="new_password" required><br>
        <button type="submit" name="update_password">Update Password</button>
    </form>
</body>
</html>