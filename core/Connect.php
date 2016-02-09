<?php


class Connect
{
    private $driver;
    private $host;
    private $user;
    private $pass;
    private $database;
    private $charset;

    public function __construct()
    {
        $config = require_once '../Pizzeria/config/database.php';

        $this->driver = $config["driver"];
        $this->host = $config["host"];
        $this->user = $config["user"];
        $this->pass = $config["pass"];
        $this->database = $config["core"];
        $this->charset = $config["charset"];
    }

    public function connection(){
        if ($this->driver == "mysql" || $this->driver == null){
            $con = new mysqli($this->host, $this->user, $this->pass);
            $con->select_db($this->database);
            $con->query("SET NAMES '" . $this->charset . "'");
        }

        return $con;
    }

}