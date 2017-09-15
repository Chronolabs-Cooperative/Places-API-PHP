<?php
/**
 * Chronolabs REST Geospatial Places Services API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://snails.email
 * @license         GNU GPL 3 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         api
 * @since           2.0.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @subpackage		places
 * @description		Geospatial Places Services API
 * @see			    http://internetfounder.wordpress.com
 * @see			    http://sourceoforge.net/projects/chronolabsapis
 * @see			    https://github.com/Chronolabs-Cooperative/Places-API-PHP
 */

/**
 * Include libraries
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';

if (!$timeout = PlacesCache::read(basename(__DIR__) . '--verify-timeout'))
{
    
    $query = $timeout = array();
    $timeout['start'] = microtime(true);
    PlacesCache::write(basename(__DIR__) . '--verify-timeout', $timeout, API_CACHE_SECONDS * API_CACHE_SECONDS);
    
    $query[] = "START TRANSACTION";
    $sql = "SHOW TABLES FROM `" . DB_DEBAUCH_NAME . "` ";
    $results = $GLOBALS['DebauchDB']->query($sql);
    $tables = array();
    while(list($table) = $GLOBALS['DebauchDB']->fetchRow($results))
        if (!empty($table))
            $tables[$table] = $table;
    
    $fields = array();
    foreach($tables as $table)
    {
        $sql = "SHOW FIELDS FROM `" . DB_DEBAUCH_NAME . "`.`$table` ";
        $results = $GLOBALS['DebauchDB']->query($sql);
        $fields[$table] = array();
        while($row = $GLOBALS['DebauchDB']->fetchArray($results))
            if (!empty($row))
                $fields[$table][$row['Field']] = $row;
    }
    
    $sql = "SELECT * FROM `countries` WHERE `Table` NOT IN ('" . implode("', '", $tables) . "')";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        $table = $country['Table'];
        if (!isset($tables["$table"]))
        {
            $query[] = "CREATE TABLE `$table` (
                `CordID` int(11) UNSIGNED NOT NULL,
                `CountryID` int(11) DEFAULT NULL,
                `RegionName` char(44) DEFAULT NULL,
                `mapref_latitude` char(4) DEFAULT NULL,
                `mapref_longitude` char(4) DEFAULT NULL,
                `Latitude_Float` float DEFAULT NULL,
                `Longitude_Float` float DEFAULT NULL,
                `Altitude_Feet` int(11) DEFAULT NULL,
                `Altitude_Meters` int(11) DEFAULT NULL,
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
            if (!$GLOBALS['DebauchDB']->query($sql))
                die("SQL Failed: $sql;");
        }
    }
    
    $sql = "SELECT * FROM `countries` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        $table = $country['Table'];
        if (!isset($tables[$table . "_states"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_states` (
                `StateID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `CountryID` int(11) DEFAULT 0,
                `State` char(64) DEFAULT '',
                `max_latitude` float(21,11) DEFAULT 0,
                `max_longitude` float(21,11) DEFAULT 0,
                `min_latitude` float(21,11) DEFAULT 0,
                `min_longitude` float(21,11) DEFAULT 0,
                `max_altitude_feet` int(11) DEFAULT 0,
                `max_altitude_meters` int(11) DEFAULT 0,
                `min_altitude_feet` int(11) DEFAULT 0,
                `min_altitude_meters` int(11) DEFAULT 0,
                `max_population` mediumint(21) DEFAULT 0,
                `min_population` mediumint(21) DEFAULT 0,
                `sum_population` mediumint(21) DEFAULT 0,
                `records` int(11) DEFAULT 0,
                `venues` int(11) DEFAULT 0,
                `details` int(11) DEFAULT 0,
                `hits` int(11) DEFAULT 0,
                `updates` int(11) DEFAULT 0,
                `citys` int(11) DEFAULT 0,
                `suburbs` int(11) DEFAULT 0,
                `towns` int(11) DEFAULT 0,
                `villages` int(11) DEFAULT 0,
                `camps` int(11) DEFAULT 0,
                `militarys` int(11) DEFAULT 0,
                `unknowns` int(11) DEFAULT 0,
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_details"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_details` (
                `DetailID` mediumint(22) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `CordID` int(11) DEFAULT 0,
                `StateID` int(11) DEFAULT 0,
                `CountryID` int(11) DEFAULT 0,
                `Key` char(64) DEFAULT '',
                `data` LONGTEXT,
                `retrieve` int(11) DEFAULT 0,
                `updating` int(11) DEFAULT 0,
                PRIMARY KEY (`DetailID`),
                KEY `SEARCH` (`DetailID`,`CountryID`,`CordID`,`Key`,`retrieve`,`updating`) USING BTREE KEY_BLOCK_SIZE=16
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        $table = $country['Table'];
        if (!isset($tables[$table . "_address"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_address` (
                `AddressID` mediumint(22) UNSIGNED NOT NULL AUTO_INCREMENT,
                `CordID` int(11) DEFAULT 0,
                `CountryID` int(11) DEFAULT 0,
                `Types` varchar(255) NOT NULL DEFAULT '',
                `Unit` varchar(10) NOT NULL DEFAULT '',
                `Building` varchar(10) NOT NULL DEFAULT '',
                `Street` varchar(64) NOT NULL DEFAULT '',
                `Suburb` varchar(64) NOT NULL DEFAULT '',
                `State` varchar(64) NOT NULL DEFAULT '',
                `Country` varchar(64) NOT NULL DEFAULT '',
                `Country_ISO2` varchar(2) NOT NULL DEFAULT '',
                `Postcode` varchar(20) NOT NULL DEFAULT '',
                `Council` varchar(255) NOT NULL DEFAULT '',
                `GoogleID` varchar(255) NOT NULL DEFAULT '',
                `Longitude` float(29,11) NOT NULL DEFAULT 0,
                `Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `Formatted` varchar(255) NOT NULL DEFAULT '',
                `Created` int(11) DEFAULT 0,
                PRIMARY KEY (`AddressID`),
                KEY `SEARCH` (`AddressID`,`CordID`,`CountryID`,`Types`,`Unit`,`Suburb`,`Building`,`State`,`Postcode`,`Street`,`Longitude`,`Latitude`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (isset($tables[$table . "_address"]) && !in_array("Postcode", array_keys($fields[$table . "_address"])))
        {
            $query[] = "DROP TABLE `" . $country['Table'] . "_address`";
            $query[] = "CREATE TABLE `" . $country['Table'] . "_address` (
                `AddressID` mediumint(22) UNSIGNED NOT NULL AUTO_INCREMENT,
                `CordID` int(11) DEFAULT 0,
                `CountryID` int(11) DEFAULT 0,
                `Types` varchar(255) NOT NULL DEFAULT '',
                `Unit` varchar(10) NOT NULL DEFAULT '',
                `Building` varchar(10) NOT NULL DEFAULT '',
                `Street` varchar(64) NOT NULL DEFAULT '',
                `Suburb` varchar(64) NOT NULL DEFAULT '',
                `State` varchar(64) NOT NULL DEFAULT '',
                `Country` varchar(64) NOT NULL DEFAULT '',
                `Country_ISO2` varchar(2) NOT NULL DEFAULT '',
                `Postcode` varchar(20) NOT NULL DEFAULT '',
                `Council` varchar(255) NOT NULL DEFAULT '',
                `GoogleID` varchar(255) NOT NULL DEFAULT '',
                `Longitude` float(29,11) NOT NULL DEFAULT 0,
                `Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `Formatted` varchar(255) NOT NULL DEFAULT '',
                `Created` int(11) DEFAULT 0,
                PRIMARY KEY (`AddressID`),
                KEY `SEARCH` (`AddressID`,`CordID`,`CountryID`,`Types`,`Unit`,`Suburb`,`Building`,`State`,`Postcode`,`Street`,`Longitude`,`Latitude`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (isset($tables[$table . "_address"]) && !in_array("Suburb", array_keys($fields[$table . "_address"])))
        {
            $query[] = "DROP TABLE `" . $country['Table'] . "_address`";
            $query[] = "CREATE TABLE `" . $country['Table'] . "_address` (
                `AddressID` mediumint(22) UNSIGNED NOT NULL AUTO_INCREMENT,
                `CordID` int(11) DEFAULT 0,
                `CountryID` int(11) DEFAULT 0,
                `Types` varchar(255) NOT NULL DEFAULT '',
                `Unit` varchar(10) NOT NULL DEFAULT '',
                `Building` varchar(10) NOT NULL DEFAULT '',
                `Street` varchar(64) NOT NULL DEFAULT '',
                `Suburb` varchar(64) NOT NULL DEFAULT '',
                `State` varchar(64) NOT NULL DEFAULT '',
                `Country` varchar(64) NOT NULL DEFAULT '',
                `Country_ISO2` varchar(2) NOT NULL DEFAULT '',
                `Postcode` varchar(20) NOT NULL DEFAULT '',
                `Council` varchar(255) NOT NULL DEFAULT '',
                `GoogleID` varchar(255) NOT NULL DEFAULT '',
                `Longitude` float(29,11) NOT NULL DEFAULT 0,
                `Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `Formatted` varchar(255) NOT NULL DEFAULT '',
                `Created` int(11) DEFAULT 0,
                PRIMARY KEY (`AddressID`),
                KEY `SEARCH` (`AddressID`,`CordID`,`CountryID`,`Types`,`Unit`,`Suburb`,`Building`,`State`,`Postcode`,`Street`,`Longitude`,`Latitude`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_address_types"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_address_types` (
                `TypeID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `Type` char(64) DEFAULT '',
                `Records` int(11) DEFAULT 0,
                PRIMARY KEY (`TypeID`),
                KEY `SEARCH` (`TypeID`,`Type`,`Records`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_address_types_links"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_address_types_links` (
                `TypeID` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `AddressID` mediumint(22) UNSIGNED NOT NULL DEFAULT 0,
                KEY `SEARCH` (`TypeID`,`AddressID`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_venues"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_venues` (
                `VenueID` mediumint(22) UNSIGNED NOT NULL AUTO_INCREMENT,
                `CordID` int(11) DEFAULT 0,
                `CountryID` int(11) DEFAULT 0,
                `Types` varchar(255) NOT NULL DEFAULT '',
                `Name` varchar(255) NOT NULL DEFAULT '',
                `Icon` varchar(255) NOT NULL DEFAULT '',
                `Id` varchar(64) NOT NULL DEFAULT '',
                `Reference` varchar(255) NOT NULL DEFAULT '',
                `GoogleID` varchar(255) NOT NULL DEFAULT '',
                `Longitude` float(29,11) NOT NULL DEFAULT 0,
                `Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_NE_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Longitude` float(29,11) NOT NULL DEFAULT 0,
                `View_SW_Latitude` float(29,11) NOT NULL DEFAULT 0,
                `Vicinity` varchar(255) NOT NULL DEFAULT '',
                `Photos` int(11) DEFAULT 0,
                `Created` int(11) DEFAULT 0,
                PRIMARY KEY (`VenueID`),
                KEY `SEARCH` (`VenueID`,`CordID`,`CountryID`,`Types`,`Name`,`Longitude`,`Latitude`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_venues_photos"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_venues_photos` (
                `PhotoID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `VenueID` mediumint(22) UNSIGNED NOT NULL DEFAULT 0,
                `Height` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `Width` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `Reference` varchar(255) NOT NULL DEFAULT '',
                `HTML` tinytext,
                PRIMARY KEY (`PhotoID`),
                KEY `SEARCH` (`PhotoID`,`VenueID`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_venues_types"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_venues_types` (
                `TypeID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `Type` char(64) DEFAULT '',
                `Records` int(11) DEFAULT 0,
                PRIMARY KEY (`TypeID`),
                KEY `SEARCH` (`TypeID`,`Type`,`Records`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$table . "_venues_types_links"]))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "_venues_types_links` (
                `TypeID` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `VenueID` mediumint(22) UNSIGNED NOT NULL DEFAULT 0,
                KEY `SEARCH` (`TypeID`,`VenueID`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (isset($tables[$table . "_venues_link"]))
        {
            $query[] = "DROP TABLE `" . $country['Table'] . "_venues_link`";
        }
        if (!empty($table) && isset($fields[$table]) && !empty($fields[$table]))
        {
            $query[] = "START TRANSACTION";
            if (in_array("typal", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` CHANGE COLUMN `typal` `Typal` ENUM('city', 'suburb', 'town', 'village', 'camp', 'military', 'mountain', 'unknown') NOT NULL DEFAULT 'unknown' AFTER `CountryID`";
            elseif (!in_array("Typal", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Typal` ENUM('city', 'suburb', 'town', 'village', 'camp', 'military', 'mountain', 'unknown') NOT NULL DEFAULT 'unknown' AFTER `CountryID`";
            if (!in_array("Postcode", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Postcode` VARCHAR(15) NOT NULL DEFAULT '' AFTER `Altitude_Meters`";
            if (!in_array("State", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `State` VARCHAR(64) NOT NULL DEFAULT '' AFTER `Postcode`";
            if (!in_array("Population", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Population` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `State`";
            if (!in_array("Venues", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
            if (!in_array("Details", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
            if (!in_array("Updates", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Details`";
            if (!in_array("Hits", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Hits` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
            if (!in_array("GoogleID", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `GoogleID` VARCHAR(196) NOT NULL DEFAULT '' AFTER `Hits`";
            if (!in_array("PagesNumber", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `PagesNumber` INT(12) NOT NULL DEFAULT 0 AFTER `GoogleID`";
            if (!in_array("Last", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Last` INT(12) NOT NULL DEFAULT 0 AFTER `PagesNumber`";
            if (!in_array("Next", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Next` INT(12) NOT NULL DEFAULT 0 AFTER `Last`";
            if (!in_array("Action", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `Action` INT(12) NOT NULL DEFAULT 0 AFTER `Next`";
            if (!in_array("data", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $table . "` ADD COLUMN `data` tinytext AFTER `Action`";
            $query[] = "COMMIT";
        }
    }
    
    if (!in_array("Records", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `Records` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
    if (!in_array("Updates", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Records`";
    if (!in_array("Venues", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
    if (!in_array("Details", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
    if (!in_array("Next", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `Next` INT(11) NOT NULL DEFAULT 0 AFTER `Details`";
    if (!in_array("max_longitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `max_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `Next`";
    if (!in_array("max_latitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `max_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_longitude`";
    if (!in_array("min_longitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `min_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_latitude`";
    if (!in_array("min_latitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `min_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `min_longitude`";
    if (!in_array("data", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`countries` ADD COLUMN `data` longtext AFTER `min_latitude`";
        
    if (!in_array("Population", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Population` INT(19) NOT NULL DEFAULT 0 AFTER `Continent`";
    if (!in_array("Records", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Records` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
    if (!in_array("Updates", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Records`";
    if (!in_array("Venues", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
    if (!in_array("Details", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
    if (!in_array("Next", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `Next` INT(11) NOT NULL DEFAULT 0 AFTER `Details`";
    if (!in_array("max_longitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `max_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `Next`";
    if (!in_array("max_latitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `max_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_longitude`";
    if (!in_array("min_longitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `min_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_latitude`";
    if (!in_array("min_latitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `min_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `min_longitude`";
    if (!in_array("data", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`continents` ADD COLUMN `data` longtext AFTER `min_latitude`";
    
    $query[] = "COMMIT";
    $query[] = "START TRANSACTION";
            
    $sql = "SELECT * FROM `countries` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $country['Table'] . '`';
            list($count) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->query($sql));
            $query[] = 'UPDATE `countries` SET `Records` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
       
    $sql = "SELECT * FROM `countries` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $country['Table'] . '_Venues`';
            list($count) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->query($sql));
            $query[] = 'UPDATE `countries` SET `Venues` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    $sql = "SELECT * FROM `countries` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $country['Table'] . '_details`';
            list($count) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->query($sql));
            $query[] = 'UPDATE `countries` SET `Details` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    
    $sql = "SELECT * FROM `countries` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT MAX(`Longitude_float`) as `max_longitude`, MAX(`Latitude_float`) as `max_latitude`, MIN(`Longitude_float`) as `min_longitude`, MIN(`Latitude_float`) as `min_latitude`  FROM `' . $country['Table'] . '` GROUP BY `CountryID`';
            list($max_longitude, $max_latitude, $min_longitude, $min_latitude) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->query($sql));
            $query[] = 'UPDATE `countries` SET `max_latitude` = ' . $max_latitude . ', `max_longitude` = ' . $max_longitude . ', `min_latitude` = ' . $min_latitude . ', `min_longitude` = ' . $min_longitude . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    
    $sql = 'SELECT DISTINCT `Continent`, sum(`Population`) as `Population`, sum(`Records`) as `Records`, sum(`Venues`) as `Venues`, sum(`Details`) as `Details`, sum(`Updates`) as `Updates`, max(`max_longitude`) as `max_longitude`, max(`max_latitude`) as `max_latitude`, min(`min_longitude`) as `min_longitude`, max(`min_latitude`) as `min_latitude` FROM `countries` WHERE LENGTH(`Continent`) > 0 GROUP BY `Continent`';
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($continent = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        $query[] = 'UPDATE `continents` SET `Population` = "'.$continent['Population'].'", `Records` = "'.$continent['Records'].'", `Venues` = "'.$continent['Venues'].'", `Details` = "'.$continent['Details'].'", `Updates` = "'.$continent['Updates'].'",  `max_longitude` = "'.$continent['max_longitude'].'",  `max_latitude` = "'.$continent['max_latitude'].'",  `min_longitude` = "'.$continent['min_longitude'].'",  `min_latitude` = "'.$continent['min_latitude'].'" WHERE `Continent` LIKE "' . $continent['Continent'] . '"';
    }

    
    $imports = array('countries_links');
    foreach ($imports as $table)
    if (!in_array($table,$tables)) {
        switch ($table)
        {
            case 'countries_links':
                $sql = "CREATE TABLE `" . $table . "` (
                `LinkID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `CountryID` int(11) DEFAULT NULL,
                `RegionName` char(44) DEFAULT NULL,
                `mapref_latitude` char(4) DEFAULT NULL,
                `mapref_longitude` char(4) DEFAULT NULL,
                `Latitude_Float` float DEFAULT NULL,
                `Longitude_Float` float DEFAULT NULL,
                `Altitude_Feet` int(11) DEFAULT NULL,
                `Altitude_Meters` int(11) DEFAULT NULL,
                PRIMARY KEY (`LinkID`),
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
           // if (!$GLOBALS['DebauchDB']->query($sql))
            //    die("SQL Failed: $sql;");
        }
    }
    
    
    $query[] = "COMMIT";
    foreach($query as $question)
        if ($GLOBALS['DebauchDB']->query($question))
        {
            if (!isset($_SERVER['HTTP_HOST']))
                echo "\nSQL SUCCESS: $question;";
        } else {
            if (!isset($_SERVER['HTTP_HOST']))
                echo "\nSQL FAILED: $question;";
        }
        
    $timeout['end'] = microtime(true);
    PlacesCache::write(basename(__DIR__) . '--verify-timeout', $timeout, API_CACHE_SECONDS * API_CACHE_SECONDS);
    
}
?>