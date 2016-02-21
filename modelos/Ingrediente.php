<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14/02/2016
 * Time: 3:21
 */
require_once 'EntityBase.php';

class Ingrediente extends EntityBase
{

    private $nombreIng;
    private $descripcion;
    private $img;

    private $table;

    /**
     * Ingrediente constructor.
     */
    public function __construct()
    {
        $this->table = "ingredientes";
        parent::__construct($this->table);
    }

    public function updateThis()
    {
        $sql = "UPDATE " . $this->table . " SET nombreIng = '$this->nombreIng', descripcion = '$this->descripcion', img = '$this->img' WHERE nombreIng = '$this->nombreIng'";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    public function setIngrediente()
    {
        $sql = "INSERT INTO ingredientes (nombreIng, descripcion, img)
                VALUES ('$this->nombreIng', '$this->descripcion', '$this->img')";
        $query = $this->getDatabase()->query($sql);
        /*$file = fopen("modelos/sentencias.txt", "a+");
        fwrite($file, $sql);
        fclose($file);*/
        return $query;
    }

    /**
     * @return mixed
     */
    public function getNombreIng()
    {
        return $this->nombreIng;
    }

    /**
     * @param mixed $nombreIng
     */
    public function setNombreIng($nombreIng)
    {
        $this->nombreIng = $nombreIng;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }




}