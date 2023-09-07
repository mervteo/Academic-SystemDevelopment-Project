<?php
  session_start();
  include "dbConn.php";

  $sqlA01 = "SELECT * FROM public_notices WHERE Notice_Number = 1";
  $resultA01 = $connection->query($sqlA01);

  $noticesA01 = array();
  if ($resultA01->num_rows > 0) {
      // Store data of each row in the array
      while ($row = $resultA01->fetch_assoc()) {
          $noticesA01[] = $row;
      }
  }

  $sqlA02 = "SELECT * FROM public_notices WHERE Notice_Number = 2";
  $resultA02 = $connection->query($sqlA02);

  $noticesA02 = array();
  if ($resultA02->num_rows > 0) {
      // Store data of each row in the array
      while ($row = $resultA02->fetch_assoc()) {
          $noticesA02[] = $row;
      }
  }

  if (isset($_POST['loginbtn'])) {
    $Email = $_POST['Email'];
    $password = $_POST['Password'];

    $query = "SELECT * FROM `residents_table` WHERE Email_Address=? AND Password=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $Email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    $_SESSION['id'] = $user['Resident_Id'];
    $_SESSION['FName'] = $user['First_Name'];
    $_SESSION['LName'] = $user['Last_Name'];
    $_SESSION['Email'] = $user['Email_Address'];
    $_SESSION['PNumber'] = $user['Telephone_Number'];
    $_SESSION['UNumber'] = $user['Unit'].$_POST['txtUnit1'].'-'.$_POST['txtUnit2'].'-'.$_POST['txtUnit3'];
    $_SESSION['gender'] = $user['Gender'];
    $_SESSION['race'] = $user['Race'];
    $_SESSION['religion'] = $user['Religion'];
    $_SESSION['age'] = $user['Age'];
  }

  $queryA04 = "SELECT MAX(Enquiry_Id) AS max_id FROM enquiry";
  $resultA04 = $connection->query($queryA04);
  $row = $resultA04->fetch_assoc();
  $max_idA04 = $row['max_id'] + 1;

  if(isset($_POST['submitbtn'])){
    $ID = $_SESSION['id'];
    $FName = $_SESSION['FName'];
    $LName = $_SESSION['LName'];
    $Unit = $_SESSION['UNumber'];
    $Email = $_SESSION['Email'];
    $Comment = $_POST['Comment'];

    $query = "INSERT INTO enquiry (Resident_Id, First_Name, Last_Name, Email_Address, Unit, Comment) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("isssss", $ID, $FName, $LName, $Email, $Unit, $Comment);

    if ($stmt->execute()) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Enquiry Submitted Successfully!");';
        echo 'alert("Your Enquiry ID is : ' . $max_idA04 . ', Thank You.");';
        echo 'window.location.href = "Homepage(R).php";';
        echo '</script>';
      } else {
          echo '<script>alert("Error Submitting Enquiry. Please Try Again.");</script>';
      }
      $stmt->close();
    }
    
  if(isset($_POST['searchbtn'])){
      $IDA05 = $_POST['Id'];

      $queryA05 = "SELECT * FROM enquiry WHERE Enquiry_Id = $IDA05";
      $resultA05 = $connection->query($queryA05);
      $userA05 = $resultA05->fetch_assoc();

      $_SESSION['ID'] = $userA05['Enquiry_Id'];
      $_SESSION['Reply'] = $userA05['Reply'];
      $_SESSION['Status'] = $userA05['Status'];

  } 

?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ='icon' href = 'Logo.jpeg' type="image/icon">
    <title>(R)Enquiry</title>
