<?php
namespace App\Model;

/**
 * @author Alex
 */
class Clients extends Model {
    protected $table = 'clients';

    public function createTable(bool $drop = false)
    {
        $dropTable = $drop ? $this->table : '';
        $query = '
            CREATE TABLE '.$this->table.' (
            id INT(10) NOT NULL AUTO_INCREMENT,
            salutation VARCHAR(4),
            firstName VARCHAR(32),
            lastName VARCHAR(32),
            email VARCHAR(64),
            country VARCHAR(3),
            mailingList SMALLINT,
            PRIMARY KEY id (id) 
        );';

        $this->db->create($query, $dropTable);
    }
}
