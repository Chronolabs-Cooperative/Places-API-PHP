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


error_reporting(E_ERROR);
ini_set('display_errors', true);
ini_set('log_errors', true);
ini_set('error_log', __DIR__ . DIRECTORY_SEPARATOR . date('Y-m') .'--crons-error-log.txt');

global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apiconfig.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'verify.php';

$GLOBALS["DebauchDB"]->query("START TRANSACTION");

$sql = "SELECT * FROM `countries` LIMIT " . API_CRON_NUMBER_COUNTRIES . " ORDER BY RAND()";
$result = $GLOBALS["DebauchDB"]->query($sql);
while($country = $GLOBALS["DebauchDB"]->fetchArray($result))
{
    $sql = "SELECT count(*) as `count` FROM `" . $country['Table'] . "`";
    list($count) = $GLOBALS["DebauchDB"]->fetchRow($GLOBALS["DebauchDB"]->query($sql));
    if ($count == 0)
    {
        $locality = json_decode(getURIData("https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($country['Captial'].", ".$country['Country'])."&sensor=false"));
        $sql = "SELECT MAX(`CordID`) + 1 as CordID  FROM `" . $table . "` GROUP BY `CountryID`";
        list($cordid) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->queryF($sql));
        
        $region = array();
        foreach($locality['results'][0]['address_components'] as $values)
        {
            if (in_array('administrative_area_level_1', $values['types']) && in_array('political', $values['types']))
                $region['State'] = $values['long_name'];
            elseif (in_array('administrative_area_level_2', $values['types']) && in_array('political', $values['types']))
                $region['State'] = $values['short_name'];
            elseif (in_array('postal_code', $values['types']))
                $region['Postcode'] = $values['long_name'];
            elseif (in_array('locality', $values['types']))
                $region['RegionName'] = $values['long_name'];
        }
        $region['CordID'] = $cordid;
        $region['CountryID'] = $country['CountryID'];
        $region['GoogleID'] = $locality['place_id'];
        $region['Longitude_Float'] = $locality['geometry']['location']['lng'];
        $region['Latitude_Float'] = $locality['geometry']['location']['lat'];
        $region['mapref_longitude'] = floor(abs($locality['geometry']['location']['lng'])) . ($locality['geometry']['location']['lng'] > 0? "E":"W");
        $region['mapref_latitude'] = floor(abs($locality['geometry']['location']['lat'])) . ($locality['geometry']['location']['lat'] > 0? "N":"S");
        $region['Next'] = time();
        $region['Action'] = time();
        
        $insert = array();
        foreach(array_keys($region) as $field)
            if (!empty($region[$field]))
                if (!is_array($region[$field]))
                    $insert[$field] = mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $region[$field]);
                else
                    $insert[$field] = mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, json_encode($region[$field]));
        
        $sql = "INSERT INTO `$table` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
        if (!$GLOBALS['DebauchDB']->queryF($sql))
            die("SQL Failed: $sql;");
    } else {
        $table = $country['Table'];
        $sql = "SELECT * FROM `" . $country['Table'] . "` WHERE `Next` < UNIX_TIMESTAMP() LIMIT " . API_CRON_NUMBER_REGIONS . " ORDER BY RAND()";
        $regions = $GLOBALS["DebauchDB"]->query($sql);
        while($region = $GLOBALS["DebauchDB"]->fetchArray($regions))
        {
            $results = array();
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'google' . DIRECTORY_SEPARATOR . 'places.php';
            $places = new GooglePlaces(API_GOOGLE_KEY);
            $places->location = array($region['Latitude_Float'], $region['Longitude_Float']);
            $places->rankby   = 'distance';
            $places->radius   = mt_rand(69, 99) * 1000;
            $places->types    = 'locality'; // Requires keyword, name or types
            if (!$results[]   = $places->nearbySearch())
                $found = $results = false;
            else
                $found = true;
            if (count($results)>0)
            {
                while (!empty($results[count($results)-1]['next_page_token']) && count($results) <= API_GOOGLE_PAGES_RESULTS)
                {
                    $places->pagetoken = $results[count($results)-1]['next_page_token'];
                    $results[]         = $places->nearbySearch();
                }
                
                foreach($results as $page => $pageresults)
                    foreach ($pageresults['results'] as $id => $values)
                    {
                        if (in_array('locality', $values['types']) && !empty($table))
                        {
                            $sql = "SELECT count(*) FROM `" . $table . "` WHERE `RegionName` LIKE '".getLikedWildcard($values['name'])."'";
                            list($countb) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->queryF($sql));
                            $sql = "SELECT *, concat(`RegionName`, ', ', '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`CountryID`, `CordID`))) as `key`, concat(`RegionName`, ', ', '".$country['Country']."') as `Address`  FROM `" . $table . "` WHERE `RegionName` LIKE '".getLikedWildcard($values['name'])."'";
                            $resultr = $GLOBALS['DebauchDB']->queryF($sql);
                            if ($countb!=0)
                            {
                                while($region = $GLOBALS['DebauchDB']->fetchArray($resultr))
                                {
                                    if (number_format($region['Latitude_Float'],3)==number_format($values['geometry']['location']['lat'],3) && number_format($region['Longitude_Float'],3)==number_format($values['geometry']['location']['lng'],3))
                                    {
                                        $region['RegionName'] = $values['name'];
                                        $region['GoogleID'] = $values['place_id'];
                                        $region['Longitude_Float'] = $values['geometry']['location']['lng'];
                                        $region['Latitude_Float'] = $values['geometry']['location']['lat'];
                                        $region['mapref_longitude'] = floor(abs($values['geometry']['location']['lng'])) . ($values['geometry']['location']['lng'] > 0? "E":"W");
                                        $region['mapref_latitude'] = floor(abs($values['geometry']['location']['lat'])) . ($values['geometry']['location']['lat'] > 0? "N":"S");
                                        $region['Last'] = $region['Next'];
                                        $region['Next'] = time() + ($count>1000?(3600*24*7*4*mt_rand(7,11)):0);
                                        $region['Action'] = time();
                                        $update = array();
                                        foreach(array_keys($region) as $field)
                                            if (!empty($region[$field]))
                                                if (!is_array($region[$field]))
                                                    $update[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $region[$field]) . "'";
                                                    else
                                                        $update[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, json_encode($region[$field])) . "'";
                                        $sql = "UPDATE `$table` SET " . implode(', ', $update) . " WHERE `CordID` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $region['CordID']) . "'";
                                        if (!$GLOBALS['DebauchDB']->queryF($sql))
                                            die("SQL Failed: $sql;");
                                    }
                                }
                            } else {
                                $sql = "SELECT MAX(`CordID`) + 1 as CordID  FROM `" . $table . "` GROUP BY `CountryID`";
                                list($cordid) = $GLOBALS['DebauchDB']->fetchRow($GLOBALS['DebauchDB']->queryF($sql));
                                
                                $region = array();
                                $region['CordID'] = $cordid;
                                $region['CountryID'] = $countryid;
                                $region['RegionName'] = $values['name'];
                                $region['GoogleID'] = $values['place_id'];
                                $region['Longitude_Float'] = $values['geometry']['location']['lng'];
                                $region['Latitude_Float'] = $values['geometry']['location']['lat'];
                                $region['mapref_longitude'] = floor(abs($values['geometry']['location']['lng'])) . ($values['geometry']['location']['lng'] > 0? "E":"W");
                                $region['mapref_latitude'] = floor(abs($values['geometry']['location']['lat'])) . ($values['geometry']['location']['lat'] > 0? "N":"S");
                                $region['Last'] = 0;
                                $region['Next'] = time();
                                $region['Action'] = time();
                                
                                $insert = array();
                                foreach(array_keys($region) as $field)
                                    if (!empty($region[$field]))
                                        if (!is_array($region[$field]))
                                            $insert[$field] = mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $region[$field]);
                                        else
                                            $insert[$field] = mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, json_encode($region[$field]));
                                $sql = "INSERT INTO `$table` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
                                if (!$GLOBALS['DebauchDB']->queryF($sql))
                                    die("SQL Failed: $sql;");
                            }
                        }
                    }
            }
        }
    }
}

$GLOBALS["DebauchDB"]->query("COMMIT");