<div class="modal fade modalanulardoc" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">ANULACIÓN</h4>
            </div>
            <div class="modal-body">
                <form id="formanulardoc" action="<?= base_url?>documento/anular" method="POST" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                <div class="row">
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                     <label id="nrodoc"></label>
                 </div>
                    
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group form-float">
                        
                        <textarea class="form-control" id="txtmotivo" name="txtmotivo"  placeholder="Motivo de anulación" ></textarea>
                            
                        
                    </div>
                </div>
              
             
            </div>
                   
            </form>    
                <div class="RespuestaAjaxmodal"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning waves-effect" form="formanulardoc">ANULAR</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
            
        </div>
    </div>
</div>
