<?php

// Introduce los archivos requeridos
require_once 'core/init.php';
require_once 'controladores/masasController.php';
require_once 'controladores/ingredientesController.php';

// Envia el correo.
if (isset($_POST['send'])) {
    // Varios destinatarios
    $para = 'smx2ortiz@gmail.com';

    // título
    $título = $_POST['asunto'];

    // mensaje
    $mensaje = $_POST['mensaje'];

    // De
    $from = $_POST['email'];

    // Enviarlo
    mail($para, $título, $from . ", " . $mensaje);
}

// Muestra todas las masas y los ingredientes devueltos en la BD.
$smarty->assign("masas", getAllMasas());
$smarty->assign("ingredientes", getAllIngredientes());

// Pinta el template
$smarty->display("vistas/index.tpl");