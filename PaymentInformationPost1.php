<?php
    if (isset($_POST['submit1']) || isset($_POST['submit2'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $unit = $_POST['unit'];
        $paymentremarks = $_POST['paymentremarks'];
        $paymentmethod = isset($_POST['paymentmethod']) ? $_POST['paymentmethod'] : '';
        $date = date('Y-m-d');
        $paymentdeadline = $_POST['paymentdeadline'];
        $balance = intval($_POST['balance']);
        $paymentfees = intval($_POST['paymentfees']);

        // database details
        $host = "localhost";    
        $username = "root";
        $password = "";
        $dbname = "login";

        $connection = new mysqli($host, $username, $password, $dbname);

        // Handling the image upload
        if ($_FILES['filename']['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES['filename']['tmp_name']);
            $paymentimage = mysqli_real_escape_string($connection, $imageData);
        } else {
            // Handle the case when an image upload fails (optional)
            $paymentimage = '';
        }


        if ($balance >= $paymentfees && $date <= $paymentdeadline && $paymentmethod === "Online Payment") {

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $residentIdQuery = mysqli_query($connection, "SELECT Resident_Id FROM residents_table WHERE login = 'Yes'");
            $residentIdRow = mysqli_fetch_assoc($residentIdQuery);
            $residentId = $residentIdRow['Resident_Id'];

            $query = "INSERT INTO payment (Resident_Id, Resident_Name, Email_Address, Telephone_Number, Unit, Balance_Amount, Payment_Fees, Payment_Remarks, Payment_Method, Payment_Deadline, Payment_Status)
            VALUES ('$id', '$name', '$email', '$number', '$unit' ,'$balance', '$paymentfees', '$paymentremarks', '$paymentmethod', '$paymentdeadline', 'Successful')";
            if ($connection->query($query) === TRUE) {
                echo '<script>alert("Payment successful! Thank you.");</script>';
            } else {
                echo '<script>alert("Failed to insert payment details into the database.");</script>';
            }

            $query1 = "UPDATE residents_table SET Balance_Amount =  $balance - $paymentfees WHERE Resident_Id = (SELECT Resident_Id FROM residents_table WHERE Login = 'Yes')";
            if ($connection->query($query1) === TRUE) {
                echo '<script>alert("Upload successful! Thank you.");';
                echo 'window.location.href = "Homepage(R).php";</script>';
            } else {
                echo '<script>alert("Failed to update balance amount in residents table.");</script>';
            }

        } else if ($balance >= $paymentfees && $date > $paymentdeadline && $paymentmethod === "Online Payment") {
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $residentIdQuery = mysqli_query($conn, "SELECT Resident_Id FROM residents_table WHERE login = 'Yes'");
            $residentIdRow = mysqli_fetch_assoc($residentIdQuery);
            $residentId = $residentIdRow['Resident_Id'];

            $query2 = "INSERT INTO payment (Resident_Id, Resident_Name, Email_Address, Telephone_Number, Unit, Balance_Amount, Payment_Fees, Payment_Remarks, Payment_Method, Payment_Deadline, Payment_Status)
            VALUES ('$id', '$name', '$email', '$number', '$unit' ,'$balance', '$paymentfees', '$paymentremarks', '$paymentmethod', '$paymentdeadline', 'Late')";
            if ($connection->query($query2) === TRUE) {
                echo '<script>alert("Payment successful! Thank you.");</script>';
            } else {
                echo '<script>alert("Failed to insert payment details into the database.");</script>';
            }

            $query3 = "UPDATE residents_table SET Balance_Amount =  $balance - $paymentfees";
            if ($connection->query($query3) === TRUE) {
                echo '<script>alert("Upload successful! Thank you.");';
                echo 'window.location.href = "Homepage(R).php";</script>';
            } else {
                echo '<script>alert("Failed to update balance amount in residents table.");</script>';
            }


        } else if ($paymentmethod === "QR Payment") {
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $residentIdQuery = mysqli_query($connection, "SELECT Resident_Id FROM residents_table WHERE login = 'Yes'");
            $residentIdRow = mysqli_fetch_assoc($residentIdQuery);
            $residentId = $residentIdRow['Resident_Id'];

            $query4 = "INSERT INTO payment (Resident_Id, Resident_Name, Email_Address, Telephone_Number, Unit, Balance_Amount, Payment_Fees, Payment_Remarks, Payment_Method, Payment_Image, Payment_Deadline)
            VALUES ('$id', '$name', '$email', '$number', '$unit' ,'$balance', '$paymentfees', '$paymentremarks', '$paymentmethod', '$paymentimage', '$paymentdeadline')";
            if ($connection->query($query4) === TRUE) {
                echo '<script>alert("Payment submitted successful! Thank you.");';
                echo 'window.location.href = "Homepage(R).php";</script>';
            } else {
                echo '<script>alert("Failed to upload payment image in the database.");</script>';
            }          

            $connection->close();
            
        } else {
            echo '<script>alert("Payment failed! Insufficient balance.");</script>';
        }
    }
?>
