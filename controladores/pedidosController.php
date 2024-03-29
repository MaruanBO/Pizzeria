<?php

require_once 'modelos/Pedido.php';

function realizarPedido(){
    $login = $_SESSION['user']['login'];
    $id_masa = $_POST['masa'];
    $ingredientes = $_POST['ingredientes'];
    $unidades = $_POST['unidades'];
    $fecha = new DateTime();
    $fechayhora = $fecha->format("Y-m-d H:i:s");

    $pedido = new Pedido();
    $pedido->setLogin($login);
    $pedido->setIdMasa($id_masa);
    $pedido->setIngredientes(implode(',',$ingredientes));
    $pedido->setUnidades($unidades);
    $pedido->setFechayhora($fechayhora);
    $pedido->setNumIng(count($ingredientes));
    $pedido->setServido(0);

    $isWork = $pedido->setPedido();
    return $isWork;
}

function getPedidos(){
    $pedido = new Pedido();
    return $pedido->getAllWithMasaNameBy("login", $_SESSION['user']['login']);
}

function getAllPedidos(){
    $pedido = new Pedido();
    return $pedido->getAllWithMasaName();
}

function updatePedido(){
    $pedido = new Pedido();
    return $pedido->updateById("servido", 1, "id_Pedido", $_POST['idPedido']);
}