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
                <a class="navbar-brand" href="index">L'Italien</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                    {if $tipo_user neq 2}
                        <li><a href="index#masas">Masas</a></li>
                        <li><a href="index#ingredientes">Ingredientes</a></li>
                        <li><a href="index#contacto">Contacto</a></li>
                        <!-- Si hay algun usuario registrado -->
                        {if $tipo_user eq 1}
                            <li><a href="pedido">Nuevo Pedido</a></li>
                            <li><a href="historial">Mis Pedidos</a></li>
                        {/if}
                        <!-- Si el usuario registrado es 'ADMINISTRADOR' -->
                    {else}
                        <li><a href="admingestuser">Gestionar Usuarios</a></li>
                        <li><a href="admingestpizzeria">Gestionar Pizzeria</a></li>
                        <li><a href="adminhistorial">Historial Pedidos</a></li>
                    {/if}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                    {if $tipo_user neq 2}
                        <!-- Si no hay usuarios registrados -->
                        {if $tipo_user eq 0}
                            <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
                            <li><a href="signup"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                            <!-- Si el usuario registrado no es 'ADMINISTRADOR' -->
                        {else}
                            <li><a>{$user} [{$login}]</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="modificar">Modificar</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index?cerrar=">Cerrar Sesión</a>
                                </ul>
                            </li>
                        {/if}
                        <!-- Si el usuario registrado es 'ADMINISTRADOR' -->
                    {else}
                        <li><a>{$user} [Administrador]</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="modificar">Modificar</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index?cerrar=">Cerrar Sesión</a>
                            </ul>
                        </li>
                    {/if}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>