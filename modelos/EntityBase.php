<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/02/16
 * Time: 17:42
 */
class EntityBase
{
    private $table;
    private $database;
    private $connect;

    public function __construct($table)
    {
        $this->table = (string)$table;
        require_once 'Connect.php';
        $this->connect = new Connect();
        $this->database = $this->connect->connection();
    }

    /**
     * @return Connect
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @return mysqli
     */
    public function getDatabase()
    {
        return $this->database;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->database->query($sql) or trigger_error($this->database->error . "[$sql]");

        $resultSet = array();
        while ($row = $query->fetch_assoc())
            $resultSet[] = $row;
        return $resultSet;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $query = $this->database->query($sql);
        $resultSet = array();
        while ($row = $query->fetch_assoc())
            $resultSet[] = $row;
        return $resultSet;
    }

    public function getBy($column, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE $column = '$value'";
        $query = $this->database->query($sql);

        $resultSet = array();
        while ($row = $query->fetch_assoc())
            $resultSet[] = $row;
        return $resultSet;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = $id";
        $query = $this->database->query($sql);
        return $query;
    }

    public function deleteBy($column, $value)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE $column = '$value'";
        $query = $this->database->query($sql);
        return $query;
    }

    public function updateById($colum, $value, $id, $valorId){
        $sql = "UPDATE " . $this->table . " SET $colum = '$value' WHERE $id = $valorId";
        $query = $this->database->query($sql);
        return $query;
    }
}