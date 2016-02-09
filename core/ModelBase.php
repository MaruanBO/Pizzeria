<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09/02/2016
 * Time: 0:25
 */
class ModelBase extends entityBase
{
    private $table;

    public function __construct($table)
    {
        $this->table = (string)$table;
        parent::__construct($table);
    }

    public function runSql($query){
        $query = $this->getDatabase()->query($query);
        if($query){
            if ($query->num_rows > 1){
                while ($row = $query->fetch_object())
                    $resultSet[] = $row;

            } elseif ($query->num_rows == 1){
                if($row = $query->fetch_object())
                    $resultSet = $row;

            } else {
                $resultSet = true;
            }
        } else {
            $resultSet = false;
        }

        return $resultSet;
    }
}