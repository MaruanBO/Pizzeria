<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
    <script>
        $(document).ready(function () {
            $("#goUp").click(function () {
                $('html,body').animate({
                    scrollTop: 0
                }, 500);
            });

            var $btn = $("#btn-up");
            ($(window).scrollTop() >= 80) ? $btn.show(): $btn.hide();
        });

        $(window).scroll(function () {
            var $btn = $("#btn-up");
            ($(window).scrollTop() >= 80) ? $btn.show() : $btn.hide();
        });
    </script>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
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
            <br />
            <div class="row">
                {foreach key=mid item=masa from=$masas}
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="/vistas/img/masas/{$masa.img}" alt="Masa {$masa.nombre}">
                            <div class="caption">
                                <h3>{$masa.nombre}</h3>
                                <p>{$masa.descripcion}</p>
                            </div>
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                {/foreach}
            </div>
            <!-- /.row -->
            <!-- /MASAS -->
            <hr>
            <h1 id="ingredientes">Ingredientes
                <small> Haz la pizza a tu gusto</small>
            </h1>
            <br />
            <div class="row">
                {foreach key=iid item=ingrediente from=$ingredientes}
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="vistas/img/ingredientes/{$ingrediente.img}"
                                 alt="Ingrediente {$ingrediente.nombre}" style="width: 100%; height: 250px;">
                            <div class="caption">
                                <h3>{$ingrediente.nombreIng}</h3>
                            </div>
                        </div>
                        <!-- /.thumbnail -->
                    </div>
                    <!-- /.col -->
                {/foreach}
            </div>
            <!-- /.row -->
            <!-- /PIZZAS -->
            <hr />
            <h1>¿Donde estamos?</h1>
            <br />
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<div class="row">
    <div class="col-md-12">
        {include file="vistas/inc/map.html"}
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr/>
            <h1 id="contacto">Contacto</h1>
            <br />
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Nombre</label>
                    <div class="col-md-4">
                        <input id="name" name="nombre" type="text" placeholder="Introduzca su nombre"
                               class="form-control input-md" required>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="email" placeholder="Introduzca su email"
                               class="form-control input-md" required>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="asunto">Asunto</label>
                    <div class="col-md-4">
                        <input id="asunto" name="asunto" type="text" placeholder="Introduzca el asunto"
                               class="form-control input-md" required>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="mensaje">Mensaje</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba aquí"
                                  style="resize: vertical;" required></textarea>
                    </div>
                </div>
                <!-- /.form-group -->
                <hr/>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7" style="text-align: center">
                        <button type="submit" name="send" class="btn btn-primary">Enviar</button>
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
<div id="btn-up">
    <button id="goUp" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span></button>
</div>
<!-- /#btn-up -->
{include file="vistas/inc/footer-inc.tpl"}
<!-- /footer -->
</body>
</html>