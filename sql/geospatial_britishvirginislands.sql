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
-- Table structure for table `britishvirginislands`
--

DROP TABLE IF EXISTS `britishvirginislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `britishvirginislands` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(38) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `britishvirginislands`
--

LOCK TABLES `britishvirginislands` WRITE;
/*!40000 ALTER TABLE `britishvirginislands` DISABLE KEYS */;
INSERT INTO `britishvirginislands` VALUES (1,29,'unknown','Anderson','18N','64W',18.4333,-64.6333,177,54,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,29,'unknown','Anegada','18N','64W',18.7167,-64.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,29,'unknown','Anegada','18N','64W',18.75,-64.3333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,29,'unknown','Beef Island','18N','64W',18.45,-64.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,29,'unknown','Beef Island','18N','64W',18.45,-64.5333,242,74,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,29,'unknown','Bellamy Cay','18N','64W',18.4333,-64.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,29,'unknown','Belle Vue','18N','64W',18.45,-64.7333,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,29,'unknown','British Virgin Islands','18N','64W',18.5,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,29,'unknown','Buck Island','18N','64W',18.4167,-64.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,29,'unknown','Cammanoes Island','18N','64W',18.4833,-64.5333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,29,'unknown','Cane Garden Bay','18N','64W',18.4167,-64.65,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,29,'unknown','Cockroach Island','18N','64W',18.4833,-64.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,29,'unknown','Cooper Island','18N','64W',18.3667,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,29,'unknown','Creek Village','18N','64W',18.4911,-64.3811,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,29,'unknown','Dead Chest','18N','64W',18.3667,-64.5667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,29,'unknown','Diamond Cay','18N','64W',18.4333,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,29,'unknown','Dog Islands','18N','64W',18.4833,-64.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,29,'unknown','Dogs, The','18N','64W',18.4833,-64.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,29,'unknown','Drowned Island','18N','64W',18.75,-64.3333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,29,'unknown','East Seal Dog','18N','64W',18.5,-64.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,29,'unknown','Eustatia Island','18N','64W',18.5167,-64.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,29,'unknown','Fallen Jerusalem','18N','64W',18.4167,-64.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,29,'unknown','Frenchmans Cay','18N','64W',18.3833,-64.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,29,'unknown','Freshwater Pond','18N','64W',18.3833,-64.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,29,'unknown','George Dog','18N','64W',18.5,-64.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,29,'unknown','Ginger Island','18N','64W',18.4,-64.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,29,'unknown','Great Camanoe Island','18N','64W',18.4833,-64.5333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,29,'unknown','Great Camanoe','18N','64W',18.4833,-64.5333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,29,'unknown','Great Camano','18N','64W',18.4833,-64.5333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,29,'unknown','Great Carrot Bay','18N','64W',18.4,-64.6667,406,124,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,29,'unknown','Great Dog','18N','64W',18.4833,-64.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,29,'unknown','Great Mountain','18N','64W',18.4333,-64.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,29,'unknown','Great Thatch Cay','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,29,'unknown','Great Thatch Island','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,29,'unknown','Great Thatch Islet','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,29,'unknown','Great Thatch','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,29,'unknown','Great Tobago Island','18N','64W',18.45,-64.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,29,'unknown','Great Tobago','18N','64W',18.45,-64.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,29,'unknown','Green Cay','18N','64W',18.45,-64.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,29,'unknown','Guana Island','18N','64W',18.4833,-64.5667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,29,'unknown','Guano Island','18N','64W',18.4833,-64.5667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,29,'unknown','Hannah','18N','64W',18.4,-64.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,29,'unknown','Jost Van Dyke Island','18N','64W',18.4667,-64.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,29,'unknown','Jost Van Dykes','18N','64W',18.4667,-64.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,29,'unknown','Jost Van Dyke','18N','64W',18.4667,-64.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,29,'unknown','Key Cay','18N','64W',18.3447,-64.5958,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,29,'unknown','Kingstown','18N','64W',18.4167,-64.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,29,'unknown','Las V','18N','64W',18.3333,-64.75,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,29,'unknown','Leonards','18N','64W',18.4167,-64.6333,518,158,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,29,'unknown','Les Vierges','18N','64W',18.3333,-64.75,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,29,'unknown','Lettsome Settlement','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,29,'unknown','Little Anegada Island','18N','64W',18.7167,-64.3,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,29,'unknown','Little Anegada','18N','64W',18.7167,-64.3,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,29,'unknown','Little Camanoe','18N','64W',18.45,-64.5333,242,74,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,29,'unknown','Little Carrot Bay','18N','64W',18.4,-64.6667,406,124,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,29,'unknown','Little Cay','18N','64W',18.4333,-64.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,29,'unknown','Little Harbour','18N','64W',18.4333,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,29,'unknown','Little Jost Van Dyke Island','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,29,'unknown','Little Jost Van Dykes','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,29,'unknown','Little Jost Van Dyke','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,29,'unknown','Little Seal Dogs','18N','64W',18.5,-64.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,29,'unknown','Little Thatch Island','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,29,'unknown','Little Tobago Island see Little Tobago','18N','64W',18.4333,-64.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,29,'unknown','Little Tobago Island','18N','64W',18.4333,-64.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,29,'unknown','Little Tobago','18N','64W',18.4333,-64.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,29,'unknown','Little Van Dykes','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,29,'unknown','Little Van Dyke','18N','64W',18.45,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,29,'unknown','Little Wickam\'s Cay','18N','64W',18.4256,-64.6178,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,29,'unknown','Little Wickham\'s Cay','18N','64W',18.4256,-64.6178,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,29,'unknown','Long Swamp','18N','64W',18.4333,-64.5667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,29,'unknown','Marina Cay','18N','64W',18.45,-64.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,29,'unknown','Maya Cove','18N','64W',18.4167,-64.5667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,29,'unknown','Mosquito Island','18N','64W',18.5,-64.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,29,'unknown','Necker Island','18N','64W',18.55,-64.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,29,'unknown','Necker Islet','18N','64W',18.55,-64.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,29,'unknown','Norman Island','18N','64W',18.3333,-64.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,29,'unknown','Normands Island','18N','64W',18.3333,-64.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,29,'unknown','Old Jerusalem','18N','64W',18.4167,-64.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,29,'unknown','Pelican Island','18N','64W',18.3333,-64.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,29,'unknown','Peter Island','18N','64W',18.3667,-64.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,29,'unknown','Peters Island','18N','64W',18.3667,-64.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,29,'unknown','Prickly Pear Island','18N','64W',18.5,-64.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,29,'unknown','Road Town','18N','64W',18.4167,-64.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,29,'unknown','Sage, Mount','18N','64W',18.4167,-64.65,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,29,'unknown','Sage, Mount','18N','64W',18.4,-64.65,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,29,'unknown','Salt Island','18N','64W',18.3833,-64.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,29,'unknown','Sandy Cay','18N','64W',18.4333,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,29,'unknown','Sandy Spit','18N','64W',18.4333,-64.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,29,'unknown','Scrub Island','18N','64W',18.4667,-64.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,29,'unknown','Seal Dogs','18N','64W',18.5,-64.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,29,'unknown','South Sound','18N','64W',18.4833,-64.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,29,'unknown','Spanish Town','18N','64W',18.45,-64.4333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,29,'unknown','Spanish Town','18N','64W',18.5,-64.4,203,62,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,29,'unknown','Thatch Island','18N','64W',18.3833,-64.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,29,'unknown','The Mill','18N','64W',18.45,-64.5333,242,74,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,29,'unknown','The Settlement','18N','64W',18.7167,-64.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,29,'unknown','Threllfall','18N','64W',18.4,-64.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,29,'unknown','Tobago Islands','18N','64W',18.45,-64.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,29,'unknown','Tobago Island','18N','64W',18.45,-64.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,29,'unknown','Tobago','18N','64W',18.45,-64.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,29,'unknown','Tortola Island','18N','64W',18.45,-64.6,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,29,'unknown','Tortola','18N','64W',18.45,-64.6,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,29,'unknown','Vierges,','18N','64W',18.3333,-64.75,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,29,'unknown','Virgin  Peak','18N','64W',18.5,-64.4,203,62,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(105,29,'unknown','Virgin Gorda Island','18N','64W',18.5,-64.4,203,62,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(106,29,'unknown','Virgin Gorda Peak','18N','64W',18.5,-64.4,203,62,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(107,29,'unknown','Virgin Gorda','18N','64W',18.4333,-64.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(108,29,'unknown','Virgin Gorda','18N','64W',18.5,-64.4,203,62,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(109,29,'unknown','Virgin Islands Presidency','18N','64W',18.5,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(110,29,'unknown','Virgin Islands, Colony of the','18N','64W',18.5,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(111,29,'unknown','Virgin Islands, Presidency of','18N','64W',18.5,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(112,29,'unknown','Virgin Islands','18N','64W',18.3333,-64.75,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(113,29,'unknown','Virgin Islands','18N','64W',18.5,-64.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(114,29,'unknown','Virgin Islands','18N','64W',18,-64.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(115,29,'unknown','V','18N','64W',18.3333,-64.75,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(116,29,'unknown','Wesley Will','18N','64W',18.4333,-64.6,341,104,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(117,29,'unknown','West Dog','18N','64W',18.4833,-64.4667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(118,29,'unknown','West Seal Dog','18N','64W',18.5,-64.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `britishvirginislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:25:24
