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
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `perioxi` varchar(45) DEFAULT NULL,
  `proastia` varchar(45) DEFAULT NULL,
  `IsOnline` tinyint(1) DEFAULT '1',
  `DisplayOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Αιγάλεω','Δυτικά',1,2),(2,'Περιστέρι','Δυτικά',1,2),(3,'Χαιδάρι','Δυτικά',1,2),(4,'Κορυδαλλός','Δυτικά',1,2),(5,'Νίκαια','Δυτικά',1,2),(6,'Μοναστηράκι','Κέντρο',1,1),(7,'Γκάζι','Κέντρο',1,1),(8,'Σύνταγμα','Κέντρο',1,1),(9,'Αθήνα','Κέντρο',1,1),(10,'Ψυρρή','Κέντρο',1,1),(11,'Γλυφάδα','Νότια',1,3),(12,'Καλαμάκι','Νότια',1,3),(13,'Άλιμος','Νότια',1,3),(14,'Φάληρο','Νότια',1,3),(15,'Γέρακας','Ανατολικά',1,4),(16,'Αγία Παρασκευή','Ανατολικά',1,4),(17,'Παλλήνη','Ανατολικά',1,4),(18,'Κηφισιά','Βόρεια',1,5),(19,'Πεντέλη','Βόρεια',1,5),(20,'Αγία Μαρίνα','Νότια',1,3),(21,NULL,NULL,0,6);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
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
