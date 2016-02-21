<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
    <style>
        td {
            vertical-align: middle !important;
        }

        td > img {
            width: 50px;
        }

        td > button {
            width: 100px;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gesti&oacute;n de Usuarios</h1>
            <table id="tableUser" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Firma</th>
                    <th>Avatar</th>
                    <th>Tipo</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {foreach key=uid item=usuario from=$usuarios}
                    <tr id="row{$uid}">
                        <td>{$uid}</td>
                        <td>{$usuario.login}</td>
                        <td>{$usuario.email}</td>
                        <td>{$usuario.nombre}</td>
                        <td>{$usuario.firma}</td>
                        <td><img src="vistas/img/{$usuario.avatar}"></td>
                        <td>{if $usuario.tipo eq 1} Cliente {else} Administrador {/if}</td>
                        <td>
                            <form method="post" action="adminmodificar">
                                <button id="{$uid}" class="btn btn-success" name="change">Modificar</button>
                                <input type="hidden" name="login" value="{$usuario.login}">
                            </form>
                            <form method="post">
                                <button id="{$usuario}" class="btn btn-danger" name="remove">Eliminar</button>
                                <input type="hidden" name="login" value="{$usuario.login}">
                            </form>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            <!-- /.table -->
        </div>
    </div>
</div>
</body>
</html>