CREATE DATABASE  IF NOT EXISTS `botcards` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `botcards`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: database.cooperw.xyz    Database: botcards
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.10.1

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
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `Token` varchar(6) DEFAULT NULL,
  `Piece` varchar(5) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Datetime` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES ('1BB155','11b-2','George','2016.02.01-09:01:00'),('1E654C','11b-2','Mickey','2016.02.01-09:01:02'),('1DE9BB','11b-2','Donald','2016.02.01-09:01:04'),('1BE8FA','11c-0','George','2016.02.01-09:01:06'),('135745','11a-0','Donald','2016.02.01-09:01:08'),('1A2EE5','11c-0','Donald','2016.02.01-09:01:10'),('11F084','11a-1','Donald','2016.02.01-09:01:12'),('1ADF71','11a-1','George','2016.02.01-09:01:14'),('1C292C','11b-0','George','2016.02.01-09:01:16'),('1E095A','11c-2','Donald','2016.02.01-09:01:18'),('132956','11c-0','George','2016.02.01-09:01:20'),('1359B6','11a-0','Mickey','2016.02.01-09:01:22'),('139244','11c-0','George','2016.02.01-09:01:24'),('12072C','11c-0','Henry','2016.02.01-09:01:26'),('1C58FB','11c-2','Donald','2016.02.01-09:01:28'),('11F0C5','11b-1','George','2016.02.01-09:01:30'),('1AB11B','11a-2','Henry','2016.02.01-09:01:32'),('1BB8CC','11b-2','Henry','2016.02.01-09:01:34'),('14338A','11c-0','George','2016.02.01-09:01:36'),('1D17DE','11a-0','George','2016.02.01-09:01:38'),('17DC94','11b-1','George','2016.02.01-09:01:40'),('1E5222','11c-2','Donald','2016.02.01-09:01:42'),('19573B','11a-2','Donald','2016.02.01-09:01:44'),('150417','11b-2','Mickey','2016.02.01-09:01:46'),('1CA087','11c-1','Mickey','2016.02.01-09:01:48'),('154281','11c-0','Donald','2016.02.01-09:01:50'),('10DA3E','11a-1','Mickey','2016.02.01-09:01:52'),('141117','11c-2','Henry','2016.02.01-09:01:54'),('12268C','11b-0','Mickey','2016.02.01-09:01:56');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `Player` varchar(6) DEFAULT NULL,
  `Peanuts` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES ('Mickey',200),('Donald',35),('George',500),('Henry',100);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series` (
  `Series` int(2) DEFAULT NULL,
  `Description` varchar(16) DEFAULT NULL,
  `Frequency` int(3) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (11,'Basic house bots',100,20),(13,'House butlers',50,50),(26,'Home companions',20,200);
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Series` varchar(2) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES ('2016.02.01-09:01:00','Mickey','11','sell'),('2016.02.01-09:01:05','Henry','x','buy'),('2016.02.01-09:01:10','Mickey','x','buy'),('2016.02.01-09:01:15','Donald','13','sell'),('2016.02.01-09:01:20','Donald','x','buy'),('2016.02.01-09:01:25','Donald','x','buy'),('2016.02.01-09:01:30','Donald','x','buy'),('2016.02.01-09:01:35','Donald','x','buy'),('2016.02.01-09:01:40','Henry','x','buy'),('2016.02.01-09:01:45','Donald','22','sell'),('2016.02.01-09:01:50','George','11','sell'),('2016.02.01-09:01:55','George','x','buy'),('2016.02.01-09:01:60','George','x','buy');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-14 10:39:33
