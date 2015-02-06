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
  `messageorfile_caption` varchar(500) DEFAULT NULL,
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
INSERT INTO `announcement_lecture` VALUES ('2014-12-25 10:09:05','Testing',NULL,NULL),('2014-12-25 10:10:05','Hello',NULL,NULL),('2014-12-26 08:22:05','Build a Mini Golf','model/uploaded_files/','Build a Mini Golf Game with ActionScript 3.docx'),('2014-12-26 08:23:05','Computer Ethics','model/uploaded_files/','Computer Ethics.pdf'),('2014-12-26 08:24:05','hit test','model/uploaded_files/','hit test.pptx'),('2014-12-26 08:25:05','K12','model/uploaded_files/','K12 Encoding Sheets .xlsx'),('2014-12-26 08:26:06','mini golf','model/uploaded_files/','miniGolf.swf'),('2014-12-26 08:27:07','preview','model/uploaded_files/','preview.gif'),('2014-12-28 11:22:00','buchi','model/uploaded_files/','Buchi Recipe.docx'),('2014-12-28 11:24:00','filipino cookbook','model/uploaded_files/','The Filipino Cookbook - Miki Garcia.pdf'),('2014-12-28 11:25:00','japanese cuisine','model/uploaded_files/','Cooking_The_Japanese_Way.pdf'),('2014-12-28 11:26:00','japanese cooking','model/uploaded_files/','Japanese_Cooking_-_Schinner__Miyoko_Nishimoto.pdf');
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
  `comment_message` varchar(500) DEFAULT NULL,
  `post_date_created` datetime NOT NULL,
  PRIMARY KEY (`comment_date_created`),
  KEY `FK_announcement_lecture_comments` (`post_date_created`),
  CONSTRAINT `FK_announcement_lecture_comments` FOREIGN KEY (`post_date_created`) REFERENCES `announcement_lecture` (`date_created`)
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
INSERT INTO `create_account` VALUES ('admin','admin','superhero','superman','admin','MA1411302-545985'),('parent','parent','parent','parent','parent','MP1411304-789451'),('student','students','student','student','student','MS1411301-657755'),('teacher','teacher','teacher','teacher','teacher','MT1411303-789121');
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
INSERT INTO `grade_level` VALUES ('G0002','Grade2'),('G0003','Grade3'),('G1207','vbncvbn'),('G3630','Grade4'),('G7808','Grade5');
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
INSERT INTO `parent` VALUES ('MP1411304-789451'),('MP1501254-192288'),('MP1501259-365224'),('MP1501273-874947'),('MP1501305-323805'),('MP1501308-923519'),('MP1502019-296839');
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
  PRIMARY KEY (`class_rec_no`,`feedback_date_created`),
  KEY `FK2_post_teacher_feedback_parent` (`feedback_date_created`),
  CONSTRAINT `FK1_post_teacher_feedback_parent` FOREIGN KEY (`class_rec_no`) REFERENCES `section` (`class_rec_no`),
  CONSTRAINT `FK2_post_teacher_feedback_parent` FOREIGN KEY (`feedback_date_created`) REFERENCES `teacher_feedback_parent` (`feedback_date_created`)
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
INSERT INTO `registration` VALUES ('MA1411302-545985','Arandia','Darryl','Eda','Male','Single','1993-12-08','299 Arandia Tunasan Muntinlupa City','avatar5.png'),('MP1411304-789451','Arandia','Erised Faith','Mizaki','Female','married','1993-07-07',NULL,'parent.jpg'),('MP1501251-539825','j','j','j','Male','Single','2015-01-25',NULL,NULL),('MP1501252-207748','t','t','t','Male','Single','2015-01-25',NULL,NULL),('MP1501252-392969','a','f','f','Male','Single','2015-01-25',NULL,NULL),('MP1501254-192288','cvb','cv','cvb','Male','Single','2015-01-25',NULL,NULL),('MP1501259-365224','ghj','ghj','ghj','Male','Single','2015-01-25',NULL,NULL),('MP1501273-874947','sdf','ssadgfd','','Male','Single','2015-01-27',NULL,NULL),('MP1501305-323805','tyuty','tyu','tyu',NULL,NULL,'2015-01-30',NULL,NULL),('MP1501308-923519','sdfgsdfg','sdfgsdfg','sdfgsdfg',NULL,NULL,'2015-01-30',NULL,NULL),('MP1502019-296839','yayay','blanca','s',NULL,NULL,'2015-02-01',NULL,NULL),('MS1401011-436135','Gabiana','Celina Joy','Roses','Female','Single','2005-02-09','Putatan Muntinlupa','student1.jpg'),('MS1401035-465413','Guinoban','Mareinald','Asuncion','Female','Single','2005-04-15','Bayanan','student2.jpg'),('MS1403176-798463','Hacutina','Shaina Yasmien','Bongon','Female','Single','2005-03-18',NULL,'student3.jpg'),('MS1404219-765416','Llandelar','Jewel Mae','Enrique','Female','Single','2005-08-19',NULL,'student4.jpg'),('MS1407205-132132','Montiel','Jermerose','Mundawe','Female','Single','2005-11-16',NULL,'student5.jpg'),('MS1407228-685641','Negrido','Jaycel Anne','Curtiz','Female','Single','2005-07-23',NULL,'student6.jpg'),('MS1408149-436566','Ogarido','Zeikielee','Pamozo','Female','Single','2005-10-25',NULL,'student7.jpg'),('MS1408213-131313','Mangabat','Jord Ashley','Peran','Female','Single','2005-10-05',NULL,'student8.jpg'),('MS1409296-136131','Sadia','Vanessa','Belozo','Female','Single','2005-11-23',NULL,'student9.jpg'),('MS1410109-413125','Vaso','Maricris','Culo','Female','Single','2004-06-06',NULL,'student10.jpg'),('MS1411301-657755','Arandia','Kenshin','Mizaki','Male','Single','2009-07-15','Tunasan Muntinlupa','student1.jpg'),('MS1412027-894643','Rosales','Lance Jayson','Benitez','Male','Single','2004-03-23',NULL,'student2.jpg'),('MS1412034-897411','Mesa','Mars Ezikiel','Sumbag','Male','Single','2004-02-13',NULL,'student3.jpg'),('MS1412039-789777','Dalan','Justin','Caballo','Male','Single','2004-11-20',NULL,'student4.jpg'),('MS1412045-798461','Pangowen','Jodelf','Azoda','Male','Single','2005-10-22',NULL,'student5.jpg'),('MS1412057-798461','Velasco','Julian','Meranda','Male','Single','2005-07-29',NULL,'student6.jpg'),('MS1412067-465133','Saratan','John West','Malibago','Male','Single','2004-09-27',NULL,'student7.jpg'),('MS1412067-798423','Perez','John Levy','Pamela','Male','Single','2005-04-06',NULL,'student8.jpg'),('MS1412067-978989','Lazaro','Raphael John','Santos','Male','Single','2005-04-09',NULL,'student9.jpg'),('MS1412075-546651','Alcantara','Jerome','Luna','Male','Single','2004-01-01',NULL,'student10.jpg'),('MS1412078-784265','Eroma','Joaquin','Gargantiel','Male','Single','2004-03-08',NULL,'student1.jpg'),('MS1412078-893214','Opena','Eichi Rein','Arellano','Male','Single','2005-02-01',NULL,'student2.jpg'),('MS1412081-655155','Cabanas','Ireal Jhun','Ocava','Male','Single','2005-02-28',NULL,'student3.jpg'),('MS1412083-789913','Puno','Matt Joshua','Morales','Male','Single','2005-05-05',NULL,'student4.jpg'),('MS1412085-456113','Redilla','Mart Lloyd','Pangga','Male','Single','2005-11-26',NULL,'student5.jpg'),('MS1412087-789411','Loresca','Kylon','DeVarga','Male','Single','2005-01-11',NULL,'student6.jpg'),('MS1412089-798414','Arenda','Daren','Almoro','Male','Single','2005-05-26',NULL,'student7.jpg'),('MS1412092-878789','Calda','Jeremiah','Yuson','Male','Single','2005-03-14',NULL,'student8.jpg'),('MS1412093-456554','Leyeza','Christopher','Tumbaga','Male','Single','2005-01-10',NULL,'student9.jpg'),('MS1412093-791613','Rebadulla',' Kyle Justin ','Perez','Male','Single','2005-04-17',NULL,'student10.jpg'),('MS1412097-895123','Lazaro','Raphae John','Soriano','Male','Single','2004-03-25',NULL,'student1.jpg'),('MS1412107-654313','Sabado','Alexander','Veranzo','Male','Single','2005-06-15',NULL,'student2.jpg'),('MS1412108-416511','Aquino','Reanne Jane','Bayona','Female','Single','2005-01-14',NULL,'student3.jpg'),('MS1412110-611233','Argana','Francine','Ocava','Female','Single','2006-04-11',NULL,'student4.jpg'),('MS1412121-436111','Bombasi','Krish Abigail','Verano','Female','Single','2005-05-21',NULL,'student5.jpg'),('MS1412128-132132','Baltazar','Cris Arn','Daguplo','Female','Single','2006-03-03',NULL,'student6.jpg'),('MS1412134-132156','Castro','Cassandra Dhenise','Estrada','Female','Single','2005-06-24',NULL,'student7.jpg'),('MS1412139-132133','Carullo','Giellian','Rebesa','Female','Single','2005-04-28',NULL,'student8.jpg'),('MS1412147-746546','Dayrit','Kristine May','Alcantra','Female','Single','2005-07-20',NULL,'student9.jpg'),('MS1412147-897711','Delos Santos','John Mario','Bayrante','Male','Single','2005-07-26',NULL,'student10.jpg'),('MS1412159-651315','De Guzman','Chasie Trinity','Mendez','Female','Single','2005-08-21',NULL,'student1.jpg'),('MS1412178-313131','Domingo','Christine Rhean','Romualdez','Female','Single','2004-07-07',NULL,'student2.jpg'),('MS1412189-416313','Ferrer','Riz','Margareth','Female','Single','2005-01-18',NULL,'student3.jpg'),('MS1412225-564611','Manalili','Ashley Nicole','Duran','Female','Single','2005-09-24',NULL,'student4.jpg'),('MS1412236-798777','Casacop','Deniell Reye','Vitug','Male','Single','2005-05-13',NULL,'student5.jpg'),('MS1501250-697060','hgjg','ghj','ghj','Male','Single','2015-01-14','ghj','City5040.jpg'),('MS1501254-949394','sd','asdf','ad','Male','Single','2015-01-06','df','Animal-Leopard.jpg'),('MS1501255-947752','xcvb','cvb','cvb','Male','Single','2015-01-07','cvb','City5024.jpg'),('MS1501256-566584','k','j','j','Male','Single','2015-01-13','j','CG-Dog Bear Man.jpg'),('MS1501256-903231','t','t','','Male','Single','2015-01-13','t','Cartoon-Cat Blue.jpg'),('MS1501275-432925','sdf','ssadgfd','','Male','Single','2015-01-20','','Lush_Summer1024_768.jpg'),('MS1501300-259794','tyuty','tyu','tyu','Female','Single','2015-01-14','tyutyutyutyutu','City5328.jpg'),('MS1501301-182038','sdfgsdfg','sdfgsdfg','sdfgsdfg','Male','Single','2015-01-20','sdfgsdfg','Nature5093.jpg'),('MS1502019-863997','yayay','blanca','s','Male','Widowed','2015-02-02','dsfasdf','Follow.jpg'),('MT1411303-788915','Musashi','Miyamoto','Genbei','Male','Single','1960-06-07','Japan','avatar04.png'),('MT1411303-789121','Arandia','Emilia Eliza','Eda','Female','Married','1957-09-12','null','avatar2.png'),('MT1501256-768569','Sirauloxdfgdf','Atom','Neutron','Male','Single','2015-01-16','Jengjeng5','CG-Atom.jpg'),('MT1501277-419740','sdfa','sdfgasdg','sdgf','asdg','Single','2015-01-20','sadg','Green_with_Envy1024_768.jpg'),('MT1501305-574371','wer','wer','wer','Female','Married','2015-01-14','wer','City5477.jpg'),('MT1502013-420006','asdf','fsadf','asdf','Male','Married','2015-02-12','asdf','waterfalls.jpg');
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
  `class_rec_no` varchar(10) NOT NULL,
  `sectionID` varchar(6) DEFAULT NULL,
  `sched_days` varchar(7) DEFAULT NULL,
  `sched_start_time` time DEFAULT NULL,
  `sched_end_time` time DEFAULT NULL,
  `subjectID` varchar(8) DEFAULT NULL,
  `teacherID` varchar(16) DEFAULT NULL,
  `levelID` varchar(5) DEFAULT NULL,
  `roomNo` varchar(10) DEFAULT NULL,
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
INSERT INTO `section` VALUES ('ECRN-23165','S00005','MWF','09:00:00','10:00:00','EAS-0003','MT1411303-788915','G0003','654'),('ECRN-54544','S00009','MWF','13:00:00','14:00:00','EAS-0005','MT1411303-789121','G0003','879'),('ECRN-54644','S00008','MWF','10:00:00','11:00:00','EAS-0004','MT1411303-789121','G0003','777'),('ECRN-79542','S00002','MWF','07:00:00','08:00:00','EAS-0001','MT1411303-789121','G0003','322'),('ECRN-89462','S00003','TTH','10:00:00','11:00:00','EAS-0005','MT1411303-789121','G0003','891'),('ECRN-89544','S00010','MWF','14:00:00','15:00:00','EAS-0006','MT1411303-789121','G0003','891'),('ECRN-89755','S00003','MWF','08:00:00','09:00:00','EAS-0002','MT1411303-789121','G0003','447'),('ECRN-89847','S00003','TTH','09:00:00','10:00:00','EAS-0001','MT1411303-789121','G0003','895'),('ECRN-91165','S00001','TTH','08:00:00','09:00:00','EAS-0003','MT1411303-789121','G0002','891');
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
  PRIMARY KEY (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_list`
--

LOCK TABLES `section_list` WRITE;
/*!40000 ALTER TABLE `section_list` DISABLE KEYS */;
INSERT INTO `section_list` VALUES ('S00001','1','Carinosa'),('S00002','1','Rizal'),('S00003','2','Bonifacio'),('S00004','2','Waltz'),('S00005','3','Mabini'),('S00006','3','Tango'),('S00007','4','Folkdance'),('S00008','4','Sampaguita'),('S00009','5','Gumamela'),('S00010','6','Santan'),('S60873','1','Hitler'),('S77326','5','dgsdfgsdf');
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
INSERT INTO `student` VALUES ('MS1401011-436135',NULL),('MS1401035-465413',NULL),('MS1403176-798463',NULL),('MS1404219-765416',NULL),('MS1407205-132132',NULL),('MS1407228-685641',NULL),('MS1408149-436566',NULL),('MS1408213-131313',NULL),('MS1409296-136131',NULL),('MS1410109-413125',NULL),('MS1412027-894643',NULL),('MS1412034-897411',NULL),('MS1412045-798461',NULL),('MS1412057-798461',NULL),('MS1412067-465133',NULL),('MS1412067-798423',NULL),('MS1412078-893214',NULL),('MS1412083-789913',NULL),('MS1412085-456113',NULL),('MS1412087-789411',NULL),('MS1412093-456554',NULL),('MS1412093-791613',NULL),('MS1412107-654313',NULL),('MS1412121-436111',NULL),('MS1412128-132132',NULL),('MS1412134-132156',NULL),('MS1412139-132133',NULL),('MS1412147-746546',NULL),('MS1412159-651315',NULL),('MS1412178-313131',NULL),('MS1412189-416313',NULL),('MS1412225-564611',NULL),('MS1411301-657755','MP1411304-789451'),('MS1412039-789777','MP1411304-789451'),('MS1412067-978989','MP1411304-789451'),('MS1412075-546651','MP1411304-789451'),('MS1412078-784265','MP1411304-789451'),('MS1412081-655155','MP1411304-789451'),('MS1412092-878789','MP1411304-789451'),('MS1412108-416511','MP1411304-789451'),('MS1412110-611233','MP1411304-789451'),('MS1412147-897711','MP1411304-789451'),('MS1412236-798777','MP1411304-789451'),('MS1501255-947752','MP1501254-192288'),('MS1501250-697060','MP1501259-365224'),('MS1501275-432925','MP1501273-874947'),('MS1501300-259794','MP1501305-323805'),('MS1501301-182038','MP1501308-923519'),('MS1502019-863997','MP1502019-296839');
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
INSERT INTO `student_rating` VALUES ('GR-1202157','MS1411301-657755','ECRN-89462','1st',2,100,100,100,100,100,'A'),('GR-1425374','MS1412085-456113','ECRN-89462','1st',1,70,70,70,70,70,'B'),('GR-1520966','MS1411301-657755','ECRN-89847','2nd',4,98,85,74,55,74.65,'D'),('GR-1544915','MS1411301-657755','ECRN-89847','1st',5,50,51,52,53,54,'B'),('GR-1548177','MS1411301-657755','ECRN-89847','1st',1,90,90,90,90,90,'A'),('GR-1631797','MS1411301-657755','ECRN-89847','2nd',5,69,68,67,52,63.05,'B'),('GR-1693461','MS1411301-657755','ECRN-89847','3rd',1,25,10,15,30,19.75,'B'),('GR-1795438','MS1412057-798461','ECRN-89847','1st',1,73,73,73,73,73,'B'),('GR-1914941','MS1411301-657755','ECRN-89462','3rd',3,10,9,8,6,7.95,'B'),('GR-1917316','MS1411301-657755','ECRN-89462','1st',1,100,100,100,100,100,'A'),('GR-1942187','MS1411301-657755','ECRN-89847','2nd',6,30,25,15,50,30.25,'B'),('GR-2072741','MS1401011-436135','ECRN-79542','1st',1,85,84,86,82,84.15,'P'),('GR-2191899','MS1411301-657755','ECRN-91165','1st',7,94,93,92,99,94.65,'A'),('GR-2281214','MS1412057-798461','ECRN-89847','1st',2,90,90,90,90,90,'A'),('GR-3155516','MS1411301-657755','ECRN-89847','4th',1,50,10,99,100,69.7,'B'),('GR-3195718','MS1411301-657755','ECRN-89462','3rd',2,100,90,75,55,76.5,'D'),('GR-3284939','MS1411301-657755','ECRN-89462','2nd',2,100,90,70,40,70.5,'B'),('GR-3704030','MS1401011-436135','ECRN-79542','3rd',1,89,90,90,90,89.85,'A'),('GR-3709629','MS1411301-657755','ECRN-89462','2nd',1,100,50,40,20,45.5,'B'),('GR-3772761','MS1411301-657755','ECRN-89847','1st',6,60,61,62,63,64,'B'),('GR-3792792','MS1401011-436135','ECRN-79542','1st',4,90,95,95,95,94.25,'A'),('GR-3838611','MS1401011-436135','ECRN-79542','1st',3,100,100,100,100,100,'A'),('GR-4199509','MS1411301-657755','ECRN-89847','3rd',2,100,99,98,99,98.85,'A'),('GR-4740822','MS1411301-657755','ECRN-89847','1st',3,30,31,32,33,34,'B'),('GR-5389730','MS1411301-657755','ECRN-89847','2nd',1,85,85,84,80,83.2,'AP'),('GR-5799113','MS1411301-657755','ECRN-89462','4th',1,90,91,92,93,91.75,'A'),('GR-6054908','MS1411301-657755','ECRN-89847','1st',2,20,21,22,23,24,'B'),('GR-6172842','MS1412045-798461','ECRN-89847','1st',1,85,90.6,85.5,90,88.05,'P'),('GR-6263719','MS1411301-657755','ECRN-89462','3rd',5,7,7,7,7,7,'B'),('GR-7576221','MS1411301-657755','ECRN-89462','4th',4,70,70,70,70,70,'B'),('GR-8075021','MS1411301-657755','ECRN-89847','1st',4,40,41,42,43,44,'B'),('GR-8262986','MS1401011-436135','ECRN-79542','1st',2,88,73,89,56,74.95,'D'),('GR-8476710','MS1412045-798461','ECRN-89462','1st',1,70,90,90,80,84,'AP'),('GR-8610677','MS1411301-657755','ECRN-89462','3rd',4,100,100,100,100,100,'A'),('GR-9774750','MS1411301-657755','ECRN-89847','2nd',2,83,82,82,82,82.15,'AP'),('GR-9999922','MS1411301-657755','ECRN-89847','2nd',3,90,89,88,86,87.95,'P');
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
INSERT INTO `student_schedule_line` VALUES ('ECRN-79542','MS1401011-436135','Grade 3'),('ECRN-79542','MS1401035-465413','Grade 3'),('ECRN-79542','MS1403176-798463','Grade 3'),('ECRN-79542','MS1404219-765416','Grade 3'),('ECRN-79542','MS1412034-897411','Grade 3'),('ECRN-79542','MS1412039-789777','Grade 3'),('ECRN-79542','MS1412067-798423','Grade 3'),('ECRN-79542','MS1412067-978989','Grade 3'),('ECRN-79542','MS1412075-546651','Grade 3'),('ECRN-79542','MS1412078-784265','Grade 3'),('ECRN-79542','MS1412078-893214','Grade 3'),('ECRN-79542','MS1412081-655155','Grade 3'),('ECRN-79542','MS1412083-789913','Grade 3'),('ECRN-79542','MS1412087-789411','Grade 3'),('ECRN-79542','MS1412092-878789','Grade 3'),('ECRN-79542','MS1412093-456554','Grade 3'),('ECRN-79542','MS1412108-416511','Grade 3'),('ECRN-79542','MS1412110-611233','Grade 3'),('ECRN-79542','MS1412121-436111','Grade 3'),('ECRN-79542','MS1412128-132132','Grade 3'),('ECRN-79542','MS1412134-132156','Grade 3'),('ECRN-79542','MS1412139-132133','Grade 3'),('ECRN-79542','MS1412147-746546','Grade 3'),('ECRN-79542','MS1412147-897711','Grade 3'),('ECRN-79542','MS1412159-651315','Grade 3'),('ECRN-79542','MS1412178-313131','Grade 3'),('ECRN-79542','MS1412189-416313','Grade 3'),('ECRN-79542','MS1412236-798777','Grade 3'),('ECRN-89462','MS1411301-657755','Grade 3'),('ECRN-89462','MS1412045-798461','Grade 3'),('ECRN-89462','MS1412057-798461','Grade 3'),('ECRN-89462','MS1412067-465133','Grade 3'),('ECRN-89462','MS1412085-456113','Grade 3'),('ECRN-89462','MS1412093-791613','Grade 3'),('ECRN-89462','MS1412107-654313','Grade 3'),('ECRN-89462','MS1412225-564611','Grade 3'),('ECRN-89755','MS1412045-798461','Grade 3'),('ECRN-89755','MS1412057-798461','Grade 3'),('ECRN-89755','MS1412067-465133','Grade 3'),('ECRN-89755','MS1412085-456113','Grade 3'),('ECRN-89755','MS1412093-791613','Grade 3'),('ECRN-89755','MS1412107-654313','Grade 3'),('ECRN-89755','MS1412225-564611','Grade 3'),('ECRN-89847','MS1411301-657755','Grade 3'),('ECRN-89847','MS1412045-798461','Grade 3'),('ECRN-89847','MS1412057-798461','Grade 3'),('ECRN-89847','MS1412067-465133','Grade 3'),('ECRN-89847','MS1412085-456113','Grade 3'),('ECRN-89847','MS1412093-791613','Grade 3'),('ECRN-89847','MS1412107-654313','Grade 3'),('ECRN-89847','MS1412225-564611','Grade 3'),('ECRN-91165','MS1407205-132132','Grade 2'),('ECRN-91165','MS1407228-685641','Grade 2'),('ECRN-91165','MS1408149-436566','Grade 2'),('ECRN-91165','MS1408213-131313','Grade 2'),('ECRN-91165','MS1409296-136131','Grade 2'),('ECRN-91165','MS1410109-413125','Grade 2'),('ECRN-91165','MS1411301-657755','Grade 2'),('ECRN-91165','MS1412027-894643','Grade 2');
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
INSERT INTO `subject_` VALUES ('EAS-0001','Math'),('EAS-0002','English'),('EAS-0003','Science'),('EAS-0004','Hekasi'),('EAS-0005','PE'),('EAS-0006','GMRC'),('EAS-1867','dsfgsdfgsdfgsdfg'),('EAS-5078','nmbnmbmnb'),('EAS-6085','asdfsdf'),('EAS-9855','argfsdfg');
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
  `feedback_message` varchar(500) DEFAULT NULL,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-06 20:53:19
