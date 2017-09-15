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
-- Table structure for table `seychelles`
--

DROP TABLE IF EXISTS `seychelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seychelles` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(25) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seychelles`
--

LOCK TABLES `seychelles` WRITE;
/*!40000 ALTER TABLE `seychelles` DISABLE KEYS */;
INSERT INTO `seychelles` VALUES (1,174,'unknown','Africaines,','4S','53E',-4.8833,53.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,174,'unknown','African Islands','4S','53E',-4.8833,53.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,174,'unknown','African islets','4S','53E',-4.8833,53.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,174,'unknown','Aldabra Islands','9S','46E',-9.4167,46.3667,2286,697,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,174,'unknown','Aldabra Island','9S','46E',-9.4167,46.3667,2286,697,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,174,'unknown','Aldabra, Groupe d\'','9S','46E',-9.4167,46.3667,2286,697,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,174,'unknown','Alphonse Island','7S','52E',-7,52.7333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,174,'unknown','Alphonse,','7S','52E',-7,52.7333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,174,'unknown','Amirante Group','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,174,'unknown','Amirante Islands','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,174,'unknown','Amirante Isles','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,174,'unknown','Amirante archipelago, the','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,174,'unknown','Amirantes','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,174,'unknown','Annonyme Island','4S','55E',-4.65,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,174,'unknown','Anonyme Island','4S','55E',-4.65,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,174,'unknown','Anonyme Islet','4S','55E',-4.65,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,174,'unknown','Anonyme,','4S','55E',-4.65,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,174,'unknown','Anse Boileau','4S','55E',-4.7167,55.4833,269,82,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,174,'unknown','Anse Royale','4S','55E',-4.7333,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,174,'unknown','Anse Royal','4S','55E',-4.7333,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,174,'unknown','Anse Volbert Village','4S','55E',-4.3167,55.7333,479,146,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,174,'unknown','Aride Island','4S','55E',-4.2,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,174,'unknown','Aride,','4S','55E',-4.2,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,174,'unknown','Assumption Island','9S','46E',-9.75,46.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,174,'unknown','Assumption','9S','46E',-9.75,46.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,174,'unknown','Astove Island','10S','47E',-10.1,47.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,174,'unknown','Balise','4S','55E',-4.6167,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,174,'unknown','Bat Island','4S','55E',-4.3,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,174,'unknown','Bayonne','4S','55E',-4.6833,55.5,436,133,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,174,'unknown','Beacon Island','4S','55E',-4.6167,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,174,'unknown','Beacon islet','4S','55E',-4.6167,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,174,'unknown','Beau Vallon','4S','55E',-4.6,55.4167,59,18,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,174,'unknown','Bel Ombre','4S','55E',-4.6167,55.4167,830,253,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,174,'unknown','Belle Ombre','4S','55E',-4.6167,55.4167,830,253,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,174,'unknown','Benjamen Island','5S','53E',-5.45,53.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,174,'unknown','Benjamen islet','5S','53E',-5.45,53.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,174,'unknown','Bijoutier Island','7S','52E',-7.0667,52.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,174,'unknown','Bird Island','3S','55E',-3.7167,55.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,174,'unknown','Bird','3S','55E',-3.7167,55.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,174,'unknown','Blanc, Morne','4S','55E',-4.65,55.4333,1696,517,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,174,'unknown','Boudeuse Cay','6S','52E',-6.0833,52.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,174,'unknown','Brul','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,174,'unknown','Brul','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,174,'unknown','Cach','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,174,'unknown','Cascade','4S','55E',-4.6667,55.5,36,11,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,174,'unknown','Cascassaye Island','5S','53E',-5.45,53.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,174,'unknown','Cascassaye islet','5S','53E',-5.45,53.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,174,'unknown','Castle Peak','4S','55E',-4.4833,55.2333,679,207,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,174,'unknown','Castle Peak','4S','55E',-4.7167,55.5167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,174,'unknown','Cerf Islands','9S','50E',-9.5333,50.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,174,'unknown','Cerf Island','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,174,'unknown','Cerf Island','9S','50E',-9.5333,50.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,174,'unknown','Cerf,','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,174,'unknown','Cerfs,','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,174,'unknown','Chauve Souris Island','4S','55E',-4.3,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,174,'unknown','Chauve Souris Island','4S','55E',-4.7333,55.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,174,'unknown','Chauve Souris islet','4S','55E',-4.3,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,174,'unknown','Chauve Souris','4S','55E',-4.7333,55.4667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,174,'unknown','Chien Island','5S','53E',-5.4333,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,174,'unknown','Chien islet','5S','53E',-5.4333,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,174,'unknown','Cocoanut Island','9S','46E',-9.4,46.45,2214,675,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,174,'unknown','Coconut Islet','9S','46E',-9.4,46.45,2214,675,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,174,'unknown','Coetivi, Ile','7S','56E',-7.1333,56.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,174,'unknown','Coetivy Island','7S','56E',-7.1333,56.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,174,'unknown','Concept Island','4S','55E',-4.65,55.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,174,'unknown','Conception Island','4S','55E',-4.65,55.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,174,'unknown','Cosmoledo Group','9S','47E',-9.7167,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,174,'unknown','Cosmoledo islands','9S','47E',-9.7167,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,174,'unknown','Cosmoledo, Atoll de','9S','47E',-9.7167,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,174,'unknown','Cosmoledo','9S','47E',-9.7167,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,174,'unknown','Cousin Islands','4S','55E',-4.3333,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,174,'unknown','Cousin Island','4S','55E',-4.3167,55.65,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,174,'unknown','Cousin Islets','4S','55E',-4.3333,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,174,'unknown','Cousine Island','4S','55E',-4.35,55.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,174,'unknown','Cousine','4S','55E',-4.35,55.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,174,'unknown','Cousin','4S','55E',-4.3167,55.65,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,174,'unknown','Co','7S','56E',-7.1333,56.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,174,'unknown','Curieuse Island','4S','55E',-4.2667,55.7333,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,174,'unknown','Curieuse','4S','55E',-4.2667,55.7333,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,174,'unknown','De Quincey Village','4S','55E',-4.6,55.45,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,174,'unknown','De Quincy Village','4S','55E',-4.6,55.45,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,174,'unknown','Denis Island','3S','55E',-3.8,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,174,'unknown','Denis,','3S','55E',-3.8,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,174,'unknown','Denis','3S','55E',-3.8,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,174,'unknown','Dennis Island','3S','55E',-3.8,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,174,'unknown','Denys, Ile','3S','55E',-3.8,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,174,'unknown','Desn','6S','53E',-6.2333,53.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,174,'unknown','Desroches Island','5S','53E',-5.6833,53.6833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,174,'unknown','Desroches,','5S','53E',-5.6833,53.6833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,174,'unknown','D\'Arros Island','5S','53E',-5.4,53.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,174,'unknown','D\'Arros islet','5S','53E',-5.4,53.3,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,174,'unknown','Eagle Island','5S','53E',-5.1167,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,174,'unknown','Eagle islet','5S','53E',-5.1167,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,174,'unknown','East North Island','9S','47E',-9.65,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,174,'unknown','East Sister Island','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,174,'unknown','East Sister','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,174,'unknown','Esprit','9S','46E',-9.4167,46.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,174,'unknown','Euphrates Islet','9S','46E',-9.4167,46.25,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,174,'unknown','Faon Island','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,174,'unknown','Faon Islet','4S','55E',-4.6333,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,174,'unknown','Farquhar Group','10S','51E',-10.1667,51.1667,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,174,'unknown','Farquhar Islands','10S','51E',-10.1667,51.1667,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,174,'unknown','Farquhar, Atoll de','10S','51E',-10.1667,51.1667,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,174,'unknown','Fouquet Island','5S','53E',-5.4167,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(105,174,'unknown','Fouquet islet','5S','53E',-5.4167,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(106,174,'unknown','Frigate Island','4S','55E',-4.5833,55.9333,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(107,174,'unknown','Fr','4S','55E',-4.5833,55.9333,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(108,174,'unknown','F','4S','55E',-4.3333,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(109,174,'unknown','Goelette Island','10S','51E',-10.2167,51.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(110,174,'unknown','Grand S','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(111,174,'unknown','G','10S','51E',-10.2167,51.1333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(112,174,'unknown','Harrison, Mount','4S','55E',-4.6833,55.4833,1240,378,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(113,174,'unknown','Howard, Mount','4S','55E',-4.5667,55.4333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(114,174,'unknown','Ile Picard','9S','46E',-9.3667,46.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(115,174,'unknown','Ile Vaches de Mer','3S','55E',-3.7167,55.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(116,174,'unknown','Jo','10S','51E',-10.1667,51.1667,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(117,174,'unknown','La Digue Island','4S','55E',-4.35,55.8333,137,42,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(118,174,'unknown','La Digue','4S','55E',-4.35,55.8333,137,42,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(119,174,'unknown','La Misere','4S','55E',-4.6667,55.4667,1856,566,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(120,174,'unknown','La R','4S','55E',-4.35,55.8333,137,42,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(121,174,'unknown','Lebouli, Piton de','4S','55E',-4.7167,55.5167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(122,174,'unknown','Les Amirantes','6S','53E',-6,53.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(123,174,'unknown','Les Parisiennes','4S','55E',-4.3,55.6833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(124,174,'unknown','Les S','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(125,174,'unknown','Les Trois Freres','4S','55E',-4.6333,55.4333,1138,347,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(126,174,'unknown','Lockyer, Mount','4S','55E',-4.7667,55.5167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(127,174,'unknown','Long Island','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(128,174,'unknown','Long islet','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(129,174,'unknown','L\'Esp','4S','55E',-4.7167,55.4833,269,82,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(130,174,'unknown','L\'Islette,','4S','55E',-4.65,55.4,544,166,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(131,174,'unknown','L\'Islette','4S','55E',-4.65,55.4,544,166,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(132,174,'unknown','L\'llot Island','4S','55E',-4.6,55.9,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(133,174,'unknown','L\'','4S','55E',-4.6,55.9,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(134,174,'unknown','Machabee','4S','55E',-4.5667,55.45,62,19,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(135,174,'unknown','Mah','4S','55E',-4.6667,55.4667,1856,566,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(136,174,'unknown','Mah','4S','55E',-4.6167,55.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(137,174,'unknown','Mah','4S','55E',-4.6667,55.4667,1856,566,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(138,174,'unknown','Main island','9S','46E',-9.4333,46.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(139,174,'unknown','Malabar island','9S','46E',-9.3667,46.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(140,174,'unknown','Mamelle Island','4S','55E',-4.4833,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(141,174,'unknown','Mamelle islet','4S','55E',-4.4833,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(142,174,'unknown','Mamelles','4S','55E',-4.4833,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(143,174,'unknown','Manaha Islets','10S','51E',-10.1333,51.1833,291,89,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(144,174,'unknown','Marianne','4S','55E',-4.3333,55.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(145,174,'unknown','Marie Anne Island','4S','55E',-4.3333,55.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(146,174,'unknown','Marie Louise Island','6S','53E',-6.1833,53.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(147,174,'unknown','Marie Louise islet','6S','53E',-6.1833,53.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(148,174,'unknown','Marie Louise','6S','53E',-6.1833,53.15,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(149,174,'unknown','Mary Anne Island','4S','55E',-4.3333,55.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(150,174,'unknown','Mehai Island','9S','47E',-9.7,47.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(151,174,'unknown','Menai Island','9S','47E',-9.7,47.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(152,174,'unknown','Michel','9S','46E',-9.4,46.45,2214,675,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(153,174,'unknown','Middle Island','9S','46E',-9.3667,46.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(154,174,'unknown','Misere','4S','55E',-4.6667,55.4667,1856,566,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(155,174,'unknown','Mon Plaisir','4S','55E',-4.4667,55.2167,1138,347,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(156,174,'unknown','Moyenne Island','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(157,174,'unknown','Moyenne islet','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(158,174,'unknown','Noeufs, Isle des','6S','53E',-6.2333,53.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(159,174,'unknown','Noeufs,','6S','53E',-6.2333,53.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(160,174,'unknown','Nord,','4S','55E',-4.3833,55.25,688,210,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(161,174,'unknown','North Cousin Islet','4S','55E',-4.3167,55.65,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(162,174,'unknown','North Island','10S','51E',-10.1167,51.1833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(163,174,'unknown','North Island','4S','55E',-4.3833,55.25,688,210,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(164,174,'unknown','North Island','4S','55E',-4.5667,55.4333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(165,174,'unknown','North Island','4S','53E',-4.8667,53.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(166,174,'unknown','North Islet','4S','53E',-4.8667,53.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(167,174,'unknown','North islet','4S','55E',-4.5667,55.4333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(168,174,'unknown','Pelican Island','5S','53E',-5.4333,53.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(169,174,'unknown','Pelican islet','5S','53E',-5.4333,53.35,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(170,174,'unknown','Petite S','4S','55E',-4.2833,55.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(171,174,'unknown','Petite','4S','55E',-4.6667,55.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(172,174,'unknown','Plate,','5S','55E',-5.8667,55.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(173,174,'unknown','Platte Island','5S','55E',-5.8667,55.3833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(174,174,'unknown','Poivre Islands','5S','53E',-5.7667,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(175,174,'unknown','Poivre islets','5S','53E',-5.7667,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(176,174,'unknown','Polymnie Island','9S','46E',-9.3667,46.2667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(177,174,'unknown','Port Glaud','4S','55E',-4.6667,55.4167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(178,174,'unknown','Port Victoria','4S','55E',-4.6167,55.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(179,174,'unknown','Poule Island','5S','53E',-5.4333,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(180,174,'unknown','Poule Islet','5S','53E',-5.4333,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(181,174,'unknown','Poule, Ile','5S','53E',-5.4333,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(182,174,'unknown','Praslin Island','4S','55E',-4.3167,55.7333,479,146,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(183,174,'unknown','Praslin','4S','55E',-4.3167,55.7333,479,146,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(184,174,'unknown','Providence Group','9S','50E',-9.3333,50.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(185,174,'unknown','Providence Island','9S','51E',-9.2333,51.0333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(186,174,'unknown','Providence, Atoll de','9S','50E',-9.3333,50.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(187,174,'unknown','Rat Island','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(188,174,'unknown','Rat islet','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(189,174,'unknown','Rats,','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(190,174,'unknown','Recif Island','4S','55E',-4.5833,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(191,174,'unknown','Recif islet','4S','55E',-4.5833,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(192,174,'unknown','Remire Island','5S','53E',-5.1167,53.3167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(193,174,'unknown','Ressource Island','5S','53E',-5.4,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(194,174,'unknown','Ressource islet','5S','53E',-5.4,53.3333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(195,174,'unknown','Ronde,','4S','55E',-4.35,55.7833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(196,174,'unknown','Round Island','4S','55E',-4.35,55.7833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(197,174,'unknown','Round Island','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(198,174,'unknown','Round islet','4S','55E',-4.35,55.7833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(199,174,'unknown','Round islet','4S','55E',-4.6167,55.5,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(200,174,'unknown','R','4S','55E',-4.5833,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(201,174,'unknown','Saint Anne Island','4S','55E',-4.6,55.5,715,218,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(202,174,'unknown','Saint Fran','7S','52E',-7.1667,52.7333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(203,174,'unknown','Saint Joseph Island','5S','53E',-5.4333,53.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(204,174,'unknown','Saint Joseph islet','5S','53E',-5.4333,53.3667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(205,174,'unknown','Saint Pierre Island','4S','55E',-4.2833,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(206,174,'unknown','Saint Pierre Island','9S','50E',-9.3167,50.7167,39,12,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(207,174,'unknown','Saint Pierre Islet','4S','55E',-4.2833,55.75,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(208,174,'unknown','Saint Pierre','9S','50E',-9.3167,50.7167,39,12,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(209,174,'unknown','Sand Cay','5S','53E',-5.6833,53.2333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(210,174,'unknown','Sea Cow island','3S','55E',-3.7167,55.2,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(211,174,'unknown','Sebert, Mount','4S','55E',-4.6833,55.5,436,133,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(212,174,'unknown','Seche Island','4S','55E',-4.6167,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(213,174,'unknown','Seychelles Group','4S','55E',-4.5833,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(214,174,'unknown','Seychelles Islands','4S','55E',-4.5833,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(215,174,'unknown','Seychelles, Colony of the','4S','55E',-4.5833,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(216,174,'unknown','Seychelles, Republic of','4S','55E',-4.5833,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(217,174,'unknown','Seychelles','4S','55E',-4.5833,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(218,174,'unknown','Seychellois, Morne','4S','55E',-4.65,55.4333,1696,517,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(219,174,'unknown','Silhouette Island','4S','55E',-4.4833,55.2333,679,207,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(220,174,'unknown','Silhouette','4S','55E',-4.4833,55.2333,679,207,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(221,174,'unknown','Simpson, Mount','4S','55E',-4.6333,55.4167,2191,668,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(222,174,'unknown','Sister Islands, The','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(223,174,'unknown','Sisters, The','4S','55E',-4.2833,55.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(224,174,'unknown','Souris Island','4S','55E',-4.7333,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(225,174,'unknown','Souris islet','4S','55E',-4.7333,55.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(226,174,'unknown','South Banks','9S','50E',-9.5333,50.9833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(227,174,'unknown','South Cousin Islet','4S','55E',-4.35,55.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(228,174,'unknown','South East Island','4S','55E',-4.6667,55.5333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(229,174,'unknown','South Island','10S','51E',-10.1667,51.1667,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(230,174,'unknown','South Island','4S','53E',-4.9,53.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(231,174,'unknown','South Island','9S','46E',-9.4333,46.3833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(232,174,'unknown','South Island','9S','47E',-9.7667,47.5833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(233,174,'unknown','Takamaka','4S','55E',-4.7667,55.5,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(234,174,'unknown','The Cousins','4S','55E',-4.3333,55.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(235,174,'unknown','Th','4S','55E',-4.6667,55.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(236,174,'unknown','Th','4S','55E',-4.6667,55.4,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(237,174,'unknown','Trois Fr','4S','55E',-4.6333,55.4333,1138,347,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(238,174,'unknown','Trois Iles','10S','51E',-10.1333,51.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(239,174,'unknown','Vache Island','4S','55E',-4.6833,55.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(240,174,'unknown','Vache, Isle','4S','55E',-4.6833,55.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(241,174,'unknown','Vaches,','4S','55E',-4.6833,55.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(242,174,'unknown','Victoria','4S','55E',-4.6167,55.45,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(243,174,'unknown','West Island','9S','46E',-9.3667,46.2167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(244,174,'unknown','West Sister Island','4S','55E',-4.2833,55.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(245,174,'unknown','West Sister','4S','55E',-4.2833,55.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(246,174,'unknown','Wizard Island','9S','47E',-9.7333,47.6333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(247,174,'unknown','','5S','53E',-5.8833,53.0167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `seychelles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:19:34
