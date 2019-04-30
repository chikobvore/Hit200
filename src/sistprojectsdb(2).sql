-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 10:55 AM
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
-- Database: `sistprojectsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment_details`
--

CREATE TABLE `assessment_details` (
  `Assessment_id` int(11) NOT NULL,
  `Assessment_title` varchar(50) DEFAULT NULL,
  `Assessment_objectives` text,
  `Assessment_lockkey` varchar(100) NOT NULL,
  `Year` varchar(9) DEFAULT NULL,
  `Level` varchar(100) NOT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Proposed_date` date DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Assement_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_items`
--

CREATE TABLE `assessment_items` (
  `Assessment_id` int(11) DEFAULT NULL,
  `Item_id` int(11) NOT NULL,
  `Item` varchar(50) DEFAULT NULL,
  `Item_mark` int(11) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_marks`
--

CREATE TABLE `assessment_marks` (
  `Staff_id` char(6) DEFAULT NULL,
  `Project_id` char(10) DEFAULT NULL,
  `Assessment_id` int(11) DEFAULT NULL,
  `Item_id` int(11) DEFAULT NULL,
  `Mark` double DEFAULT NULL,
  `Comment` text,
  `Mark_id` int(11) NOT NULL,
  `Lock_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_mark`
--

CREATE TABLE `final_mark` (
  `Project_id` char(10) DEFAULT NULL,
  `Assessment_id` int(11) DEFAULT NULL,
  `Mark` double DEFAULT NULL,
  `Total_mark` int(11) DEFAULT NULL,
  `Overal_mark` double DEFAULT NULL,
  `Assessed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_stage_mark`
--

CREATE TABLE `final_stage_mark` (
  `Stage_mark` int(11) NOT NULL,
  `Project_id` char(6) DEFAULT NULL,
  `Total_mark` double DEFAULT NULL,
  `Out_of` int(11) DEFAULT NULL,
  `Total_percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `Title` varchar(10) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Surname` varchar(30) DEFAULT NULL,
  `Staff_id` char(6) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Email_address` varchar(50) DEFAULT NULL,
  `Contact` varchar(17) DEFAULT NULL,
  `Role` varchar(30) DEFAULT NULL,
  `Status` varchar(7) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Title`, `Name`, `Surname`, `Staff_id`, `Department`, `Email_address`, `Contact`, `Role`, `Status`, `Gender`, `Password`) VALUES
('Mr', 'Tererai', 'Maphosa', '1234', 'Software Engineering', 'tmaphosa@hit.ac.zw', '0732531297', 'co-ordinator', 'OFFLINE', 'Male', '$2y$12$Qdl3LEPwydTgBkOk0gt1Ee2.k4llFCcgFVb838rCcMGsl3PGtHBli'),
('Ms', 'Prudence', 'Kadebu', 'SE02', 'Software Engineering', 'pkadebu@hit.ac.zw', '0777000000', 'Chairperson', 'OFFLINE', 'Female', '$2y$12$TkNfXEPbIf80Aat5HW6lqObXpZ5.sdssmAHmVvSrGtd43I3Brzz3S'),
('Mrs', 'Addlight ', 'Mukwazvure', 'SE1234', 'Software Engineering', 'akwazvure@hit.ac.zw', '0777000000', 'Supervisor', 'OFFLINE', 'Female', '$2y$12$Zm/SO.r2IWWwl7NX9gqe4uLnj8ijdlAOROj4NLNe17b9q0zfq2rOO'),
('N/A', 'System', 'Administrator', 'SIST19', 'N/A', 'N/A', 'N/A', 'Administrator', 'N/A', 'N/A', '$2y$12$1ODLyA67grrnk4M7S0Xa2ehbcaEaJo4z096py/HVKomSNwoMZ1qAW');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_assessment_marks`
--

CREATE TABLE `lecturer_assessment_marks` (
  `Staff_id` char(6) DEFAULT NULL,
  `Project_id` char(10) DEFAULT NULL,
  `Assessment_id` int(11) DEFAULT NULL,
  `Mark_id` varchar(255) NOT NULL,
  `Mark` double DEFAULT NULL,
  `Total_mark` int(11) DEFAULT NULL,
  `Overal_mark` double DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Project_id` char(10) NOT NULL,
  `Year` char(9) DEFAULT NULL,
  `Level` char(6) DEFAULT NULL,
  `Project_title` varchar(100) DEFAULT NULL,
  `Project_description` text,
  `Field` text NOT NULL,
  `Tools` varchar(255) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Supervisor` varchar(100) DEFAULT NULL,
  `Stage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Project_id`, `Year`, `Level`, `Project_title`, `Project_description`, `Field`, `Tools`, `Department`, `Supervisor`, `Stage`) VALUES
('SE0', '2018/2019', 'hit200', 'SIST PROHUB', 'collaborative and project evaluation platform', 'Expect Systems', '                           html css  javascript and php \r\n                          ', 'Software Engineering', NULL, 'current'),
('SE1', '2018/2019', 'hit200', 'Khaya', 'House searching', 'Expect Systems', '                            \r\n                          no sql database', 'Software Engineering', NULL, 'current'),
('SE2', '2018/2019', 'hit200', 'Booking system', 'tobbacco processing', 'Expect Systems', '                            \r\n                          php', 'Software Engineering', NULL, 'current');

-- --------------------------------------------------------

--
-- Table structure for table `projects_files`
--

CREATE TABLE `projects_files` (
  `Project_id` char(10) NOT NULL,
  `File_id` int(11) NOT NULL,
  `File_name` varchar(20) DEFAULT NULL,
  `File_description` varchar(100) DEFAULT NULL,
  `File_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_files`
--

INSERT INTO `projects_files` (`Project_id`, `File_id`, `File_name`, `File_description`, `File_path`) VALUES
('SE0', 4, 'final hit200 (2019_0', 'collaborative and project evaluation platform', '../files/final hit200 (2019_01_27 08_12_54 UTC).pptx'),
('SE1', 5, 'final hit200 (2019_0', '                            proposal slide\r\n                          ', '../files/final hit200 (2019_01_27 08_12_54 UTC).pdf'),
('SE2', 6, 'hit200 back-end.docx', '                            \r\n                      Proposal Slide    ', '../files/hit200 back-end.docx');

-- --------------------------------------------------------

--
-- Table structure for table `project_developers`
--

CREATE TABLE `project_developers` (
  `Project_id` char(10) NOT NULL,
  `Reg_number` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stage_mark`
--

CREATE TABLE `stage_mark` (
  `Stage_mark` int(11) NOT NULL,
  `Staff_id` char(6) DEFAULT NULL,
  `Project_id` char(6) DEFAULT NULL,
  `Total_mark` double DEFAULT NULL,
  `Out_of` int(11) DEFAULT NULL,
  `Total_percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `DOB` text NOT NULL,
  `Reg_number` char(8) NOT NULL,
  `Program` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Email_address` varchar(100) DEFAULT NULL,
  `Physical_address` text,
  `Contact` varchar(17) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Name`, `Surname`, `DOB`, `Reg_number`, `Program`, `Department`, `Email_address`, `Physical_address`, `Contact`, `Gender`, `Password`) VALUES
('Nyasha', 'chikobvore', '1997-01-02', 'h170272g', 'Software Engineering', 'Software Engineering', 'nchikobvor@gmail.com', '22483 riverpark ruwa', '0732531297', 'Male', '$2y$12$erYIsYZ1VQwmbgTyIEvWM.cPKeBoMk/BRS9F0qc0gF2XxYo2.IrZG'),
('Rutendo', 'Mwaita', '1999-02-23', 'h170300b', 'Software Engineering', 'Software Engineering', 'meme.kom', 'h5 belvedere', '0777000000', 'Male', NULL),
('Kudakwashe', 'machingauta', '1998-01-07', 'h170430y', 'Software Engineering', 'Software Engineering', 'me@me.kom', 'h5 belvedere', '0777000000', 'Male', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment_details`
--
ALTER TABLE `assessment_details`
  ADD PRIMARY KEY (`Assessment_id`),
  ADD UNIQUE KEY `Assessment_lockkey` (`Assessment_lockkey`);

--
-- Indexes for table `assessment_items`
--
ALTER TABLE `assessment_items`
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `Assessment_id` (`Assessment_id`);

--
-- Indexes for table `assessment_marks`
--
ALTER TABLE `assessment_marks`
  ADD PRIMARY KEY (`Mark_id`),
  ADD KEY `Staff_id` (`Staff_id`),
  ADD KEY `Project_id` (`Project_id`),
  ADD KEY `Assessment_id` (`Assessment_id`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `final_mark`
--
ALTER TABLE `final_mark`
  ADD UNIQUE KEY `Project_id` (`Project_id`),
  ADD KEY `Assessment_id` (`Assessment_id`);

--
-- Indexes for table `final_stage_mark`
--
ALTER TABLE `final_stage_mark`
  ADD PRIMARY KEY (`Stage_mark`),
  ADD KEY `Project_id` (`Project_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`Staff_id`);

--
-- Indexes for table `lecturer_assessment_marks`
--
ALTER TABLE `lecturer_assessment_marks`
  ADD PRIMARY KEY (`Mark_id`),
  ADD KEY `Staff_id` (`Staff_id`),
  ADD KEY `Project_id` (`Project_id`),
  ADD KEY `Assessment_id` (`Assessment_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Project_id`),
  ADD UNIQUE KEY `Project_id` (`Project_id`);

--
-- Indexes for table `projects_files`
--
ALTER TABLE `projects_files`
  ADD PRIMARY KEY (`File_id`,`Project_id`),
  ADD KEY `Project_id` (`Project_id`);

--
-- Indexes for table `project_developers`
--
ALTER TABLE `project_developers`
  ADD PRIMARY KEY (`Project_id`),
  ADD KEY `Reg_number` (`Reg_number`);

--
-- Indexes for table `stage_mark`
--
ALTER TABLE `stage_mark`
  ADD PRIMARY KEY (`Stage_mark`),
  ADD KEY `Staff_id` (`Staff_id`),
  ADD KEY `Project_id` (`Project_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Reg_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment_details`
--
ALTER TABLE `assessment_details`
  MODIFY `Assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assessment_items`
--
ALTER TABLE `assessment_items`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assessment_marks`
--
ALTER TABLE `assessment_marks`
  MODIFY `Mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `final_stage_mark`
--
ALTER TABLE `final_stage_mark`
  MODIFY `Stage_mark` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_files`
--
ALTER TABLE `projects_files`
  MODIFY `File_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stage_mark`
--
ALTER TABLE `stage_mark`
  MODIFY `Stage_mark` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment_items`
--
ALTER TABLE `assessment_items`
  ADD CONSTRAINT `assessment_items_ibfk_1` FOREIGN KEY (`Assessment_id`) REFERENCES `assessment_details` (`Assessment_id`);

--
-- Constraints for table `assessment_marks`
--
ALTER TABLE `assessment_marks`
  ADD CONSTRAINT `assessment_marks_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `lecturers` (`Staff_id`),
  ADD CONSTRAINT `assessment_marks_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`),
  ADD CONSTRAINT `assessment_marks_ibfk_3` FOREIGN KEY (`Assessment_id`) REFERENCES `assessment_details` (`Assessment_id`),
  ADD CONSTRAINT `assessment_marks_ibfk_4` FOREIGN KEY (`Item_id`) REFERENCES `assessment_items` (`Item_id`);

--
-- Constraints for table `final_mark`
--
ALTER TABLE `final_mark`
  ADD CONSTRAINT `final_mark_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`),
  ADD CONSTRAINT `final_mark_ibfk_2` FOREIGN KEY (`Assessment_id`) REFERENCES `assessment_details` (`Assessment_id`);

--
-- Constraints for table `final_stage_mark`
--
ALTER TABLE `final_stage_mark`
  ADD CONSTRAINT `final_stage_mark_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`);

--
-- Constraints for table `lecturer_assessment_marks`
--
ALTER TABLE `lecturer_assessment_marks`
  ADD CONSTRAINT `lecturer_assessment_marks_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `lecturers` (`Staff_id`),
  ADD CONSTRAINT `lecturer_assessment_marks_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`),
  ADD CONSTRAINT `lecturer_assessment_marks_ibfk_3` FOREIGN KEY (`Assessment_id`) REFERENCES `assessment_details` (`Assessment_id`);

--
-- Constraints for table `projects_files`
--
ALTER TABLE `projects_files`
  ADD CONSTRAINT `projects_files_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`);

--
-- Constraints for table `project_developers`
--
ALTER TABLE `project_developers`
  ADD CONSTRAINT `project_developers_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`),
  ADD CONSTRAINT `project_developers_ibfk_2` FOREIGN KEY (`Reg_number`) REFERENCES `students` (`Reg_number`);

--
-- Constraints for table `stage_mark`
--
ALTER TABLE `stage_mark`
  ADD CONSTRAINT `stage_mark_ibfk_1` FOREIGN KEY (`Staff_id`) REFERENCES `lecturers` (`Staff_id`),
  ADD CONSTRAINT `stage_mark_ibfk_2` FOREIGN KEY (`Project_id`) REFERENCES `projects` (`Project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
