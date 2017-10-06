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
-- Table structure for table `saintlucia`
--

DROP TABLE IF EXISTS `saintlucia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saintlucia` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(31) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saintlucia`
--

LOCK TABLES `saintlucia` WRITE;
/*!40000 ALTER TABLE `saintlucia` DISABLE KEYS */;
INSERT INTO `saintlucia` VALUES (1,166,'unknown','Anbre','13N','60W',13.8167,-60.9167,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,166,'unknown','Angere','13N','60W',13.7833,-60.9167,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,166,'unknown','Annus','13N','61W',13.7667,-61,610,186,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,166,'unknown','Anse Canot','13N','60W',13.9,-60.9,528,161,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,166,'unknown','Anse Ger','13N','60W',13.7833,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,166,'unknown','Anse La Raye','13N','61W',13.9333,-61.0333,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,166,'unknown','Anse La Verdure','13N','61W',13.9,-61.05,551,168,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,166,'unknown','Anse Noir','13N','60W',13.7333,-60.9833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,166,'unknown','Au Tabor','13N','61W',13.9333,-61.0333,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,166,'unknown','Augier','13N','60W',13.75,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,166,'unknown','Babonneau','14N','60W',14,-60.9333,183,56,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,166,'unknown','Balambouche','13N','61W',13.75,-61.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,166,'unknown','Balata','14N','60W',14,-60.95,321,98,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,166,'unknown','Balca','13N','61W',13.7667,-61.0167,295,90,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,166,'unknown','Balembouche','13N','61W',13.75,-61.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,166,'unknown','Banse','13N','60W',13.7667,-60.9833,252,77,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,166,'unknown','Bateaux Island','13N','60W',13.9,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,166,'unknown','Beauchamp','13N','60W',13.8167,-60.9167,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,166,'unknown','Beaujolais, Mount','13N','60W',13.9,-60.9333,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,166,'unknown','Beaus','13N','60W',13.75,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,166,'unknown','Beaus','13N','61W',13.8167,-61.05,1049,320,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,166,'unknown','Belair','13N','60W',13.95,-60.9833,255,78,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,166,'unknown','Belle Plaine','13N','61W',13.8167,-61.0333,1095,334,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,166,'unknown','Belle Plain','13N','61W',13.8167,-61.0333,1095,334,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,166,'unknown','Belle Vue','13N','60W',13.7833,-60.95,734,224,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,166,'unknown','Belle Vue','13N','61W',13.8333,-61.0667,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,166,'unknown','Bellevue, Morne','13N','61W',13.9667,-61.0167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,166,'unknown','Bellevue, Mount','13N','61W',13.9667,-61.0167,134,41,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,166,'unknown','Belmont','13N','60W',13.9333,-60.9167,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,166,'unknown','Belvedere','13N','61W',13.8833,-61.05,1259,384,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,166,'unknown','Belvidere, Morne','13N','61W',13.8167,-61,1036,316,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,166,'unknown','Belvidere, Mount','13N','61W',13.8167,-61,1036,316,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,166,'unknown','Berre Denis','13N','60W',13.9667,-60.9833,321,98,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,166,'unknown','Bexon','13N','60W',13.95,-60.9667,528,161,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,166,'unknown','Bis','14N','60W',14.0167,-60.9667,429,131,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,166,'unknown','Black Bay','13N','60W',13.7333,-60.9833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,166,'unknown','Blanchard','13N','60W',13.8,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,166,'unknown','Bois Joli','13N','60W',13.9,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,166,'unknown','Bois d\'Orange','14N','60W',14.05,-60.9667,236,72,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,166,'unknown','Boisjolly, Mount','13N','60W',13.9,-60.9333,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,166,'unknown','Bon Air','14N','60W',14.05,-60.9667,236,72,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,166,'unknown','Bongalo','13N','61W',13.75,-61.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,166,'unknown','Bosquet d\'Or','13N','60W',13.9167,-60.9,147,45,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,166,'unknown','Bottes, Morne des','14N','60W',14.0333,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,166,'unknown','Bottes, Mount des','14N','60W',14.0333,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,166,'unknown','Bottes, Mount de','14N','60W',14.0333,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,166,'unknown','Bottes, Mount','14N','60W',14.0333,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,166,'unknown','Bouche Island','13N','60W',13.95,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,166,'unknown','Bouche Islet','13N','60W',13.95,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,166,'unknown','Bourgaret, Mount','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,166,'unknown','Bouton','13N','61W',13.8667,-61.0667,629,192,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,166,'unknown','Cabiche','14N','60W',14,-60.9333,183,56,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,166,'unknown','Cabrite, Morne','13N','61W',13.9833,-61.0333,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,166,'unknown','Cabrite, Mount','13N','61W',13.9833,-61.0333,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,166,'unknown','Caf','13N','61W',13.7833,-61.0333,285,87,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(56,166,'unknown','Caillandre, Morne','13N','60W',13.7667,-60.95,216,66,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(57,166,'unknown','Canarie, Piton','13N','61W',13.85,-61.0167,1945,593,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(58,166,'unknown','Canaries, Piton','13N','61W',13.85,-61.0167,1945,593,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(59,166,'unknown','Canaries','13N','61W',13.9,-61.0667,492,150,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(60,166,'unknown','Canot','13N','60W',13.9,-60.9,528,161,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(61,166,'unknown','Cantonement','13N','60W',13.75,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(62,166,'unknown','Cap Estate','14N','60W',14.0833,-60.95,160,49,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(63,166,'unknown','Cap, Morne du','14N','60W',14.1,-60.9333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(64,166,'unknown','Cap, Mount du','14N','60W',14.1,-60.9333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(65,166,'unknown','Carri','13N','60W',13.7667,-60.95,216,66,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(66,166,'unknown','Casteau, Morne','13N','61W',13.85,-61.0167,1945,593,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(67,166,'unknown','Casteau, Mount','13N','61W',13.85,-61.0167,1945,593,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(68,166,'unknown','Castries','14N','61W',14,-61,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(69,166,'unknown','Charlotre','14N','60W',14,-60.9833,524,160,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(70,166,'unknown','Charlotte','14N','60W',14,-60.9833,524,160,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(71,166,'unknown','Chassin','13N','60W',13.9833,-60.9167,1866,569,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(72,166,'unknown','Chaubourg, Morne','14N','60W',14.0167,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(73,166,'unknown','Chaubourg, Mount','14N','60W',14.0167,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(74,166,'unknown','Chazeau, Mount du','13N','60W',13.9833,-60.9667,813,248,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(75,166,'unknown','Choc Island','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(76,166,'unknown','Choc Islet','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(77,166,'unknown','Choc, Islet du','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(78,166,'unknown','Choc','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(79,166,'unknown','Choiseuil','13N','61W',13.7667,-61.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(80,166,'unknown','Choiseul','13N','61W',13.7667,-61.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(81,166,'unknown','Ch','13N','61W',13.8,-61.05,613,187,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(82,166,'unknown','Cicerone','13N','61W',13.9833,-61,154,47,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(83,166,'unknown','Ciceron','13N','61W',13.9833,-61,154,47,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(84,166,'unknown','Cochon, Morne','13N','61W',13.85,-61,1496,456,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(85,166,'unknown','Cochon, Mount','13N','61W',13.85,-61,1496,456,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(86,166,'unknown','Colombette','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(87,166,'unknown','Corinthe','14N','60W',14.05,-60.9667,236,72,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(88,166,'unknown','Crown Lands','13N','60W',13.95,-60.9667,528,161,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(89,166,'unknown','Dame de Traversay','13N','60W',13.9167,-60.9833,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(90,166,'unknown','Dauphin','14N','60W',14.0333,-60.9,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(91,166,'unknown','De Mailly','13N','60W',13.7833,-60.95,734,224,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(92,166,'unknown','Debreuil','13N','61W',13.7833,-61.0167,410,125,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(93,166,'unknown','Deglos','13N','60W',13.9667,-60.9667,295,90,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(94,166,'unknown','Delcer','13N','61W',13.7833,-61.05,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(95,166,'unknown','Dennery Island','13N','60W',13.9,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(96,166,'unknown','Dennery','13N','60W',13.9,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(97,166,'unknown','Derni','13N','60W',13.95,-60.9167,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(98,166,'unknown','Derri','13N','61W',13.9333,-61,475,145,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(99,166,'unknown','Derri','13N','60W',13.7333,-60.95,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(100,166,'unknown','Des Bateaux Island','13N','60W',13.9,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(101,166,'unknown','Des Bateaux Islet','13N','60W',13.9,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(102,166,'unknown','Desbarra','13N','60W',13.9833,-60.9,456,139,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(103,166,'unknown','Descatieres','13N','61W',13.7667,-61.05,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(104,166,'unknown','Despinoze','13N','60W',13.9333,-60.9,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(105,166,'unknown','Desruisseaux','13N','60W',13.7833,-60.9333,173,53,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(106,166,'unknown','Desruisseau','13N','60W',13.7833,-60.9333,173,53,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(107,166,'unknown','Diamond','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(108,166,'unknown','Dor','13N','61W',13.75,-61.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(109,166,'unknown','Doudon, Morne','14N','60W',14,-60.9667,442,135,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(110,166,'unknown','Doudon, Mount','14N','60W',14,-60.9667,442,135,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(111,166,'unknown','Duchazau, Mount','13N','60W',13.9833,-60.9667,813,248,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(112,166,'unknown','Duchazeau, Mount','13N','60W',13.9833,-60.9667,813,248,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(113,166,'unknown','Dugard','13N','60W',13.8,-60.9,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(114,166,'unknown','Dugard','13N','61W',13.8,-61.0333,600,183,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(115,166,'unknown','Durandeau','13N','60W',13.9167,-60.9833,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(116,166,'unknown','Durocher, Morne','13N','60W',13.85,-60.9167,65,20,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(117,166,'unknown','Durocher, Mount','13N','60W',13.85,-60.9167,65,20,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(118,166,'unknown','D\'Aubaigon','13N','60W',13.8333,-60.9167,52,16,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(119,166,'unknown','Eau Piquant','13N','60W',13.75,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(120,166,'unknown','Ferrand','13N','60W',13.9667,-60.9833,321,98,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(121,166,'unknown','Fiette','13N','61W',13.7833,-61.05,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(122,166,'unknown','Floissac','13N','60W',13.95,-60.95,797,243,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(123,166,'unknown','Flore, Piton','13N','60W',13.95,-60.95,797,243,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(124,166,'unknown','Fond Assor','13N','60W',13.9833,-60.9167,1866,569,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(125,166,'unknown','Fond Devaux','13N','60W',13.85,-60.9167,65,20,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(126,166,'unknown','Fond Doux','13N','61W',13.8167,-61.05,1049,320,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(127,166,'unknown','Fond Saint Jacques','13N','61W',13.8333,-61.0167,1492,455,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(128,166,'unknown','Fond Saint Jaques','13N','61W',13.8333,-61.0167,1492,455,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(129,166,'unknown','Fond d\'Or','13N','60W',13.8,-60.9167,160,49,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(130,166,'unknown','Foresti','13N','60W',13.9667,-60.95,1207,368,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(131,166,'unknown','Fortune, Morne','14N','61W',14,-61,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(132,166,'unknown','Fortune, Mount','14N','61W',14,-61,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(133,166,'unknown','Foureur Island','14N','60W',14.0667,-60.9833,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(134,166,'unknown','Foureur Islet','14N','60W',14.0667,-60.9833,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(135,166,'unknown','Fourreur Island','14N','60W',14.0667,-60.9833,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(136,166,'unknown','Fous Island','14N','60W',14.0667,-60.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(137,166,'unknown','Fous Islet','14N','60W',14.0667,-60.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(138,166,'unknown','Fregate Island','13N','60W',13.8667,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(139,166,'unknown','Frigate Island','13N','60W',13.8667,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(140,166,'unknown','Frigate','13N','60W',13.8667,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(141,166,'unknown','Gaiac, Mont','14N','60W',14.05,-60.9,49,15,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(142,166,'unknown','Gaiac, Morne','14N','60W',14.05,-60.9,49,15,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(143,166,'unknown','Gaiac, Mount','14N','60W',14.05,-60.9,49,15,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(144,166,'unknown','Garrand','14N','60W',14,-60.9167,590,180,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(145,166,'unknown','Gentil','13N','60W',13.7667,-60.9833,252,77,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(146,166,'unknown','Gimie, Morne','13N','61W',13.85,-61,1496,456,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(147,166,'unknown','Gimie, Mount','13N','61W',13.85,-61,1496,456,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(148,166,'unknown','Girard','13N','60W',13.9833,-60.95,574,175,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(149,166,'unknown','Gomier, Mount','13N','61W',13.7667,-61,610,186,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(150,166,'unknown','Gommier, Mount','13N','61W',13.7667,-61,610,186,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(151,166,'unknown','Gonnier, Mount','13N','61W',13.7667,-61,610,186,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(152,166,'unknown','Grace','13N','60W',13.7667,-60.9667,164,50,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(153,166,'unknown','Grand Anse','14N','60W',14,-60.9,413,126,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(154,166,'unknown','Grand Magasin, Morne','13N','61W',13.8167,-61,1036,316,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(155,166,'unknown','Grand Magasin, Mount','13N','61W',13.8167,-61,1036,316,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(156,166,'unknown','Grand Magazin, Mount','13N','61W',13.8167,-61,1036,316,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(157,166,'unknown','Grande Anse','14N','60W',14,-60.9,413,126,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(158,166,'unknown','Grande Ravine','13N','60W',13.9333,-60.9167,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(159,166,'unknown','Grande Rivi','13N','60W',13.9167,-60.9167,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(160,166,'unknown','Grande Rivi','13N','61W',13.9333,-61.0333,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(161,166,'unknown','Grenier, Morne','14N','60W',14.05,-60.95,485,148,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(162,166,'unknown','Grenier, Mount','14N','60W',14.05,-60.95,485,148,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(163,166,'unknown','Gros Ilet','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(164,166,'unknown','Gros Island','14N','60W',14.0833,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(165,166,'unknown','Gros Islet Village','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(166,166,'unknown','Gros Islet','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(167,166,'unknown','Gros Islet','14N','60W',14.0833,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(168,166,'unknown','Gros Morne','13N','60W',13.9833,-60.9667,813,248,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(169,166,'unknown','Gros Piton','13N','61W',13.8,-61.0667,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(170,166,'unknown','Guesneau','13N','60W',13.9833,-60.95,574,175,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(171,166,'unknown','Hellene','13N','60W',13.7833,-60.9167,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(172,166,'unknown','Hewanorra International Airport','13N','60W',13.7167,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(173,166,'unknown','Hewanorra','13N','60W',13.7167,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(174,166,'unknown','Houelmon, Mount','13N','61W',13.8833,-61.0167,1607,490,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(175,166,'unknown','H\'Erelle','13N','60W',13.75,-60.9833,62,19,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(176,166,'unknown','Incommode','13N','60W',13.9833,-60.9833,65,20,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(177,166,'unknown','Jalousie','13N','61W',13.8167,-61.05,1049,320,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(178,166,'unknown','Jambe, Morne','14N','60W',14.0333,-60.9333,488,149,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(179,166,'unknown','Jambe, Mount','14N','60W',14.0333,-60.9333,488,149,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(180,166,'unknown','Jean Baptiste','13N','61W',13.9333,-61,475,145,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(181,166,'unknown','La Borne','14N','60W',14.0333,-60.9167,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(182,166,'unknown','La Cour Ville','13N','60W',13.8,-60.9167,160,49,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(183,166,'unknown','La Croix Maingot','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(184,166,'unknown','La Fague','13N','61W',13.7667,-61.0333,187,57,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(185,166,'unknown','La Fargue','13N','61W',13.7667,-61.0333,187,57,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(186,166,'unknown','La Feuillet','14N','60W',14.05,-60.9333,495,151,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(187,166,'unknown','La Haut','13N','61W',13.7833,-61,570,174,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(188,166,'unknown','La Pearle','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(189,166,'unknown','La Pointe','13N','61W',13.7833,-61.05,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(190,166,'unknown','La Pointe','13N','60W',13.8333,-60.9,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(191,166,'unknown','La Pointe','13N','61W',13.9833,-61.0333,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(192,166,'unknown','La Point','13N','61W',13.9833,-61.0333,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(193,166,'unknown','La Raye','13N','61W',13.9333,-61.0333,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(194,166,'unknown','La Resource','13N','60W',13.7333,-60.95,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(195,166,'unknown','La Ressource','13N','60W',13.9333,-60.9167,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(196,166,'unknown','La Retraite','13N','60W',13.75,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(197,166,'unknown','La Sorci','13N','60W',13.9667,-60.9,390,119,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(198,166,'unknown','La Tourney','13N','60W',13.7333,-60.95,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(199,166,'unknown','La Verdure','13N','61W',13.9,-61.05,551,168,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(200,166,'unknown','Laborie','13N','60W',13.75,-60.9833,62,19,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(201,166,'unknown','Lacombe, Morne','13N','60W',13.9,-60.95,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(202,166,'unknown','Lacombe, Mount','13N','60W',13.9,-60.95,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(203,166,'unknown','Lapins Island','14N','60W',14.0667,-60.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(204,166,'unknown','Lastic, Morne','13N','61W',13.85,-61.0667,167,51,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(205,166,'unknown','Lastic, Mount','13N','61W',13.85,-61.0667,167,51,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(206,166,'unknown','Layan, Mount','14N','60W',14.05,-60.9333,495,151,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(207,166,'unknown','Layau, Mount','14N','60W',14.05,-60.9333,495,151,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(208,166,'unknown','Limere','13N','60W',13.9333,-60.9,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(209,166,'unknown','Londonderry','13N','61W',13.7667,-61,610,186,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(210,166,'unknown','Lumi','13N','60W',13.9333,-60.9,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(211,166,'unknown','L\'Abbay','13N','60W',13.9333,-60.9667,518,158,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(212,166,'unknown','L\'Hermitage','14N','60W',14.0167,-60.9167,265,81,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(213,166,'unknown','L\'Ivrogne','13N','61W',13.8,-61.0667,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(214,166,'unknown','L\'Orangerie','13N','60W',13.8333,-60.9167,52,16,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(215,166,'unknown','Mahaut','13N','60W',13.8333,-60.95,436,133,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(216,166,'unknown','Mahaut','13N','61W',13.8833,-61.0667,830,253,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(217,166,'unknown','Malgretoute','13N','61W',13.8333,-61.05,1351,412,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(218,166,'unknown','Malgr','13N','61W',13.8333,-61.05,1351,412,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(219,166,'unknown','Malmaison','13N','61W',13.8667,-61.05,616,188,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(220,166,'unknown','Mamin','13N','61W',13.8667,-61.0667,629,192,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(221,166,'unknown','Marc Marc','13N','60W',13.95,-60.9667,528,161,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(222,166,'unknown','Marchand','14N','60W',14,-60.9833,524,160,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(223,166,'unknown','Maria Islands','13N','60W',13.7167,-60.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(224,166,'unknown','Maria Island','13N','60W',13.7167,-60.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(225,166,'unknown','Maria, Islet','13N','60W',13.7167,-60.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(226,166,'unknown','Marie Island','13N','60W',13.7167,-60.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(227,166,'unknown','Marigot Bay','13N','61W',13.95,-61.0167,108,33,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(228,166,'unknown','Marigot','13N','61W',13.9667,-61,761,232,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(229,166,'unknown','Marisule Estate','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(230,166,'unknown','Marquis, Morne','13N','61W',13.9,-61.0333,1666,508,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(231,166,'unknown','Marquis, Mount','13N','61W',13.9,-61.0333,1666,508,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(232,166,'unknown','Marquis','14N','60W',14.0167,-60.9,124,38,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(233,166,'unknown','Massacre','13N','61W',13.9333,-61.0333,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(234,166,'unknown','Micoud','13N','60W',13.8167,-60.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(235,166,'unknown','Migny','13N','61W',13.8333,-61.0167,1492,455,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(236,166,'unknown','Millet','13N','60W',13.9,-60.9833,971,296,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(237,166,'unknown','Mon Repos','13N','60W',13.85,-60.8833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(238,166,'unknown','Monchy','14N','60W',14.05,-60.9167,311,95,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(239,166,'unknown','Mondesir','13N','61W',13.8,-61.0167,695,212,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(240,166,'unknown','Mongiraud','14N','60W',14.05,-60.95,485,148,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(241,166,'unknown','Mongouge','13N','61W',13.8,-61.0333,600,183,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(242,166,'unknown','Monier, Morne','14N','60W',14.0167,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(243,166,'unknown','Monier, Mount','14N','60W',14.0167,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(244,166,'unknown','Monier','14N','60W',14.0167,-60.9333,328,100,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(245,166,'unknown','Morlon, Mount','13N','61W',13.8833,-61.0333,1236,377,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(246,166,'unknown','Morne Caillandre','13N','60W',13.7667,-60.95,216,66,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(247,166,'unknown','Morne Doudon','14N','60W',14,-60.9667,442,135,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(248,166,'unknown','Morne Fortune','13N','60W',13.9833,-60.9833,65,20,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(249,166,'unknown','Morne Panache','13N','60W',13.9167,-60.9167,78,24,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(250,166,'unknown','Morne Paul','13N','61W',13.75,-61,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(251,166,'unknown','Morne Serpent','14N','60W',14.0167,-60.95,688,210,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(252,166,'unknown','Morne Sion','13N','61W',13.7833,-61.05,193,59,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(253,166,'unknown','Morne d\' Or','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(254,166,'unknown','Morton, Mount','13N','61W',13.8833,-61.0333,1236,377,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(255,166,'unknown','Mot','13N','61W',13.8,-61.0167,695,212,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(256,166,'unknown','Moule','13N','60W',13.7,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(257,166,'unknown','Old Settlement','13N','60W',13.8833,-60.9,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(258,166,'unknown','Palmiste','13N','61W',13.8667,-61.05,616,188,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(259,166,'unknown','Parasol, Morne','13N','61W',13.9,-61.0333,1666,508,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(260,166,'unknown','Parasol, Mount','13N','61W',13.9,-61.0333,1666,508,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(261,166,'unknown','Patience','13N','60W',13.85,-60.9,262,80,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(262,166,'unknown','Perle','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(263,166,'unknown','Perou','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(264,166,'unknown','Petit Piton','13N','61W',13.8333,-61.0667,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(265,166,'unknown','Piaye','13N','61W',13.75,-61.0167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(266,166,'unknown','Pigeon Island','14N','60W',14.0833,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(267,166,'unknown','Pimard, Mount','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(268,166,'unknown','Planard','13N','60W',13.8,-60.9,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(269,166,'unknown','Point Sable','13N','60W',13.75,-60.95,62,19,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(270,166,'unknown','Pointe Sable','13N','60W',13.75,-60.95,62,19,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(271,166,'unknown','Pomme','13N','60W',13.75,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(272,166,'unknown','Pond Saint Jacques','13N','61W',13.8333,-61.0167,1492,455,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(273,166,'unknown','Port Castries','14N','61W',14,-61,672,205,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(274,166,'unknown','Praslin Island','13N','60W',13.8667,-60.8833,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(275,166,'unknown','Praslin','13N','60W',13.8667,-60.9,206,63,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(276,166,'unknown','Punchbowl','13N','61W',13.8333,-61.05,1351,412,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(277,166,'unknown','Ramier, L\'Islet','13N','60W',13.95,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(278,166,'unknown','Ramiers, Ile des','14N','60W',14.0833,-60.9667,29,9,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(279,166,'unknown','Rat Island','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(280,166,'unknown','Rat Islet','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(281,166,'unknown','Reddie, Morne','14N','60W',14.0333,-60.9167,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(282,166,'unknown','Reddie, Mount','14N','60W',14.0333,-60.9167,226,69,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(283,166,'unknown','Reduit','14N','60W',14.0667,-60.95,298,91,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(284,166,'unknown','Regnier, Morne','13N','61W',13.9,-61.05,551,168,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(285,166,'unknown','Regnier, Mount','13N','61W',13.9,-61.05,551,168,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(286,166,'unknown','Resinard','13N','60W',13.9833,-60.9333,1033,315,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(287,166,'unknown','Ressource','13N','60W',13.7333,-60.95,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(288,166,'unknown','Riche Fond','13N','60W',13.9333,-60.9167,219,67,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(289,166,'unknown','River Dor','13N','61W',13.75,-61.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(290,166,'unknown','Riviere Doree','13N','61W',13.75,-61.0333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(291,166,'unknown','Roblot','13N','61W',13.8,-61.0167,695,212,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(292,166,'unknown','Rouarn','13N','60W',13.7667,-60.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(293,166,'unknown','Rouche Island','13N','60W',13.95,-60.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(294,166,'unknown','Ruby','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(295,166,'unknown','Saint Esprit, Piton','13N','60W',13.8333,-60.9833,1092,333,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(296,166,'unknown','Saint Lucia Colony','13N','60W',13.8833,-60.9667,984,300,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(297,166,'unknown','Saint Lucia Island','13N','60W',13.9167,-60.9833,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(298,166,'unknown','Saint Lucia, Colony of','13N','60W',13.8833,-60.9667,984,300,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(299,166,'unknown','Saint Lucia, State of','13N','60W',13.8833,-60.9667,984,300,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(300,166,'unknown','Saint Lucia','13N','60W',13.8833,-60.9667,984,300,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(301,166,'unknown','Saint Lucia','13N','60W',13.9167,-60.9833,751,229,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(302,166,'unknown','Saint Phillip','13N','61W',13.8333,-61.0167,1492,455,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(303,166,'unknown','Saint Urbain','13N','60W',13.75,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(304,166,'unknown','Saint Urban','13N','60W',13.75,-60.9333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(305,166,'unknown','Saltibus','13N','61W',13.8,-61,790,241,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(306,166,'unknown','Sans Soucis','13N','61W',13.9667,-61,761,232,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(307,166,'unknown','Sans Souci','13N','61W',13.9667,-61,761,232,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(308,166,'unknown','Sapphire','13N','61W',13.75,-61,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(309,166,'unknown','Sarot','13N','60W',13.9333,-60.9833,265,81,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(310,166,'unknown','Savannes Estate','13N','60W',13.7667,-60.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(311,166,'unknown','Savannes','13N','60W',13.7667,-60.9167,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(312,166,'unknown','Savannes','13N','60W',13.7667,-60.9333,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(313,166,'unknown','Scorpion Island','13N','60W',13.75,-60.9167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(314,166,'unknown','Siquot, Mount','13N','61W',13.8833,-61.05,1259,384,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(315,166,'unknown','Siquots, Mount','13N','61W',13.8833,-61.05,1259,384,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(316,166,'unknown','Soucis','13N','61W',13.9667,-61,761,232,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(317,166,'unknown','Soufri','13N','61W',13.85,-61.05,1013,309,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(318,166,'unknown','Tabac, Morne','13N','61W',13.8667,-61.0333,1640,500,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(319,166,'unknown','Tabac, Mount','13N','61W',13.8667,-61.0333,1640,500,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(320,166,'unknown','Terr Fall','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(321,166,'unknown','Terrafallee, Mount','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(322,166,'unknown','Terrefallee, Mount','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(323,166,'unknown','Terrefallee','13N','61W',13.95,-61,95,29,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(324,166,'unknown','Theodorine','13N','61W',13.9167,-61.0333,485,148,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(325,166,'unknown','Thoumass','13N','60W',13.8167,-60.9167,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(326,166,'unknown','Tourney, Morne','13N','60W',13.7333,-60.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(327,166,'unknown','Tourney, Mount','13N','60W',13.7333,-60.9667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(328,166,'unknown','Tourney','13N','60W',13.7333,-60.95,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(329,166,'unknown','Trois Piton','14N','60W',14,-60.9667,442,135,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(330,166,'unknown','Troumasse','13N','60W',13.8167,-60.9167,118,36,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(331,166,'unknown','Two Friends','13N','61W',13.9,-61.0667,492,150,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(332,166,'unknown','Union Vale','13N','61W',13.8,-61.05,613,187,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(333,166,'unknown','Union','14N','60W',14.0333,-60.9667,374,114,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(334,166,'unknown','Vanard','13N','60W',13.9333,-60.9833,265,81,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(335,166,'unknown','Victorin, Morne','13N','60W',13.7667,-60.95,216,66,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(336,166,'unknown','Victorin, Mount','13N','60W',13.7667,-60.95,216,66,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(337,166,'unknown','Vieux Fort','13N','60W',13.7167,-60.95,600,183,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(338,166,'unknown','Vieux Sucreic','14N','60W',14.0333,-60.9333,488,149,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(339,166,'unknown','Vige','13N','60W',13.7833,-60.9167,82,25,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(340,166,'unknown','Vigie Airport','14N','60W',14.0167,-60.9833,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(341,166,'unknown','Vigie','14N','60W',14.0167,-60.9833,275,84,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(342,166,'unknown','Vigie','14N','61W',14.0333,-61.0167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(343,166,'unknown','Yvrogne','13N','61W',13.8,-61.0667,383,117,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `saintlucia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:25:50