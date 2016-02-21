<?php

// Introduce los archivos que requiere para el funcionamiento.
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';

// Comprueba si el usuario a seleccionado el 'BUTTON' llamado 'access'.
if (isset($_POST['access'])) login();
// Si ya hay usuario logueado te redirecciona al indice.
if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado']) header('Location: ./index.php');

// En caso de que los errores sean superiores a '3' muestra el 'CAPTCHA'
if (isset($_COOKIE['access_error']) && $_COOKIE['access_error'] < 2) $smarty->assign("captcha", false);
elseif (isset($_COOKIE['access_error']) && $_COOKIE['access_error'] >= 2) $smarty->assign("captcha", true);
else $smarty->assign("captcha", false);

// Muestra el error principal
if (isset($log_user)) $smarty->assign("error", $log_user);
else $smarty->assign("error", true);

// Muestra los mensajes de error de los diferentes campos.
$smarty->assign("log_error", $isset_log_user);
$smarty->assign("pass_error", $pass_error);
$smarty->assign("captcha_error", $captcha_error);

// Muestra el 'Template' del login.
$smarty->display("vistas/login.tpl");