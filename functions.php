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

if (!function_exists("randomPlacesKey")) {

	/* function randomPlacesKey()
	 *
	 * 	Get a random forensic identify key for a place from the database
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
	 *
	 * @return 		string(32)
	 */
	function randomPlacesKey()
	{
		$sql = "SELECT * FROM `countries` WHERE `Records` > 1000 ORDER BY RAND() LIMIT 1 ";
		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			$country = $GLOBALS['DebauchDB']->fetchArray($result);
			$sql = "SELECT * FROM `" . $country['Table'] . "` ORDER BY RAND() LIMIT 1 ";
			if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
				if ($place = $GLOBALS['DebauchDB']->fetchArray($result))
					return md5($place['CountryID'].$place['CordID']);
			}
			$ret = array();
		}
	}
}

if (!function_exists("randomGeoPlace")) {
    
    /* function randomPlacesKey()
     *
     * 	Get a random forensic identify key for a place from the database
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		string(32)
     */
    function randomGeoPlace()
    {
        $sql = "SELECT * FROM `countries` WHERE `Records` > 1000  ORDER BY RAND() LIMIT 1 ";
        if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
            $country = $GLOBALS['DebauchDB']->fetchArray($result);
            $sql = "SELECT * FROM `" . $country['Table'] . "` ORDER BY RAND() LIMIT 1 ";
            if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
                if ($place = $GLOBALS['DebauchDB']->fetchArray($result))
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
		$sql = "SELECT * FROM `countries` WHERE `Records` > 1000  ORDER BY RAND() LIMIT 1 ";
		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			$country = $GLOBALS['DebauchDB']->fetchArray($result);
			$sql = "SELECT * FROM `" . $country['Table'] . "` ORDER BY RAND() LIMIT 1 ";
			if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
				if ($place = $GLOBALS['DebauchDB']->fetchArray($result))
					return array('latitude'=>$place['Latitude_Float'], 'longitude' => $place['Longitude_Float']);
			}
			$ret = array('latitude'=> 0, 'longitude' => 0);
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
	function findPlace($country = '', $place = '', $format = 'json', $return = 1)
	{
	    if (empty($return) || $return < 1)
	        $return = 1;
	   
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
		while ($numberof != $return)
		{
		    $numberof++;
    		$sql = '';
    		$ret = array();
    		if (strlen($country)>3&&strtolower($country)!='list'&&strtolower($country)!='random') {
    			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `countries` WHERE lower(`Country`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1";
    			
    		} elseif (strlen($country)>3&&strtolower($country)=='random') {
    			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `countries` GROUP BY `CountryID` ORDER BY RAND() LIMIT 1";
    			
    		} elseif (strlen($country)>3&&strtolower($country)=='list') {
    			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
	
    		} elseif (strlen($country)==3)
    			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` WHERE lower(`ISO3`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1 ";
    		elseif (strlen($country)==2)
    			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` WHERE lower(`ISO2`) LIKE '".strtolower($country)."' GROUP BY `CountryID` ORDER BY RAND() LIMIT 1 ";
    		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			    while($cuntree = $GLOBALS['DebauchDB']->fetchArray($result)) {
			        $sql = "SELECT count(*) as records FROM `" . $cuntree['Table'] . "`";
			        if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
			            $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
			            $cuntree['records'] = $records['records'];
			        } else
			            $cuntree['records'] = 0 ;
		            $table = $cuntree['Table'];
		            unset($cuntree['CountryID']);
		            unset($cuntree['Table']);
		            if ($format!='xml')
		                $ret['countries'][$cuntree['key']]=$cuntree;
	                else
	                    $ret['countries'][$table]=$cuntree;
    		
        			if (strtolower($place)!='random') {
        			    $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`  FROM `" . $table . "` WHERE LOWER(`RegionName`) LIKE '" . strtolower($place) . "'  GROUP BY `CordID` ORDER BY RAND() LIMIT $return";
        			    $numberof = $return;
        			} elseif (strtolower($place) == 'random' && strtolower($country) == 'random')
        			    $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`  FROM `" . $table . "` GROUP BY `CordID` ORDER BY RAND() LIMIT 1";
        			elseif (strtolower($place) == 'random' && strtolower($country) != 'random') {
        			    $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`  FROM `" . $table . "` GROUP BY `CordID` ORDER BY RAND() LIMIT $return";
        			    $numberof = $return;
        			} else {
        			    $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`  FROM `" . $table . "` WHERE LOWER(`RegionName`) LIKE '%" . strtolower($place) . "%'  GROUP BY `CordID` ORDER BY RAND() LIMIT $return";
        			    $numberof = $return;
        			}
    				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
    					while ($region = $GLOBALS['DebauchDB']->fetchArray($resultb)) {
    					    unset($region['CountryID']);
    					    unset($region['CordID']);
    					    if (strpos($region['RegionName'], ',')) {
    					        $parts = explode(', ',$region['RegionName']);
    					        $region['RegionName'] = $parts[1] . ' ' . $parts[0];
    						}
    						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($region['RegionName']));
    						if ($format!='xml')
    						    $ret['places'][$country['key']][$region['key']]=$region;
    						else 
    						    $ret['places'][$table][$key]=$region;
    					}
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
		$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			while($country = $GLOBALS['DebauchDB']->fetchArray($result)) {
				$sql = "SELECT count(*) as records FROM `" . $table . "`";
				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
					$records = $GLOBALS['DebauchDB']->fetchArray($resultb);
					$country['records'] = $records['records'];
				} else
					$country['records'] = 0 ;
				$sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($latitude) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($latitude) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $longitude . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as distance FROM `" . $table . "` having `distance` <= ".$radius." ORDER BY `distance`";
				$table = $country['Table'];
				$ret['search']['countries']++;
				unset($resultb);
				unset($country['Table']);
				unset($country['CountryID']);
				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
					while ($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) {
					    if ($format!='xml')
						    $ret['results']['countries'][$country['key']] = $country;
					    else 
					        $ret['results']['countries'][$table] = $country;
						$place['key'] = md5($place['CountryID'].$place['CordID']);
						unset($place['CountryID']);
						unset($place['CordID']);
						if (strpos($place['RegionName'], ',')) {
							$parts = explode(', ',$place['RegionName']);
							$place['RegionName'] = $parts[1] . ' ' . $parts[0];
						}
						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
						if ($format!='xml')
						    $ret['results']['places'][$country['key']][$place['key']]=$place;
					    else
					        $ret['results']['places'][$table][$key]=$place;
						$ret['search']['places']++;
					}
				}
			}
		}
		$ret['search']['type'] = 'nearby';
		return $ret;
	}
}




