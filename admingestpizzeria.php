<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';
require_once 'controladores/masasController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./');

$smarty->assign("success", false);
$smarty->assign("error", false);

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

$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());


// Pinta el template
$smarty->display("vistas/gestPizza.tpl");