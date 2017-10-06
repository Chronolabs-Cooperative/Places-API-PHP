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
-- Table structure for table `guernsey`
--

DROP TABLE IF EXISTS `guernsey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guernsey` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(22) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guernsey`
--

LOCK TABLES `guernsey` WRITE;
/*!40000 ALTER TABLE `guernsey` DISABLE KEYS */;
INSERT INTO `guernsey` VALUES (1,82,'unknown','Alderney','49N','2W',49.7167,-2.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,82,'unknown','Bailiffs Cross','49N','2W',49.45,-2.5667,269,82,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,82,'unknown','Beauregard','49N','2W',49.4333,-2.3667,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,82,'unknown','Bec du Nez','49N','2W',49.45,-2.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,82,'unknown','Braye du Val','49N','2W',49.4667,-2.55,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,82,'unknown','Braye','49N','2W',49.4667,-2.55,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,82,'unknown','Braye','49N','2W',49.7167,-2.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,82,'unknown','Brecqhou Island','49N','2W',49.4333,-2.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,82,'unknown','Brecqhou','49N','2W',49.4333,-2.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,82,'unknown','Breni','49N','2W',49.4167,-2.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,82,'unknown','Burhou','49N','2W',49.7333,-2.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,82,'unknown','Caguerobert','49N','2W',49.4667,-2.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,82,'unknown','Calais','49N','2W',49.4333,-2.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,82,'unknown','Caquorobert','49N','2W',49.4667,-2.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,82,'unknown','Caskets','49N','2W',49.7167,-2.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,82,'unknown','Casquets','49N','2W',49.7167,-2.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,82,'unknown','Channel Islands','49N','2W',49.5,-2.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,82,'unknown','Corb','49N','2W',49.45,-2.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,82,'unknown','Courb','49N','2W',49.45,-2.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,82,'unknown','Crevichon','49N','2W',49.4667,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,82,'unknown','Durand','49N','2W',49.45,-2.55,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,82,'unknown','Fregondie','49N','2W',49.4333,-2.3667,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,82,'unknown','Fregond','49N','2W',49.4333,-2.3667,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,82,'unknown','Grand Rocq','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,82,'unknown','Grand Roques','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,82,'unknown','Grande Fauconni','49N','2W',49.45,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,82,'unknown','Grande Fauconriere','49N','2W',49.45,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,82,'unknown','Grande Roque','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,82,'unknown','Grandes Rocques','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,82,'unknown','Guernsey, Bailiwick of','49N','2W',49.5833,-2.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,82,'unknown','Guernsey','49N','2W',49.45,-2.6,229,70,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,82,'unknown','Guernsey','49N','2W',49.5833,-2.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,82,'unknown','Hautnez','49N','2W',49.4333,-2.6,311,95,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,82,'unknown','Herm','49N','2W',49.5,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,82,'unknown','Homet','49N','2W',49.4833,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,82,'unknown','Hommets','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,82,'unknown','Hommet','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,82,'unknown','Houmet Herb','49N','2W',49.7333,-2.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,82,'unknown','Houmets','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,82,'unknown','Houmet','49N','2W',49.4833,-2.5833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,82,'unknown','Isle des Marchants','49N','2W',49.4333,-2.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,82,'unknown','Jethou','49N','2W',49.4667,-2.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,82,'unknown','Kings Mills','49N','2W',49.4667,-2.6,196,60,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,82,'unknown','La Ram','49N','2W',49.4667,-2.55,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,82,'unknown','La Ville Roussel','49N','2W',49.4333,-2.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,82,'unknown','Le Mont Durand','49N','2W',49.45,-2.55,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,82,'unknown','Les Homeaux Florains','49N','2W',49.7333,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,82,'unknown','Les Nicolles','49N','2W',49.4333,-2.5833,308,94,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,82,'unknown','Lihou Island','49N','2W',49.4667,-2.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,82,'unknown','Little Burhou','49N','2W',49.7,-2.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,82,'unknown','L\'Etac de Sark','49N','2W',49.4,-2.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,82,'unknown','L\'Etac de Sercq','49N','2W',49.4,-2.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,82,'unknown','Nicolles','49N','2W',49.4333,-2.5833,308,94,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,82,'unknown','Paradise','49N','2W',49.5,-2.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,82,'unknown','Paradis','49N','2W',49.5,-2.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,82,'unknown','Queux Kings Mill','49N','2W',49.4667,-2.6,196,60,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,82,'unknown','Ramee','49N','2W',49.4667,-2.55,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,82,'unknown','Raz Island','49N','2W',49.7167,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,82,'unknown','Renonpuet','49N','2W',49.7333,-2.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,82,'unknown','Renonquet','49N','2W',49.7333,-2.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,82,'unknown','Rohais Manor','49N','2W',49.4667,-2.5667,147,45,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,82,'unknown','Rohais','49N','2W',49.4667,-2.5667,147,45,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,82,'unknown','Roque Tourgis','49N','2W',49.7167,-2.2167,269,82,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,82,'unknown','Roselle','49N','2W',49.4333,-2.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,82,'unknown','Saint Annes','49N','2W',49.7,-2.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,82,'unknown','Saint Anne','49N','2W',49.7,-2.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,82,'unknown','Saint Peter Port','49N','2W',49.45,-2.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,82,'unknown','Saint Sampson\'s','49N','2W',49.4833,-2.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,82,'unknown','Saint Sampson','49N','2W',49.4833,-2.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,82,'unknown','Sark','49N','2W',49.45,-2.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,82,'unknown','Saumarez Park','49N','2W',49.4667,-2.5833,141,43,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,82,'unknown','Saumarez','49N','2W',49.4667,-2.6,196,60,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,82,'unknown','Serq','49N','2W',49.45,-2.3667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,82,'unknown','Torteval Church','49N','2W',49.4333,-2.65,262,80,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,82,'unknown','Torteval','49N','2W',49.4333,-2.65,262,80,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `guernsey` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:20:39
