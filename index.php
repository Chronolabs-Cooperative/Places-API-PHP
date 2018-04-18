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

define('_API_FATAL_MESSAGE', 'Fatal: %s!');

$parts = explode(".", microtime(true));
mt_srand(mt_rand(-time(), time())/$parts[1]);
mt_srand(mt_rand(-time(), time())/$parts[1]);
mt_srand(mt_rand(-time(), time())/$parts[1]);
mt_srand(mt_rand(-time(), time())/$parts[1]);
$salter = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
header('Blowfish-salt: '. $salter);

global $source;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'verify.php';
$GLOBALS['APILogger']->activated = false;

/**
 * URI Path Finding of API URL Source Locality
 * @var unknown_type
 */
$odds = $inner = array();
foreach($_GET as $key => $values) {
    if (!isset($inner[$key])) {
        $inner[$key] = $values;
    } elseif (!in_array(!is_array($values) ? $values : md5(json_encode($values, true)), array_keys($odds[$key]))) {
        if (is_array($values)) {
    	$odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
        } else {
    	$odds[$key][$inner[$key] = $values] = "$values--$key";
        }
    }
}

foreach($_POST as $key => $values) {
    if (!isset($inner[$key])) {
	$inner[$key] = $values;
    } elseif (!in_array(!is_array($values) ? $values : md5(json_encode($values, true)), array_keys($odds[$key]))) {
    	if (is_array($values)) {
    	    $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
    	} else {
    	    $odds[$key][$inner[$key] = $values] = "$values--$key";
    	}
    }
}

foreach(parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'], '?')?'&':'?').$_SERVER['QUERY_STRING'], PHP_URL_QUERY) as $key => $values) {
    if (!isset($inner[$key])) {
	$inner[$key] = $values;
    } elseif (!in_array(!is_array($values) ? $values : md5(json_encode($values, true)), array_keys($odds[$key]))) {
    	if (is_array($values)) {
    	    $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
    	} else {
    	    $odds[$key][$inner[$key] = $values] = "$values--$key";
    	}
    }
}

error_reporting(0);
$help=false;
if ((!isset($inner['country']) || empty($inner['country'])) && (!isset($inner['place']) || empty($inner['place'])) && (!isset($inner['address']) || empty($inner['address']))) {
	$help=true;
} elseif (isset($inner['output']) || !empty($inner['output'])) {
    if (isset($inner['country']) && $inner['country'] == 'list') {
    $output = trim($inner['output']);
    switch ($inner['place'])
    {
	default:
	    $mode = 'countries';
	    break;
	case 'continents':
	    $mode = 'continents';
	    break;
	case 'types':
	    $mode = 'types';
	    break;
    }
   } elseif (isset($inner['country']) && $inner['country'] == 'key') {
		$key = trim($inner['place']);
		$radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
		if ($radius<0)
			$radius = 0;
		elseif ($radius>245)
			$radius = 145;
		$output = trim($inner['output']);
		$mode = 'key';
	} elseif (isset($inner['country']) && $inner['country'] == 'nearby') {
		$latitude = (float)$inner['latitude'];
		$longitude = (float)$inner['longitude'];
		$radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
		if ($radius<0)
			$radius = 0;
		elseif ($radius>245)
			$radius = 145;
		$output = trim($inner['output']);
		$mode = 'nearby';
	} elseif (isset($inner['country']) && $inner['country'] == 'exactly') {
	    $latitude = (float)$inner['latitude'];
	    $longitude = (float)$inner['longitude'];
	    $radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
	    if ($radius<0)
		$radius = 0;
	elseif ($radius>245)
		$radius = 145;
	$output = trim($inner['output']);
	$mode = 'exactly';
	} elseif (isset($inner['country']) && $inner['country'] == 'venues') {
	    $key = (string)$inner['place'];
	    $radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
	    if ($radius<0)
		$radius = 0;
	elseif ($radius>245)
	   $radius = 145;
	$output = trim($inner['output']);
	$type = trim($inner['type']);
	$mode = 'venues';
	} elseif (isset($inner['country']) && $inner['country'] == 'maps') {
	    $key = (string)$inner['place'];
	    $output = trim($inner['output']);
	    $radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
	    $mode = 'maps';
	} elseif (isset($inner['country']) && $inner['country'] == 'details') {
	    $key = (string)$inner['place'];
	    $output = trim($inner['output']);
	    $mode = 'details';
	} elseif (isset($inner['country']) && $inner['country'] == 'address') {
	    $address = (string)(!isset($inner['place'])?$inner['address']:$inner['place']);
	    $radius = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
	    $output = trim($inner['output']);
	    $type = trim($inner['type']);
	    $mode = 'address';
	} else {
		$mode = 'place';
		$country = trim($inner['country']);
		$place = trim($inner['place']);
		$output = trim($inner['output']);
		$number = isset($inner['radius'])?(float)$inner['radius']:API_RADIUS_DEFAULT;
	}
} else {
	$help=true;
}

