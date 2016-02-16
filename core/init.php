<?php

session_start();

require_once("vistas/smarty/libs/Smarty.class.php");

// Instanciar la clase de Smarty
$smarty = new Smarty();
$smarty->setTemplateDir("vistas/smarty/templates/");
$smarty->setCompileDir("vistas/smarty/templates/compile/");

if(isset($_GET['cerrar'])){
    $_SESSION['usuario_logueado'] = false;
    session_destroy();
}

if (isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado']) {
    $smarty->assign("tipo_user", 0);
    $smarty->assign("user", 0);

} elseif (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado']) {
    $smarty->assign("tipo_user", $_SESSION['user']['tipo']);
    $smarty->assign("user", $_SESSION['user']['nombre']);
    $smarty->assign("login", $_SESSION['user']['login']);

} else {
    $smarty->assign("tipo_user", 0);
    $smarty->assign("user", 0);
}