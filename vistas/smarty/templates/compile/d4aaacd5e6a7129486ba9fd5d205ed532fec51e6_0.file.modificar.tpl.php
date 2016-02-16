<?php
/* Smarty version 3.1.29, created on 2016-02-12 20:39:51
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/modificar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56be350717d245_55399657',
  'file_dependency' => 
  array (
    'd4aaacd5e6a7129486ba9fd5d205ed532fec51e6' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/modificar.tpl',
      1 => 1455305990,
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
function content_56be350717d245_55399657 ($_smarty_tpl) {
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
    <div class="row">
        <div class="col-md-12">
            <h1>Configuración</h1>
            <div class="jumbotron">
                <div class="row">
                    <div class="static-info">
                        <div class="col-sm-2 col-xs-4">
                            <img src="vistas/img/<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" alt="Perfil de Pepe" class="img-circle">
                        </div>
                        <div class="col-sm-10 col-xs-6">
                            <div class="page-header">
                                <h3>Login/Nickname
                                    <small class="text-success"><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</small>
                                </h3>
                                <h3>Rango
                                    <small class="text-success"><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</small>
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
                    <label class="control-label col-sm-2" for="pwd">Contraseña Nueva</label>
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
                        <input type="text" class="form-control" id="nombre" placeholder="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" required>
                        <span class="help-block">Debe ser diferente al <i>Login</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
" required>
                        <span class="help-block">Debe contener una @ y un domino. <i>"Ejemplo:
                                ejemplo@gmail.com"</i>.</span>
                    </div>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firma">Firma</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="firma" placeholder="<?php echo $_smarty_tpl->tpl_vars['firma']->value;?>
" required>
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:vistas/inc/footer-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
</html><?php }
}
