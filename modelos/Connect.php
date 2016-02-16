<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/02/16
 * Time: 17:03
 */

require_once 'core/database.php';

class Connect
{
    private $host;
    private $user;
    private $pass;
    private $database;
    private $charset;

    public function __construct()
    {
        //$config = require_once '../config/database.php';
        $this->host = HOST;
        $this->user = USER;
        $this->pass = PASS;
        $this->database = DATABASE;
        $this->charset = CHARSET;
    }

    public function connection()
    {
        $con = new mysqli($this->host, $this->user, $this->pass);
        $con->select_db($this->database);
        $con->set_charset($this->charset);
        return $con;
    }
}