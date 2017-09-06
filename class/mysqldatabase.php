<?php
/**
 * Chronolabs REST GeoSpatial Places API
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
 * @package         places
 * @since           1.0.2
 * @author          Simon Roberts <meshy@snails.email>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		REST GeoSpatial Places API
 */


/**
 * MySQL class for Database access
 *
 * @abstract
 * @author     Simon Roberts <meshy@snails.email>
 * @package    places
 * @subpackage database
 */
class DebauchMySQLDatabase extends DebauchDatabase
{

	/**
	 * destructor
	 */
	function __destruct() {
		if ($this->conn) {
			self::close();
		}
	}

    /**
     * connect to the database
     *
     * @param bool $selectdb select the database now?
     * @return bool successful?
     */
    public function connect($selectdb = true)
    {
        static $db_charset_set;

        if (!extension_loaded('mysql')) {
            trigger_error('notrace:mysql extension not loaded', E_USER_ERROR);
            return false;
        }

        $this->allowWebChanges = ($_SERVER['REQUEST_METHOD'] != 'GET');

        if (DB_DEBAUCH_PERS == true) {
            $this->conn = @mysql_pconnect(DB_DEBAUCH_HOST, DB_DEBAUCH_USER, DB_DEBAUCH_PASS);
        } else {
            $this->conn = @mysql_connect(DB_DEBAUCH_HOST, DB_DEBAUCH_USER, DB_DEBAUCH_PASS);
        }

        if (!$this->conn) {
			trigger_error('No Connection (Server 1): ' . mysql_error());
			if (DB_DEBAUCH_PERS == true) {
				$this->conn = @mysql_pconnect(DB_DEBAUCH_HOST2, DB_DEBAUCH_USER2, DB_DEBAUCH_PASS2);
			} else {
				$this->conn = @mysql_connect(DB_DEBAUCH_HOST2, DB_DEBAUCH_USER2, DB_DEBAUCH_PASS2);
			}
			if (!$this->conn) {
				die('No Connection (Server 2): ' . mysql_error());
				return false;
			}
	        if ($selectdb != false) {
				if (!mysql_select_db(DB_DEBAUCH_NAME2)) {
					die('Could not select: ' . mysql_error());
				}
			}
        } else
			if ($selectdb != false) {
				if (!mysql_select_db(DB_DEBAUCH_NAME)) {
					die('Could not select: ' . mysql_error());
				}
			}
        if (!isset($db_charset_set) && defined('DB_DEBAUCH_CHAR') && DB_DEBAUCH_CHAR) {
            $this->queryF("SET NAMES '" . DB_DEBAUCH_CHAR . "'");
        }
        $db_charset_set = 1;
        $this->queryF("SET SQL_BIG_SELECTS = 1");
        return true;
    }

    /**
     * generate an ID for a new row
     *
     * This is for compatibility only. Will always return 0, because MySQL supports
     * autoincrement for primary keys.
     *
     * @param string $sequence name of the sequence from which to get the next ID
     * @return int always 0, because mysql has support for autoincrement
     */
    public function genId($sequence)
    {
        return 0; // will use auto_increment
    }

    /**
     * Get a result row as an enumerated array
     *
     * @param resource $result
     * @return array
     */
    public function fetchRow($result)
    {
        return @mysql_fetch_row($result);
    }

    /**
     * Fetch a result row as an associative array
     *
     * @param resource $result
     * @return array
     */
    public function fetchArray($result)
    {
        return @mysql_fetch_assoc($result);
    }

    /**
     * Fetch a result row as an associative array
     *
     * @param resource $result
     * @return array
     */
    public function fetchBoth($result)
    {
        return @mysql_fetch_array($result, MYSQL_BOTH);
    }

    /**
     * DebauchMySQLDatabase::fetchObjected()
     *
     * @param resource $result
     * @return object|stdClass
     */
    public function fetchObject($result)
    {
        return @mysql_fetch_object($result);
    }

    /**
     * Get the ID generated from the previous INSERT operation
     *
     * @return int
     */
    public function getInsertId()
    {
        return mysql_insert_id($this->conn);
    }

    /**
     * Get number of rows in result
     *
     * @param resource $result
     * @return int
     */
    public function getRowsNum($result)
    {
        return @mysql_num_rows($result);
    }

    /**
     * Get number of affected rows
     *
     * @return int
     */
    public function getAffectedRows()
    {
        return mysql_affected_rows($this->conn);
    }

    /**
     * Close MySQL connection
     *
     * @return void
     */
    public function close()
    {
        mysql_close($this->conn);
    }

