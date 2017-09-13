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
-- Table structure for table `liechtenstein`
--

DROP TABLE IF EXISTS `liechtenstein`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liechtenstein` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(30) DEFAULT NULL,
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
-- Dumping data for table `liechtenstein`
--

LOCK TABLES `liechtenstein` WRITE;
/*!40000 ALTER TABLE `liechtenstein` DISABLE KEYS */;
INSERT INTO `liechtenstein` VALUES (1,116,'unknown','Balzers','47N','9E',47.0667,9.5,1650,503,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,116,'unknown','Bendern','47N','9E',47.2167,9.5,1515,462,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,116,'unknown','Blanken','47N','9E',47.1833,9.5333,2988,911,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,116,'unknown','Drei Schwestern','47N','9E',47.1667,9.55,6036,1840,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,116,'unknown','Drey Schwestern','47N','9E',47.1667,9.55,6036,1840,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,116,'unknown','Enderlin Horn','47N','9E',47.05,9.5667,6679,2036,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,116,'unknown','Eschen','47N','9E',47.2167,9.5167,1519,463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,116,'unknown','Falknis Horn','47N','9E',47.05,9.5667,6679,2036,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,116,'unknown','Falknis','47N','9E',47.05,9.5667,6679,2036,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,116,'unknown','Frastanzer Sand','47N','9E',47.2,9.5833,3297,1005,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,116,'unknown','F','47N','9E',47.1333,9.55,4799,1463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,116,'unknown','Gallinakopf','47N','9E',47.15,9.6167,5784,1763,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,116,'unknown','Gambrin','47N','9E',47.2167,9.5,1515,462,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,116,'unknown','Gamprin','47N','9E',47.2167,9.5,1515,462,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,116,'unknown','Garsellakopf','47N','9E',47.1667,9.5667,4284,1306,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,116,'unknown','Grauspitz','47N','9E',47.05,9.5833,6932,2113,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,116,'unknown','Hinter-Grauspitz','47N','9E',47.05,9.5833,6932,2113,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,116,'unknown','Hinterer Schellenberg','47N','9E',47.2333,9.5333,1991,607,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,116,'unknown','Lichtenstein','47N','9E',47.1667,9.5333,4120,1256,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,116,'unknown','Liechtenstein, F','47N','9E',47.1667,9.5333,4120,1256,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,116,'unknown','Liechtenstein, Principality of','47N','9E',47.1667,9.5333,4120,1256,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,116,'unknown','of','47N','9E',47.1667,9.5333,4120,1256,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,116,'unknown','Liechtenstein','47N','9E',47.1667,9.5333,4120,1256,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,116,'unknown','Matler Kopf','47N','9E',47.1333,9.6333,5728,1746,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,116,'unknown','Mauern','47N','9E',47.2167,9.5333,1430,436,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,116,'unknown','Mauren','47N','9E',47.2167,9.5333,1430,436,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,116,'unknown','Mittlerer Schellenberg','47N','9E',47.2333,9.5333,1991,607,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,116,'unknown','Naafkopf','47N','9E',47.05,9.6,6003,1830,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,116,'unknown','Nauf Kopf','47N','9E',47.05,9.6,6003,1830,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,116,'unknown','Nendeln','47N','9E',47.2,9.55,3001,915,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,116,'unknown','Ochsenberg','47N','9E',47.1167,9.6333,4885,1489,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,116,'unknown','Ochsenkopf','47N','9E',47.1167,9.6333,4885,1489,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,116,'unknown','Planken','47N','9E',47.1833,9.5333,2988,911,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,116,'unknown','Rhaetikon','47N','9E',47.05,9.75,7208,2197,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,116,'unknown','Rh','47N','9E',47.05,9.75,7208,2197,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,116,'unknown','Rh','47N','9E',47.05,9.75,7208,2197,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,116,'unknown','Rugell','47N','9E',47.2333,9.5167,1768,539,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,116,'unknown','Ruggell','47N','9E',47.2333,9.5167,1768,539,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,116,'unknown','R','47N','9E',47.05,9.75,7208,2197,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,116,'unknown','Schaanwald','47N','9E',47.2167,9.5667,2365,721,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,116,'unknown','Schaan','47N','9E',47.1667,9.5,1482,452,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,116,'unknown','Schan','47N','9E',47.1667,9.5,1482,452,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,116,'unknown','Scheienkopf','47N','9E',47.1333,9.6333,5728,1746,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,116,'unknown','Schellenberg','47N','9E',47.2333,9.5333,1991,607,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,116,'unknown','Scheuenkopf','47N','9E',47.1333,9.6333,5728,1746,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,116,'unknown','Triesenberg','47N','9E',47.1167,9.5333,2877,877,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,116,'unknown','Triesen','47N','9E',47.1,9.5333,2956,901,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,116,'unknown','Vaduz','47N','9E',47.1333,9.5167,1975,602,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,116,'unknown','Vorder-Grauspitz','47N','9E',47.05,9.5833,6932,2113,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,116,'unknown','Vorderer Schellenberg','47N','9E',47.2333,9.5333,1991,607,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `liechtenstein` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:25:16
