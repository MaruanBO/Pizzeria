<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/pedidosController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index.php');

if (isset($_POST['isServido']))
    $refresh = updatePedido();

if(isset($refresh)) $smarty->assign("error", $refresh);
else $smarty->assign("error", true);
// Muestra el mensaje que se ha ingresado con éxito
if(isset($refresh)) $smarty->assign("success", $refresh);
else $smarty->assign("success", false);

$smarty->assign("pedidos", getAllPedidos());
$smarty->assign("user_tipo", 2);

// Pinta el template
$smarty->display("vistas/historial.tpl");