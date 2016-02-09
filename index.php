<?php

// Configuración global
require_once 'config/global.php';

// Base para los controladores
require_once 'core/ControllerBase.php';

// Funciones de los controladores frontales
require_once 'core/ControllerFront.func.php';

// Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj = loadController($_GET["controller"]);
    launchAction($controllerObj);
} else {
    $controllerObj = loadController(CONTROLADOR_DEFECTO);
    launchAction($controllerObj);
}