<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>

<body>
    <div class="container">
        <div class="myForm">
            <h2>ADMIN LOGIN</h2>
            <form method="POST">
                <!-- <label for="username">Username:</label> -->
                <i class="ri-user-3-fill"></i>
                <input type="text" name="username" id="username" placeholder="username"  required>

                <!-- <label for="password">Password:</label> -->
                <i class="ri-lock-fill"></i>
                <input type="password" name="password" id="password" placeholder="password"  required>

                <button type="submit" name="login">Login</button>
            </form>
            <div class="extra">
                <a href="#">Forgot Password ?</a>
            </div>

        </div>
        <div class="image">
            <img src="DoctorImage.jpg" alt="">
        </div>

    </div>
    <?php

    require("../config.php");

    if (isset($_POST['login'])) {


        $query = "SELECT * FROM `admin_users` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            session_start();
            $_SESSION['admin_logged_in'] = true;
            // $_SESSION['adminLoggedIn'] = $_POST['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script> alert('Incorrect Password');</script>";
        }
    }
    ?>

</body>

</html>