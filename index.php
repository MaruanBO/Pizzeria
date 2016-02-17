<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';

$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());

// Pinta el template
$smarty->display("vistas/index.tpl");