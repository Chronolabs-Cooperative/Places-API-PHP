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
-- Table structure for table `grenada_states`
--

DROP TABLE IF EXISTS `grenada_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grenada_states` (
  `StateID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT '0',
  `State` char(64) DEFAULT '',
  `max_latitude` float(21,11) DEFAULT '0.00000000000',
  `max_longitude` float(21,11) DEFAULT '0.00000000000',
  `min_latitude` float(21,11) DEFAULT '0.00000000000',
  `min_longitude` float(21,11) DEFAULT '0.00000000000',
  `max_altitude_feet` int(11) DEFAULT '0',
  `max_altitude_meters` int(11) DEFAULT '0',
  `min_altitude_feet` int(11) DEFAULT '0',
  `min_altitude_meters` int(11) DEFAULT '0',
  `max_population` mediumint(21) DEFAULT '0',
  `min_population` mediumint(21) DEFAULT '0',
  `sum_population` mediumint(21) DEFAULT '0',
  `records` int(11) DEFAULT '0',
  `venues` int(11) DEFAULT '0',
  `details` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `updates` int(11) DEFAULT '0',
  `citys` int(11) DEFAULT '0',
  `suburbs` int(11) DEFAULT '0',
  `towns` int(11) DEFAULT '0',
  `villages` int(11) DEFAULT '0',
  `camps` int(11) DEFAULT '0',
  `militarys` int(11) DEFAULT '0',
  `unknowns` int(11) DEFAULT '0',
  PRIMARY KEY (`StateID`),
  KEY `SEARCH` (`StateID`,`CountryID`,`max_latitude`,`max_longitude`,`min_latitude`,`min_longitude`) USING BTREE KEY_BLOCK_SIZE=16,
  KEY `NAMING-ONE` (`StateID`,`CountryID`,`State`(1)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TWO` (`StateID`,`CountryID`,`State`(2)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-THREE` (`StateID`,`CountryID`,`State`(3)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FOUR` (`StateID`,`CountryID`,`State`(4)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FIVE` (`StateID`,`CountryID`,`State`(5)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-SIX` (`StateID`,`CountryID`,`State`(6)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-SEVEN` (`StateID`,`CountryID`,`State`(7)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-EIGHT` (`StateID`,`CountryID`,`State`(8)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-NINE` (`StateID`,`CountryID`,`State`(9)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TEN` (`StateID`,`CountryID`,`State`(10)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-ELEVEN` (`StateID`,`CountryID`,`State`(11)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-TWELVE` (`StateID`,`CountryID`,`State`(12)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-THIRTEEN` (`StateID`,`CountryID`,`State`(13)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FOURTEEN` (`StateID`,`CountryID`,`State`(14)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `NAMING-FIFTHTEEN` (`StateID`,`CountryID`,`State`(15)) USING BTREE KEY_BLOCK_SIZE=8,
  KEY `ALPHABET` (`StateID`,`CountryID`,`State`,`max_latitude`,`max_longitude`,`min_latitude`,`min_longitude`) USING BTREE KEY_BLOCK_SIZE=16
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grenada_states`
--

LOCK TABLES `grenada_states` WRITE;
/*!40000 ALTER TABLE `grenada_states` DISABLE KEYS */;
/*!40000 ALTER TABLE `grenada_states` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:18:15
