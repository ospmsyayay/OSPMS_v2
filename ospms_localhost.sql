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
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
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
INSERT INTO `announcement_lecture` VALUES ('2014-12-25 10:09:05','Testing',NULL,NULL),('2014-12-25 10:10:05','Hello sa inyong lahat! haha',NULL,NULL),('2014-12-26 08:22:05','Build a Mini Golf','model/uploaded_files/','Build a Mini Golf Game with ActionScript 3.docx'),('2014-12-26 08:23:05','Computer Ethics','model/uploaded_files/','Computer Ethics.pdf'),('2014-12-26 08:24:05','hit test','model/uploaded_files/','hit test.pptx'),('2014-12-26 08:25:05','K12','model/uploaded_files/','K12 Encoding Sheets .xlsx'),('2014-12-26 08:26:06','mini golf','model/uploaded_files/','miniGolf.swf'),('2014-12-26 08:27:07','preview','model/uploaded_files/','preview.gif'),('2014-12-28 11:22:00','buchi','model/uploaded_files/','Buchi Recipe.docx'),('2014-12-28 11:24:00','filipino cookbook','model/uploaded_files/','The Filipino Cookbook - Miki Garcia.pdf'),('2014-12-28 11:25:00','japanese cuisine','model/uploaded_files/','Cooking_The_Japanese_Way.pdf'),('2014-12-28 11:26:00','japanese cooking','model/uploaded_files/','Japanese_Cooking_-_Schinner__Miyoko_Nishimoto.pdf');
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
INSERT INTO `announcement_lecture_comments` VALUES ('2015-03-03 19:55:08','MS1411301-657755','Hi mam','2014-12-25 10:10:05'),('2015-03-03 19:55:25','MT1411303-789121','Bakit?','2014-12-25 10:10:05'),('2015-03-03 19:55:43','MS1411301-657755','Ewan ko po','2014-12-25 10:10:05'),('2015-03-03 19:55:59','MT1411303-789121','May toyo ka ba?','2014-12-25 10:10:05'),('2015-03-03 19:56:55','MS1411301-657755','nice japanese cooking','2014-12-28 11:26:00'),('2015-03-03 19:57:15','MT1411303-789121','haha :)','2014-12-28 11:26:00'),('2015-03-03 19:57:51','MT1411303-789121','you can download it','2014-12-28 11:26:00'),('2015-03-03 19:58:26','MS1411301-657755','we?','2014-12-28 11:26:00'),('2015-03-03 19:58:33','MS1411301-657755','we?','2014-12-28 11:26:00'),('2015-03-03 19:59:31','MT1411303-789121','yes dear!','2014-12-28 11:26:00'),('2015-03-03 19:59:40','MS1411301-657755','di nga mam?','2014-12-28 11:26:00'),('2015-03-04 04:51:05','MS1411301-657755','kaya pa ba mam?','2014-12-25 10:10:05'),('2015-03-04 11:46:06','MT1411303-789121','hay nako','2014-12-28 11:26:00'),('2015-03-06 13:52:21','MT1411303-789121','hello','2014-12-25 10:10:05'),('2015-03-06 14:15:46','MT1411303-789121','galing','2014-12-26 08:27:07');
/*!40000 ALTER TABLE `announcement_lecture_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `create_account`
--

DROP TABLE IF EXISTS `create_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `create_account` (
  `username_` varchar(16) NOT NULL DEFAULT '',
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
INSERT INTO `create_account` VALUES ('admin','admin','superhero','superman','admin','MA1411302-545985'),('MSACB06563','zRSW3TfL',NULL,NULL,'student','MS1502259-206563'),('MSADA46187','gADmMdgR',NULL,NULL,'student','MS1502255-346187'),('MSAMA86105','KrYild8g',NULL,NULL,'student','MS1502251-386105'),('MSCRC73403','IC7MtuB1',NULL,NULL,'student','MS1502258-573403'),('MSDAA77623','sF97eV87',NULL,NULL,'student','MS1502250-977623'),('MSDAA87504','kzEwV2h6',NULL,NULL,'student','MS1503066-287504'),('MSDAO39236','MEtSMLYB',NULL,NULL,'student','MS1502251-339236'),('MSDB48849','Zp935VIT',NULL,NULL,'student','MS1502253-948849'),('MSEGA71967','mAFffqok',NULL,NULL,'student','MS1502257-171967'),('MSJCB94040','zbSb23Ba',NULL,NULL,'student','MS1502251-394040'),('MSMCH95629','FUGWensT',NULL,NULL,'student','MS1502259-295629'),('MSMHI34465','NE2Xn3ll',NULL,NULL,'student','MS1502258-234465'),('MSMPB09495','laQkfUbs',NULL,NULL,'student','MS1502257-309495'),('MSMTY72462','AXQdTPxW',NULL,NULL,'student','MS1502258-872462'),('MSPVL99805','HJCr2txG',NULL,NULL,'student','MS1502259-599805'),('MSRBH10172','xnk0poGv',NULL,NULL,'student','MS1502253-210172'),('MSRCB74200','DcQl2xAp',NULL,NULL,'student','MS1502253-574200'),('MSREN14549','3oiGjJKX',NULL,NULL,'student','MS1502258-114549'),('MSRPD61241','xU3rQMnU',NULL,NULL,'student','MS1502259-561241'),('MSSAL18332','9tBNEV8z',NULL,NULL,'student','MS1502255-718332'),('MSTSC58859','RjlWpNNM',NULL,NULL,'student','MS1502252-658859'),('MSVCA95211','HgT3xkG0',NULL,NULL,'student','MS1502255-695211'),('parent','parent','parent','parent','parent','MP1411304-789451'),('student','student','student','student','student','MS1411301-657755'),('teacher','teacher','teacher','teacher','teacher','MT1411303-789121');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_ol_exercise`
--

LOCK TABLES `create_ol_exercise` WRITE;
/*!40000 ALTER TABLE `create_ol_exercise` DISABLE KEYS */;
INSERT INTO `create_ol_exercise` VALUES (1,'OETMUL','Sample Multiple Choice','2014-12-31 02:19:35'),(2,'OETMUL','Sample 2','2014-01-02 05:15:00'),(3,'OETMUL','Sample3','2014-01-02 05:22:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `create_questions`
--

LOCK TABLES `create_questions` WRITE;
/*!40000 ALTER TABLE `create_questions` DISABLE KEYS */;
INSERT INTO `create_questions` VALUES (3,1,'gasd','a','2014-12-31 02:19:32'),(4,1,'who','me','2015-01-02 10:37:05'),(5,2,'yuuu','ko','2014-01-02 05:18:00'),(6,3,'ok','ok','2014-01-02 05:23:00');
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
INSERT INTO `grade_level` VALUES ('G0002','Grade 2'),('G0003','Grade 3'),('G0005','Grade 5'),('G0006','Grade 6'),('G2990','Grade 1'),('G3630','Grade 4');
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
INSERT INTO `oe_choices` VALUES (3,'a','2014-12-31 02:19:32'),(3,'b','2014-12-31 02:19:32'),(3,'c','2014-12-31 02:19:32'),(3,'d','2014-12-31 02:19:32'),(4,'he','2015-01-02 10:37:05'),(4,'i','2015-01-02 10:37:05'),(4,'me','2015-01-02 10:37:05'),(4,'you','2015-01-02 10:37:05'),(5,'ki','2014-01-02 05:18:00'),(5,'ko','2014-01-02 05:18:00'),(5,'lo','2014-01-02 05:18:00'),(5,'op','2014-01-02 05:18:00'),(6,'ko','2014-01-02 05:23:00'),(6,'l','2014-01-02 05:23:00'),(6,'ok','2014-01-02 05:23:00'),(6,'ty','2014-01-02 05:23:00');
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
INSERT INTO `parent` VALUES ('MP1411304-789451'),('MP1501254-192288'),('MP1501259-365224'),('MP1501273-874947'),('MP1501305-323805'),('MP1501308-923519'),('MP1502019-296839'),('MP1502230-189237'),('MP1502230-752062'),('MP1502231-303643'),('MP1502231-320615'),('MP1502231-431435'),('MP1502231-452446'),('MP1502231-541011'),('MP1502231-979489'),('MP1502232-785418'),('MP1502232-960175'),('MP1502233-211637'),('MP1502233-533934'),('MP1502233-558498'),('MP1502233-896359'),('MP1502234-179014'),('MP1502234-703719'),('MP1502234-953658'),('MP1502235-653325'),('MP1502235-856695'),('MP1502236-433711'),('MP1502236-778182'),('MP1502236-862390'),('MP1502236-997391'),('MP1502237-267144'),('MP1502237-789565'),('MP1502238-295907'),('MP1502238-479044'),('MP1502238-737134'),('MP1502239-206009'),('MP1502239-315561'),('MP1502239-334423'),('MP1502239-443066'),('MP1502239-699377'),('MP1502239-946637'),('MP1502250-302676'),('MP1502250-867740'),('MP1502251-101788'),('MP1502251-196372'),('MP1502252-606465'),('MP1502253-273221'),('MP1502253-490493'),('MP1502253-556400'),('MP1502254-401330'),('MP1502254-517914'),('MP1502255-742564'),('MP1502256-300894'),('MP1502256-406771'),('MP1502256-676776'),('MP1502256-845763'),('MP1502256-885183'),('MP1502257-298650'),('MP1502257-529547'),('MP1502258-199291'),('MP1502258-791025');
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
INSERT INTO `post_announcement_lecture` VALUES ('ECRN-79542','2014-12-25 10:09:05'),('ECRN-91165','2014-12-25 10:10:05'),('ECRN-79542','2014-12-26 08:22:05'),('ECRN-89847','2014-12-26 08:22:05'),('ECRN-79542','2014-12-26 08:23:05'),('ECRN-89847','2014-12-26 08:23:05'),('ECRN-79542','2014-12-26 08:24:05'),('ECRN-89847','2014-12-26 08:24:05'),('ECRN-79542','2014-12-26 08:26:06'),('ECRN-89847','2014-12-26 08:26:06'),('ECRN-79542','2014-12-26 08:27:07'),('ECRN-89847','2014-12-26 08:27:07'),('ECRN-89462','2014-12-28 11:22:00'),('ECRN-89462','2014-12-28 11:24:00'),('ECRN-89462','2014-12-28 11:25:00'),('ECRN-89462','2014-12-28 11:26:00');
/*!40000 ALTER TABLE `post_announcement_lecture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_ol_exer`
--

DROP TABLE IF EXISTS `post_ol_exer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_ol_exer` (
  `class_rec_no` varchar(10) NOT NULL,
  `exerciseID` int(11) NOT NULL,
  PRIMARY KEY (`class_rec_no`,`exerciseID`),
  KEY `FK1_post_oe` (`exerciseID`),
  CONSTRAINT `FK1_post_oe` FOREIGN KEY (`exerciseID`) REFERENCES `create_ol_exercise` (`exerciseID`),
  CONSTRAINT `FK2_post_oe` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_ol_exer`
--

LOCK TABLES `post_ol_exer` WRITE;
/*!40000 ALTER TABLE `post_ol_exer` DISABLE KEYS */;
INSERT INTO `post_ol_exer` VALUES ('ECRN-89462',1),('ECRN-89847',2),('ECRN-91165',3);
/*!40000 ALTER TABLE `post_ol_exer` ENABLE KEYS */;
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
INSERT INTO `post_teacher_feedback_parent` VALUES ('ECRN-91165','2015-03-05 07:10:35','MP1411304-789451'),('ECRN-91165','2015-03-05 07:10:35','MP1502231-320615'),('ECRN-91165','2015-03-05 07:10:35','MP1502234-179014'),('ECRN-91165','2015-03-05 07:10:35','MP1502237-267144'),('ECRN-91165','2015-03-05 07:10:35','MP1502237-789565'),('ECRN-91165','2015-03-05 07:10:35','MP1502238-295907'),('ECRN-91165','2015-03-05 07:10:35','MP1502239-315561'),('ECRN-91165','2015-03-05 07:10:35','MP1502239-946637'),('ECRN-91165','2015-03-05 07:29:39','MP1411304-789451'),('ECRN-91165','2015-03-05 07:29:39','MP1502231-320615'),('ECRN-91165','2015-03-05 07:29:39','MP1502234-179014'),('ECRN-91165','2015-03-05 07:29:39','MP1502237-267144'),('ECRN-91165','2015-03-05 07:29:39','MP1502237-789565'),('ECRN-91165','2015-03-05 07:29:39','MP1502238-295907'),('ECRN-91165','2015-03-05 07:29:39','MP1502239-315561'),('ECRN-91165','2015-03-05 07:29:39','MP1502239-946637'),('ECRN-91165','2015-03-05 10:37:29','MP1411304-789451'),('ECRN-91165','2015-03-05 10:37:29','MP1502231-320615'),('ECRN-91165','2015-03-05 10:37:29','MP1502234-179014'),('ECRN-91165','2015-03-05 10:37:29','MP1502237-267144'),('ECRN-91165','2015-03-05 10:37:29','MP1502237-789565'),('ECRN-91165','2015-03-05 10:37:29','MP1502238-295907'),('ECRN-91165','2015-03-05 10:37:29','MP1502239-315561'),('ECRN-91165','2015-03-05 10:37:29','MP1502239-946637'),('ECRN-91165','2015-03-05 11:38:31','MP1411304-789451'),('ECRN-91165','2015-03-05 11:38:31','MP1502231-320615'),('ECRN-91165','2015-03-05 11:38:31','MP1502234-179014'),('ECRN-91165','2015-03-05 11:38:31','MP1502237-267144'),('ECRN-91165','2015-03-05 11:38:31','MP1502237-789565'),('ECRN-91165','2015-03-05 11:38:31','MP1502238-295907'),('ECRN-91165','2015-03-05 11:38:31','MP1502239-315561'),('ECRN-91165','2015-03-05 11:38:31','MP1502239-946637'),('ECRN-79542','2015-03-05 11:39:00','MP1411304-789451'),('ECRN-79542','2015-03-05 11:39:00','MP1502230-189237'),('ECRN-79542','2015-03-05 11:39:00','MP1502230-752062'),('ECRN-79542','2015-03-05 11:39:00','MP1502231-452446'),('ECRN-79542','2015-03-05 11:39:00','MP1502231-541011'),('ECRN-79542','2015-03-05 11:39:00','MP1502231-979489'),('ECRN-79542','2015-03-05 11:39:00','MP1502232-785418'),('ECRN-79542','2015-03-05 11:39:00','MP1502233-558498'),('ECRN-79542','2015-03-05 11:39:00','MP1502234-953658'),('ECRN-79542','2015-03-05 11:39:00','MP1502235-653325'),('ECRN-79542','2015-03-05 11:39:00','MP1502235-856695'),('ECRN-79542','2015-03-05 11:39:00','MP1502236-433711'),('ECRN-79542','2015-03-05 11:39:00','MP1502236-778182'),('ECRN-79542','2015-03-05 11:39:00','MP1502236-862390'),('ECRN-79542','2015-03-05 11:39:00','MP1502236-997391'),('ECRN-79542','2015-03-05 11:39:00','MP1502238-479044'),('ECRN-79542','2015-03-05 11:39:00','MP1502238-737134'),('ECRN-79542','2015-03-05 11:39:00','MP1502239-334423'),('ECRN-79542','2015-03-05 11:39:00','MP1502239-443066'),('ECRN-79542','2015-03-05 11:46:48','MP1411304-789451'),('ECRN-79542','2015-03-05 11:46:48','MP1502230-189237'),('ECRN-79542','2015-03-05 11:46:48','MP1502230-752062'),('ECRN-79542','2015-03-05 11:46:48','MP1502231-452446'),('ECRN-79542','2015-03-05 11:46:48','MP1502231-541011'),('ECRN-79542','2015-03-05 11:46:48','MP1502231-979489'),('ECRN-79542','2015-03-05 11:46:48','MP1502232-785418'),('ECRN-79542','2015-03-05 11:46:48','MP1502233-558498'),('ECRN-79542','2015-03-05 11:46:48','MP1502234-953658'),('ECRN-79542','2015-03-05 11:46:48','MP1502235-653325'),('ECRN-79542','2015-03-05 11:46:48','MP1502235-856695'),('ECRN-79542','2015-03-05 11:46:48','MP1502236-433711'),('ECRN-79542','2015-03-05 11:46:48','MP1502236-778182'),('ECRN-79542','2015-03-05 11:46:48','MP1502236-862390'),('ECRN-79542','2015-03-05 11:46:48','MP1502236-997391'),('ECRN-79542','2015-03-05 11:46:48','MP1502238-479044'),('ECRN-79542','2015-03-05 11:46:48','MP1502238-737134'),('ECRN-79542','2015-03-05 11:46:48','MP1502239-334423'),('ECRN-79542','2015-03-05 11:46:48','MP1502239-443066'),('ECRN-89462','2015-03-05 11:47:04','MP1411304-789451'),('ECRN-89462','2015-03-05 11:47:04','MP1502231-303643'),('ECRN-89462','2015-03-05 11:47:04','MP1502231-431435'),('ECRN-89462','2015-03-05 11:47:04','MP1502232-960175'),('ECRN-89462','2015-03-05 11:47:04','MP1502233-211637'),('ECRN-89462','2015-03-05 11:47:04','MP1502233-533934'),('ECRN-89462','2015-03-05 11:47:04','MP1502234-703719'),('ECRN-89462','2015-03-05 11:47:04','MP1502239-206009'),('ECRN-89462','2015-03-05 11:47:15','MP1411304-789451'),('ECRN-89462','2015-03-05 11:47:15','MP1502231-303643'),('ECRN-89462','2015-03-05 11:47:15','MP1502231-431435'),('ECRN-89462','2015-03-05 11:47:15','MP1502232-960175'),('ECRN-89462','2015-03-05 11:47:15','MP1502233-211637'),('ECRN-89462','2015-03-05 11:47:15','MP1502233-533934'),('ECRN-89462','2015-03-05 11:47:15','MP1502234-703719'),('ECRN-89462','2015-03-05 11:47:15','MP1502239-206009'),('ECRN-89755','2015-03-05 11:47:43','MP1502231-303643'),('ECRN-89755','2015-03-05 11:47:43','MP1502231-431435'),('ECRN-89755','2015-03-05 11:47:43','MP1502232-960175'),('ECRN-89755','2015-03-05 11:47:43','MP1502233-211637'),('ECRN-89755','2015-03-05 11:47:43','MP1502233-533934'),('ECRN-89755','2015-03-05 11:47:43','MP1502234-703719'),('ECRN-89755','2015-03-05 11:47:43','MP1502239-206009'),('ECRN-89847','2015-03-05 11:47:53','MP1411304-789451'),('ECRN-89847','2015-03-05 11:47:53','MP1502231-303643'),('ECRN-89847','2015-03-05 11:47:53','MP1502231-431435'),('ECRN-89847','2015-03-05 11:47:53','MP1502232-960175'),('ECRN-89847','2015-03-05 11:47:53','MP1502233-211637'),('ECRN-89847','2015-03-05 11:47:53','MP1502233-533934'),('ECRN-89847','2015-03-05 11:47:53','MP1502234-703719'),('ECRN-89847','2015-03-05 11:47:53','MP1502239-206009'),('ECRN-71717','2015-03-05 11:48:04','MP1411304-789451'),('ECRN-71717','2015-03-05 11:48:04','MP1502230-752062'),('ECRN-71717','2015-03-05 11:48:04','MP1502231-541011'),('ECRN-71717','2015-03-05 11:48:04','MP1502236-997391'),('ECRN-72727','2015-03-05 11:48:14','MP1411304-789451'),('ECRN-72727','2015-03-05 11:48:14','MP1502230-752062'),('ECRN-72727','2015-03-05 11:48:14','MP1502231-541011'),('ECRN-72727','2015-03-05 11:48:14','MP1502236-997391'),('ECRN-73737','2015-03-05 11:48:25','MP1411304-789451'),('ECRN-73737','2015-03-05 11:48:25','MP1502230-752062'),('ECRN-73737','2015-03-05 11:48:25','MP1502231-541011'),('ECRN-73737','2015-03-05 11:48:25','MP1502236-997391'),('ECRN-77777','2015-03-05 11:48:36','MP1411304-789451'),('ECRN-77777','2015-03-05 11:48:36','MP1502230-752062'),('ECRN-77777','2015-03-05 11:48:36','MP1502231-541011'),('ECRN-77777','2015-03-05 11:48:36','MP1502236-997391'),('ECRN-91165','2015-03-05 14:37:22','MP1411304-789451'),('ECRN-91165','2015-03-05 14:37:22','MP1502231-320615'),('ECRN-91165','2015-03-05 14:37:22','MP1502234-179014'),('ECRN-91165','2015-03-05 14:37:22','MP1502237-267144'),('ECRN-91165','2015-03-05 14:37:22','MP1502237-789565'),('ECRN-91165','2015-03-05 14:37:22','MP1502238-295907'),('ECRN-91165','2015-03-05 14:37:22','MP1502239-315561'),('ECRN-91165','2015-03-05 14:37:22','MP1502239-946637'),('ECRN-91165','2015-03-05 21:27:08','MP1411304-789451'),('ECRN-91165','2015-03-05 21:27:08','MP1502231-320615'),('ECRN-91165','2015-03-05 21:27:08','MP1502234-179014'),('ECRN-91165','2015-03-05 21:27:08','MP1502237-267144'),('ECRN-91165','2015-03-05 21:27:08','MP1502237-789565'),('ECRN-91165','2015-03-05 21:27:08','MP1502238-295907'),('ECRN-91165','2015-03-05 21:27:08','MP1502239-315561'),('ECRN-91165','2015-03-05 21:27:08','MP1502239-946637'),('ECRN-91165','2015-03-05 21:27:10','MP1411304-789451'),('ECRN-91165','2015-03-05 21:27:10','MP1502231-320615'),('ECRN-91165','2015-03-05 21:27:10','MP1502234-179014'),('ECRN-91165','2015-03-05 21:27:10','MP1502237-267144'),('ECRN-91165','2015-03-05 21:27:10','MP1502237-789565'),('ECRN-91165','2015-03-05 21:27:10','MP1502238-295907'),('ECRN-91165','2015-03-05 21:27:10','MP1502239-315561'),('ECRN-91165','2015-03-05 21:27:10','MP1502239-946637'),('ECRN-79542','2015-03-06 14:15:29','MP1411304-789451'),('ECRN-79542','2015-03-06 14:15:29','MP1502230-189237'),('ECRN-79542','2015-03-06 14:15:29','MP1502230-752062'),('ECRN-79542','2015-03-06 14:15:29','MP1502231-452446'),('ECRN-79542','2015-03-06 14:15:29','MP1502231-541011'),('ECRN-79542','2015-03-06 14:15:29','MP1502231-979489'),('ECRN-79542','2015-03-06 14:15:29','MP1502232-785418'),('ECRN-79542','2015-03-06 14:15:29','MP1502233-558498'),('ECRN-79542','2015-03-06 14:15:29','MP1502234-953658'),('ECRN-79542','2015-03-06 14:15:29','MP1502235-653325'),('ECRN-79542','2015-03-06 14:15:29','MP1502235-856695'),('ECRN-79542','2015-03-06 14:15:29','MP1502236-433711'),('ECRN-79542','2015-03-06 14:15:29','MP1502236-778182'),('ECRN-79542','2015-03-06 14:15:29','MP1502236-862390'),('ECRN-79542','2015-03-06 14:15:29','MP1502236-997391'),('ECRN-79542','2015-03-06 14:15:29','MP1502238-479044'),('ECRN-79542','2015-03-06 14:15:29','MP1502238-737134'),('ECRN-79542','2015-03-06 14:15:29','MP1502239-334423'),('ECRN-79542','2015-03-06 14:15:29','MP1502239-443066');
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
  `reg_id` varchar(16) NOT NULL DEFAULT '',
  `reg_lname` varchar(30) NOT NULL DEFAULT '',
  `reg_fname` varchar(30) NOT NULL DEFAULT '',
  `reg_mname` varchar(30) DEFAULT NULL,
  `reg_gender` varchar(6) DEFAULT NULL,
  `reg_status` varchar(10) DEFAULT NULL,
  `reg_birthday` date NOT NULL DEFAULT '0000-00-00',
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
INSERT INTO `registration` VALUES ('MA1411302-545985','Arandia','Darryl','Eda','Male','Single','1993-12-08','299 Arandia Tunasan Muntinlupa City','avatar5.png'),('MP1411304-789451','Arandia','Erised Faith','Mizaki','Female','married','1993-07-07',NULL,'parent.jpg'),('MP1501251-539825','j','j','j','Male','Single','2015-01-25',NULL,NULL),('MP1501252-207748','t','t','t','Male','Single','2015-01-25',NULL,NULL),('MP1501252-392969','a','f','f','Male','Single','2015-01-25',NULL,NULL),('MP1501254-192288','cvb','cv','cvb','Male','Single','2015-01-25',NULL,NULL),('MP1501259-365224','ghj','ghj','ghj','Male','Single','2015-01-25',NULL,NULL),('MP1501273-874947','sdf','ssadgfd','','Male','Single','2015-01-27',NULL,NULL),('MP1501305-323805','tyuty','tyu','tyu',NULL,NULL,'2015-01-30',NULL,NULL),('MP1501308-923519','sdfgsdfg','sdfgsdfg','sdfgsdfg',NULL,NULL,'2015-01-30',NULL,NULL),('MP1502019-296839','yayay','blanca','s',NULL,NULL,'2015-02-01',NULL,NULL),('MP1502230-189237','Domingo','Rhean','Adfsg',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502230-752062','Carullo','Ged','Adfg',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-303643','Redilla','Loydd','Eaq',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-320615','Negrido','Anneher','Kayoma',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-431435','Saratan','West','ASdf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-452446','Loresca','Kyle','Afgg',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-541011','Bombasi','Krishe','Adf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502231-979489','Opena','Eichi','Ryoma',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502232-785418','Ferrer','Rzid','Adf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502232-960175','Rebadulla','Justin','Pdrl',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502233-211637','Manalili','Ashero','Adfsd',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502233-533934','Pangowen','Joel','Aadf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502233-558498','Mesa','Eza','Adf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502233-896359','Montiel','Jermerose','Mundawe',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502234-179014','Rosales','Jay','Eam',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502234-703719','Sabado','Alexander','Vered',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502234-953658','Llandelar','Jewel Mae','Enrique',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502235-653325','De Guzman','Chasie','Madf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502235-856695','Hacutina','Shaina Yasmien','Bongon',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502236-433711','Castro','Cassa','Aedf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502236-778182','Leyeza','Chris','Topher',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502236-862390','Dayrit','May','Adfl',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502236-997391','Baltazar','Arn','Arnsdf',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502237-267144','Mangabat','Ashley','Pamosyo',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502237-789565','Ogarido','Jose','Manalo',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502238-295907','Vaso','Marie','Tye',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502238-479044','Gabiana','Celina Joy','Roses',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502238-737134','Guinoban','Mareinald','Asuncion',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-206009','Velasco','Julio','Mera',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-315561','Montiel','Fernando','Amorsolo',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-334423','Puno','Matthew','Maginto',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-443066','Perez','Guma','Mela',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-699377','Montiel','Jermerose','Mundawe',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502239-946637','Sadia','Nessa','Barit',NULL,NULL,'2015-02-23',NULL,NULL),('MP1502250-302676','Bermejo','Mariel','Panes',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502250-867740','Alcantara','Erica Jane','Gervacio',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502251-101788','Abubacar','Amira','Domen',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502251-196372','Huab','Russel','Ballano',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502252-606465','Bularda','Angelo','Cuadero',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502253-273221','Borra','Dave Cyril','',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502253-490493','Calderon','Christian Reden','Rivera',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502253-556400','De Mesa','Reniel','Paloma',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502254-401330','Hallera','Ma Jane','Cambaya',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502254-517914','Bombase','James','Cruz',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502255-742564','Nuylan','Rhealyn','Escote',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502256-300894','Argame','Althea','Mallari',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502256-406771','Cruz','Timothy Patrick','Suerte',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502256-676776','Bondalo','Richmon','Cadenas',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502256-845763','Lopez','Samantha Nicole','Abelligos',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502256-885183','Yasumi','Mika','Tanaka',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502257-298650','Lamberte','Princess Mariet','Victoria',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502257-529547','Ilisan','Maryse Gianne','Hernan',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502258-199291','Arciaga','Val Nino','Cabajar',NULL,NULL,'2015-02-25',NULL,NULL),('MP1502258-791025','Orogo','Dianne','Abarientos',NULL,NULL,'2015-02-25',NULL,NULL),('MS1401011-436135','Gabiana','Celina Joy','Roses','Female','Single','2005-02-09','Putatan Muntinlupa','student1.jpg'),('MS1401035-465413','Guinoban','Mareinald','Asuncion','Female','Single','2005-04-15','Bayanan','student2.jpg'),('MS1403176-798463','Hacutina','Shaina Yasmien','Bongon','Female','Single','2005-03-18','null','student3.jpg'),('MS1404219-765416','Llandelar','Jewel Mae','Enrique','Female','Single','2005-08-19','null','student4.jpg'),('MS1407205-132132','Montiel','Jermerose','Mundawe','Male','Single','2005-11-16','Doon','student5.jpg'),('MS1407228-685641','Negrido','Jaycel Anne','Curtiz','Female','Single','2005-07-23','Dyan','student6.jpg'),('MS1408149-436566','Ogarido','Zeikielee','Pamozo','Female','Single','2005-10-25','dito','student2.jpg'),('MS1408213-131313','Mangabat','Jord Ashley','Peran','Female','Single','2005-10-05','daan','student8.jpg'),('MS1409296-136131','Sadia','Vanessa','Belozo','Female','Single','2005-11-23','Poblacion','student4.jpg'),('MS1410109-413125','Vaso','Maricris','Culo','Female','Single','2004-06-06','uoad','student3.jpg'),('MS1411301-657755','Arandia','Kenshin','Mizaki','Male','Single','2009-07-15','299 Arandia St., Tunasan Muntinlupa','student1.jpg'),('MS1412027-894643','Rosales','Lance Jayson','Benitez','Male','Single','2004-03-23','WER','student.jpg'),('MS1412034-897411','Mesa','Mars Ezikiel','Sumbag','Male','Single','2004-02-13','qwe','student3.jpg'),('MS1412039-789777','Dalan','Justin','Caballo','Male','Single','2004-11-20','Dalan','student4.jpg'),('MS1412045-798461','Pangowen','Jodelf','Azoda','Male','Single','2005-10-22','gfdsfg','student5.jpg'),('MS1412057-798461','Velasco','Julian','Meranda','Male','Single','2005-07-29','Velasco','student6.jpg'),('MS1412067-465133','Saratan','John West','Malibago','Male','Single','2004-09-27','fg','student7.jpg'),('MS1412067-798423','Perez','John Levy','Pamela','Male','Single','2005-04-06','asdf','student8.jpg'),('MS1412067-978989','Lazaro','Raphael John','Santos','Male','Single','2005-04-09',NULL,'student9.jpg'),('MS1412075-546651','Alcantara','Jerome','Luna','Male','Single','2004-01-01',NULL,'student10.jpg'),('MS1412078-784265','Eroma','Joaquin','Gargantiel','Male','Single','2004-03-08',NULL,'student1.jpg'),('MS1412078-893214','Opena','Eichi Rein','Arellano','Male','Single','2005-02-01','Opena','student2.jpg'),('MS1412081-655155','Cabanas','Ireal Jhun','Ocava','Male','Single','2005-02-28',NULL,'student3.jpg'),('MS1412083-789913','Puno','Matt Joshua','Morales','Male','Single','2005-05-05','Puno','student4.jpg'),('MS1412085-456113','Redilla','Mart Lloyd','Pangga','Male','Single','2005-11-26','Redilla','student5.jpg'),('MS1412087-789411','Loresca','Kylon','DeVarga','Male','Single','2005-01-11','Loresca','student6.jpg'),('MS1412089-798414','Arenda','Daren','Almoro','Male','Single','2005-05-26',NULL,'student7.jpg'),('MS1412092-878789','Calda','Jeremiah','Yuson','Male','Single','2005-03-14',NULL,'student8.jpg'),('MS1412093-456554','Leyeza','Christopher','Tumbaga','Male','Single','2005-01-10','Les','student9.jpg'),('MS1412093-791613','Rebadulla','Kyle Justin','Perez','Male','Single','2005-04-17','Rebadulla','student10.jpg'),('MS1412097-895123','Lazaro','Raphae John','Soriano','Male','Single','2004-03-25',NULL,'student1.jpg'),('MS1412107-654313','Sabado','Alexander','Veranzo','Male','Single','2005-06-15','Sabado','student2.jpg'),('MS1412108-416511','Aquino','Reanne Jane','Bayona','Female','Single','2005-01-14',NULL,'student3.jpg'),('MS1412110-611233','Argana','Francine','Ocava','Female','Single','2006-04-11',NULL,'student4.jpg'),('MS1412121-436111','Bombasi','Krish Abigail','Verano','Female','Single','2005-05-21','Bombase','student5.jpg'),('MS1412128-132132','Baltazar','Cris Arn','Daguplo','Female','Single','2006-03-03','Baltazar','student6.jpg'),('MS1412134-132156','Castro','Cassandra Dhenise','Estrada','Female','Single','2005-06-24','Castro','student7.jpg'),('MS1412139-132133','Carullo','Giellian','Rebesa','Female','Single','2005-04-28','Carullo','student8.jpg'),('MS1412147-746546','Dayrit','Kristine May','Alcantra','Female','Single','2005-07-20','Dayrit','student9.jpg'),('MS1412147-897711','Delos Santos','John Mario','Bayrante','Male','Single','2005-07-26',NULL,'student10.jpg'),('MS1412159-651315','De Guzman','Chasie Trinity','Mendez','Female','Single','2005-08-21','De Guzman','student1.jpg'),('MS1412178-313131','Domingo','Christine Rhean','Romualdez','Female','Single','2004-07-07','Domingo','student2.jpg'),('MS1412189-416313','Ferrer','Riz','Margareth','Female','Single','2005-01-18','Ferrer','student3.jpg'),('MS1412225-564611','Manalili','Ashley Nicole','Duran','Female','Single','2005-09-24','Qer','student4.jpg'),('MS1412236-798777','Casacop','Deniell Reye','Vitug','Male','Single','2005-05-13',NULL,'student5.jpg'),('MS1501250-697060','hgjg','ghj','ghj','Male','Single','2015-01-14','ghj',''),('MS1501254-949394','sd','asdf','ad','Male','Single','2015-01-06','df',''),('MS1501255-947752','xcvb','cvb','cvb','Male','Single','2015-01-07','cvb','student2.jpg'),('MS1501256-566584','k','j','j','Male','Single','2015-01-13','j',''),('MS1501256-903231','t','t','','Male','Single','2015-01-13','t',''),('MS1501275-432925','sdf','ssadgfd','','Male','Single','2015-01-20','',''),('MS1501300-259794','tyuty','tyu','tyu','Female','Single','2015-01-14','tyutyutyutyutu',''),('MS1501301-182038','sdfgsdfg','sdfgsdfg','sdfgsdfg','Male','Single','2015-01-20','sdfgsdfg',''),('MS1502019-863997','yayay','blanca','s','Male','Widowed','2015-02-02','dsfasdf',''),('MS1502250-977623','Azores','Darrel','Acudesin','','','2015-02-25','',NULL),('MS1502251-339236','Orogo','Dianne','Abarientos','Female','Single','2007-02-01','Orogo Compound',NULL),('MS1502251-386105','Argame','Althea','Mallari','Female','Single','2007-01-25','Argame Compound',NULL),('MS1502251-394040','Bombase','James','Cruz','Male','Single','2006-11-26','Bombase Compound',NULL),('MS1502252-658859','Cruz','Timothy Patrick','Suerte','Male','Single','2006-12-01','Cruz Compound',NULL),('MS1502253-210172','Huab','Russel','Ballano','Male','Single','2006-12-03','Huab Compound',NULL),('MS1502253-574200','Bondalo','Richmon','Cadenas','Male','Single','2006-11-27','Bondalo Compound',NULL),('MS1502253-948849','Borra','Dave Cyril','','Male','Single','2006-11-28','Borra Compound',NULL),('MS1502255-346187','Abubacar','Amira','Domen','Female','Single','2007-01-23','Abubacar Compound',NULL),('MS1502255-695211','Arciaga','Val Nino','Cabajar','Male','Single','2006-11-24','Arciaga Compound',NULL),('MS1502255-718332','Lopez','Samantha Nicole','Abelligos','Female','Single','2007-01-30','Lopez Compound',NULL),('MS1502257-171967','Alcantara','Erica Jane','Gervacio','Female','Single','2007-01-24','Alcantara Compound',NULL),('MS1502257-309495','Bermejo','Mariel','Panes','Female','Single','2007-01-26','Bermejo Compound',NULL),('MS1502258-114549','Nuylan','Rhealyn','Escote','Female','Single','2007-01-31','Nuylan Compound',NULL),('MS1502258-234465','Ilisan','Maryse Gianne','Hernan','Female','Single','2007-01-28','Ilisan Compound',NULL),('MS1502258-573403','Calderon','Christian Reden','Rivera','Male','Single','2006-11-30','Calderon Compound',NULL),('MS1502258-872462','Yasumi','Mika','Tanaka','Female','Single','2007-04-01','Ishikawa Compound',NULL),('MS1502259-206563','Bularda','Angelo','Cuadero','Male','Single','2006-11-29','Bularda Compound',NULL),('MS1502259-295629','Hallera','Ma Jane','Cambaya','Female','Single','2007-01-27','Hallera Compound',NULL),('MS1502259-561241','De Mesa','Reniel','Paloma','Male','Single','2006-12-02','De Mesa Compound',NULL),('MS1502259-599805','Lamberte','Princess Mariet','Victoria','Female','Single','2007-01-29','Lamberte Compound',NULL),('MS1503066-287504','Azores','Darrel','Acudesin','','','2015-03-06','',NULL),('MT1411303-788915','Musashi','Miyamoto','Genbei','Male','Single','1960-06-07','Japan','avatar04.png'),('MT1411303-789121','Arandia','Emilia Eliza','Eda','Female','Married','1957-09-12','null','avatar2.png'),('MT1501256-768569','Sirauloxdfgdf','Atom','Neutron','Male','Single','2015-01-16','Jengjeng5',''),('MT1501277-419740','sdfa','sdfgasdg','sdgf','asdg','Single','2015-01-20','sadg',''),('MT1501305-574371','wer','wer','wer','Female','Married','2015-01-14','wer',''),('MT1502013-420006','asdf','fsadf','asdf','Male','Married','2015-02-12','asdf','');
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
INSERT INTO `room` VALUES ('322','Bunyi',NULL),('447','Bunyi',NULL),('654','JRF',NULL),('777','JRF',NULL),('879','Biazon',NULL),('888','JRF',NULL),('891','Biazon',NULL),('895','Biazon',NULL);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `class_rec_no` varchar(10) NOT NULL DEFAULT '',
  `sectionID` varchar(6) DEFAULT NULL,
  `sched_days` varchar(7) DEFAULT NULL,
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
INSERT INTO `section` VALUES ('ECRN-23165','S00005','MWF','09:00:00','10:00:00','EAS-0003','MT1411303-788915','G0003','654','2015-2016'),('ECRN-54544','S00009','MWF','13:00:00','14:00:00','EAS-0005','MT1411303-789121','G0003','879','2015-2016'),('ECRN-54644','S00008','MWF','10:00:00','11:00:00','EAS-0004','MT1411303-789121','G0003','777','2015-2016'),('ECRN-71717','S00007','MWF','08:00:00','09:00:00','EAS-0008','MT1411303-789121','G3630','777','2015-2016'),('ECRN-72727','S00007','MWF','09:00:00','10:00:00','EAS-0002','MT1411303-789121','G3630','777','2015-2016'),('ECRN-73737','S00007','MWF','10:00:00','11:00:00','EAS-0001','MT1411303-789121','G3630','777','2015-2016'),('ECRN-77777','S00007','MWF','07:00:00','08:00:00','EAS-0007','MT1411303-789121','G3630','777','2015-2016'),('ECRN-79542','S00002','MWF','07:00:00','08:00:00','EAS-0001','MT1411303-789121','G0003','322','2015-2016'),('ECRN-89462','S00003','TTH','10:00:00','11:00:00','EAS-0005','MT1411303-789121','G0003','891','2015-2016'),('ECRN-89544','S00010','MWF','14:00:00','15:00:00','EAS-0006','MT1411303-789121','G0003','891','2015-2016'),('ECRN-89755','S00003','MWF','08:00:00','09:00:00','EAS-0002','MT1411303-789121','G0003','447','2015-2016'),('ECRN-89847','S00003','TTH','09:00:00','10:00:00','EAS-0001','MT1411303-789121','G0003','895','2015-2016'),('ECRN-91165','S00001','TTH','08:00:00','09:00:00','EAS-0003','MT1411303-789121','G0002','891','2015-2016');
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
INSERT INTO `section_list` VALUES ('S00001','1','Carinosa','G0002'),('S00002','1','Rizal','G0003'),('S00003','2','Bonifacio','G0003'),('S00004','2','Waltz','G0005'),('S00005','3','Mabini','G0005'),('S00006','3','Tango','G0005'),('S00007','1','SAF','G3630'),('S00008','4','Sampaguita','G0003'),('S00009','5','Gumamela','G0003'),('S00010','6','Santan','G0003');
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
INSERT INTO `student` VALUES ('MS1502250-977623',NULL),('MS1503066-287504',NULL),('MS1411301-657755','MP1411304-789451'),('MS1412039-789777','MP1411304-789451'),('MS1412067-978989','MP1411304-789451'),('MS1412075-546651','MP1411304-789451'),('MS1412078-784265','MP1411304-789451'),('MS1412081-655155','MP1411304-789451'),('MS1412092-878789','MP1411304-789451'),('MS1412108-416511','MP1411304-789451'),('MS1412110-611233','MP1411304-789451'),('MS1412147-897711','MP1411304-789451'),('MS1412236-798777','MP1411304-789451'),('MS1501255-947752','MP1501254-192288'),('MS1501250-697060','MP1501259-365224'),('MS1501275-432925','MP1501273-874947'),('MS1501300-259794','MP1501305-323805'),('MS1501301-182038','MP1501308-923519'),('MS1502019-863997','MP1502019-296839'),('MS1412178-313131','MP1502230-189237'),('MS1412139-132133','MP1502230-752062'),('MS1412085-456113','MP1502231-303643'),('MS1407228-685641','MP1502231-320615'),('MS1412067-465133','MP1502231-431435'),('MS1412087-789411','MP1502231-452446'),('MS1412121-436111','MP1502231-541011'),('MS1412078-893214','MP1502231-979489'),('MS1412189-416313','MP1502232-785418'),('MS1412093-791613','MP1502232-960175'),('MS1412225-564611','MP1502233-211637'),('MS1412045-798461','MP1502233-533934'),('MS1412034-897411','MP1502233-558498'),('MS1412027-894643','MP1502234-179014'),('MS1412107-654313','MP1502234-703719'),('MS1404219-765416','MP1502234-953658'),('MS1412159-651315','MP1502235-653325'),('MS1403176-798463','MP1502235-856695'),('MS1412134-132156','MP1502236-433711'),('MS1412093-456554','MP1502236-778182'),('MS1412147-746546','MP1502236-862390'),('MS1412128-132132','MP1502236-997391'),('MS1408213-131313','MP1502237-267144'),('MS1408149-436566','MP1502237-789565'),('MS1410109-413125','MP1502238-295907'),('MS1401011-436135','MP1502238-479044'),('MS1401035-465413','MP1502238-737134'),('MS1412057-798461','MP1502239-206009'),('MS1407205-132132','MP1502239-315561'),('MS1412083-789913','MP1502239-334423'),('MS1412067-798423','MP1502239-443066'),('MS1409296-136131','MP1502239-946637'),('MS1502257-309495','MP1502250-302676'),('MS1502257-171967','MP1502250-867740'),('MS1502255-346187','MP1502251-101788'),('MS1502253-210172','MP1502251-196372'),('MS1502259-206563','MP1502252-606465'),('MS1502253-948849','MP1502253-273221'),('MS1502258-573403','MP1502253-490493'),('MS1502259-561241','MP1502253-556400'),('MS1502259-295629','MP1502254-401330'),('MS1502251-394040','MP1502254-517914'),('MS1502258-114549','MP1502255-742564'),('MS1502251-386105','MP1502256-300894'),('MS1502252-658859','MP1502256-406771'),('MS1502253-574200','MP1502256-676776'),('MS1502255-718332','MP1502256-845763'),('MS1502258-872462','MP1502256-885183'),('MS1502259-599805','MP1502257-298650'),('MS1502258-234465','MP1502257-529547'),('MS1502255-695211','MP1502258-199291'),('MS1502251-339236','MP1502258-791025');
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
INSERT INTO `student_rating` VALUES ('GR-1202157','MS1411301-657755','ECRN-89462','1st',2,100,100,100,100,100,'A'),('GR-1425374','MS1412085-456113','ECRN-89462','1st',1,70,70,70,70,70,'B'),('GR-1520966','MS1411301-657755','ECRN-89847','2nd',4,98,85,74,55,74.65,'D'),('GR-1544915','MS1411301-657755','ECRN-89847','1st',5,50,51,52,53,54,'B'),('GR-1548177','MS1411301-657755','ECRN-89847','1st',1,90,90,90,90,90,'A'),('GR-1631797','MS1411301-657755','ECRN-89847','2nd',5,69,68,67,52,63.05,'B'),('GR-1693461','MS1411301-657755','ECRN-89847','3rd',1,25,10,15,30,19.75,'B'),('GR-1795438','MS1412057-798461','ECRN-89847','1st',1,73,73,73,73,73,'B'),('GR-1833960','MS1411301-657755','ECRN-91165','1st',2,100,100,100,100,100,'A'),('GR-1914941','MS1411301-657755','ECRN-89462','3rd',3,10,9,8,6,7.95,'B'),('GR-1917316','MS1411301-657755','ECRN-89462','1st',1,100,100,100,100,100,'A'),('GR-1942187','MS1411301-657755','ECRN-89847','2nd',6,30,25,15,50,30.25,'B'),('GR-2072741','MS1401011-436135','ECRN-79542','1st',1,85,84,86,82,84.15,'P'),('GR-2191899','MS1411301-657755','ECRN-91165','1st',7,94,93,92,99,94.65,'A'),('GR-2281214','MS1412057-798461','ECRN-89847','1st',2,90,90,90,90,90,'A'),('GR-3155516','MS1411301-657755','ECRN-89847','4th',1,50,10,99,100,69.7,'B'),('GR-3195718','MS1411301-657755','ECRN-89462','3rd',2,100,90,75,55,76.5,'D'),('GR-3284097','MS1411301-657755','ECRN-89462','1st',4,98,82,76,85,83.5,'AP'),('GR-3284939','MS1411301-657755','ECRN-89462','2nd',2,100,90,70,40,70.5,'B'),('GR-3685755','MS1411301-657755','ECRN-89462','1st',4,98,82,76,85,83.5,'AP'),('GR-3704030','MS1401011-436135','ECRN-79542','3rd',1,89,90,90,90,89.85,'A'),('GR-3709629','MS1411301-657755','ECRN-89462','2nd',1,100,50,40,20,45.5,'B'),('GR-3772761','MS1411301-657755','ECRN-89847','1st',6,60,61,62,63,64,'B'),('GR-3792792','MS1401011-436135','ECRN-79542','1st',4,90,95,95,95,94.25,'A'),('GR-3838611','MS1401011-436135','ECRN-79542','1st',3,100,100,100,100,100,'A'),('GR-4199509','MS1411301-657755','ECRN-89847','3rd',2,100,99,98,99,98.85,'A'),('GR-4740822','MS1411301-657755','ECRN-89847','1st',3,30,31,32,33,34,'B'),('GR-5244769','MS1411301-657755','ECRN-89462','1st',3,97,82,71,60,74.35,'D'),('GR-5389730','MS1411301-657755','ECRN-89847','2nd',1,85,85,84,80,83.2,'AP'),('GR-5799113','MS1411301-657755','ECRN-89462','4th',1,90,91,92,93,91.75,'A'),('GR-6054908','MS1411301-657755','ECRN-89847','1st',2,20,21,22,23,24,'B'),('GR-6172842','MS1412045-798461','ECRN-89847','1st',1,85,90.6,85.5,90,88.05,'P'),('GR-6263719','MS1411301-657755','ECRN-89462','3rd',5,7,7,7,7,7,'B'),('GR-7576221','MS1411301-657755','ECRN-89462','4th',4,70,70,70,70,70,'B'),('GR-8075021','MS1411301-657755','ECRN-89847','1st',4,40,41,42,43,44,'B'),('GR-8256800','MS1412236-798777','ECRN-79542','1st',1,100,70,88,65,78.4,'D'),('GR-8262986','MS1401011-436135','ECRN-79542','1st',2,88,73,89,56,74.95,'D'),('GR-8476710','MS1412045-798461','ECRN-89462','1st',1,70,90,90,80,84,'AP'),('GR-8610677','MS1411301-657755','ECRN-89462','3rd',4,100,100,100,100,100,'A'),('GR-9774750','MS1411301-657755','ECRN-89847','2nd',2,83,82,82,82,82.15,'AP'),('GR-9999922','MS1411301-657755','ECRN-89847','2nd',3,90,89,88,86,87.95,'P');
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
INSERT INTO `student_schedule_line` VALUES ('ECRN-71717','MS1412039-789777','Grade 4'),('ECRN-71717','MS1412075-546651','Grade 4'),('ECRN-71717','MS1412081-655155','Grade 4'),('ECRN-71717','MS1412092-878789','Grade 4'),('ECRN-71717','MS1412108-416511','Grade 4'),('ECRN-71717','MS1412110-611233','Grade 4'),('ECRN-71717','MS1412121-436111','Grade 4'),('ECRN-71717','MS1412128-132132','Grade 4'),('ECRN-71717','MS1412139-132133','Grade 4'),('ECRN-71717','MS1412236-798777','Grade 4'),('ECRN-72727','MS1412039-789777','Grade 4'),('ECRN-72727','MS1412075-546651','Grade 4'),('ECRN-72727','MS1412081-655155','Grade 4'),('ECRN-72727','MS1412092-878789','Grade 4'),('ECRN-72727','MS1412108-416511','Grade 4'),('ECRN-72727','MS1412110-611233','Grade 4'),('ECRN-72727','MS1412121-436111','Grade 4'),('ECRN-72727','MS1412128-132132','Grade 4'),('ECRN-72727','MS1412139-132133','Grade 4'),('ECRN-72727','MS1412236-798777','Grade 4'),('ECRN-73737','MS1412039-789777','Grade 4'),('ECRN-73737','MS1412075-546651','Grade 4'),('ECRN-73737','MS1412081-655155','Grade 4'),('ECRN-73737','MS1412092-878789','Grade 4'),('ECRN-73737','MS1412108-416511','Grade 4'),('ECRN-73737','MS1412110-611233','Grade 4'),('ECRN-73737','MS1412121-436111','Grade 4'),('ECRN-73737','MS1412128-132132','Grade 4'),('ECRN-73737','MS1412139-132133','Grade 4'),('ECRN-73737','MS1412236-798777','Grade 4'),('ECRN-77777','MS1412039-789777','Grade 4'),('ECRN-77777','MS1412075-546651','Grade 4'),('ECRN-77777','MS1412081-655155','Grade 4'),('ECRN-77777','MS1412092-878789','Grade 4'),('ECRN-77777','MS1412108-416511','Grade 4'),('ECRN-77777','MS1412110-611233','Grade 4'),('ECRN-77777','MS1412121-436111','Grade 4'),('ECRN-77777','MS1412128-132132','Grade 4'),('ECRN-77777','MS1412139-132133','Grade 4'),('ECRN-77777','MS1412236-798777','Grade 4'),('ECRN-79542','MS1401011-436135','Grade 3'),('ECRN-79542','MS1401035-465413','Grade 3'),('ECRN-79542','MS1403176-798463','Grade 3'),('ECRN-79542','MS1404219-765416','Grade 3'),('ECRN-79542','MS1412034-897411','Grade 3'),('ECRN-79542','MS1412039-789777','Grade 3'),('ECRN-79542','MS1412067-798423','Grade 3'),('ECRN-79542','MS1412067-978989','Grade 3'),('ECRN-79542','MS1412075-546651','Grade 3'),('ECRN-79542','MS1412078-784265','Grade 3'),('ECRN-79542','MS1412078-893214','Grade 3'),('ECRN-79542','MS1412081-655155','Grade 3'),('ECRN-79542','MS1412083-789913','Grade 3'),('ECRN-79542','MS1412087-789411','Grade 3'),('ECRN-79542','MS1412092-878789','Grade 3'),('ECRN-79542','MS1412093-456554','Grade 3'),('ECRN-79542','MS1412108-416511','Grade 3'),('ECRN-79542','MS1412110-611233','Grade 3'),('ECRN-79542','MS1412121-436111','Grade 3'),('ECRN-79542','MS1412128-132132','Grade 3'),('ECRN-79542','MS1412134-132156','Grade 3'),('ECRN-79542','MS1412139-132133','Grade 3'),('ECRN-79542','MS1412147-746546','Grade 3'),('ECRN-79542','MS1412147-897711','Grade 3'),('ECRN-79542','MS1412159-651315','Grade 3'),('ECRN-79542','MS1412178-313131','Grade 3'),('ECRN-79542','MS1412189-416313','Grade 3'),('ECRN-79542','MS1412236-798777','Grade 3'),('ECRN-89462','MS1411301-657755','Grade 3'),('ECRN-89462','MS1412045-798461','Grade 3'),('ECRN-89462','MS1412057-798461','Grade 3'),('ECRN-89462','MS1412067-465133','Grade 3'),('ECRN-89462','MS1412085-456113','Grade 3'),('ECRN-89462','MS1412093-791613','Grade 3'),('ECRN-89462','MS1412107-654313','Grade 3'),('ECRN-89462','MS1412225-564611','Grade 3'),('ECRN-89755','MS1412045-798461','Grade 3'),('ECRN-89755','MS1412057-798461','Grade 3'),('ECRN-89755','MS1412067-465133','Grade 3'),('ECRN-89755','MS1412085-456113','Grade 3'),('ECRN-89755','MS1412093-791613','Grade 3'),('ECRN-89755','MS1412107-654313','Grade 3'),('ECRN-89755','MS1412225-564611','Grade 3'),('ECRN-89847','MS1411301-657755','Grade 3'),('ECRN-89847','MS1412045-798461','Grade 3'),('ECRN-89847','MS1412057-798461','Grade 3'),('ECRN-89847','MS1412067-465133','Grade 3'),('ECRN-89847','MS1412085-456113','Grade 3'),('ECRN-89847','MS1412093-791613','Grade 3'),('ECRN-89847','MS1412107-654313','Grade 3'),('ECRN-89847','MS1412225-564611','Grade 3'),('ECRN-91165','MS1407205-132132','Grade 2'),('ECRN-91165','MS1407228-685641','Grade 2'),('ECRN-91165','MS1408149-436566','Grade 2'),('ECRN-91165','MS1408213-131313','Grade 2'),('ECRN-91165','MS1409296-136131','Grade 2'),('ECRN-91165','MS1410109-413125','Grade 2'),('ECRN-91165','MS1411301-657755','Grade 2'),('ECRN-91165','MS1412027-894643','Grade 2');
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
INSERT INTO `subject_` VALUES ('EAS-0001','Mathematics'),('EAS-0002','English'),('EAS-0003','Science'),('EAS-0004','Hekasi'),('EAS-0005','P.E.'),('EAS-0006','GMRC'),('EAS-0007','Mother Tongue'),('EAS-0008','Filipino');
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
  PRIMARY KEY (`teacherID`),
  CONSTRAINT `FK_teacher` FOREIGN KEY (`teacherID`) REFERENCES `registration` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES ('MT1411303-788915','undefined'),('MT1411303-789121','undefined'),('MT1501256-768569','Teacher 3'),('MT1501277-419740','asdgasd'),('MT1501305-574371','werwer'),('MT1502013-420006','asdf');
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
INSERT INTO `teacher_feedback_parent` VALUES ('2015-03-05 07:10:35','Hello Parents'),('2015-03-05 07:29:39','Testing'),('2015-03-05 07:40:28','Hello to all Parents'),('2015-03-05 07:41:18','good morning!'),('2015-03-05 08:20:35','you'),('2015-03-05 10:17:12','Hey you'),('2015-03-05 10:17:31','gumana kang'),('2015-03-05 10:37:29','Guaam,'),('2015-03-05 11:38:31','Hello Carinosa!!'),('2015-03-05 11:39:00','Hello Mathematics!'),('2015-03-05 11:46:48','Hey yiuasdfasdf'),('2015-03-05 11:47:04','Hey!!!'),('2015-03-05 11:47:15','HAHAHAHA'),('2015-03-05 11:47:43','Hi Bonifacio'),('2015-03-05 11:47:53','Hi Mathj'),('2015-03-05 11:48:04','Hi Filipino'),('2015-03-05 11:48:14','Hi English'),('2015-03-05 11:48:25','Hi SAFo'),('2015-03-05 11:48:36','Hi Mother Tongiue'),('2015-03-05 14:37:22','Hay nako'),('2015-03-05 21:27:08','Kapagod'),('2015-03-05 21:27:10','Kapagod'),('2015-03-06 14:15:29','hello rizza');
/*!40000 ALTER TABLE `teacher_feedback_parent` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06 17:45:04
