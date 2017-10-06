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


if (!is_file(__DIR__ . DIRECTORY_SEPARATOR . 'mainfile.php') || !is_file(__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'license.php'))
{
    header('Location: ' . "./install");
    exit(0);
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'mainfile.php';

/**
 * Paths
 */
$pu = parse_url($_SERVER['REQUEST_URI']);
$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
unset($pu);
define('PLACES_URL', $source);
define('API_ROOT_PATH', __DIR__);
define('API_CACHE_PATH', DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . 'places' . DIRECTORY_SEPARATOR . 'caches');
define('API_TMP_PATH', DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . 'places');

/**
 * Cronjob Constants and Defines
 */
define('API_CRON_NUMBER_COUNTRIES', 7);
define('API_CRON_NUMBER_REGIONS', 250);

/**
 * Times && Limits
 */
define('API_RADIUS_DEFAULT', 0.469);
define('API_GOOGLE_PAGES_RESULTS', 13);
define('API_CACHE_SECONDS', 8444);
define('MAXIMUM_QUERIES', 25);
ini_set('memory_limit', '128M');

/**
 * Keys & Identify Strings
 */
define('API_GOOGLE_KEY','AIzaSyD0tstaeCtH0gugLJUeYcUSUT_TdXL24Uo');    // Get from: https://developers.google.com/places/web-service/get-api-key = API_GOOGLE_KEY
define('API_PLACES_FIELDS', 'Address|Distance|RegionName|mapref_latitude|mapref_longitude|Latitude_Float|Longitude_Float|Altitude_Feet|Altitude_Meters|key');
define('API_COUNTRY_FIELDS', 'Country|ISO2|FIPS104|ISO3|ISON|TLD|Capital|Continent|NationalitySingular|NationalityPlural|Currency|CurrencyCode|Population|Records|Updates|API|Details|key|distance');
define('API_CONTINENT_FIELDS', 'Continent|key|Population|Records|API|Details|Updates');
define('API_VENUE_FIELDS','key|Name|Icon|Id|Reference|Longitude|Latitude|View_NE_Longitude|View_NE_Latitude|View_SW_Longitude|View_SW_Latitude|Vicinity');
define('API_ADDRESS_FIELDS','key|Unit|Building|Street|Suburb|State|Country|Country_ISO2|Postcode|Council|Longitude|Latitude|View_NE_Longitude|View_NE_Latitude|View_SW_Longitude|View_SW_Latitude|Formatted');

/**
 * Include libraries
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'apifile.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'apicache.php';

/**
 * Opens Access Origin Via networking Route NPN
 */
header('Access-Control-Allow-Origin: *');
header('Origin: *');

/**
 * Turns of GZ Lib Compression for Document Incompatibility
 */
ini_set("zlib.output_compression", 'Off');
ini_set("zlib.output_compression_level", -1);

/**
 * 
 * @var constants
 */
define("API_FILE_IO_PEERS", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'peers.diz');
define("API_FILE_IO_DOMAINS", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'domains.diz');
define("API_FILE_IO_FOOTER", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'api-localhost.html');
?>