<?php
/* Smarty version 3.1.29, created on 2016-02-12 15:34:30
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/record.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56bded768ce018_30770906',
  'file_dependency' => 
  array (
    '50ee89fe045d8f7ad80b428cf08deae2fe98d8e6' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/record.tpl',
      1 => 1455287577,
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
function content_56bded768ce018_30770906 ($_smarty_tpl) {
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
            <b>¡No se ha podido registrar el usuario!</b> Vuelve a intentarlo más tarde.
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['isset']->value == true) {?>
        <div class="alert alert-danger" role="alert">
            <b>¡El 'Login' introducido ya existe!</b> Vuelva a intentarlo con otro 'Login'.
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['success']->value == true) {?>
        <div class="alert alert-success" role="alert">
            <b>¡El usuario ha sido registrado!</b>
        </div>
    <?php }?>
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
                        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Contraseña"
                               required>
                        <span class="help-block">La contraseña tiene que contener mínimo 8 carácteres. Y debe tener 1 mayuscula, mínuscula y un número.</span>
                        <?php if ($_smarty_tpl->tpl_vars['pass_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio o no cumple los requisitos.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" name="pass2" placeholder="Enter Contraseña"
                               required>
                        <span class="help-block">La contraseña tiene que coincidir con la anterior.</span>
                        <?php if ($_smarty_tpl->tpl_vars['pass2_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Password' vacio, las contraseñas no coinciden.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter Nombre"
                               required>
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                        <?php if ($_smarty_tpl->tpl_vars['name_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Nombre' vacio.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                               required>
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                        <?php if ($_smarty_tpl->tpl_vars['email_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Email' vacio o no cumple los requisitos.</span>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firma" name="firma" placeholder="Enter firma"
                               required>
                        <?php if ($_smarty_tpl->tpl_vars['firma_error']->value == true) {?>
                            <div class="alert alert-danger" role="alert">
                                <span>Campo del 'Firma' vacio.</span>
                            </div>
                        <?php }?>
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
                    <?php if ($_smarty_tpl->tpl_vars['condi_error']->value == true) {?>
                        <div class="alert alert-danger" role="alert">
                            <span>Hay que aceptar el campo de las condiciones.</span>
                        </div>
                    <?php }?>
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:vistas/inc/footer-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
