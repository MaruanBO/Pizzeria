<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pizza</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Masa</th>
                    <th>Ingredientes</th>
                    <th>Unidades</th>
                    <th>Fecha y Hora</th>
                    <th>Servido</th>
                </tr>
                </thead>
                <tbody>
                {foreach key=pid item=pedido from=$pedidos}
                    {if $pedido.servido eq 0}
                        <tr style="color: #921e12;font-weight: bold;">
                            {else}
                        <tr class="success">
                    {/if}
                    <td>{$pid}</td>
                    <td>{$pedido.nombre}</td>
                    <td>{$pedido.ingredientes}</td>
                    <td>{$pedido.unidades}</td>
                    <td>{$pedido.fechayhora}</td>
                    <td>{if $pedido.servido eq 0} No {else} Si {/if}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
{include file="vistas/inc/footer-inc.tpl"}
</body>
</html>