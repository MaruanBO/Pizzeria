<?php
/* Smarty version 3.1.29, created on 2016-02-08 23:50:56
  from "C:\xampp\htdocs\pizzeria\views\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56b91bd03e6335_45094849',
  'file_dependency' => 
  array (
    'b4b0ef514f7f3a52881573606b91a8f522ba8c38' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pizzeria\\views\\index.tpl',
      1 => 1454971850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../views/inc/head-inc.tpl' => 1,
    'file:../views/inc/header-inc.tpl' => 1,
    'file:../views/inc/footer-inc.tpl' => 1,
  ),
),false)) {
function content_56b91bd03e6335_45094849 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../views/inc/head-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../views/inc/header-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                <img src="../views/img/carousel/92.jpg" alt="">
            </div>
            <div class="item">
                <img src="../views/img/carousel/91.jpg" alt="">
            </div>
            <div class="item">
                <img src="../views/img/carousel/94.jpg" alt="">
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
</div>
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1 class="text-center">L'Italien
                    <small>Un pedazito de Italia en Francia</small>
                </h1>
            </div>
            <h1 id="masas">Masas</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/12.jpg" alt="Masa Fina">
                        <div class="caption">
                            <h3>FINA</h3>
                            <p>Nuestra pizza más fina, ligera, crujiente y con todo el sabor de L'Italien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/13.jpg" alt="Masa Clasica">
                        <div class="caption">
                            <h3>CLASICA</h3>
                            <p>Nuestra masa tradicional cubierta con tus ingredientes favoritos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/15.jpg" alt="Masa Clasica">
                        <div class="caption">
                            <h3>RELLENA</h3>
                            <p>Masa fina y ligera con el borde relleno de delicioso queso fundido. Desde 1995.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /MASAS -->
            <hr>
            <h1 id="pizzas">Pizzas</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/12.jpg" alt="Masa Fina">
                        <div class="caption">
                            <h3>FINA</h3>
                            <p>Nuestra pizza más fina, ligera, crujiente y con todo el sabor de L'Italien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/13.jpg" alt="Masa Clasica">
                        <div class="caption">
                            <h3>CLASICA</h3>
                            <p>Nuestra masa tradicional cubierta con tus ingredientes favoritos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://www.pizzahut.es/images/15.jpg" alt="Masa Clasica">
                        <div class="caption">
                            <h3>RELLENA</h3>
                            <p>Masa fina y ligera con el borde relleno de delicioso queso fundido. Desde 1995.</p>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
</div>
<footer>

</footer>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../views/inc/footer-inc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
