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
-- Table structure for table `isleofman`
--

DROP TABLE IF EXISTS `isleofman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isleofman` (
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isleofman`
--

LOCK TABLES `isleofman` WRITE;
/*!40000 ALTER TABLE `isleofman` DISABLE KEYS */;
INSERT INTO `isleofman` VALUES (1,97,'unknown','Andreas','54N','4W',54.3667,-4.4333,167,51,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,97,'unknown','Ballabeg','54N','4W',54.1,-4.6833,154,47,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,97,'unknown','Ballakinnag','54N','4W',54.3333,-4.55,36,11,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,97,'unknown','Ballasalla','54N','4W',54.1,-4.6333,59,18,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,97,'unknown','Bride','54N','4W',54.3833,-4.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,97,'unknown','Calf of Man','54N','4W',54.05,-4.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,97,'unknown','Castletown','54N','4W',54.0833,-4.65,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,97,'unknown','Colby','54N','4W',54.1,-4.7167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,97,'unknown','Conchan','54N','4W',54.1833,-4.45,150,46,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,97,'unknown','Cranstall','54N','4W',54.4,-4.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,97,'unknown','Cranstal','54N','4W',54.4,-4.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,97,'unknown','Cregneish','54N','4W',54.0667,-4.7667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,97,'unknown','Crosby','54N','4W',54.1833,-4.5667,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,97,'unknown','Dalby','54N','4W',54.1667,-4.7333,242,74,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,97,'unknown','Derbyhaven','54N','4W',54.0833,-4.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,97,'unknown','Dog Mills','54N','4W',54.35,-4.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,97,'unknown','Douglas','54N','4W',54.15,-4.4833,114,35,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,97,'unknown','Foxdale','54N','4W',54.1667,-4.6167,498,152,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,97,'unknown','Glen Maye','54N','4W',54.1833,-4.7,459,140,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,97,'unknown','Isle of Man','54N','4W',54.25,-4.5,1141,348,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,97,'unknown','Jurby','54N','4W',54.35,-4.5333,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,97,'unknown','Karrin, Mount','54N','4W',54.2917,-4.5,570,174,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,97,'unknown','Kirk Braddan','54N','4W',54.1667,-4.5167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,97,'unknown','Kirk Braddon','54N','4W',54.1667,-4.5167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,97,'unknown','Kirkmichael','54N','4W',54.2833,-4.5833,291,89,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,97,'unknown','Laxey','54N','4W',54.2333,-4.4,147,45,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,97,'unknown','Lezayre','54N','4W',54.3167,-4.4167,265,81,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,97,'unknown','Man, Isle of','54N','4W',54.25,-4.5,1141,348,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,97,'unknown','Maughold','54N','4W',54.3,-4.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,97,'unknown','Niarbyl, The','54N','4W',54.1667,-4.7333,242,74,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,97,'unknown','North Barrule','54N','4W',54.2833,-4.4,1033,315,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,97,'unknown','Onchan','54N','4W',54.1833,-4.45,150,46,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,97,'unknown','Patrick','54N','4W',54.2,-4.7,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,97,'unknown','Peel','54N','4W',54.2333,-4.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,97,'unknown','Port Douglas','54N','4W',54.15,-4.4833,114,35,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,97,'unknown','Port Erin','54N','4W',54.1,-4.7833,68,21,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,97,'unknown','Port Mary','54N','4W',54.0667,-4.7333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,97,'unknown','Port Saint Mary','54N','4W',54.0667,-4.7333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,97,'unknown','Port Soderick','54N','4W',54.1167,-4.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,97,'unknown','Ramsey','54N','4W',54.3167,-4.4,311,95,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,97,'unknown','Ronaldsway','54N','4W',54.0833,-4.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,97,'unknown','Saint Anne','54N','4W',54.1167,-4.5833,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,97,'unknown','Saint Braddon','54N','4W',54.1667,-4.5167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,97,'unknown','Saint Johns','54N','4W',54.2,-4.6333,255,78,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,97,'unknown','Saint Marks','54N','4W',54.1333,-4.6,308,94,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,97,'unknown','Saint Mark','54N','4W',54.1333,-4.6,308,94,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,97,'unknown','Saint Maughold','54N','4W',54.3,-4.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,97,'unknown','Saint Michael Island','54N','4W',54.0667,-4.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,97,'unknown','Saint Michaels Island','54N','4W',54.0667,-4.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,97,'unknown','Saint Patrick','54N','4W',54.2,-4.7,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,97,'unknown','Santon','54N','4W',54.1167,-4.5833,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,97,'unknown','Snaefell','54N','4W',54.2667,-4.4833,1925,587,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,97,'unknown','South Barrule','54N','4W',54.15,-4.6667,951,290,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,97,'unknown','Sulby','54N','4W',54.3167,-4.4833,285,87,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,97,'unknown','Union Mills','54N','4W',54.1667,-4.5167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `isleofman` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:21:56
