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
-- Table structure for table `jersey`
--

DROP TABLE IF EXISTS `jersey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jersey` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(20) DEFAULT NULL,
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
-- Dumping data for table `jersey`
--

LOCK TABLES `jersey` WRITE;
/*!40000 ALTER TABLE `jersey` DISABLE KEYS */;
INSERT INTO `jersey` VALUES (1,102,'unknown','Beaumont','49N','2W',49.2,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,102,'unknown','Bel Royal','49N','2W',49.2,-2.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,102,'unknown','Belle Vue','49N','2W',49.2,-2.1833,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,102,'unknown','Elizabeth Castle','49N','2W',49.1767,-2.1239,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,102,'unknown','Gorey','49N','2W',49.2,-2.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,102,'unknown','Gouray','49N','2W',49.2,-2.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,102,'unknown','Grand Chemins','49N','2W',49.2,-2.0667,223,68,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,102,'unknown','Grand Mourier','49N','2W',49.2558,-2.1467,13,4,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,102,'unknown','Green Island','49N','2W',49.1667,-2.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,102,'unknown','Guerdain, Isle au','49N','2W',49.1667,-2.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,102,'unknown','Jersey, Bailiwick of','49N','2W',49.2167,-2.1167,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,102,'unknown','Jersey, Isle of','49N','2W',49.2167,-2.1167,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,102,'unknown','Jersey','49N','2W',49.2167,-2.1167,288,88,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,102,'unknown','La Falaise','49N','2W',49.2503,-2.1667,308,94,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,102,'unknown','La Fosse','49N','2W',49.1739,-2.1764,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,102,'unknown','La Haule','49N','2W',49.1833,-2.1833,177,54,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,102,'unknown','La Hougue','49N','2W',49.2167,-2.2167,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,102,'unknown','La Motte','49N','2W',49.1667,-2.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,102,'unknown','La Villaise','49N','2W',49.2422,-2.2347,252,77,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,102,'unknown','Le Rondin','49N','2W',49.2417,-2.1794,314,96,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,102,'unknown','Les Creux','49N','2W',49.1819,-2.2042,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,102,'unknown','Longueville','49N','2W',49.1833,-2.0833,49,15,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,102,'unknown','Lower Blanc Pignon','49N','2W',49.2,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,102,'unknown','L\'Etacq','49N','2W',49.2333,-2.2333,164,50,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,102,'unknown','L\'Etac','49N','2W',49.2333,-2.2333,164,50,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,102,'unknown','Marmotier','49N','1W',49.2917,-1.9278,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,102,'unknown','Millbrook','49N','2W',49.2,-2.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,102,'unknown','Mont Fiquet','49N','2W',49.1806,-2.2128,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,102,'unknown','Mont Mado','49N','2W',49.2478,-2.1225,400,122,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,102,'unknown','Mount Mado','49N','2W',49.2478,-2.1225,400,122,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,102,'unknown','M','49N','1W',49.2833,-1.9278,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,102,'unknown','Perruque','49N','2W',49.2519,-2.1406,364,111,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,102,'unknown','Portinfer','49N','2W',49.2519,-2.2236,282,86,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,102,'unknown','Rozel Seigneurie','49N','2W',49.2333,-2.05,213,65,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,102,'unknown','Rozel','49N','2W',49.2333,-2.05,213,65,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,102,'unknown','Saint Aubin','49N','2W',49.1833,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,102,'unknown','Saint Aubyn','49N','2W',49.1833,-2.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,102,'unknown','Saint Helier','49N','2W',49.1833,-2.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,102,'unknown','Saint Jean','49N','2W',49.25,-2.1333,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,102,'unknown','Saint John\'s','49N','2W',49.25,-2.1333,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,102,'unknown','Saint Johns Church','49N','2W',49.25,-2.1333,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,102,'unknown','Saint John','49N','2W',49.25,-2.1333,377,115,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,102,'unknown','Saint Peter Church','49N','2W',49.2167,-2.1833,239,73,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,102,'unknown','Saint Peter\'s','49N','2W',49.2167,-2.1833,239,73,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,102,'unknown','Saint Peters Church','49N','2W',49.2167,-2.1833,239,73,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,102,'unknown','Saint Peter','49N','2W',49.2167,-2.1833,239,73,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,102,'unknown','Six Rues','49N','2W',49.2333,-2.15,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,102,'unknown','Ville Bagot','49N','2W',49.2447,-2.2053,295,90,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,102,'unknown','Ville au Bas','49N','2W',49.2292,-2.2119,301,92,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,102,'unknown','Ville des Quennevais','49N','2W',49.2,-2.2,213,65,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,102,'unknown','Ville des Quenvais','49N','2W',49.2,-2.2,213,65,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,102,'unknown','Ville','49N','2W',49.1956,-2.1267,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,102,'unknown','Ville','49N','2W',49.2,-2.2,213,65,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,102,'unknown','Vinchelez de Bas','49N','2W',49.25,-2.2167,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,102,'unknown','Vinchelez de Haut','49N','2W',49.25,-2.2167,246,75,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `jersey` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:26:43
