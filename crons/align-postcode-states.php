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

$sql = "SELECT * FROM `countries` LIMIT " . API_CRON_NUMBER_COUNTRIES . " ORDER BY RAND()";
$result = $GLOBALS["DebauchDB"]->query($sql);
while($country = $GLOBALS["DebauchDB"]->fetchArray($result))
{
    $sql = "SELECT * FROM `" . $country['Table'] . "` WHERE LENGTH(`State`) = 0 OR LENGTH(`Postcode`) = 0 OR LENGTH(`GoogleID`) = 0 OR `GoogleID` = '0' LIMIT " . API_CRON_NUMBER_REGIONS . " ORDER BY RAND()";
    $regions = $GLOBALS["DebauchDB"]->query($sql);
    while($region = $GLOBALS["DebauchDB"]->fetchArray($regions))
    {
        $geo = json_decode(getURIData("https://maps.googleapis.com/maps/api/geocode/json?address=" . $region['RegionName'] . ", " . $country['Country']), true);
        if ($geo['status'] == 'OK') {
            $state = $postcode = '';
            foreach($geo['results'][0]['address_components'] as $values)
            {
                if (in_array('administrative_area_level_1', $values['types']) && in_array('political', $values['types']))
                    $state = $values['long_name'];
                elseif (in_array('administrative_area_level_2', $values['types']) && in_array('political', $values['types']))
                    $state = $values['short_name'];
                elseif (in_array('postal_code', $values['types']))
                    $postcode = $values['long_name'];
            }
            
            $sql = "UPDATE `" . $country['Table'] . "` SET `Updates` = `Updates` + 1, `Postcode` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $postcode) . "',  `State` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $state) . "', `GoogleID` = '" . mysqli_real_escape_string($GLOBALS['DebauchDB']->conn, $geo['results'][0]['place_id']) . "', `Action` = UNIX_TIMESTAMP() WHERE `CordID` = '" . $region['CordID'] . "' AND `CountryID` = '" . $region['CountryID'] . "'";
            if (!$GLOBALS["DebauchDB"]->query($sql))
                die("SQL Failed: $sql;");
        }
    }
}