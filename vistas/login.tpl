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
            <b>¡No se ha podido iniciar sesion!</b> Vuelve a intentarlo más tarde.
        </div>
    {/if}
    <div class="row">
        <div class="col-md-12">
            <h1>Iniciar Sesión</h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter Login">
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
                        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Contraseña">
                        {if $pass_error eq true}
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio o erroneo.</span>
                            </div>
                        {/if}
                    </div>
                </div>
                {if $captcha eq true}
                    <div class="form-group captcha">
                        <img class="col-sm-2" src="vistas/captcha.php" title="CAPTCHA" alt="CAPTCHA">
                        <label class="control-label col-sm-1" for="captcha">Captcha</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter Captcha">
                            {if $captcha_error eq true}
                                <div class="alert alert-danger" role="alert">
                                    <span>Campo del 'Captcha' vacio o erroneo.</span>
                                </div>
                            {/if}
                        </div>
                    </div>
                {/if}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="access">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="vistas/inc/footer-inc.tpl"}

</body>
</html>