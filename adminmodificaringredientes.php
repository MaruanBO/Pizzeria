<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';

// Si no existe un usuario registrado y si ese usuario registrado no es administrador lo redireccionara a la principal.
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

if (isset($_POST['nombre'])){
    // Si el usuario selecciona el botón de volver le redireccionara a la pag de gestión de la pizzeria.
    if (isset($_POST['back'])) header('Location: ./admingestpizzeria');

    // Introduce en la variable los datos devueltos de la BD.
    $result = getIngrediente();

    // Introduce los valores de los ingredientes dentro de los nombres de Smarty.
    $smarty->assign("nombre", $result[0]['nombreIng']);
    $smarty->assign("descripcion", $result[0]['descripcion']);
    $smarty->assign("img", $result[0]['img']);

} else {
    header('Location: ./admingestpizzeria');
}


// Pinta el template
$smarty->display("vistas/adminModificarIng.tpl");