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
            <h1>Configuración</h1>
            <div class="jumbotron">
                <div class="row">
                    <div class="static-info">
                        <div class="col-sm-2 col-xs-4">
                            <img src="vistas/img/{$avatar}" alt="Perfil de Pepe" class="img-circle">
                        </div>
                        <div class="col-sm-10 col-xs-6">
                            <div class="page-header">
                                <h3>Login/Nickname
                                    <small class="text-success">{$login}</small>
                                </h3>
                                <h3>Rango
                                    <small class="text-success">{$tipo}</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.static-info -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.jumbotron -->
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
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="exampleInputFile">Nuevo Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="" id="exampleInputFile" name="avatar">
                        <p class="help-block">Tamaño máx. 500KB. Formatos permitidos jpg, gif y png.</p>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="oldpwd">Contraseña Antigua</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="old" id="oldpwd"
                               placeholder="Enter Contraseña">
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña Nueva</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="new" id="pwd" placeholder="Enter Contraseña">
                        <span class="help-block">La contraseña tiene que contener mínimo 8 carácteres. Y debe tener 1 mayuscula, mínuscula y un número.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="repwd">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="renew" id="repwd"
                               placeholder="Enter Contraseña">
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="{$nombre}">
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="{$mail}">
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firma" id="firma" placeholder="{$firma}">
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
            <!-- /.form-horizontal -->
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
{include file="vistas/inc/footer-inc.tpl"}

</body>
</html>