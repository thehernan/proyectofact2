<div class="modal fade modallinea" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">NUEVA LINEA</h4>
            </div>
            <div class="modal-body">
                <form id="formnuevalinea" action="<?= base_url?>linea/insert" method="POST" autocomplete="off">
                <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group form-float">
                        <div class="form-line focused error">
                            <input type="text" class="form-control" id="txtdescripcionlinea" name="txtdescripcionlinea" value="" required="required" >
                            <label class="form-label text-center">Descripción</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="txtcodlinea" name="txtcodlinea" value="">
                            <label class="form-label">Cod. Marca</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" id="txtordenlinea" name="txtordenlinea" value="">
                            <label class="form-label">Orden</label>
                        </div>
                    </div>
                </div>
            </div>
                    <button type="submit" class="btn btn-primary waves-effect">GUARDAR</button>
                </form>
                <div class="RespuestaAjax"></div>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>