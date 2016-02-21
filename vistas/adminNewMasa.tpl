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
                    <h1>Añadir Masa</h1>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="post" action="admingestpizzeria"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="exampleInputFile">Introducir Imagen</label>
                            <div class="col-sm-10">
                                <input type="file" class="" id="exampleInputFile" name="avatar" required>
                                <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="val3">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" placeholder="Enter name" required>
                                <span class="help-block">Nombre de la masa.</span>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="val2">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descripcion"
                                       placeholder="Enter descripcion">
                                <span class="help-block">Descripción de la masa.</span>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="val2">Tamaño</label>
                            <div class="col-sm-10">
                                <input type="number" step="any" class="form-control" name="tamano" placeholder="Enter Tamaño" required>
                                <span class="help-block">Tamaño <i>diametro</i> de la masa.</span>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="val2">Precio</label>
                            <div class="col-sm-10">
                                <input type="number" step="any" class="form-control" name="precio" placeholder="Enter Precio" required>
                                <span class="help-block">Precio de la masa.</span>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <hr/>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="saveMasa" class="btn btn-primary">Guardar</button>
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
</div>
</div>
</body>
</html>