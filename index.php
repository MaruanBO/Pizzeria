<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';

$masas = getAllMasas();
$ingredientes = getAllIngredientes();

$smarty->assign("masas", $masas);
$smarty->assign("ingredientes", $ingredientes);


// Pinta el template
$smarty->display("vistas/index.tpl");