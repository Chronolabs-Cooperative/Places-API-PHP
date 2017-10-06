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


error_reporting(E_ERROR);
ini_set('display_errors', true);
ini_set('log_errors', true);
ini_set('error_log', __DIR__ . DIRECTORY_SEPARATOR . date('Y-m') .'--crons-error-log.txt');

global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apiconfig.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'verify.php';

$GLOBALS["APIDB"]->query("START TRANSACTION");

$sql = "SELECT * FROM `".$GLOBALS["APIDB"]->prefix('countries') ."` ORDER BY RAND()";
$result = $GLOBALS["APIDB"]->query($sql);
while($country = $GLOBALS["APIDB"]->fetchArray($result))
{
    $table = $country['Table'];
    $sql = "SELECT * FROM `".$GLOBALS["APIDB"]->prefix($table . "_details") . "` WHERE `updating` < UNIX_TIMESTAMP() ORDER BY RAND()";
    $details = $GLOBALS["APIDB"]->query($sql);
    while($detail = $GLOBALS["APIDB"]->fetchArray($details))
    {
        $data = json_decode(getURIData("https://maps.googleapis.com/maps/api/place/details/json?" . (!empty($detail['Key'])?"placeid=".$detail['Key']."&":"") . "key=". API_GOOGLE_KEY), true);
        $sql = "UPDATE `" . $table . "_details` SET `data` = COMPRESS('" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($data)) . "'),  `retrieve` = UNIX_TIMESTAMP(), `updating` = UNIX_TIMESTAMP() + (3600 * 24 * 7 * 4 * ".mt_rand(7,11) . ") WHERE `DetailID` = '" . $detail['DetailID'] . "'";
        if (!$GLOBALS["APIDB"]->query($sql))
            die("SQL Failed: $sql;");
    }
}

$GLOBALS["APIDB"]->query("COMMIT");