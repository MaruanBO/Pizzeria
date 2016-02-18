<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/02/16
 * Time: 16:59
 */

require_once 'EntityBase.php';

class Usuario extends EntityBase
{
    /*
     * VARIABLES
     */

    private $login;
    private $pass;
    private $nombre;
    private $email;
    private $firma;
    private $avatar;
    private $tipo;

    private $table;

    /*
     * CONSTRUCTOR
     */
    public function __construct()
    {
        $this->table = "usuario";
        parent::__construct($this->table);
    }

    /*
     * METODOS
     */
    public function setUser()
    {
        $sql = "INSERT INTO usuario (login, password, nombre, email, firma, avatar, tipo)
        VALUES ('" . $this->login . "', '" . $this->pass . "', '" . $this->nombre . "', '" . $this->email . "','" . $this->firma . "','" . $this->avatar . "'," . $this->tipo . ")";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    public function updateUser()
    {
        $sql = "UPDATE usuario SET password = '" . $this->pass . "', email = '" . $this->email . "', nombre = '" . $this->nombre . "', firma = '" . $this->firma . "', avatar = '" . $this->avatar . "', tipo = $this->tipo WHERE login = '" . $this->login . "'";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    /*
     * GETTERS & SETTERS
     */

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * @param mixed $firma
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }


}