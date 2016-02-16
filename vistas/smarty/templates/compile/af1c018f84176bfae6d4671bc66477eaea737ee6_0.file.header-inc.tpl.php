<?php
/* Smarty version 3.1.29, created on 2016-02-15 20:04:05
  from "/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/inc/header-inc.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56c2212510bc59_56840942',
  'file_dependency' => 
  array (
    'af1c018f84176bfae6d4671bc66477eaea737ee6' => 
    array (
      0 => '/opt/lampp/htdocs/DWServidor/Tema_3/pizzeria/vistas/inc/header-inc.tpl',
      1 => 1455562804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56c2212510bc59_56840942 ($_smarty_tpl) {
?>
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">L'Italien</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                    <?php if ($_smarty_tpl->tpl_vars['tipo_user']->value != 2) {?>
                        <li><a href="index.php#masas">Masas</a></li>
                        <li><a href="index.php#ingredientes">Ingredientes</a></li>
                        <li><a href="index.php#contacto">Contacto</a></li>
                        <li><a href="pedido.php">Nuevo Pedido</a></li>
                        <!-- Si hay algun usuario registrado -->
                        <?php if ($_smarty_tpl->tpl_vars['tipo_user']->value == 1) {?>
                            <li><a href="#">Mis Pedidos</a></li>
                        <?php }?>
                        <!-- Si el usuario registrado es 'ADMINISTRADOR' -->
                    <?php } else { ?>
                        <li><a href="#">Gestionar Usuarios</a></li>
                        <li><a href="#">Gestionar Pizzeria</a></li>
                        <li><a href="#">Historial Pedidos</a></li>
                    <?php }?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                    <?php if ($_smarty_tpl->tpl_vars['tipo_user']->value != 2) {?>
                        <!-- Si no hay usuarios registrados -->
                        <?php if ($_smarty_tpl->tpl_vars['tipo_user']->value == 0) {?>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                            <li><a href="record.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                            <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                        <?php } else { ?>
                            <li><a><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
]</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="modificar.php">Modificar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?cerrar=">Cerrar Sesión</a>
                                </ul>
                            </li>
                        <?php }?>
                        <!-- Si el usuario registrado es 'ADMINISTRADOR' -->
                    <?php } else { ?>
                        <li><a><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 [Administrador]</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="modificar.php">Modificar</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?cerrar=">Cerrar Sesión</a>
                            </ul>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header><?php }
}
