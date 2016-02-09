<!doctype html>
<html lang="en">
<head>
    <?php include_once 'inc/head-inc.php'; ?>
</head>
<body>
<?php include_once 'inc/header-inc.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Configuración</h1>
            <div class="jumbotron">
                <div class="row">
                    <div class="static-info">
                        <div class="col-sm-2 col-xs-4">
                            <img src="img/perfil_default.jpg" alt="Perfil de Pepe" class="img-circle">
                        </div>
                        <div class="col-sm-10 col-xs-6">
                            <div class="page-header">
                                <h3>Login/Nickname
                                    <small class="text-success">Pepeillo</small>
                                </h3>
                                <h3>Rango
                                    <small class="text-success">Cliente</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.static-info -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.jumbotron -->
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="exampleInputFile">Nuevo Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="" id="exampleInputFile">
                        <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="oldpwd">Contraseña Antigua</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="oldpwd" placeholder="Enter Contraseña" required>
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Contraseña" required>
                        <span class="help-block">La contraseña tiene que contener mínimo 8 carácteres. Y debe tener 1 mayuscula, mínuscula y un número.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repwd">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="repwd" placeholder="Enter Contraseña" required>
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" placeholder="Enter Nombre" required>
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="firma" placeholder="Enter firma" required>
                    </div>
                </div>
                <!-- /.form-group -->
                <hr/>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <!-- /.form-group -->
            </form>
            <!-- /.form-horizontal -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

</body>
</html>