<div class="modal fade modalcambioclave" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">CAMBIO DE CLAVE</h4>
            </div>
            <div class="modal-body">
                <form id="formcambioclave" action="<?= base_url ?>usuario/updatekey" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" id="txtnuevaclave" name="txtnuevaclave" value="" required="required" >
                                    <label class="form-label">Nueva clave (*)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" id="txtrepitaclave" name="txtrepitaclave" value="">
                                    <label class="form-label">Repita clave (*)</label>
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
