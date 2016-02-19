<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

if (isset($_POST['nombre'])){
    if (isset($_POST['back'])) header('Location: ./admingestpizzeria');

    $result = getIngrediente();

    $smarty->assign("nombre", $result[0]['nombreIng']);
    $smarty->assign("descripcion", $result[0]['descripcion']);
    $smarty->assign("img", $result[0]['img']);

} else {
    header('Location: ./admingestpizzeria');
}


// Pinta el template
$smarty->display("vistas/adminModificarIng.tpl");