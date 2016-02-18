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
    </style>
    <script>
        $(document).ready(function () {
            $("#formUser").hide();

            $("button[name='change']").click(function () {
                $("#tableUser").hide(500);
                $("#formUser").toggle(1500);

                var $id = $(this).attr("id");
                var $row = $("tr#row" + $id + " > td");
                $row.each(function (index) {
                    $("#val" + index).attr("placeholder", $(this).text());
                    $("#hid" + index).attr("value", $(this).text());
                });

                // Pass
                $("#hidPass").attr("value", $("input#pass").val());
                // Login
                $("#valLogin").text($("tr#row" + $id + " td:nth-child(2)").text());
                // Avatar
                $("img#valImg").attr("src", $("img").attr("src"));
                $("#hidAvatar").attr("value", $("input#nameImg").val());
                // Tipo
                $("#hidTipo").attr("value", $("input#tipo").val());


                for (var i = 1; i <= 2; i++) {
                    var name = "";
                    (i == 1) ? name = "Cliente" : name = "Administrador";
                    $("select#tipos").append("<option>" + name + "</option>");

                    if ($("tr#row" + $id + " input#tipo").val() == i)
                        $("#tipos > option:nth-child(" + i + ")").attr("value", i).attr("selected", "selected");
                    else
                        $("#tipos > option:nth-child(" + i + ")").attr("value", i);
                }
            });
        });
    </script>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gesti&oacute;n de Usuarios</h1>
            {if $old_error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> La 'contraseña antigua' no coincide con la anterior.
                </div>
            {elseif $new_error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> La 'contraseña nueva' no cumple los requisitos.
                </div>
            {elseif $renew_error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> Las contraseñas no coinciden.
                </div>
            {elseif $email_error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> El 'email' introducido no cumple los requisitos.
                </div>
            {elseif $avatar_error eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> La foto de 'avatar' introducida no cumple los
                    requisitos.
                </div>
            {elseif $all_empty eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> Todos los campos están vacios.
                </div>
            {elseif $success_update eq true}
                <div class="alert alert-success" role="alert">
                    <b>¡Se han actualizado los datos!</b>
                </div>
            {elseif $error_update eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se han podido actualizar los datos!</b> Vuelva a intentarlo más tarde.
                </div>
            {/if}
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
                            <button id="{$uid}" class="btn btn-success" name="change">Modificar</button>
                        </td>
                        <!-- hiddens para pasar info al formulario posterior -->
                        <input type="hidden" id="pass" value="{$usuario.password}">
                        <input type="hidden" id="nameImg" value="{$usuario.avatar}">
                        <input type="hidden" id="tipo" value="{$usuario.tipo}">
                    </tr>
                {/foreach}
                </tbody>
            </table>
            <!-- /.table -->
            <!-- PARA PODER MODIFICAR EL USUARIO -->
            <div id="formUser">
                <div class="jumbotron">
                    <div class="row">
                        <div class="static-info">
                            <div class="col-sm-2 col-xs-4">
                                <img id="valImg" class="img-circle">
                            </div>
                            <div class="col-sm-10 col-xs-6">
                                <div class="page-header">
                                    <h3>Login/Nickname</h3>
                                    <h3 class="text-success" id="valLogin"></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.static-info -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.jumbotron -->
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <!-- hiddens para pasar a la base de datos -->
                    <input type="hidden" id="hid0" name="login">
                    <input type="hidden" id="hidPass" name="old">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="exampleInputFile">Nuevo Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" class="" id="exampleInputFile" name="avatar">
                            <input type="hidden" id="hidAvatar" name="avatar2">
                            <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val3">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" id="val3">
                            <input type="hidden" id="hid3" name="nombre2">
                            <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val2">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="val2">
                            <input type="hidden" id="hid2" name="email2">
                            <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                    ejemplo@gmail.com"</i>.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val4">Firma</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="firma" id="val4">
                            <input type="hidden" id="hid4" name="firma2">
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="selectbasic">Tipo</label>
                        <div class="col-sm-10">
                            <select id="tipos" name="tipo" class="form-control">

                            </select>
                            <input type="hidden" id="hidTipo" name="tipo2">
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="update" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /#formUser -->
        </div>
    </div>
</div>
</body>
</html>