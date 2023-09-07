<?php
    if(isset($_POST['submit']))
    {
        $paymentfees = $_POST['paymentfees'];
        $paymentremarks = $_POST['paymentremarks'];
        $paymentdeadline = $_POST['paymentdeadline'];
        $formatteddeadline = date('Y-m-d', strtotime($paymentdeadline));
    }

    // database details
    $host = "localhost";    
    $username = "root";
    $password = "";
    $dbname = "login";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $qry = mysqli_query($con, "SELECT * FROM payment_information");
    $rowCheck=mysqli_num_rows($qry);
    if ($rowCheck>0) { // if data exist update the data
        // Prepare the SQL query
        $query = "UPDATE payment_information
                  SET Fees = '$paymentfees', 
                  Remarks = '$paymentremarks', 
                  Deadline = '$formatteddeadline'";
        // Execute the query and check if it was successful
        if (mysqli_query($con, $query)) {
            echo '<script>alert("Update successful!");';
            echo 'window.location.href = "Homepage(A).php"</script>';
        } else {
            echo "Error: " . mysqli_error($con);
        } 
    } else {
        $adminIdQuery = mysqli_query($con, "SELECT ID FROM adminname WHERE login = 'Yes'");
        $adminIdRow = mysqli_fetch_assoc($adminIdQuery);
        $adminId = $adminIdRow['ID'];
        $qry=mysqli_query($con,"INSERT INTO payment_information (Admin_Id, Fees, Remarks, Deadline)
        VALUES ('$adminId', '$paymentfees', '$paymentremarks', '$paymentdeadline')");

        echo "Insert successful";
    }

    // close connection
    mysqli_close($con);
?>
