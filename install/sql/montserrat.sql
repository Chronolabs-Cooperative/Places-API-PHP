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
-- Table structure for table `montserrat`
--

DROP TABLE IF EXISTS `montserrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `montserrat` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(23) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montserrat`
--

LOCK TABLES `montserrat` WRITE;
/*!40000 ALTER TABLE `montserrat` DISABLE KEYS */;
INSERT INTO `montserrat` VALUES (1,136,'unknown','Amersham','16N','62W',16.7,-62.2,1105,337,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,136,'unknown','Baker Hill','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,136,'unknown','Bank Level','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,136,'unknown','Banks','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,136,'unknown','Beech Hill','16N','62W',16.7167,-62.1833,1745,532,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,136,'unknown','Bethel','16N','62W',16.7333,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,136,'unknown','Black Ghaut Basin','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,136,'unknown','Blackburne Airport','16N','62W',16.75,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,136,'unknown','Bramble','16N','62W',16.7333,-62.1667,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,136,'unknown','Bransby','16N','62W',16.7167,-62.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,136,'unknown','Castle Peak','16N','62W',16.7,-62.1667,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,136,'unknown','Cavalla Hill','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,136,'unknown','Chances Peak','16N','62W',16.7,-62.1833,1932,589,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,136,'unknown','Cheapend','16N','62W',16.7667,-62.2167,1512,461,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,136,'unknown','Cork Hill Village','16N','62W',16.7167,-62.2167,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,136,'unknown','Cork Hill','16N','62W',16.7167,-62.2167,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,136,'unknown','Cudjoe Head','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,136,'unknown','Cudjoehead Village','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,136,'unknown','Cuojoe Head','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,136,'unknown','Dagenham','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,136,'unknown','Davy Hill','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,136,'unknown','Delvins','16N','62W',16.7167,-62.2167,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,136,'unknown','Dick Hill','16N','62W',16.7667,-62.1833,446,136,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,136,'unknown','Drummond\'s','16N','62W',16.7833,-62.1833,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,136,'unknown','Duberry Hill','16N','62W',16.75,-62.2167,997,304,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,136,'unknown','Dyer\'s','16N','62W',16.7167,-62.1833,1745,532,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,136,'unknown','Fairfield','16N','62W',16.6833,-62.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,136,'unknown','Farm Village','16N','62W',16.7333,-62.1667,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,136,'unknown','Farm','16N','62W',16.7333,-62.1667,98,30,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,136,'unknown','Fergus Mountain','16N','62W',16.6833,-62.1833,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,136,'unknown','Fleming','16N','62W',16.7333,-62.2,1095,334,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,136,'unknown','Fogarty','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,136,'unknown','Fox\'s Bay','16N','62W',16.7167,-62.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,136,'unknown','Frith','16N','62W',16.7333,-62.2167,636,194,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,136,'unknown','Gages','16N','62W',16.7,-62.2,1105,337,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,136,'unknown','Gerald\'s Bottom','16N','62W',16.7833,-62.1833,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,136,'unknown','Gerald\'s','16N','62W',16.7833,-62.1833,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,136,'unknown','Gingoes','16N','62W',16.6833,-62.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,136,'unknown','Glen Mhor','16N','62W',16.7,-62.2,1105,337,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,136,'unknown','Gun Hill','16N','62W',16.7167,-62.1833,1745,532,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,136,'unknown','Happy Hill','16N','62W',16.7333,-62.2167,636,194,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,136,'unknown','Harris Village','16N','62W',16.7333,-62.1833,941,287,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,136,'unknown','Harris\' Village','16N','62W',16.7333,-62.1833,941,287,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,136,'unknown','Harris','16N','62W',16.7333,-62.1833,941,287,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,136,'unknown','Hodge\'s Hill','16N','62W',16.7167,-62.1833,1745,532,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,136,'unknown','Hope','16N','62W',16.7333,-62.2,1095,334,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,136,'unknown','Iles Bay','16N','62W',16.7333,-62.2167,636,194,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,136,'unknown','Jubilee Town','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,136,'unknown','Judy Piece','16N','62W',16.7667,-62.1833,446,136,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,136,'unknown','Katy Hill','16N','62W',16.75,-62.1833,515,157,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,136,'unknown','Kinsale Village','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,136,'unknown','Kinsale','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,136,'unknown','Lawyers Mountain','16N','62W',16.75,-62.2,938,286,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,136,'unknown','Lee\'s','16N','62W',16.7167,-62.2,1938,591,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,136,'unknown','Lees Village','16N','62W',16.7167,-62.2,1938,591,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,136,'unknown','Little Redonda','16N','62W',16.8167,-62.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,136,'unknown','Long Ground Village','16N','62W',16.7167,-62.1667,206,63,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,136,'unknown','Long Ground','16N','62W',16.7167,-62.1667,206,63,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,136,'unknown','Mango Hill','16N','62W',16.7667,-62.1833,446,136,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,136,'unknown','Marko Bottom','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,136,'unknown','Molyneux','16N','62W',16.7167,-62.2,1938,591,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,136,'unknown','Montserrat Colony of','16N','62W',16.75,-62.2,938,286,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,136,'unknown','Montserrat Presidency','16N','62W',16.75,-62.2,938,286,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,136,'unknown','Montserrat','16N','62W',16.7333,-62.1833,941,287,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,136,'unknown','Montserrat','16N','62W',16.75,-62.2,938,286,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,136,'unknown','Morris\'','16N','62W',16.6833,-62.1833,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,136,'unknown','Nixons','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,136,'unknown','Old Norwood','16N','62W',16.7833,-62.1833,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,136,'unknown','Old Towne','16N','62W',16.7333,-62.2167,636,194,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,136,'unknown','Olveston','16N','62W',16.7333,-62.2167,636,194,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,136,'unknown','Parsons','16N','62W',16.7,-62.2,1105,337,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,136,'unknown','Plymouth','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,136,'unknown','Pond Bottom','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,136,'unknown','Rendezvous Village','16N','62W',16.8,-62.2,331,101,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,136,'unknown','Rendezvous','16N','62W',16.8,-62.2,331,101,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,136,'unknown','Richmond Hill','16N','62W',16.7167,-62.2167,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,136,'unknown','Richmond','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,136,'unknown','Roche\'s Mountain','16N','62W',16.7,-62.1667,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,136,'unknown','Roche\'s Yard','16N','62W',16.7,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,136,'unknown','Rocklands','16N','62W',16.7667,-62.2167,1512,461,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,136,'unknown','Ryners','16N','62W',16.7,-62.2,1105,337,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,136,'unknown','Saint George\'s Hill','16N','62W',16.7167,-62.2,1938,591,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,136,'unknown','Saint John\'s Village','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,136,'unknown','Saint John\'s','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,136,'unknown','Saint John','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,136,'unknown','Saint Patrick\'s Village','16N','62W',16.6833,-62.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,136,'unknown','Saint Patrick\'s','16N','62W',16.6833,-62.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,136,'unknown','Saint Peter\'s Village','16N','62W',16.7667,-62.2167,1512,461,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,136,'unknown','Saint Peters','16N','62W',16.7667,-62.2167,1512,461,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,136,'unknown','Salem','16N','62W',16.75,-62.2167,997,304,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,136,'unknown','Shooters Hill','16N','62W',16.6667,-62.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,136,'unknown','Soldier Ghaut','16N','62W',16.7833,-62.2,787,240,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,136,'unknown','Spanish Point','16N','62W',16.7333,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,136,'unknown','Streatham','16N','62W',16.7167,-62.1833,1745,532,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,136,'unknown','Trant\'s','16N','62W',16.75,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,136,'unknown','Trials','16N','62W',16.6833,-62.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,136,'unknown','Tuitt\'s','16N','62W',16.7167,-62.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,136,'unknown','Victoria','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,136,'unknown','Virgin Island','16N','62W',16.7667,-62.2167,1512,461,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,136,'unknown','Webbs','16N','62W',16.7,-62.2167,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,136,'unknown','Weekes','16N','62W',16.7167,-62.2,1938,591,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,136,'unknown','Windy Hill','16N','62W',16.7333,-62.1833,941,287,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,136,'unknown','Woodlands','16N','62W',16.75,-62.2167,997,304,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,136,'unknown','Zion Hill','16N','62W',16.7667,-62.2,1443,440,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `montserrat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:25:26
