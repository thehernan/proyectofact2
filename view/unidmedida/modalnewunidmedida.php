<div class="modal fade modalunidmedida" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">NUEVA UNID. MEDIDA</h4>
            </div>
            <div class="modal-body">
                <form id="formnuevaunidmedida" action="<?= base_url ?>medida/insert" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line focused error">
                                    <input type="text" class="form-control" id="txtdescripcionunid" name="txtdescripcionunid" value="" required="required" >
                                    <label class="form-label">Descripción</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="txtcodunid" name="txtcodunid" value="">
                                    <label class="form-label">Cod. Marca</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="txtordenunid" name="txtordenunid" value="">
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
