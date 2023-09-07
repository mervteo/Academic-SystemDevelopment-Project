<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $unit = $_POST['unit'];
        $reason= $_POST['reason'];
        $description = $_POST['description'];
    }

    // database details
    $host = "localhost";    
    $username = "root";
    $password = "";
    $dbname = "login";

    // creating a connectionnection
    $connection = mysqli_connect($host, $username, $password, $dbname);

    // Check if the connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $residentIdQuery = mysqli_query($connection, "SELECT Resident_Id FROM residents_table WHERE login = 'Yes'");
        $residentIdRow = mysqli_fetch_assoc($residentIdQuery);
        $residentId = $residentIdRow['Resident_Id'];
        // Prepare the SQL query
        $query = "INSERT INTO access_card (Resident_Id, Resident_Name, Email_Address, Telephone_Number, Unit, Reasons, Descriptions)
                  VALUES ('$id', '$name', '$email', '$number', '$unit', '$reason', '$description')";

        // Execute the query and check if it was successful
        if (mysqli_query($connection, $query)) {
            echo '<script type="text/javascript">';
            echo 'alert("Request Successful Sent, Thank you.");';
            echo 'window.location.href = "Homepage(R).php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Error: ' . mysqli_error($connection) . '");';
            echo 'window.location.href = "Homepage(R).php";';
            echo '</script>';
            header("Location: AccessCard(R).php");
        }
    }   

    // close connection
    mysqli_close($connection);
?>
