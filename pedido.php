<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/pedidosController.php';

$smarty->assign("error_pedido", false);

if(isset($_POST['do_pedido'])){
    if(realizarPedido()) header('Location: ./historial');
    else $smarty->assign("error_pedido", true);
}

$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());

// Pinta el template
$smarty->display("vistas/pedido.tpl");