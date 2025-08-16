<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../config.php'; // Database configuration

// Queries to fetch data from each form's table
$make_appointment_query = "SELECT * FROM mkappointuser ORDER BY ID DESC LIMIT 10";
$request_appointment_query = "SELECT * FROM mkappointheader02 ORDER BY ID DESC LIMIT 10";
$free_quote_query = "SELECT * FROM freequoteuser03 ORDER BY ID DESC LIMIT 10";
$contact_us_query = "SELECT * FROM contactuser04 ORDER BY ID DESC LIMIT 10";

$make_appointment_data = $conn->query($make_appointment_query);
$request_appointment_data = $conn->query($request_appointment_query);
$free_quote_data = $conn->query($free_quote_query);
$contact_us_data = $conn->query($contact_us_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Add custom CSS for styling -->
</head>
<body>
    <h1>WELCOME TO ADMIN PANEL - <?php echo $_SESSION['']</h1>

    <!-- Make Appointment Section -->
    <h2>Make Appointment</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Department</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Phone</th>
        </tr>
        <?php while($row = $make_appointment_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Request Appointment Section -->
    <h2>Request Appointment</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
        </tr>
        <?php while($row = $request_appointment_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Free Quote Section -->
    <h2>Free Quote</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php while($row = $free_quote_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Contact Us Section -->
    <h2>Contact Us</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <?php while($row = $contact_us_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>