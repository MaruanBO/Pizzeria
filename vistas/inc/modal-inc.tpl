<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Informaci&oacute;n</h3>
            </div>
            <div class="modal-body">
                {if $tipo_user eq 1}
                    <p>
                        Bienvenido cliente, <b>{$user}</b>.
                    </p>
                    <p style="text-align: justify">
                        Como usuario <i>Cliente</i> puedes realizar <a href="pedido">pedidos</a> o ver los pedidos
                        hechos en el <a href="historial">historial pedidos</a>.<br />
                        Tambi&eacute;n puedes modificar tu perfil, seleccionando la flecha la cual se abrir&aacute;
                        un desplegable con las opciones.
                    </p>
                    <p class="text-right small">Conexi&oacute;n · {$time}</p>
                {elseif $tipo_user eq 2}
                    <p>
                        Bienvenido administrador, <b>{$user}</b>.
                    </p>
                    <p style="text-align: justify">
                        Como usuario <i>Administrador</i> puede modificar los datos tanto de la pizzeria como de los usuarios.<br />
                        Gestionar los pedidos realizados por los clientes.
                    </p>
                    <p class="text-right small">Conexi&oacute;n · {$time}</p>
                {else}
                    <p>
                        Bienvenido invitado.
                    </p>
                    <p style="text-align: justify">
                        Como <i>Invitado</i> tan solo puedes ver los productos que ofrecemos para poder realizar un
                        pedido debes de <a href="signup">registrate</a>.<br />
                        En caso de tener m&aacute;s dudas <a href="/#contacto">contacta</a> con nosotros.
                    </p>
                {/if}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>