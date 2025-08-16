<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <div class="myForm">
            <h2>Admin Login</h2>
            <form method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="login">Login</button>

                <div class="extra">
                    <a href="#">Forgot Password ?</a>
                </div>
        </div>
        <div class="image">
            
        </div>
        </form>
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