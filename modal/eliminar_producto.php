<!-- Modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">¿Seguro que deséa eliminar este registro?</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="editar_password" name="editar_password">
                    <div id="mensajeAjax"></div>
                    <div class="form-group">
                        <div class="col-sm-8">
                            <input type="hidden" id="product_id" name="prodictId">
                            <div class="container">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger" id="eliminarProducto">Eliminar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>