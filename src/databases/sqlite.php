<?php

namespace Crudificator\databases; 

/**
 * SQLite3
 *
 * This class implements a interface to use SQLite3 Database.
 * @autor Goodeath
 * @date 03/10/2019
 * @email alexandersonmbm@gmail.com
 */
class Sqlite {

    /** 
     * @var SQLite3 Store db connection. 
     */
    private $db = null;

    /**
     * Initialize DB Connection. $name is the db filename. 
     */
    public function __construct($name)
    {

        $path = dirname(__FILE__) . '/' .  $name;

        $this->db = new \SQLite3($path, \SQLITE3_OPEN_CREATE | \SQLITE3_OPEN_READWRITE);

        if (!$this->db) {
            throw new Exception(
                "Houve um erro ao conectar com o banco de dados. Erro: " . $error 
            );
        }
    }

    /**
     * Query.
     *
     * Make a query and return result.
     *
     * @param String $query SQL Query.
     *
     * @return SQLite3Result You can use fetchArray method to get rows.
     */
    public function query($query)
    {
        $result = $this->db->query($query);
        return $result;
    }

    /**
     * Insert.
     *
     * Insert items in a table.
     *
     * @param String  $table   Table name.
     * @param array   $columns Table columns. Note that values in $data must be in same order.
     * @param array[] $data    Values to be inserted in table.
     *
     * @return boolean Return true in success or false on failure.
     */
    public function insert($table, array $columns, array $data)
    {
        $columns = implode(',', $columns);
        $values = '';

        foreach ($data as $key=>$value) {
            $values .= '("' . implode('","', $value) . '"),';
        }

        $values = substr($values, 0, -1).';';

        $q = "INSERT INTO {$table} ({$columns}) VALUES {$values}";

        return $this->db->exec($q);
    }
}
