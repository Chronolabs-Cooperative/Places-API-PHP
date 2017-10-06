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
-- Table structure for table `bahamasthe`
--

DROP TABLE IF EXISTS `bahamasthe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bahamasthe` (
  `CordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `Typal` enum('city','suburb','town','village','camp','military','mountain','unknown') NOT NULL DEFAULT 'unknown',
  `RegionName` char(34) DEFAULT NULL,
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
  PRIMARY KEY (`CordID`),
  KEY `SEARCH` (`CountryID`,`RegionName`(22),`mapref_latitude`(3),`mapref_longitude`(3),`Latitude_Float`,`Longitude_Float`),
  KEY `NUMBERS` (`Latitude_Float`,`Longitude_Float`,`Altitude_Feet`,`Altitude_Meters`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bahamasthe`
--

LOCK TABLES `bahamasthe` WRITE;
/*!40000 ALTER TABLE `bahamasthe` DISABLE KEYS */;
INSERT INTO `bahamasthe` VALUES (1,14,'unknown','Abaco Island','26N','77W',26.4667,-77.0833,55,17,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(2,14,'unknown','Abaco and Cays','26N','77W',26.4667,-77.0833,55,17,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(3,14,'unknown','Abaco, Grande Ile','26N','77W',26.4667,-77.0833,55,17,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(4,14,'unknown','Abaco, Petite Ile','26N','77W',26.8833,-77.7167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(5,14,'unknown','Abaco','26N','77W',26.4667,-77.0833,55,17,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(6,14,'unknown','Abercorn','22N','73W',22.3667,-73.95,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(7,14,'unknown','Abner Cay','25N','77W',25.6833,-77.7833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(8,14,'unknown','Abraham Bay','22N','72W',22.3667,-72.9667,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(9,14,'unknown','Abraham\'s Bay','22N','72W',22.3667,-72.9667,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(10,14,'unknown','Acklin Island','22N','73W',22.4333,-73.9667,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(11,14,'unknown','Acklins Island','22N','73W',22.4333,-73.9667,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(12,14,'unknown','Acklins','22N','73W',22.4333,-73.9667,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(13,14,'unknown','Acklins','22N','73W',22.65,-73.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(14,14,'unknown','Acklin','22N','73W',22.4333,-73.9667,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(15,14,'unknown','Adderley Cay','23N','76W',23.7833,-76.1167,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(16,14,'unknown','Adderley Cay','23N','76W',23.8167,-76.1667,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(17,14,'unknown','Adderleys','23N','75W',23.6,-75.3,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(18,14,'unknown','Adderly','23N','75W',23.6,-75.3,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(19,14,'unknown','Adelaide','25N','77W',25,-77.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(20,14,'unknown','Aklin Island','22N','73W',22.4333,-73.9667,22,7,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(21,14,'unknown','Albert Town','22N','74W',22.6,-74.35,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(22,14,'unknown','Alder Cay','25N','77W',25.5333,-77.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(23,14,'unknown','Alder\'s Cay','25N','77W',25.5333,-77.7,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(24,14,'unknown','Alexander','23N','76W',23.65,-76.0167,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(25,14,'unknown','Alice Town','25N','76W',25.3333,-76.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(26,14,'unknown','Alice Town','25N','79W',25.7167,-79.3,3,1,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(27,14,'unknown','Allan Cays','24N','76W',24.75,-76.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(28,14,'unknown','Allan\'s Cays','24N','76W',24.75,-76.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(29,14,'unknown','Allans Cay','26N','77W',26.9833,-77.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(30,14,'unknown','Allen Cays','24N','76W',24.75,-76.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(31,14,'unknown','Allen Cay','23N','76W',23.7167,-76.1667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(32,14,'unknown','Allen','23N','74W',23.95,-74.5167,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(33,14,'unknown','Alligator Bay Settlement','23N','75W',23.45,-75.2167,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(34,14,'unknown','Allon Cay','26N','77W',26.9833,-77.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(35,14,'unknown','Allons Cay','26N','77W',26.9833,-77.6667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(36,14,'unknown','Alver Town','22N','74W',22.6,-74.35,19,6,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(37,14,'unknown','Ambergris Cays','25N','77W',25.6667,-77.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(38,14,'unknown','Ambergris Cay','25N','77W',25.6667,-77.8333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(39,14,'unknown','Ambergris Cay','26N','77W',26.8667,-77.4333,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(40,14,'unknown','Anderson Cay','25N','77W',25.7167,-77.85,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(41,14,'unknown','Andersons','23N','75W',23.2167,-75.0833,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(42,14,'unknown','Anderson','22N','73W',22.6167,-73.8667,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(43,14,'unknown','Anderson','23N','75W',23.5333,-75.2333,26,8,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(44,14,'unknown','Andros Central','24N','77W',24.7167,-77.9833,6,2,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(45,14,'unknown','Andros Islands','24N','77W',24.4333,-77.95,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(46,14,'unknown','Andros Island','24N','77W',24.4333,-77.95,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(47,14,'unknown','Andros Town','24N','77W',24.7,-77.7667,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(48,14,'unknown','Andros Town','24N','77W',24.7,-77.7833,9,3,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(49,14,'unknown','Andros, Ile','24N','77W',24.4333,-77.95,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(50,14,'unknown','Andros','24N','77W',24.4333,-77.95,16,5,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(51,14,'unknown','Angel Cays','26N','77W',26.45,-77.05,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(52,14,'unknown','Angle Fish Island','26N','77W',26.9333,-77.6,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(53,14,'unknown','Anguila Islands','23N','79W',23.5167,-79.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(54,14,'unknown','Anguilla Cays','23N','79W',23.5167,-79.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL),(55,14,'unknown','Anguilla Island','23N','79W',23.5167,-79.55,0,0,'','',0,0,0,0,0,'0',0,0,0,0,NULL);
/*!40000 ALTER TABLE `bahamasthe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-13 17:23:37
