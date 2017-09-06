<?php
/**
 * Chronolabs REST Blowfish Salts Repository API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://snails.email
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         salty
 * @since           2.0.1
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: apiconfig.php 1000 2015-06-16 23:11:55Z wishcraft $
 * @subpackage		api
 * @description		Blowfish Salts Repository API
 * @link			http://cipher.snails.email
 * @link			http://sourceoforge.net/projects/chronolabsapis
 */

/**
 * Include libraries
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'debauchosity.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . 'placesfile.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'placescache.php';

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
 * Paths
 */
define('API_ROOT_PATH', __DIR__);
define('API_CACHE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'cache');

/**
 * Times && Limits
 */
define('API_CACHE_SECONDS', 8444);
define('MAXIMUM_QUERIES', 25);
ini_set('memory_limit', '128M');

/**
 * 
 * @var constants
 */
define("API_FILE_IO_PEERS", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'peers.diz');
define("API_FILE_IO_DOMAINS", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'domains.diz');
define("API_FILE_IO_FOOTER", __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'api-localhost.html');
?>