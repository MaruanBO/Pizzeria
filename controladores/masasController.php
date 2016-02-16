<?php

require_once 'modelos/Masa.php';

function getAllMasas(){
    $masa = new Masa();
    return $masa->getAll();
}