<?php

// Introduce archivo que requiere para el funcionamiento.
require_once 'core/init.php';
require_once 'controladores/usuarioController.php';
require_once 'modelos/Usuario.php';

// Si existe un 'Usuario logueado' se redirecciona al 'Indice'
if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado']) header('Location: ./index.php');

// En caso de que el se haya seleccionado 'Record' llama a la
// función del controlador para crear el usuario.
if(isset($_POST['record'])) create();

// ERRORES A LA HORA DE REGISTRARSE
// Muestra el error principal
if(isset($reg_user)) $smarty->assign("error", $reg_user);
else $smarty->assign("error", true);
// Muestra el mensaje que se ha ingresado con éxito
if(isset($reg_user)) $smarty->assign("success", $reg_user);
else $smarty->assign("success", false);

$smarty->assign("isset", $isset_reg_user);

// Muestra los mensajes de error de los diferentes campos.
$smarty->assign("log_error", $field_login);
$smarty->assign("pass_error", $field_pass);
$smarty->assign("pass2_error", $field_pass2);
$smarty->assign("email_error", $field_email);
$smarty->assign("name_error", $field_name);
$smarty->assign("firma_error", $field_firma);
$smarty->assign("condi_error", $field_condiciones);


// Pinta el Template
$smarty->display("vistas/signup.tpl");