<?php
namespace App\Lib;

use App\Config;
use PDO;

/**
 * Mysql PDO DbAdapter
 *
 * @author Alex
 */
class DbAdapter {
    /** @var PDO $db */
    public static $db = null;
    /** @var array $config  */
    public static $config = null;

    public function __construct()
    {
        $this->config = Config::getConfig('db');

        $this->db = new PDO('mysql:host='.$this->config['host'].';dbname='.$this->config['db'].'', $this->config['username'], $this->config['password']);

    }
    
    public function execute( $sql, array $params = [])
    {
        $sth = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $paramName => $paramValue) {
                if (is_array($paramValue)) {
                    $sth->bindValue(':'.$paramName, $paramValue[0], $paramValue[1]);
                } else {
                    $sth->bindValue(':'.$paramName, $paramValue, PDO::PARAM_STR);
                }
            }
        }
        $sth->execute();
        return $sth;
    }
    
    public function fetchRow( $sql, $params = [], $mode = PDO::FETCH_ASSOC)
    {
        $sth = $this->execute($sql, $params);
        return $sth->fetch($mode);
    }
    public function fetchAll(atring $sql, array $params = [], $mode = PDO::FETCH_ASSOC)
    {
        $sth = $this->execute($sql, $params);
        return $sth->fetchAll($mode);
    }
    
    public function insert(string $table, array $params = [], $lastId = false)
    {
        $sql = 'INSERT INTO `'.$table.'` ';
        $sql .= '('.implode(',', array_keys($params)).')';
        $sql .= ' VALUES (:'.implode(', :', array_keys($params)).')';
        $res = $this->execute($sql, $params);
        if ($lastId) {
            return $this->db->lastInsertId();
        } else {
            return $res;
        }
    }

    public function delete(string $table, $where = [])
    {
        $sql = 'DELETE FROM `'.$table.'` ';
        $first = true;
        foreach ($where as $field => $value) {
            if ($first) {
                $sql .= ' WHERE ';
                $first = false;
            } else {
                $sql .= ' AND ';
            }
            $sql .= $field." = :".$field;
        }
        $res = $this->execute($sql, $where);
        return $res;
    }

    /**
     * @param string $sql
     * @return false|\PDOStatement
     */
    public function create(string $sql, string $drop = '')
    {
        if (!empty($drop)) {
            $this->execute('DROP TABLE `'.$drop.'` IF EXISTS;');
        }
        $res = $this->db->query($sql);
        return $res;
    }
}
