<?php
/* Smarty version 3.1.29, created on 2016-02-15 20:07:57
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c2220db2d5d6_38591536',
  'file_dependency' => 
  array (
    '8b374b0188860f0703259f32ef7be1de58ef130d' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/login.tpl',
      1 => 1455562804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:vistas/inc/head-inc.tpl' => 1,
    'file:vistas/inc/header-inc.tpl' => 1,
    'file:vistas/inc/footer-inc.tpl' => 1,
  ),
),false)) {
function content_56c2220db2d5d6_38591536 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:vistas/inc/head-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:vistas/inc/header-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <?php if ($_smarty_tpl->tpl_vars['error']->value == false) {?>
        <div class="alert alert-danger" role="alert">
            <b>¡No se ha podido iniciar sesion!</b> Vuelve a intentarlo más tarde.
        </div>
    <?php }?>
    <div class="row">
        <div class="col-md-12">
            <h1>Iniciar Sesión</h1>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="login">Login</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Enter Login" required>
                        <?php if ($_smarty_tpl->tpl_vars['log_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Login' vacio.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Contraseña" required>
                        <?php if ($_smarty_tpl->tpl_vars['pass_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio o erroneo.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['captcha']->value == true) {?>
                    <div class="form-group captcha">
                        <img class="col-sm-2" src="vistas/captcha.php" title="CAPTCHA" alt="CAPTCHA">
                        <label class="control-label col-sm-1" for="captcha">Captcha</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter Captcha" required>
                            <?php if ($_smarty_tpl->tpl_vars['captcha_error']->value == true) {?>
                                <div class="alert alert-danger" role="alert">
                                    <span>Campo del 'Captcha' vacio o erroneo.</span>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="access">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:vistas/inc/footer-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
</html><?php }
}
