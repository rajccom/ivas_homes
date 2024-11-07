<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//Database connection details Local
// $dbHost = 'localhost';
// $dbUser = 'root';
// $dbPassword = '';
// $dbName = 'ivas_homes';


// Database connection details
$dbHost = 'localhost';
$dbUser = 'ivas_homes';
$dbPassword = 'a4qhe6aaw6of';
$dbName = 'ivas_homes';

require_once ('./vendor/autoload.php');
// Create database connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

// Check if connection is successful
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['download'])) {
    // Get the table name from the form
    $tableName = $_POST['tableName'];

    // Get the column names and data from the table
    $result = mysqli_query($conn, "SELECT * FROM $tableName");
    $columns = array();
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
        if (empty($columns)) {
            $columns = array_keys($row);
        }
    }

    // Create a new Excel file
    $fileName = $tableName . '-' . date('Y-m-d H:i:s') . '.xlsx';
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set column headers
    foreach ($columns as $columnIndex => $columnName) {
        $cell = $sheet->getCellByColumnAndRow($columnIndex + 1, 1);
        $cell->setValue($columnName);
        $cell->getStyle()->getFont()->setBold(true);
    }

    // Set data
    foreach ($data as $rowIndex => $rowData) {
        foreach ($columns as $columnIndex => $columnName) {
            $cell = $sheet->getCellByColumnAndRow($columnIndex + 1, $rowIndex + 2);
            $cell->setValue($rowData[$columnName]);
        }
    }

    // Download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Download Campaign Leads</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-container button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .logout-link {
            margin-top: 10px;
            display: inline-block;
            color: #dc3545;
            font-size: 14px;
            text-decoration: none;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .card {
            width: 150px;
            height: 150px;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            background-color: #f2f2f2;
            transform: scale(1.05);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
        function setTableName(value) {
            document.getElementById("tableName").value = value;
        }
    </script>
    <!-- Add this script in the <head> section of your HTML, along with the previous script -->

<script>
    let inactivityTimeout;
    let lastActivityTimestamp = Date.now();

    // Function to reset the inactivity timer
    function resetInactivityTimer() {
        clearTimeout(inactivityTimeout);
        inactivityTimeout = setTimeout(checkInactivity, 600000); // 10 minutes in milliseconds
    }

    // Function to check if the tab is visible and user is inactive
    function checkInactivity() {
        if (document.visibilityState === "hidden" && (Date.now() - lastActivityTimestamp) >= 60000) { // 1 minute in milliseconds
            logout();
        } else {
            resetInactivityTimer();
        }
    }

    // Function to log the user out and redirect to the login page
    function logout() {
        window.location.href = "logout.php";
    }

    // Add event listeners for user activity
    document.addEventListener("mousemove", function() {
        lastActivityTimestamp = Date.now();
        resetInactivityTimer();
    });
    
    document.addEventListener("keydown", function() {
        lastActivityTimestamp = Date.now();
        resetInactivityTimer();
    });

    // Add event listener for tab visibility change
    document.addEventListener("visibilitychange", checkInactivity);
</script>

</head>
<body>
    <div class="form-container">
        <form method="post">
            <label for="tableName">Select to Download:</label>
            <input type="text" name="tableName" id="tableName" readonly>
            
            <button type="submit" name="download">Download Here</button>
            
            <a href="logout.php" class="logout-link">Sign Out</a>
        </form>
    </div>
    
    <div class="card-container">
        <div class="card" onclick="setTableName('landing_pages_lead')">Enquiry Data</div>
        <div class="card" onclick="setTableName('contact_lead')">Contact Data</div>
        <div class="card" onclick="setTableName('dealer_lead')">Delaer Data</div>
        <!-- <div class="card" onclick="setTableName('tiles_leads')">Tiles</div>
        <div class="card" onclick="setTableName('bath_fittings_leads')">Bath Fittings</div>
        <div class="card" onclick="setTableName('electricals_leads')">Electricals</div> -->
    </div>
</body>
</html>