-- MySQL dump 10.13  Distrib 5.6.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ospms
-- ------------------------------------------------------
-- Server version	5.6.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` varchar(16) NOT NULL,
  PRIMARY KEY (`admin_id`),
  CONSTRAINT `FK_admin` FOREIGN KEY (`admin_id`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('MA1411302-545985');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment` (
  `assessmentID` varchar(16) NOT NULL,
  `teacherID` varchar(16) DEFAULT NULL,
  `student_lrn` varchar(16) DEFAULT NULL,
  `ratingID` varchar(3) DEFAULT NULL,
  `parentID` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`assessmentID`),
  KEY `FK_assessment1` (`teacherID`),
  KEY `FK_assessment2` (`student_lrn`),
  KEY `FK_assessment3` (`ratingID`),
  KEY `FK_assessment4` (`parentID`),
  CONSTRAINT `FK_assessment1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  CONSTRAINT `FK_assessment2` FOREIGN KEY (`student_lrn`) REFERENCES `student` (`student_lrn`),
  CONSTRAINT `FK_assessment3` FOREIGN KEY (`ratingID`) REFERENCES `rating` (`rateID`),
  CONSTRAINT `FK_assessment4` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment`
--

LOCK TABLES `assessment` WRITE;
/*!40000 ALTER TABLE `assessment` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_account`
--

DROP TABLE IF EXISTS `create_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `create_account` (
  `username_` varchar(16) NOT NULL,
  `password_` varchar(16) NOT NULL,
  `secret_question` varchar(30) NOT NULL,
  `secret_answer` varchar(30) NOT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `account_id` varchar(16) NOT NULL,
  PRIMARY KEY (`username_`),
  KEY `FK_create_user` (`account_id`),
  CONSTRAINT `FK_create_user` FOREIGN KEY (`account_id`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_account`
--

LOCK TABLES `create_account` WRITE;
/*!40000 ALTER TABLE `create_account` DISABLE KEYS */;
INSERT INTO `create_account` VALUES ('admin','admin','admin','admin','admin','MA1411302-545985'),('parent','parent','parent','parent','parent','MP1411304-789451'),('student','student','student','student','student','MS1411301-657755'),('teacher','teacher','teacher','teacher','teacher','MT1411303-789121');
/*!40000 ALTER TABLE `create_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_ol_exercise`
--

DROP TABLE IF EXISTS `create_ol_exercise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `create_ol_exercise` (
  `exerciseID` int(11) NOT NULL AUTO_INCREMENT,
  `typeID` varchar(8) NOT NULL,
  `exerciseName` varchar(25) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`exerciseID`),
  KEY `FK_exerciseID` (`typeID`),
  CONSTRAINT `FK_exerciseID` FOREIGN KEY (`typeID`) REFERENCES `ol_exercise_type` (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_ol_exercise`
--

LOCK TABLES `create_ol_exercise` WRITE;
/*!40000 ALTER TABLE `create_ol_exercise` DISABLE KEYS */;
/*!40000 ALTER TABLE `create_ol_exercise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_questions`
--

DROP TABLE IF EXISTS `create_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `create_questions` (
  `questionNo` int(11) NOT NULL AUTO_INCREMENT,
  `exerciseID` int(11) DEFAULT NULL,
  `oe_question` varchar(255) NOT NULL,
  `oe_correct` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`questionNo`),
  KEY `FK_create_questions` (`exerciseID`),
  CONSTRAINT `FK_create_questions` FOREIGN KEY (`exerciseID`) REFERENCES `create_ol_exercise` (`exerciseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_questions`
--

LOCK TABLES `create_questions` WRITE;
/*!40000 ALTER TABLE `create_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `create_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_level`
--

DROP TABLE IF EXISTS `grade_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_level` (
  `levelID` varchar(5) NOT NULL,
  `level_description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`levelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_level`
--

LOCK TABLES `grade_level` WRITE;
/*!40000 ALTER TABLE `grade_level` DISABLE KEYS */;
INSERT INTO `grade_level` VALUES ('G0002','Grade2'),('G0003','Grade3');
/*!40000 ALTER TABLE `grade_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oe_choices`
--

DROP TABLE IF EXISTS `oe_choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oe_choices` (
  `questionNo` int(11) NOT NULL,
  `oe_choices` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`questionNo`,`oe_choices`),
  CONSTRAINT `FK_oe_choice` FOREIGN KEY (`questionNo`) REFERENCES `create_questions` (`questionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oe_choices`
--

LOCK TABLES `oe_choices` WRITE;
/*!40000 ALTER TABLE `oe_choices` DISABLE KEYS */;
/*!40000 ALTER TABLE `oe_choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ol_exercise_type`
--

DROP TABLE IF EXISTS `ol_exercise_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ol_exercise_type` (
  `typeID` varchar(8) NOT NULL,
  `type_desc` varchar(20) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ol_exercise_type`
--

LOCK TABLES `ol_exercise_type` WRITE;
/*!40000 ALTER TABLE `ol_exercise_type` DISABLE KEYS */;
INSERT INTO `ol_exercise_type` VALUES ('OETFILL','fill in the blanks'),('OETMAT','matching type'),('OETMUL','multiple choice'),('OETTOF','true or false');
/*!40000 ALTER TABLE `ol_exercise_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `parentID` varchar(16) NOT NULL,
  PRIMARY KEY (`parentID`),
  CONSTRAINT `FK_parent` FOREIGN KEY (`parentID`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES ('MP1411304-789451');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_lecture`
--

DROP TABLE IF EXISTS `post_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_lecture` (
  `teacherID` varchar(16) NOT NULL,
  `class_rec_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `file_caption` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  PRIMARY KEY (`teacherID`,`class_rec_no`,`date_created`),
  KEY `FK2_post_lecture` (`class_rec_no`),
  CONSTRAINT `FK1_post_lecture` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  CONSTRAINT `FK2_post_lecture` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_lecture`
--

LOCK TABLES `post_lecture` WRITE;
/*!40000 ALTER TABLE `post_lecture` DISABLE KEYS */;
INSERT INTO `post_lecture` VALUES ('MT1411303-789121','ECRN-79542','2014-12-07 23:07:00','Golf','model/uploaded_files/','preview.gif'),('MT1411303-789121','ECRN-79542','2014-12-07 23:07:38','Flash','model/uploaded_files/','miniGolf.swf'),('MT1411303-789121','ECRN-79542','2014-12-07 23:08:00','Build a Mini Golf','model/uploaded_files/','Build a Mini Golf Game with ActionScript 3.docx'),('MT1411303-789121','ECRN-79542','2014-12-07 23:08:21','Hit Test','model/uploaded_files/','hit test.pptx'),('MT1411303-789121','ECRN-79542','2014-12-07 23:08:53','Computer Ethics','model/uploaded_files/','Computer Ethics.pdf'),('MT1411303-789121','ECRN-79542','2014-12-07 23:09:51','K12','model/uploaded_files/','K12 Encoding Sheets .xlsx');
/*!40000 ALTER TABLE `post_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_ol_exer`
--

DROP TABLE IF EXISTS `post_ol_exer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_ol_exer` (
  `exerciseID` int(11) NOT NULL,
  PRIMARY KEY (`exerciseID`),
  CONSTRAINT `FK_post_oe` FOREIGN KEY (`exerciseID`) REFERENCES `create_ol_exercise` (`exerciseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_ol_exer`
--

LOCK TABLES `post_ol_exer` WRITE;
/*!40000 ALTER TABLE `post_ol_exer` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_ol_exer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `rateID` varchar(3) NOT NULL,
  `range_value` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`rateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `reg_id` varchar(16) NOT NULL DEFAULT '',
  `reg_lname` varchar(30) NOT NULL,
  `reg_fname` varchar(30) NOT NULL,
  `reg_mname` varchar(30) DEFAULT NULL,
  `reg_gender` varchar(6) DEFAULT NULL,
  `reg_status` varchar(10) DEFAULT NULL,
  `reg_birthday` date NOT NULL,
  `reg_address` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES ('MA1411302-545985','Arandia','Darryl','Eda','Male','single','1993-12-05',NULL),('MP1411304-789451','Arandia','Erised Faith','Mizaki','Female','married','1993-07-07',NULL),('MS1411301-657755','Arandia','Kenshin','Mizaki','Male','single','2009-07-07',NULL),('MS1412039-789777','Dalan','Justin','Caballo','Male','single','2004-11-20',NULL),('MS1412067-978989','Lazaro','Raphael John','Santos','Male','single','2005-04-09',NULL),('MS1412075-546651','Alcantara','Jerome','Luna','Male','single','2004-01-01',NULL),('MS1412078-784265','Eroma','Joaquin','Gargantiel','Male','single','2004-03-08',NULL),('MS1412081-655155','Cabanas','Ireal Jhun','Ocava','Male','single','2005-02-28',NULL),('MS1412092-878789','Calda','Jeremiah','Yuson','Male','single','2005-03-14',NULL),('MS1412147-897711','Delos Santos','John Mario','Bayrante','Male','single','2005-07-26',NULL),('MS1412236-798777','Casacop','Deniell Reye','Vitug','Male','single','2005-05-13',NULL),('MT1411303-789121','Arandia','Emilia Eliza','Eda','Female','married','1957-09-12',NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `roomNo` varchar(10) NOT NULL DEFAULT '',
  `building` varchar(30) DEFAULT NULL,
  `seat_capacity` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`roomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES ('322','Bunyi',NULL),('447','Bunyi',NULL),('654','JRF',NULL),('777','JRF',NULL),('879','Biazon',NULL),('888','JRF',NULL),('891','Biazon',NULL);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `class_rec_no` varchar(10) NOT NULL,
  `sectionNo` varchar(2) DEFAULT NULL,
  `section_name` varchar(20) DEFAULT NULL,
  `sched_days` varchar(7) DEFAULT NULL,
  `sched_start_time` time DEFAULT NULL,
  `sched_end_time` time DEFAULT NULL,
  `subjectID` varchar(8) DEFAULT NULL,
  `teacherID` varchar(16) DEFAULT NULL,
  `levelID` varchar(5) DEFAULT NULL,
  `roomNo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`class_rec_no`),
  KEY `PK_section1` (`sectionNo`,`section_name`),
  KEY `FK_section3` (`teacherID`),
  KEY `FK_section4` (`subjectID`),
  KEY `FK_section5` (`levelID`),
  KEY `FK_section6` (`roomNo`),
  CONSTRAINT `PK_section1` FOREIGN KEY (`sectionNo`, `section_name`) REFERENCES `section_list` (`sectionNo`, `section_name`),
  CONSTRAINT `FK_section3` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  CONSTRAINT `FK_section4` FOREIGN KEY (`subjectID`) REFERENCES `subject_` (`subjectID`),
  CONSTRAINT `FK_section5` FOREIGN KEY (`levelID`) REFERENCES `grade_level` (`levelID`),
  CONSTRAINT `FK_section6` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES ('ECRN-23165','3','Mabini','MTWThF','09:00:00','10:00:00','EAS-0003','MT1411303-789121','G0003','654'),('ECRN-54544','5','Gumamela','MTWThF','13:00:00','14:00:00','EAS-0005','MT1411303-789121','G0003','879'),('ECRN-54644','4','Sampaguita','MTWThF','10:00:00','11:00:00','EAS-0004','MT1411303-789121','G0003','777'),('ECRN-79542','1','Rizal','MTWThF','07:00:00','08:00:00','EAS-0001','MT1411303-789121','G0003','322'),('ECRN-89544','6','Santan','MTWThF','14:00:00','15:00:00','EAS-0006','MT1411303-789121','G0003','891'),('ECRN-89755','2','Bonifacio','MTWThF','08:00:00','09:00:00','EAS-0002','MT1411303-789121','G0003','447');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_list`
--

DROP TABLE IF EXISTS `section_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_list` (
  `sectionNo` varchar(2) NOT NULL DEFAULT '',
  `section_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`sectionNo`,`section_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_list`
--

LOCK TABLES `section_list` WRITE;
/*!40000 ALTER TABLE `section_list` DISABLE KEYS */;
INSERT INTO `section_list` VALUES ('1','Rizal'),('2','Bonifacio'),('3','Mabini'),('4','Sampaguita'),('5','Gumamela'),('6','Santan');
/*!40000 ALTER TABLE `section_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_lrn` varchar(16) NOT NULL DEFAULT '',
  `parentID` varchar(16) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_lrn`),
  KEY `FK2_student` (`parentID`),
  CONSTRAINT `FK1_student` FOREIGN KEY (`student_lrn`) REFERENCES `registration` (`reg_id`),
  CONSTRAINT `FK2_student` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('MP1411304-789451','MP1411304-789451',NULL),('MS1412039-789777','MP1411304-789451',NULL),('MS1412067-978989','MP1411304-789451',NULL),('MS1412075-546651','MP1411304-789451',NULL),('MS1412078-784265','MP1411304-789451',NULL),('MS1412081-655155','MP1411304-789451',NULL),('MS1412092-878789','MP1411304-789451',NULL),('MS1412147-897711','MP1411304-789451',NULL),('MS1412236-798777','MP1411304-789451',NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_schedule_line`
--

DROP TABLE IF EXISTS `student_schedule_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_schedule_line` (
  `class_rec_no` varchar(10) NOT NULL,
  `student_lrn` varchar(16) NOT NULL,
  `grade` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`class_rec_no`,`student_lrn`),
  KEY `FK2_student_schedule_line` (`student_lrn`),
  CONSTRAINT `FK1_student_schedule_line` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  CONSTRAINT `FK2_student_schedule_line` FOREIGN KEY (`student_lrn`) REFERENCES `student` (`student_lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_schedule_line`
--

LOCK TABLES `student_schedule_line` WRITE;
/*!40000 ALTER TABLE `student_schedule_line` DISABLE KEYS */;
INSERT INTO `student_schedule_line` VALUES ('ECRN-23165','MS1412067-978989',NULL),('ECRN-54544','MS1412078-784265',NULL),('ECRN-54644','MS1412075-546651',NULL),('ECRN-79542','MP1411304-789451',NULL),('ECRN-89544','MS1412081-655155',NULL),('ECRN-89755','MS1412039-789777',NULL);
/*!40000 ALTER TABLE `student_schedule_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_`
--

DROP TABLE IF EXISTS `subject_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_` (
  `subjectID` varchar(8) NOT NULL,
  `subject_title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_`
--

LOCK TABLES `subject_` WRITE;
/*!40000 ALTER TABLE `subject_` DISABLE KEYS */;
INSERT INTO `subject_` VALUES ('EAS-0001','Math'),('EAS-0002','English'),('EAS-0003','Science'),('EAS-0004','Hekasi'),('EAS-0005','PE'),('EAS-0006','GMRC');
/*!40000 ALTER TABLE `subject_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `teacherID` varchar(16) NOT NULL DEFAULT '',
  `t_position` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`teacherID`),
  CONSTRAINT `FK_teacher` FOREIGN KEY (`teacherID`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('MT1411303-789121','Teacher 3',NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `write_announcement`
--

DROP TABLE IF EXISTS `write_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `write_announcement` (
  `teacherID` varchar(16) NOT NULL,
  `class_rec_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`teacherID`,`class_rec_no`,`date_created`),
  KEY `Fk2_write_ann` (`class_rec_no`),
  CONSTRAINT `FK1_write_ann` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`),
  CONSTRAINT `Fk2_write_ann` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `write_announcement`
--

LOCK TABLES `write_announcement` WRITE;
/*!40000 ALTER TABLE `write_announcement` DISABLE KEYS */;
INSERT INTO `write_announcement` VALUES ('MT1411303-789121','ECRN-79542','2014-12-07 23:03:05','Please Review Tomorrow is your first quiz');
/*!40000 ALTER TABLE `write_announcement` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-07 23:10:49