error_reporting(0);
if ($help==true) {
	http_response_code(400);
	include dirname(__FILE__).'/help.php';
	if ($sessions = @APICache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
	{
	    foreach($sessions as $key => $seconds)
		if ($seconds<time())
		{
		    @APICache::delete($key);
		    unset ($sessions[$key]);
		}
	    @APICache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
	}
	exit;
}

error_reporting(0);
http_response_code(200);
if ($country == 'random' || $place == 'random')
    $keyname = md5(whitelistGetIP(true) . '___' . $_SERVER['HTTP_HOST'] . '___' . $_SERVER['REQUEST_URI']);
else 
    $keyname = md5($_SERVER['REQUEST_URI']);
if (!$data = APICache::read($keyname))
{
    $retries = 0;
    $data = array();
    while (empty($data) || $retries<11)
    {
	$retries++;
	switch ($mode) {
		case 'countries':
		    $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `".$GLOBALS['APIDB']->prefix($mode)."`  GROUP BY `CountryID` ORDER BY `Country`";
			$result = $GLOBALS['APIDB']->queryF($sql);
			while($row = $GLOBALS['APIDB']->fetchArray($result))
			{
			    $table = $row['Table'];
			    unset($row['Table']);
			    unset($row['CountryID']);
			    if ($output!='xml')
				    $data[$row['key']] = @strippedArray($row, explode("|", API_COUNTRY_FIELDS));
    			else
    			    $data[$table] = @strippedArray($row, explode("|", API_COUNTRY_FIELDS));
			}
			break;
		case 'continents':
		    $sql = "SELECT *, md5(concat(`ContinentID`, `Continent`, max(`ContinentID`) - `ContinentID` + 1)) as `key` FROM `".$GLOBALS['APIDB']->prefix($mode)."`  GROUP BY `ContinentID` ORDER BY `Continent`";
			$result = $GLOBALS['APIDB']->queryF($sql);
			while($row = $GLOBALS['APIDB']->fetchArray($result))
			{
			    $continent = str_replace(array(" ", "'". "`", "-"), "", ucwords(strtolower($row['Continent'])));
			    unset($row['ContinentID']);
			    if ($output!='xml')
				    $data[$row['key']] = @strippedArray($row, explode("|", API_CONTINENT_FIELDS));
			    else
				    $data[$continent] = @strippedArray($row, explode("|", API_CONTINENT_FIELDS));
			}
			break;
		case 'types':
		    $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `".$GLOBALS['APIDB']->prefix($mode)."`  GROUP BY `CountryID` ORDER BY `Country`";
			$result = $GLOBALS['APIDB']->queryF($sql);
			while($row = $GLOBALS['APIDB']->fetchArray($result))
			{
			    $table = $row['Table'];
			    unset($row['Table']);
			    unset($row['CountryID']);
			    if ($output!='xml')
				    $data[$row['key']] = @strippedArray($row, explode("|", API_COUNTRY_FIELDS));
				else
				    $data[$table] = @strippedArray($row, explode("|", API_COUNTRY_FIELDS));
			}
			break;
	    case 'place':
			$data = @findPlace($country, $place, $output, $number);
			break;
		case 'nearby':
			$data = @findNearby($latitude, $longitude, $radius, $output);
			break;
		case 'exactly':
			$data = @findExactly($latitude, $longitude, $radius, $output);
			break;
		case 'key':
			$data = @findKey($key, $radius, $output);
			break;
		case 'maps':
			$data = @findKeyMaps($key, $radius, $output);
			break;
		case 'details':
			$data = @findKeyDetails($key, $output);
			break;
		case 'venues':
			$data = @findKeyVenues($key, $type, $radius, $output);
			break;
		case 'address':
			$data = @findAddressVenues($address, $type, $radius, $output);
			break;
		}

    }
}

error_reporting(0);
if (!empty($data))
{
    @APICache::write($keyname, $data, API_CACHE_SECONDS);
    if (!$sessions = APICache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
        $sessions = array();
    $sessions[$keyname] = time() + API_CACHE_SECONDS;
    @APICache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
}

if (function_exists('mb_http_output')) {
    mb_http_output('pass');
}

error_reporting(0);
switch ($output) {
	default:
		echo '<h1>' . $country . ' - ' . $place . ' (API data)</h1>';
		echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
		echo print_r($data, true);
		echo '</pre>';
		break;
	case 'raw':
	    header('Content-type: application/x-httpd-php');
	    echo ('<?php'."\n\n".'return ' . var_export($data, true) . ";\n\n?>");
		break;
	case 'json':
		header('Content-type: application/json');
		echo (json_encode($data));
		break;
	case 'serial':
		header('Content-type: text/html');
		echo (serialize($data));
		break;
	case 'xml':
		header('Content-type: application/xml');
		$dom = new XmlDomConstruct('1.0', 'utf-8');
		$dom->fromMixed(array($mode=>$data));
		echo ($dom->saveXML());
		break;
}


error_reporting(0);
if ($sessions = @APICache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
{
    foreach($sessions as $key => $seconds)
        if ($seconds<time())
        {
            @APICache::delete($key);
            unset ($sessions[$key]);
        }
    @APICache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
}
