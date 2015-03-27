-- MySQL dump 10.13  Distrib 5.6.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ospms
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `announcement_lecture`
--

DROP TABLE IF EXISTS `announcement_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement_lecture` (
  `date_created` datetime NOT NULL,
  `messageorfile_caption` longtext,
  `file_path` varchar(200) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement_lecture`
--

LOCK TABLES `announcement_lecture` WRITE;
/*!40000 ALTER TABLE `announcement_lecture` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcement_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement_lecture_comments`
--

DROP TABLE IF EXISTS `announcement_lecture_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement_lecture_comments` (
  `comment_date_created` datetime NOT NULL,
  `account_id` varchar(16) NOT NULL,
  `comment_message` longtext,
  `post_date_created` datetime NOT NULL,
  PRIMARY KEY (`comment_date_created`,`account_id`),
  KEY `FK1_announcement_lecture_comments` (`post_date_created`),
  KEY `FK2_announcement_lecture_comments` (`account_id`),
  CONSTRAINT `FK1_announcement_lecture_comments` FOREIGN KEY (`post_date_created`) REFERENCES `announcement_lecture` (`date_created`),
  CONSTRAINT `FK2_announcement_lecture_comments` FOREIGN KEY (`account_id`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement_lecture_comments`
--

LOCK TABLES `announcement_lecture_comments` WRITE;
/*!40000 ALTER TABLE `announcement_lecture_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcement_lecture_comments` ENABLE KEYS */;
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
  `secret_question` varchar(30) DEFAULT NULL,
  `secret_answer` varchar(30) DEFAULT NULL,
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
INSERT INTO `create_account` VALUES ('admin ','admin','',NULL,'admin','MA1411302-545985'),('parent1','parent1',NULL,NULL,'parent','MP1411302-855215'),('parent2','parent2',NULL,NULL,'parent','MP1411302-855165'),('student1','student1',NULL,NULL,'student','MS1411302-876551'),('student2','student2',NULL,NULL,'student','MS1411302-858415'),('student3','student3',NULL,NULL,'student','MS1411302-855151'),('student4','student4',NULL,NULL,'student','MS1411302-851212'),('teacher1','teacher1',NULL,NULL,'teacher','MT1411302-897964'),('teacher2','teacher2',NULL,NULL,'teacher','MT1411302-879455');
/*!40000 ALTER TABLE `create_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curr_section_list`
--

DROP TABLE IF EXISTS `curr_section_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curr_section_list` (
  `section_name` varchar(20) DEFAULT NULL,
  `grade_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curr_section_list`
--

LOCK TABLES `curr_section_list` WRITE;
/*!40000 ALTER TABLE `curr_section_list` DISABLE KEYS */;
INSERT INTO `curr_section_list` VALUES ('Sampaguita','Grade 1'),('Waling-Waling','Grade 1'),('Gumamela','Grade 1'),('Rosal','Grade 1'),('Santan','Grade 1'),('Kalachuchi','Grade 1'),('Bougainvillea','Grade 1'),('Kamias','Grade 1'),('Hasmin','Grade 1'),('Tsitsirika','Grade 1'),('Cariñosa','Grade 2'),('Singkil','Grade 2'),('Polkabal','Grade 2'),('Habanera','Grade 2'),('Maglalatik','Grade 2'),('Pandanggo','Grade 2'),('Tinikling','Grade 2'),('Kuratsa','Grade 2'),('Pantomina','Grade 2'),('Rizal','Grade 3'),('Bonifacio','Grade 3'),('Del Pilar','Grade 3'),('Aguinaldo','Grade 3'),('Mabini','Grade 3'),('Jacinto','Grade 3'),('Luna','Grade 3'),('Silang','Grade 3');
/*!40000 ALTER TABLE `curr_section_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curr_subject_list`
--

DROP TABLE IF EXISTS `curr_subject_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curr_subject_list` (
  `subject_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curr_subject_list`
--

LOCK TABLES `curr_subject_list` WRITE;
/*!40000 ALTER TABLE `curr_subject_list` DISABLE KEYS */;
INSERT INTO `curr_subject_list` VALUES ('Mother Tongue'),('Filipino'),('English'),('Mathematics'),('Science and Health'),('Araling Panlipunan'),('MAPEH'),('Edukasyon sa Pagpapakatao');
/*!40000 ALTER TABLE `curr_subject_list` ENABLE KEYS */;
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
INSERT INTO `grade_level` VALUES ('G1217','Grade 1'),('G1461','Grade 2'),('G2024','Grade 3');
/*!40000 ALTER TABLE `grade_level` ENABLE KEYS */;
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
INSERT INTO `parent` VALUES ('MP1411302-855165'),('MP1411302-855215');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_announcement_lecture`
--

DROP TABLE IF EXISTS `post_announcement_lecture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_announcement_lecture` (
  `class_rec_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`class_rec_no`,`date_created`),
  KEY `FK2_post_announcement_lecture` (`date_created`),
  CONSTRAINT `FK1_post_announcement_lecture` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  CONSTRAINT `FK2_post_announcement_lecture` FOREIGN KEY (`date_created`) REFERENCES `announcement_lecture` (`date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_announcement_lecture`
--

LOCK TABLES `post_announcement_lecture` WRITE;
/*!40000 ALTER TABLE `post_announcement_lecture` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_announcement_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_teacher_feedback_parent`
--

DROP TABLE IF EXISTS `post_teacher_feedback_parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_teacher_feedback_parent` (
  `class_rec_no` varchar(10) NOT NULL,
  `feedback_date_created` datetime NOT NULL,
  `parentID` varchar(16) NOT NULL,
  PRIMARY KEY (`class_rec_no`,`feedback_date_created`,`parentID`),
  KEY `FK2_post_teacher_feedback_parent` (`feedback_date_created`),
  KEY `FK3_post_teacher_feedback_parent` (`parentID`),
  CONSTRAINT `FK1_post_teacher_feedback_parent` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  CONSTRAINT `FK2_post_teacher_feedback_parent` FOREIGN KEY (`feedback_date_created`) REFERENCES `teacher_feedback_parent` (`feedback_date_created`),
  CONSTRAINT `FK3_post_teacher_feedback_parent` FOREIGN KEY (`parentID`) REFERENCES `parent` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_teacher_feedback_parent`
--

LOCK TABLES `post_teacher_feedback_parent` WRITE;
/*!40000 ALTER TABLE `post_teacher_feedback_parent` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_teacher_feedback_parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `legendID` varchar(2) NOT NULL,
  `description` varchar(25) DEFAULT NULL,
  `equivalent` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`legendID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` VALUES ('A','Advanced','90% and above'),('AP','Approaching Proficiency','80-84%'),('B','Beginning','74% and below'),('D','Developing','75-79%'),('P','Proficient','85-89%');
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES ('MA1411302-545985','admin','admin','admin','male','single','1993-12-05',NULL,'avatar.png'),('MP1411302-855165','parent2','parent2','parent2','female',NULL,'1981-12-15',NULL,'parent2.jpg'),('MP1411302-855215','parent1','parent1','parent1','female',NULL,'1981-12-15',NULL,'parent1.jpg'),('MS1411302-851212','student4','student4','student4','male',NULL,'2007-12-05',NULL,'student4.jpg'),('MS1411302-855151','student3','student3','student3','male',NULL,'2007-12-05',NULL,'student3.jpg'),('MS1411302-858415','student2','student2','student2','male',NULL,'2007-12-05',NULL,'student2.jpg'),('MS1411302-876551','student1','student1','student1','male',NULL,'2007-12-05',NULL,'student1.jpg'),('MT1411302-879455','teacher2','teacher2','teacher2','female',NULL,'1981-12-15',NULL,'teacher2.jpg'),('MT1411302-897964','teacher1','teacher1','teacher1','female',NULL,'1981-12-05',NULL,'teacher1.jpg');
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
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_announcement`
--

DROP TABLE IF EXISTS `school_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_announcement` (
  `sa_date_created` datetime NOT NULL,
  `sa_message` longtext,
  `sa_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`sa_date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_announcement`
--

LOCK TABLES `school_announcement` WRITE;
/*!40000 ALTER TABLE `school_announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
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
  KEY `FK_section6` (`roomNo`),
  CONSTRAINT `FK_section2` FOREIGN KEY (`sectionID`) REFERENCES `section_list` (`sectionID`),
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
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section_list`
--

DROP TABLE IF EXISTS `section_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_list` (
  `sectionID` varchar(6) NOT NULL DEFAULT '',
  `sectionNo` varchar(2) DEFAULT NULL,
  `section_name` varchar(20) DEFAULT NULL,
  `level_id` varchar(5) NOT NULL,
  PRIMARY KEY (`sectionID`),
  KEY `FK_section_list` (`level_id`),
  CONSTRAINT `FK_section_list` FOREIGN KEY (`level_id`) REFERENCES `grade_level` (`levelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_list`
--

LOCK TABLES `section_list` WRITE;
/*!40000 ALTER TABLE `section_list` DISABLE KEYS */;
INSERT INTO `section_list` VALUES ('S14166','2','Bonifacio','G2024'),('S25075','1','Cariñosa','G1461'),('S63172','1','Sampaguita','G1217'),('S74289','2','Hasmin','G1217'),('S90073','3','Mabini','G2024'),('S95866','1','Rizal','G2024');
/*!40000 ALTER TABLE `section_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_lrn` varchar(16) NOT NULL,
  `parentID` varchar(16) DEFAULT NULL,
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
INSERT INTO `student` VALUES ('MS1411302-858415','MP1411302-855165'),('MS1411302-876551','MP1411302-855165'),('MS1411302-851212','MP1411302-855215'),('MS1411302-855151','MP1411302-855215');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_rating`
--

DROP TABLE IF EXISTS `student_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_rating` (
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
  KEY `FK3_student_rating` (`class_rec_no`),
  CONSTRAINT `FK1_student_rating` FOREIGN KEY (`student_lrn`) REFERENCES `student` (`student_lrn`),
  CONSTRAINT `FK2_student_rating` FOREIGN KEY (`legend`) REFERENCES `rating` (`legendID`),
  CONSTRAINT `FK3_student_rating` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_rating`
--

LOCK TABLES `student_rating` WRITE;
/*!40000 ALTER TABLE `student_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_rating` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `student_schedule_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_`
--

DROP TABLE IF EXISTS `subject_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_` (
  `subjectID` varchar(8) NOT NULL DEFAULT '',
  `subject_title` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_`
--

LOCK TABLES `subject_` WRITE;
/*!40000 ALTER TABLE `subject_` DISABLE KEYS */;
INSERT INTO `subject_` VALUES ('EAS-1738','Mathematics'),('EAS-2815','English'),('EAS-7514','Mother Tongue'),('EAS-9859','Science and Health');
/*!40000 ALTER TABLE `subject_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `teacherID` varchar(16) NOT NULL,
  `t_position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teacherID`),
  CONSTRAINT `FK_teacher` FOREIGN KEY (`teacherID`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('MT1411302-879455',NULL),('MT1411302-897964',NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_feedback_parent`
--

DROP TABLE IF EXISTS `teacher_feedback_parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_feedback_parent` (
  `feedback_date_created` datetime NOT NULL,
  `feedback_message` longtext,
  PRIMARY KEY (`feedback_date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_feedback_parent`
--

LOCK TABLES `teacher_feedback_parent` WRITE;
/*!40000 ALTER TABLE `teacher_feedback_parent` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher_feedback_parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_feedback_parent_comments`
--

DROP TABLE IF EXISTS `teacher_feedback_parent_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_feedback_parent_comments` (
  `feedback_comment_date_created` datetime NOT NULL,
  `feedback_account_id` varchar(16) NOT NULL,
  `feedback_comment_message` longtext,
  `feedback_post_date_created` datetime NOT NULL,
  PRIMARY KEY (`feedback_comment_date_created`,`feedback_account_id`),
  KEY `FK1_teacher_feedback_parent_comments` (`feedback_post_date_created`),
  KEY `FK2_teacher_feedback_parent_comments` (`feedback_account_id`),
  CONSTRAINT `FK1_teacher_feedback_parent_comments` FOREIGN KEY (`feedback_post_date_created`) REFERENCES `teacher_feedback_parent` (`feedback_date_created`),
  CONSTRAINT `FK2_teacher_feedback_parent_comments` FOREIGN KEY (`feedback_account_id`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_feedback_parent_comments`
--

LOCK TABLES `teacher_feedback_parent_comments` WRITE;
/*!40000 ALTER TABLE `teacher_feedback_parent_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher_feedback_parent_comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-27 19:45:27
