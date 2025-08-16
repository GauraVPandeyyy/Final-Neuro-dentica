<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../config.php'; // Database configuration

// Queries to fetch data from each form's table
$make_appointment_query = "SELECT * FROM mkappointuser ORDER BY ID DESC";
$request_appointment_query = "SELECT * FROM mkappointheader02 ORDER BY ID DESC";
$free_quote_query = "SELECT * FROM freequoteuser03 ORDER BY ID DESC";
$contact_us_query = "SELECT * FROM contactuser04 ORDER BY ID DESC";

$make_appointment_data = $conn->query($make_appointment_query);
$request_appointment_data = $conn->query($request_appointment_query);
$free_quote_data = $conn->query($free_quote_query);
$contact_us_data = $conn->query($contact_us_query);
?>

<!DOCTYPE html>
<html lang="en">
<img src="" alt="">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <div id="header">
        <h1>WELCOME TO ADMIN PANEL</h1>
      
        <form action="logout.php" method="POST">
            <button name="logout">LOG OUT</button>
        </form>
    </div>

    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
    }
    ?>

    <!-- Make Appointment Section -->
    <h2>Make Appointment : <i class="ri-corner-right-down-fill"></i></h2>
    <hr style="border: 1.5px solid black;">
    <div class="filter_download">
        <input type="text" id="searchInputMakeAppointment" placeholder="Search in Make Appointment"
            onkeyup="filterTable('searchInputMakeAppointment', 'makeAppointmentTable')">
        <button onclick="exportTableToExcel('makeAppointmentTable', 'Make_Appointment_Data')"><i
                class="ri-download-2-fill"></i></button>
    </div>
    <div id="paginationControlsMakeAppointment"></div>

    <table border="1" id="makeAppointmentTable">
        <tr>
            <th>ID</th>
            <th>Department</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Phone</th>
        </tr>
        <?php while ($row = $make_appointment_data->fetch_assoc()): ?>
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
    <h2>Request Appointment : <i class="ri-corner-right-down-fill"></i></h2>
    <hr style="border: 1.5px solid black;">
    <div class="filter_download">
        <input type="text" id="searchInputRequestAppointment" placeholder="Search in Request Appointment"
            onkeyup="filterTable('searchInputRequestAppointment', 'requestAppointmentTable')">
        <button onclick="exportTableToExcel('requestAppointmentTable', 'Request_Appointment_Data')"><i
                class="ri-download-2-fill"></i></button>
    </div>
    <div id="paginationControlsRequestAppointment"></div>

    <table border="1" id="requestAppointmentTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
        </tr>
        <?php while ($row = $request_appointment_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td class="message"><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Free Quote Section -->
    <h2>Free Quote : <i class="ri-corner-right-down-fill"></i></h2>
    <hr style="border: 1.5px solid black;">
    <div class="filter_download">
        <input type="text" id="searchInputFreeQuote" placeholder="Search in Free Quote"
            onkeyup="filterTable('searchInputFreeQuote', 'freeQuoteTable')">
        <button onclick="exportTableToExcel('freeQuoteTable', 'Free_Quote_Data')"><i
                class="ri-download-2-fill"></i></button>
    </div>
    <div id="paginationControlsFreeQuote"></div>

    <table border="1" id="freeQuoteTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php while ($row = $free_quote_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td class="message"><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Contact Us Section -->
    <h2>Contact Us : <i class="ri-corner-right-down-fill"></i></h2>
    <hr style="border: 1.5px solid black;">
    <div class="filter_download">
        <input type="text" id="searchInputContactUs" placeholder="Search in Contact Us"
            onkeyup="filterTable('searchInputContactUs', 'contactUsTable')">
        <button onclick="exportTableToExcel('contactUsTable', 'Contact_Us_Data')"><i
                class="ri-download-2-fill"></i></button>
    </div>

    <div id="paginationControlsContactUs"></div>

    <table border="1" id="contactUsTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <?php while ($row = $contact_us_data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td class="message"><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>


    <!-- SCRIPT FUNCTIONS FOR FILTERING , PAGINATION , DOWNALOADABLE FILES -->

    <script>
        function filterTable(inputId, tableId) {
            let input = document.getElementById(inputId);
            let filter = input.value.toLowerCase();
            let table = document.getElementById(tableId);
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? "" : "none";
            }
        }

        let currentPage = 1;
        const rowsPerPage = 10;

        function paginateTable(tableId, controlsId) {
            let table = document.getElementById(tableId);
            let rows = table.getElementsByTagName("tr");
            let totalRows = rows.length - 1;
            let totalPages = Math.ceil(totalRows / rowsPerPage);

            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = (i > (currentPage - 1) * rowsPerPage && i <= currentPage * rowsPerPage) ? "" : "none";
            }

            let controls = document.getElementById(controlsId);
            controls.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                let pageButton = document.createElement("button");
                pageButton.innerText = i;
                pageButton.onclick = function () {
                    currentPage = i;
                    paginateTable(tableId, controlsId);
                };
                controls.appendChild(pageButton);
            }
        }

        function exportTableToExcel(tableId, filename = '') {
            let table = document.getElementById(tableId);
            let wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
            XLSX.writeFile(wb, filename + ".xlsx");
        }

        // Initialize pagination for each table
        paginateTable('makeAppointmentTable', 'paginationControlsMakeAppointment');
        paginateTable('requestAppointmentTable', 'paginationControlsRequestAppointment');
        paginateTable('freeQuoteTable', 'paginationControlsFreeQuote');
        paginateTable('contactUsTable', 'paginationControlsContactUs');
    </script>
</body>

</html>