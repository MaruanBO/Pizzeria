<?php

require_once 'modelos/Ingrediente.php';

function getAllIngredientes(){
    $ingrediente = new Ingrediente();
    return $ingrediente->getAll();
}