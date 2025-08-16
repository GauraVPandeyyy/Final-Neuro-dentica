<?php
session_start();
require '../config.php';
require 'Admin-Panel\PHPMailer-master\src\Exception.php';
require 'Admin-Panel\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit_email'])) {
    $email = $_POST['email'];

    // Check if email exists in the database
    $query = "SELECT * FROM admin_users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Initialize PHPMailer and configure SMTP
        $mail = new PHPMailer(true);
        try {
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'gauravp7637@gmail.com';
            $mail->Password = '911835';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Email Settings
            $mail->setFrom('gauravp7637@gmail.com', 'Gaurav Pandey');
            $mail->addAddress($email);
            $mail->Subject = 'Password Reset OTP';
            $mail->Body = "Your OTP for password reset is: $otp";

            $mail->send();
            echo "OTP has been sent to your email.";
            header("Location: reset_password.php");
            exit();
        } catch (Exception $e) {
            echo "Failed to send OTP. Mailer Error: {$mail->ErrorInfo}";
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