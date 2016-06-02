<?php
/**
 * Chronolabs Whitelist REST API Service
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         whitelist
 * @since           1.1.2
 * @author          Simon Roberts <meshy@labs.coop>
 * @version         $Id: index.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		files
 * @description		Whitelist, Backgrounds & Wallpapers API Service REST
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