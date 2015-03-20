-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2015 at 06:27 PM
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
('MA1411302-545985');

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
('admin ', 'admin', '', NULL, 'admin', 'MA1411302-545985'),
('parent1', 'parent1', NULL, NULL, 'parent', 'MP1411302-855215'),
('parent2', 'parent2', NULL, NULL, 'parent', 'MP1411302-855165'),
('student1', 'student1', NULL, NULL, 'student', 'MS1411302-876551'),
('student2', 'student2', NULL, NULL, 'student', 'MS1411302-858415'),
('student3', 'student3', NULL, NULL, 'student', 'MS1411302-855151'),
('student4', 'student4', NULL, NULL, 'student', 'MS1411302-851212'),
('teacher1', 'teacher1', NULL, NULL, 'teacher', 'MT1411302-897964'),
('teacher2', 'teacher2', NULL, NULL, 'teacher', 'MT1411302-879455');

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
('MP1411302-855165'),
('MP1411302-855215');

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
('MA1411302-545985', 'admin', 'admin', 'admin', 'male', 'single', '1993-12-05', NULL, 'avatar.png'),
('MP1411302-855165', 'parent2', 'parent2', 'parent2', 'female', NULL, '1981-12-15', NULL, 'parent2.jpg'),
('MP1411302-855215', 'parent1', 'parent1', 'parent1', 'female', NULL, '1981-12-15', NULL, 'parent1.jpg'),
('MS1411302-851212', 'student4', 'student4', 'student4', 'male', NULL, '2007-12-05', NULL, 'student4.jpg'),
('MS1411302-855151', 'student3', 'student3', 'student3', 'male', NULL, '2007-12-05', NULL, 'student3.jpg'),
('MS1411302-858415', 'student2', 'student2', 'student2', 'male', NULL, '2007-12-05', NULL, 'student2.jpg'),
('MS1411302-876551', 'student1', 'student1', 'student1', 'male', NULL, '2007-12-05', NULL, 'student1.jpg'),
('MT1411302-879455', 'teacher2', 'teacher2', 'teacher2', 'female', NULL, '1981-12-15', NULL, 'teacher2.jpg'),
('MT1411302-897964', 'teacher1', 'teacher1', 'teacher1', 'female', NULL, '1981-12-05', NULL, 'teacher1.jpg');

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
-- Table structure for table `school_announcement`
--

CREATE TABLE IF NOT EXISTS `school_announcement` (
  `sa_date_created` datetime NOT NULL,
  `sa_message` longtext,
  `sa_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`sa_date_created`)
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
('MS1411302-858415', 'MP1411302-855165'),
('MS1411302-876551', 'MP1411302-855165'),
('MS1411302-851212', 'MP1411302-855215'),
('MS1411302-855151', 'MP1411302-855215');

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
('MT1411302-879455', NULL),
('MT1411302-897964', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedback_parent`
--

CREATE TABLE IF NOT EXISTS `teacher_feedback_parent` (
  `feedback_date_created` datetime NOT NULL,
  `feedback_message` longtext,
  PRIMARY KEY (`feedback_date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
