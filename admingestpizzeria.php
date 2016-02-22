<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/masasController.php';

// SI no existe usuario registrado y si existe y no es administrador lo redirecciona a la pag. principal.
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./');

$smarty->assign("success", false);
$smarty->assign("error", false);

// Pinta los errores dependiendo de su procedencia.
if (isset($_POST['updateIng'])) {
    if (updateIngrediente()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

if (isset($_POST['removeIng'])) {
    if (deleteIngrediente()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

if (isset($_POST['saveIng'])) {
    if (insertIng()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

if (isset($_POST['updateMasa'])) {
    if (updateMasa()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

if (isset($_POST['removeMasa'])) {
    if (deleteMasa()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

if (isset($_POST['saveMasa'])) {
    if (insertMasa()) $smarty->assign("success", true);
    else $smarty->assign("error", true);
}

// Muestra todos los datos sobre Masas e ingredientes.
$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());


// Pinta el template
$smarty->display("vistas/gestPizza.tpl");