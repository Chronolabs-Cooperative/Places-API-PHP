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
-- Table structure for table `coralseaislands`
--

DROP TABLE IF EXISTS `coralseaislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coralseaislands` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(27) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coralseaislands`
--

LOCK TABLES `coralseaislands` WRITE;
/*!40000 ALTER TABLE `coralseaislands` DISABLE KEYS */;
INSERT INTO `coralseaislands` VALUES (1,49,'unknown','Bird Island','22S','155E',-22.1667,155.467,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,49,'unknown','Bird Islet','22S','155E',-22.1667,155.467,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,49,'unknown','Brodie Cay','19S','152E',-19.25,152.217,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,49,'unknown','Carola Cays','19S','152E',-19.0833,152.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,49,'unknown','Carola Cay','19S','152E',-19.0833,152.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,49,'unknown','Cato Islands','23S','155E',-23.25,155.533,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,49,'unknown','Cato Island','23S','155E',-23.25,155.533,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,49,'unknown','Central Diamond Island','17S','151E',-17.4167,151,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,49,'unknown','Chilcott Island','16S','150E',-16.9333,150,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,49,'unknown','Chilcott Islet','16S','150E',-16.9333,150,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,49,'unknown','Coral Sea Islands Territory','17S','151E',-17.5,151,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,49,'unknown','Coral Sea Islands','17S','151E',-17.5,151,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,49,'unknown','Coringa Islets','16S','149E',-16.9667,149.967,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,49,'unknown','Diamond Islets','17S','150E',-17.4167,150.967,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,49,'unknown','East Diamond Island','17S','151E',-17.4167,151.083,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,49,'unknown','Herald Cays','16S','149E',-16.9667,149.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,49,'unknown','Herald\'s Beacon Islet','17S','155E',-17.4167,155.867,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,49,'unknown','Lick Lick Cay','17S','152E',-17.25,152.167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,49,'unknown','Magdalena Cays','16S','150E',-16.55,150.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,49,'unknown','Magdelaine Cays','16S','150E',-16.55,150.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,49,'unknown','Mellish Reef','17S','155E',-17.4167,155.833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,49,'unknown','Mid Islet','16S','150E',-16.2333,150.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,49,'unknown','Middle Cay','17S','152E',-17.1667,152.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,49,'unknown','Middle Islet','16S','150E',-16.2333,150.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,49,'unknown','North Cay','16S','150E',-16.1333,150.033,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,49,'unknown','North East Cay','21S','153E',-21.6583,153.767,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,49,'unknown','Observation Cay','17S','152E',-17.25,152.083,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,49,'unknown','Observation Cay','21S','154E',-21.0208,154.374,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,49,'unknown','Observatory Cay','17S','152E',-17.1333,152.167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,49,'unknown','Observatory Cay','21S','154E',-21.0208,154.374,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,49,'unknown','Paget Cay','19S','152E',-19.2167,152.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,49,'unknown','Sand Cay','15S','149E',-15.75,149.583,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,49,'unknown','Sand Cay','17S','148E',-17.7333,148.433,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,49,'unknown','South Diamond Island','17S','151E',-17.5833,151.917,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,49,'unknown','South Islet','16S','150E',-16.3,150,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,49,'unknown','South West Cay','17S','151E',-17.5833,151.417,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,49,'unknown','South West Cay','21S','153E',-21.8533,153.517,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,49,'unknown','South West Island','17S','149E',-17,149.917,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,49,'unknown','Tregosse Islets','17S','150E',-17.6833,150.717,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,49,'unknown','Tregrosse Islets','17S','150E',-17.6833,150.717,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,49,'unknown','Turtle Island','17S','152E',-17.1667,152,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,49,'unknown','Victoria Cay','17S','148E',-17.7333,148.433,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,49,'unknown','West Diamond Island','17S','150E',-17.4167,150.833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,49,'unknown','West Islet','22S','155E',-22.1833,155.167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,49,'unknown','Willis Group','16S','150E',-16.3,150,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,49,'unknown','Willis Islets','16S','150E',-16.3,150,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `coralseaislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:20:49
