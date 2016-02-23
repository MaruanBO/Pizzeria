<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    {if $error eq false}
        <div class="alert alert-danger" role="alert">
            <b>¡No se ha podido registrar el usuario!</b> Vuelve a intentarlo más tarde.
        </div>
    {/if}
    {if $isset eq true}
        <div class="alert alert-danger" role="alert">
            <b>¡El 'Login' introducido ya existe!</b> Vuelva a intentarlo con otro 'Login'.
        </div>
    {/if}
    {if $success eq true}
        <div class="alert alert-success" role="alert">
            <b>¡El usuario ha sido registrado!</b>
        </div>
    {/if}
    <div class="row">
        <div class="col-md-12">
            <h1>Registrarse</h1>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter Login"
                               required>
                        <span class="help-block">Nombre que ver&aacute;n otros usuarios.</span>
                        {if $log_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Login' vacio.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Contraseña"
                               required>
                        <span class="help-block">La contraseña tiene que contener mínimo 8 carácteres. Y debe tener 1 mayuscula, mínuscula y un número.</span>
                        {if $pass_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio o no cumple los requisitos.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" name="pass2" placeholder="Enter Contraseña"
                               required>
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                        {if $pass2_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio, las contraseñas no coinciden.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter Nombre"
                               required>
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                        {if $name_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Nombre' vacio.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                               required>
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                        {if $email_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Email' vacio o no cumple los requisitos.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firma" name="firma" placeholder="Enter firma"
                               required>
                        {if $firma_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Firma' vacio.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="condiciones" required> He leido y acepto las condiciones
                            </label>
                        </div>
                    </div>
                    {if $condi_error eq true}
                        <div class="alert alert-danger" role="alert">
                            <span>Hay que aceptar el campo de las condiciones.</span>
                        </div>
                    {/if}
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="record">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>