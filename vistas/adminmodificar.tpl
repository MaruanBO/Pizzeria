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
    </style>
    <script>
        $(document).ready(function () {
            for (var i = 1; i <= 2; i++) {
                var name = "";
                (i == 1) ? name = "Cliente" : name = "Administrador";

                $("select#tipos").append("<option>" + name + "</option>");

                if ({$tipo} == i)
                    $("#tipos > option:nth-child(" + i + ")").attr("value", i).attr("selected", "selected");
                else
                    $("#tipos > option:nth-child(" + i + ")").attr("value", i);
            }
        });
    </script>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1">
                    <form method="post">
                        <button class="btn btn-default" name="back" style="margin-top: 21px" data-toggle="tooltip"
                                data-placement="bottom" title="Volver"><span
                                    class="glyphicon glyphicon-chevron-left"></span></button>
                    </form>
                </div>
                <div class="col-md-10">
                    <h1>Modificar de Usuarios</h1>
                </div>
            </div>
            <div id="formUser">
                <div class="jumbotron">
                    <div class="row">
                        <div class="static-info">
                            <div class="col-sm-2 col-xs-4">
                                <img src="vistas/img/{$avatar}" class="img-circle">
                            </div>
                            <div class="col-sm-10 col-xs-6">
                                <div class="page-header">
                                    <h3>Login/Nickname</h3>
                                    <h3 class="text-success">{$login}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.static-info -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.jumbotron -->
                <form class="form-horizontal" role="form" method="post" action="admingestuser" enctype="multipart/form-data">
                    <!-- hiddens para pasar a la base de datos -->
                    <input type="hidden" name="login" value="{$login}">
                    <input type="hidden" name="pass" value="{$pass}">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="exampleInputFile">Nuevo Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" class="" id="exampleInputFile" name="avatar">
                            <input type="hidden" name="avatar2" value="{$avatar}">
                            <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val3">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" id="val3" placeholder="{$nombre}">
                            <input type="hidden" name="nombre2" value="{$nombre}">
                            <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val2">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="val2" placeholder="{$email}">
                            <input type="hidden" value="{$email}" name="email2">
                            <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                    ejemplo@gmail.com"</i>.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val4">Firma</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="firma" id="val4" placeholder="{$firma}">
                            <input type="hidden" value="{$firma}" name="firma2">
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="selectbasic">Tipo</label>
                        <div class="col-sm-10">
                            <select id="tipos" name="tipo" class="form-control">

                            </select>
                            <input type="hidden" value="{$tipo}" name="tipo2">
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