<!doctype html>
<html lang="en">
<head>
    {include file="vistas/inc/head-inc.tpl"}
    <script>
        // Al cargar la página iniciará este código.
        $(document).ready(function () {
            // Calcula el precio de los productos por defecto.
            calcular();

            // Al realizar algún cambio en el select vuelve a calcular los precios.
            $("select").change(function(){
                calcular();
            });

            // Al realizar algún cambio (marcando o desmarcando) chenbox vuelve a calcular el precio.
            $("input[type='checkbox']").change(function() {
                calcular();
            });
        });

        // Función para calcular el coste de los datos seleccionados en el pedido.
        var calcular = function(){
            // Obtiene los datos para realizar la operación.
            var $masa = $("select[name='masa'] option:selected").attr("name");
            var $numIng= $('input:checkbox:checked').length;
            var $uni = $("select[name='unidades'] option:selected").val();

            // Realiza la operación y la introduce dentro del INPUT
            $("#precio").val((parseFloat($masa) + parseFloat($numIng)) * parseInt($uni) + " E");
        };
    </script>
</head>
<body>
{include file="vistas/inc/header-inc.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Nuevo Pedido</h1>
                <p>Te imaginas una pizza perfecta. Nosotros te ayudamos a conseguirla.</p>
            </div>
            <h1>Pizza</h1>
            {if $error_pedido eq true}
                <div class="alert alert-danger" role="alert">
                    <b>¡No se ha podido realizar el pedido!</b> Vuelve a intentarlo más tarde.
                </div>
            {/if}
            <form class="form-horizontal" method="post">
                <fieldset>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic">Masas</label>
                        <div class="col-md-4">
                            <select id="selectbasic" name="masa" class="form-control">
                                {foreach key=mid item=masa from=$masas}
                                    <option value="{$masa.id_masa}" name="{$masa.precio}">{$masa.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes (inline) -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="checkboxes">Ingredientes</label>
                        <div class="col-md-10">
                            {foreach key=iid item=ingrediente from=$ingredientes}
                                <label class="checkbox-inline" for="checkboxes-{$iid}">
                                    <input name="ingredientes[]" id="checkboxes-{$iid}" value="{$ingrediente.nombreIng}" type="checkbox">
                                    {$ingrediente.nombreIng}
                                </label>
                            {/foreach}
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic">Nº Pizzas</label>
                        <div class="col-md-4">
                            <select id="selectbasic" name="unidades" class="form-control">
                                {for $foo=1 to 10}
                                    <option value="{$foo}">{$foo}</option>
                                {/for}
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="textinput">Precio</label>
                        <div class="col-md-4">
                            <input id="precio" name="textinput" readonly type="text" placeholder="placeholder" class="form-control input-md">
                        </div>
                    </div>
                </fieldset>
                <hr />
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="do_pedido">Realizar Pedido</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>