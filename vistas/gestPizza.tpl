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

        section:first-of-type {
            margin-top: 75px;
        }

        section:last-of-type {
            margin-top: 100px;
        }
    </style>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gesti&oacute;n de Pizzeria</h1>
            {if $error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡La operación no se ha podido realizar con éxito!</b> Vuelva a intentarlo más tarde.
                </div>
            {/if}
            {if $success eq true}
                <div class="alert alert-success" role="alert">
                    <b>¡Operación realizada con éxito!</b>
                </div>
            {/if}
            <section>
                <h2>Masas</h2>
                <hr/>
                <table id="tableMasa" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Grosor (cm)</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=mid item=masa from=$masas}
                        <tr>
                            <td>{$mid}</td>
                            <td>{$masa.nombre}</td>
                            <td>{$masa.descripcion}</td>
                            <td>{$masa.tamano}</td>
                            <td>{$masa.precio} €</td>
                            <td><img src="vistas/img/masas/{$masa.img}"></td>
                            <td>
                                <form method="post" action="adminmodificarmasas">
                                    <button class="btn btn-info" name="update">Modificar</button>
                                    <input type="hidden" name="id_masa" value="{$masa.id_masa}">
                                </form>
                                <form method="post">
                                    <button class="btn btn-danger" name="removeMasa">Eliminar</button>
                                    <input type="hidden" name="id_masa" value="{$masa.id_masa}">
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                    <tr>
                        <td colspan="7" style="text-align: center">
                            <form method="post" action="adminnewmasa">
                                <button type="submit" class="btn btn-success"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table -->
            </section>
            <!-- /section -->
            <section>
                <h2>Ingredientes</h2>
                <hr/>
                <table id="tableIng" class="table table-hover" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach key=iid item=ingrediente from=$ingredientes}
                        <tr>
                            <td>{$iid}</td>
                            <td>{$ingrediente.nombreIng}</td>
                            <td>{$ingrediente.descripcion}</td>
                            <td><img src="vistas/img/ingredientes/{$ingrediente.img}"></td>
                            <td style="text-align: center">
                                <form method="post" action="adminmodificaringrediente">
                                    <button class="btn btn-info" name="update">Modificar</button>
                                    <input type="hidden" name="nombre" value="{$ingrediente.nombreIng}">
                                </form>
                                <form method="post">
                                    <button class="btn btn-danger" name="removeIng">Eliminar</button>
                                    <input type="hidden" name="nombre" value="{$ingrediente.nombreIng}">
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                    <tr>
                        <td colspan="5" style="text-align: center">
                            <form method="post" action="adminnewingrediente">
                                <button type="submit" class="btn btn-success"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table -->
            </section>
            <!-- /section -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
</body>
</html>