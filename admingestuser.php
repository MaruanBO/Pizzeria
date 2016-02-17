<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index.php');

if(isset($_POST['update']))

$smarty->assign("usuarios", getAll());


// Pinta el template
$smarty->display("vistas/gestUser.tpl");