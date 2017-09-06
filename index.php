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

    error_reporting(E_ERROR);
    ini_set('display_errors', true);
    
	$parts = explode(".", microtime(true));
	mt_srand(mt_rand(-time(), time())/$parts[1]);
	mt_srand(mt_rand(-time(), time())/$parts[1]);
	mt_srand(mt_rand(-time(), time())/$parts[1]);
	mt_srand(mt_rand(-time(), time())/$parts[1]);
	$salter = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
	header('Blowfish-salt: '. $salter);
	
	global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'apiconfig.php';
	
	/**
	 * Global API Configurations and Setting from file Constants!
	 */
	$domain = getDomainSupportism('domain', $_SERVER["HTTP_HOST"]);
	$protocol = getDomainSupportism('protocol', $_SERVER["HTTP_HOST"]);
	$business = getDomainSupportism('business', $_SERVER["HTTP_HOST"]);
	$entity = getDomainSupportism('entity', $_SERVER["HTTP_HOST"]);
	$contact = getDomainSupportism('contact', $_SERVER["HTTP_HOST"]);
	$referee = getDomainSupportism('referee', $_SERVER["HTTP_HOST"]);
	$peerings = getPeersSupporting();
	
	/**
	 * URI Path Finding of API URL Source Locality
	 * @var unknown_type
	 */
	$pu = parse_url($_SERVER['REQUEST_URI']);
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
	unset($pu);

	$help=false;
	if ((!isset($_GET['country']) || empty($_GET['country'])) && (!isset($_GET['place']) || empty($_GET['place']))) {
		$help=true;
	} elseif (isset($_GET['output']) || !empty($_GET['output'])) {
	    if (isset($_GET['country']) && $_GET['country'] == 'list') {
            $output = trim($_GET['output']);
            switch ($_GET['place'])
            {
    	        default:
                    $mode = 'countries';
                    break;
    	        case 'continents':
    	            $mode = 'continents';
    	            break;
            }
	   } elseif (isset($_GET['country']) && $_GET['country'] == 'key') {
			$key = trim($_GET['place']);
			$radius = intval($_GET['number']);
			if ($radius<0)
				$radius = 0;
			elseif ($radius>245)
				$radius = 145;
			$output = trim($_GET['output']);
			$mode = 'key';
		} elseif (isset($_GET['country']) && $_GET['country'] == 'nearby') {
			$latitude = (float)$_GET['latitude'];
			$longitude = (float)$_GET['longitude'];
			$radius = intval($_GET['radius']);
			if ($radius<0)
				$radius = 0;
			elseif ($radius>245)
				$radius = 145;
			$output = trim($_GET['output']);
			$mode = 'nearby';
		} else {
			$mode = 'place';
			$country = trim($_GET['country']);
			$place = trim($_GET['place']);
			$output = trim($_GET['output']);
			$number = isset($_GET['number'])?(integer)$_GET['number']:1;
		}
	} else {
		$help=true;
	}
	
	if ($help==true) {
		http_response_code(400);
		include dirname(__FILE__).'/help.php';
		exit;
	}
	http_response_code(200);
	if (!$data = PlacesCache::read(md5($_SERVER['REQUEST_URI'])))
	{
    	switch ($mode) {
    	    case 'countries':
    	        $sql = "SELECT *, md5(concat(`CountryID`,`Country`)) as `key`  FROM `$mode` ORDER BY `Country`";
    	        $data = array();
    	        $result = $GLOBALS['DebauchDB']->queryF($sql);
    	        while($row = $GLOBALS['DebauchDB']->fetchArray($result))
    	        {
    	            unset($row['Table']);
    	            unset($row['CountryID']);
    	            foreach($row as $key => $value)
    	                $data[$row['key']][strtolower($key)] = $value;
    	        }
    	        break;
    	    case 'continents':
    	        $sql = "SELECT *, md5(concat(`ContinentID`,`Continent`)) as `key` FROM `$mode` ORDER BY `Continent`";
    	        $data = array();
    	        $result = $GLOBALS['DebauchDB']->queryF($sql);
    	        while($row = $GLOBALS['DebauchDB']->fetchArray($result))
    	        {
    	            unset($row['ContinentID']);
    	            foreach($row as $key => $value)
    	                $data[$row['key']][strtolower($key)] = $value;
    	        }
    	        break;
    		default:
    			$data = findPlace($country, $place, $output, $number);
    			break;
    		case 'nearby':
    			$data = findNearby($latitude, $longitude, $radius, $output);
    			break;
    		case 'key':
    			$data = findKey($key, $radius, $output);
    			break;
    	}
    	PlacesCache::write(md5($_SERVER['REQUEST_URI']), $data, API_CACHE_SECONDS);
    	if (!$sessions = PlacesCache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
    	    $sessions = array();
    	$sessions[md5($_SERVER['REQUEST_URI'])] = time() + API_CACHE_SECONDS;
    	PlacesCache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
	}
	switch ($output) {
		default:
			echo '<h1>' . $country . ' - ' . $place . ' (Places data)</h1>';
			echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
			echo print_r($data, true);
			echo '</pre>';
			break;
		case 'raw':
			echo $data;
			break;
		case 'json':
			header('Content-type: application/json');
			echo json_encode($data);
			break;
		case 'serial':
			header('Content-type: text/html');
			echo serialize($data);
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			echo $dom->saveXML();
			break;
	}
	
	if ($sessions = PlacesCache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
	{
	    foreach($sessions as $key => $seconds)
	        if ($seconds<time())
	        {
	            PlacesCache::delete($key);
	            unset ($sessions[$key]);
	        }
	}
?>		