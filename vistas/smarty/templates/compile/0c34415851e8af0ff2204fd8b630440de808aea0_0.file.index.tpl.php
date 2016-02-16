<?php
/* Smarty version 3.1.29, created on 2016-02-15 20:04:05
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c221250d29e0_95064449',
  'file_dependency' => 
  array (
    '0c34415851e8af0ff2204fd8b630440de808aea0' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/index.tpl',
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
function content_56c221250d29e0_95064449 ($_smarty_tpl) {
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

<!-- /header -->
<div class="container-carousel">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="vistas/img/carousel/92.jpg" alt="">
            </div>
            <div class="item">
                <img src="vistas/img/carousel/91.jpg" alt="">
            </div>
            <div class="item">
                <img src="vistas/img/carousel/94.jpg" alt="">
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
</div>
<!-- /.container-carousel -->
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1 class="text-center">L'Italien
                    <small>Un pedazito de Italia en Francia</small>
                </h1>
            </div>
            <!-- /.page-header -->
            <h1 id="masas">Masas</h1>
            <div class="row">
                <?php
$_from = $_smarty_tpl->tpl_vars['masas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_masa_0_saved_item = isset($_smarty_tpl->tpl_vars['masa']) ? $_smarty_tpl->tpl_vars['masa'] : false;
$__foreach_masa_0_saved_key = isset($_smarty_tpl->tpl_vars['mid']) ? $_smarty_tpl->tpl_vars['mid'] : false;
$_smarty_tpl->tpl_vars['masa'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mid'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['masa']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mid']->value => $_smarty_tpl->tpl_vars['masa']->value) {
$_smarty_tpl->tpl_vars['masa']->_loop = true;
$__foreach_masa_0_saved_local_item = $_smarty_tpl->tpl_vars['masa'];
?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['masa']->value['img'];?>
" alt="Masa <?php echo $_smarty_tpl->tpl_vars['masa']->value['nombre'];?>
">
                            <div class="caption">
                                <h3><?php echo $_smarty_tpl->tpl_vars['masa']->value['nombre'];?>
</h3>
                                <p><?php echo $_smarty_tpl->tpl_vars['masa']->value['descripcion'];?>
</p>
                            </div>
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                <?php
$_smarty_tpl->tpl_vars['masa'] = $__foreach_masa_0_saved_local_item;
}
if ($__foreach_masa_0_saved_item) {
$_smarty_tpl->tpl_vars['masa'] = $__foreach_masa_0_saved_item;
}
if ($__foreach_masa_0_saved_key) {
$_smarty_tpl->tpl_vars['mid'] = $__foreach_masa_0_saved_key;
}
?>
            </div>
            <!-- /.row -->
            <!-- /MASAS -->
            <hr>
            <h1 id="ingredientes">Ingredientes <small>Para hacer tu pizza a tu gusto</small></h1>
            <div class="row">
                <?php
$_from = $_smarty_tpl->tpl_vars['ingredientes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ingrediente_1_saved_item = isset($_smarty_tpl->tpl_vars['ingrediente']) ? $_smarty_tpl->tpl_vars['ingrediente'] : false;
$__foreach_ingrediente_1_saved_key = isset($_smarty_tpl->tpl_vars['iid']) ? $_smarty_tpl->tpl_vars['iid'] : false;
$_smarty_tpl->tpl_vars['ingrediente'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['iid'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ingrediente']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['iid']->value => $_smarty_tpl->tpl_vars['ingrediente']->value) {
$_smarty_tpl->tpl_vars['ingrediente']->_loop = true;
$__foreach_ingrediente_1_saved_local_item = $_smarty_tpl->tpl_vars['ingrediente'];
?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['ingrediente']->value['img'];?>
" alt="Ingrediente <?php echo $_smarty_tpl->tpl_vars['ingrediente']->value['nombre'];?>
" style="width: 100%; height: 250px;">
                            <div class="caption">
                                <h3><?php echo $_smarty_tpl->tpl_vars['ingrediente']->value['nombreIng'];?>
</h3>
                            </div>
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                <?php
$_smarty_tpl->tpl_vars['ingrediente'] = $__foreach_ingrediente_1_saved_local_item;
}
if ($__foreach_ingrediente_1_saved_item) {
$_smarty_tpl->tpl_vars['ingrediente'] = $__foreach_ingrediente_1_saved_item;
}
if ($__foreach_ingrediente_1_saved_key) {
$_smarty_tpl->tpl_vars['iid'] = $__foreach_ingrediente_1_saved_key;
}
?>
            </div>
            <!-- /.row -->
            <!-- /PIZZAS -->
            <hr/>
            <h1 id="contacto">Contacto</h1>
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Nombre</label>
                    <div class="col-md-4">
                        <input id="name" name="nombre" type="text" placeholder="Introduzca su nombre"
                               class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="email" placeholder="Introduzca su email"
                               class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="asunto">Asunto</label>
                    <div class="col-md-4">
                        <input id="asunto" name="asunto" type="text" placeholder="Introduzca el asunto"
                               class="form-control input-md">
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="mensaje">Mensaje</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba aquí"
                                  style="resize: vertical;"></textarea>
                    </div>
                </div>
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

<!-- /footer -->
</body>
</html><?php }
}
