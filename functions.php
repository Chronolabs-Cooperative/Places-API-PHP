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


if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIPAddy()
	 *
	* 	provides an associative array of whitelisted IP Addresses
	* @author 		Simon Roberts (Chronolabs) simon@snails.email
	*
	* @return 		array
	*/
	function whitelistGetIPAddy() {
		return array_merge(whitelistGetNetBIOSIP(), file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist.txt'));
	}
}

if (!function_exists("whitelistGetNetBIOSIP")) {

	/* function whitelistGetNetBIOSIP()
	 *
	* 	provides an associative array of whitelisted IP Addresses base on TLD and NetBIOS Addresses
	* @author 		Simon Roberts (Chronolabs) simon@snails.email
	*
	* @return 		array
	*/
	function whitelistGetNetBIOSIP() {
		$ret = array();
		foreach(file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist-domains.txt') as $domain) {
			$ip = gethostbyname($domain);
			$ret[$ip] = $ip;
		}
		return $ret;
	}
}

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIP()
	 *
	* 	get the True IPv4/IPv6 address of the client using the API
	* @author 		Simon Roberts (Chronolabs) simon@snails.email
	*
	* @param		$asString	boolean		Whether to return an address or network long integer
	*
	* @return 		mixed
	*/
	function whitelistGetIP($asString = true){
		// Gets the proxy ip sent by the user
		$proxy_ip = '';
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
		} else
		if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED'];
		} else
		if (!empty($_SERVER['HTTP_VIA'])) {
			$proxy_ip = $_SERVER['HTTP_VIA'];
		} else
		if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
		} else
		if (!empty($_SERVER['HTTP_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_COMING_FROM'];
		}
		if (!empty($proxy_ip) && $is_ip = preg_match('/^([0-9]{1,3}.){3,3}[0-9]{1,3}/', $proxy_ip, $regs) && count($regs) > 0)  {
			$the_IP = $regs[0];
		} else {
			$the_IP = $_SERVER['REMOTE_ADDR'];
		}
			
		$the_IP = ($asString) ? $the_IP : ip2long($the_IP);
		return $the_IP;
	}
}

if (!function_exists("randomAPIKey")) {

	/* function randomAPIKey()
	 *
	 * 	Get a random forensic identify key for a place from the database
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @return 		string(32)
	 */
	function randomAPIKey()
	{
	    $sql = "SELECT * FROM `".$GLOBALS['APIDB']->prefix("countries") . "` WHERE `Records` > 1000 ORDER BY RAND() LIMIT 1 ";
		if ($result = $GLOBALS['APIDB']->queryF($sql)) {
			$country = $GLOBALS['APIDB']->fetchArray($result);
			$sql = "SELECT concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key` FROM `" . $GLOBALS['APIDB']->prefix($country['Table']) . "` ORDER BY RAND() LIMIT 1 ";
			if ($result = $GLOBALS['APIDB']->queryF($sql)) {
				if (list($key) = $GLOBALS['APIDB']->fetchRow($result))
				    return $key;
			}
			return array();
		}
	}
}

if (!function_exists("randomGeoPlace")) {
    
    /* function randomAPIKey()
     *
     * 	Get a random forensic identify key for a place from the database
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		string(32)
     */
    function randomGeoPlace()
    {
        $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `Records` > 1000  ORDER BY RAND() LIMIT 1 ";
        if ($result = $GLOBALS['APIDB']->queryF($sql)) {
            $country = $GLOBALS['APIDB']->fetchArray($result);
            $sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix($country['Table']) . "` ORDER BY RAND() LIMIT 1 ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                if ($place = $GLOBALS['APIDB']->fetchArray($result))
                    return array('country' => $country['Country'], 'iso3' => $country['ISO3'], 'iso2' => $country['ISO2'], 'region' => $place['RegionName']);
            }
        }
        return false;
    }
}
if (!function_exists("randomGeoLocation")) {

	/* function randomGeoLocation()
	 *
	 * 	Get a random latitude & longitude for a place from the database
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @return 		array
	 */
	function randomGeoLocation()
	{
		$sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `Records` > 1000  ORDER BY RAND() LIMIT 1 ";
		if ($result = $GLOBALS['APIDB']->queryF($sql)) {
			$country = $GLOBALS['APIDB']->fetchArray($result);
			$sql = "SELECT * FROM `" . $GLOBALS['APIDB']->prefix($country['Table']) . "` ORDER BY RAND() LIMIT 1 ";
			if ($result = $GLOBALS['APIDB']->queryF($sql)) {
				if ($place = $GLOBALS['APIDB']->fetchArray($result))
					return array('latitude'=>$place['Latitude_Float'], 'longitude' => $place['Longitude_Float']);
			}
			return array('latitude'=> 0, 'longitude' => 0);
		}
	}
}

