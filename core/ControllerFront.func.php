<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09/02/2016
 * Time: 0:42
 * @param $controller
 * @return
 */

function loadController($controller)
{
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'controllers/' . $controlador . '.php';

    if (!is_file($strFileController))
        $strFileController = 'controllers/' . ucwords(CONTROLADOR_DEFECTO) . 'Controller.php';

    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}

function loadAction($controllerObj, $action)
{
    $accion = $action;
    $controllerObj->$accion();
}

function launchAction($controllerObj)
{
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"]))
        loadAction($controllerObj, $_GET["action"]);
    else
        loadAction($controllerObj, ACCION_DEFECTO);
}