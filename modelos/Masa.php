<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/02/16
 * Time: 18:52
 */

require_once 'EntityBase.php';

class Masa extends EntityBase
{

    /*
     * ATRIBUTOS
     */
    private $id_masas;
    private $descripcion;
    private $tamano;
    private $precio;
    private $img;
    private $nombre;

    private $table;

    /*
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->table = "masas";
        parent::__construct($this->table);
    }

    /*
     * METODOS
     */

    public function updateThis()
    {
        $sql = "UPDATE " . $this->table . " SET descripcion = '$this->descripcion', tamano = $this->tamano, precio = $this->precio, img = '$this->img', nombre = '$this->nombre' WHERE id_masa = $this->id_masas";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    public function insert()
    {
        $sql = "INSERT INTO masas (descripcion, tamano, precio, img, nombre)
                VALUES ('$this->descripcion', $this->tamano, $this->precio, '$this->img', '$this->nombre')";
        $query = $this->getDatabase()->query($sql);
        $file = fopen("modelos/sentencias.txt", "a+");
        fwrite($file, $sql);
        fclose($file);
        return $query;
    }

    /*
     * GETTERS & SETTERS
     */

    /**
     * @return mixed
     */
    public function getIdMasas()
    {
        return $this->id_masas;
    }

    /**
     * @param mixed $id_masas
     */
    public function setIdMasas($id_masas)
    {
        $this->id_masas = $id_masas;
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
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * @param mixed $tamano
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
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

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}