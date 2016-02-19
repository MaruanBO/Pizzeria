<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
    <style>
        img {
            width: 150px;
            height: 150px;
        }
    </style>
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
                    <h1>Modificar Masas</h1>
                </div>
            </div>
            <div id="formUser">
                <div class="jumbotron">
                    <div class="row">
                        <div class="static-info">
                            <div class="col-sm-2 col-xs-4">
                                <img src="vistas/img/masas/{$img}" class="img-circle">
                            </div>
                            <div class="col-sm-10 col-xs-6">
                                <div class="page-header">
                                    <h3>Nombre</h3>
                                    <h3 class="text-success">{$nombre}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.static-info -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.jumbotron -->
                <form class="form-horizontal" role="form" method="post" action="admingestpizzeria" enctype="multipart/form-data">
                    <input type="hidden" name="id_masa" value="{$id_masa}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="exampleInputFile">Cambiar Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" class="" id="exampleInputFile" name="avatar">
                            <input type="hidden" name="avatar2" value="{$img}">
                            <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val3">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" id="val3" placeholder="{$nombre}">
                            <input type="hidden" name="nombre2" value="{$nombre}">
                            <span class="help-block">Nombre de la masa.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val2">Descripción</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="descripcion" id="val2" placeholder="{$descripcion}">
                            <input type="hidden" value="{$descripcion}" name="descripcion2">
                            <span class="help-block">Descripción de la masa.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val2">Tamaño</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="tamano" id="val2" placeholder="{$tamano}">
                            <input type="hidden" value="{$tamano}" name="tamano2">
                            <span class="help-block">Tamaño <i>diametro</i> de la masa.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="val2">Precio</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="precio" id="val2" placeholder="{$precio}">
                            <input type="hidden" value="{$precio}" name="precio2">
                            <span class="help-block">Precio de la masa.</span>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="updateMasa" class="btn btn-primary">Guardar</button>
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