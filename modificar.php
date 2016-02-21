<?php

// Introduce los archivos que requiere para el funcionamiento.
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

// Si ya hay usuario logueado te redirecciona al indice.
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado']) header('Location: ./index.php');

if(isset($_POST['update'])) update();

// Mensajes de error al actualizar.
$smarty->assign("old_error", $old_error);
$smarty->assign("new_error", $new_error);
$smarty->assign("renew_error", $renew_error);
$smarty->assign("email_error", $email_error);
$smarty->assign("avatar_error", $avatar_error);
$smarty->assign("all_empty", $all_empty);
$smarty->assign("success_update", $success_update);
$smarty->assign("error_update", $error_update);

// Muestra los datos del usuario al usuario.
$smarty->assign("login", $_SESSION['user']['login']);
$smarty->assign("avatar", $_SESSION['user']['avatar']);
$smarty->assign("nombre", $_SESSION['user']['nombre']);
$smarty->assign("firma", $_SESSION['user']['firma']);
$smarty->assign("mail", $_SESSION['user']['email']);
if($_SESSION['user']['tipo'] == 1) $smarty->assign("tipo", "Cliente");
else $smarty->assign("tipo", "Administrador");

$smarty->display("vistas/modificar.tpl");