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
            <h1>Pedidos</h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        {if $user_tipo eq 1}
                            <th>#</th>
                        {else}
                            <th>Login</th>
                        {/if}
                        <th>Masa</th>
                        <th>Ingredientes</th>
                        <th>Unidades</th>
                        <th>Precio</th>
                        <th>Fecha y Hora</th>
                        <th>Servido</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=pid item=pedido from=$pedidos}
                        {if $pedido.servido eq 0}
                            <tr style="color: #921e12;font-weight: bold;">
                                {else}
                            <tr style="color: #0f7864;">
                        {/if}
                        {if $user_tipo eq 1}
                            <td>{$pid}</td>
                        {else}
                            <td>{$pedido.login}</td>
                        {/if}
                        <td>{$pedido.nombre}</td>
                        <td>{$pedido.ingredientes}</td>
                        <td>{$pedido.unidades}</td>
                        <td>{math equation="(masa + num) * uni" masa=$pedido.precio num=$pedido.numIng uni=$pedido.unidades} Eur.</td>
                        <td>{$pedido.fechayhora}</td>
                        <td>{if $pedido.servido eq 0} No {else} Si {/if}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{include file="vistas/inc/footer-inc.tpl"}
</body>
</html>