    /**
     * will free all memory associated with the result identifier result.
     *
     * @param resource $result query result
     * @return bool TRUE on success or FALSE on failure.
     */
    public function freeRecordSet($result)
    {
        return mysql_free_result($result);
    }

    /**
     * Returns the text of the error message from previous MySQL operation
     *
     * @return bool Returns the error text from the last MySQL function, or '' (the empty string) if no error occurred.
     */
    public function error()
    {
        return @mysql_error();
    }

    /**
     * Returns the numerical value of the error message from previous MySQL operation
     *
     * @return int Returns the error number from the last MySQL function, or 0 (zero) if no error occurred.
     */
    public function errno()
    {
        return @mysql_errno();
    }

    /**
     * Returns escaped string text with single quotes around it to be safely stored in database
     *
     * @param string $str unescaped string text
     * @return string escaped string text with single quotes around
     */
    public function quoteString($str)
    {
        return $this->quote($str);
    }

    /**
     * Quotes a string for use in a query.
     *
     * @param $string
     * @return string
     */
    public function quote($string)
    {
        return "'" . str_replace("\\\"", '"', str_replace("\\&quot;", '&quot;', mysql_real_escape_string($string, $this->conn))) . "'";
    }

    /**
     * perform a query on the database
     *
     * @param string $sql a valid MySQL query
     * @param int $limit number of records to return
     * @param int $start offset of first record to return
     * @return bool|resource query result or FALSE if successful
     * or TRUE if successful and no result
     */
    public function queryF($sql, $limit = 0, $start = 0)
    {
        if (!empty($limit)) {
            if (empty($start)) {
                $start = 0;
            }
            $sql = $sql . ' LIMIT ' . (int) $start . ', ' . (int) $limit;
        }
        $result = mysql_query($sql, $this->conn);
        if ($result) {
            return $result;
        } else {
        	trigger_error('MySQL Error: ' . $sql .' ' . mysql_error());
            return false;
        }
    }

    /**
     * perform a query
     *
     * This method is empty and does nothing! It should therefore only be
     * used if nothing is exactly what you want done! ;-)
     *
     * @param string $sql a valid MySQL query
     * @param int $limit number of records to return
     * @param int $start offset of first record to return
     * @abstract
     */
    public function query($sql, $limit = 0, $start = 0)
    {
    }

    /**
     * Get field name
     *
     * @param resource $result query result
     * @param int $offset numerical field index
     * @return string
     */
    public function getFieldName($result, $offset)
    {
        return mysql_field_name($result, $offset);
    }

    /**
     * Get field type
     *
     * @param resource $result query result
     * @param int $offset numerical field index
     * @return string
     */
    public function getFieldType($result, $offset)
    {
        return mysql_field_type($result, $offset);
    }

    /**
     * Get number of fields in result
     *
     * @param resource $result query result
     * @return int
     */
    public function getFieldsNum($result)
    {
        return mysql_num_fields($result);
    }
}

/**
 * Safe Connection to a MySQL database.
 *
 * @author Kazumi Ono <onokazu@Debauch.org>
 * @copyright copyright (c) 2000-2003 Debauch.org
 * @package feeds
 * @subpackage spline
 */
class DebauchMySQLDatabaseSafe extends DebauchMySQLDatabase
{
    /**
     * perform a query on the database
     *
     * @param string $sql a valid MySQL query
     * @param int $limit number of records to return
     * @param int $start offset of first record to return
     * @return resource query result or FALSE if successful
     * or TRUE if successful and no result
     */
    public function query($sql, $limit = 0, $start = 0)
    {
        return $this->queryF($sql, $limit, $start);
    }
}

/**
 * Read-Only connection to a MySQL database.
 *
 * This class allows only SELECT queries to be performed through its
 * {@link query()} method for security reasons.
 *
 * @author Kazumi Ono <onokazu@Debauch.org>
 * @copyright copyright (c) 2000-2003 Debauch.org
 * @package feeds
 * @subpackage spline
 */
class DebauchMySQLDatabaseProxy extends DebauchMySQLDatabase
{
    /**
     * perform a query on the database
     *
     * this method allows only SELECT queries for safety.
     *
     * @param string $sql a valid MySQL query
     * @param int $limit number of records to return
     * @param int $start offset of first record to return
     * @return resource query result or FALSE if unsuccessful
     */
    public function query($sql, $limit = 0, $start = 0)
    {
        $sql = ltrim($sql);
        if (!$this->allowWebChanges && strtolower(substr($sql, 0, 6)) != 'select') {
            trigger_error('Database updates are not allowed during processing of a GET request', E_USER_WARNING);
            return false;
        }
        return $this->queryF($sql, $limit, $start);
    }
}