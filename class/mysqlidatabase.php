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



/**
 * mysqli class for Database access
 *
 * @abstract
 * @author     Simon Roberts <meshy@snails.email>
 * @package    places
 * @subpackage database
 */
class DebauchMysqliDatabase extends DebauchDatabase
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

        if (!extension_loaded('mysqli')) {
            trigger_error('notrace:mysqli extension not loaded', E_USER_ERROR);
            return false;
        }

        $this->allowWebChanges = ($_SERVER['REQUEST_METHOD'] != 'GET');

        if (DB_DEBAUCH_PERS == true) {
            $this->conn = @mysqli_pconnect(DB_DEBAUCH_HOST, DB_DEBAUCH_USER, DB_DEBAUCH_PASS);
        } else {
            $this->conn = @mysqli_connect(DB_DEBAUCH_HOST, DB_DEBAUCH_USER, DB_DEBAUCH_PASS);
        }

        if (!$this->conn) {
			trigger_error('No Connection (Server 1): ' . mysqli_error());
			if (DB_DEBAUCH_PERS == true) {
				$this->conn = @mysqli_pconnect(DB_DEBAUCH_HOST2, DB_DEBAUCH_USER2, DB_DEBAUCH_PASS2);
			} else {
				$this->conn = @mysqli_connect(DB_DEBAUCH_HOST2, DB_DEBAUCH_USER2, DB_DEBAUCH_PASS2);
			}
			if (!$this->conn) {
				die('No Connection (Server 2): ' . mysqli_error());
				return false;
			}
	        if ($selectdb != false) {
	            if (!mysqli_select_db($this->conn, DB_DEBAUCH_NAME2)) {
					die('Could not select: ' . mysqli_error());
				}
			}
        } else
			if ($selectdb != false) {
			    if (!mysqli_select_db($this->conn, DB_DEBAUCH_NAME)) {
					die('Could not select: ' . mysqli_error());
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
     * This is for compatibility only. Will always return 0, because mysqli supports
     * autoincrement for primary keys.
     *
     * @param string $sequence name of the sequence from which to get the next ID
     * @return int always 0, because mysqli has support for autoincrement
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
        return @mysqli_fetch_row($result);
    }

    /**
     * Fetch a result row as an associative array
     *
     * @param resource $result
     * @return array
     */
    public function fetchArray($result)
    {
        return @mysqli_fetch_assoc($result);
    }

    /**
     * Fetch a result row as an associative array
     *
     * @param resource $result
     * @return array
     */
    public function fetchBoth($result)
    {
        return @mysqli_fetch_array($result, MYSQLI_BOTH);
    }

    /**
     * DebauchMysqliDatabase::fetchObjected()
     *
     * @param resource $result
     * @return object|stdClass
     */
    public function fetchObject($result)
    {
        return @mysqli_fetch_object($result);
    }

    /**
     * Get the ID generated from the previous INSERT operation
     *
     * @return int
     */
    public function getInsertId()
    {
        return mysqli_insert_id($this->conn);
    }

    /**
     * Get number of rows in result
     *
     * @param resource $result
     * @return int
     */
    public function getRowsNum($result)
    {
        return @mysqli_num_rows($this->conn, $result);
    }

    /**
     * Get number of affected rows
     *
     * @return int
     */
    public function getAffectedRows()
    {
        return mysqli_affected_rows($this->conn);
    }

    /**
     * Close mysqli connection
     *
     * @return void
     */
    public function close()
    {
        mysqli_close($this->conn);
    }

    /**
     * will free all memory associated with the result identifier result.
     *
     * @param resource $result query result
     * @return bool TRUE on success or FALSE on failure.
     */
    public function freeRecordSet($result)
    {
        return mysqli_free_result($this->conn, $result);
    }

    /**
     * Returns the text of the error message from previous mysqli operation
     *
     * @return bool Returns the error text from the last mysqli function, or '' (the empty string) if no error occurred.
     */
    public function error()
    {
        return @mysqli_error($this->conn);
    }

    /**
     * Returns the numerical value of the error message from previous mysqli operation
     *
     * @return int Returns the error number from the last mysqli function, or 0 (zero) if no error occurred.
     */
    public function errno()
    {
        return @mysqli_errno($this->conn);
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
        return "'" . str_replace("\\\"", '"', str_replace("\\&quot;", '&quot;', mysqli_real_escape_string($string, $this->conn))) . "'";
    }

    /**
     * perform a query on the database
     *
     * @param string $sql a valid mysqli query
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
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return $result;
        } else {
        	trigger_error('mysqli Error: ' . $sql .' ' . mysqli_error());
            return false;
        }
    }

    /**
     * perform a query
     *
     * This method is empty and does nothing! It should therefore only be
     * used if nothing is exactly what you want done! ;-)
     *
     * @param string $sql a valid mysqli query
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
        return mysqli_field_name($result, $offset);
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
        return mysqli_field_type($result, $offset);
    }

    /**
     * Get number of fields in result
     *
     * @param resource $result query result
     * @return int
     */
    public function getFieldsNum($result)
    {
        return mysqli_num_fields($result);
    }
}

/**
 * Safe Connection to a mysqli database.
 *
 * @author Kazumi Ono <onokazu@Debauch.org>
 * @copyright copyright (c) 2000-2003 Debauch.org
 * @package feeds
 * @subpackage spline
 */
class DebauchMysqliDatabaseSafe extends DebauchMysqliDatabase
{
    /**
     * perform a query on the database
     *
     * @param string $sql a valid mysqli query
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
 * Read-Only connection to a mysqli database.
 *
 * This class allows only SELECT queries to be performed through its
 * {@link query()} method for security reasons.
 *
 * @author Kazumi Ono <onokazu@Debauch.org>
 * @copyright copyright (c) 2000-2003 Debauch.org
 * @package feeds
 * @subpackage spline
 */
class DebauchMysqliDatabaseProxy extends DebauchMysqliDatabase
{
    /**
     * perform a query on the database
     *
     * this method allows only SELECT queries for safety.
     *
     * @param string $sql a valid mysqli query
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