<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';

// Si no existe usuario registrado o si existe y no es usuario administrador lo redirecciona a la pag principal
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

// Si no se ha enviado una masa por hidden redirecciona a la pag de gestion, ya que se a ingresado a esta de manera no adecuada.
if (isset($_POST['id_masa'])){
    // Si el usuario da al btn volver le reddiecciona la pag de gestion de pizzeria.
    if (isset($_POST['back'])) header('Location: ./admingestpizzeria');

    // Introduce todos los datos de las masa pasada por hidden dentro de la variable.
    $result = getMasa();

    // Introduce los datos de la masa anteriior dentro del nombre para mostrarla a traves de Smarty.
    $smarty->assign("id_masa", $result[0]['id_masa']);
    $smarty->assign("descripcion", $result[0]['descripcion']);
    $smarty->assign("tamano", $result[0]['tamano']);
    $smarty->assign("precio", $result[0]['precio']);
    $smarty->assign("nombre", $result[0]['nombre']);
    $smarty->assign("img", $result[0]['img']);

} else {
    // Redirecciona a la pag. de gestion de la pizzeria.
    header('Location: ./admingestpizzeria');
}


// Pinta el template
$smarty->display("vistas/adminModificarMasa.tpl");