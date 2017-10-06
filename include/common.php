<?php
/**
 * API common initialization file
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       (c) 2000-2016 API Project (www.API.org)
 * @license             GNU GPL 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package             kernel
 */
defined('API_MAINFILE_INCLUDED') || die('Restricted access');

/**
 * YOU SHOULD NEVER USE THE FOLLOWING TO CONSTANTS, THEY WILL BE REMOVED
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('NWLINE') or define('NWLINE', "\n");

/**
 * Include files with definitions
 */
include_once API_ROOT_PATH . DS . 'include' . DS . 'defines.php';
include_once API_ROOT_PATH . DS . 'include' . DS . 'version.php';
include_once API_ROOT_PATH . DS . 'include' . DS . 'license.php';

/**
 * Include APILoad
 */
require_once API_ROOT_PATH . DS . 'class' . DS . 'apiload.php';

/**
 * Create Instance of APISecurity Object and check Supergolbals
 */
APILoad::load('apisecurity');
$APISecurity = new APISecurity();
$APISecurity->checkSuperglobals();

/**
 * Create Instantance APILogger Object
 */
APILoad::load('apilogger');
$APILogger       = APILogger::getInstance();
$APIErrorHandler = APILogger::getInstance();
$APILogger->startTime();
$APILogger->startTime('API Boot');

/**
 * Include Required Files
 */
include_once API_ROOT_PATH . 'kernel' . DS . 'object.php';
include_once API_ROOT_PATH . 'class' . DS . 'criteria.php';
include_once API_ROOT_PATH . 'class' . DS . 'module.textsanitizer.php';
include_once API_ROOT_PATH . 'include' . DS . 'functions.php';

/**
 * Get database for making it global
 * Requires APILogger, API_DB_PROXY;
 */
include_once API_ROOT_PATH . 'class' . DS . 'database' . DS . 'databasefactory.php';
$GLOBALS['APIDB'] = APIDatabaseFactory::getDatabaseConnection();