if (!function_exists("findPlace")) {

	/* function findPlace()
	 *
	 * 	Function that finds a location(s) based in the information passed to the URL
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @param		$country		string		Country Name, ISO2 or ISO3 or keyword 'Random' for a country to search
	 * @param		$place			string		Name of place or component of name of places to search for or keyword 'Random'
	 * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
	 * @param		$return			integer		Number of Result to Limit the selection and return of the API
	 *
	 * @return 		array
	 */
	function findPlace($country = '', $place = '', $format = 'json', $radius = 1)
	{
	    if (empty($radius) || $radius < 1)
	        $radius = API_RADIUS_DEFAULT;
	   
		session_start();
		if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) {
			if (isset($_SESSION['places']['queries']['time'])) {
				if ($_SESSION['places']['queries']['time']>time()) {
					$_SESSION['places']['queries']['number'] = 0;
					$_SESSION['places']['queries']['time'] = time()+3600;
				}
			} elseif (!isset($_SESSION['places']['queries']['time'])) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
			if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
					header("HTTP/1.0 404 Not Found");
					exit;
			}
			$_SESSION['places']['queries']['number']++;
		}
		
		$numberof = 0;
		$sql = '';
		$ret = array();
		if (strlen($country)>3&&strtolower($country)!='list'&&strtolower($country)!='random') {
			$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key`  FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE lower(`Country`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1";
			
		} elseif (strlen($country)>3&&strtolower($country)=='random') {
			$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key`  FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() LIMIT 1";
			
		} elseif (strlen($country)>3&&strtolower($country)=='list') {
			$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key`  FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY `Country` ASC ";

		} elseif (strlen($country)==3) {
			$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE lower(`ISO3`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1 ";
	    } elseif (strlen($country)==2) {
			$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE lower(`ISO2`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1 ";
	    } elseif (strlen($country)!=2 && strlen($country)!=3) {
	        $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE lower(`Country`) LIKE '%".strtolower($country)."%' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1 ";
	    }
	    $numberof=$seconds=$start=$end=0;
	    if ($result = $GLOBALS['APIDB']->queryF($sql)) {
		    while($country = $GLOBALS['APIDB']->fetchArray($result)) {
		        $sql = "SELECT count(*) as records FROM `" . $country['Table'] . "`";
		        if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
		            $records = $GLOBALS['APIDB']->fetchArray($resultb);
		            $country['records'] = $records['records'];
		        } else
		            $country['records'] = 0 ;
	            $table = $country['Table'];
	            if ($format!='xml')
	                $ret['countries'][$table] = strippedArray($country, explode('|', API_COUNTRY_FIELDS));
                else
                    $ret['countries'][$table] = strippedArray($country, explode('|', API_COUNTRY_FIELDS));
		
    			if (strtolower($place)!='random') {
    			    $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` WHERE LOWER(`RegionName`) LIKE '" . strtolower($place) . "%'  ORDER BY RAND()";
    			} elseif (strtolower($place) == 'random' && strtolower($country) == 'random')
    			     $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` ORDER BY RAND()";
    			elseif (strtolower($place) == 'random' && strtolower($country) != 'random') {
    			    $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` ORDER BY RAND()";
    			} else {
    			    $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` WHERE LOWER(`RegionName`) LIKE '%" . strtolower($place) . "%'  ORDER BY RAND()";
    			}
				if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
					while ($region = $GLOBALS['APIDB']->fetchArray($resultb)) {
					    if ($seconds==0)
					        $seconds = 120;
					    elseif ($end!=0&&$start!=0)
					       $seconds = $seconds + ($end - $start * 3);
					    $start = microtime(true);
					    set_time_limit($seconds);
					    if (strpos($region['RegionName'], ',')) {
					        $parts = explode(',',$region['RegionName']);
					        array_reverse($parts);
					        foreach($parts as $key => $value)
					            $parts[$key] = trim($value);
					            $region['RegionName'] = implode(' ', $parts);
					    }
						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($region['RegionName']));
						if ($format!='xml')
						    $ret['places'][$table][$region['key']] = strippedArray($region, explode('|', API_PLACES_FIELDS));
						else 
						    $ret['places'][$table][$key] = strippedArray($region, explode('|', API_PLACES_FIELDS));
						$numberof++;
						
						if ($radius != API_RADIUS_DEFAULT)
						{
    						$latitude = $region['Latitude_Float'];
    						$longitude = $region['Longitude_Float'];
    						$sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($latitude) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($latitude) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $longitude . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as `Distance` FROM `" . $GLOBALS['APIDB']->prefix($table) . "` HAVING `Distance` <= ".$radius. " ORDER BY `Distance`";
    						$ret['search']['countries']++;
    						unset($resultb);
    						if ($resultc = $GLOBALS['APIDB']->queryF($sql)) {
    						    while ($nearby = $GLOBALS['APIDB']->fetchArray($resultc)) {
    						        if (strpos($nearby['RegionName'], ',')) {
    						            $parts = explode(',',$nearby['RegionName']);
					                    array_reverse($parts);
					                    foreach($parts as $key => $value)
					                        $parts[$key] = trim($value);
					                        $nearby['RegionName'] = implode(' ', $parts);
					                }
					                $keyb = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($nearby['RegionName']));
					                if ($format!='xml')
					                    $ret['places'][$table][$region['key']]['nearby'][$keyb] = strippedArray($nearby, explode('|',API_PLACES_FIELDS));
				                    else
				                        $ret['places'][$table][$key]['nearby'][$keyb] = strippedArray($nearby, explode('|',API_PLACES_FIELDS));
    						    }
    						}
						}
						$end = microtime(true);
					}
				}
		    }
		}
		return $ret;
	}	
}



if (!function_exists("findNearby")) {

	/* function findNearby()
	 *
	 * 	Function that finds a location(s) near a latitude & longitude
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @param		$latitude		float		Latitude to search for places near by
	 * @param		$longitude		float		Longitude to search for places near by
	 * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
	 * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
	 *
	 * @return 		array
	 */
	function findNearby($latitude = 0, $longitude = 0, $radius = 0, $format = 'json')
	{
		session_start();
		if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) {
			if (isset($_SESSION['places']['queries']['time'])) {
				if ($_SESSION['places']['queries']['time']>time()) {
					$_SESSION['places']['queries']['number'] = 0;
					$_SESSION['places']['queries']['time'] = time()+3600;
				}
			} elseif (!isset($_SESSION['places']['queries']['time'])) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
			if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
				header("HTTP/1.0 404 Not Found");
				exit;
			}
			$_SESSION['places']['queries']['number']++;
		}
		
		$ret = array();
		$ret['search']['places'] = $ret['search']['countries'] = 0;
		$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key`  FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
		if ($result = $GLOBALS['APIDB']->queryF($sql)) {
			while($country = $GLOBALS['APIDB']->fetchArray($result)) {
			    $table = $country['Table'];
				$sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
				if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
					$records = $GLOBALS['APIDB']->fetchArray($resultb);
					$country['records'] = $records['records'];
				} else
					$country['records'] = 0 ;
				$sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($latitude) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($latitude) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $longitude . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as `Distance` FROM `" . $GLOBALS['APIDB']->prefix($table) . "` HAVING `Distance` <= ".$radius. " ORDER BY `Distance`";
				$ret['search']['countries']++;
				unset($resultb);
				if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
					while ($place = $GLOBALS['APIDB']->fetchArray($resultb)) {
					    if ($format!='xml')
						    $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
					    else 
					        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
				        if (strpos($place['RegionName'], ',')) {
				            $parts = explode(',',$place['RegionName']);
				            array_reverse($parts);
				            foreach($parts as $key => $value)
				                $parts[$key] = trim($value);
				                $place['RegionName'] = implode(' ', $parts);
				        }
						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
						if ($format!='xml')
						    $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
					    else
					        $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
						$ret['search']['places']++;
					}
				}
			}
		}
		$ret['search']['type'] = 'nearby';
		return $ret;
	}
}




