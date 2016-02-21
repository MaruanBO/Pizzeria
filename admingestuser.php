<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./');

if (isset($_POST['change'])) header('Location: ./adminmodificar');
if (isset($_POST['remove'])) deleteUser();
if (isset($_POST['update'])) updateAdmin();

$smarty->assign("usuarios", getAll());

$smarty->assign("old_error", $old_error);
$smarty->assign("new_error", $new_error);
$smarty->assign("renew_error", $renew_error);
$smarty->assign("email_error", $email_error);
$smarty->assign("avatar_error", $avatar_error);
$smarty->assign("all_empty", $all_empty);
$smarty->assign("success_update", $success_update);
$smarty->assign("error_update", $error_update);


// Pinta el template
$smarty->display("vistas/gestUser.tpl");