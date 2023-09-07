<?php
  session_start();
  include "dbConn.php";
  
  $query01 = "SELECT * FROM `enquiry` ORDER BY Enquiry_Id DESC";
  $results01 = mysqli_query($connection, $query01);

  if (isset($_POST['submitbtn'])) {
    $ID = $_POST['Enquiry_Id'];
    $Reply = $_POST['Reply'];
    $Status = $_POST['Status'];

    $query = "UPDATE `enquiry` SET Reply = '$Reply', Status = '$Status' WHERE Enquiry_Id = '$ID'";
    $results = mysqli_query($connection, $query);

    if ($results) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Enquiry Updated Successfully!");';
        echo 'window.location.href = "Enquiry(A).php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">'; 
        echo 'alert("Error Updating Enquiry. Please Try Agian.");';
        echo '</script>';
    }
  }
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
    <title>(A)Enquiry</title>
</head>
<style>

  @import url(https://fonts.googleapis.com/css?family=Merriweather:300,900);

  body{
    margin: 0;
    background-color: #FFDAB9;
  }
    
  .onfooter{
    margin: 75px 0px 0px 0px;
    padding: 60px 10px 80px 10px;
    height: 100%;
    background-repeat: no-repeat; 
    background-size: cover;
    background-position: relative;
  }

  .header {
    background-color: #d0d0d0; /* Light Grey color */
    padding: 2px 0px 2px 20px;
    width: 100%;
    height: 10%;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1;
    
  }

  .header-left {
    display: flex;
    align-items: center;
  }
  
  .header-left img {
    height: 60px; /* Adjust the height of the logo as needed */
    margin-right: 20px;
    border-radius: 100%;
  }
  
  .header-text {
    font-weight: bold;
    font-size: 35px;
    font-family: 'Oswald', serif;
    letter-spacing: -0.5px;
  }

  .header-left a {
    text-decoration: none;
    color: #000;
  }

  .header-right {
    display: flex;
    align-items: center;
    margin-right: 100px;
  }

  .header-right a{
    text-decoration: none;
    color: #000;
  }

  .header-right-text {
    font-weight: bold;
    font-size: 35px;
    font-family: 'Oswald', serif;
    letter-spacing: -0.5px;
    margin-right: 30px;
  }

  .logout {
    width: fit-content;
    height: fit-content;
    border: none;
    box-shadow: 2px;
  }

  .logout a {
    width: fit-content;
    height: fit-content;
    border: none;
  }
  
  .logout img {
    width: 45px;
    height: 45px;
    background-color: #d0d0d0;
    border: none;
  }

  .logout button {
    border: none;
  }

  .hamburger {
    width: 35px;
    height: 5px;
    background-color: black;
    position: absolute;
    top: 37px;
    right: 50px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    z-index: 1;
  }

  /* Rotate the icon when the menu is open */
  .hamburger.open {
    transform: rotate(45deg);
  }

  /* Add a middle bar to the icon when the menu is open */
  .hamburger::before {
    content: "";
    width: 35px;
    height: 6px;
    background-color: black;
    position: absolute;
    top: -10px;
    right: 0;
    transition: all 0.3s ease-in-out;
  }

  .hamburger.open::before {
    transform: rotate(90deg);
    top: 0;
  }

  /* Hide the bottom bar of the icon when the menu is open */
  .hamburger::after {
    content: "";
    width: 35px;
    height: 5px;
    background-color: black;
    position: absolute;
    top: 9px;
    right: 0;
    transition: all 0.3s ease-in-out;
  }

  .hamburger.open::after {
    opacity: 0;
  }

  /* Style the icon wrapper */
  .icon-wrapper {
    width:50px; /* Make it wider than the icon */
    height:50px; /* Make it taller than the icon */
    position:absolute; /* Position it relative to the parent element */
    top:0; /* Align it to the top of the parent element */
    right:0; /* Align it to the right of the parent element */
    z-index:1; /* Make it always on top */
  }

  .menu {
    width: 420px;
    height: 100%;
    background-color: #575757;
    position: fixed;
    top: 78px;
    right: -420px;
    transition: all 0.3s ease-in-out;
    border-radius: 20px;
  }

  .menu.open {
    right:0; 
  }

  .menu ul {
    list-style-type:none; 
    margin-top:0px; 
    padding:0; 
  }

  .menu ul li {
    text-align: center;
    height: fit-content;
    padding: 10px;
    margin: 5px 0;
  }

  .menu ul li:first-child {
    margin-left:0px; 
  }

  .menu ul li a {
    text-decoration:none;
    color:white;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    font-size:25px; 
  }

  .menu ul li a:hover {
    color: #FFDAB9; 
  }

  .arrow,
  .arrow img{
    height: 70px;
    width: 80px;
    z-index: 2;
    transform: translate(10%,0%);
    position: fixed;
  }

  .arrow a{
    position: fixed;
    transform: translate(10%,10%);
  }

  .all,
  table {
    margin: 0 auto;
    text-align: center;
  }

  th,
  td {
    box-sizing: border-box;
    padding: 15px 25px;
  }

  th {
    background-color: rgba(20, 134, 107, 0.766);
  }

  td {
    background-color: rgba(122, 223, 104, 0.668);
  }

  textarea {
    resize: vertical;
  }

  .status {
    border-radius: 4px;
    box-shadow: 10px;
    cursor: pointer;
  }

  #null,
  #completed {
    background-color: grey;
  }

  input[type="submit"],
  input[type="reset"] {
    min-width: 80px;
    min-height: 30px;
    padding: 10px 20px;
    color: rgb(255, 255, 255);
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
  }

  input[type="submit"] {
    background-color: #4caf50;
    float: right;
    margin-right: 2%;
  }

  input[type="reset"] {
    background-color: #696969;
    float: left;
    margin-left: 2%;
  }

  input[type="submit"]:hover {
    background-color: #b0d031;
  }

  input[type="reset"]:hover {
    background-color: #ff9800;
  } 

  .btn {
    text-align: center;
  }

