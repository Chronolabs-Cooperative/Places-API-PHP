<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * Installer table creation page
 *
 * See the enclosed file license.txt for licensing information.
 * If you did not receive this file, get it at http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @copyright    (c) 2000-2016 API Project (www.api.org)
 * @license          GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package          installer
 * @since            2.3.0
 * @author           Haruki Setoyama  <haruki@planewave.org>
 * @author           Kazumi Ono <webmaster@myweb.ne.jp>
 * @author           Skalpa Keo <skalpa@api.org>
 * @author           Taiwen Jiang <phppp@users.sourceforge.net>
 * @author           DuGris (aka L. JEN) <dugris@frapi.org>
 **/

require_once './include/common.inc.php';
defined('API_INSTALL') || die('API Installation wizard die');

$pageHasForm = false;
$pageHasHelp = false;

$vars =& $_SESSION['settings'];

include_once '../mainfile.php';
include_once './class/dbmanager.php';
$dbm = new Db_manager();

if (!$dbm->isConnectable()) {
    $wizard->redirectToPage('-3');
    exit();
}

if ($dbm->tableExists('users')) {
    $content = '<div class="alert alert-info"><span class="fa fa-info-circle text-info"></span> ' . API_TABLES_FOUND . '</div>';
} else {
    $content = "<script>
    $(document).ready(function() {
        function updateDiv(){
            $.ajax({
                url: \"" . API_URL . "/install/json.createdatabase.php\",
                dataType: \"json\",
                cache: false,
                success: function(data) {
                    $('#dbreport').html(data.dbreport);
                    $('#buttons').html(data.buttons);
                }             
            });              
        }
        updateDiv();
        setInterval(updateDiv, 1459);
    });
</script>
<div class=\"alert alert-success\"><span class=\"fa fa-check text-success\"></span> " . API_TABLES_CREATED
        . "</div><div class=\"well\" id=\"dbreport\">&nbsp;</div>";
}
include './include/install_tpl.php';
