<?php
session_start();
require '../config.php';

if (isset($_POST['verify_otp'])) {
    $otp = $_POST['otp'];

    if ($otp == $_SESSION['otp']) {
        // OTP is correct
        $_SESSION['otp_verified'] = true;
        header("Location: new_password.php");
        exit();
    } else {
        echo "Invalid OTP. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
</head>
<body>
    <form action="reset_password.php" method="POST">
        <label>Enter the OTP sent to your email:</label>
        <input type="text" name="otp" required><br>
        <button type="submit" name="verify_otp">Verify OTP</button>
    </form>
</body>
</html>