<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pedidos</h1>
            {if $error eq false}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se ha podido actualizar el pedido!</b> Vuelva a intentarlo más tarde.
                </div>
            {/if}
            {if $success eq true}
                <div class="alert alert-success" role="alert">
                    <b>¡El pedido ha sido actualizado!</b>
                </div>
            {/if}
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
                        {if $user_tipo eq 2}
                            <th></th>
                        {/if}
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=pid item=pedido from=$pedidos}
                        {if $pedido.servido eq 0}
                            <tr style="color: #921e12;font-weight: bold;">
                                {else}
                            <tr style="color: #0f7864;">
                        {/if}
                        <form method="post">
                            <input type="hidden" name="idPedido" value="{$pedido.id_Pedido}">
                            {if $user_tipo eq 1}
                                <td>{$pid}</td>
                            {else}
                                <td>{$pedido.login}</td>
                            {/if}
                            <td>{$pedido.nombre}</td>
                            <td>{$pedido.ingredientes}</td>
                            <td>{$pedido.unidades}</td>
                            <td>{math equation="(masa + num) * uni" masa=$pedido.precio num=$pedido.numIng uni=$pedido.unidades}
                                €
                            </td>
                            <td>{$pedido.fechayhora}</td>
                            <td>{if $pedido.servido eq 0} No {else} Si {/if}</td>
                            {if $user_tipo eq 2 and $pedido.servido eq 0}
                                <td>
                                    <button type="submit" name="isServido" class="btn btn-success">Servido</button>
                                </td>
                            {/if}
                        </form>
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