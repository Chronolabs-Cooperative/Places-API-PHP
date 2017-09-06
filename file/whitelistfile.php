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


class WhitelistFile
{
    /**
     * WhitelistFile::__construct()
     */
    function __construct()
    {
    }
    /**
     * WhitelistFile::WhitelistFile()
     */
    function WhitelistFile()
    {
        $this->__construct();
    }
    /**
     * WhitelistFile::getInstance()
     *
     * @return
     */
    function getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }
        return $instance;
    }
    /**
     * WhitelistFile::load()
     *
     * @param string $name
     * @return
     */
    static function load($name = 'file')
    {
        switch ($name) {
            case 'folder':
                if (!class_exists('WhitelistFolderHandler')) {
                    if (file_exists($folder = dirname(__FILE__) . '/folder.php')) {
                        include $folder;
                    } else {
                        trigger_error('Require Item : ' . str_replace(XOOPS_ROOT_PATH, '', $folder) . ' In File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
                        return false;
                    }
                }
                break;
            case 'file':
            default:
                if (!class_exists('WhitelistFileHandler')) {
                    if (file_exists($file = dirname(__FILE__) . '/file.php')) {
                        include $file;
                    } else {
                        trigger_error('Require File : ' . str_replace(XOOPS_ROOT_PATH, '', $file) . ' In File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
                        return false;
                    }
                }
                break;
        }
        return true;
    }
    /**
     * WhitelistFile::getHandler()
     *
     * @param string $name
     * @param mixed $path
     * @param mixed $create
     * @param mixed $mode
     * @return
     */
    static function getHandler($name = 'file', $path = false, $create = false, $mode = null)
    {
        $handler = null;
        WhitelistFile::load($name);
        $class = 'Whitelist' . ucfirst($name) . 'Handler';
        if (class_exists($class)) {
            $handler = new $class($path, $create, $mode);
        } else {
            trigger_error('Class ' . $class . ' not exist in File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
        }
        return $handler;
    }
}
?>