if (!function_exists("findExactly")) {

	/* function findNearby()
	 *
	 * 	Function that finds a location(s) near a latitude & longitude
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @param		$latitude		float		Latitude to search for places near by
	 * @param		$longitude		float		Longitude to search for places near by
	 * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
	 * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
	 *
	 * @return 		array
	 */
	function findExactly($latitude = 0, $longitude = 0, $radius = 0, $format = 'json')
	{
		session_start();
		if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) {
			if (isset($_SESSION['places']['queries']['time'])) {
				if ($_SESSION['places']['queries']['time']>time()) {
					$_SESSION['places']['queries']['number'] = 0;
					$_SESSION['places']['queries']['time'] = time()+3600;
				}
			} elseif (!isset($_SESSION['places']['queries']['time'])) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
			if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
				header("HTTP/1.0 404 Not Found");
				exit;
			}
			$_SESSION['places']['queries']['number']++;
		}
		
		$ret = array();
		$places = $ret['search']['countries'] = $ret['search']['places'] = 0;
		$sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key`  FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
		if ($result = $GLOBALS['APIDB']->queryF($sql)) {
			while($country = $GLOBALS['APIDB']->fetchArray($result)) {
			    $table = $country['Table'];
				$sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
				if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
					$records = $GLOBALS['APIDB']->fetchArray($resultb);
					$country['records'] = $records['records'];
				} else
					$country['records'] = 0 ;
				$ret['search']['countries']++;
				$sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($latitude) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($latitude) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $longitude . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as `Distance` FROM `" . $GLOBALS['APIDB']->prefix($table) . "` WHERE `Latitude_Float` >= ".($latitude - (111.32 * ($radius / 1000)))." AND `Longitude_Float` >= ".($longitude - (111.32 * ($radius / 1000)))." AND `Latitude_Float` <= ".($latitude + (111.32 * ($radius / 1000)))." AND `Longitude_Float` <= ".($longitude + (111.32 * ($radius / 1000))). " ORDER BY `Distance`";
				unset($resultb);
				if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
					while ($place = $GLOBALS['APIDB']->fetchArray($resultb)) {
					    if ($format!='xml')
					        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
				        else
				            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
			            if (strpos($place['RegionName'], ',')) {
			                $parts = explode(',',$place['RegionName']);
			                array_reverse($parts);
			                foreach($parts as $key => $value)
			                    $parts[$key] = trim($value);
			                $place['RegionName'] = implode(' ', $parts);
			            }
						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
						if ($format!='xml')
						    $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
					    else
					        $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
					    $ret['search']['places']++;
					}
				}
			}
		}
		$ret['search']['type'] = 'exactly';
		return $ret;
	}
}

if (!function_exists("findKey")) {

	/* function findKey()
	 *
	 * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
	 * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
	 * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
	 *
	 * @return 		array
	 */
	function findKey($key = '', $radius = 0, $format = 'json')
	{
	
		session_start();
		if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) {
			if (isset($_SESSION['places']['queries']['time'])) {
				if ($_SESSION['places']['queries']['time']>time()) {
					$_SESSION['places']['queries']['number'] = 0;
					$_SESSION['places']['queries']['time'] = time()+3600;
				}
			} elseif (!isset($_SESSION['places']['queries']['time'])) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
			if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
				header("HTTP/1.0 404 Not Found");
				exit;
			}
			$_SESSION['places']['queries']['number']++;
		}
		
		error_reporting(E_ERROR);
		session_start();
		if (isset($_SESSION['places']['queries']['time'])) {
			if ($_SESSION['places']['queries']['time']>time()) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
		} elseif (!isset($_SESSION['places']['queries']['time'])) {
			$_SESSION['places']['queries']['number'] = 0;
			$_SESSION['places']['queries']['time'] = time()+3600;
		}
		if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
			header("HTTP/1.0 404 Not Found");
			exit;
		}
		$_SESSION['places']['queries']['number']++;
	
		$sql = '';
		$ret = array();
		$found = false;
		$ret['results']['count'] = 0;
	    
	    if ( strpos($key, ":") > 0 )
	    {
	        $countryid = substr($key, 0, strpos($key, ":") );
	        $key = substr($key, strpos($key, ":") + 1);
	    } else
	        $countryid = false;
	        
        $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE '" . places_oldhash($key, 'countries') . "' LIKE concat('%', md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)), '%') GROUP BY `CountryID` ORDER BY RAND() ";
        if ($result = $GLOBALS['APIDB']->queryF($sql)) {
            if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                $table = $country['Table'];
            }
        }
        if (!isset($table) && !empty($countryid) && $countryid != false)
        {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '".$countryid."' GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                    $table = $country['Table'];
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address` FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%',md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%')  ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                    $table = $cntry['Table'];
                    $found = true;
                    if (!isset($country))
                        $country = $cntry;
                    }
                    $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $records = $GLOBALS['APIDB']->fetchArray($resultb);
                        $country['records'] = $records['records'];
                    } else
                        $country['records'] = 0 ;
                    if ($format!='xml')
                        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                    else
                        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                    if (strpos($place['RegionName'], ',')) {
                        $parts = explode(',',$place['RegionName']);
                        array_reverse($parts);
                        foreach($parts as $key => $value)
                            $parts[$key] = trim($value);
                            $place['RegionName'] = implode(' ', $parts);
                    }
                    $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                    if ($format!='xml')
                        $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                    else
                        $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                    $ret['results']['nearby'] = array();
                    $ret['results']['type'] = 'place';
                    $ret['results']['count'] = 1;
                    $ret['results']['nearby'] = 0;
                    $ret['longitude'] = $place['Longitude_Float'];
                    $ret['latitude'] = $place['Latitude_Float'];
                    $ret['address'] = $places['Address'];
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%',md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                    $table = $cntry['Table'];
                    $found=true;
                    if (!isset($country))
                        $country = $cntry;
                    }
                    $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $records = $GLOBALS['APIDB']->fetchArray($resultb);
                        $country['records'] = $records['records'];
                    } else
                        $country['records'] = 0 ;
                    if ($format!='xml')
                        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                    else
                        $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                    if (strpos($place['RegionName'], ',')) {
                        $parts = explode(',',$place['RegionName']);
                        array_reverse($parts);
                        foreach($parts as $key => $value)
                            $parts[$key] = trim($value);
                            $place['RegionName'] = implode(' ', $parts);
                    }
                    $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                    if ($format!='xml')
                        $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                    else
                        $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                    $ret['results']['nearby'] = array();
                    $ret['results']['type'] = 'place';
                    $ret['results']['count'] = 1;
                    $ret['results']['nearby'] = 0;
                    $ret['longitude'] = $place['Longitude_Float'];
                    $ret['latitude'] = $place['Latitude_Float'];
                    $ret['address'] = $places['Address'];
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $ctry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                        $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                        if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                            $records = $GLOBALS['APIDB']->fetchArray($resultb);
                            $country['records'] = $records['records'];
                        } else
                            $country['records'] = 0 ;
                        if ($format!='xml')
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        else
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        if (strpos($place['RegionName'], ',')) {
                            $parts = explode(',',$place['RegionName']);
                            array_reverse($parts);
                            foreach($parts as $key => $value)
                                $parts[$key] = trim($value);
                                $place['RegionName'] = implode(' ', $parts);
                        }
                        $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                        if ($format!='xml')
                            $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        else
                            $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        $ret['results']['nearby'] = array();
                        $ret['results']['type'] = 'place';
                        $ret['results']['count'] = 1;
                        $ret['results']['nearby'] = 0;
                        $ret['longitude'] = $venue['Longitude'];
                        $ret['latitude'] = $venue['Latitude'];
                        $ret['address'] = $venue['Vicinity'];
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                        $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                        if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                            $records = $GLOBALS['APIDB']->fetchArray($resultb);
                            $country['records'] = $records['records'];
                        } else
                            $country['records'] = 0 ;
                        if ($format!='xml')
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        else
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        if (strpos($place['RegionName'], ',')) {
                            $parts = explode(',',$place['RegionName']);
                            array_reverse($parts);
                            foreach($parts as $key => $value)
                                $parts[$key] = trim($value);
                                $place['RegionName'] = implode(' ', $parts);
                        }
                        $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                        if ($format!='xml')
                            $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        else
                            $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        $ret['results']['nearby'] = array();
                        $ret['results']['type'] = 'place';
                        $ret['results']['count'] = 1;
                        $ret['results']['nearby'] = 0;
                        $ret['longitude'] = $venue['Longitude'];
                        $ret['latitude'] = $venue['Latitude'];
                        $ret['address'] = $venue['Vicinity'];
                    }
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                        $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                        if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                            $records = $GLOBALS['APIDB']->fetchArray($resultb);
                            $country['records'] = $records['records'];
                        } else
                            $country['records'] = 0 ;
                        if ($format!='xml')
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        else
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        if (strpos($place['RegionName'], ',')) {
                            $parts = explode(',',$place['RegionName']);
                            array_reverse($parts);
                            foreach($parts as $key => $value)
                                $parts[$key] = trim($value);
                                $place['RegionName'] = implode(' ', $parts);
                        }
                        $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                        if ($format!='xml')
                            $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        else
                            $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        $ret['results']['nearby'] = array();
                        $ret['results']['type'] = 'place';
                        $ret['results']['count'] = 1;
                        $ret['results']['nearby'] = 0;
                        $ret['longitude'] = $address['Longitude'];
                        $ret['latitude'] = $address['Latitude'];
                        $ret['address'] = $address['Formatted'];
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                        $sql = "SELECT count(*) as records FROM `" . $GLOBALS['APIDB']->prefix($table) . "`";
                        if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                            $records = $GLOBALS['APIDB']->fetchArray($resultb);
                            $country['records'] = $records['records'];
                        } else
                            $country['records'] = 0 ;
                        if ($format!='xml')
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        else
                            $ret['results']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
                        if (strpos($place['RegionName'], ',')) {
                            $parts = explode(',',$place['RegionName']);
                            array_reverse($parts);
                            foreach($parts as $key => $value)
                                $parts[$key] = trim($value);
                                $place['RegionName'] = implode(' ', $parts);
                        }
                        $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                        if ($format!='xml')
                            $ret['results']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        else
                            $ret['results']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
                        $ret['results']['nearby'] = array();
                        $ret['results']['type'] = 'place';
                        $ret['results']['count'] = 1;
                        $ret['results']['nearby'] = 0;
                        $ret['longitude'] = $address['Longitude'];
                        $ret['latitude'] = $address['Latitude'];
                        $ret['address'] = $address['Formatted'];
                    }
                }
            }
        }
        
	    if ($radius <= 0 || $radius == API_RADIUS_DEFAULT)
	        return $ret;
	    
	    if ($found == true && $radius > 0) {
	        if (isset($ret['results']['places']))
	            $places = $ret['results']['places'];
	        elseif (isset($ret['results']['place']))
	            $places = $ret['results']['place'];
            foreach($places as $table => $values) {
                foreach($values as $key => $place) {
                    $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `Table` LIKE '$table' GROUP BY `CountryID` ORDER BY RAND() ";
                    $result = $GLOBALS['APIDB']->queryF($sql);
                    while($country = $GLOBALS['APIDB']->fetchArray($result)) {
                        $sql = "SELECT *, concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($place['Latitude_Float']) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($place['Latitude_Float']) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $place['Longitude_Float'] . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as `Distance`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` HAVING `Distance` <= ".$radius. " ORDER BY `Distance`";
    					$resultb = $GLOBALS['APIDB']->queryF($sql);
						while ($place = $GLOBALS['APIDB']->fetchArray($resultb)) {
						    if ($format!='xml')
						        $ret['results']['nearby']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
						    else
						        $ret['results']['nearby']['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
					        if (strpos($place['RegionName'], ',')) {
					            $parts = explode(',',$place['RegionName']);
					            array_reverse($parts);
					            foreach($parts as $key => $value)
					                $parts[$key] = trim($value);
					                $place['RegionName'] = implode(' ', $parts);
					        }
							$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
							if ($format!='xml')
							    $ret['results']['nearby']['places'][$table][$place['key']] = strippedArray($place, explode('|',API_PLACES_FIELDS));
						    else
						        $ret['results']['nearby']['places'][$table][$key] = strippedArray($place, explode('|',API_PLACES_FIELDS));
						    $ret['results']['nearby']++;
						}
                    }
				}
			}
			if ($ret['results']['nearby']>0)
				$ret['results']['type'] = 'keyed';
		}
		return $ret;
	}
}

