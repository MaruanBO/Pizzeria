<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08/02/2016
 * Time: 23:18
 *
 * MODELO SACADO APARTIR
 * DE -> http://victorroblesweb.es/2013/11/18/tutorial-mvc-en-php-nativo/
 * Y -> http://librosweb.es/libro/symfony_1_2/capitulo_2/el_patron_mvc.html
 *
 */

require_once '../Pizzeria/core/ModelBase.php';

class UsuarioDao extends ModelBase
{

    private $table;

    function __construct()
    {
        $this->table = "usuario";
        parent::__construct($this->table);
    }

    public function setUser()
    {

    }

    public function getUser()
    {
        $sql = "SELECT * FROM usuario";
        $query = $this->runSql($sql);
        return $query;
    }

    public function updateUser()
    {

    }

    public function removeUser()
    {

    }


}