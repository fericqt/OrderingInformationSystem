-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 05:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordering_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE `tblitems` (
  `IdTrack` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`IdTrack`, `Name`, `Price`, `Date`) VALUES
(5, 'Feric Updated', 230.00, '2024-06-04'),
(7, 'Samgyu', 200.00, '2024-06-04'),
(8, 'Sisig', 150.50, '2024-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `IdTrack` int(11) NOT NULL,
  `OrderIdTrack` int(11) NOT NULL,
  `ItemIdTrack` int(11) NOT NULL,
  `ItemName` varchar(150) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Qty` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`IdTrack`, `OrderIdTrack`, `ItemIdTrack`, `ItemName`, `Price`, `Qty`, `Total`) VALUES
(11, 10, 7, 'Samgyu', 200.00, 23.00, 4600.00),
(12, 10, 7, 'Samgyu', 200.00, 3.00, 600.00),
(13, 10, 7, 'Samgyu', 200.00, 1.00, 200.00),
(14, 11, 7, 'Samgyu', 200.00, 2.00, 400.00),
(15, 11, 8, 'Sisig', 150.50, 3.00, 451.50),
(16, 12, 7, 'Samgyu', 200.00, 2.00, 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `IdTrack` int(11) NOT NULL,
  `UserIdTrack` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Payment` decimal(10,2) NOT NULL,
  `PaymentChange` decimal(10,2) NOT NULL,
  `Remarks` text DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `ProcessBy` varchar(100) NOT NULL,
  `DateOrdered` datetime NOT NULL,
  `DateProcessed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`IdTrack`, `UserIdTrack`, `Total`, `Payment`, `PaymentChange`, `Remarks`, `Status`, `ProcessBy`, `DateOrdered`, `DateProcessed`) VALUES
(10, 1, 5400.00, 0.00, 0.00, 'sample remarks2', 'Cancelled', 'fdecenan', '2024-06-04 04:07:00', '2024-06-04 04:21:00'),
(11, 1, 851.50, 0.00, 0.00, 'ngayu pud kog water duha ka baso', 'Approved', 'fdecenan', '2024-06-04 04:41:00', '2024-06-04 04:41:00'),
(12, 1, 400.00, 1000.00, 600.00, 'sample', 'OnQueue', 'chef', '2024-06-04 04:56:00', '2024-06-04 11:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `IdTrack` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `DateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`IdTrack`, `Username`, `Password`, `UserType`, `DateRegistered`) VALUES
(1, 'fdecenan', '12312', 'Admin', '2024-06-03'),
(3, 'admin', '123', 'Admin', '2024-06-03'),
(4, 'client', '123', 'Client', '2024-06-03'),
(5, 'chef', '123', 'Chef', '2024-06-03'),
(6, 'sdecenan', '123', 'Chef', '2024-06-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`IdTrack`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`IdTrack`),
  ADD KEY `OrderIdTrack` (`OrderIdTrack`),
  ADD KEY `ItemIdTrack` (`ItemIdTrack`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`IdTrack`),
  ADD KEY `UserIdTrack` (`UserIdTrack`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`IdTrack`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `IdTrack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  MODIFY `IdTrack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `IdTrack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `IdTrack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
