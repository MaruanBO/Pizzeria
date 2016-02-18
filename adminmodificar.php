<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./index');

if (isset($_POST['login'])){
    if (isset($_POST['back'])) header('Location: ./admingestuser');

    $result = getUser();

    $smarty->assign("login", $result[0]['login']);
    $smarty->assign("pass", $result[0]['password']);
    $smarty->assign("email", $result[0]['email']);
    $smarty->assign("nombre", $result[0]['nombre']);
    $smarty->assign("firma", $result[0]['firma']);
    $smarty->assign("avatar", $result[0]['avatar']);
    $smarty->assign("tipo", $result[0]['tipo']);

} else {
    header('Location: ./admingestuser');
}


// Pinta el template
$smarty->display("vistas/adminmodificar.tpl");