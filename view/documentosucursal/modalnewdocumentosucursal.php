<div class="modal fade modaldocserie" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content "> <!-- modal-col-deep-purple-->
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">NUEVO DOCUMENTO SUCURSAL</h4>
            </div>
            <div class="modal-body">
                <form id="formnuevodocsucursal" action="<?= base_url ?>sucursaldocumento/insert" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label text-danger">Sucursal </label>
                                <select class="form-control show-tick" id="cbsucursal" name="cbsucursal"  required="">
                                    <option value="" >- Sucursal - </option>
                                    <?php
                                    foreach ($sucursales as $sucursal) {
                                        if ($sucursal->getId() == $_SESSION['idsucursal']) {
                                            
                                            echo '<option value="' . $sucursal->getId() . '" selected="selected">' . $sucursal->getNombre() . '</option>';
                                        } else {
                                            echo '<option value="' . $sucursal->getId() . '">' . $sucursal->getNombre() . '</option>';
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label text-danger">Tipo de documento </label>
                                <select class="form-control show-tick" id="cbtipodoc" name="cbtipodoc" required="">
                                    <option value="">- Tipo de documento -</option>
                                    <?php
                                    $tipodoc = array('Factura', 'Boleta', 'Nota de Venta', 'Guia de Remision');

                                    for ($i = 0; $i < count($tipodoc); $i++) {
                                       
                                          
                                            echo '<option value="' . $tipodoc[$i] . '" >' . $tipodoc[$i] . '</option>';
                                        
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                         </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label text-danger">Serie </label>
                                <div class="form-line focused error">
                                    <input type="text" class="form-control" id="txtserie" name="txtserie"  required="">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label text-danger">Predeterminado </label>
                                <select class="form-control show-tick" id="cbpredeterminado" name="cbpredeterminado" required="">
                                    <option value="">- Predeterminado -</option>
                                    <?php
                                    $pred = array('Si', 'No');

                                    for ($i = 0; $i < count($pred); $i++) {
                                        
                                            echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                        
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label text-danger">Imprimir en modo </label>
                                <select class="form-control show-tick" id="cbprint" name="cbprint" required="">
                                    <option value="">- Imprimir en modo -</option>
                                    <?php
                                    $print = array('Ticket', 'Otros');

                                    for ($i = 0; $i < count($print); $i++) {
                                        
                                           
                                            echo '<option value="' . $print[$i] . '" >' . $print[$i] . '</option>';
                                        
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect">GUARDAR</button>
                    </form>
                    </div>
                    
                
                <div class="RespuestaAjax"></div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