if (!function_exists("getAddressGeoMapping"))
{
    /**
     * gets Geo Longitude + Latitude for an known address
     * 
     * @param string $address
     * @return number[]|unknown[]|mixed[]
     */
    function getAddressGeoMapping($address = '')
    {
        $geo = json_decode(getURIData('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false'), true);
        $latitude = $longitude = 0.0001;
        if ($geo['status'] == 'OK') {
            $address = array();
            foreach($geo['results'][0]['address_components'] as $values)
            {
                if (in_array('administrative_area_level_1', $values['types']) && in_array('political', $values['types']))
                    $address['State'] = $values['long_name'];
                elseif (in_array('administrative_area_level_2', $values['types']) && in_array('political', $values['types']))
                    $address['Council'] = $values['short_name'];
                elseif (in_array('postal_code', $values['types']))
                    $address['Postcode'] = $values['long_name'];
                elseif (in_array('subpremise', $values['types']))
                    $address['Unit'] = $values['long_name'];
                elseif (in_array('street_number', $values['types']))
                    $address['Building'] = $values['long_name'];
                elseif (in_array('route', $values['types']))
                    $address['Street'] = $values['long_name'];
                elseif (in_array('locality', $values['types']))
                    $address['Suburb'] = $values['long_name'];
                elseif (in_array('country', $values['types'])) {
                    $address['Country'] = $values['long_name'];
                    $address['Country_ISO2'] = $values['short_name'];
                }
            }
            if (!isset($address['State']) && isset($address['Council']))
            {
                $address['State'] = $address['Council'];
                unset($address['Council']);
            }
            $address['Formatted'] = $geo['results'][0]['formatted_address'];
            $address['GoogleID'] = $geo['results'][0]['place_id'];
            $address['Longitude'] = $geo['results'][0]['geometry']['location']['lng'];
            $address['Latitude'] = $geo['results'][0]['geometry']['location']['lat'];
            $address['View_NE_Longitude'] = $geo['results'][0]['geometry']['viewport']['northeast']['lng'];
            $address['View_NE_Latitude'] = $geo['results'][0]['geometry']['viewport']['northeast']['lat'];
            $address['View_SW_Longitude'] = $geo['results'][0]['geometry']['viewport']['southwest']['lng'];
            $address['View_SW_Latitude'] = $geo['results'][0]['geometry']['viewport']['southwest']['lat'];
            
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `Country` LIKE '%".$address['Country']."%' GROUP BY `CountryID` ORDER BY RAND() ";
            $result = $GLOBALS['APIDB']->queryF($sql);
            if ($country = $GLOBALS['APIDB']->fetchArray($result)) {
                $table = $country['Table'];
                $sql = "SELECT *, concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($geo['results'][0]['geometry']['location']['lat']) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($geo['results'][0]['geometry']['location']['lat']) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $geo['results'][0]['geometry']['location']['lng'] . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as `Distance`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $country['Table'] . "` WHERE `RegionName` LIKE '%$suburb%' ORDER BY `Distance`";
                $resultb = $GLOBALS['APIDB']->queryF($sql);
                $place = $GLOBALS['APIDB']->fetchArray($resultb);
                $address['CordID'] = $place['CordID'];
                $address['CountryID'] = $country['CountryID'];
                
                $types = array();
                foreach($geo['results'][0]['types'] as $tno => $type)
                {
                    $sql = "SELECT count(*) as `count` from `" . $GLOBALS['APIDB']->prefix($table . "_address_types") . "` WHERE `Type` LIKE '$type'";
                    list($count) = $GLOBALS['APIDB']->fetchRow( $GLOBALS['APIDB']->queryF($sql));
                    $sql = "SELECT * from `" . $GLOBALS['APIDB']->prefix($table . "_address_types") ."` WHERE `Type` LIKE '$type'";
                    $result = $GLOBALS['APIDB']->queryF($sql);
                    if ($count<1)
                    {
                        $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_address_types") . "` (`Type`,`Records`) VALUES('$type',0)";
                        if ($GLOBALS['APIDB']->queryF($sql))
                            $address['Types'][$type] = $GLOBALS['APIDB']->getInsertId();
                    } elseif ($typ = $GLOBALS['APIDB']->fetchArray($result)) {
                        $address['Types'][$type] = $typ['TypeID'];
                    }
                }
                $where = array();
                foreach(array_keys($address) as $field)
                    if (!empty($address[$field]))
                        if (is_string($address[$field]) && !is_numeric($address[$field]))
                            $where[$field] = "`$field` LIKE '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $address[$field]) . "'";
                        elseif (is_array($venue[$field]))
                            $where[$field] = "`$field` LIKE '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($address[$field])) . "'";
                        else
                            $where[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $address[$field]) . "'";
                $sql = "SELECT count(*) as `count` from `" . $GLOBALS['APIDB']->prefix($table . "_address") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->queryF($sql));
                $sql = "SELECT * from `" . $GLOBALS['APIDB']->prefix($table . "_address") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                $resultv = $GLOBALS['APIDB']->queryF($sql);
                if ($count==0)
                {
                    $insert = array();
                    foreach(array_keys($address) as $field)
                        if (!empty($address[$field]))
                            if (!is_array($address[$field]))
                                $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, $address[$field]);
                            else
                                $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($address[$field]));
                    $insert['created'] = time();
                    $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_address") . "` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
                    if ($GLOBALS['APIDB']->queryF($sql))
                        $address['AddressID'] = $GLOBALS['APIDB']->getInsertId();
                    else
                        die("SQL Failed: $sql;");
                } elseif ($add = $GLOBALS['APIDB']->fetchArray($result)) {
                    $address['AddressID'] = $add['AddressID'];
                }
                $sql = "DELETE FROM `" . $GLOBALS['APIDB']->prefix($table . "_address_types_links") . "` WHERE `AddressID` = '" . $address['AddressID'] . "'";
                @$GLOBALS['APIDB']->queryF($sql);
                foreach($venue['Types'] as $type => $typeid)
                {
                    $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_address_types_links") . "` (`TypeID`, `AddressID`) VALUES('$typeid', '" . $address['AddressID'] . "')";
                    if (!$GLOBALS['APIDB']->queryF($sql))
                        die("SQL Failed: $sql;");
                }
                $address['key'] = $address['CountryID'] . ":" . md5($table . "_address" . $address['AddressID'] . $address['CordID'] . $address['CountryID']);               
            }        
            return array('latitude' => $geo['results'][0]['geometry']['location']['lat'], 'longitude' => $geo['results'][0]['geometry']['location']['lng'], 'GoogleID' => $geo['results'][0]['place_id'], 'address' => $address, 'place' => $place, 'country' => $country);
        }
        return false;
        
    }
}


