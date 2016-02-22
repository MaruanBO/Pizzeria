<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

// Si no existe ningún usuario logueado y si existe y no es administrador redirecciona a la página principal.
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

// En caso de que no se haya recibido ningun usuario del cual mostrar datos redireccionara al gestor.
if (isset($_POST['login'])){
    // Si el usuario ha seleccionado el btn de volver volvera a la pag. de gestión.
    if (isset($_POST['back'])) header('Location: ./admingestuser');

    // Guarda los datos devueltos de la conslta de la BD.
    $result = getUser();

    // Crea los nombres en los que guarda los datos del usuario para mostrarlos por Smarty.
    $smarty->assign("login", $result[0]['login']);
    $smarty->assign("pass", $result[0]['password']);
    $smarty->assign("email", $result[0]['email']);
    $smarty->assign("nombre", $result[0]['nombre']);
    $smarty->assign("firma", $result[0]['firma']);
    $smarty->assign("avatar", $result[0]['avatar']);
    $smarty->assign("tipo", $result[0]['tipo']);

} else {
    // Redirecciona al gestor.
    header('Location: ./admingestuser');
}


// Pinta el template
$smarty->display("vistas/adminModificar.tpl");