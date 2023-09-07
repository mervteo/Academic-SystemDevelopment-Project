<?php
// update_status.php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $requestId = $_POST["request_id"];
    $status = $_POST["status"];

    // Escape the variables to prevent SQL injection
    $requestId = $connection->real_escape_string($requestId);
    $status = $connection->real_escape_string($status);

    // Update the "Status" column in the database
    $sql = "UPDATE access_card SET Status = '$status' WHERE Request_Id = '$requestId'";

    if ($connection->query($sql) === TRUE) {
        // Status updated successfully, you can redirect or display a success message here.
        echo "Status updated successfully";
    } else {    
        // Handle the error, you can redirect or display an error message here.
        echo "Error updating status: " . $connection->error;
    }
}

$connection->close();
?>
