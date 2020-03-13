<?php
namespace App\Model;

/**
 * @author Alex
 */
abstract class Model {
    /** @var string $table */
    protected $table;
    /** @var \App\Lib\DbAdapter $db */
    protected $db;

    abstract public function createTable();

    public function __construct()
    {
        $this->db = new \App\Lib\DbAdapter();
    }

    public function insert(array $insertFileds) {
        $this->db->insert($this->table, $insertFileds);
    }

    public function delete(array $where) {
        $this->db->delete($this->table, $where);
    }

}
