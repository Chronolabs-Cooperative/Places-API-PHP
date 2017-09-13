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
-- Table structure for table `heardislandandmcdonaldislands`
--

DROP TABLE IF EXISTS `heardislandandmcdonaldislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heardislandandmcdonaldislands` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(40) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heardislandandmcdonaldislands`
--

LOCK TABLES `heardislandandmcdonaldislands` WRITE;
/*!40000 ALTER TABLE `heardislandandmcdonaldislands` DISABLE KEYS */;
INSERT INTO `heardislandandmcdonaldislands` VALUES (1,87,'unknown','Anzac Peak','53S','73E',-53,73.3,1112,339,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,87,'unknown','Big Ben Peak','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,87,'unknown','Big Ben','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,87,'unknown','Campbell Peak','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,87,'unknown','Dixon, Mount','53S','73E',-53,73.2833,1473,449,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,87,'unknown','Dome','53S','73E',-53.0833,73.5,7309,2228,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,87,'unknown','Emperor William Peak','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,87,'unknown','Flat Island','53S','72E',-53.0333,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,87,'unknown','Fremantle Peak','53S','73E',-53.0833,73.5,7309,2228,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,87,'unknown','Hayter Peak','53S','73E',-53.0167,73.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,87,'unknown','Heard Island and McDonald Islands','53S','73E',-53,73,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,87,'unknown','Islands, Territory of','53S','73E',-53,73,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,87,'unknown','McDonald Islands, Territory of','53S','73E',-53,73,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,87,'unknown','Heard Island','53S','73E',-53.1,73.5,7621,2323,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,87,'unknown','Heard and McDonald Islands, Territory of','53S','73E',-53,73,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,87,'unknown','Heard and McDonald Islands','53S','73E',-53,73,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,87,'unknown','Heard\'s Island','53S','73E',-53.1,73.5,7621,2323,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,87,'unknown','Herd\'s Island','53S','73E',-53.1,73.5,7621,2323,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,87,'unknown','Hurds Island','53S','73E',-53.1,73.5,7621,2323,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,87,'unknown','Kaiser Wilhelm Berg','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,87,'unknown','Little Matterhorn','53S','73E',-53.0667,73.4833,4658,1420,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,87,'unknown','Macdonald Group','53S','72E',-53.0333,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,87,'unknown','Macdonald Isle','53S','72E',-53.05,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,87,'unknown','Mawson Peak','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,87,'unknown','McDonald Islands','53S','72E',-53.0333,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,87,'unknown','McDonald Island','53S','72E',-53.05,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,87,'unknown','McDonalds Rocks','53S','72E',-53.0333,72.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,87,'unknown','Morgan Islands','53S','73E',-53.0167,73.5667,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,87,'unknown','Morgan Island','53S','73E',-53.0167,73.5667,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,87,'unknown','Morgan Islets','53S','73E',-53.0167,73.5667,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,87,'unknown','Morgan Islet','53S','73E',-53.0167,73.5667,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,87,'unknown','Old Ben Mountain','53S','73E',-53.1,73.5167,8080,2463,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,87,'unknown','Olsen, Mount','53S','73E',-53.0167,73.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,87,'unknown','Red Island','52S','73E',-52.9667,73.3,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,87,'unknown','Separation, Mount','53S','73E',-53.0833,73.55,6003,1830,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,87,'unknown','Shag Island','52S','73E',-52.9167,73.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,87,'unknown','Shag Islet','52S','73E',-52.9167,73.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,87,'unknown','Shag Rock','52S','73E',-52.9167,73.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `heardislandandmcdonaldislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:18:36