if (!function_exists("findAddressVenues")) {
    
    /* function findKey()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function findAddressVenues($address = '', $type = 'towns', $radius = 0, $format = 'json')
    {
        
        $geo = getAddressGeoMapping($address);    
        if ($type=='')
        {
            $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($address);
            $lat_long = $geo['latitude'] . ',' . $geo['longitude'];
            $script = array();
            $script['header']['meta']['uri'] = 'http://maps.googleapis.com/maps/api/js?sensor=false';
            $script['header']['html'] = htmlspecialchars('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
            $script['public']['html'] = htmlspecialchars('<div id="map_canvas"></div>');
            $script['footer']['html'] = htmlspecialchars("<script>
(function() {
function initialize() {
	var myLatlng = new google.maps.LatLng(".$lat_long."),
	mapOptions = {
		zoom: 15,
		center: myLatlng
	},
	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
	marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: '".$address."'
	});
}
google.maps.event.addDomListener(window, 'load', initialize);
})();
</script>");
            $script['functions']['html']['encoded'] = 'htmlspecialchars';
            $script['functions']['html']['decoded'] = 'htmlspecialchars_decode';
            return array("mapping" => $script);
        }
        
        $ret = findNearby($geo['latitude'], $geo['longitude'], $radius, $format);
        
        if (empty($ret['results']['places']))
            return array();

        $results = array();
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'google' . DIRECTORY_SEPARATOR . 'places.php';
        $places = new GoogleAPI(API_GOOGLE_KEY);
        if ($radius>0 && $type == 'all')
        {
            $places->location = array($geo['latitude'], $geo['longitude']);
            $places->radius   = $radius * 1000;
            if (!$results[]   = $places->nearbySearch())
                $found = $results = false;
            else
                $found = true;
        } elseif ($radius > 0 && !empty($type)) {
            $places->location = array($geo['latitude'], $geo['longitude']);
            $places->rankby   = 'distance';
            $places->radius   = $radius * 1000;
            $places->types    = $type; // Requires keyword, name or types
            if (!$results[]   = $places->nearbySearch())
                $found = $results = false;
            else
                $found = true;
        } elseif ($radius == 0 && !empty($type)) {
            $places->location = array($geo['latitude'], $geo['longitude']);
            $places->rankby   = 'distance';
            $places->types    = $type; // Requires keyword, name or types
            if (!$results[]   = $places->nearbySearch())
                $found = $results = false;
            else
                $found = true;
        } elseif ($radius > 0 && empty($type)) {
            $places->location = array($geo['latitude'], $geo['longitude']);
            $places->rankby   = 'distance';
            $places->radius   = $radius * 1000;
            if (!$results[]   = $places->nearbySearch())
                $found = $results = false;
            else
                $found = true;
        }
        if (count($results)>0)
            while (!empty($results[count($results)-1]['next_page_token']) && count($results) <= API_GOOGLE_PAGES_RESULTS)
            {
                $places->pagetoken = $results[count($results)-1]['next_page_token'];
                $results[]         = $places->nearbySearch();
            }
        if ($found == true)
        {
            $keyc = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
            if ($format!='xml')
                $ret['venues'] = getVenueResults($results, $geo['place']['key'], $format);
            else
                $ret['venues'] = getVenueResults($results, $geo['place']['key'], $format);
        }
        return $ret;
    }
}


if (!function_exists("findKeyDetails")) {
    
    /* function getArrayDetails()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function findKeyDetails($key = '', $format = 'json')
    {
  
        
        if ( strpos($key, ":") > 0 )
        {
            $countryid = substr($key, 0, strpos($key, ":") );
            $key = substr($key, strpos($key, ":") + 1);
        } else
            $countryid = false;
        
        $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE '" . places_oldhash($key, 'countries') . "' LIKE concat('%', md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)), '%') GROUP BY `CountryID` ORDER BY RAND() ";
        if ($result = $GLOBALS['APIDB']->queryF($sql)) {
            if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                $table = $country['Table'];
            }
        }
        if (!isset($table) && !empty($countryid) && $countryid != false)
        {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '".$countryid."' GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                    $table = $country['Table'];
                }
            }
        }
       
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address` FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                        $table = $cntry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $ctry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        }
        
        if ((empty($place['GoogleID']) || $place['GoogleID']=='0') && !empty($place['Address']))
        {
            $geo = json_decode(getURIData($url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($place['Address']) . "&sensor=false"), true);
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
                
                $sql = "UPDATE `" . $country['Table'] . "` SET `Updates` = `Updates` + 1, `Postcode` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $postcode) . "',  `State` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $state) . "', `GoogleID` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, ($place['GoogleID'] = $geo['results'][0]['place_id'])) . "', `Action` = UNIX_TIMESTAMP() WHERE `CordID` = '" . $place['CordID'] . "' AND `CountryID` = '" . $place['CountryID'] . "'";
                if (!$GLOBALS["DebauchDB"]->query($sql))
                    die("SQL Failed: $sql;");
            }
        }
        
        $ret = array();
        $ret['countries'][$table] = strippedArray($country, explode('|',API_COUNTRY_FIELDS));
        $ret['places'][$table] = strippedArray($place, explode('|',API_PLACE_FIELDS));
        $ret['details']['places'][$table] = getArrayDetails($place['GoogleID'], $table);
        if (isset($venue) && !empty($venue))
        {
            $ret['venues'][$table] = strippedArray($venue, explode('|',API_VENUE_FIELDS));
            $ret['details']['venues'][$table] = getArrayDetails($venue['GoogleID'], $table);
        }
        if (isset($address) && !empty($address))
        {
            $ret['addresses'][$table] = strippedArray($address, explode('|',API_ADDRESS_FIELDS));
            $ret['details']['addresses'][$table] = getArrayDetails($address['GoogleID'], $table);
        }
        return $ret;
    }
}

if (!function_exists("getArrayDetails")) {
    
    /* function getArrayDetails()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function getArrayDetails($googleid = '', $table = '', $format = 'json')
    {
        $sql = "SELECT count(*) as `count` FROM `".$table."_details` WHERE `Key` LIKE '$googleid'";
        list($count) = $GLOBALS['APIDB']->fetchRow( $GLOBALS['APIDB']->queryF($sql));
        $sql = "SELECT *, DECOMPRESS(`data`) as `json` from `" . $GLOBALS['APIDB']->prefix($table . "_details") . "` WHERE `Key` LIKE '$googleid'";
        $result = $GLOBALS['APIDB']->queryF($sql);
        if ($count<1)
        {
            $data = json_decode(getURIData("https://maps.googleapis.com/maps/api/place/details/json?" . (!empty($googleid)?"placeid=".$googleid."&":"") . (!empty($reference)?"reference=".$reference."&":"") . "key=". API_GOOGLE_KEY), true);
            $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_details") . "` (`Key`,`data`,`retrieve`,`updating`) VALUES('$googleid',COMPRESS('".mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($data)) . "'), UNIX_TIMESTAMP(), UNIX_TIMESTAMP() + (3600 * 24 * 7 * 4 * ".mt_rand(7,11) . "))";
            if (!$GLOBALS['APIDB']->queryF($sql))
                die("SQL Failed: $sql;");
            return $data;
        } elseif ($details = $GLOBALS['APIDB']->fetchArray($result)) {
            return json_decode($details['json'], true);
        }
    }
}

if (!function_exists("findKeyVenues")) {
    
    /* function findKey()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function findKeyVenues($key = '', $type = 'towns', $radius = 0, $format = 'json')
    {
        
        $ret = findKey($key, $radius, $format);
        
        if (empty($ret['results']['places']))
            return array();
        
        foreach($ret['results']['places'] as $table => $values)
        {
            foreach($values as $keyb => $place) {
            
                $results = array();
                require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'google' . DIRECTORY_SEPARATOR . 'places.php';
                $places = new GoogleAPI(API_GOOGLE_KEY);
                if ($radius>0 && $type == 'all')
                {
                    $places->location = array($place['Latitude_Float'], $place['Longitude_Float']);
                    $places->radius   = $radius * 1000;
                    if (!$results[]   = $places->nearbySearch())
                        $found = $results = false;
                    else 
                        $found = true;
                } elseif ($radius > 0 && !empty($type)) {
                    $places->location = array($place['Latitude_Float'], $place['Longitude_Float']);
                    $places->rankby   = 'distance';
                    $places->radius   = $radius * 1000;
                    $places->types    = $type; // Requires keyword, name or types
                    if (!$results[]   = $places->nearbySearch())
                        $found = $results = false;
                    else
                        $found = true;
                } elseif ($radius == 0 && !empty($type)) {
                    $places->location = array($place['Latitude_Float'], $place['Longitude_Float']);
                    $places->rankby   = 'distance';
                    $places->types    = $type; // Requires keyword, name or types
                    if (!$results[]   = $places->nearbySearch())
                        $found = $results = false;
                    else
                        $found = true;
                } elseif ($radius > 0 && empty($type)) {
                    $places->location = array($place['Latitude_Float'], $place['Longitude_Float']);
                    $places->rankby   = 'distance';
                    $places->radius   = $radius * 1000;
                    if (!$results[]   = $places->nearbySearch())
                        $found = $results = false;
                    else
                        $found = true;
                }
                if (count($results)>0)
                    while (!empty($results[count($results)-1]['next_page_token']) && count($results) <= API_GOOGLE_PAGES_RESULTS)
                    {
                        $places->pagetoken = $results[count($results)-1]['next_page_token'];
                        $results[]         = $places->nearbySearch();
                    }
                if ($found == true)
                {
                    $keyc = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                    if ($format!='xml')
                        $ret['venues'][$table][$place['key']] = getVenueResults($results, $key, $format);
                    else 
                        $ret['venues'][$table][$keyc] = getVenueResults($results, $key, $format);
                }
            }
        }
        return $ret;
    }
}

if (!function_exists("getVenueResults")) {
    
    /* function getVenueResults()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$results		array
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function getVenueResults($results = array(), $key = '', $format = 'json')
    {
        $ret = $venues = array();
        
        $GLOBALS['APIDB']->queryF("START TRANSACTION");
        
        if ( strpos($key, ":") > 0 )
        {
            $countryid = substr($key, 0, strpos($key, ":") );
            $key = substr($key, strpos($key, ":") + 1);
        } else
            $countryid = false;
            
        $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE '" . places_oldhash($key, 'countries') . "' LIKE concat('%', md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)), '%') GROUP BY `CountryID` ORDER BY RAND() ";
        if ($result = $GLOBALS['APIDB']->queryF($sql)) {
            if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                $table = $country['Table'];
            }
        }
        if (!isset($table) && !empty($countryid) && $countryid != false)
        {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '".$countryid."' GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                if($country = $GLOBALS['APIDB']->fetchArray($result)) {
                    $table = $country['Table'];
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address` FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                    $table = $cntry['Table'];
                    $found = true;
                    if (!isset($country))
                        $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "')),'%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $place = $GLOBALS['APIDB']->fetchArray($resultb);
                    $table = $cntry['Table'];
                    $found=true;
                    if (!isset($country))
                        $country = $cntry;
                    }
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $ctry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $venue = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $venue['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        }
        
        if (empty($countryid) && $countryid == false && $found==false) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` GROUP BY `CountryID` ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($country['CountryID'])?$country['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $cntry['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`RegionName`, '".$cntry['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found = true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        } elseif ($found==false && !empty($countryid)) {
            $sql = "SELECT *, md5(concat(`Country`, `Capital`, `Continent`, `CurrencyCode`)) as `key` FROM `" . $GLOBALS['APIDB']->prefix('countries') . "` WHERE `CountryID` = '$countryid' ORDER BY RAND() ";
            if ($result = $GLOBALS['APIDB']->queryF($sql)) {
                while(($cntry = $GLOBALS['APIDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, concat('" . !empty($cntry['CountryID'])?$cntry['CountryID'].":":"" . "', md5(concat(`Name`, `Vicinity`))) as `key` FROM `" . $cntry['Table'] . "_venues` WHERE '" . places_oldhash($key, $cntry['Table']) . "' LIKE concat('%', md5(concat(`Name`, `Vicinity`)), '%') ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['APIDB']->queryF($sql)) {
                        $address = $GLOBALS['APIDB']->fetchArray($resultb);
                        $sql = "SELECT *,  concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $cntry['Country'] . "'))) as `key`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $cntry['Table'] . "` WHERE `CordID` = '" . $address['CordID']. "'";
                        if ($resultc = $GLOBALS['APIDB']->queryF($sql))
                            $place = $GLOBALS['APIDB']->fetchArray($resultc);
                        $table = $cntry['Table'];
                        $found=true;
                        if (!isset($country))
                            $country = $cntry;
                    }
                }
            }
        }
                
        foreach($results as $page => $pageresults) 
            foreach ($pageresults['results'] as $id => $values)
            {
                if (!in_array('locality', $values['types']) && !empty($table))
                {
                    $types = array();
                    foreach($values['types'] as $tno => $type)
                    {
                        $sql = "SELECT count(*) as `count` from `" . $GLOBALS['APIDB']->prefix($table . "_venues_types") . "` WHERE `Type` LIKE '$type'";
                        list($count) = $GLOBALS['APIDB']->fetchRow( $GLOBALS['APIDB']->queryF($sql));
                        $sql = "SELECT * from `" . $GLOBALS['APIDB']->prefix($table . "_venues_types") . "` WHERE `Type` LIKE '$type'";
                        $result = $GLOBALS['APIDB']->queryF($sql);
                        if ($count<1)
                        {
                            $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_venues_types") . "` (`Type`,`Records`) VALUES('$type',0)";
                            if ($GLOBALS['APIDB']->queryF($sql))
                                $types[$type] = $GLOBALS['APIDB']->getInsertId();
                        } elseif ($typ = $GLOBALS['APIDB']->fetchArray($result)) {
                            $types[$type] = $typ['TypeID'];
                        }
                    }
                    $venue = array();
                    $venue['CordID'] = $place['CordID'];
                    $venue['CountryID'] = $countryid;
                    $venue['Types'] = $types;
                    $venue['Name'] = $values['name'];
                    $venue['Icon'] = $values['icon'];
                    $venue['Id'] = $values['id'];
                    $venue['Reference'] = $values['reference'];
                    $venue['GoogleID'] = $values['place_id'];
                    $venue['Longitude'] = $values['geometry']['location']['lng'];
                    $venue['Latitude'] = $values['geometry']['location']['lat'];
                    $venue['View_NE_Longitude'] = $values['geometry']['viewport']['northeast']['lng'];
                    $venue['View_NE_Latitude'] = $values['geometry']['viewport']['northeast']['lat'];
                    $venue['View_SW_Longitude'] = $values['geometry']['viewport']['southwest']['lng'];
                    $venue['View_SW_Latitude'] = $values['geometry']['viewport']['southwest']['lat'];
                    $venue['Vicinity'] = $values['vicinity'];
                    $where = array();
                    foreach(array_keys($venue) as $field)
                        if (!empty($venue[$field]))
                            if (is_string($venue[$field]) && !is_numeric($venue[$field]))
                                $where[$field] = "`$field` LIKE '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $venue[$field]) . "'";
                            elseif (is_array($venue[$field]))
                                $where[$field] = "`$field` LIKE '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($venue[$field])) . "'";
                            else 
                                $where[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $venue[$field]) . "'";
                    $sql = "SELECT count(*) as `count` from `" . $GLOBALS['APIDB']->prefix($table . "_venues") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                    list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->queryF($sql));
                    $sql = "SELECT * from `" . $GLOBALS['APIDB']->prefix($table . "_venues") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                    $resultv = $GLOBALS['APIDB']->queryF($sql);
                    if ($count==0)
                    {
                        $insert = array();
                        foreach(array_keys($venue) as $field)
                          if (!empty($venue[$field]))
                              if (!is_array($venue[$field]))
                                    $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, $venue[$field]);
                              else 
                                    $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($venue[$field]));    
                        $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_venues") . "` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
                        if ($GLOBALS['APIDB']->queryF($sql))
                            $venue['VenueID'] = $GLOBALS['APIDB']->getInsertId();
                        else 
                            die("SQL Failed: $sql;");
                    } elseif ($ven = $GLOBALS['APIDB']->fetchArray($result)) {
                        $venue['VenueID'] = $ven['VenueID'];
                    }
                    $venue['key'] = (!empty($venue['CountryID'])?$venue['CountryID'].":":"") . md5($venue['Name'].$venue['Vicinity']);
                    $venue['photos'] = array();
                    if (!empty($values['photos']) && !empty($venue['VenueID']))
                    {
                        foreach($values['photos'] as $idp => $image)
                        {
                            $photo = array();
                            
                            $photo['Height'] = $image['height'];
                            $photo['Width'] = $image['width'];
                            $photo['Reference'] = $image['photo_reference'];
                            $where = array();
                            foreach(array_keys($photo) as $field)
                                if (!empty($photo[$field]))
                                    if (is_string($photo[$field]) && !is_numeric($photo[$field]))
                                        $where[$field] = "`$field` LIKE " . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $photo[$field]);
                                    elseif (is_array($photo[$field]))
                                        $where[$field] = "`$field` LIKE " . mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($photo[$field]));
                                    else
                                        $where[$field] = "`$field` = " . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $photo[$field]);
                            $photo['VenueID'] = $venue['VenueID'];
                            $photo['HTML'] = $image['html_attributions'];
                            $sql = "SELECT count(*) from `" . $GLOBALS['APIDB']->prefix($table . "_venues_photos") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                            list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->queryF($sql));
                            $sql = "SELECT * from `" . $GLOBALS['APIDB']->prefix($table . "_venues_photos") . "`" . (count($where)>0?" WHERE " .  implode(" AND ", $where):'');
                            $resultp = $GLOBALS['APIDB']->queryF($sql);
                            if ($count==0)
                            {
                                $insert = array();
                                foreach(array_keys($photo) as $field)
                                    if (!empty($photo[$field]))
                                        if (!is_array($photo[$field]))
                                            $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, $photo[$field]);
                                        else
                                            $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($photo[$field]));
                                $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_venues_photos") . "` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
                                if ($GLOBALS['APIDB']->queryF($sql))
                                    $photo['PhotoID'] = $GLOBALS['APIDB']->getInsertId();
                                else
                                    die("SQL Failed: $sql;");
                            } elseif ($pht = $GLOBALS['APIDB']->fetchArray($resultp)) {
                                $photo['PhotoID'] = $pht['PhotoID'];
                            }
                            $venue['photos'][$idp] = $photo;
                        }
                    }
                    $sql = "DELETE FROM `" . $GLOBALS['APIDB']->prefix($table . "_venues_types_links") . "` WHERE `VenueID` = '" . $venue['VenueID'] . "'";
                    @$GLOBALS['APIDB']->queryF($sql);
                    foreach($venue['Types'] as $type => $typeid)
                    {
                        $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix($table . "_venues_types_links"). "` (`TypeID`, `VenueID`) VALUES('$typeid', '" . $venue['VenueID'] . "')";
                        if (!$GLOBALS['APIDB']->queryF($sql))
                            die("SQL Failed: $sql;");
                    }
                    $ret[places_sef($venue['Name'])] = strippedArray($venue, explode('|',API_VENUE_FIELDS));
                  
                } elseif (isset($values['name']) && !empty($values['name'])) {
                    $sql = "SELECT count(*) FROM `" . $GLOBALS['APIDB']->prefix($table) . "` WHERE `RegionName` LIKE '".getLikedWildcard($values['name'])."'";
                    list($count) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->queryF($sql));
                    $sql = "SELECT *, concat(`RegionName`, '" . $country['Country'] . "') as `Address`, concat(`CountryID`, ':', md5(concat(`Longitude_Float`, `Latitude_Float`, `RegionName`, '" . $country['Country'] . "'))) as `key`, concat(`CountryID`, ':', md5(concat(`CountryID`, `CordID`))) as `retired-key`, concat(`RegionName`, '".$country['Country']."') as `Address`  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` WHERE `RegionName` LIKE '".getLikedWildcard($values['name'])."'";
                    $resultr = $GLOBALS['APIDB']->queryF($sql);
                    if ($count!=0)
                    {
                        while($region = $GLOBALS['APIDB']->fetchArray($resultr))
                        {
                            if (number_format($region['Latitude_Float'],3)==number_format($values['geometry']['location']['lat'],3) && number_format($region['Longitude_Float'],3)==number_format($values['geometry']['location']['lng'],3))
                            {
                                $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (`retired`, `current`, `created`) VALUES ('" . $region['retired-key'] . "', concat(`CountryID`, ':', md5(concat('" . $values['name'] . "', '" . $country['Country'] . "')))as `retired`, $current as `current`, UNIX_TIMESTAMP() FROM `" . $GLOBALS['APIDB']->prefix($table.$add) . " ` WHERE `retired` IN ('" . implode("','", $keys) . "') ORDER BY `retired`";
                                if (!$GLOBALS['APIDB']->query($sql))
                                    die("SQL Failed: $sql;");
                                
                                if ($region['RegionName'] != $values['name'])
                                {
                                    $sql = "INSERT INTO `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` (`retired`, `current`, `created`) VALUES ('" . $region['key'] . "', concat(`CountryID`, ':', md5(concat('" . $values['name'] . "', '" . $country['Country'] . "')))as `retired`, $current as `current`, UNIX_TIMESTAMP() FROM `" . $GLOBALS['APIDB']->prefix($table.$add) . " ` WHERE `retired` IN ('" . implode("','", $keys) . "') ORDER BY `retired`";
                                    if (!$GLOBALS['APIDB']->query($sql))
                                        die("SQL Failed: $sql;");        
                                }
                                $region['RegionName'] = $values['name'];
                                $region['GoogleID'] = $values['place_id'];
                                $region['Longitude_Float'] = $values['geometry']['location']['lng'];
                                $region['Latitude_Float'] = $values['geometry']['location']['lat'];
                                $region['mapref_longitude'] = floor(abs($values['geometry']['location']['lng'])) . ($values['geometry']['location']['lng'] > 0? "E":"W");
                                $region['mapref_latitude'] = floor(abs($values['geometry']['location']['lat'])) . ($values['geometry']['location']['lat'] > 0? "N":"S");
                                
                                $update = array();
                                foreach(array_keys($region) as $field)
                                    if (!empty($region[$field]))
                                        if (!is_array($region[$field]))
                                            $update[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $region[$field]) . "'";
                                        else
                                            $update[$field] = "`$field` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($region[$field])) . "'";
                                $sql = "UPDATE `$table` SET " . implode(', ', $update) . " WHERE `CordID` = '" . mysqli_real_escape_string($GLOBALS['APIDB']->conn, $region['CordID']) . "'";
                                if (!$GLOBALS['APIDB']->queryF($sql))
                                    die("SQL Failed: $sql;");
                            }
                        }
                    } else {
                        $sql = "SELECT MAX(`CordID`) + 1 as CordID  FROM `" . $GLOBALS['APIDB']->prefix($table) . "` GROUP BY `CountryID`";
                        list($cordid) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->queryF($sql));
                        
                        $region = array();
                        $region['CordID'] = $cordid;
                        $region['CountryID'] = $countryid;
                        $region['RegionName'] = $values['name'];
                        $region['GoogleID'] = $values['place_id'];
                        $region['Longitude_Float'] = $values['geometry']['location']['lng'];
                        $region['Latitude_Float'] = $values['geometry']['location']['lat'];
                        $region['mapref_longitude'] = floor(abs($values['geometry']['location']['lng'])) . ($values['geometry']['location']['lng'] > 0? "E":"W");
                        $region['mapref_latitude'] = floor(abs($values['geometry']['location']['lat'])) . ($values['geometry']['location']['lat'] > 0? "N":"S");
                        
                        $insert = array();
                        foreach(array_keys($region) as $field)
                            if (!empty($region[$field]))
                                if (!is_array($region[$field]))
                                    $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, $region[$field]);
                                else
                                    $insert[$field] = mysqli_real_escape_string($GLOBALS['APIDB']->conn, json_encode($region[$field]));
                   
                        $sql = "INSERT INTO `$table` (`" . implode('`, `', array_keys($insert)) . "`) VALUES('" . implode("', '", $insert) . "')";
                        if (!$GLOBALS['APIDB']->queryF($sql))
                            die("SQL Failed: $sql;");
                    }
            }
        }
        $GLOBALS['APIDB']->queryF("COMMIT");
        return $ret;
    }
}

if (!function_exists('places_oldhash'))
{
    
    /**
     * Xoops safe encoded url elements
     *
     * @param unknown $datab
     * @param string $char
     * @return string
     */
    function places_oldhash($hash = '', $table = '')
    {    
        $sql = "SELECT `current` FROM `" . $GLOBALS['APIDB']->prefix("$table_oldhashs") . "` WHERE `retired` LIKE '%%s%' ORDER BY `created` DESC LIMIT 1";
        $qthash = $hash;
        while (list($current) = $GLOBALS['APIDB']->fetchRow($GLOBALS['APIDB']->query(sprintf($sql, $qthash))))
        {
            if (!empty($current))
                $qthash = $current;
            else
                continue;
        }
        return (empty($qthash)?$hash:$qthash);
    }
}

