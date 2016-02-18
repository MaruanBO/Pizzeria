<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/masasController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./');

$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());


// Pinta el template
$smarty->display("vistas/gestPizzeria.tpl");