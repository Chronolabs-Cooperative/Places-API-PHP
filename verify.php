<?php
/**
 * Chronolabs REST Geospatial Plaves Services API
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
 * @description		Geospatial Plaves Services API
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
    $query[] = "START TRANSACTION";
    $sql = "SHOW TABLES FROM `".DB_DEBAUCH_NAME."` ";
    $results = $GLOBALS['DebauchDB']->query($sql);
    $tables = array();
    while(list($table) = $GLOBALS['DebauchDB']->fetchRow($results))
        if (!empty($table))
            $tables[$table] = $table;
        
    $sql = "SELECT * FROM `countries` WHERE `Table` NOT IN ('" . implode("', '", $tables) . "')";
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($country = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        if (!empty($country['Table']))
        {
            $query[] = "CREATE TABLE `" . $country['Table'] . "` (
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
        if (!empty($country['Table']))
        {
            $sql = 'SELECT count(*) as `Records` FROM `' . $country['Table'] . '`';
            list($count) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->query($sql));
            $query[] = 'UPDATE `countries` SET `Records` = ' . $count . ' WHERE `CountryID` = ' . $country['CountryID'];
        }
    }
    
    $sql = 'SELECT DISTINCT `Continent`, sum(`Records`) as `Records` FROM `countries` WHERE LENGTH(`Continent`) > 0 GROUP BY `Continent`';
    $results = $GLOBALS['DebauchDB']->query($sql);
    while($continent = $GLOBALS['DebauchDB']->fetchArray($results))
    {
        $query[] = 'UPDATE `continents` SET `Records` = "'.$continent['Records'].'" WHERE `Continent` LIKE "' . $continent['Continent'] . '"';
    }

    
    $imports = array('countries_links');
    foreach ($imports as $table)
    if (!in_array($table,$tables)) {
        switch ($table)
        {
            case 'countries_links':
                $sql = "CREATE TABLE `" . $table . "` (
                `LinkID` int(11) UNSIGNED NOT NULL AUTO_NUMBER,
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
        $GLOBALS['DebauchDB']->query($question);
    
    $timeout['end'] = microtime(true);
    PlacesCache::write(basename(__DIR__) . '--verify-timeout', $timeout, API_CACHE_SECONDS * API_CACHE_SECONDS);
}
?>