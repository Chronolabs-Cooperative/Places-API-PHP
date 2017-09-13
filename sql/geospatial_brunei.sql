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
-- Table structure for table `brunei`
--

DROP TABLE IF EXISTS `brunei`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brunei` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(29) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brunei`
--

LOCK TABLES `brunei` WRITE;
/*!40000 ALTER TABLE `brunei` DISABLE KEYS */;
INSERT INTO `brunei` VALUES (1,30,'unknown','Abang','4N','114E',4.7,114.683,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,30,'unknown','Abang','4N','114E',4.7,114.683,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,30,'unknown','Anduki Airport','4N','114E',4.6333,114.383,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,30,'unknown','Abang','4N','114E',4.7,114.683,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,30,'unknown','Anduki Airport','4N','114E',4.6333,114.383,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,30,'unknown','Asiatic Archipelago','0S','120E',0,120,501,153,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,30,'unknown','Anduki Airport','4N','114E',4.6333,114.383,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,30,'unknown','Asiatic Archipelago','0S','120E',0,120,501,153,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,30,'unknown','Badukang Island','4N','115E',4.9833,115.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,30,'unknown','Asiatic Archipelago','0S','120E',0,120,501,153,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,30,'unknown','Badukang Island','4N','115E',4.9833,115.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,30,'unknown','Bandar Seri Begawan','4N','114E',4.8833,114.933,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,30,'unknown','Badukang Island','4N','115E',4.9833,115.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,30,'unknown','Bandar Seri Begawan','4N','114E',4.8833,114.933,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,30,'unknown','Bandong','4N','114E',4.8833,114.767,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,30,'unknown','Bandar Seri Begawan','4N','114E',4.8833,114.933,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,30,'unknown','Bandong','4N','114E',4.8833,114.767,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,30,'unknown','Bang Pangan','4N','114E',4.65,114.633,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,30,'unknown','Bandong','4N','114E',4.8833,114.767,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,30,'unknown','Bang Pangan','4N','114E',4.65,114.633,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,30,'unknown','Bang Tangur','4N','114E',4.6167,114.6,170,52,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,30,'unknown','Bang Pangan','4N','114E',4.65,114.633,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,30,'unknown','Bang Tangur','4N','114E',4.6167,114.6,170,52,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,30,'unknown','Bangar','4N','115E',4.7167,115.067,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,30,'unknown','Bang Tangur','4N','114E',4.6167,114.6,170,52,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,30,'unknown','Bangar','4N','115E',4.7167,115.067,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,30,'unknown','Barbunot Island','4N','115E',4.8833,115.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,30,'unknown','Bangar','4N','115E',4.7167,115.067,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,30,'unknown','Barbunot Island','4N','115E',4.8833,115.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,30,'unknown','Baru Baru Islands','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,30,'unknown','Barbunot Island','4N','115E',4.8833,115.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,30,'unknown','Baru Baru Islands','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,30,'unknown','Baru Baru, Pulau','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,30,'unknown','Baru Baru Islands','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,30,'unknown','Baru Baru, Pulau','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,30,'unknown','Batu Apoi','4N','115E',4.7,115.1,344,105,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,30,'unknown','Baru Baru, Pulau','4N','115E',4.9,115.033,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,30,'unknown','Batu Apoi','4N','115E',4.7,115.1,344,105,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,30,'unknown','Batu Batam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,30,'unknown','Batu Apoi','4N','115E',4.7,115.1,344,105,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,30,'unknown','Batu Batam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,30,'unknown','Batu Patam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,30,'unknown','Batu Batam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,30,'unknown','Batu Patam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,30,'unknown','Bedawan Mountain','4N','114E',4.5,114.817,1223,373,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,30,'unknown','Batu Patam, Bukit','4N','114E',4.0667,114.733,718,219,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,30,'unknown','Bedawan Mountain','4N','114E',4.5,114.817,1223,373,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,30,'unknown','Bedawan, Bukit','4N','114E',4.5,114.817,1223,373,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,30,'unknown','Bedawan Mountain','4N','114E',4.5,114.817,1223,373,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,30,'unknown','Bedawan, Bukit','4N','114E',4.5,114.817,1223,373,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `brunei` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:25:30
