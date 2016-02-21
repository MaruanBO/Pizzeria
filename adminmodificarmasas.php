<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

if (isset($_POST['id_masa'])){
    if (isset($_POST['back'])) header('Location: ./admingestpizzeria');

    $result = getMasa();

    $smarty->assign("id_masa", $result[0]['id_masa']);
    $smarty->assign("descripcion", $result[0]['descripcion']);
    $smarty->assign("tamano", $result[0]['tamano']);
    $smarty->assign("precio", $result[0]['precio']);
    $smarty->assign("nombre", $result[0]['nombre']);
    $smarty->assign("img", $result[0]['img']);

} else {
    header('Location: ./admingestpizzeria');
}


// Pinta el template
$smarty->display("vistas/adminModificarMasa.tpl");