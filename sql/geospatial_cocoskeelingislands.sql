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
-- Table structure for table `cocoskeelingislands`
--

DROP TABLE IF EXISTS `cocoskeelingislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cocoskeelingislands` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(37) DEFAULT NULL,
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
  KEY `SEARCH` (`CordID`,`CountryID`,`Latitude_Float`,`Longitude_Float`,`Altitude_Feet`,`Altitude_Meters`,`mapref_latitude`,`mapref_longitude`) USING BTREE KEY_BLOCK_SIZE=16,
  KEY `NAMING-ONE` (`CordID`,`CountryID`,`RegionName`(1)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TWO` (`CordID`,`CountryID`,`RegionName`(2)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-THREE` (`CordID`,`CountryID`,`RegionName`(3)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FOUR` (`CordID`,`CountryID`,`RegionName`(4)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FIVE` (`CordID`,`CountryID`,`RegionName`(5)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-SIX` (`CordID`,`CountryID`,`RegionName`(6)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-SEVEN` (`CordID`,`CountryID`,`RegionName`(7)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-EIGHT` (`CordID`,`CountryID`,`RegionName`(8)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-NINE` (`CordID`,`CountryID`,`RegionName`(9)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TEN` (`CordID`,`CountryID`,`RegionName`(10)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-ELEVEN` (`CordID`,`CountryID`,`RegionName`(11)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TWELVE` (`CordID`,`CountryID`,`RegionName`(12)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-THIRTEEN` (`CordID`,`CountryID`,`RegionName`(13)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FOURTEEN` (`CordID`,`CountryID`,`RegionName`(14)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FIFTHTEEN` (`CordID`,`CountryID`,`RegionName`(15)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `ALPHABET` (`CordID`,`CountryID`,`RegionName`,`Latitude_Float`,`Longitude_Float`,`Altitude_Feet`,`Altitude_Meters`,`mapref_latitude`,`mapref_longitude`) USING BTREE KEY_BLOCK_SIZE=16
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cocoskeelingislands`
--

LOCK TABLES `cocoskeelingislands` WRITE;
/*!40000 ALTER TABLE `cocoskeelingislands` DISABLE KEYS */;
INSERT INTO `cocoskeelingislands` VALUES (1,45,'unknown','Ampang Kechil, Pulo','12S','96E',-12.125,96.9028,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,45,'unknown','Ampang Kechil, Pulu','12S','96E',-12.125,96.9028,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,45,'unknown','Ampang, Pulo','12S','96E',-12.1278,96.9042,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,45,'unknown','Ampang, Pulu','12S','96E',-12.1278,96.9042,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,45,'unknown','Atas, Pulo','12S','96E',-12.2,96.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,45,'unknown','Bantam Village','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,45,'unknown','Blan Madar, Pulo','12S','96E',-12.2,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,45,'unknown','Blan, Pulo','12S','96E',-12.1833,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,45,'unknown','Blekok, Pulu','12S','96E',-12.1306,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,45,'unknown','Blukok, Pulo','12S','96E',-12.1306,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,45,'unknown','Burial Island','12S','96E',-12.2,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,45,'unknown','Cheplok, Pulo','12S','96E',-12.1333,96.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,45,'unknown','Clunie Island','12S','96E',-12.1,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,45,'unknown','Clunies Ross Island','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,45,'unknown','Clunies Ross','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,45,'unknown','Cocos (Keeling) Islands, Territory of','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,45,'unknown','Territory of','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,45,'unknown','Cocos (Keeling) Islands','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,45,'unknown','Cocos Islands','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,45,'unknown','Cocos-Keeling Islands','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,45,'unknown','Direction Island','12S','96E',-12.1,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,45,'unknown','East Cay','12S','96E',-12.1833,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,45,'unknown','Gangsa, Pulo','12S','96E',-12.1,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,45,'unknown','Gooseberry Island','12S','96E',-12.1333,96.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,45,'unknown','Home Island','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,45,'unknown','Horsburgh Island','12S','96E',-12.0667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,45,'unknown','Jambatan, Pulo','12S','96E',-12.15,96.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,45,'unknown','Kambang, Pulo','12S','96E',-12.1333,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,45,'unknown','Kambling, Pulo','12S','96E',-12.1833,96.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,45,'unknown','Keeling Islands','12S','96E',-12,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,45,'unknown','Kembang, Pulu','12S','96E',-12.1333,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,45,'unknown','Klapa Sato','12S','96E',-12.2,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,45,'unknown','Klapa Satu, Pulo','12S','96E',-12.2,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,45,'unknown','Labu, Pulo','12S','96E',-12.1583,96.9181,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,45,'unknown','Labu, Pulu','12S','96E',-12.1583,96.9181,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,45,'unknown','Luar, Pulo','12S','96E',-12.0667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,45,'unknown','Maria, Pulo','12S','96E',-12.1833,96.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,45,'unknown','New Selma Island','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,45,'unknown','New Selma','12S','96E',-12.1167,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,45,'unknown','North Keeling Island','11S','96E',-11.8333,96.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,45,'unknown','North Keeling','11S','96E',-11.8333,96.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,45,'unknown','Pandang, Pulo','12S','96E',-12.1333,96.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,45,'unknown','Panjang, Pulo','12S','96E',-12.1667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,45,'unknown','Prison Island','12S','96E',-12.1,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,45,'unknown','Ross Island','12S','96E',-12.1667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,45,'unknown','Ross','12S','96E',-12.1667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,45,'unknown','Selima Island','12S','96E',-12.2,96.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,45,'unknown','Selma Island','12S','96E',-12.2,96.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,45,'unknown','Selma','12S','96E',-12.2,96.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,45,'unknown','Siput, Pulo','12S','96E',-12.15,96.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,45,'unknown','South Island','12S','96E',-12.2,96.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,45,'unknown','South Keeling Islands','12S','96E',-12.15,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,45,'unknown','South Keeling Island','12S','96E',-12.15,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,45,'unknown','South Keeling','12S','96E',-12.15,96.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,45,'unknown','Wa-idas, Pulo','12S','96E',-12.1292,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,45,'unknown','Wa-idas, Pulu','12S','96E',-12.1292,96.9069,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,45,'unknown','West Cay','12S','96E',-12.1833,96.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,45,'unknown','West Island','12S','96E',-12.1667,96.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,45,'unknown','Workhouse Island','12S','96E',-12.1,96.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `cocoskeelingislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:15:53
