
<!-- representa un modal de mantenimiento con un formulario que permite ingresar y editar información de una bodega. Los campos incluyen código, nombre, dirección, dotación, encargado y estado.  -->
<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="bodega_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="bod_id" name="bod_id">

                    <div class="form-group">
                        <label class="form-label" for="bod_cod">Codigo Bodega</label>
                        <input type="text" maxlength="5" class="form-control" id="bod_cod" name="bod_cod" placeholder="Ingrese Codigo" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bod_nom">Nombre Bodega</label>
                        <input type="text" class="form-control" id="bod_nom" name="bod_nom" placeholder="Ingrese Nombre Bodega" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bod_direcc">Direccion</label>
                        <input type="text" class="form-control" id="bod_direcc" name="bod_direcc" placeholder="Ingrese Direccion" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bod_dot">Dotacion</label>
                        <input type="number" class="form-control" id="bod_dot" name="bod_dot" placeholder="Ingrese Dotacion" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="enc_id">Encargado</label>
                        <select class="form-control select2" id="enc_id" name="enc_id" data-placeholder="Seleccionar" style="width: 100%;">
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="est_id">Estado</label>
                        <select class="form-control select2" id="est_id" name="est_id" data-placeholder="Seleccionar" style="width: 100%;">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>