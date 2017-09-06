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


/**
 * Database Constants
 *
 * @abstract
 * @author     Simon Roberts <meshy@snails.email>
 * @package    places
 * @subpackage database
 */


/**
 * @var string		Database Name (Database Source One)
 */
define('DB_DEBAUCH_NAME', 'geospatial');

/**
 * @var string		Database Username (Database Source One)
 */
define('DB_DEBAUCH_USER', 'geosptial');

/**
 * @var string		Database Password (Database Source One)
 */
define('DB_DEBAUCH_PASS', 'r6vpIaTtcGBysbL5');

/**
 * @var string		Database Host Address/IP (Database Source One)
 */
define('DB_DEBAUCH_HOST', 'localhost');

/**
 * @var string		Database Character Set (Global)
 */
define('DB_DEBAUCH_CHAR', 'utf8');

/**
 * @var string		Database Persistency Connection (Global)
 */
define('DB_DEBAUCH_PERS', false);

/**
 * @var string		Database Types (Global)
 */
define('DB_DEBAUCH_TYPE', 'mysqli');

/**
 * @var string		Database Prefix (Global)
 */
define('DB_DEBAUCH_PREF', '');

/**
 * @var string		Database Name (Database Source Two)
 */
define('DB_DEBAUCH_NAME2', '');

/**
 * @var string		Database Username (Database Source Two)
 */
define('DB_DEBAUCH_USER2', '');

/**
 * @var string		Database Password (Database Source Two)
 */
define('DB_DEBAUCH_PASS2', '');

/**
 * @var string		Database Host Address/IP (Database Source Two)
 */
define('DB_DEBAUCH_HOST2', 'localhost');


require_once dirname(__FILE__) . '/database.php';
require_once dirname(__FILE__) . '/databasefactory.php';

/**
 * @var object		Database Handler Object (Globals)
 */
$GLOBALS['DebauchDB'] = DebauchDatabaseFactory::getDatabaseConnection();

?>