if (!function_exists('places_sef'))
{
    
    /**
     * Xoops safe encoded url elements
     *
     * @param unknown $datab
     * @param string $char
     * @return string
     */
    function places_sef($datab, $char ='-')
    {
        $replacement_chars = array();
        $accepted = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","m","o","p","q",
            "r","s","t","u","v","w","x","y","z","0","9","8","7","6","5","4","3","2","1");
        for($i=0;$i<256;$i++){
            if (!in_array(strtolower(chr($i)),$accepted))
                $replacement_chars[] = chr($i);
        }
        $return_data = (str_replace($replacement_chars,$char,$datab));
        while(substr($return_data, 0, 1) == $char)
            $return_data = substr($return_data, 1, strlen($return_data)-1);
            while(substr($return_data, strlen($return_data)-1, 1) == $char)
                $return_data = substr($return_data, 0, strlen($return_data)-1);
                while(strpos($return_data, $char . $char))
                    $return_data = str_replace($char . $char, $char, $return_data);
                    return(strtolower($return_data));
    }
}

if (!function_exists("getLikedWildcard")) {
    
    /* function getLikedWildcard()
     *
     *
     * @param		$result			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$wildcard		string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		string
     */
    function getLikedWildcard($result = '', $wildcard = '_')
    {
        if (strpos($result, '-'))
            $result = substr($result, 0, strpos($result, '-')-1). '%';
        if (strpos($result, ','))
            $result = substr($result, 0, strpos($result, ',')-1). '%';
        $replacement_chars = array();
        $accepted = array("%", "_", "a","b","c","d","e","f","g","h","i","j","k","l","m","n","m","o","p","q",
            "r","s","t","u","v","w","x","y","z","0","9","8","7","6","5","4","3","2","1");
        for($i=0;$i<256;$i++){
            if (!in_array(strtolower(chr($i)),$accepted))
                $replacement_chars[] = chr($i);
        }
        return str_replace($replacement_chars, $wildcard, $result);
    }
}


