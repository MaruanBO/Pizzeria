<?php
/* Smarty version 3.1.29, created on 2016-02-15 20:29:17
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/pedido.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c2270d4311c6_55605231',
  'file_dependency' => 
  array (
    'a706acb8a61f94ef1563dfd0770c54b52e3be52d' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/pedido.tpl',
      1 => 1455564556,
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
function content_56c2270d4311c6_55605231 ($_smarty_tpl) {
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
            <div class="jumbotron">
                <h1>Nuevo Pedido</h1>
                <p>Te imaginas una pizza perfecta. Nosotros te ayudamos a conseguirla.</p>
            </div>
            <h1>Pizza</h1>
            <form class="form-horizontal">
                <fieldset>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic">Masas</label>
                        <div class="col-md-4">
                            <select id="selectbasic" name="masa" class="form-control">
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
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['masa']->value['nombre'];?>
</option>
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
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="checkboxes">Ingredientes</label>
                        <div class="col-md-10">
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
                                <label class="checkbox-inline" for="checkboxes-<?php echo $_smarty_tpl->tpl_vars['iid']->value;?>
">
                                    <input name="ingredientes" id="checkboxes-<?php echo $_smarty_tpl->tpl_vars['iid']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['iid']->value;?>
" type="checkbox">
                                    <?php echo $_smarty_tpl->tpl_vars['ingrediente']->value['nombreIng'];?>

                                </label>
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
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic">Nº Pizzas</label>
                        <div class="col-md-4">
                            <select id="selectbasic" name="numpizzas" class="form-control">
                                <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</option>
                                <?php }
}
?>

                            </select>
                        </div>
                    </div>
                </fieldset>
                <hr />
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="record">Realizar Pedido</button>
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
