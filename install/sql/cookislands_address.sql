-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: geospatial
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.10.1

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
-- Table structure for table `cookislands_address`
--

DROP TABLE IF EXISTS `cookislands_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cookislands_address` (
  `AddressID` mediumint(22) unsigned NOT NULL AUTO_INCREMENT,
  `CordID` int(11) DEFAULT '0',
  `CountryID` int(11) DEFAULT '0',
  `Types` varchar(255) NOT NULL DEFAULT '',
  `Unit` varchar(10) NOT NULL DEFAULT '',
  `Building` varchar(10) NOT NULL DEFAULT '',
  `Street` varchar(64) NOT NULL DEFAULT '',
  `Suburb` varchar(64) NOT NULL DEFAULT '',
  `State` varchar(64) NOT NULL DEFAULT '',
  `Country` varchar(64) NOT NULL DEFAULT '',
  `Country_ISO2` varchar(2) NOT NULL DEFAULT '',
  `Postcode` varchar(20) NOT NULL DEFAULT '',
  `Council` varchar(255) NOT NULL DEFAULT '',
  `GoogleID` varchar(255) NOT NULL DEFAULT '',
  `Longitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `Latitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `View_NE_Longitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `View_NE_Latitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `View_SW_Longitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `View_SW_Latitude` float(29,11) NOT NULL DEFAULT '0.00000000000',
  `Formatted` varchar(255) NOT NULL DEFAULT '',
  `Created` int(11) DEFAULT '0',
  PRIMARY KEY (`AddressID`),
  KEY `SEARCH` (`AddressID`,`CordID`,`CountryID`,`Types`,`Unit`,`Suburb`,`Building`,`State`,`Postcode`,`Street`,`Longitude`,`Latitude`) USING BTREE KEY_BLOCK_SIZE=16
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cookislands_address`
--

LOCK TABLES `cookislands_address` WRITE;
/*!40000 ALTER TABLE `cookislands_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `cookislands_address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:21:43
