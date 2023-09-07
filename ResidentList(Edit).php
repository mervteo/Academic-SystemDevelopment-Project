<?php
include 'dbConn.php';

    $userid = $_GET['userid'];//retrieve userid from the url

    if ($userid == null){
        echo '<script> alert("Error Finding Account Info!")</script>';
        echo '<script>window.location.href = "AdminList(A).php";</script>';
    }

    $query = "SELECT * FROM `residents_table` WHERE Resident_Id ='$userid' ";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results);// $row['email']
    $count = mysqli_num_rows($results);// 1 or 0

    $_SESSION['Resident_Id'] = $row['Resident_Id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(A)Resident Edit Page</title>
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
</head>
<body background="AdminPage.jpg">
    <style>
        body{
            background-size: cover;
            background-repeat: no-repeat;
        }
        .all{
            /* margin-top: 10%; */
            margin-left: 40%;
            border-radius: 20px;
            background-color: rgba(211, 211, 211);
            padding: 20px;
            height: auto;
            width:20%;
        }
        input{
            padding:1%;
            margin-bottom:1rem;
            border: none;
            border-bottom: 2px solid rgb(33, 30, 30);
            background-color: rgba(141, 138, 138, 0.067);
        }

        .btnUp {
            align-items: center;
            appearance: none;
            background-color: #3EB2FD;
            background-image: linear-gradient(1deg, #4F58FD, #149BF3 99%);
            background-size: calc(100% + 20px) calc(100% + 20px);
            border-radius: 100px;
            border-width: 0;
            box-shadow: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-flex;
            font-family: CircularStd,sans-serif;
            font-size: 1rem;
            height: auto;
            justify-content: center;
            line-height: 1.5;
            padding: 6px 20px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: background-color .2s,background-position .2s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: top;
            white-space: nowrap;
            margin-top: 3%;
        }
        
        .btnUp:active,
        .btnUp:focus {
            outline: none;
        }
        
        .btnUp:hover {
            background-position: -20px -20px;
        }
        
        .btnUp:focus:not(:active) {
            box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
        }
        .arrow{
            height:80px;
            width: 80px;
            margin-left: 1%;
            margin-top: 1%;
        }
    </style>
    <a href="AdminList(A).php">
        <img src="Arrow2.png" class="arrow" alt="">
    </a>
    <div class="all">
    <h2>Resident Details</h2>
    <form action="" method="post">
        <?php if ($count == 1) {?>
        <?php//  echo 'record found';?>
        <?php // echo $row['ID'] . ' '?>
            <?php //$row['Name'] . ' '?>
            <?php //$row['Email'] . ' '?>
            <?php //$row['Phone'];?>
        <?php } else {?>
        <?php  echo '<script> alert("Record not found, please try again!")</script>';?>
        <?php }?>
        ID :<input type="text" value = "<?php echo $row['Resident_Id']; ?>" name="txtID" disabled><br>
        First Name :<input type="text" value = "<?php echo $row['First_Name']; ?>" name="txtFName"><br>
        Last Name :<input type="text" value = "<?php echo $row['Last_Name']; ?>" name="txtLName"><br>
        Email Address :<input type="text" value = "<?php echo $row['Email_Address']; ?>" name="txtEmail" ><br>
        Phone Number :<input type="text" value = "<?php echo $row['Telephone_Number']; ?>" name="txtPhone"><br>
        Unit :<input type="text" value = "<?php echo $row['Unit']; ?>" name="txtUnit"><br>
        <div class = "Unit">
        <select name="txtUnit1" class="form-style1"  id="typeInput" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <span>-</span>
        <select name="txtUnit2" class="form-style2" required>
            <option value="1" >1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <span>-</span>
        <select name="txtUnit3" class="form-style3" required>
            <option value="1" >1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br>
    </div><br>
        Gender :<input type="text" value = "<?php echo $row['Gender']; ?>" name="txtGender"><br>
        Race :<input type="text" value = "<?php echo $row['Race']; ?>" name="txtRace"><br>
        Religion :<input type="text" value = "<?php echo $row['Religion']; ?>" name="txtReligion"><br>
        Age :<input type="text" value = "<?php echo $row['Age']; ?>" name="txtAge"><br>
        Balance Amount :<input type="text" value = "<?php echo $row['Balance_Amount']; ?>" name="txtBA"><br>

        <input type="submit" value="Update" name="btnUpdate" class="btnUp">
        </select>
        <br>
    </form>
    </div>
</body>
</html>
<?php

?>

<?php
if (isset($_POST['btnUpdate'])) {
    $ID = $_SESSION['Resident_Id'];
    $FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $UnitN = $_POST['txtUnit1'].'-'.$_POST['txtUnit2'].'-'.$_POST['txtUnit3'];
    $gender = $_POST['txtGender'];
    $race = $_POST['txtRace'];
    $religion = $_POST['txtReligion'];
    $age = $_POST['txtAge'];
    $ba = $_POST['txtBA'];

    // Use prepared statement to prevent SQL injection
    $query1 = "UPDATE `residents_table` SET First_Name=?, Last_Name=?, Email_Address=?, Telephone_Number=?, Unit=?, Gender=?, Race=?, Religion=?, Age=?, Balance_Amount=? WHERE Resident_Id = $ID";
    $stmt1 = $connection->prepare($query1);
    $stmt1->bind_param("ssssssssss",$FName,$LName, $email, $phone, $UnitN, $gender, $race, $religion, $age, $ba);
    if ($stmt1->execute()) {
        echo '<script> alert("Resident Information Successfully Updated!")</script>';
        echo '<script>window.location.href = "AdminList(A).php";</script>';
        exit();
    } else {
        echo '<script> alert("Error Updating the Information. Please try again.")</script>';
    }
}
?>