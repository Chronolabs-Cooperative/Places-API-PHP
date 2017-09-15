<?php
/**
 * Chronolabs REST Geospatial Places Services API
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
 * @description		Geospatial Places Services API
 * @see			    http://internetfounder.wordpress.com
 * @see			    http://sourceoforge.net/projects/chronolabsapis
 * @see			    https://github.com/Chronolabs-Cooperative/Places-API-PHP
 */


require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apiconfig.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'sqlutility.php';

error_reporting(0);
ini_set('display_errors', false);
ini_set('log_errors', false);

$replace = array('geospatial' => DB_DEBAUCH_NAME);

if (!is_dir(API_TMP_PATH))
    mkdir(API_TMP_PATH, 0777, true);

$sqllist = array();
if ($handle = opendir(__DIR__)) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match('/(\.sql)$/i', $file)) {
            $file            = $prefix . $file;
            $sqllist[$file] = $file;
        }
    }
    closedir($handle);
    asort($sqllist);
    reset($sqllist);
}

if (count($sqllist)==0)
    die("Nothing to Do no *.sql files in: " . __DIR__);

$step = 0;
foreach($sqllist as $file)
{
    $step++;
    $questions = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $file);
    foreach($replace as $search => $replace)
        $questions = str_replace($search, $replace, $questions);
    
    echo str_repeat("0", strlen((string)count($sqllist)) - strlen((string)$step)) . (string)$step . " / " . (string)count($sqllist) . " :: $file ";
    $queries = array();
    if (SqlUtility::splitMySqlFile($queries, $questions)) {
        foreach($queries as $question)
            if ($GLOBALS['DebauchDB']->queryF($question))
                echo '.';
            else 
                echo '-';
    }

    if (!isset($_SERVER['HTTP_HOST']))
        echo "\n";
    else
        echo "<br />";
    
    rename(__DIR__ . DIRECTORY_SEPARATOR . $file, __DIR__ . DIRECTORY_SEPARATOR . $file . '.ran');
}
