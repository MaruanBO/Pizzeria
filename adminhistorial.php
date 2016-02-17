<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/pedidosController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index.php');

$smarty->assign("pedidos", getAllPedidos());
$smarty->assign("user_tipo", 2);

// Pinta el template
$smarty->display("vistas/historial.tpl");