</style>
<body>
  <div class="onfooter">
    <header class="header">
      <div class="header-left">
        <a href="Homepage(A).php"><img class="header-left" src="Screenshot 2023-07-07 113345.png" alt="Logo"></a>
        <a href="Homepage(A).php"><div class="header-text">ECO CITY</div></a>
      </div>
      <div class="header-right">
        <div class="icon-wrapper" onclick="toggleMenu()">
          <div class="hamburger"></div>
        </div>
        <div class="menu">
        <ul>
            <li><a href="ViewStatistics(A).html"  > View Statistics</a></li>
            <hr>
            <li><a href="PublicNotices(A).php"  >Send Public Notices</a></li>
            <hr>
            <li><a href="Appointment(A).php"  >Showroom Appointment</a></li>
            <hr>
            <li><a href="AccessCard(A).php"  >Access Card Requests</a></li>
            <hr>
            <li><a href="Enquiry(A).php"  >Reply Enquiries</a></li>
            <hr>
            <li><a href="AdminList(A).php"  >Edit User Profile</a></li>
            <hr>
            <li><a href="BookingCalendar(A).php"  >Facility Booking Calendar</a></li>
            <hr>
            <li><a href="PaymentSetDetails(A).php"  >Set Payment Details</a></li>
            <hr>
            <li><a href="PaymentOnline(A).php"  >View Payment (Online)</a></li>
            <hr>
            <li><a href="PaymentQR(A).php"  >View Payment (QR)</a></li>
            <br>
          </ul>
        </div>
      </div>
    </header>
    <script>
      // Get the hamburger icon and the menu container
      var hamburger = document.querySelector(".hamburger");
      var menu = document.querySelector(".menu");
      
      // Define a function to toggle the menu
      function toggleMenu() {
      // Add or remove the open class to the icon and the menu
      hamburger.classList.toggle("open");
      menu.classList.toggle("open");
      }
    </script>
    <div class="arrow">
      <a href="Homepage(A).php"><img src="Arrow2.png" alt="Back to last page"></a>
    </div>

    <div class="all">
      <h1>Enquiry Details</h1>
        <table border = "3">
          <thead>
            <tr>
              <th>Enquiry ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Unit Address</th>
              <th>Email Address</th>
              <th>Comment</th>
              <th>Reply</th>
              <th>Status</th>
              <th>Submit</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($results01)) { ?>
            <form action="" method="post">
              <tr>
                <input type="hidden" name="Enquiry_Id" value="<?php echo $row['Enquiry_Id']; ?>">
                <td><?php echo $row['Enquiry_Id']; ?></td>
                <td><?php echo $row['First_Name']; ?></td>
                <td><?php echo $row['Last_Name']; ?></td>
                <td><?php echo $row['Unit']; ?></td>
                <td><?php echo $row['Email_Address']; ?></td>
                <td><?php echo $row['Comment']; ?></td>
                <td><textarea name="Reply" id="Reply" cols="30" rows="3"><?php echo $row['Reply']; ?></textarea></td>

                <!-- <td><input type="text" name="Status" id="Status" value="<?php //echo $row['Status']; ?>"></td> -->
                <td>
                  <div class="form-group">
                    <select name="Status" class="status">
                      <option value="" id="null">Not Complete</option>
                      <option value="Completed" id="completed">Completed</option>
                    </select>
                  </div>
                </td>

                <td><input type="submit" value="Submit" name="submitbtn"></td>
              </tr>
            </form>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>