</head>
<style>

  @import url(https://fonts.googleapis.com/css?family=Merriweather:300,900);

  body{
    margin: 0;
  }
    
  .onfooter{
    background-image: url("https://i.pinimg.com/originals/71/9e/80/719e80760999b4c355a723224120eb07.png"); 
    background-repeat: no-repeat; 
    background-size: cover;
    background-position: relative;
    margin: 0px; /*Same height as footer, margin : top, right, bottom, left*/
    padding: 60px 10px 80px 10px;
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
    /* background-color: #FFDAB9; */
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

  .header-right-logo {
    height: 45px;
    /* margin-right:100px; */
    border-radius: 100%;
    background-color: #d0d0d0;
  }

  .header-right-logo-1 {
    height: 50px;
    margin-right: 100px;
    border-radius: 100%;
    background-color: #d0d0d0;
  }

  /* Dropdown Button */
  .dropbtn {
    background-color: rgba(0, 0, 0, 0);
    color: white;
    /* padding: 16px; */
    font-size: 16px;
    align-items: top 50px;
    border: none;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
    border-radius: 4px;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    left: -50px;
    min-width: 160px;
    background: #00b300;
    border-radius: 4px;
    box-shadow: 0px 8px 16px 10px rgba(205, 18, 18, 0.4);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 4px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
    border-radius: 4px;
  } 

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
    border-radius: 4px;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color: #acacac;
    border-radius: 4px;
  }

  .dropdown-text p {
    font-size: 20px;
    display: block;
  }

  .content {
    margin-top: 80px; /* Add initial margin to the content to account for the fixed header */
    padding: 20px;
    transition: margin-top 0.3s ease; /* Add transition effect for smooth scrolling */
  }
  
  /* Style the hamburger icon */
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

  /* Style the menu container */
  .menu {
    width: 420px;
    height: (100%-97px);
    background-color: #575757;
    position: fixed;
    top: 76px;
    right: -420px; /* Hide the menu by default */
    transition: all 0.3s ease-in-out;
    border-radius: 20px;
  }

  /* Show the menu when the icon is clicked */
  .menu.open {
    right:0; /* Move the menu to the right */
  }

  /* Style the menu items */
  .menu ul {
    list-style-type:none; /* Remove bullets */
    margin-top:0px; /* Remove margins */
    padding:0; /* Remove paddings */
  }

  .menu ul li {
    padding:25px; /* Increase this value to make more spacing between items */
    /* border-bottom:1px solid white; Add a bottom border for each item */
    text-align: center;
  }

  /* Add some margin-left to the first menu item */
  .menu ul li:first-child {
    margin-left:0px; /* Adjust this value as you like */
  }

  .menu ul li a {
    text-decoration:none; /* Remove underline */
    color:white; /* Set text color */
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    font-size:28px; /* Increase this value to make bigger font size */
    margin-bottom: 20px;
  }

  .menu ul li a:hover {
    color:white; /* Change text color on hover */
  }

  .tabs {
  display: flex;
  flex-wrap: wrap;
  }

  .tabs label {
	order: 1;
	display: block;
	padding: 1rem 2rem;
	margin-right: 0.2rem;
	cursor: pointer;
  background: #90CAF9;
  font-weight: bold;
  transition: background ease 0.2s;
  }

  .tabs .tab {
  order: 99;
  flex-grow: 1;
	width: 100%;
	display: none;
  padding: 1rem;
  background: #acf7b1;
  }

  .tab p {
    margin-left: 7%;
    margin-right: 7%;
    font-size: 18px;
    letter-spacing: 0.5px;
    font-family: "Merienda One"; font-style: normal; font-variant: normal;
  }

  .tabs input[type="radio"] {
	display: none;
  }

  .tabs input[type="radio"]:checked + label {
	background: #fff;
  }

  .tabs input[type="radio"]:checked + label + .tab {
	display: block;
  }

  @media (max-width: 45em) {
    .tabs .tab,
    .tabs label {
      order: initial;
    }
    .tabs label {
      width: 100%;
      margin-right: 0;
      margin-top: 0.2rem;
    }
  }

  .container, 
  .container2,
  .container3 {
    width: 850px;
    text-align: center;
    padding: 10px 0px 20px 0px;
    position: sticky;
    max-width: 75%;
    height: fit-content;
    margin-top: 0;
    margin-left: auto;
    margin-right: auto;
    background-color: #FFDAB9;
    border: 4px solid #ffed4dbc;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .container2,
  .container {
    margin-bottom: 5%;
  }

  .arrow,
  .arrow img{
    height: 70px;
    width: 80px;
    z-index: 2;
    transform: translate(30%,2%);
    position: fixed;
  }

  .arrow a{
    position: fixed;
    transform: translate(15%,15%);
  }

  .container img{
    width: 120px;
    height: 120px;
    padding-right: 25px;
  }

  .container h1 {
    margin-bottom: 10px;
    font-family: "Merienda One";
    font-size: 80px;
    font-style: italic;
    font-variant: normal;
    font-weight: 700;
    line-height: 18px;
  }

  /* .search {
    width : 100%;
  } */

  .container3 h1 {
    margin-bottom: 40px;
    margin-left: 20px;
    font-family: "Merienda One";
    font-style: italic;
    font-variant: normal;
    font-weight: 700;
    line-height: 18px;
  }

  .container table,
  .container3 table {
    width: 100%;
    position: relative;
  }

  .container label,
  .container3 label {
    font-weight: bold;
    padding-left: 10%;
  }

  .container input[type="text"],
  .container input[type="email"],
  .container textarea,
  .container3 input[type="text"],
  .container3 textarea {
    width: 90%;
    padding: 8px;
    border: 1px solid #ff0000;
    border-radius: 4px;
    margin-bottom: 4px;
    font-size: 18px;
    font-family: "Merienda One"; font-style: normal; font-variant: normal;
  }

  .container textarea,
  .container3 textarea {
    resize: vertical;
  }

  .container ::placeholder,
  .container3 ::placeholder {
    text-align: left;
  }

  .form-style2 {
    padding: 10px 10px ;
    width: 29.5%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    color: #000000;
    background-color: #ffffff;
    border: 1px solid #ff0000;
    border-radius: 4px;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
    box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
    text-align: center;
  }

  .container input[type="submit"],
  .container input[type="reset"], 
  .container3 input[type="submit"], 
  .container3 input[type="reset"] {
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

  .container input[type="submit"], 
  .container3 input[type="submit"] {
    background-color: #4caf50;
    float: right;
    margin-right: 2%;
  }

  .container input[type="reset"],
  .container3 input[type="reset"] {
    background-color: #696969;
    float: left;
    margin-left: 2%;
  }

  .container input[type="submit"]:hover,
  .container3 input[type="submit"]:hover {
    background-color: #b0d031;
  }

  .container input[type="reset"]:hover,
  .container3 input[type="reset"]:hover {
    background-color: #ff9800;
  } 

  .container .btn,
  .container3 .btn {
    text-align: center;
  }

  .fixed_footer{
    width: 100%;
    height: 360px;
    background: #111;
    position: fixed; left: 0; bottom: 0;
    z-index: -1;
    box-sizing: border-box;
    font: 300 1em/1.5 'Merriweather', serif; color: #ffffff;
    padding: 0;
    margin: 0;
  }

  .fixed_footer p{
    color: #696969;
    font-size: 1em;
    font-weight: 300;
  }

  .footer {
    height: 350px;
    width: 100%;
    background: #00121b;
    display: block;
  }

  .inner-footer {
    width: 95%;
    margin: auto;
    padding: 10px 10px 0px ;
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    justify-content: center;
  }

  .footer-items,
  .footer-big {
    padding: 10px 20px;
    box-sizing: border-box;
    color: #fff;
  }

  .footer-items{
    margin-top: 10px;
    width: 22%;
  }

  .footer-big{
    width: 34%;
    padding: 10px 80px 5px 20px;
  }

  .footer-big p,
  .footer-items p {
    font-size: 16px;
    text-align: justify;
    line-height: 25px;
    color: #fff;
  }

  .footer-items h2{
    padding-bottom: 5px;
  }

  .footer-big h1,
  .footer-items h1 {
    color: #fff;
  }

  .border1 {
    height: 3px;
    background: #ff9800;
    color: #ff9800;
    background-color: #ff9800;
    border: 0px;
  }

  ul {
    list-style: none;
    color: #fff;
    letter-spacing: 0.5px;	
  }

  ul a {
    text-decoration: none;
    outline: none;
    color: #fff;
    transition: 0.3s;
  }

  ul a:hover {
    color: #ff9800;
  }

  ul li {
    margin: 10px 0;
    height: 25px;
  }

  li i {
    margin-right: 20px;
  }

  .social-media {
    width: 100%;
    color: #fff;
    text-align: center;
    font-size: 20px;
  }

  .social-media a {
    text-decoration: none;
  }

  .social-media i {
    height: 25px;
    width: 25px;
    margin: 20px 10px;
    padding: 4px;
    color: #fff;
    transition: 0.5s;
  }

  .social-media i:hover {
    transform: scale(1.5);
  }

  .footer-bottom {
    padding: 5px;
    background: #00121b;
    color: #fff;
    font-size: 12px;
    text-align: center;
  }

</style>
<body>
  <div class="onfooter">
    <div class="arrow">
      <a href="Homepage(R).php"><img src="Arrow2.png" alt="Back to last page"></a>
    </div>
    <main class="content" role="main">
      <div class="container2">
        <div class="tabs">
          <input type="radio" name="tabs" id="tabone" checked="checked">
          <label for="tabone">Rules & Regulations</label>
          <div class="tab">
            <h1>Rules & Regulations</h1>
            <p>1. Common Areas:

              Common areas such as hallways, elevators, and gyms should be kept clean and free of personal belongings.
              Residents must follow posted rules and regulations in common areas.
            </p>
            <p>
              2. Parking:
              
              Parking spaces are designated and cannot be used by other residents or visitors without permission.
              Guest parking may have time limits and must be used only for short-term visits.
            </p>
            <p>
              3. Pets:
              
              Residents with pets must adhere to pet-related rules, including leash laws and cleaning up after pets.
              Any damage caused by pets is the responsibility of the pet owner.
            </p>
            <p>
              4. Maintenance and Repairs:
              
              Residents should promptly report maintenance issues to the management.
              Residents are responsible for keeping their units in good condition.
            </p>
            <p>
              5. Smoking:
              
              Smoking may be prohibited in common areas or even within individual units.
              If smoking is allowed, residents may be required to do so in designated smoking areas only.
            </p>
            <p>
              6. Trash and Recycling:
              
              Trash and recycling guidelines must be followed, including proper disposal methods and schedules.
            </p>
            <p>
              7. Security:
              
              Residents should ensure doors and windows are locked when they leave their units.
              Guests should be accompanied and escorted by residents at all times.
            </p>
          </div>
          
          <input type="radio" name="tabs" id="tabtwo">
          <label for="tabtwo">Office Working Hour</label>
          <div class="tab">
            <h1>Office Working Hour</h1>
            <h3>Monday - Friday: 9.00 a.m. - 6.00 p.m.</h3>
            <h3>Saturday: 9.30 a.m. - 5.30 p.m.</h3>
            <h3>Sunday: Closed</h3>
            <br>
            <p>Condominium Office Phone: 03-3456789</p>
            <p>Email: ecocityadmin@gmail.com</p>
            <p>Please note that while the office is closed on Sundays, our emergency contact line will remain operational for urgent matters that require immediate attention. We believe that these new office hours will better accommodate the needs of our residents and enhance the overall experience within our community. Thank you for your cooperation and understanding. We value your presence and look forward to continuing to serve you.</p>

          </div>
          
          <input type="radio" name="tabs" id="tabthree">
          <label for="tabthree">Facility Open Hour</label>
          <div class="tab">
            <h1>Facility Open Hour</h1>
            <h3>Monday - Sunday: 9.00 a.m. - 9.00 p.m.</h3>
          </div>
        </div>
      </div>
      <div class="container">
        <h1><img src="https://cdn-icons-png.flaticon.com/512/6994/6994441.png" alt="">
          Enquiry</h1>
        <br>
        <hr>
        <br>
        <table>
          <form action="" method="post">
            <tr>
              <td><label for="First_Name">ID :</label></td>
              <td><input type="text" id="name" name="ID" style="background-color: rgba(148, 118, 76, 0.766); color: white;" value=" <?php echo $_SESSION['id'] ?>" disabled></td>
            </tr>
            <tr>
              <td><label for="First_Name">First Name :</label></td>
              <td><input type="text" id="name" name="First_Name" style="background-color: rgba(148, 118, 76, 0.766); color: white;" value=" <?php echo $_SESSION['FName'] ?>" disabled></td>
            </tr>
            <tr>
              <td><label for="Last_Name">Last Name :</label></td>
              <td><input type="text" id="name" name="Last_Name" style="background-color: rgba(148, 118, 76, 0.766); color: white;" value=" <?php echo $_SESSION['LName'] ?>" disabled></td>
            </tr>
            <tr>
              <td><label for="Unit">Unit Address :</label></td>
              <td><input type="text" id="name" name="Unit" style="background-color: rgba(148, 118, 76, 0.766); color: white;" value=" <?php echo $_SESSION['UNumber'] ?>" disabled></td>
            </tr>
            <tr>
              <td><label for="Email_Address">Email Address :</label></td>
              <td><input type="email" id="email" name="Email_Address" style="background-color: rgba(148, 118, 76, 0.766); color: white;" value=" <?php echo $_SESSION['Email'] ?>" disabled></td>
            </tr>
            <br>
            <tr>
              <td><label for="Comment">Comment :</label></td>
              <td><textarea name="Comment" id="Comment" cols="50" rows="4" placeholder="Type Your Comment Here" required></textarea></td>
            </tr>
            <tr class="btn">
              <td colspan="2"><input type="reset" value=" Clear ">
              <input type="submit" value="Submit" name="submitbtn"></td>
            </tr>
          </form>
        </table>
      </div>
    </main>
    <div class="container3">
      <table>
        <form action="#id" method="post">
        <tr>
          <td class = "search">
            <h1>Check for Reply</h1>
          </td>
        </tr>
        <tr>
          <td><label for="Id">Your Enquiry ID :</label></td>
          <td><input type="text" name="Id" id="Id" placeholder="Enter Your Enquiry ID"></input></td>
        </tr>
        <tr>
          <td><label for="Reply">Reply from Management :</label></td>
          <td><input type="text" name="Reply" placeholder="No Result" id="Reply" value="<?php if(isset($_POST['searchbtn'])){ ?>
            <?php echo $_SESSION['Reply']; ?>
              <?php if(is_null($_SESSION['Reply'])){ ?>
              <?php echo 'Pending...'; } ?>
              <?php } ?>"  disabled>

            </input>
          </td>
        </tr>
        <tr>
          <td><label for="Status">Enquiry Status :</label></td>
          <td>
            <input type="text" name="Status" id="Status" value="<?php if(isset($_POST['searchbtn'])){ ?>
              <?php echo $_SESSION['Status'];  ?>
              <?php if(is_null($_SESSION['Status'])){ ?>
              <?php echo 'Pending...'; } ?>
              <?php } ?>" placeholder="No Result" disabled>
            </input>
          </td>
        </tr>
        <tr class="btn">
          <td colspan="2"><input type="reset" value=" Clear ">
          <input type="submit" value="Search" name="searchbtn"></td>
        </tr>
      </form>
      </table>
    </div>
  </div>
</body>
</html>