if (!function_exists("findKeyMaps")) {
    
    /* function findKey()
     *
     * 	Function that reverse lookups a forensic identifier MD6 of country or region and return one or more locations
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @param		$key			string		the MD5 32 Character Checksum for the place or country to lookup
     * @param		$radius			integer		Radius that the search bounded by in kilometers (integer only)
     * @param		$format			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
     *
     * @return 		array
     */
    function findKeyMaps($key = '', $radius = 0, $address = '', $format = 'json')
    {
        
        $ret = findKey($key, $radius, $format);
        
        if (empty($ret['results']['places']))
            return array();
        
        $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($ret['address']);
        $lat_long = $ret['latitude'] . ',' . $ret['longitude'];
        $script = array();
        $script['header']['meta']['uri'] = 'http://maps.googleapis.com/maps/api/js?sensor=false';
        $script['header']['html'] = htmlspecialchars('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
        $script['public']['html'] = htmlspecialchars('<div id="map_canvas"></div>');
        $script['footer']['html'] = htmlspecialchars("<script>
(function() { 
function initialize() {
	var myLatlng = new google.maps.LatLng(".$lat_long."),
	mapOptions = {
		zoom: 15,
		center: myLatlng
	},
	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
	marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: '".$place['address']."'
	});
}
google.maps.event.addDomListener(window, 'load', initialize);
})();
</script>");
        $script['functions']['html']['encoded'] = 'htmlspecialchars';
        $script['functions']['html']['decoded'] = 'htmlspecialchars_decode';
        $ret['mapping'] = $script;
        return $ret;
    }
}


