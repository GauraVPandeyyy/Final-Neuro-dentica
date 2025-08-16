<?php
session_start();
require '../config.php.php'; // Connection file

if (isset($_POST['submit_email'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Generate a random OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Send OTP to email (using PHP mail function)
        $subject = "Password Reset OTP";
        $message = "Your OTP for password reset is: $otp";
        $headers = "From: noreply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "OTP has been sent to your email.";
            header("Location: reset_password.php");
            exit();
        } else {
            echo "Failed to send OTP. Try again.";
        }
    } else {
        echo "Email not found in the database.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <form action="forgot_password.php" method="POST">
        <label>Enter your registered Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit" name="submit_email">Send OTP</button>
    </form>
</body>
</html>