-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2016 at 12:10 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospitals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `admission_id` int(11) NOT NULL AUTO_INCREMENT,
  `bed_id` int(11) NOT NULL,
  `dates` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  PRIMARY KEY (`admission_id`),
  KEY `fk_admission_staff_details1_idx` (`staff_id`),
  KEY `fk_admission_patient1_idx` (`patient_id`),
  KEY `fk_admission_bed1_idx` (`bed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `bed_id`, `dates`, `status`, `staff_id`, `patient_id`) VALUES
(4, 2, '10/17/2016', 0, '002', '64850'),
(5, 3, '10/22/2016', 0, '002', '64850');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointment_patient1_idx` (`patient_id`),
  KEY `fk_appointment_staff_details1_idx` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE IF NOT EXISTS `bed` (
  `bed_id` int(11) NOT NULL AUTO_INCREMENT,
  `word_id` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`bed_id`),
  KEY `fk_bed_word1_idx` (`word_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`bed_id`, `word_id`, `bed_no`, `status`) VALUES
(2, 1, 1, 0),
(3, 1, 2, 0),
(4, 1, 3, 0),
(5, 1, 4, 0),
(6, 1, 5, 0),
(7, 1, 6, 0),
(8, 1, 7, 0),
(9, 1, 8, 0),
(10, 1, 9, 0),
(11, 1, 10, 0),
(12, 1, 11, 0),
(13, 1, 12, 0),
(14, 1, 13, 0),
(15, 1, 14, 0),
(16, 1, 15, 0),
(17, 1, 16, 0),
(18, 1, 17, 0),
(19, 1, 18, 0),
(20, 1, 19, 0),
(21, 1, 20, 0),
(22, 2, 1, 0),
(23, 2, 2, 0),
(24, 2, 3, 0),
(25, 2, 4, 0),
(26, 2, 5, 0),
(27, 2, 6, 0),
(28, 2, 7, 0),
(29, 2, 8, 0),
(30, 2, 9, 0),
(31, 2, 10, 0),
(32, 2, 11, 0),
(33, 2, 12, 0),
(34, 2, 13, 0),
(35, 2, 14, 0),
(36, 2, 15, 0),
(37, 2, 16, 0),
(38, 2, 17, 0),
(39, 2, 18, 0),
(40, 2, 19, 0),
(41, 2, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `diagnose`
--

CREATE TABLE IF NOT EXISTS `diagnose` (
  `diagnose_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `diagnose` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  PRIMARY KEY (`diagnose_id`),
  KEY `fk_diagnose_patient1_idx` (`patient_id`),
  KEY `fk_diagnose_staff_details1_idx` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`diagnose_id`, `patient_id`, `diagnose`, `date`, `staff_id`) VALUES
(4, '64850', 'cold ', '10/17/2016', '002'),
(5, '64850', 'am or', '10/17/2016', '002');

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE IF NOT EXISTS `discharge` (
  `discharge_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staff_id` varchar(20) NOT NULL,
  `admission_id` int(11) NOT NULL,
  PRIMARY KEY (`discharge_id`),
  KEY `fk_discharge_staff_details1_idx` (`staff_id`),
  KEY `fk_discharge_admission1_idx` (`admission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`discharge_id`, `date`, `staff_id`, `admission_id`) VALUES
(1, '2016-10-22 05:32:24', '002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE IF NOT EXISTS `drug` (
  `drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `drugs` varchar(60) NOT NULL,
  `Strength` varchar(20) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  PRIMARY KEY (`drug_id`),
  KEY `fk_drug_prescription1_idx` (`prescription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `prescription_id`, `drugs`, `Strength`, `dosage`) VALUES
(10, 1, 'pharacetamol', '500mg', '2/3X5');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `login_type` varchar(20) NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `fk_login_details_staff_details_idx` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_id`, `username`, `password`, `staff_id`, `login_type`) VALUES
(7, 'staff', 'dcddb75469b4b4875094e14561e573d8', '001', '4'),
(8, 'doctor', 'dcddb75469b4b4875094e14561e573d8', '002', '2'),
(9, 'nurse', 'dcddb75469b4b4875094e14561e573d8', '001', '3'),
(10, 'admin', 'dcddb75469b4b4875094e14561e573d8', '001', '1'),
(11, 'lab', 'dcddb75469b4b4875094e14561e573d8', '001', '5');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `mstatus` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `nextofkin` varchar(60) NOT NULL,
  `nphoneno` varchar(20) NOT NULL,
  `addressn` text NOT NULL,
  `dates` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `fk_patient_staff_details1_idx` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `fname`, `lname`, `sex`, `mstatus`, `address`, `phoneno`, `nextofkin`, `nphoneno`, `addressn`, `dates`, `staff_id`) VALUES
('64850', 'jamil', 'sami', 'Male', 'Single', 'sokoto', '0807', 'shehu', '080', 'sokoy', '10/17/2016', '002'),
('686554', 'umar', 'sani', 'Male', 'Single', 'ffg', '08065987790', 'sani umar', '08009876568', 'dsoo', '10/23/2016', '001');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `diagnose_id` int(11) NOT NULL,
  PRIMARY KEY (`prescription_id`),
  KEY `fk_prescription_staff_details1_idx` (`staff_id`),
  KEY `fk_prescription_patient1_idx` (`patient_id`),
  KEY `fk_prescription_diagnose1_idx` (`diagnose_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `patient_id`, `date`, `staff_id`, `diagnose_id`) VALUES
(1, '64850', '10/17/2016', '002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `patient_id`, `date`, `status`) VALUES
(1, 0, '10/17/2016', 0),
(2, 0, '10/17/2016', 0),
(3, 64850, '10/17/2016', 0),
(4, 686554, '10/23/2016', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE IF NOT EXISTS `staff_details` (
  `staff_id` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `departments_id` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `fk_staff_details_departments1_idx` (`departments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`staff_id`, `title`, `lastname`, `firstname`, `sex`, `address`, `phoneno`, `departments_id`) VALUES
('001', 'Mr', 'Umar', 'Bello', 'male', 'sokoto', '08054677656', 3),
('002', 'Mr', 'sani', 'usman sani', 'Female', 'ojjd ddo', '09809876533', 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE IF NOT EXISTS `test_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `result` varchar(80) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `fk_test_resul_test_table1_idx` (`test_id`),
  KEY `fk_test_resul_staff_details1_idx` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`result_id`, `test_id`, `result`, `staff_id`) VALUES
(1, 1, 'tt yytf uyg', '001'),
(2, 3, 'hhh', '001'),
(3, 2, 'hh hf', '001');

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE IF NOT EXISTS `test_table` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(20) NOT NULL,
  `test` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staff_id` varchar(20) NOT NULL,
  `test_no` int(11) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `fk_test_table_staff_details1_idx` (`staff_id`),
  KEY `fk_test_table_patient1_idx` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`test_id`, `patient_id`, `test`, `date`, `staff_id`, `test_no`) VALUES
(1, '64850', 'mp', '2016-10-17 12:38:02', '002', 7210),
(2, '64850', 'widel', '2016-10-17 12:38:47', '002', 7210),
(3, '64850', 'tst\r\ngfgh\r\nhi', '2016-10-17 12:02:10', '002', 7210),
(4, '64850', 'hhgg', '2016-10-22 04:47:40', '001', 7210);

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
  `word_id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `gender` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`word_id`, `word`, `gender`, `capacity`) VALUES
(1, 'Sardauna', 1, 20),
(2, 'Nana Asmau', 2, 20);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `fk_admission_bed1` FOREIGN KEY (`bed_id`) REFERENCES `bed` (`bed_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_admission_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_admission_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bed`
--
ALTER TABLE `bed`
  ADD CONSTRAINT `fk_bed_word1` FOREIGN KEY (`word_id`) REFERENCES `word` (`word_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD CONSTRAINT `fk_diagnose_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diagnose_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discharge`
--
ALTER TABLE `discharge`
  ADD CONSTRAINT `fk_discharge_admission1` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discharge_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `drug`
--
ALTER TABLE `drug`
  ADD CONSTRAINT `fk_drug_prescription1` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `fk_login_details_staff_details` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `fk_prescription_diagnose1` FOREIGN KEY (`diagnose_id`) REFERENCES `diagnose` (`diagnose_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prescription_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prescription_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD CONSTRAINT `fk_staff_details_departments1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `fk_test_resul_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_resul_test_table1` FOREIGN KEY (`test_id`) REFERENCES `test_table` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_table`
--
ALTER TABLE `test_table`
  ADD CONSTRAINT `fk_test_table_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_table_staff_details1` FOREIGN KEY (`staff_id`) REFERENCES `staff_details` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
