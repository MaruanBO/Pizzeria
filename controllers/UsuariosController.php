<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09/02/2016
 * Time: 0:57
 */
require_once '../Pizzeria/models/Usuario.php';
require_once '../Pizzeria/models/UsuarioDao.php';

class UsuariosController extends ControllerBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Creamos el objeto usuario
        $usuario = new Usuario();

        // Conseguimos todos los usuarios
        $allUsers = $usuario->getAll();

        // Cargamos la vista index y le pasamos los valores
        $this->view("index", array(
            "allUsers" => $allUsers,
            "Hola" => "Soy Alex Ortiz"
        ));
    }

    public function create(){
        if(isset($_POST['login'])){

            // Creamos un usuario
            $usuario = new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setPassword($_POST['pass']);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setEmail($_POST['email']);
            $usuario->setAvatar($_POST['avatar']);
            $usuario->setFirma($_POST['firma']);
            $usuario->setTipo($_POST['tipo']);
            $setUser = $usuario->setUser();
        }

        $this->redirect("Usuarios", "index");
    }

    public function borrar(){
        if(isset($_GET['id'])){
            $id = (int) $_GET['id'];

            $usuario = new Usuario();
            $usuario->deleteById($id);
        }
        $this->redirect();
    }

    public function hola(){
        $usuarios = new UsuarioDao();
        $getUser = $usuarios->getUser();
        var_dump($getUser);
    }
}