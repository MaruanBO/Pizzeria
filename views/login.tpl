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
            <h1>Iniciar Sesión</h1>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" placeholder="Enter Login" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Contraseña" required>
                    </div>
                </div>
                {if $captcha eq true}
                    <div class="form-group captcha">
                        <img class="col-sm-2" src="captcha.php" title="CAPTCHA" alt="CAPTCHA">
                        <label class="control-label col-sm-1" for="captcha">Captcha</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="captcha" placeholder="Enter Captcha" required>
                        </div>
                    </div>
                {/if}
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="inc/footer-inc.tpl"}

</body>
</html>