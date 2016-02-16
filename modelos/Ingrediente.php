<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 14/02/2016
 * Time: 3:21
 */
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