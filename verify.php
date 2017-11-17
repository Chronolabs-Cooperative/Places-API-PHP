<?php
/**
 * Chronolabs REST Geospatial API Services API
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
 * @description		Geospatial API Services API
 * @see			    http://internetfounder.wordpress.com
 * @see			    http://sourceoforge.net/projects/chronolabsapis
 * @see			    https://github.com/Chronolabs-Cooperative/API-API-PHP
 */

/**
 * Include libraries
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';

if (!$timeout = APICache::read(basename(__DIR__) . '--verify-timeout'))
{
    
    $query = $timeout = array();
    $timeout['start'] = microtime(true);
    APICache::write(basename(__DIR__) . '--verify-timeout', $timeout, API_CACHE_SECONDS * API_CACHE_SECONDS);
    
    $query[] = "START TRANSACTION";
    $sql = "SHOW TABLES FROM `" . DB_DEBAUCH_NAME . "` ";
    $results = $GLOBALS['APIDB']->query($sql);
    $tables = array();
    while(list($table) = $GLOBALS['APIDB']->fetchRow($results))
        if (!empty($table))
            $tables[$table] = $table;
    
    $fields = array();
    foreach($tables as $table)
    {
        $sql = "SHOW FIELDS FROM `" . DB_DEBAUCH_NAME . "`.`$table` ";
        $results = $GLOBALS['APIDB']->query($sql);
        $fields[$table] = array();
        while($row = $GLOBALS['APIDB']->fetchArray($results))
            if (!empty($row))
                $fields[$table][$row['Field']] = $row;
    }
    
    $table = 'countries';
    if (!isset($tables[$GLOBALS['APIDB']->prefix($table)]))
    {
        $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (
                `id` mediumint(250) UNSIGNED NOT NULL,
                `retired` char(44) NOT NULL DEFAULT NULL,
                `current` char(44) NOT NULL DEFAULT NULL,
                `created` int(11) DEFAULT NULL,
                KEY `SEARCH` (`retired`,`current`,`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        if (!$GLOBALS['APIDB']->query($sql))
            die("SQL Failed: $sql;");
    }
    
    $sql = "SELECT count(*) as `count` FROM `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "`";
    list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
    if ($count==0)
    {
        $GLOBALS['APIDB']->query("START TRANSACTION");
        $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (`retired`, `current`, `created`) VALUES SELECT md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `retired`, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `current`, UNIX_TIMESTAMP() FROM `" . $GLOBALS['APIDB']->prefix($table) . " ` ORDER BY `retired`";
        if (!$GLOBALS['APIDB']->query($sql))
            die("SQL Failed: $sql;");
        $GLOBALS['APIDB']->query("COMMIT");
    }
    
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `Table` NOT IN ('" . implode("', '", $tables) . "')";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        $table = $country['Table'];
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table)]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (
                `id` mediumint(250) UNSIGNED NOT NULL,
                `retired` char(44) NOT NULL DEFAULT NULL,
                `current` char(44) NOT NULL DEFAULT NULL,
                `created` int(11) DEFAULT NULL,
                KEY `SEARCH` (`retired`,`current`,`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
            if (!$GLOBALS['APIDB']->query($sql))
                die("SQL Failed: $sql;");
        }
        
        $GLOBALS['APIDB']->query("START TRANSACTION");
        $tb = $table;
        foreach(array("places", "addresses", "venues", "states") as $mode)
        {
            switch ($mode)
            {
                case 'places';
                    $add = '';
                    $retired = "md5(concat(`CountryID`, ':', md5(concat(`CountryID`, `CordID`)))";
                    $current = "md5(concat(`CountryID`, ':', md5(concat(`RegionName`, ', ', '" . $country['Country'] . "')))";
                    break;
                case 'addresses';
                    $add = '_'.$mode;
                    $retired = "concat(`CountryID`, ':', md5(concat('".$country['Table']."_address', `AddressID`, `CordID`, `CountryID`)))";
                    $current = "concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Unit`, `Building`, `Street`, `Suburb`, `State`, `Country_ISO2`, `Postcode`, `Council`)))";
                    break;
                case 'venues';
                    $add = '_'.$mode;
                    $retired = "concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat('".$table."_venues',`VenueID`CordID`,`CountryID`))";
                    $current = "concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`)))";
                    break;
                case 'states';
                    $add = '_'.$mode;
                    $retired = "md5(concat(`CountryID`, ':', md5(concat(`CountryID`, `StateID`)))";
                    $current = "md5(concat(`CountryID`, ':', md5(concat(`State`, '" . $country['Country'] . "')))";
                    break;
                
            }
                
            $sql = "SELECT count(*) as `count` FROM `" . $GLOBALS['APIDB']->prefix("$table$add") . "`";
            list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
            if ($count>0)
            {
                $sql = "SELECT $retired  as `key` FROM `" . $GLOBALS['APIDB']->prefix("$table$add") . "` ORDER BY `key`";
                $keys = array();
                while(list($key) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql)))
                {
                    $keys[$key] = $key;
                }
                $sql = "SELECT count(*) as `count` FROM `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` WHERE `retired` IN ('" . implode("','", $keys) . "')";
                list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
                if ($count<>count($keys))
                {
                    $sql = "SELECT `retired` FROM `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` WHERE `retired` IN ('" . implode("','", $keys) . "')";
                    while(list($key) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql)))
                        unset($keys[$key]);
    
                    $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (`retired`, `current`, `created`) VALUES SELECT $retired as `retired`, $current as `current`, UNIX_TIMESTAMP() FROM `" . $GLOBALS['APIDB']->prefix($table.$add) . " ` WHERE `retired` IN ('" . implode("','", $keys) . "') ORDER BY `retired`";
                    if (!$GLOBALS['APIDB']->query($sql))
                        die("SQL Failed: $sql;");
                }
            }
        }
        $GLOBALS['APIDB']->query("COMMIT");
        
        $table = $country['Table'];
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table)]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($table) . "` (
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
            if (!$GLOBALS['APIDB']->query($sql))
                die("SQL Failed: $sql;");
        }
    }
    
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        $table = $country['Table'];
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_states")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($table."_states") . "` (
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
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_details")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_details") . "` (
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
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_address")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address") . "` (
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
        if (isset($tables[$GLOBALS['APIDB']->prefix($table."_address")]) && !in_array("Postcode", array_keys($fields[$GLOBALS['APIDB']->prefix($table."_address")])))
        {
            $query[] = "DROP TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address") . "`";
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address") . "` (
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
        if (isset($tables[$GLOBALS['APIDB']->prefix($table."_address")]) && !in_array("Suburb", array_keys($fields[$GLOBALS['APIDB']->prefix($table."_address")])))
        {
            $query[] = "DROP TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address") . "`";
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address") . "` (
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
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_address_types")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address_types") . "` (
                `TypeID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `Type` char(64) DEFAULT '',
                `Records` int(11) DEFAULT 0,
                PRIMARY KEY (`TypeID`),
                KEY `SEARCH` (`TypeID`,`Type`,`Records`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_address_types_links")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_address_types_links") . "` (
                `TypeID` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `AddressID` mediumint(22) UNSIGNED NOT NULL DEFAULT 0,
                KEY `SEARCH` (`TypeID`,`AddressID`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_venues")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_venues") . "` (
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
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_venues_photos")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_venues_photos") . "` (
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
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_venues_types")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_venues_types") . "` (
                `TypeID` int(11) UNSIGNED NOT NULL  AUTO_INCREMENT,
                `Type` char(64) DEFAULT '',
                `Records` int(11) DEFAULT 0,
                PRIMARY KEY (`TypeID`),
                KEY `SEARCH` (`TypeID`,`Type`,`Records`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (!isset($tables[$GLOBALS['APIDB']->prefix($table."_venues_types_links")]))
        {
            $query[] = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($country['Table']. "_venues_types_links") . "` (
                `TypeID` int(11) UNSIGNED NOT NULL DEFAULT 0,
                `VenueID` mediumint(22) UNSIGNED NOT NULL DEFAULT 0,
                KEY `SEARCH` (`TypeID`,`VenueID`) USING BTREE KEY_BLOCK_SIZE=16
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        }
        if (isset($tables[$GLOBALS['APIDB']->prefix($table."_venues_link")]))
        {
            $query[] = "DROP TABLE `" . $GLOBALS['APIDB']->prefix($table."_venues_link") . "`";
        }
        if (!empty($table) && isset($fields[$table]) && !empty($fields[$table]))
        {
            $query[] = "START TRANSACTION";
            if (in_array("typal", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` CHANGE COLUMN `typal` `Typal` ENUM('city', 'suburb', 'town', 'village', 'camp', 'military', 'mountain', 'unknown') NOT NULL DEFAULT 'unknown' AFTER `CountryID`";
            elseif (!in_array("Typal", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Typal` ENUM('city', 'suburb', 'town', 'village', 'camp', 'military', 'mountain', 'unknown') NOT NULL DEFAULT 'unknown' AFTER `CountryID`";
            if (!in_array("Postcode", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Postcode` VARCHAR(15) NOT NULL DEFAULT '' AFTER `Altitude_Meters`";
            if (!in_array("State", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `State` VARCHAR(64) NOT NULL DEFAULT '' AFTER `Postcode`";
            if (!in_array("Population", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Population` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `State`";
            if (!in_array("Venues", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
            if (!in_array("Details", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
            if (!in_array("Updates", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Details`";
            if (!in_array("Hits", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Hits` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
            if (!in_array("GoogleID", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `GoogleID` VARCHAR(196) NOT NULL DEFAULT '' AFTER `Hits`";
            if (!in_array("PagesNumber", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `PagesNumber` INT(12) NOT NULL DEFAULT 0 AFTER `GoogleID`";
            if (!in_array("Last", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Last` INT(12) NOT NULL DEFAULT 0 AFTER `PagesNumber`";
            if (!in_array("Next", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Next` INT(12) NOT NULL DEFAULT 0 AFTER `Last`";
            if (!in_array("Action", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `Action` INT(12) NOT NULL DEFAULT 0 AFTER `Next`";
            if (!in_array("data", array_keys($fields[$table])))
                $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix($table) . "` ADD COLUMN `data` tinytext AFTER `Action`";
            $query[] = "COMMIT";
        }
    }
    
    if (!in_array("Records", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `Records` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
    if (!in_array("Updates", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Records`";
    if (!in_array("Venues", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
    if (!in_array("Details", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
    if (!in_array("Next", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `Next` INT(11) NOT NULL DEFAULT 0 AFTER `Details`";
    if (!in_array("max_longitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `max_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `Next`";
    if (!in_array("max_latitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `max_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_longitude`";
    if (!in_array("min_longitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `min_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_latitude`";
    if (!in_array("min_latitude", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `min_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `min_longitude`";
    if (!in_array("data", array_keys($fields['countries'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('countries') . "` ADD COLUMN `data` longtext AFTER `min_latitude`";
        
    if (!in_array("Population", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Population` INT(19) NOT NULL DEFAULT 0 AFTER `Continent`";
    if (!in_array("Records", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Records` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Population`";
    if (!in_array("Updates", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Updates` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Records`";
    if (!in_array("Venues", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Venues` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Updates`";
    if (!in_array("Details", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Details` MEDIUMINT(21) NOT NULL DEFAULT 0 AFTER `Venues`";
    if (!in_array("Next", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `Next` INT(11) NOT NULL DEFAULT 0 AFTER `Details`";
    if (!in_array("max_longitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `max_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `Next`";
    if (!in_array("max_latitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `max_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_longitude`";
    if (!in_array("min_longitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `min_longitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `max_latitude`";
    if (!in_array("min_latitude", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `min_latitude` FLOAT(21,9) NOT NULL DEFAULT 0 AFTER `min_longitude`";
    if (!in_array("data", array_keys($fields['continents'])))
        $query[] = "ALTER TABLE `" . DB_DEBAUCH_NAME . "`.`" . $GLOBALS['APIDB']->prefix('contients') . "` ADD COLUMN `data` longtext AFTER `min_latitude`";
    
    $query[] = "COMMIT";
    $query[] = "START TRANSACTION";
            
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $GLOBALS['APIDB']->prefix($country['Table']) . '`';
            list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
            $query[] = 'UPDATE `' . $GLOBALS['APIDB']->prefix('countries') . '` SET `Records` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
       
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $GLOBALS['APIDB']->prefix($country['Table']. '_venues') . '`';
            list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
            $query[] = 'UPDATE `' . $GLOBALS['APIDB']->prefix('countries') . '` SET `Venues` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $GLOBALS['APIDB']->prefix($country['Table']. '_details') . '`';
            list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
            $query[] = 'UPDATE `' . $GLOBALS['APIDB']->prefix('countries') . '` SET `Details` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    
    $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE LENGTH(`Table`) > 0 ORDER BY RAND()";
    $results = $GLOBALS['APIDB']->query($sql);
    while($country = $GLOBALS['APIDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $sql = 'SELECT MAX(`Longitude_float`) as `max_longitude`, MAX(`Latitude_float`) as `max_latitude`, MIN(`Longitude_float`) as `min_longitude`, MIN(`Latitude_float`) as `min_latitude`  FROM `' . $GLOBALS['APIDB']->prefix($country['Table']) . '` GROUP BY `CountryID`';
            list($max_longitude, $max_latitude, $min_longitude, $min_latitude) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query($sql));
            $query[] = 'UPDATE `' . $GLOBALS['APIDB']->prefix('countries') . '` SET `max_latitude` = ' . $max_latitude . ', `max_longitude` = ' . $max_longitude . ', `min_latitude` = ' . $min_latitude . ', `min_longitude` = ' . $min_longitude . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    
    $sql = 'SELECT DISTINCT `Continent`, sum(`Population`) as `Population`, sum(`Records`) as `Records`, sum(`Venues`) as `Venues`, sum(`Details`) as `Details`, sum(`Updates`) as `Updates`, max(`max_longitude`) as `max_longitude`, max(`max_latitude`) as `max_latitude`, min(`min_longitude`) as `min_longitude`, max(`min_latitude`) as `min_latitude` FROM `' . $GLOBALS['APIDB']->prefix('countries') . '` WHERE LENGTH(`Continent`) > 0 GROUP BY `Continent`';
    $results = $GLOBALS['APIDB']->query($sql);
    while($continent = $GLOBALS['APIDB']->fetchArray($results))
    {
        $query[] = 'UPDATE `' . $GLOBALS['APIDB']->prefix('contients') . '` SET `Population` = "'.$continent['Population'].'", `Records` = "'.$continent['Records'].'", `Venues` = "'.$continent['Venues'].'", `Details` = "'.$continent['Details'].'", `Updates` = "'.$continent['Updates'].'",  `max_longitude` = "'.$continent['max_longitude'].'",  `max_latitude` = "'.$continent['max_latitude'].'",  `min_longitude` = "'.$continent['min_longitude'].'",  `min_latitude` = "'.$continent['min_latitude'].'" WHERE `Continent` LIKE "' . $continent['Continent'] . '"';
    }

    
    $imports = array('countries_links');
    foreach ($imports as $table)
    if (!in_array($table,$tables)) {
        switch ($table)
        {
            case 'countries_links':
                $sql = "CREATE TABLE `" . $GLOBALS['APIDB']->prefix($table) . "` (
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
           // if (!$GLOBALS['APIDB']->query($sql))
            //    die("SQL Failed: $sql;");
        }
    }
    
    
    $query[] = "COMMIT";
    foreach($query as $question)
        if ($GLOBALS['APIDB']->query($question))
        {
            if (!isset($_SERVER['HTTP_HOST']))
                echo "\nSQL SUCCESS: $question;";
        } else {
            if (!isset($_SERVER['HTTP_HOST']))
                echo "\nSQL FAILED: $question;";
        }
        
    $timeout['end'] = microtime(true);
    APICache::write(basename(__DIR__) . '--verify-timeout', $timeout, API_CACHE_SECONDS * API_CACHE_SECONDS);
    
}
?>