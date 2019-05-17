


<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <!--<h2>FORM EXAMPLES</h2>-->
                <div id="RespuestaAjax"></div>
        </div>
        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1 class="text-center">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Emitir compra
                            <!--<small>Edición</small>-->

                        </h1>

                    </div>
                    <input id="print" type="hidden" value="<?= base_url ?>documento/printticket" >
                    <input id="tipo" type="hidden" value="<?= $tipodoc ?>" >
                    <div class="body">
                        <form action="<?= base_url ?>documento/insertcompra" method="POST"  id="FormularioAjaxDocumento" data-form="insert" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->

                                <div class="row">


                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Tipo Doc. </label>
                                            <select class="form-control show-tick" id="tipodoc" name="tipodoc" required="">
                                                <option value="" class="">- Documento  -</option>
                                                <?php
                                                $pred = array('Factura', 'Boleta', 'Guia', 'Liquidacion');

                                                for ($i = 0; $i < count($pred); $i++) {

                                                    echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Serie</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtserie" name="txtserie" value="" required="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Nro</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtnro" name="txtnro" value="" required="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Moneda</label>
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda" required="">

                                                <?php
                                                $pred = array('Soles', 'Dolares');

                                                for ($i = 0; $i < count($pred); $i++) {
                                                    if ($documento->getMoneda() == $pred[$i]) {
                                                        echo '<option value="' . $pred[$i] . '" selected >' . $pred[$i] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $pred[$i] . '"  >' . $pred[$i] . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <!--                                <div class="form-group form-float">-->
                                        <?php
                                        $check = 'checked';
                                        if ($documento->getIncigv() == '0') {
                                            $check = '';
                                        }
                                        ?>
                                        <input type="checkbox" id="incigv" name="incigv" <?= $check ?> />
                                        <label for="incigv">Inc. IGV</label>
                                        <!--</div>-->



                                    </div>
                                </div>


                                    <div class="row">

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->
                                                <label for="dpfechaemision">Fecha Emisión</label>
                                                <div class="form-group">
                                                    <div class="form-line error" id="bs_datepicker_container">
                                                        <input type="text" class="form-control" placeholder="Fecha Emisión" id="dpfechaemision" name="dpfechaemision" value="<?= date('d/m/Y') ?>" required="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->
                                                <label for="dpfechavencimiento">Fecha Vencimiento</label>
                                                <div class="form-group">
                                                    <div class="form-line error" id="bs_datepicker_container">
                                                        <input type="text" class="form-control" placeholder="Fecha Vencimiento" id="dpfechavencimiento" name="dpfechavencimiento" value="<?= date('d/m/Y') ?>" required="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <label class="form-label text-danger" >Tipo Cambio</label>
                                                <div class="form-line focused error">
                                                    <input type="text" class="form-control" id="txttipocambio" name="txttipocambio" value="<?= $cambio->getVenta(); ?>" >

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <label class="form-label" >Sujeto a</label>
                                                <select class="form-control show-tick" id="cbsujetoa" name="cbsujetoa">
                                                    <option value="">- Sujeto a  -</option>
                                                    <?php
                                                    $pred = array('Detracción', 'Retención', 'Percepcion');

                                                    for ($i = 0; $i < count($pred); $i++) {

                                                        echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>


                                    </div>



                                    <div class="h4 text-danger">DATOS DEL PROVEEDOR</div>
                                    <HR>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <input type="hidden" name="idcliente" id="idcliente" value = "<?= (isset($personabydefault)) ? $personabydefault->getId() : $documento->getId() ?>">
                                            <div class="form-group form-float">
                                                <label class="form-label text-danger">RUC/DNI</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="txtrucbuscar" name="txtrucbuscar" value="<?= (isset($personabydefault)) ? $personabydefault->getRuc() : $documento->getRuc() ?>" required="" onkeyup="consultarucDoc('<?= base_url . 'persona/buscar' ?>');">

                                                </div>
                                            </div>
                                            <div id="respuestabusqueda"></div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <label class="form-label text-danger">Razón Social / Nombre </label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="txtcliente" name="txtcliente" value="<?= (isset($personabydefault)) ? $personabydefault->getNombre() : $documento->getRazonsocial() ?>" required="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <label class="form-label">Dirección </label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" value="<?= (isset($personabydefault)) ? $personabydefault->getDireccion() : $documento->getDireccion() ?>" >

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group form-float">
                                                <label class="form-label">Email</label>
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?= (isset($personabydefault)) ? $personabydefault->getEmail() : $documento->getEmail() ?>">

                                                </div>
                                            </div>
                                        </div>






                                    </div>

                                </div>
                                <!--</form>-->

                                <!--</form>-->

                                <!--<label> Productos / Servicios </label>-->
                                <?php require_once 'view/documentodetalle/detallecompra.php'; ?>


                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <div class="card">


                                            <div class="body">


                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="textordenc">Orden de compra</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" id="txtordenc" name="txtordenc"/>
                                                        </div>


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="textobservacion">Observación</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" id="txtobservacion" name="txtobservacion"/>
                                                        </div>
                                                    </div>


                                                </div>






                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <div class="card">


                                            <div class="body">
                                                <div class="row" id="montos">
                                                    <!--                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center exportacion">
                                                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                                                                                
                                                                                                </div> 
                                                                                            </div>
                                                                                           
                                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center gratuita">
                                                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                                                                                
                                                                                                </div> 
                                                                                            </div>
                                                                                           
                                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center exonerado">
                                                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                                                                                
                                                                                                </div> 
                                                                                            </div>
                                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center inafecto">
                                                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
                                                                                                
                                                                                                </div> 
                                                                                            </div>-->

                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                                                        <label class="text-danger" id="lblgravada"><strong>GRAVADA: </strong>  S/ 0.00</label>

                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">

                                                        <label class="text-danger" id="lbligv"><strong>IGV 18%: </strong>  S/ 0.00</label>
                                                    </div>


                                                    <div class="row text-center">
                                                        <!--<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">-->
                                                        <label class="text-danger " id="lbltotal"><strong>TOTAL: </strong>    S/ 0.00</label>
                                                        <!--</div>--> 
                                                    </div>
                                                </div>





                                            </div>



                                        </div>
                                        <button type="submit" class="btn btn-lg btn-success waves-effect" id="guardardocumento" name="guardardocumento">REGISTRAR COMPROBANTE</button>


                                    </div>


                                </div>


                        </form>  

                    </div>
                </div>


            </div>
            <!-- #END# Inline Layout | With Floating Label -->

        </div>
</section>

<!--<script>
$('.bs_datepicker_container').datepicker({
    language: 'es'
});
</script>-->


