<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08/02/2016
 * Time: 23:11
 */
require_once '../Pizzeria/core/EntityBase.php';

class Usuario extends EntityBase
{

    private $id;
    private $login;
    private $password;
    private $nombre;
    private $email;
    private $firma;
    private $avatar;
    private $tipo;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        $table = "usuario";
        parent::__construct($table);
    }

    /*
     * METODOS
     */

    public function setUser()
    {
        $sql = "INSERT INTO usuario (Login, Password, Nombre, Email, Firma, Avatar, Tipo)
        VALUES ('" . $this->login . "', '" . $this->password . "', '" . $this->nombre . "', '" . $this->email . "','" . $this->firma . "','" . $this->avatar . "'," . $this->tipo . ")";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    /*
     * GETTERS & SETTERS
     */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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

}