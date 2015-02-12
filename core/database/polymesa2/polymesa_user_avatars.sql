CREATE DATABASE  IF NOT EXISTS `polymesa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `polymesa`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: polymesa
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `user_avatars`
--

DROP TABLE IF EXISTS `user_avatars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_avatars` (
  `avatars_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photo_path` varchar(600) DEFAULT NULL,
  `DateMade` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`avatars_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_avatars`
--

LOCK TABLES `user_avatars` WRITE;
/*!40000 ALTER TABLE `user_avatars` DISABLE KEYS */;
INSERT INTO `user_avatars` VALUES (4,11,'img/avatars//8969cdd41b0d5daa711929356696120b.jpg','2014-12-31 03:19:57',1),(5,11,'img/avatars//623e4886aa46943395b003f7f62ce4cf.jpg','2014-12-31 03:36:20',0),(7,11,'img/avatars//c41ac370ff9bd8e8e584d5514d4d75ab.jpg','2014-12-31 04:12:30',0),(10,11,'img/avatars//5f644a432edd8ebf7275e48a179b4f51.jpg','2014-12-31 05:43:29',0),(11,11,'img/avatars//efe37c0846c840c6f756f8d61b6a6880.jpg','2014-12-31 05:44:53',0),(12,11,'img/avatars//39d8603681c10bcb3ef827df33bd58b2.jpg','2014-12-31 05:48:52',0);
/*!40000 ALTER TABLE `user_avatars` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-31  7:54:58
