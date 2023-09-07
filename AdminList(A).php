<?php
//step 1 - create a database connection
$host = 'localhost'; //127.0.0.1
$user = 'root';
$password = '';
$database = 'login';
$connection = mysqli_connect($host,$user,$password,$database);

if ($connection===false){
    die('Connection failed'. mysqli_connect_error());
}

$query1 = "SELECT * FROM `adminname` WHERE ID";
$results1 = mysqli_query($connection,$query1);

$query2 = "SELECT * FROM `residents_table` WHERE Resident_Id";
$results2 = mysqli_query($connection,$query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(A)User List</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body>
    <style>
        body{
            background-color: #393646;
        }
        .table,
        .table2 {
            border: 1px solid #5a5959;
            background-color: #bebebe;
            padding: 8px;
            width: 99%;
            border-radius: 20px;
            box-shadow: 10px 10px 5px lightblue;
        }

        /* .table2 {
            margin-bottom: 20px;
        } */

        table td {
            padding-top: 12px;
            padding-bottom: 12px;
            color: rgb(10, 10, 10);
        }
        th{
            padding-top: 12px;
            padding-bottom: 12px;
            /* text-align: left; */
            background-color: #5573c5b2;
            color: rgb(232, 215, 86);
        }

        .table,
        .table2,
        th,
        td {
            padding-bottom: 3%;
            width: fit-content;
            text-align: center;
            margin: 0 auto;
        }

        a{
            text-decoration: none;
            text-shadow: 0 0 3px #FF0000;
            width: fit-content;
            height: fit-content;
        }
        .arrow{
            height:80px;
            width: 80px;
            margin-left: 1%;
            margin-top: 1%;
        }
        .AR{
            margin-left:72%;
            display: inline-block;
            padding: 10px 20px;
            background-color: #0074d9; /* Change this to your desired background color */
            color: #ffffff; /* Change this to your desired text color */
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
            
        }
        .AR:hover {
            background-color: #0056b3; /* Change this to your desired hover background color */
        }
        .AR:active {
            background-color: #004080; /* Change this to your desired active background color */
        }
    </style>
    <a href="Homepage(A).php">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <!-- <a href="AdminSignUp(A).php"><button class="AR">Admin Register</button></a> -->

        <div class="table">
        <h2>Admin List</h2> 
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        <?php while ($row1 = mysqli_fetch_assoc($results1)){?>
            <tr>
                <td><?php echo $row1['ID']; ?></td>
                <td><?php echo $row1['Name']; ?></td>
                <td><?php echo $row1['Email']; ?></td>
                <td><?php echo $row1['Phone']; ?></td>
                <td>
                    <a href="AdminList(Edit).php?userid=<?php echo $row1['ID']; ?></">Edit</a>
                </td>
            </tr>
        <?php } ?>
        </table><br>
        <center><a href="AdminSignUp(A).php"><button class="AR">Admin Register</button></a></center>
    </div>

    <br><br><br>

    <div class="table2">
        <h2>Resident List</h2>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Balance Amount</th>
                <th>Action</th>
            </tr>  
        <?php while ($row2 = mysqli_fetch_assoc($results2)){?>
            <tr>
                <td><?php echo $row2['Resident_Id']; ?></td>
                <td><?php echo $row2['First_Name'] . ' ' . $row2['Last_Name'] ; ?></td>
                <td><?php echo $row2['Email_Address']; ?></td>
                <td><?php echo $row2['Telephone_Number']; ?></td>
                <td><?php echo $row2['Balance_Amount']; ?></td>
                <td>
                    <a href="ResidentList(Edit).php?userid=<?php echo $row2['Resident_Id']; ?></">Edit</a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>  
    
</body>
</html>