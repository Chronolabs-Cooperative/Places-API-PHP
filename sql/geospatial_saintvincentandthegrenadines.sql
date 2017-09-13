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
-- Table structure for table `saintvincentandthegrenadines`
--

DROP TABLE IF EXISTS `saintvincentandthegrenadines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saintvincentandthegrenadines` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(32) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saintvincentandthegrenadines`
--

LOCK TABLES `saintvincentandthegrenadines` WRITE;
/*!40000 ALTER TABLE `saintvincentandthegrenadines` DISABLE KEYS */;
INSERT INTO `saintvincentandthegrenadines` VALUES (1,167,'unknown','Adelphi','13N','61W',13.1833,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,167,'unknown','All Awash Island','12N','61W',12.9167,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,167,'unknown','All-awash','12N','61W',12.9167,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,167,'unknown','Arnos Vale Airport','13N','61W',13.1333,-61.2167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,167,'unknown','Arnos Vale','13N','61W',13.1333,-61.2167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,167,'unknown','Arnos Vale','13N','61W',13.1333,-61.2,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,167,'unknown','Ashton','12N','61W',12.5833,-61.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,167,'unknown','Baiabu','13N','61W',13.2,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,167,'unknown','Baliceaux Island','12N','61W',12.95,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,167,'unknown','Baliceaux','12N','61W',12.95,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,167,'unknown','Barawally','13N','61W',13.2333,-61.2667,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,167,'unknown','Barroualie','13N','61W',13.2333,-61.2667,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,167,'unknown','Barrouallie','13N','61W',13.2333,-61.2667,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,167,'unknown','Barrualli','13N','61W',13.2333,-61.2667,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,167,'unknown','Battowia Island','12N','61W',12.9667,-61.1333,229,70,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,167,'unknown','Battowia Islet','12N','61W',12.9667,-61.1333,229,70,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,167,'unknown','Battowia','12N','61W',12.9667,-61.1333,229,70,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,167,'unknown','Bednoe','12N','61W',12.95,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,167,'unknown','Belle Vue','13N','61W',13.2333,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,167,'unknown','Belmont','13N','61W',13.15,-61.1833,278,85,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,167,'unknown','Bequia Island','13N','61W',13.0167,-61.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,167,'unknown','Bequia','13N','61W',13.0167,-61.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,167,'unknown','Bequia','13N','61W',13.2833,-61.1333,321,98,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,167,'unknown','Biabou','13N','61W',13.2,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,167,'unknown','Brighton Village','13N','61W',13.1333,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,167,'unknown','Brighton','13N','61W',13.1333,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,167,'unknown','Brisbane, Mount','13N','61W',13.2833,-61.1833,2824,861,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,167,'unknown','Byera Village','13N','61W',13.25,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,167,'unknown','Caliaqua','13N','61W',13.1167,-61.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,167,'unknown','Calliagda','13N','61W',13.1167,-61.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,167,'unknown','Calliaqua','13N','61W',13.1167,-61.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,167,'unknown','Calliaqua','13N','61W',13.1306,-61.2028,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,167,'unknown','Camden Park','13N','61W',13.1667,-61.2333,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,167,'unknown','Cannouan Island','12N','61W',12.7167,-61.3333,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,167,'unknown','Cannouan','12N','61W',12.7167,-61.3333,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,167,'unknown','Canouan','12N','61W',12.7167,-61.3333,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,167,'unknown','Catholic Island','12N','61W',12.6667,-61.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,167,'unknown','Catholic Islet','12N','61W',12.6667,-61.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,167,'unknown','Chapmans','13N','61W',13.2833,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,167,'unknown','Charlestown','12N','61W',12.6833,-61.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,167,'unknown','Chateaubelair Island','13N','61W',13.2833,-61.25,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,167,'unknown','Chateaubelair Islet','13N','61W',13.2833,-61.25,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,167,'unknown','Chateaubelair','13N','61W',13.2833,-61.25,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,167,'unknown','Chauncey','13N','61W',13.1667,-61.2333,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,167,'unknown','Cheltenham','12N','61W',12.8833,-61.1833,104,32,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,167,'unknown','Church Cay','12N','61W',12.95,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,167,'unknown','Clare Valley','13N','61W',13.1667,-61.25,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,167,'unknown','Cliftons','12N','61W',12.5833,-61.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,167,'unknown','Clifton','12N','61W',12.5833,-61.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,167,'unknown','Colonarie','13N','61W',13.2333,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,167,'unknown','Cow and Calves','13N','61W',13.3667,-61.15,1128,344,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,167,'unknown','Derrick','12N','61W',12.9833,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,167,'unknown','Dike Island','13N','61W',13.1333,-61.215,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,167,'unknown','Dove Cay','12N','61W',12.6833,-61.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,167,'unknown','Dove Island','13N','61W',13.1353,-61.2081,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,167,'unknown','Dovers','12N','61W',12.8833,-61.1833,104,32,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,167,'unknown','Dubois','13N','61W',13.1833,-61.2333,682,208,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,167,'unknown','Duvernette Islet','13N','61W',13.1333,-61.2167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,167,'unknown','Edinboro','13N','61W',13.1575,-61.2444,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,167,'unknown','Fancy','13N','61W',13.3667,-61.1667,2011,613,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,167,'unknown','Francois','13N','61W',13.2,-61.2167,1558,475,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,167,'unknown','Friendly','13N','61W',13.2333,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,167,'unknown','Friendship','12N','61W',12.9833,-61.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,167,'unknown','Frigate Island','12N','61W',12.5833,-61.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,167,'unknown','Frigate Islet','12N','61W',12.5833,-61.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,167,'unknown','Georgetown','13N','61W',13.2667,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,167,'unknown','Grand Bonhomme','13N','61W',13.2333,-61.2333,1742,531,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,167,'unknown','Greathead','13N','61W',13.1442,-61.2208,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,167,'unknown','Greiggs','13N','61W',13.2,-61.15,167,51,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,167,'unknown','Grenadine Islands','12N','61W',12.6667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,167,'unknown','Grenadines, The','12N','61W',12.6667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,167,'unknown','Grenadines','12N','61W',12.6667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,167,'unknown','Hermitage','13N','61W',13.2333,-61.2167,1879,573,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,167,'unknown','Kingstown Park','13N','61W',13.1583,-61.235,36,11,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,167,'unknown','Kingstown','13N','61W',13.1333,-61.2167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,167,'unknown','Kukunjare','13N','61W',13.2833,-61.2333,915,279,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,167,'unknown','La Soufri','13N','61W',13.3333,-61.1833,3057,932,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,167,'unknown','Layou','13N','61W',13.2,-61.2667,49,15,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,167,'unknown','Liberty Lodge','13N','61W',13.1658,-61.2317,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,167,'unknown','Little Saint Vincent Island','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,167,'unknown','Little Saint Vincent','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,167,'unknown','Lovell Village','12N','61W',12.8833,-61.1833,104,32,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,167,'unknown','L\'Islot','12N','61W',12.6833,-61.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,167,'unknown','Mayaro Island','12N','61W',12.65,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,167,'unknown','Mayero Island','12N','61W',12.65,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,167,'unknown','Mayreau','12N','61W',12.65,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,167,'unknown','Mesopatamia','13N','61W',13.1667,-61.1667,459,140,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,167,'unknown','Mesopotamia','13N','61W',13.1667,-61.1667,459,140,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,167,'unknown','Milligan Cay','13N','61W',13.1167,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,167,'unknown','Milligan\'s Cay','13N','61W',13.1167,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,167,'unknown','Montrose','13N','61W',13.1667,-61.2333,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,167,'unknown','Morne Garu Mountains','13N','61W',13.2833,-61.1667,1669,509,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,167,'unknown','Mustique Island','12N','61W',12.8833,-61.1833,104,32,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,167,'unknown','Mustique','12N','61W',12.8833,-61.1833,104,32,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,167,'unknown','Nevis Island','12N','61W',12.9667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,167,'unknown','New Sandy Bay Village','13N','61W',13.35,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,167,'unknown','North Union','13N','61W',13.2167,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,167,'unknown','Old Wall','12N','61W',12.6333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,167,'unknown','Orange Hill','13N','61W',13.3167,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,167,'unknown','O\'Briens','13N','61W',13.2833,-61.1333,321,98,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,167,'unknown','Paget Farm','12N','61W',12.9833,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,167,'unknown','Palm Island','12N','61W',12.5833,-61.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,167,'unknown','Pembroke','13N','61W',13.1833,-61.25,482,147,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,167,'unknown','Peruvian Vale','13N','61W',13.1667,-61.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(105,167,'unknown','Petit Bonhomme','13N','61W',13.2,-61.2,1456,444,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(106,167,'unknown','Petit Cannouan','12N','61W',12.7833,-61.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(107,167,'unknown','Petit Canouan','12N','61W',12.7833,-61.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(108,167,'unknown','Petit Cay','12N','61W',12.8333,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(109,167,'unknown','Petit Mustique Island','12N','61W',12.85,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(110,167,'unknown','Petit Mustique Islet','12N','61W',12.85,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(111,167,'unknown','Petit Mustique','12N','61W',12.85,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(112,167,'unknown','Petit Nevis Island','12N','61W',12.9667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(113,167,'unknown','Petit Nevis','12N','61W',12.9667,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(114,167,'unknown','Petit Saint Vincent Island','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(115,167,'unknown','Island','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(116,167,'unknown','Petit Saint Vincent','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(117,167,'unknown','Petit Tobac','12N','61W',12.6167,-61.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(118,167,'unknown','Petite Saint Vincent','12N','61W',12.5333,-61.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(119,167,'unknown','Pidgeon Island','12N','61W',12.95,-61.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(120,167,'unknown','Pigeon Island','12N','61W',12.95,-61.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(121,167,'unknown','Pigeon Islet','12N','61W',12.95,-61.2833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(122,167,'unknown','Pillories, The','12N','61W',12.9,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(123,167,'unknown','Pillories','12N','61W',12.9,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(124,167,'unknown','Port Elizabeth','13N','61W',13.0167,-61.2333,252,77,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(125,167,'unknown','Port-Elisabeth','13N','61W',13.0167,-61.2333,252,77,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(126,167,'unknown','Princes Town','13N','61W',13.2333,-61.2667,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(127,167,'unknown','Prune Island','12N','61W',12.5833,-61.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(128,167,'unknown','Prune Islet','12N','61W',12.5833,-61.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(129,167,'unknown','Quatre Island','12N','61W',12.95,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(130,167,'unknown','Quatre Isle','12N','61W',12.95,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(131,167,'unknown','Quatre, Isle','12N','61W',12.95,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(132,167,'unknown','Quatre, Isle','12N','61W',12.95,-61.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(133,167,'unknown','Questelles','13N','61W',13.1667,-61.2333,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(134,167,'unknown','Rabaca','13N','61W',13.3,-61.15,859,262,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(135,167,'unknown','Rabacca','13N','61W',13.3,-61.15,859,262,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(136,167,'unknown','Rabaka','13N','61W',13.3,-61.15,859,262,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(137,167,'unknown','Rabbit Island','12N','61W',12.85,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(138,167,'unknown','Red Island','12N','61W',12.6,-61.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(139,167,'unknown','Red Islet','12N','61W',12.6,-61.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(140,167,'unknown','Redemption','13N','61W',13.1644,-61.2294,190,58,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(141,167,'unknown','Ribishi','13N','61W',13.1333,-61.1833,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(142,167,'unknown','Richland Park','13N','61W',13.2,-61.1667,777,237,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(143,167,'unknown','Richmond Peak','13N','61W',13.2833,-61.2,1988,606,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(144,167,'unknown','Richmond Town','13N','61W',13.2833,-61.25,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(145,167,'unknown','Richmond Vale','13N','61W',13.2833,-61.2333,915,279,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(146,167,'unknown','Richmond','13N','61W',13.2833,-61.25,623,190,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(147,167,'unknown','Richmond','13N','61W',13.3,-61.2167,1870,570,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(148,167,'unknown','Rosehall','13N','61W',13.2667,-61.2333,1145,349,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(149,167,'unknown','Rutland Vale Village','13N','61W',13.2,-61.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(150,167,'unknown','Rutland Vale','13N','61W',13.2,-61.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(151,167,'unknown','Saint Andrew, Mount','13N','61W',13.1833,-61.2167,1194,364,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(152,167,'unknown','Saint Andrews, Mount','13N','61W',13.1833,-61.2167,1194,364,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(153,167,'unknown','Saint Elairs Cay','12N','61W',12.9833,-61.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(154,167,'unknown','Saint Vincent Colony','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(155,167,'unknown','Saint Vincent and the Grenadines','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(156,167,'unknown','Grenadines','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(157,167,'unknown','Saint Vincent, Colony of','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(158,167,'unknown','Saint Vincent, State of','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(159,167,'unknown','Saint Vincent','13N','61W',13.0833,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(160,167,'unknown','Saint Vincent','13N','61W',13.1167,-61.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(161,167,'unknown','Saint Vincent','13N','61W',13.25,-61.2,2739,835,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(162,167,'unknown','Sand Cay','12N','61W',12.6,-61.4333,91,28,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(163,167,'unknown','Sans Souci','13N','61W',13.2167,-61.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(164,167,'unknown','Savan Island','12N','61W',12.8,-61.2,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(165,167,'unknown','Soufriere Mountains','13N','61W',13.3333,-61.1833,3057,932,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(166,167,'unknown','Soufri','13N','61W',13.3333,-61.1833,3057,932,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(167,167,'unknown','South Rivers','13N','61W',13.2333,-61.1333,157,48,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(168,167,'unknown','Spring Village','13N','61W',13.25,-61.2333,682,208,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(169,167,'unknown','Stubbs','13N','61W',13.1333,-61.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(170,167,'unknown','Tobago Cays','12N','61W',12.6333,-61.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(171,167,'unknown','Tourama','13N','61W',13.3333,-61.15,935,285,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(172,167,'unknown','Troumaka','13N','61W',13.2667,-61.25,721,220,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(173,167,'unknown','Turema','13N','61W',13.3333,-61.15,935,285,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(174,167,'unknown','Union Island','12N','61W',12.6,-61.4333,91,28,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(175,167,'unknown','Union','13N','61W',13,-61.2333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(176,167,'unknown','Vermont','13N','61W',13.2,-61.2167,1558,475,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(177,167,'unknown','Wallibou','13N','61W',13.3167,-61.2167,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(178,167,'unknown','Wallibu','13N','61W',13.3167,-61.2167,547,167,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(179,167,'unknown','Waterloo Mountains','13N','61W',13.3333,-61.15,935,285,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(180,167,'unknown','Waterloo','13N','61W',13.3,-61.1333,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(181,167,'unknown','Young Island','13N','61W',13.1333,-61.2,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(182,167,'unknown','Young Islet','13N','61W',13.1333,-61.2,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(183,167,'unknown','Youngs Island','13N','61W',13.1333,-61.2,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(184,167,'unknown','Youngs Islet','13N','61W',13.1333,-61.2,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `saintvincentandthegrenadines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:20:52
