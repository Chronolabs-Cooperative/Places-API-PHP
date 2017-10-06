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
-- Table structure for table `britishindianoceanterritory`
--

DROP TABLE IF EXISTS `britishindianoceanterritory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `britishindianoceanterritory` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(30) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `britishindianoceanterritory`
--

LOCK TABLES `britishindianoceanterritory` WRITE;
/*!40000 ALTER TABLE `britishindianoceanterritory` DISABLE KEYS */;
INSERT INTO `britishindianoceanterritory` VALUES (1,28,'unknown','Anglaise,','5S','72E',-5.3333,72.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,28,'unknown','Anglaise,','5S','71E',-5.4167,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,28,'unknown','Boddam,','5S','72E',-5.35,72.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,28,'unknown','British Indian Ocean Territory','6S','72E',-6,72,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,28,'unknown','Carre Pate,','6S','71E',-6.6667,71.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,28,'unknown','Chagos Archipelago','6S','72E',-6,72,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,28,'unknown','Chagos Islands','6S','72E',-6,72,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,28,'unknown','Chagos','6S','72E',-6,72,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,28,'unknown','Coin du Mire','5S','71E',-5.4167,71.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,28,'unknown','Coin,','5S','71E',-5.4333,71.7667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,28,'unknown','Danger Island','6S','71E',-6.3833,71.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,28,'unknown','Danger','6S','71E',-6.3833,71.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,28,'unknown','Diable,','5S','72E',-5.35,72.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,28,'unknown','Diamant,','5S','71E',-5.25,71.7667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,28,'unknown','Diego Garcia','7S','72E',-7.3333,72.4167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,28,'unknown','Eagle Islands','6S','71E',-6.2,71.3333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,28,'unknown','Eagle','6S','71E',-6.2,71.3333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,28,'unknown','East Island','7S','72E',-7.2167,72.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,28,'unknown','East Islet','7S','72E',-7.2167,72.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,28,'unknown','Egmont Islands','6S','71E',-6.65,71.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,28,'unknown','Finon,','5S','71E',-5.3167,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,28,'unknown','Fouquet,','5S','72E',-5.3333,72.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,28,'unknown','Fouquet,','5S','71E',-5.45,71.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,28,'unknown','Gabrielle,','5S','71E',-5.4,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,28,'unknown','Grande Soeur','5S','71E',-5.3333,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,28,'unknown','Grande','5S','71E',-5.35,71.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,28,'unknown','Grande','5S','71E',-5.25,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,28,'unknown','Gunners Coign','5S','71E',-5.4167,71.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,28,'unknown','Jacobin,','5S','72E',-5.35,72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,28,'unknown','Longue,','5S','71E',-5.2667,71.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,28,'unknown','Lubine,','6S','71E',-6.65,71.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,28,'unknown','Manoel,','5S','71E',-5.25,71.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,28,'unknown','Manon,','5S','71E',-5.3,71.7333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,28,'unknown','Mapou de','5S','71E',-5.45,71.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,28,'unknown','Mapou,','5S','72E',-5.3,72.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,28,'unknown','Middle Island','7S','72E',-7.2167,72.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,28,'unknown','Middle Islet','7S','72E',-7.2167,72.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,28,'unknown','Monpatre,','5S','71E',-5.4167,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,28,'unknown','Moresby Islands','5S','71E',-5.2333,71.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,28,'unknown','Nelson Island','5S','72E',-5.6833,72.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,28,'unknown','Nelsons Island','5S','72E',-5.6833,72.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,28,'unknown','Parasol,','5S','71E',-5.25,71.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,28,'unknown','Parasole, Ile','5S','71E',-5.25,71.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,28,'unknown','Passe,','5S','71E',-5.2333,71.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,28,'unknown','Passe,','5S','72E',-5.3,72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,28,'unknown','Peros Banhos Island','5S','71E',-5.3333,71.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,28,'unknown','Peros Banhos','5S','71E',-5.3333,71.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,28,'unknown','Petite Soeur','5S','71E',-5.35,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,28,'unknown','Petite','5S','71E',-5.3167,71.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,28,'unknown','Petite','5S','71E',-5.2667,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,28,'unknown','Petite','5S','71E',-5.2333,71.8167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,28,'unknown','Pierre,','5S','71E',-5.2833,71.7333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,28,'unknown','Poule,','5S','72E',-5.35,72.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,28,'unknown','Poule,','5S','71E',-5.3833,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,28,'unknown','Rats,','6S','71E',-6.6333,71.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,28,'unknown','Saint-Brandon,','5S','71E',-5.2333,71.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,28,'unknown','Salomon Islands','5S','72E',-5.3333,72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,28,'unknown','Sel,','5S','72E',-5.35,72.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,28,'unknown','Sepulture,','5S','72E',-5.35,72.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,28,'unknown','Sipaille,','6S','71E',-6.65,71.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,28,'unknown','Six Islands','6S','71E',-6.65,71.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,28,'unknown','Sudest,','6S','71E',-6.6667,71.4,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,28,'unknown','Takamaka,','5S','72E',-5.3333,72.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,28,'unknown','Tattamucca,','6S','71E',-6.6667,71.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,28,'unknown','Three Brothers Islands','6S','71E',-6.1333,71.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,28,'unknown','Three Brothers','6S','71E',-6.1333,71.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,28,'unknown','Vache Marine,','5S','71E',-5.4,71.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,28,'unknown','Verte,','5S','71E',-5.3167,71.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,28,'unknown','West Island','7S','72E',-7.25,72.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,28,'unknown','West Islet','7S','72E',-7.25,72.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,28,'unknown','Yeye,','5S','71E',-5.2333,71.9667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `britishindianoceanterritory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:20:51
