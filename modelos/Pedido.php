<?php

class Pedido extends EntityBase
{

    private $id_pedido;
    private $login;
    private $id_masa;
    private $numIng;
    private $ingredientes;
    private $unidades;
    private $fechayhora;
    private $servido;

    private $table;

    /*
     * CONSTRUCTOR
     */

    public function __construct()
    {
        $this->table = "pedidos";
        parent::__construct($this->table);
    }

    /*
     * METODOS
     */

    public function setPedido(){
        $sql = "INSERT INTO pedidos (login, id_Masa, numIng, ingredientes, unidades, fechayhora, servido)
                VALUES ('$this->login', $this->id_masa, $this->numIng, '$this->ingredientes', $this->unidades, '$this->fechayhora', $this->servido);";
        $query = $this->getDatabase()->query($sql);
        return $query;
    }

    public function getAllWithMasaName($atributo, $valor)
    {
        $sql = "SELECT masas.nombre, pedidos.ingredientes, pedidos.unidades, pedidos.fechayhora, pedidos.servido
                FROM pedidos NATURAL JOIN masas WHERE $atributo = '$valor'";
        $query = $this->getDatabase()->query($sql);

        $resultSet = array();
        while ($row = $query->fetch_assoc())
            $resultSet[] = $row;
        return $resultSet;
    }

    /*
     * GETTERS & SETTERS
     */

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * @param mixed $id_pedido
     */
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
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
    public function getIdMasa()
    {
        return $this->id_masa;
    }

    /**
     * @param mixed $id_masa
     */
    public function setIdMasa($id_masa)
    {
        $this->id_masa = $id_masa;
    }

    /**
     * @return mixed
     */
    public function getNumIng()
    {
        return $this->numIng;
    }

    /**
     * @param mixed $numIng
     */
    public function setNumIng($numIng)
    {
        $this->numIng = $numIng;
    }

    /**
     * @return mixed
     */
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    /**
     * @param mixed $ingredientes
     */
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }

    /**
     * @return mixed
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * @param mixed $unidades
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }

    /**
     * @return mixed
     */
    public function getFechayhora()
    {
        return $this->fechayhora;
    }

    /**
     * @param mixed $fechayhora
     */
    public function setFechayhora($fechayhora)
    {
        $this->fechayhora = $fechayhora;
    }

    /**
     * @return mixed
     */
    public function getServido()
    {
        return $this->servido;
    }

    /**
     * @param mixed $servido
     */
    public function setServido($servido)
    {
        $this->servido = $servido;
    }

}