if (!class_exists("XmlDomConstruct")) {
	/**
	 * class XmlDomConstruct
	 *
	 * 	Extends the DOMDocument to implement personal (utility) methods.
	 *
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 */
	class XmlDomConstruct extends DOMDocument {

		/**
		 * Constructs elements and texts from an array or string.
		 * The array can contain an element's name in the index part
		 * and an element's text in the value part.
		 *
		 * It can also creates an xml with the same element tagName on the same
		 * level.
		 *
		 * ex:
		 * <nodes>
		 *   <node>text</node>
		 *   <node>
		 *     <field>hello</field>
		 *     <field>world</field>
		 *   </node>
		 * </nodes>
		 *
		 * Array should then look like:
		 *
		 * Array (
		 *   "nodes" => Array (
		 *     "node" => Array (
		 *       0 => "text"
		 *       1 => Array (
		 *         "field" => Array (
		 *           0 => "hello"
		 *           1 => "world"
		 *         )
		 *       )
		 *     )
		 *   )
		 * )
		 *
		 * @param mixed $mixed An array or string.
		 *
		 * @param DOMElement[optional] $domElement Then element
		 * from where the array will be construct to.
		 *
		 * @author 		Simon Roberts (Chronolabs) simon@snails.email
		 *
		 */
		public function fromMixed($mixed, DOMElement $domElement = null) {

			$domElement = is_null($domElement) ? $this : $domElement;

			if (is_array($mixed)) {
				foreach( $mixed as $index => $mixedElement ) {

					if ( is_int($index) ) {
						if ( $index == 0 ) {
							$node = $domElement;
						} else {
							$node = $this->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					}

					else {
						$node = $this->createElement($index);
						$domElement->appendChild($node);
					}

					$this->fromMixed($mixedElement, $node);

				}
			} else {
				$domElement->appendChild($this->createTextNode($mixed));
			}

		}
			
	}
}




if (!function_exists("strippedArray")) {
    
    /* function getDomainSupportism()
     *
     * 	Get a supporting domain system for the API
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		string
     */
    function strippedArray($array = array(), $fields = array())
    {
        foreach($array as $field => $values)
            if (!in_array($field, $fields))
                unset($array[$field]);
        return $array;
    }
}
    
if (!function_exists("getDomainSupportism")) {
    
    /* function getDomainSupportism()
     *
     * 	Get a supporting domain system for the API
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		string
     */
    function getDomainSupportism($variable = 'array', $realm = '')
    {
        static $ret = array();
        if (empty($ret))
        {
            $supporters = file(API_FILE_IO_DOMAINS);
            foreach($supporters as $supporter)
            {
                $parts = explode("||", $supporter);
                if (strpos(' '.strtolower($realm), strtolower($parts[0]))>0)
                {
                    $ret['domain'] = $parts[0];
                    $ret['protocol'] = $parts[1];
                    $ret['business'] = $parts[2];
                    $ret['entity'] = $parts[3];
                    $ret['contact'] = $parts[4];
                    $ret['referee'] = $parts[5];
                    continue;
                }
            }
        }
        if (isset($ret[$variable]))
            return $ret[$variable];
            return $ret;
    }
}

if (!function_exists("getURIData")) {
    
    /* function getURIData()
     *
     * 	Get a supporting domain system for the API
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		float()
     */
    function getURIData($uri = '', $timeout = 25, $connectout = 25)
    {
        if (!function_exists("curl_init"))
        {
            return file_get_contents($uri);
        }
        if (!$btt = curl_init($uri)) {
            return false;
        }
        curl_setopt($btt, CURLOPT_HEADER, 0);
        curl_setopt($btt, CURLOPT_POST, 0);
        curl_setopt($btt, CURLOPT_CONNECTTIMEOUT, $connectout);
        curl_setopt($btt, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($btt, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($btt, CURLOPT_VERBOSE, false);
        curl_setopt($btt, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($btt, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($btt);
        curl_close($btt);
        return $data;
    }
}


if (!function_exists("getPeersSupporting")) {
    
    /* function getPeersSupporting()
     *
     * 	Get a supporting domain system for the API
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		array()
     */
    function getPeersSupporting()
    {
        if (filectime(API_FILE_IO_PEERS) + 3600 * 24 * 3.75 <= time())
        {
            if (getPingTiming("http://peers.snails.email/v2/" . basename(__DIR__) . "/json.api")>1
                && $peerise = json_decode(getURIData("http://peers.snails.email/v2/" . basename(__DIR__) . "/json.api"), true))
            {
                $ioout = array();
                foreach($peerise as $ll => $values)
                    $ioout[] = implode("||", $values);
                    if (count($ioout)>1)
                        writeRawFile(API_FILE_IO_PEERS, implode("\n", $ioout));
            }
        }
        static $ret = array();
        if (empty($ret))
        {
            $peerings = file(API_FILE_IO_PEERS);
            foreach($peerings as $peer)
            {
                $parts = explode("||", $peer);
                $realm = $parts[0];
                $ret[$realm]['domain'] = $parts[0];
                $ret[$realm]['protocol'] = $parts[1];
                $ret[$realm]['business'] = $parts[2];
                $ret[$realm]['search'] = $parts[3];
                $ret[$realm]['mirror'] = $parts[4];
                $ret[$realm]['contact'] = $parts[5];
                $ret[$realm]['ping'] = getPingTiming($parts[1].$parts[0]);
            }
        }
        return $ret;
    }
}


if (!function_exists("writeRawFile")) {
    /**
     *
     * @param string $file
     * @param string $data
     */
    function writeRawFile($file = '', $data = '')
    {
        $lineBreak = "\n";
        if (substr(PHP_OS, 0, 3) == 'WIN') {
            $lineBreak = "\r\n";
        }
        if (!is_dir(dirname($file)))
            mkdir(dirname($file), 0777, true);
            if (is_file($file))
                unlink($file);
                $data = str_replace("\n", $lineBreak, $data);
                $ff = fopen($file, 'w');
                fwrite($ff, $data, strlen($data));
                fclose($ff);
    }
}
?>
