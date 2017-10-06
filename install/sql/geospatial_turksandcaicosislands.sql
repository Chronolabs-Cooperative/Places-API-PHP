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
-- Table structure for table `turksandcaicosislands`
--

DROP TABLE IF EXISTS `turksandcaicosislands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turksandcaicosislands` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(24) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turksandcaicosislands`
--

LOCK TABLES `turksandcaicosislands` WRITE;
/*!40000 ALTER TABLE `turksandcaicosislands` DISABLE KEYS */;
INSERT INTO `turksandcaicosislands` VALUES (1,205,'unknown','Ambergris Cays','21N','71W',21.3,-71.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,205,'unknown','Ambre gris, Cayes d\'','21N','71W',21.3,-71.6167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,205,'unknown','Back Salina','21N','71W',21.45,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,205,'unknown','Balfour Town','21N','71W',21.3167,-71.2167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,205,'unknown','Bambarra','21N','71W',21.8167,-71.7167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,205,'unknown','Bay Cay','21N','71W',21.9167,-71.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,205,'unknown','Belle Isle','21N','72W',21.65,-72.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,205,'unknown','Big Ambergris Cay','21N','71W',21.3,-71.6333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,205,'unknown','Big Cameron Cay','21N','71W',21.6167,-71.5833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,205,'unknown','Big Sand Cay','21N','71W',21.2,-71.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,205,'unknown','Bird Island','21N','71W',21.3833,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,205,'unknown','Blue Hills Settlements','21N','72W',21.8,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,205,'unknown','Blue Hills','21N','72W',21.7833,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,205,'unknown','Blue Hills','21N','72W',21.8,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,205,'unknown','Booby Island','21N','71W',21.8167,-71.6667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,205,'unknown','Bottle Creek Settlements','21N','71W',21.8833,-71.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,205,'unknown','Bottle Creek','21N','71W',21.8833,-71.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,205,'unknown','Breeches Island','21N','71W',21.3667,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,205,'unknown','Bush Cay','21N','71W',21.2,-71.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,205,'unknown','Caicos Islands','21N','71W',21.9333,-71.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,205,'unknown','Caicos','21N','71W',21.9333,-71.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,205,'unknown','Ca','21N','71W',21.6833,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,205,'unknown','Ca','21N','71W',21.9333,-71.9833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,205,'unknown','Ca','21N','71W',21.5167,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,205,'unknown','Cockburn Harbour','21N','71W',21.4833,-71.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,205,'unknown','Cockburn Town','21N','71W',21.4667,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,205,'unknown','Conch Bar','21N','71W',21.8333,-71.7833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,205,'unknown','Conch Cay','21N','71W',21.85,-71.85,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,205,'unknown','Coton, Caye a','21N','71W',21.3667,-71.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,205,'unknown','Cotton Cay','21N','71W',21.3667,-71.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,205,'unknown','Dellis Cay','21N','72W',21.9,-72.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,205,'unknown','Dikish Cay','21N','71W',21.75,-71.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,205,'unknown','Donna Cay','21N','72W',21.8167,-72.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,205,'unknown','East Caicos Island','21N','71W',21.6833,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,205,'unknown','East Caicos','21N','71W',21.6833,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,205,'unknown','East Cay','21N','71W',21.3667,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,205,'unknown','Fish Cays','21N','71W',21.3667,-71.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,205,'unknown','Five Cays Settlement','21N','72W',21.75,-72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,205,'unknown','Five Cays','21N','72W',21.7333,-72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,205,'unknown','Fort George Cay','21N','72W',21.8833,-72.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,205,'unknown','Fort George','21N','72W',21.8833,-72.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,205,'unknown','French Cay','21N','72W',21.5,-72.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,205,'unknown','Gibb Cay','21N','71W',21.4333,-71.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,205,'unknown','Gibb\'s Cay','21N','71W',21.4333,-71.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,205,'unknown','Grand Caicos Island','21N','71W',21.7833,-71.7167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,205,'unknown','Grand Caicos','21N','71W',21.7833,-71.7167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,205,'unknown','Grand Turk Island','21N','71W',21.4833,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,205,'unknown','Grand Turk','21N','71W',21.4667,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,205,'unknown','Grand Turk','21N','71W',21.4833,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,205,'unknown','Grande Ca','21N','71W',21.7833,-71.7167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,205,'unknown','Greenwich','21N','71W',21.95,-71.9333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,205,'unknown','Highas Cay','21N','71W',21.8667,-71.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,205,'unknown','Hog Cay','21N','71W',21.6333,-71.5167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,205,'unknown','Iguana Cay','21N','71W',21.75,-71.5833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,205,'unknown','Island, The','21N','71W',21.4667,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,205,'unknown','Joe Grants Cay','21N','71W',21.75,-71.6,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,205,'unknown','Kew','21N','72W',21.9,-72.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,205,'unknown','Les Ca','21N','71W',21.9333,-71.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,205,'unknown','Little Ambergris Cay','21N','71W',21.2833,-71.6833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,205,'unknown','Little Water Cay','21N','72W',21.8333,-72.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,205,'unknown','Long Cay','21N','71W',21.4167,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,205,'unknown','Long Cay','21N','71W',21.4667,-71.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,205,'unknown','Longue, Ile','21N','71W',21.4167,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,205,'unknown','Lorimers','21N','71W',21.7833,-71.6833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,205,'unknown','Major Hill Cay','21N','71W',21.9333,-71.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,205,'unknown','Mangrove Cay','21N','72W',21.8167,-72.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,205,'unknown','Middle Caicos','21N','71W',21.7833,-71.7167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,205,'unknown','Middle Creek Cay','21N','71W',21.5833,-71.4833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,205,'unknown','Middleton Cay','21N','71W',21.5,-71.5667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,205,'unknown','Nigger Cay','21N','71W',21.6333,-71.4833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,205,'unknown','North Caicos Island','21N','71W',21.9333,-71.9833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,205,'unknown','North Caicos','21N','71W',21.9333,-71.9833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,205,'unknown','Over Back The Damp','21N','71W',21.4667,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,205,'unknown','Parrot Cay','21N','72W',21.9333,-72.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,205,'unknown','Parrot, Caye','21N','72W',21.9333,-72.0667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,205,'unknown','Pear Cay','21N','71W',21.1833,-71.6833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,205,'unknown','Pear Cay','21N','71W',21.3833,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,205,'unknown','Pelican Cay','21N','71W',21.4167,-71.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,205,'unknown','Penniston Cay','21N','71W',21.3667,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,205,'unknown','Pine Cay','21N','72W',21.8667,-72.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,205,'unknown','Plandon Cay','21N','71W',21.5667,-71.4833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,205,'unknown','Providence Island','21N','72W',21.7833,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,205,'unknown','Providenciales Island','21N','72W',21.7833,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,205,'unknown','Providenciales','21N','72W',21.7833,-72.2833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,205,'unknown','Sail Rock Island','21N','71W',21.5833,-71.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,205,'unknown','Salt Cay','21N','71W',21.3333,-71.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,205,'unknown','Sand Cay','21N','71W',21.2,-71.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,205,'unknown','Sandy Point','21N','72W',21.95,-72.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,205,'unknown','Seal Cays','21N','71W',21.1667,-71.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,205,'unknown','Seal, Cayes de','21N','71W',21.1667,-71.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,205,'unknown','Sel, Caye de','21N','71W',21.3333,-71.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,205,'unknown','Shot Cay','21N','71W',21.1833,-71.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,205,'unknown','Six Hill Cays','21N','71W',21.45,-71.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,205,'unknown','Six Hill Cay','21N','71W',21.45,-71.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,205,'unknown','South Caicos Island','21N','71W',21.5167,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,205,'unknown','South Caicos','21N','71W',21.5167,-71.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,205,'unknown','Stubb Cay','21N','72W',21.9167,-72.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,205,'unknown','Stubbs Cay','21N','72W',21.9167,-72.1,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,205,'unknown','The Bight Settlements','21N','72W',21.7833,-72.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,205,'unknown','The Bight','21N','72W',21.7833,-72.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,205,'unknown','Three Mary Cays','21N','72W',21.95,-72.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,205,'unknown','Turk Islands','21N','71W',21.4,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,205,'unknown','Turks Islands','21N','71W',21.4,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,205,'unknown','Turks and Caicos Islands','21N','71W',21.7333,-71.5833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(105,205,'unknown','Turques, Iles','21N','71W',21.4,-71.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(106,205,'unknown','Water Cay','21N','72W',21.85,-72.1167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(107,205,'unknown','West Caicos Island','21N','72W',21.65,-72.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(108,205,'unknown','West Caicos','21N','72W',21.65,-72.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(109,205,'unknown','West Road','21N','71W',21.4667,-71.1333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(110,205,'unknown','West Sand Spit','21N','72W',21.3667,-72.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(111,205,'unknown','Whitby','21N','71W',21.95,-71.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(112,205,'unknown','White Cay','21N','71W',21.1833,-71.8,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(113,205,'unknown','Yankee Town','21N','72W',21.65,-72.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `turksandcaicosislands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:27:02
