<!doctype html>
<html lang="en">
<head>
    {include file="inc/head-inc.tpl"}
</head>
<body>
{include file="inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Registrarse</h1>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" placeholder="Enter Login" required>
                        <span class="help-block">Nombre que ver&aacute;n otros usuarios.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Contraseña" required>
                        <span class="help-block">La contraseña tiene que contener mínimo 8 carácteres. Y debe tener 1 mayuscula, mínuscula y un número.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Contraseña" required>
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" placeholder="Enter Nombre" required>
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="firma" placeholder="Enter firma" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="inc/footer-inc.tpl"}
</body>
</html>