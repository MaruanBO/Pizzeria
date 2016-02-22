<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/pedidosController.php';

// Si no existe usuario registrado lo redirecciona a la pag principal
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado']) header('Location: ./index.php');

// Devuelve todos los pedidos del usuario que los solicita.
$smarty->assign("pedidos", getPedidos());
$smarty->assign("user_tipo", 1);
$smarty->assign("error", true);
$smarty->assign("success", false);

// Pinta el template
$smarty->display("vistas/historial.tpl");