if (!function_exists("findExacty")) {

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
	function findExacty($latitude = 0, $longitude = 0, $radius = 0, $format = 'json')
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
		$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key`  FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			while($country = $GLOBALS['DebauchDB']->fetchArray($result)) {
				$sql = "SELECT count(*) as records FROM `" . $table . "`";
				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
					$records = $GLOBALS['DebauchDB']->fetchArray($resultb);
					$country['records'] = $records['records'];
				} else
					$country['records'] = 0 ;
				$table = $country['Table'];
				$ret['search']['countries']++;
				$sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($latitude) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($latitude) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $longitude . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as distance FROM `" . $table . "` having `distance` <= ".$radius." ORDER BY `distance`";
				unset($resultb);
				unset($country['Table']);
				unset($country['CountryID']);
				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
					while ($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) {
					    if ($format!='xml')
					        $ret['results']['countries'][$country['key']] = $country;
				        else
				            $ret['results']['countries'][$table] = $country;
						unset($place['CountryID']);
						unset($place['CordID']);
						if (strpos($place['RegionName'], ',')) {
							$parts = explode(', ',$place['RegionName']);
							$place['RegionName'] = $parts[1] . ' ' . $parts[0];
						}
						$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
						if ($format!='xml')
						    $ret['results']['places'][$country['key']][$place['key']]=$place;
					    else
					        $ret['results']['places'][$table][$key]=$place;
					    $ret['search']['places']++;
					}
				}
			}
		}
		$ret['search']['type'] = 'nearby';
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
		$ret['search']['result']['count'] = 0;
		
		$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` WHERE md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) LIKE '".$key."' GROUP BY `CountryID` ORDER BY `Country` ASC ";
		if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
			if($country = $GLOBALS['DebauchDB']->fetchArray($result)) {
				$sql = "SELECT count(*) as records FROM `" . $table . "`";
				if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
					$records = $GLOBALS['DebauchDB']->fetchArray($resultb);
					$country['records'] = $records['records'];
				} else
					$country['records'] = 0;
				$table = $country['Table'];
				unset($country['Table']);
				unset($country['CountryID']);
				if ($format!='xml')
				    $ret['results']['countries'][$country['key']] = $country;
			    else
			        $ret['results']['countries'][$table] = $country;
				$ret['results']['places'] = array();
				$ret['results']['nearby'] = array();
				$ret['search']['result']['type'] = 'country';
				$ret['search']['result']['count'] = 1;
				$ret['search']['result']['nearby'] = 0;
				$found = true;
			}
		}
	
		if ($found==false) {
			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
			if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
				while(($country = $GLOBALS['DebauchDB']->fetchArray($result)) && $found == false) {
					$sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key` FROM `" . $table . "` WHERE md5(concat(`CountryID`, `CordID`)) LIKE '" . $key . "' ORDER BY RAND() LIMIT 1";
					if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
						while (($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) && $found == false) {
							$table = $country['Table'];
							$sql = "SELECT count(*) as records FROM `" . $table . "`";
							if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
								$records = $GLOBALS['DebauchDB']->fetchArray($resultb);
								$country['records'] = $records['records'];
							} else
								$country['records'] = 0 ;
							$table = $country['Table'];
							unset($country['Table']);
							unset($country['CountryID']);
							if ($format!='xml')
							    $ret['results']['countries'][$country['key']]=$country;
						    else
						        $ret['results']['countries'][$table]=$country;
							unset($place['CountryID']);
							unset($place['CordID']);
							if (strpos($place['RegionName'], ',')) {
								$parts = explode(', ',$place['RegionName']);
								$place['RegionName'] = $parts[1] . ' ' . $parts[0];
							}
							$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
							if ($format!='xml')
							    $ret['results']['places'][$country['key']][$place['key']]=$place;
						    else
						        $ret['results']['places'][$table][$key]=$place;
							$ret['results']['nearby'] = array();
							$ret['search']['result']['type'] = 'place';
							$ret['search']['result']['count'] = 1;
							$ret['search']['result']['nearby'] = 0;
							$found = true;
						}
					}	
				}
			}
		}
		
		if ($found = true && $radius > 0 && $ret['search']['result']['type'] = 'place' && (!empty($table) && !empty($ret['results']['place']['Longitude_Float']) && !empty($ret['results']['place']['Latitude_Float']))) {
			$sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
			if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
				while(($country = $GLOBALS['DebauchDB']->fetchArray($result)) && $found == true) {
					$sql = "SELECT count(*) as records FROM `" . $table . "`";
					if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
						$records = $GLOBALS['DebauchDB']->fetchArray($resultb);
						$country['records'] = $records['records'];
					} else
						$country['records'] = 0 ;
					$sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($ret['results']['place']['Latitude_Float']) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($ret['results']['place']['Latitude_Float']) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $ret['results']['place']['Longitude_Float'] . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as distance FROM `" . $table . "` having `distance` <= ".$radius." ORDER BY `distance`";
					$table = $country['Table'];
					unset($country['Table']);
					unset($country['CountryID']);
					if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
						while ($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) {
						    if ($format!='xml')
						        $ret['results']['nearby']['countries'][$country['key']]=$country;
						    else
						        $ret['results']['nearby']['countries'][$table]=$country;
							unset($place['CountryID']);
							unset($place['CordID']);
							if (strpos($place['RegionName'], ',')) {
								$parts = explode(', ',$place['RegionName']);
								$place['RegionName'] = $parts[1] . ' ' . $parts[0];
							}
							$key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
							if ($format!='xml')
							    $ret['results']['nearby']['places'][$country['key']][$place['key']]=$place;
						    else
						        $ret['results']['nearby']['places'][$table][$key]=$place;
						    $ret['search']['result']['count']++;
						}
					}
				}
			}
			if ($ret['search']['result']['nearby']>0)
				$ret['search']['result']['type'] = 'nearby';
		}
		return $ret;
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
    function findKeyVenues($type = 'towns', $key = '', $radius = 0, $format = 'json')
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
        $ret['search']['result']['count'] = 0;
        
        $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` WHERE md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) LIKE '".$key."' GROUP BY `CountryID` ORDER BY `Country` ASC ";
        if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
            if($country = $GLOBALS['DebauchDB']->fetchArray($result)) {
                $sql = "SELECT count(*) as records FROM `" . $table . "`";
                if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                    $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
                    $country['records'] = $records['records'];
                } else
                    return false;
            }
        }
        
        if ($found==false) {
            $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
            if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
                while(($country = $GLOBALS['DebauchDB']->fetchArray($result)) && $found == false) {
                    $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key` FROM `" . $table . "` WHERE md5(concat(`CountryID`, `CordID`)) LIKE '" . $key . "' ORDER BY RAND() LIMIT 1";
                    if ($resultb = $GLOBALS['DebauchDB']->queryF($sql) && $found != true) {
                        while (($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) && $found == false) {
                            $found = true;
                            $table = $country['Table'];
                            $sql = "SELECT count(*) as records FROM `" . $table . "`";
                            if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                                $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
                                $country['records'] = $records['records'];
                            } else
                                $country['records'] = 0 ;
                            $table = $country['Table'];
                            unset($country['Table']);
                            unset($country['CountryID']);
                            if ($format!='xml')
                                $ret['results']['countries'][$country['key']]=$country;
                            else
                                $ret['results']['countries'][$table]=$country;
                            $countryid = $place['CountryID'];
                            $cordid = $place['CordID'];
                            unset($place['CountryID']);
                            unset($place['CordID']);
                            if (strpos($place['RegionName'], ',')) {
                                $parts = explode(', ',$place['RegionName']);
                                $place['RegionName'] = $parts[1] . ' ' . $parts[0];
                            }
                            $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                            if ($format!='xml')
                                $ret['results']['places'][$country['key']][$place['key']]=$place;
                            else
                                $ret['results']['places'][$table][$key]=$place;
                            $ret['results']['venues'] = array();
                            $ret['search']['result']['type'] = 'place';
                            $ret['search']['result']['count'] = 1;
                            $ret['search']['result']['venues'] = 0;
                            continue;
                            continue;
                        }
                    }
                }
            }
        }
       
        $results = array();
        
        if ($found != false && isset($place) && !empty($place)) 
        {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'google' . DIRECTORY_SEPARATOR . 'places.php';
            $places = new GooglePlaces(API_GOOGLE_KEY);
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
            die(print_r($results, true));
        }
        return $ret;
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
        
        if (empty($address))
        {
            $sql = '';
            $ret = array();
            $found = false;
            $ret['search']['result']['count'] = 0;
            
            $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` WHERE md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) LIKE '".$key."' GROUP BY `CountryID` ORDER BY `Country` ASC ";
            if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
                if($country = $GLOBALS['DebauchDB']->fetchArray($result)) {
                    $sql = "SELECT count(*) as records FROM `" . $table . "`";
                    if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                        $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
                        $country['records'] = $records['records'];
                    } else
                        $country['records'] = 0;
                    $table = $country['Table'];
                    $address = $country['Country'];
                    unset($country['Table']);
                    unset($country['CountryID']);
                    if ($format!='xml')
                        $ret['results']['countries'][$country['key']] = $country;
                    else
                        $ret['results']['countries'][$table] = $country;
                        $ret['results']['places'] = array();
                        $ret['results']['nearby'] = array();
                        $ret['search']['result']['type'] = 'country';
                        $ret['search']['result']['count'] = 1;
                        $ret['search']['result']['nearby'] = 0;
                        $found = true;
                }
            }
            
            if ($found==false) {
                $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
                if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
                    while(($country = $GLOBALS['DebauchDB']->fetchArray($result)) && $found == false) {
                        $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key` FROM `" . $table . "` WHERE md5(concat(`CountryID`, `CordID`)) LIKE '" . $key . "' ORDER BY RAND() LIMIT 1";
                        if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                            while (($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) && $found == false) {
                                $table = $country['Table'];
                                $sql = "SELECT count(*) as records FROM `" . $table . "`";
                                if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                                    $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
                                    $country['records'] = $records['records'];
                                } else
                                    $country['records'] = 0 ;
                                $table = $country['Table'];
                                unset($country['Table']);
                                unset($country['CountryID']);
                                if ($format!='xml')
                                    $ret['results']['countries'][$country['key']]=$country;
                                else
                                    $ret['results']['countries'][$table]=$country;
                                unset($place['CountryID']);
                                unset($place['CordID']);
                                if (strpos($place['RegionName'], ',')) {
                                    $parts = explode(', ',$place['RegionName']);
                                    $place['RegionName'] = $parts[1] . ' ' . $parts[0];
                                }
                                $address = $place['RegionName'] . ', ' . $address;
                                $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                                if ($format!='xml')
                                    $ret['results']['places'][$country['key']][$place['key']]=$place;
                                else
                                    $ret['results']['places'][$table][$key]=$place;
                                    $ret['results']['nearby'] = array();
                                    $ret['search']['result']['type'] = 'place';
                                    $ret['search']['result']['count'] = 1;
                                    $ret['search']['result']['nearby'] = 0;
                                    $found = true;
                            }
                        }
                    }
                }
            }
            
            if ($found = true && $radius > 0 && $ret['search']['result']['type'] = 'place' && (!empty($table) && !empty($ret['results']['place']['Longitude_Float']) && !empty($ret['results']['place']['Latitude_Float']))) {
                $sql = "SELECT *, md5(concat(`CountryID`, `Country`, max(`CountryID`) - `CountryID` + 1)) as `key` FROM `countries` GROUP BY `CountryID` ORDER BY `Country` ASC ";
                if ($result = $GLOBALS['DebauchDB']->queryF($sql)) {
                    while(($country = $GLOBALS['DebauchDB']->fetchArray($result)) && $found == true) {
                        $sql = "SELECT count(*) as records FROM `" . $table . "`";
                        if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                            $records = $GLOBALS['DebauchDB']->fetchArray($resultb);
                            $country['records'] = $records['records'];
                        } else
                            $country['records'] = 0 ;
                            $sql = "SELECT *, md5(concat(`CountryID`, `CordID`)) as `key`, 3956 * 2 * ASIN(SQRT(POWER(SIN((" . abs($ret['results']['place']['Latitude_Float']) . " - abs(`Latitude_Float`)) * pi() / 180 / 2), 2) + COS(" . abs($ret['results']['place']['Latitude_Float']) . " * pi() / 180 ) * COS(abs(`Latitude_Float`) *  pi() / 180) * POWER(SIN((" . $ret['results']['place']['Longitude_Float'] . " - `Longitude_Float`) *  pi() / 180 / 2), 2) )) as distance FROM `" . $table . "` having `distance` <= ".$radius." ORDER BY `distance`";
                            $table = $country['Table'];
                            unset($country['Table']);
                            unset($country['CountryID']);
                            if ($resultb = $GLOBALS['DebauchDB']->queryF($sql)) {
                                while ($place = $GLOBALS['DebauchDB']->fetchArray($resultb)) {
                                    if ($format!='xml')
                                        $ret['results']['nearby']['countries'][$country['key']]=$country;
                                    else
                                        $ret['results']['nearby']['countries'][$table]=$country;
                                    unset($place['CountryID']);
                                    unset($place['CordID']);
                                    if (strpos($place['RegionName'], ',')) {
                                        $parts = explode(', ',$place['RegionName']);
                                        $place['RegionName'] = $parts[1] . ' ' . $parts[0];
                                    }
                                    $key = str_replace(array(" ", "'", "-", "_", "\"", "`" , ",", "(", ")"), "", strtolower($place['RegionName']));
                                    if ($format!='xml')
                                        $ret['results']['nearby']['places'][$country['key']][$place['key']]=$place;
                                    else
                                        $ret['results']['nearby']['places'][$table][$key]=$place;
                                        $ret['search']['result']['count']++;
                                }
                            }
                    }
                }
                if ($ret['search']['result']['nearby']>0)
                    $ret['search']['result']['type'] = 'nearby';
            }
        }
        
        $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($address);
        if (strpos($address, ',') > 0 && (strpos($address, ',', strpos($address, ',')+1) == 0 || strpos($address, ',', strpos($address, ',', strpos($address, ',') + 1) + 1) == 0) )
            $lat_long = $place['Latitude_Float'] . ',' . $place['Longitude_Float'];
        else 
            $lat_long = '0,0';
        $script = array();
        $script['header'][] = array('meta' => array('uri'=>'http://maps.googleapis.com/maps/api/js?sensor=false'), 'html' => '<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>');
        $script['public'][] = '<div id="map_canvas"></div>';
        $script['footer'][] = array('html' => '<script>
(function() { 
function initialize() {
	var myLatlng = new google.maps.LatLng('.$lat_long.'),
	mapOptions = {
		zoom: 15,
		center: myLatlng
	},
	map = new google.maps.Map(document.getElementById(\'map_canvas\'), mapOptions),
	marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: \''.$address.'\'
	});
}
google.maps.event.addDomListener(window, \'load\', initialize);
})();
</script>');
        return $script;
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


if (!function_exists("getPingTiming")) {
    
    /* function getPingTiming()
     *
     * 	Get a ping timing for a URL
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     *
     * @return 		float()
     */
    function getPingTiming($uri = '', $timeout = 7, $connectout = 8)
    {
        ob_start();
        $start = microtime(true);
        if (!function_exists("curl_init"))
        {
            if (strlen(file_get_contents($uri))>0) {
                ob_end_clean();
                return microtime(true)-$start*1000;
            }
        } else {
            if (!$btt = curl_init($uri)) {
                ob_end_clean();
                return false;
            }
            curl_setopt($btt, CURLOPT_HEADER, 0);
            curl_setopt($btt, CURLOPT_POST, 0);
            curl_setopt($btt, CURLOPT_CONNECTTIMEOUT, $connectout);
            curl_setopt($btt, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($btt, CURLOPT_RETURNTRANSFER, false);
            curl_setopt($btt, CURLOPT_VERBOSE, false);
            curl_setopt($btt, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($btt, CURLOPT_SSL_VERIFYPEER, false);
            @curl_exec($btt);
            $httpcode = curl_getinfo($btt, CURLINFO_HTTP_CODE);
            curl_close($btt);
            if($httpcode>=200 && $httpcode<300){
                ob_end_clean();
                return microtime(true)-$start*1000;
            }
        }
        ob_end_clean();
        return false;
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
