<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/ingredientesController.php';

// Si no existe usuario registrado o si existe y no es usuario administrador lo redirecciona a la pag principal
if (!isset($_SESSION['usuario_logueado']) && !$_SESSION['usuario_logueado'] && $_SESSION['user']['tipo'] != 2)
    header('Location: ./');

// Pinta el template
$smarty->display("vistas/adminNewIng.tpl");