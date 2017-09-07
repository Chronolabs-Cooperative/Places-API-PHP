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

	$odds = $inner = array();
	foreach($_GET as $key => $values)
        if (!isset($inner[$key]))
            $inner[$key] = $values;
        elseif (!in_array((!is_array($values)?$values:md5(json_encode($values, true)))), array_keys($odds[$key])) {
            if (is_array($values))
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            else
                $odds[$key][$inner[$key] = $values] = "$values--$key";
    foreach($_POST as $key => $values)
        if (!isset($inner[$key]))
                $inner[$key] = $values;
        elseif (!in_array((!is_array($values)?$values:md5(json_encode($values, true)))), array_keys($odds[$key])) {
            if (is_array($values))
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            else
                $odds[$key][$inner[$key] = $values] = "$values--$key";
    foreach(parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'], '?')?'&':'?').$_SERVER['QUERY_STRING'], PHP_URL_QUERY) as $key => $values)
        if (!isset($inner[$key]))
            $inner[$key] = $values;
        elseif (!in_array((!is_array($values)?$values:md5(json_encode($values, true)))), array_keys($odds[$key])) {
            if (is_array($values))
                $odds[$key][md5(json_encode($inner[$key] = $values, true))] = $values;
            else
                $odds[$key][$inner[$key] = $values] = "$values--$key";
        
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
            }
	   } elseif (isset($inner['country']) && $inner['country'] == 'key') {
			$key = trim($inner['place']);
			$radius = isset($inner['radius'])?(float)$inner['radius']:1;
			if ($radius<0)
				$radius = 0;
			elseif ($radius>245)
				$radius = 145;
			$output = trim($inner['output']);
			$mode = 'key';
		} elseif (isset($inner['country']) && $inner['country'] == 'nearby') {
			$latitude = (float)$inner['latitude'];
			$longitude = (float)$inner['longitude'];
			$radius = isset($inner['radius'])?(float)$inner['radius']:1;
			if ($radius<0)
				$radius = 0;
			elseif ($radius>245)
				$radius = 145;
			$output = trim($inner['output']);
			$mode = 'nearby';
		} elseif (isset($inner['country']) && $inner['country'] == 'venues') {
		    $key = (string)$inner['place'];
		    $radius = isset($inner['radius'])?(float)$inner['radius']:1;
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
		    $mode = 'maps';
		} elseif (isset($inner['country']) && $inner['country'] == 'address') {
		    $address = (string)$inner['address'];
		    $key = (string)$inner['place'];
		    $radius = isset($inner['radius'])?(float)$inner['radius']:1;
		    $output = trim($inner['output']);
		    $type = trim($inner['type']);
		    $mode = 'maps';
		} else {
			$mode = 'place';
			$country = trim($inner['country']);
			$place = trim($inner['place']);
			$output = trim($inner['output']);
			$number = isset($inner['radius'])?(float)$inner['radius']:1;
		}
	} else {
		$help=true;
	}
	
	if ($help==true) {
		http_response_code(400);
		include dirname(__FILE__).'/help.php';
		if ($sessions = PlacesCache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
		{
		    foreach($sessions as $key => $seconds)
		        if ($seconds<time())
		        {
		            PlacesCache::delete($key);
		            unset ($sessions[$key]);
		        }
		    PlacesCache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
		}
		exit;
	}
	http_response_code(200);
	if ($country == 'random' || $place == 'random')
	    $keyname = md5(whitelistGetIP(true) . '___' . $_SERVER['HTTP_HOST'] . '___' . $_SERVER['REQUEST_URI']);
	else 
	    $keyname = md5($_SERVER['REQUEST_URI']);
	if (!$data = PlacesCache::read($keyname))
	{
	    $retries = 0;
	    $data = array();
	    while (empty($data) || $retries<11)
	    {
	        $retries++;
        	switch ($mode) {
        	    case 'countries':
        	        $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `$mode`  GROUP BY `CountryID` ORDER BY `Country`";
        	        $result = $GLOBALS['DebauchDB']->queryF($sql);
        	        while($row = $GLOBALS['DebauchDB']->fetchArray($result))
        	        {
        	            $table = $row['Table'];
        	            unset($row['Table']);
        	            unset($row['CountryID']);
        	            if ($output!='xml')
        	                $data[$row['key']] = $row;
    	                else
    	                    $data[$table] = $row;
        	        }
        	        break;
        	    case 'continents':
        	        $sql = "SELECT *, md5(concat(`ContinentID`, `Continent`, max(`ContinentID`) - `ContinentID` + 1)) as `key` FROM `$mode`  GROUP BY `ContinentID` ORDER BY `Continent`";
        	        $result = $GLOBALS['DebauchDB']->queryF($sql);
        	        while($row = $GLOBALS['DebauchDB']->fetchArray($result))
        	        {
        	            $continent = str_replace(array(" ", "'". "`", "-"), "", ucwords(strtolower($row['Continent'])));
        	            unset($row['ContinentID']);
        	            if ($output!='xml')
        	                $data[$row['key']] = $row;
        	            else 
        	                $data[$continent] = $row;
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
        		case 'maps':
        		    $data = findKeyMaps($key, $radius, $output);
        		    break;
        		case 'venues':
        		    $data = findKeyVenues($key, $radius, $output);
        		    break;
        	}
        	foreach($data as $key => $values)
        	    if (empty($values))
        	        unset($data[$key]);
    	        elseif(is_array($values))
    	        {
    	            $empty = true;
    	            foreach($values as $keb => $value)
    	                if (!empty($value))
    	                    $empty = false;
                    if ($empty==true)
                        unset($data[$key]);
                }
	    }
    	if (!empty($data))
    	{
    	    PlacesCache::write($keyname, $data, API_CACHE_SECONDS);
    	    if (!$sessions = PlacesCache::read('sessions-'.md5($_SERVER['HTTP_HOST'])))
    	        $sessions = array();
    	    $sessions[$keyname] = time() + API_CACHE_SECONDS;
	        PlacesCache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
    	}
	}
	
	foreach($data as $key => $values)
	    if (empty($values))
	        unset($data[$key]);
        elseif(is_array($values))
        {
            $empty = true;
            foreach($values as $keb => $value)
                if (!empty($value))
                    $empty = false;
            if ($empty==true)
                unset($data[$key]);
        }
        
 	switch ($output) {
		default:
			echo '<h1>' . $country . ' - ' . $place . ' (Places data)</h1>';
			echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
			echo print_r($data, true);
			echo '</pre>';
			break;
		case 'raw':
		    echo "<?php\n\nreturn " . var_export($data, true) . ";\n\n?>";
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
			$dom->fromMixed(array($mode=>$data));
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
	    PlacesCache::write('sessions-'.md5($_SERVER['HTTP_HOST']), $sessions, API_CACHE_SECONDS * API_CACHE_SECONDS * API_CACHE_SECONDS);
	}
?>		