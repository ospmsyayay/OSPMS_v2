-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2015 at 11:10 AM
-- Server version: 5.6.22-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ospms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(16) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`) VALUES
('MA1411302-545985'),
('MA1503125-210159');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_lecture`
--

CREATE TABLE IF NOT EXISTS `announcement_lecture` (
  `date_created` datetime NOT NULL,
  `messageorfile_caption` longtext,
  `file_path` varchar(200) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement_lecture`
--

INSERT INTO `announcement_lecture` (`date_created`, `messageorfile_caption`, `file_path`, `file_name`) VALUES
('2015-03-08 07:07:20', 'Hi Mathematics!', NULL, NULL),
('2015-03-08 07:08:06', 'Please Review We have Quiz tomorrow..', 'model/uploaded_files/', 'Master Verb tenses.pdf'),
('2015-03-08 18:23:46', 'lkwejrkljwer', NULL, NULL),
('2015-03-08 18:25:14', 'sdhkjfaaaaaaaaaaaaa', NULL, NULL),
('2015-03-12 18:52:45', 'hi', NULL, NULL),
('2015-03-12 19:17:51', 'Hello', NULL, NULL),
('2015-03-12 19:18:03', 'Eto na', 'model/uploaded_files/', '10.JPG'),
('2015-03-13 00:01:05', 'jhkhkjjhk', NULL, NULL),
('2015-03-13 00:18:46', 'hey', NULL, NULL),
('2015-03-13 01:37:20', 'Hello', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcement_lecture_comments`
--

CREATE TABLE IF NOT EXISTS `announcement_lecture_comments` (
  `comment_date_created` datetime NOT NULL,
  `account_id` varchar(16) NOT NULL,
  `comment_message` longtext,
  `post_date_created` datetime NOT NULL,
  PRIMARY KEY (`comment_date_created`,`account_id`),
  KEY `FK1_announcement_lecture_comments` (`post_date_created`),
  KEY `FK2_announcement_lecture_comments` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement_lecture_comments`
--

INSERT INTO `announcement_lecture_comments` (`comment_date_created`, `account_id`, `comment_message`, `post_date_created`) VALUES
('2015-03-08 07:22:26', 'MS1503081-720647', 'Thanks Mam!!', '2015-03-08 07:08:06'),
('2015-03-12 19:56:04', 'MS1503081-720647', 'testing 1', '2015-03-12 19:18:03'),
('2015-03-12 19:56:09', 'MS1503081-720647', 'testing 2', '2015-03-12 19:18:03'),
('2015-03-12 19:56:38', 'MS1503081-720647', 'latest comment', '2015-03-12 19:18:03'),
('2015-03-12 19:57:03', 'MS1503081-720647', 'oo', '2015-03-12 19:18:03'),
('2015-03-12 20:01:29', 'MS1503081-720647', 'hoy', '2015-03-12 19:18:03'),
('2015-03-12 20:02:43', 'MS1503081-720647', 'bat ganun?', '2015-03-12 19:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE IF NOT EXISTS `create_account` (
  `username_` varchar(16) NOT NULL,
  `password_` varchar(16) NOT NULL,
  `secret_question` varchar(30) DEFAULT NULL,
  `secret_answer` varchar(30) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `account_id` varchar(16) NOT NULL,
  PRIMARY KEY (`username_`),
  KEY `FK_create_user` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`username_`, `password_`, `secret_question`, `secret_answer`, `user_type`, `account_id`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin', 'MA1411302-545985'),
('MASSA10159', 'LeLYs7iU', NULL, NULL, 'admin', 'MA1503125-210159'),
('MPAAA19614', 'MJZSVYtE', NULL, NULL, 'parent', 'MP1503081-319614'),
('MPAAB15002', 'CA9Qms3B', NULL, NULL, 'parent', 'MP1503084-915002'),
('MPCMC45392', 'IeC2CEE6', NULL, NULL, 'parent', 'MP1503081-545392'),
('MPDAB77713', 'BtDRO1IR', NULL, NULL, 'parent', 'MP1503082-977713'),
('MPDDD86763', 'R9akas7F', NULL, NULL, 'parent', 'MP1503120-886763'),
('MPDFD28488', 'cI9KTXOo', NULL, NULL, 'parent', 'MP1503088-828488'),
('MPDMO49105', 'oTTKBNQn', NULL, NULL, 'parent', 'MP1503088-249105'),
('MPEAH47513', 'jLYq3t94', NULL, NULL, 'parent', 'MP1503083-747513'),
('MPGGI02949', 'Vhu7Lkbt', NULL, NULL, 'parent', 'MP1503081-402949'),
('MPJMB76912', 'M4PNRgxK', NULL, NULL, 'parent', 'MP1503082-776912'),
('MPMBB92937', 'ScevSfjY', NULL, NULL, 'parent', 'MP1503082-492937'),
('MPMY82358', 'YyNFSufN', NULL, NULL, 'parent', 'MP1503086-182358'),
('MPNNN91873', '1H1eepNm', NULL, NULL, 'parent', 'MP1503124-591873'),
('MPPZC96999', 'imClzhHC', NULL, NULL, 'parent', 'MP1503088-296999'),
('MPRBN93125', 'mRe6cwtB', NULL, NULL, 'parent', 'MP1503088-193125'),
('MPRDB08695', 'psComfgq', NULL, NULL, 'parent', 'MP1503089-308695'),
('MPRFH52461', 'HJGgYVmw', NULL, NULL, 'parent', 'MP1503082-152461'),
('MPRQA40531', 'RWt7tZYc', NULL, NULL, 'parent', 'MP1503083-440531'),
('MPSAL73302', 'v4nRSROW', NULL, NULL, 'parent', 'MP1503084-273302'),
('MPSGA98283', 'FCSi2FQf', NULL, NULL, 'parent', 'MP1503082-698283'),
('MPSSF70616', 'PSi5s2Sl', NULL, NULL, 'parent', 'MP1503123-970616'),
('MPVML26825', 'ea3bsQzR', NULL, NULL, 'parent', 'MP1503085-226825'),
('MPVTA60601', 'ZLI31WUW', NULL, NULL, 'parent', 'MP1503086-860601'),
('MSAAS19340', 'guRcoRQy', NULL, NULL, 'student', 'MS1503120-419340'),
('MSACB54874', 'WaHU43l7', NULL, NULL, 'student', 'MS1503080-254874'),
('MSADA60360', 'r1mJhwUb', NULL, NULL, 'student', 'MS1503084-960360'),
('MSAMA50585', 'tWOSgwKs', NULL, NULL, 'student', 'MS1503087-750585'),
('MSCRC50973', '5ZL2SwDZ', NULL, NULL, 'student', 'MS1503084-650973'),
('MSDAA65965', '4J4zjYI2', NULL, NULL, 'student', 'MS1503082-465965'),
('MSDAO41080', 'pYbWCwDI', NULL, NULL, 'student', 'MS1503083-141080'),
('MSDB52804', 'dWWwBuf2', NULL, NULL, 'student', 'MS1503089-752804'),
('MSEGA19963', 'NfkvAvbY', NULL, NULL, 'student', 'MS1503082-419963'),
('MSJCB41366', 'FysSbh4p', NULL, NULL, 'student', 'MS1503082-641366'),
('MSMCH22671', 'HMgUSxO3', NULL, NULL, 'student', 'MS1503087-722671'),
('MSMHI18376', 'RPmr2rjn', NULL, NULL, 'student', 'MS1503086-318376'),
('MSMPB60208', 'daqCf4uf', NULL, NULL, 'student', 'MS1503080-660208'),
('MSMTY59035', 'HF6yhWL4', NULL, NULL, 'student', 'MS1503080-959035'),
('MSPVL88224', 'M9ReIrAR', NULL, NULL, 'student', 'MS1503085-788224'),
('MSRBH82978', 'dVTHoUfd', NULL, NULL, 'student', 'MS1503082-682978'),
('MSRCB74208', 'LUhKnDjf', NULL, NULL, 'student', 'MS1503083-674208'),
('MSREN61020', 'axIxSh6E', NULL, NULL, 'student', 'MS1503084-461020'),
('MSRPD40782', 'kvQb2yEt', NULL, NULL, 'student', 'MS1503088-840782'),
('MSSAL77988', '6Y2360Jz', NULL, NULL, 'student', 'MS1503089-277988'),
('MSSSD21836', 'He07OlBh', NULL, NULL, 'student', 'MS1503123-521836'),
('MSTSC51223', 'Ude3pLZ2', NULL, NULL, 'student', 'MS1503080-551223'),
('MSVCA92368', 'b3V4x6fJ', NULL, NULL, 'student', 'MS1503084-492368'),
('MTAAA47968', 'nOZPvt9A', NULL, NULL, 'teacher', 'MT1503125-347968'),
('MTSSS88020', 'LUx9RaYW', NULL, NULL, 'teacher', 'MT1503128-488020'),
('parent', 'parent', NULL, NULL, 'parent', 'MP1503089-731527'),
('student', 'student', NULL, NULL, 'student', 'MS1503081-720647'),
('teacher', 'teacher', NULL, NULL, 'teacher', 'MT1503087-807554');

-- --------------------------------------------------------

--
-- Table structure for table `curr_section_list`
--

CREATE TABLE IF NOT EXISTS `curr_section_list` (
  `section_name` varchar(20) DEFAULT NULL,
  `grade_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curr_section_list`
--

INSERT INTO `curr_section_list` (`section_name`, `grade_level`) VALUES
('Sampaguita', 'Grade 1'),
('Waling-Waling', 'Grade 1'),
('Gumamela', 'Grade 1'),
('Rosal', 'Grade 1'),
('Santan', 'Grade 1'),
('Kalachuchi', 'Grade 1'),
('Bougainvillea', 'Grade 1'),
('Kamias', 'Grade 1'),
('Hasmin', 'Grade 1'),
('Tsitsirika', 'Grade 1'),
('Cariñosa', 'Grade 2'),
('Singkil', 'Grade 2'),
('Polkabal', 'Grade 2'),
('Habanera', 'Grade 2'),
('Maglalatik', 'Grade 2'),
('Pandanggo', 'Grade 2'),
('Tinikling', 'Grade 2'),
('Kuratsa', 'Grade 2'),
('Pantomina', 'Grade 2'),
('Rizal', 'Grade 3'),
('Bonifacio', 'Grade 3'),
('Del Pilar', 'Grade 3'),
('Aguinaldo', 'Grade 3'),
('Mabini', 'Grade 3'),
('Jacinto', 'Grade 3'),
('Luna', 'Grade 3'),
('Silang', 'Grade 3');

-- --------------------------------------------------------

--
-- Table structure for table `curr_subject_list`
--

CREATE TABLE IF NOT EXISTS `curr_subject_list` (
  `subject_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curr_subject_list`
--

INSERT INTO `curr_subject_list` (`subject_name`) VALUES
('Mother Tongue'),
('Filipino'),
('English'),
('Mathematics'),
('Science and Health'),
('Araling Panlipunan'),
('MAPEH'),
('Edukasyon sa Pagpapakatao');

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE IF NOT EXISTS `grade_level` (
  `levelID` varchar(5) NOT NULL,
  `level_description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`levelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`levelID`, `level_description`) VALUES
('G1217', 'Grade 1'),
('G1461', 'Grade 2'),
('G2024', 'Grade 3');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parentID` varchar(16) NOT NULL,
  PRIMARY KEY (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`) VALUES
('MP1503081-319614'),
('MP1503081-402949'),
('MP1503081-545392'),
('MP1503082-152461'),
('MP1503082-492937'),
('MP1503082-698283'),
('MP1503082-776912'),
('MP1503082-977713'),
('MP1503083-440531'),
('MP1503083-747513'),
('MP1503084-273302'),
('MP1503084-915002'),
('MP1503085-226825'),
('MP1503086-182358'),
('MP1503086-860601'),
('MP1503088-193125'),
('MP1503088-249105'),
('MP1503088-296999'),
('MP1503088-828488'),
('MP1503089-308695'),
('MP1503089-731527'),
('MP1503120-886763'),
('MP1503123-970616'),
('MP1503124-591873');

-- --------------------------------------------------------

--
-- Table structure for table `post_announcement_lecture`
--

CREATE TABLE IF NOT EXISTS `post_announcement_lecture` (
  `class_rec_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`class_rec_no`,`date_created`),
  KEY `FK2_post_announcement_lecture` (`date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_announcement_lecture`
--

INSERT INTO `post_announcement_lecture` (`class_rec_no`, `date_created`) VALUES
('ECRN-84307', '2015-03-08 07:07:20'),
('ECRN-84307', '2015-03-08 07:08:06'),
('ECRN-84307', '2015-03-08 18:23:46'),
('ECRN-84307', '2015-03-08 18:25:14'),
('ECRN-84307', '2015-03-12 18:52:45'),
('ECRN-84307', '2015-03-12 19:17:51'),
('ECRN-84307', '2015-03-12 19:18:03'),
('ECRN-84307', '2015-03-13 00:01:05'),
('ECRN-10247', '2015-03-13 01:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `post_teacher_feedback_parent`
--

CREATE TABLE IF NOT EXISTS `post_teacher_feedback_parent` (
  `class_rec_no` varchar(10) NOT NULL,
  `feedback_date_created` datetime NOT NULL,
  `parentID` varchar(16) NOT NULL,
  PRIMARY KEY (`class_rec_no`,`feedback_date_created`,`parentID`),
  KEY `FK2_post_teacher_feedback_parent` (`feedback_date_created`),
  KEY `FK3_post_teacher_feedback_parent` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_teacher_feedback_parent`
--

INSERT INTO `post_teacher_feedback_parent` (`class_rec_no`, `feedback_date_created`, `parentID`) VALUES
('ECRN-84307', '2015-03-08 07:08:22', 'MP1503089-731527'),
('ECRN-84307', '2015-03-08 07:46:20', 'MP1503089-731527'),
('ECRN-84307', '2015-03-08 18:24:02', 'MP1503089-731527'),
('ECRN-10247', '2015-03-13 01:37:35', 'MP1503081-545392'),
('ECRN-10247', '2015-03-13 01:37:35', 'MP1503088-828488'),
('ECRN-10247', '2015-03-13 01:37:35', 'MP1503089-731527'),
('ECRN-10247', '2015-03-13 01:37:35', 'MP1503123-970616'),
('ECRN-10247', '2015-03-13 02:05:02', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 02:06:56', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 02:07:12', 'MP1503089-731527'),
('ECRN-10247', '2015-03-13 02:08:24', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 02:08:35', 'MP1503089-731527'),
('ECRN-10247', '2015-03-13 02:23:39', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 07:36:20', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 08:46:53', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 08:47:54', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 08:48:31', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 09:02:53', 'MP1503089-731527'),
('ECRN-84307', '2015-03-13 09:06:13', 'MP1503089-731527');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `legendID` varchar(2) NOT NULL,
  `description` varchar(25) DEFAULT NULL,
  `equivalent` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`legendID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`legendID`, `description`, `equivalent`) VALUES
('A', 'Advanced', '90% and above'),
('AP', 'Approaching Proficiency', '80-84%'),
('B', 'Beginning', '74% and below'),
('D', 'Developing', '75-79%'),
('P', 'Proficient', '85-89%');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` varchar(16) NOT NULL,
  `reg_lname` varchar(30) NOT NULL,
  `reg_fname` varchar(30) NOT NULL,
  `reg_mname` varchar(30) DEFAULT NULL,
  `reg_gender` varchar(6) DEFAULT NULL,
  `reg_status` varchar(10) DEFAULT NULL,
  `reg_birthday` date NOT NULL,
  `reg_address` varchar(150) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_lname`, `reg_fname`, `reg_mname`, `reg_gender`, `reg_status`, `reg_birthday`, `reg_address`, `image`) VALUES
('MA1411302-545985', 'Arandia', 'Darryl', 'Eda', 'Male', 'Single', '1993-12-05', '299 Arandia Tunasan Muntinlupa City', 'avatar04.png'),
('MA1503125-210159', 'asdf', 'sdf', 'sdf', 'Male', 'Single', '2015-03-17', NULL, 'student26.jpg'),
('MP1503081-319614', 'Argame', 'Althea', 'Mallari', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503081-402949', 'Ilisan', 'Maryse Gianne', 'Hernan', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503081-545392', 'Calderon', 'Christian Reden', 'Rivera', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503082-152461', 'Huab', 'Russel', 'Ballano', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503082-492937', 'Bermejo', 'Mariel', 'Panes', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503082-698283', 'Alcantara', 'Erica Jane', 'Gervacio', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503082-776912', 'Bombase', 'James', 'Cruz', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503082-977713', 'Borra', 'Dave Cyril', '', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503083-440531', 'Abubacar', 'Amira', 'Domen', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503083-747513', 'Hallera', 'Ma Jane', 'Cambaya', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503084-273302', 'Lopez', 'Samantha Nicole', 'Abelligos', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503084-915002', 'Bularda', 'Angelo', 'Cuadero', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503085-226825', 'Lamberte', 'Princess Mariet', 'Victoria', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503086-182358', 'Yasumi', 'Mika', 'Tanaka', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503086-860601', 'Arciaga', 'Val Nino', 'Cabajar', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503088-193125', 'Nuylan', 'Rhealyn', 'Escote', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503088-249105', 'Orogo', 'Dianne', 'Abarientos', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503088-296999', 'Cruz', 'Timothy Patrick', 'Suerte', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503088-828488', 'De Mesa', 'Reniel', 'Paloma', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503089-308695', 'Bondalo', 'Richmon', 'Cadenas', NULL, NULL, '2015-03-08', NULL, NULL),
('MP1503089-731527', 'Aquino', 'Ninoy', 'Luna', NULL, NULL, '2015-03-08', NULL, 'avatar.png'),
('MP1503120-886763', 'de', 'd', 'd', NULL, NULL, '2015-03-12', NULL, NULL),
('MP1503123-970616', 'fg', 's', 's', NULL, NULL, '2015-03-12', NULL, NULL),
('MP1503124-591873', 'null', 'null', 'null', NULL, NULL, '2015-03-12', NULL, NULL),
('MS1503080-254874', 'Bularda', 'Angelo', 'Cuadero', 'Male', 'Single', '2006-11-29', 'Bularda Compound', NULL),
('MS1503080-551223', 'Cruz', 'Timothy Patrick', 'Suerte', 'Male', 'Single', '2006-12-01', 'Cruz Compound', NULL),
('MS1503080-660208', 'Bermejo', 'Mariel', 'Panes', 'Female', 'Single', '2007-01-26', 'Bermejo Compound', NULL),
('MS1503080-959035', 'Yasumi', 'Mika', 'Tanaka', 'Female', 'Single', '2007-04-01', 'Ishikawa Compound', NULL),
('MS1503081-720647', 'Aquino', 'Benigno', 'Simeon', 'Male', 'Single', '2007-03-20', 'Alabang Zapote', 'student5.jpg'),
('MS1503082-419963', 'Alcantara', 'Erica Jane', 'Gervacio', 'Female', 'Single', '2007-01-24', 'Alcantara Compound', NULL),
('MS1503082-465965', 'Azores', 'Darrel', 'Acudesin', 'Male', 'Single', '2015-03-08', '', 'student35.jpg'),
('MS1503082-641366', 'Bombase', 'James', 'Cruz', 'Male', 'Single', '2006-11-26', 'Bombase Compound', NULL),
('MS1503082-682978', 'Huab', 'Russel', 'Ballano', 'Male', 'Single', '2006-12-03', 'Huab Compound', NULL),
('MS1503083-141080', 'Orogo', 'Dianne', 'Abarientos', 'Female', 'Single', '2007-02-01', 'Orogo Compound', NULL),
('MS1503083-674208', 'Bondalo', 'Richmon', 'Cadenas', 'Male', 'Single', '2006-11-27', 'Bondalo Compound', NULL),
('MS1503084-461020', 'Nuylan', 'Rhealyn', 'Escote', 'Female', 'Single', '2007-01-31', 'Nuylan Compound', NULL),
('MS1503084-492368', 'Arciaga', 'Val Nino', 'Cabajar', 'Male', 'Single', '2006-11-24', 'Arciaga Compound', NULL),
('MS1503084-650973', 'Calderon', 'Christian Reden', 'Rivera', 'Male', 'Single', '2006-11-30', 'Calderon Compound', NULL),
('MS1503084-960360', 'Abubacar', 'Amira', 'Domen', 'Female', 'Single', '2007-01-23', 'Abubacar Compound', NULL),
('MS1503085-788224', 'Lamberte', 'Princess Mariet', 'Victoria', 'Female', 'Single', '2007-01-29', 'Lamberte Compound', NULL),
('MS1503086-318376', 'Ilisan', 'Maryse Gianne', 'Hernan', 'Female', 'Single', '2007-01-28', 'Ilisan Compound', NULL),
('MS1503087-722671', 'Hallera', 'Ma Jane', 'Cambaya', 'Female', 'Single', '2007-01-27', 'Hallera Compound', NULL),
('MS1503087-750585', 'Argame', 'Althea', 'Mallari', 'Female', 'Single', '2007-01-25', 'Argame Compound', NULL),
('MS1503088-840782', 'De Mesa', 'Reniel', 'Paloma', 'Male', 'Single', '2006-12-02', 'De Mesa Compound', NULL),
('MS1503089-277988', 'Lopez', 'Samantha Nicole', 'Abelligos', 'Female', 'Single', '2007-01-30', 'Lopez Compound', NULL),
('MS1503089-752804', 'Borra', 'Dave Cyril', '', 'Male', 'Single', '2006-11-28', 'Borra Compound', NULL),
('MS1503120-419340', 'sadfasdf', 'asdfasdf', 'asdf', 'Female', 'Single', '2015-03-17', NULL, 'student15.jpg'),
('MS1503123-521836', 'dfsdf', 'sdfg', 'sdfb', 'Female', 'Single', '2015-03-24', NULL, 'student33.jpg'),
('MT1503087-807554', 'De Padua', 'Joan Claire', 'Almoro', 'Female', 'Single', '1974-09-09', 'Sto Nino', 'avatar2.png'),
('MT1503125-347968', 'Ako', 'Ako', 'Ako', 'Male', 'Single', '1973-03-14', NULL, 'teacher.jpg'),
('MT1503128-488020', 'she', 'she', 'she', 'Male', 'Single', '1981-03-17', NULL, 'avatar3.png');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomNo` varchar(10) NOT NULL DEFAULT '',
  `building` varchar(30) DEFAULT NULL,
  `seat_capacity` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`roomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `class_rec_no` varchar(10) NOT NULL,
  `sectionID` varchar(6) DEFAULT NULL,
  `sched_days` varchar(9) DEFAULT NULL,
  `sched_start_time` time DEFAULT NULL,
  `sched_end_time` time DEFAULT NULL,
  `subjectID` varchar(8) DEFAULT NULL,
  `teacherID` varchar(16) DEFAULT NULL,
  `levelID` varchar(5) DEFAULT NULL,
  `roomNo` varchar(10) DEFAULT NULL,
  `school_year` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`class_rec_no`),
  KEY `FK_section2` (`sectionID`),
  KEY `FK_section3` (`teacherID`),
  KEY `FK_section4` (`subjectID`),
  KEY `FK_section5` (`levelID`),
  KEY `FK_section6` (`roomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`class_rec_no`, `sectionID`, `sched_days`, `sched_start_time`, `sched_end_time`, `subjectID`, `teacherID`, `levelID`, `roomNo`, `school_year`) VALUES
('ECRN-10247', 'S14166', 'MWF', '05:45:00', '06:45:00', 'EAS-1738', 'MT1503087-807554', 'G2024', NULL, '2015-2016'),
('ECRN-58351', 'S63172', 'MWF', '05:45:00', '06:45:00', 'EAS-2815', 'MT1503087-807554', 'G1217', NULL, '2015-2016'),
('ECRN-84307', 'S95866', 'MWF', '07:15:00', '08:15:00', 'EAS-1738', 'MT1503087-807554', 'G2024', NULL, '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `section_list`
--

CREATE TABLE IF NOT EXISTS `section_list` (
  `sectionID` varchar(6) NOT NULL DEFAULT '',
  `sectionNo` varchar(2) DEFAULT NULL,
  `section_name` varchar(20) DEFAULT NULL,
  `level_id` varchar(5) NOT NULL,
  PRIMARY KEY (`sectionID`),
  KEY `FK_section_list` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section_list`
--

INSERT INTO `section_list` (`sectionID`, `sectionNo`, `section_name`, `level_id`) VALUES
('S14166', '2', 'Bonifacio', 'G2024'),
('S25075', '1', 'Cariñosa', 'G1461'),
('S63172', '1', 'Sampaguita', 'G1217'),
('S74289', '2', 'Hasmin', 'G1217'),
('S90073', '3', 'Mabini', 'G2024'),
('S95866', '1', 'Rizal', 'G2024');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_lrn` varchar(16) NOT NULL,
  `parentID` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`student_lrn`),
  KEY `FK2_student` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_lrn`, `parentID`) VALUES
('MS1503087-750585', 'MP1503081-319614'),
('MS1503086-318376', 'MP1503081-402949'),
('MS1503084-650973', 'MP1503081-545392'),
('MS1503082-682978', 'MP1503082-152461'),
('MS1503080-660208', 'MP1503082-492937'),
('MS1503082-419963', 'MP1503082-698283'),
('MS1503082-641366', 'MP1503082-776912'),
('MS1503089-752804', 'MP1503082-977713'),
('MS1503084-960360', 'MP1503083-440531'),
('MS1503087-722671', 'MP1503083-747513'),
('MS1503089-277988', 'MP1503084-273302'),
('MS1503080-254874', 'MP1503084-915002'),
('MS1503085-788224', 'MP1503085-226825'),
('MS1503080-959035', 'MP1503086-182358'),
('MS1503084-492368', 'MP1503086-860601'),
('MS1503084-461020', 'MP1503088-193125'),
('MS1503083-141080', 'MP1503088-249105'),
('MS1503080-551223', 'MP1503088-296999'),
('MS1503088-840782', 'MP1503088-828488'),
('MS1503083-674208', 'MP1503089-308695'),
('MS1503081-720647', 'MP1503089-731527'),
('MS1503120-419340', 'MP1503120-886763'),
('MS1503123-521836', 'MP1503123-970616'),
('MS1503082-465965', 'MP1503124-591873');

-- --------------------------------------------------------

--
-- Table structure for table `student_rating`
--

CREATE TABLE IF NOT EXISTS `student_rating` (
  `grading_id` varchar(10) NOT NULL,
  `student_lrn` varchar(16) NOT NULL,
  `class_rec_no` varchar(10) NOT NULL,
  `grading_period` varchar(3) NOT NULL,
  `week_number` int(3) NOT NULL,
  `knowledge` double NOT NULL,
  `processskills` double NOT NULL,
  `understanding` double NOT NULL,
  `performanceproducts` double NOT NULL,
  `tentative_grade` double NOT NULL,
  `legend` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`grading_id`,`student_lrn`,`class_rec_no`),
  KEY `FK1_student_rating` (`student_lrn`),
  KEY `FK2_student_rating` (`legend`),
  KEY `FK3_student_rating` (`class_rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_rating`
--

INSERT INTO `student_rating` (`grading_id`, `student_lrn`, `class_rec_no`, `grading_period`, `week_number`, `knowledge`, `processskills`, `understanding`, `performanceproducts`, `tentative_grade`, `legend`) VALUES
('GR-1096665', 'MS1503081-720647', 'ECRN-84307', '2nd', 3, 66, 66, 77, 87, 75.6, 'D'),
('GR-1778855', 'MS1503081-720647', 'ECRN-84307', '1st', 1, 84, 85, 89, 88, 86.95, 'P'),
('GR-6438860', 'MS1503081-720647', 'ECRN-84307', '3rd', 5, 87, 84, 90, 62, 79.65, 'AP'),
('GR-7205413', 'MS1503081-720647', 'ECRN-84307', '4th', 8, 100, 100, 100, 100, 100, 'A'),
('GR-7463874', 'MS1503081-720647', 'ECRN-84307', '1st', 6, 94, 86, 93, 85, 89, 'P'),
('GR-8674436', 'MS1503081-720647', 'ECRN-84307', '1st', 2, 87, 87, 87, 87, 87, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `student_schedule_line`
--

CREATE TABLE IF NOT EXISTS `student_schedule_line` (
  `class_rec_no` varchar(10) NOT NULL,
  `student_lrn` varchar(16) NOT NULL,
  `grade` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`class_rec_no`,`student_lrn`),
  KEY `FK2_student_schedule_line` (`student_lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_schedule_line`
--

INSERT INTO `student_schedule_line` (`class_rec_no`, `student_lrn`, `grade`) VALUES
('ECRN-10247', 'MS1503081-720647', 'Grade 3'),
('ECRN-10247', 'MS1503084-650973', 'Grade 3'),
('ECRN-10247', 'MS1503088-840782', 'Grade 3'),
('ECRN-10247', 'MS1503123-521836', 'Grade 3'),
('ECRN-58351', 'MS1503084-650973', 'Grade 1'),
('ECRN-84307', 'MS1503081-720647', 'Grade 3');

-- --------------------------------------------------------

--
-- Table structure for table `subject_`
--

CREATE TABLE IF NOT EXISTS `subject_` (
  `subjectID` varchar(8) NOT NULL DEFAULT '',
  `subject_title` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_`
--

INSERT INTO `subject_` (`subjectID`, `subject_title`) VALUES
('EAS-1738', 'Mathematics'),
('EAS-2815', 'English'),
('EAS-7514', 'Mother Tongue'),
('EAS-9859', 'Science and Health');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherID` varchar(16) NOT NULL,
  `t_position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `t_position`) VALUES
('MT1503087-807554', 'Master Teacher'),
('MT1503125-347968', NULL),
('MT1503128-488020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedback_parent`
--

CREATE TABLE IF NOT EXISTS `teacher_feedback_parent` (
  `feedback_date_created` datetime NOT NULL,
  `feedback_message` longtext,
  PRIMARY KEY (`feedback_date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_feedback_parent`
--

INSERT INTO `teacher_feedback_parent` (`feedback_date_created`, `feedback_message`) VALUES
('2015-03-08 07:08:22', 'Hello Parents!'),
('2015-03-08 07:46:20', 'Hello Parents'),
('2015-03-08 18:24:02', 'hello'),
('2015-03-13 01:37:35', 'Hi Parents'),
('2015-03-13 02:05:02', 'Magaling po ang anak nyo po'),
('2015-03-13 02:06:56', 'Mahusay po ang anak nyo'),
('2015-03-13 02:07:12', 'Magaling po sya sa Math!'),
('2015-03-13 02:08:24', 'Private Message: Testing'),
('2015-03-13 02:08:35', 'Private Message: Testing'),
('2015-03-13 02:23:39', 'Private Message: Dear Parent'),
('2015-03-13 07:36:20', 'hey'),
('2015-03-13 08:46:53', 'Test Insert at Modal'),
('2015-03-13 08:47:54', 'Test Insert at Modal 2'),
('2015-03-13 08:48:31', 'Test insert modal 3'),
('2015-03-13 09:02:53', 'insert 4'),
('2015-03-13 09:06:13', 'insert5'),
('2015-03-13 09:08:17', 'Hey'),
('2015-03-13 09:10:30', 'Hey yhou');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedback_parent_comments`
--

CREATE TABLE IF NOT EXISTS `teacher_feedback_parent_comments` (
  `feedback_comment_date_created` datetime NOT NULL,
  `feedback_account_id` varchar(16) NOT NULL,
  `feedback_comment_message` longtext,
  `feedback_post_date_created` datetime NOT NULL,
  PRIMARY KEY (`feedback_comment_date_created`,`feedback_account_id`),
  KEY `FK1_teacher_feedback_parent_comments` (`feedback_post_date_created`),
  KEY `FK2_teacher_feedback_parent_comments` (`feedback_account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_feedback_parent_comments`
--

INSERT INTO `teacher_feedback_parent_comments` (`feedback_comment_date_created`, `feedback_account_id`, `feedback_comment_message`, `feedback_post_date_created`) VALUES
('2015-03-13 03:44:01', 'MP1503089-731527', 'comment', '2015-03-08 07:08:22'),
('2015-03-13 03:44:02', 'MP1503089-731527', 'comment', '2015-03-08 07:46:20'),
('2015-03-13 03:44:03', 'MP1503089-731527', 'comment', '2015-03-08 18:24:02'),
('2015-03-13 03:44:04', 'MP1503089-731527', 'comment', '2015-03-13 01:37:35'),
('2015-03-13 03:44:05', 'MP1503089-731527', 'comment', '2015-03-13 02:05:02'),
('2015-03-13 03:44:06', 'MP1503089-731527', 'comment', '2015-03-13 02:06:56'),
('2015-03-13 03:44:07', 'MP1503089-731527', 'comment', '2015-03-13 02:07:12'),
('2015-03-13 03:44:08', 'MP1503089-731527', 'comment', '2015-03-13 02:08:24'),
('2015-03-13 03:44:09', 'MP1503089-731527', 'comment', '2015-03-13 02:08:35'),
('2015-03-13 03:44:10', 'MP1503089-731527', 'comment', '2015-03-13 02:23:39'),
('2015-03-13 06:15:34', 'MP1503089-731527', 'fddf', '2015-03-13 01:37:35'),
('2015-03-13 06:15:52', 'MP1503089-731527', 'pumasok na?', '2015-03-13 01:37:35'),
('2015-03-13 06:18:40', 'MP1503089-731527', 'yeah', '2015-03-13 01:37:35'),
('2015-03-13 06:21:38', 'MP1503089-731527', 'nye', '2015-03-13 01:37:35'),
('2015-03-13 06:23:33', 'MP1503089-731527', 'nako', '2015-03-13 01:37:35'),
('2015-03-13 06:31:09', 'MP1503089-731527', 'oo', '2015-03-13 02:05:02'),
('2015-03-13 06:31:19', 'MP1503089-731527', 'ok na?', '2015-03-13 02:08:24'),
('2015-03-13 06:31:34', 'MP1503089-731527', 'gets?', '2015-03-08 07:08:22'),
('2015-03-13 06:32:44', 'MP1503089-731527', 'good', '2015-03-13 01:37:35'),
('2015-03-13 07:39:55', 'MP1503089-731527', 'hi po', '2015-03-13 07:36:20'),
('2015-03-13 07:40:04', 'MP1503089-731527', 'kumusta na po?', '2015-03-13 07:36:20'),
('2015-03-13 09:02:13', 'MT1503087-807554', 'insert it', '2015-03-13 08:48:31'),
('2015-03-13 09:02:25', 'MT1503087-807554', 'insert it 2', '2015-03-13 08:47:54'),
('2015-03-13 09:03:00', 'MT1503087-807554', 'gumagana ka ba?', '2015-03-13 09:02:53'),
('2015-03-13 09:04:27', 'MT1503087-807554', 'yes!', '2015-03-13 09:02:53'),
('2015-03-13 09:04:50', 'MT1503087-807554', 'comment', '2015-03-13 02:23:39'),
('2015-03-13 09:35:05', 'MT1503087-807554', 'nice working', '2015-03-13 09:10:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin` FOREIGN KEY (`admin_id`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `announcement_lecture_comments`
--
ALTER TABLE `announcement_lecture_comments`
  ADD CONSTRAINT `FK1_announcement_lecture_comments` FOREIGN KEY (`post_date_created`) REFERENCES `announcement_lecture` (`date_created`),
  ADD CONSTRAINT `FK2_announcement_lecture_comments` FOREIGN KEY (`account_id`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `create_account`
--
ALTER TABLE `create_account`
  ADD CONSTRAINT `FK_create_user` FOREIGN KEY (`account_id`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `FK_parent` FOREIGN KEY (`parentID`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `post_announcement_lecture`
--
ALTER TABLE `post_announcement_lecture`
  ADD CONSTRAINT `FK1_post_announcement_lecture` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  ADD CONSTRAINT `FK2_post_announcement_lecture` FOREIGN KEY (`date_created`) REFERENCES `announcement_lecture` (`date_created`);

--
-- Constraints for table `post_teacher_feedback_parent`
--
ALTER TABLE `post_teacher_feedback_parent`
  ADD CONSTRAINT `FK1_post_teacher_feedback_parent` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  ADD CONSTRAINT `FK2_post_teacher_feedback_parent` FOREIGN KEY (`feedback_date_created`) REFERENCES `teacher_feedback_parent` (`feedback_date_created`),
  ADD CONSTRAINT `FK3_post_teacher_feedback_parent` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_section2` FOREIGN KEY (`sectionID`) REFERENCES `section_list` (`sectionID`),
  ADD CONSTRAINT `FK_section3` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  ADD CONSTRAINT `FK_section4` FOREIGN KEY (`subjectID`) REFERENCES `subject_` (`subjectID`),
  ADD CONSTRAINT `FK_section5` FOREIGN KEY (`levelID`) REFERENCES `grade_level` (`levelID`),
  ADD CONSTRAINT `FK_section6` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`);

--
-- Constraints for table `section_list`
--
ALTER TABLE `section_list`
  ADD CONSTRAINT `FK_section_list` FOREIGN KEY (`level_id`) REFERENCES `grade_level` (`levelID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK1_student` FOREIGN KEY (`student_lrn`) REFERENCES `registration` (`reg_id`),
  ADD CONSTRAINT `FK2_student` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`);

--
-- Constraints for table `student_rating`
--
ALTER TABLE `student_rating`
  ADD CONSTRAINT `FK1_student_rating` FOREIGN KEY (`student_lrn`) REFERENCES `student` (`student_lrn`),
  ADD CONSTRAINT `FK2_student_rating` FOREIGN KEY (`legend`) REFERENCES `rating` (`legendID`),
  ADD CONSTRAINT `FK3_student_rating` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`);

--
-- Constraints for table `student_schedule_line`
--
ALTER TABLE `student_schedule_line`
  ADD CONSTRAINT `FK1_student_schedule_line` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  ADD CONSTRAINT `FK2_student_schedule_line` FOREIGN KEY (`student_lrn`) REFERENCES `student` (`student_lrn`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `FK_teacher` FOREIGN KEY (`teacherID`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `teacher_feedback_parent_comments`
--
ALTER TABLE `teacher_feedback_parent_comments`
  ADD CONSTRAINT `FK1_teacher_feedback_parent_comments` FOREIGN KEY (`feedback_post_date_created`) REFERENCES `teacher_feedback_parent` (`feedback_date_created`),
  ADD CONSTRAINT `FK2_teacher_feedback_parent_comments` FOREIGN KEY (`feedback_account_id`) REFERENCES `registration` (`reg_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
