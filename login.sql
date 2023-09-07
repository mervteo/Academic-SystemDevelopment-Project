-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 12:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_card`
--

CREATE TABLE `access_card` (
  `Request_Id` int(10) NOT NULL,
  `Resident_Id` int(255) NOT NULL,
  `Resident_Name` varchar(100) NOT NULL,
  `Email_Address` varchar(1000) NOT NULL,
  `Telephone_Number` int(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Reasons` varchar(1000) NOT NULL,
  `Descriptions` varchar(1000) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(1000) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_card`
--

INSERT INTO `access_card` (`Request_Id`, `Resident_Id`, `Resident_Name`, `Email_Address`, `Telephone_Number`, `Unit`, `Reasons`, `Descriptions`, `Created_At`, `Status`) VALUES
(12, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1--1', 'Damage', 'hi', '2023-08-27 13:14:18', 'Rejected'),
(13, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1--1', 'New Starter', 'hi', '2023-08-27 13:24:04', 'Approved'),
(14, 4, 'James Lu', 'jlu02@gmail.com', 13, 'C-3-2', 'New Starter', 'hi', '2023-08-28 05:12:09', 'Pending...'),
(15, 8, 'Chua ZY', 'czy03@gmail.com', 12, 'B--5--6', 'Malfunction', 'hi', '2023-08-28 05:13:33', 'Pending...'),
(16, 7, 'Tan Feng Yun', 'tfy04@gmail.com', 11, 'C-7-3', 'New Starter', 'hi', '2023-08-28 05:14:23', 'Pending...');

-- --------------------------------------------------------

--
-- Table structure for table `adminname`
--

CREATE TABLE `adminname` (
  `ID` int(255) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` text NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Login` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminname`
--

