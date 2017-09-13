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
-- Table structure for table `naoero`
--

DROP TABLE IF EXISTS `naoero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `naoero` (
  `CordID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(25) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naoero`
--

LOCK TABLES `naoero` WRITE;
/*!40000 ALTER TABLE `naoero` DISABLE KEYS */;
INSERT INTO `naoero` VALUES (1,140,'unknown','Anabar','0S','166E',-0.5167,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,140,'unknown','Aneber','0S','166E',-0.5167,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,140,'unknown','Anibare','0S','166E',-0.5333,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,140,'unknown','Anna','0S','166E',-0.5,166.933,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,140,'unknown','Enniberri','0S','166E',-0.5333,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,140,'unknown','Ijub','0S','166E',-0.5167,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,140,'unknown','Ijuh','0S','166E',-0.5167,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,140,'unknown','Ijuw','0S','166E',-0.5167,166.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,140,'unknown','Mueoen','0S','166E',-0.5167,166.917,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,140,'unknown','Naoero','0S','166E',-0.5333,166.917,32,10,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,140,'unknown','Nau\'uru','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,140,'unknown','Naura','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,140,'unknown','Nauru Atoll','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,140,'unknown','Nauru Island','0S','166E',-0.55,166.917,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,140,'unknown','Nauru, Republic of','0S','166E',-0.5333,166.917,32,10,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,140,'unknown','Nauru, Trust Territory of','0S','166E',-0.5333,166.917,32,10,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,140,'unknown','Nauru','0S','166E',-0.5333,166.917,32,10,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,140,'unknown','Nauru','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,140,'unknown','Navoda','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,140,'unknown','Navodo','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,140,'unknown','Nawodo','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,140,'unknown','Onawero','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,140,'unknown','Pleasant Island','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,140,'unknown','Ronave','0S','166E',-0.5,166.933,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,140,'unknown','Schank','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,140,'unknown','Shank Island','0S','166E',-0.5333,166.933,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,140,'unknown','Uaboe','0S','166E',-0.5167,166.917,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,140,'unknown','Waboe','0S','166E',-0.5167,166.917,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,140,'unknown','Yangor','0S','166E',-0.5333,166.917,32,10,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `naoero` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:22:39
