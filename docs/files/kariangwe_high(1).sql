-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 12:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kariangwe_high`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `Allocation_id` int(11) NOT NULL,
  `Year` varchar(15) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Supervisor` varchar(255) DEFAULT NULL,
  `Amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`Allocation_id`, `Year`, `Term`, `Department`, `Supervisor`, `Amount`) VALUES
(1, '2019', 1, 'Transport', 'Tatenda sabhuku', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `cooperate_description`
--

CREATE TABLE `cooperate_description` (
  `cooperate_id` int(11) NOT NULL,
  `Representative` int(11) DEFAULT NULL,
  `Name` text NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE `fees_structure` (
  `fees_id` int(11) NOT NULL,
  `Amount` double DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `lock_key` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`fees_id`, `Amount`, `year`, `term`, `lock_key`) VALUES
(5, 585, '2019', 1, ' 1 2019');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `methods` varchar(100) DEFAULT NULL,
  `Payment_date` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_details`
--

CREATE TABLE `sponsor_details` (
  `sponsor_id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Surname` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `teacher_id` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Surname` varchar(40) DEFAULT NULL,
  `ec_number` varchar(12) NOT NULL,
  `National_id` varchar(34) NOT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Role` varchar(30) DEFAULT NULL,
  `Qualifications` text,
  `Password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`teacher_id`, `Name`, `Surname`, `ec_number`, `National_id`, `Gender`, `Email`, `Phone`, `Role`, `Qualifications`, `Password`) VALUES
(1, 'Nhlanhla', 'Ngwenya', '1234', '123456789', 'Male', 'nngwenya@gmail.com', '0775531297', 'Headmaster', 'Masters in Education', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` char(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Surname` varchar(40) DEFAULT NULL,
  `Date_of_Birth` varchar(20) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Address` text,
  `form` int(11) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `sponsor` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`Allocation_id`);

--
-- Indexes for table `cooperate_description`
--
ALTER TABLE `cooperate_description`
  ADD PRIMARY KEY (`cooperate_id`),
  ADD KEY `Respresentative` (`Representative`);

--
-- Indexes for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD PRIMARY KEY (`fees_id`),
  ADD UNIQUE KEY `lock_key` (`lock_key`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `sponsor_details`
--
ALTER TABLE `sponsor_details`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `Allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cooperate_description`
--
ALTER TABLE `cooperate_description`
  MODIFY `cooperate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_structure`
--
ALTER TABLE `fees_structure`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor_details`
--
ALTER TABLE `sponsor_details`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cooperate_description`
--
ALTER TABLE `cooperate_description`
  ADD CONSTRAINT `cooperate_description_ibfk_1` FOREIGN KEY (`Representative`) REFERENCES `sponsor_details` (`sponsor_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
