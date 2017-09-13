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
-- Table structure for table `anguilla`
--

DROP TABLE IF EXISTS `anguilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anguilla` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(21) DEFAULT NULL,
  `mapref_latitude` char(4) DEFAULT NULL,
  `mapref_longitude` char(4) DEFAULT NULL,
  `Latitude_Float` float DEFAULT NULL,
  `Longitude_Float` float DEFAULT NULL,
  `Altitude_Feet` int(11) DEFAULT NULL,
  `Altitude_Meters` int(11) DEFAULT NULL,
  `Postcode` varchar(15) NOT NULL DEFAULT '',
  `State` varchar(64) NOT NULL DEFAULT '',
  `Population` mediumint(21) NOT NULL DEFAULT '0',
  `Venues` mediumint(21) NOT NULL DEFAULT '0',
  `Details` mediumint(21) NOT NULL DEFAULT '0',
  `Updates` mediumint(21) NOT NULL DEFAULT '0',
  `Hits` mediumint(21) NOT NULL DEFAULT '0',
  `GoogleID` varchar(196) NOT NULL DEFAULT '0',
  `PagesNumber` int(12) NOT NULL DEFAULT '0',
  `Last` int(12) NOT NULL DEFAULT '0',
  `Next` int(12) NOT NULL DEFAULT '0',
  `Action` int(12) NOT NULL DEFAULT '0',
  `data` tinytext,
  PRIMARY KEY (`CordID`),
  KEY `SEARCH` (`CountryID`,`RegionName`(15),`mapref_latitude`(3),`mapref_longitude`(3),`Latitude_Float`,`Longitude_Float`),
  KEY `NUMBERS` (`Latitude_Float`,`Longitude_Float`,`Altitude_Feet`,`Altitude_Meters`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anguilla`
--

LOCK TABLES `anguilla` WRITE;
/*!40000 ALTER TABLE `anguilla` DISABLE KEYS */;
INSERT INTO `anguilla` VALUES (1,6,'unknown','Anguilla','18N','63W',18.2167,-63.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,6,'unknown','Anguillita Island','18N','63W',18.15,-63.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,6,'unknown','Bethel','18N','63W',18.2,-63.1,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,6,'unknown','Betty Hill','18N','63W',18.2167,-63,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,6,'unknown','Blowing Point Village','18N','63W',18.1667,-63.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,6,'unknown','Cannifist','18N','63W',18.2333,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,6,'unknown','Cauls Bottom','18N','63W',18.2167,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,6,'unknown','Chalvilles','18N','63W',18.2333,-63,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,6,'unknown','Crocus Hill','18N','63W',18.2167,-63.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,6,'unknown','Deadman\'s Cay','18N','62W',18.2833,-62.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,6,'unknown','Deep Waters','18N','63W',18.2333,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,6,'unknown','Dog Island','18N','63W',18.2833,-63.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,6,'unknown','Dog Islet','18N','63W',18.2833,-63.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,6,'unknown','East Cay','18N','63W',18.2833,-63.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,6,'unknown','East End Village','18N','63W',18.2333,-63,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,6,'unknown','East End','18N','63W',18.2333,-63,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,6,'unknown','Ebenezer','18N','63W',18.2167,-63.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,6,'unknown','George Hill','18N','63W',18.2,-63.0667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,6,'unknown','Hat Island','18N','63W',18.6,-63.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,6,'unknown','Island Harbour','18N','63W',18.25,-63,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,6,'unknown','Junks Hole','18N','62W',18.25,-62.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,6,'unknown','Little Dicks','18N','63W',18.2333,-63.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,6,'unknown','Little Dix','18N','63W',18.2333,-63.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,6,'unknown','Little Island','18N','62W',18.2333,-62.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,6,'unknown','Little Scrub Island','18N','62W',18.3,-62.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,6,'unknown','Little Scrub Islet','18N','62W',18.3,-62.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,6,'unknown','Long Bay Village','18N','63W',18.1833,-63.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,6,'unknown','Long Ground','18N','63W',18.2,-63.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,6,'unknown','Long Path','18N','63W',18.2167,-63.0167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,6,'unknown','Lower South Hill','18N','63W',18.1833,-63.1,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,6,'unknown','Mahogany Tree','18N','63W',18.2,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,6,'unknown','Mid Cay','18N','63W',18.2833,-63.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,6,'unknown','Mount Fortune','18N','62W',18.2333,-62.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,6,'unknown','North Hill Village','18N','63W',18.2,-63.0667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,6,'unknown','North Side','18N','63W',18.2167,-63.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,6,'unknown','Prickley Pear Cays','18N','63W',18.2667,-63.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,6,'unknown','Prickly Pear Cays','18N','63W',18.2667,-63.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,6,'unknown','Rey Hill','18N','63W',18.2,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,6,'unknown','Saint Mary\'s','18N','63W',18.2167,-63.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,6,'unknown','Sand Island','18N','63W',18.2167,-63.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,6,'unknown','Sandy Ground Village','18N','63W',18.2,-63.0833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,6,'unknown','Sandy Island','18N','63W',18.2167,-63.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,6,'unknown','Scilly Cay','18N','63W',18.25,-63,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,6,'unknown','Scrub Island','18N','62W',18.2833,-62.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,6,'unknown','Scrub Island','18N','62W',18.2833,-62.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,6,'unknown','Scrub Islet','18N','62W',18.2833,-62.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,6,'unknown','Seal Islands','18N','63W',18.2667,-63.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,6,'unknown','Seal Island','18N','63W',18.2667,-63.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,6,'unknown','Seal Islets','18N','63W',18.2667,-63.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,6,'unknown','Shoal Bay Village','18N','63W',18.25,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,6,'unknown','Shoal Village','18N','63W',18.25,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,6,'unknown','Sombrero Island','18N','63W',18.6,-63.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,6,'unknown','Sombrero','18N','63W',18.6,-63.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,6,'unknown','South Hill Village','18N','63W',18.1833,-63.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,6,'unknown','South Wager','18N','63W',18.1667,-63.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,6,'unknown','Stoney Ground','18N','63W',18.2167,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,6,'unknown','The Copse','18N','62W',18.2167,-62.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,6,'unknown','The Farrington','18N','63W',18.2,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,6,'unknown','The Forest','18N','63W',18.2,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,6,'unknown','The Quarter','18N','63W',18.2,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,6,'unknown','The Valley','18N','63W',18.2167,-63.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,6,'unknown','Valley','18N','63W',18.2167,-63.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,6,'unknown','Wall Blake Airport','18N','63W',18.2,-63.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,6,'unknown','Wallblake','18N','63W',18.2,-63.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,6,'unknown','Wattices','18N','63W',18.2167,-63.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,6,'unknown','Welches Hill','18N','63W',18.2333,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,6,'unknown','Welches','18N','63W',18.2333,-63.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,6,'unknown','West Cay','18N','63W',18.2667,-63.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,6,'unknown','West End Village','18N','63W',18.1667,-63.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,6,'unknown','White Hill','18N','63W',18.25,-63,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `anguilla` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:19:38
