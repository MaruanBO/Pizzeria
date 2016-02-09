<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09/02/2016
 * Time: 0:39
 */
class HelpViews
{

    public function url($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO)
    {
        $urlString = "?controller=$controlador&action=$accion";
        return $urlString;
    }
}