INSERT INTO `adminname` (`ID`, `Name`, `Email`, `Phone`, `Password`, `Login`) VALUES
(1, 'Chia', 'ccf2206@gmail.com', '012-345 6789', 'ccf2206', 'Yes'),
(2, 'Jordan Wong', 'jd02@gmail.com', '019-2910375', 'jd02', 'No'),
(3, 'Merv Teo', 'merv03@gmai.com', '013-2057496', 'merv03', 'No'),
(4, 'Ming Guang', 'mg04@gmail.com', '013-7289930', 'mg04', 'No'),
(5, 'Yun Shun', 'ys05@gmail.com', '011-7401983', 'ys05', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_Id` int(255) NOT NULL,
  `Unit_Plan_Type_Id` varchar(100) NOT NULL,
  `First_Name` varchar(1000) NOT NULL,
  `Last_Name` varchar(1000) NOT NULL,
  `Email_Address` varchar(1000) NOT NULL,
  `Telephone_Number` int(255) NOT NULL,
  `Number_Persons` int(255) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Plan_Type` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_Id`, `Unit_Plan_Type_Id`, `First_Name`, `Last_Name`, `Email_Address`, `Telephone_Number`, `Number_Persons`, `Appointment_Date`, `Start_Time`, `End_Time`, `Plan_Type`) VALUES
(9, '1', 'Merv', 'Teo', 'zxc@gmail.com', 12, 2, '2023-08-22', '13:00:00', '15:00:00', ''),
(10, '1', 'Merv', 'Teo', 'zxc@gmail.com', 12, 2, '2023-08-22', '17:00:00', '18:00:00', ''),
(11, '1', 'Merv', 'Teo', 'zxc@gmail.com', 12, 2, '2023-08-22', '11:00:00', '12:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `Enquiry_Id` int(255) NOT NULL,
  `Resident_Id` int(255) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email_Address` varchar(100) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Reply` varchar(1000) NOT NULL DEFAULT 'Pending...',
  `Status` varchar(10) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`Enquiry_Id`, `Resident_Id`, `First_Name`, `Last_Name`, `Email_Address`, `Unit`, `Comment`, `Reply`, `Status`) VALUES
(16, 1, 'Wong', 'YQ', 'wyq2003@gmail.com', 'A-1-1', 'hi6', 'Pending...', 'Pending...'),
(17, 2, 'Chia', 'CF', 'ccf2206@gmail.com', 'A-1-1', 'hi', 'hi', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Booking_Id` int(11) NOT NULL,
  `Resident_Id` int(255) NOT NULL,
  `Resident_Name` varchar(1000) NOT NULL,
  `Email_Address` varchar(1000) NOT NULL,
  `Booking_Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Facilities_Type` varchar(1000) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Booking_Id`, `Resident_Id`, `Resident_Name`, `Email_Address`, `Booking_Date`, `Start_Time`, `End_Time`, `Facilities_Type`, `Created_At`) VALUES
(4, 1, 'Wong YQ', 'wyq2003@gmail.com', '2023-08-28', '13:30:00', '14:30:00', 'Gym Room', '2023-08-26 05:46:25'),
(6, 2, 'Chia CF', 'ccf2206@gmail.com', '2023-08-31', '14:30:00', '15:30:00', 'Gym Room', '2023-08-27 13:11:44'),
(7, 2, 'Chia CF', 'ccf2206@gmail.com', '2023-08-30', '16:00:00', '17:00:00', 'Yoga Space', '2023-08-27 13:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_Id` int(255) NOT NULL,
  `Resident_Id` int(255) NOT NULL,
  `Resident_Name` varchar(1000) NOT NULL,
  `Email_Address` varchar(1000) NOT NULL,
  `Telephone_Number` int(255) NOT NULL,
  `Unit` varchar(1000) NOT NULL,
  `Balance_Amount` int(255) NOT NULL,
  `Payment_Fees` int(255) NOT NULL,
  `Payment_Remarks` varchar(1000) NOT NULL,
  `Payment_Method` varchar(1000) NOT NULL,
  `Payment_Image` longblob NOT NULL,
  `Payment_Date` date DEFAULT current_timestamp(),
  `Payment_Deadline` date NOT NULL,
  `Payment_Status` varchar(1000) NOT NULL DEFAULT 'Pending...',
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_Id`, `Resident_Id`, `Resident_Name`, `Email_Address`, `Telephone_Number`, `Unit`, `Balance_Amount`, `Payment_Fees`, `Payment_Remarks`, `Payment_Method`, `Payment_Image`, `Payment_Date`, `Payment_Deadline`, `Payment_Status`, `Created_At`) VALUES
(1, 1, 'Wong YQ', 'wyq2003@gmail.com', 12, 'A-1-1', 0, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Approved', '2023-08-27 09:01:28'),
(2, 1, 'Wong YQ', 'wyq2003@gmail.com', 12, 'A-1-1', 0, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Rejected', '2023-08-27 09:02:42'),
(3, 1, 'Wong YQ', 'wyq2003@gmail.com', 12, 'A-1-1', 0, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Approved', '2023-08-27 09:12:33'),
(4, 1, 'Wong YQ', 'wyq2003@gmail.com', 12, 'A-1-1', 0, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Approved', '2023-08-27 09:36:27'),
(5, 1, 'Wong YQ', 'wyq2003@gmail.com', 12, 'A-1-1', 0, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Approved', '2023-08-27 09:41:47'),
(6, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1-1', 5000, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 11:12:19'),
(7, 4, 'James Lu', 'jlu02@gmail.com', 13, 'C-3-2', 5000, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Late', '2023-08-27 11:32:31'),
(8, 5, 'Ash Hannah', 'ah90@gmail.com', 12, 'B-1-6', 4500, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 11:33:34'),
(9, 5, 'Ash Hannah', 'ah90@gmail.com', 12, 'B-1-6', 4500, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 11:35:24'),
(10, 6, 'Yang Chun Hua', 'ych65@gmail.com', 11, 'B-5-2', 4000, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Pending...', '2023-08-27 11:36:39'),
(11, 6, 'Yang Chun Hua', 'ych65@gmail.com', 11, 'B-5-2', 4000, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Pending...', '2023-08-27 11:37:14'),
(12, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1-1', 5000, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 11:43:44'),
(13, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1-1', 5000, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 11:44:55'),
(14, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1--1', 4500, 500, 'Plz pay asap!', 'Online Payment', '', '2023-08-27', '2023-08-31', 'Successful', '2023-08-27 13:14:31'),
(15, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1--1', 4000, 500, 'Plz pay asap!', 'QR Payment', '', '2023-08-27', '2023-08-31', 'Pending...', '2023-08-27 13:14:57'),
(16, 2, 'Chia CF', 'ccf2206@gmail.com', 13, 'A-1--1', 4000, 1, 'hi', 'QR Payment', '', '2023-08-28', '2024-01-31', 'Pending...', '2023-08-28 09:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `Payment_Information_Id` int(255) NOT NULL,
  `Admin_Id` int(255) NOT NULL,
  `Fees` int(255) NOT NULL,
  `Remarks` varchar(1000) NOT NULL,
  `Deadline` date NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`Payment_Information_Id`, `Admin_Id`, `Fees`, `Remarks`, `Deadline`, `Created_At`) VALUES
(2, 1, 1, 'hi', '2024-01-31', '2023-08-27 08:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `public_notices`
--

CREATE TABLE `public_notices` (
  `Notice_Id` int(255) NOT NULL,
  `Admin_Id` int(255) NOT NULL,
  `Notice_Number` int(100) NOT NULL,
  `Notice_Title` varchar(1000) NOT NULL DEFAULT 'No Event',
  `Notice_Details` varchar(1000) NOT NULL,
  `Notice_Link` varchar(1000) NOT NULL,
  `Notice_Image` longblob NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_notices`
--

INSERT INTO `public_notices` (`Notice_Id`, `Admin_Id`, `Notice_Number`, `Notice_Title`, `Notice_Details`, `Notice_Link`, `Notice_Image`, `Created_At`) VALUES
(9, 1, 1, 'Merdeka_Merdeka', 'Merdeka Day', 'https://youtu.be/sGOTCCVDLtQ', '', '2023-08-27 08:55:29'),
(10, 1, 2, 'Chinese New Year', 'CNY', 'https://youtu.be/sGOTCCVDLtQ', '', '2023-08-27 13:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `residents_table`
--

CREATE TABLE `residents_table` (
  `Resident_Id` int(255) NOT NULL,
  `First_Name` varchar(1000) NOT NULL,
  `Last_Name` varchar(1000) NOT NULL,
  `Email_Address` varchar(1000) NOT NULL,
  `Telephone_Number` char(255) NOT NULL,
  `Unit` varchar(1000) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Race` varchar(50) NOT NULL,
  `Religion` varchar(50) NOT NULL,
  `Age` int(10) NOT NULL,
  `Balance_Amount` int(255) NOT NULL,
  `Login` varchar(10000) NOT NULL DEFAULT 'No',
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents_table`
--

INSERT INTO `residents_table` (`Resident_Id`, `First_Name`, `Last_Name`, `Email_Address`, `Telephone_Number`, `Unit`, `Gender`, `Race`, `Religion`, `Age`, `Balance_Amount`, `Login`, `Password`) VALUES
(1, 'Wong', 'YQ', 'wyq2003@gmail.com', '012-345 6789', 'C-2-2', 'Female', 'Chinese', 'Buddhism', 20, 4000, 'No', 'wyq2003'),
(2, 'Chia', 'CF', 'ccf2206@gmail.com', '013-098 7654', 'A-1--1', 'Male', 'Chinese', 'Buddhism', 18, 4000, 'No', 'ccf2206'),
(4, 'James', 'Lu', 'jlu02@gmail.com', '013-7289930', 'C-3-2', 'Male', 'India', 'Islam', 31, 4000, 'No', 'jlu02'),
(5, 'Ash', 'Hannah', 'ah90@gmail.com', '012-7210350', 'B-1-6', 'Female', 'India', 'Hindu', 38, 4000, 'No', 'ah90'),
(6, 'Yang', 'Chun Hua', 'ych65@gmail.com', '011-9344839', 'B-5-2', 'Female', 'Buddha', 'Buddhism', 45, 4000, 'No', 'ych65'),
(7, 'Tan', 'Feng Yun', 'tfy04@gmail.com', '011-2849573', 'C-7-3', 'Female', 'Chinese', 'Christianity', 26, 4000, 'No', 'tfy04'),
(8, 'Chua', 'ZY', 'czy03@gmail.com', '012-9304854', 'B--5--6', 'Male', 'Indian', 'Christianity', 20, 0, 'No', 'czy03'),
(12, 'Cindi', 'Osman', 'cosman1@dagondesign.com', '966-125-0934', 'B-2-8', 'Female', 'Ecuadorian', 'Buddhism', 37, 0, 'No', 'e6yNu+4'),
(13, 'Genna', 'Mazey', 'gmazey2@ezinearticles.com', '429-672-8507', 'C-9-8', 'Female', 'Guatemalan', 'Islam', 23, 0, 'No', 'k5mj`u'),
(14, 'Roosevelt', 'Baitman', 'rbaitman3@nymag.com', '268-636-8633', 'A-2-8', 'Male', 'Central American', 'Hindu', 38, 0, 'No', 'g6f@1Zg'),
(15, 'Gaby', 'Klemenz', 'gklemenz4@amazon.de', '601-953-6940', 'A-9-5', 'Male', 'Bolivian', 'Christianity', 34, 0, 'No', 'p9z!a#z'),
(16, 'Sherwood', 'Demchen', 'sdemchen5@ask.com', '803-309-6381', 'C-9-1', 'Male', 'Bolivian', 'Christianity', 42, 0, 'No', 'n7!q~Lrx'),
(17, 'Malena', 'Cammomile', 'mcammomile6@fema.gov', '640-283-5190', 'B-9-4', 'Female', 'Samoan', 'Hindu', 30, 0, 'No', 'n3|.\\%ZAM'),
(18, 'Camile', 'Leming', 'cleming7@multiply.com', '794-396-4190', 'B-7-9', 'Female', 'Navajo', 'Christianity', 22, 0, 'No', 'd5xVOr%{*f'),
(19, 'Iona', 'Jaray', 'ijaray8@hostgator.com', '595-847-5805', 'A-1-8', 'Female', 'Choctaw', 'Buddhism', 41, 0, 'No', 'r32\"lnx'),
(20, 'Renaldo', 'Waind', 'rwaind9@homestead.com', '741-496-9838', 'B-3-7', 'Male', 'Ecuadorian', 'Buddhism', 44, 0, 'No', 'g2xbOj6'),
(21, 'Elli', 'Holyland', 'eholylanda@scientificamerican.com', '161-125-8079', 'C-8-6', 'Female', 'Latin American Indian', 'Christianity', 29, 0, 'No', 's2wt@DL}nNO'),
(22, 'Collie', 'Pentlow', 'cpentlowb@nifty.com', '717-534-6574', 'C-8-6', 'Female', 'Paiute', 'Buddhism', 47, 0, 'No', 'v0i+8qi{9a'),
(23, 'Nadia', 'Neicho', 'nneichoc@dion.ne.jp', '212-744-0451', 'A-6-3', 'Female', 'Pakistani', 'Islam', 32, 0, 'No', 'h1toft<S<=@s'),
(24, 'Shayne', 'Kinkead', 'skinkeadd@mail.ru', '673-793-3833', 'A-7-8', 'Female', 'Vietnamese', 'Hindu', 53, 0, 'No', 't2,NN),b*c'),
(25, 'Jefferson', 'Wanley', 'jwanleye@cpanel.net', '390-204-6966', 'B-6-10', 'Male', 'Houma', 'Christianity', 46, 0, 'No', 'v3_y$|nRgr'),
(26, 'Tisha', 'Ives', 'tivesf@home.pl', '134-299-3864', 'A-5-8', 'Female', 'Guatemalan', 'Hindu', 47, 0, 'No', 'b8vV\'Z8'),
(27, 'Hannis', 'Weatherburn', 'hweatherburng@stanford.edu', '799-733-3077', 'C-6-10', 'Female', 'Sri Lankan', 'Christianity', 33, 0, 'No', 'u0R\"Q9?.'),
(28, 'Reinwald', 'Buffham', 'rbuffhamh@harvard.edu', '958-502-2464', 'A-6-1', 'Male', 'Ute', 'Hindu', 54, 0, 'No', 'z7zdH#'),
(29, 'Eamon', 'Allchin', 'eallchini@intel.com', '745-550-4474', 'C-8-7', 'Male', 'Ecuadorian', 'Buddhism', 45, 0, 'No', 'f5jKwp');

-- --------------------------------------------------------

--
-- Table structure for table `unit_plan_type`
--

CREATE TABLE `unit_plan_type` (
  `Unit_Plan_Type_Id` varchar(100) NOT NULL,
  `Admin_Id` int(255) NOT NULL,
  `Unit_Plan_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_plan_type`
--

INSERT INTO `unit_plan_type` (`Unit_Plan_Type_Id`, `Admin_Id`, `Unit_Plan_Type`) VALUES
('1', 1, 'A'),
('2', 2, 'B'),
('3', 3, 'C'),
('4', 4, 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_card`
--
ALTER TABLE `access_card`
  ADD PRIMARY KEY (`Request_Id`),
  ADD KEY `Resident_Id` (`Resident_Id`);

--
-- Indexes for table `adminname`
--
ALTER TABLE `adminname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_Id`),
  ADD KEY `Unit_Plan_Type_Id` (`Unit_Plan_Type_Id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`Enquiry_Id`),
  ADD KEY `Resident_Id` (`Resident_Id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Booking_Id`),
  ADD KEY `Resident_Id` (`Resident_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_Id`),
  ADD KEY `Resident_Id` (`Resident_Id`);

--
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`Payment_Information_Id`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- Indexes for table `public_notices`
--
ALTER TABLE `public_notices`
  ADD PRIMARY KEY (`Notice_Id`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- Indexes for table `residents_table`
--
ALTER TABLE `residents_table`
  ADD PRIMARY KEY (`Resident_Id`);

--
-- Indexes for table `unit_plan_type`
--
ALTER TABLE `unit_plan_type`
  ADD PRIMARY KEY (`Unit_Plan_Type_Id`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_card`
--
ALTER TABLE `access_card`
  MODIFY `Request_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adminname`
--
ALTER TABLE `adminname`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `Enquiry_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Booking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `Payment_Information_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `public_notices`
--
ALTER TABLE `public_notices`
  MODIFY `Notice_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `residents_table`
--
ALTER TABLE `residents_table`
  MODIFY `Resident_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_card`
--
ALTER TABLE `access_card`
  ADD CONSTRAINT `access_card_ibfk_1` FOREIGN KEY (`Resident_Id`) REFERENCES `residents_table` (`Resident_Id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `Unit_Plan_Type_Id` FOREIGN KEY (`Unit_Plan_Type_Id`) REFERENCES `unit_plan_type` (`Unit_Plan_Type_Id`);

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`Resident_Id`) REFERENCES `residents_table` (`Resident_Id`);

--
-- Constraints for table `facility`
--
ALTER TABLE `facility`
  ADD CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`Resident_Id`) REFERENCES `residents_table` (`Resident_Id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Resident_Id`) REFERENCES `residents_table` (`Resident_Id`);

--
-- Constraints for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD CONSTRAINT `payment_information_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `adminname` (`ID`),
  ADD CONSTRAINT `payment_information_ibfk_2` FOREIGN KEY (`Admin_Id`) REFERENCES `adminname` (`ID`);

--
-- Constraints for table `public_notices`
--
ALTER TABLE `public_notices`
  ADD CONSTRAINT `public_notices_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `adminname` (`ID`);

--
-- Constraints for table `unit_plan_type`
--
ALTER TABLE `unit_plan_type`
  ADD CONSTRAINT `Admin_Id` FOREIGN KEY (`Admin_Id`) REFERENCES `adminname` (`ID`),
  ADD CONSTRAINT `unit_plan_type_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `adminname` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
