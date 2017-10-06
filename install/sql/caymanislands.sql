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
-- Table structure for table `caymanislands`
--

DROP TABLE IF EXISTS `caymanislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caymanislands` (
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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caymanislands`
--

LOCK TABLES `caymanislands` WRITE;
/*!40000 ALTER TABLE `caymanislands` DISABLE KEYS */;
INSERT INTO `caymanislands` VALUES (1,39,'unknown','Banksville','19N','79W',19.7,-79.85,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,39,'unknown','Battle Ground','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,39,'unknown','Belford Estates','19N','81W',19.2833,-81.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,39,'unknown','Bessy Howard Cay','19N','79W',19.75,-79.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,39,'unknown','Birch Tree Hill','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,39,'unknown','Blakes','19N','81W',19.3,-81.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,39,'unknown','Blossom Point','19N','80W',19.6667,-80.0833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,39,'unknown','Blossom Village','19N','80W',19.6667,-80.0833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,39,'unknown','Bodden Town','19N','81W',19.2833,-81.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,39,'unknown','Bodden','19N','81W',19.2833,-81.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,39,'unknown','Booby Cay','19N','81W',19.3333,-81.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,39,'unknown','Botabano','19N','81W',19.3833,-81.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,39,'unknown','Breakers','19N','81W',19.3,-81.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,39,'unknown','Breezy Castle','19N','81W',19.3,-81.3667,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,39,'unknown','Brinkleys','19N','81W',19.35,-81.2333,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,39,'unknown','Cayman Brac','19N','79W',19.6833,-79.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,39,'unknown','Cayman Brac','19N','79W',19.7167,-79.8167,39,12,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,39,'unknown','Cayman Islands','19N','80W',19.5,-80.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,39,'unknown','Cayman Palms','19N','81W',19.2667,-81.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,39,'unknown','Caymans, The','19N','80W',19.5,-80.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,39,'unknown','Cayman','19N','80W',19.5,-80.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,39,'unknown','Coral Gables','19N','81W',19.3667,-81.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,39,'unknown','Creek','19N','79W',19.75,-79.7667,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,39,'unknown','Dog City','19N','81W',19.3,-81.3833,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,39,'unknown','Driftwood Village','19N','81W',19.35,-81.2333,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,39,'unknown','Duck Pond Cay','19N','81W',19.3,-81.3,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,39,'unknown','Dusty Place','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,39,'unknown','East End','19N','81W',19.3,-81.1167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,39,'unknown','Frenchman\'s Fort','19N','79W',19.7,-79.8833,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,39,'unknown','George Town','19N','81W',19.3,-81.3833,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,39,'unknown','Georgetown/Owen Roberts International','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,39,'unknown','Gerrard Smith Airport','19N','79W',19.6833,-79.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,39,'unknown','Grand Cayman','19N','81W',19.3333,-81.25,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,39,'unknown','Gun Bay Village','19N','81W',19.3167,-81.1,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,39,'unknown','Gun Bay','19N','81W',19.3167,-81.1,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,39,'unknown','Half Moon Bay','19N','81W',19.2833,-81.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,39,'unknown','Half Way Pond','19N','81W',19.2833,-81.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,39,'unknown','Head of Bay','19N','80W',19.6667,-80.0667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,39,'unknown','Hell','19N','81W',19.3833,-81.4167,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,39,'unknown','High Rock Estates','19N','81W',19.2833,-81.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,39,'unknown','Hutland','19N','81W',19.35,-81.2167,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,39,'unknown','Knob Hill','19N','79W',19.6833,-79.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,39,'unknown','Lambert House','19N','81W',19.2667,-81.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,39,'unknown','Lesser Caymans','19N','79W',19.6667,-79.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,39,'unknown','Little Cayman Brac','19N','79W',19.75,-79.7333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,39,'unknown','Little Cayman','19N','80W',19.65,-80.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,39,'unknown','Little Cayman','19N','80W',19.6833,-80.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,39,'unknown','Lower Valley','19N','81W',19.2833,-81.2833,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,39,'unknown','Midland Acres','19N','81W',19.3,-81.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,39,'unknown','Molusca Heights','19N','79W',19.7333,-79.7833,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,39,'unknown','Mount Pleasant','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,39,'unknown','Newlands','19N','81W',19.2833,-81.3,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,39,'unknown','Newland','19N','81W',19.2833,-81.3,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,39,'unknown','North Side Village','19N','81W',19.35,-81.2,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,39,'unknown','North Side','19N','81W',19.35,-81.2,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,39,'unknown','North Sound Estates','19N','81W',19.3,-81.3,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,39,'unknown','North Ward','19N','81W',19.2833,-81.2667,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,39,'unknown','Old Isaacs','19N','81W',19.3,-81.1167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,39,'unknown','Old Man Bay','19N','81W',19.35,-81.1833,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,39,'unknown','Old Man Village','19N','81W',19.35,-81.1833,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,39,'unknown','Old Stores','19N','81W',19.4,-81.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,39,'unknown','Omega Gardens','19N','81W',19.3,-81.3333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,39,'unknown','Owen Island','19N','80W',19.6667,-80.0667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,39,'unknown','Owen Roberts International Airport','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,39,'unknown','International Airport','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,39,'unknown','Pease Bay','19N','81W',19.2833,-81.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,39,'unknown','Pedro','19N','81W',19.2833,-81.2667,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,39,'unknown','Prospect Park','19N','81W',19.2833,-81.3333,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,39,'unknown','Prospect','19N','81W',19.2667,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,39,'unknown','Red Bay Estate','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,39,'unknown','Red Bay','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,39,'unknown','Rock Hole','19N','81W',19.3,-81.3667,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,39,'unknown','Saint James','19N','81W',19.2667,-81.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,39,'unknown','Sand Bluff','19N','81W',19.3167,-81.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,39,'unknown','Sand Cay','19N','81W',19.25,-81.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,39,'unknown','Savannah Acres','19N','81W',19.2833,-81.3,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,39,'unknown','Savannah','19N','81W',19.2667,-81.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,39,'unknown','South Hole','19N','80W',19.6667,-80.0833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,39,'unknown','South Town','19N','80W',19.6667,-80.0833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,39,'unknown','Spot Bay','19N','79W',19.75,-79.75,131,40,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,39,'unknown','Spotts','19N','81W',19.2667,-81.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,39,'unknown','The Common','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,39,'unknown','The Moorings','19N','79W',19.7333,-79.7833,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,39,'unknown','The Moorings','19N','79W',19.7333,-79.8,59,18,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,39,'unknown','Tibbetts Turn','19N','79W',19.7333,-79.7833,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,39,'unknown','Town Hall Crescent','19N','81W',19.3833,-81.4167,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,39,'unknown','Tropical Gardens','19N','81W',19.2833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,39,'unknown','Upper Land','19N','81W',19.35,-81.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,39,'unknown','Vicksville','19N','81W',19.3667,-81.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,39,'unknown','Vidal Cay','19N','81W',19.3833,-81.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,39,'unknown','Water Ground','19N','81W',19.3833,-81.4,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,39,'unknown','West Bay','19N','81W',19.3667,-81.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,39,'unknown','West End','19N','81W',19.3667,-81.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,39,'unknown','West End','19N','79W',19.6833,-79.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,39,'unknown','Whitehall Estate','19N','81W',19.3,-81.3667,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `caymanislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:16:53
