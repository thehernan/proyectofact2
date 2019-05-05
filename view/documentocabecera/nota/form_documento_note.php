


<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <!--<h2>FORM EXAMPLES</h2>-->
            <!--    <div class="RespuestaAjax"></div>-->
        </div>
        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1 class="text-center">
                            <span class="glyphicon glyphicon-file"></span> <?= $titulo ?>
                            <!--<small>Edición</small>-->

                        </h1>


                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <button type="button" data-color="deep-purple" class="btn bg-teal waves-effect" data-toggle="modal" data-target=".modaldocserie"><span class="glyphicon glyphicon-plus"></span> DOC-SERIE</button>
                            </div>
                        </div>

                    </div>

                    <input id="print" type="hidden" value="<?= base_url ?>documento/printticket" >
                    <input id="tipodoc" type="hidden" value="<?= $tipodoc ?>" >
                    <input id="tipo" type="hidden" value="<?= $tipodoc ?>" >
                    <div class="body">
                        <form action="<?= base_url ?>documento/insertnota" method="POST"  id="FormularioAjaxDocumento" data-form="insert" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <div class="row">
                                    <input type="hidden"  id="tiponota" name="tiponota" value="<?= $tipo ?>">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float" id="divserie">
                                            <label class="text-danger">Doc-Serie </label>
                                            <select class="form-control show-tick" id="cbserie" name="cbserie" required="" onchange="ultimonumerodoc('<?=base_url?>documento/selectmaxnro');">
                                                <option value="" class="">- Doc-Serie  -</option>
                                                <?php
                                                foreach ($documentossuc as $docsucur) {

                                                    echo '<option value="' . $docsucur->getSerie() . '">' . $docsucur->getTipodoc() . '-' . $docsucur->getSerie() . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Nro: </label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtnro" name="txtnro" value=""  readonly="">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda" required="">

                                                <?php
                                                $pred = array('Soles', 'Dolares');

                                                for ($i = 0; $i < count($pred); $i++) {

                                                    echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <!--                                <div class="form-group form-float">-->
                                        <input type="checkbox" id="incigv" name="incigv" checked />
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
                                                <div class="form-line" id="bs_datepicker_container">
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
                                                <div class="form-line" id="bs_datepicker_container">
                                                    <input type="text" class="form-control" placeholder="Fecha Vencimiento" id="dpfechavencimiento" name="dpfechavencimiento" value="<?= date('d/m/Y') ?>" required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>





                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Tipo Operacion</label>
                                            <select class="form-control show-tick" data-live-search="true" id="cbtipoop" name="cbtipoop" required="">

                                                <?php
                                                foreach ($transactions as $transaction) {

                                                    echo '<option value="' . $transaction->getId() . '">' . $transaction->getDescripcion() . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>








                                </div>


                                <!--                        <div class="h3 text-danger">DATOS DEL CLIENTE</div>
                                                        <HR>-->
                                <div class="row">
                                    <input type="hidden" id="idcliente" name="idcliente" value="<?= $documento->getIdpersona(); ?>">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">RUC/DNI</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtrucbuscar" name="txtrucbuscar" value="<?= $documento->getRuc(); ?>" required="" onkeyup="consultarucDoc('<?= base_url . 'persona/buscar' ?>');">

                                            </div>
                                        </div>
                                        <div id="respuestabusqueda"></div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Razón Social </label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtcliente" name="txtcliente" value="<?= $documento->getRazonsocial(); ?>" required="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Dirección </label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" value="<?= $documento->getDireccion(); ?>" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Email</label>
                                            <div class="form-line">
                                                <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?= $documento->getEmail(); ?>">

                                            </div>
                                        </div>
                                    </div>






                                </div>


                                <!--</form>-->
                            </div>
                        <!--</form>-->

                        <!--<label> Productos / Servicios </label>-->
                         <?php require_once 'view/documentodetalle/detalleventa.php'; ?>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                <div class="card">
                                    <div class="header bg-blue text-center">
                                        <label>Seleccionar comprobante a modificar</label>

                                    </div>


                                    <div class="body">
                                        <!--                                <div class="row align-center" >
                                                                            <button type="button"  class="btn btn-primary waves-effect" data-toggle="modal" data-target=".modalguia">Seleccionar comprobante a modificar</button>
                                                                            
                                                                        </div>
                                                                        <hr>-->

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group form-float">
                                                    <label class="text-danger">Documento a modificar</label>
                                                    <select class="form-control show-tick" id="cbdocref" name="cbdocref" required="">

                                                        <?php
                                                        $pred = array('Factura electrónica', 'Boleta electrónica');

                                                        for ($i = 0; $i < count($pred); $i++) {

                                                            echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group form-float">
                                                    <label for="textobservacion" class="text-danger">Serie</label>
                                                    <div class="form-line focused error">
                                                        <input type="text" class="form-control" id="txtserieref" name="txtserieref" required=""/>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group form-float">
                                                    <label for="textobservacion" class="text-danger">Número</label>
                                                    <div class="form-line focused error">
                                                        <input type="text" class="form-control" id="txtnumeroref" name="txtnumeroref" required=""/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group form-float">
                                                    <label class="text-danger">Tipo de nota</label>
                                                    <select class="form-control show-tick" id="cbidtiponota" name="cbidtiponota" required="">

                                                        <?php
                                                        foreach ($notas as $nota) {

                                                            echo '<option value="' . $nota->getId() . '" >' . $nota->getDescripcion() . '</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>






                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group form-float">
                                                    <label for="textobservacion" class="text-danger">Motivo de nota</label>
                                                    <div class="form-line focused error">
                                                        <input type="text" class="form-control" id="txtobservacion" name="txtobservacion" required=""/>
                                                    </div>
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
                                <button class="btn btn-lg btn-success waves-effect">REGISTRAR COMPROBANTE</button>


                            </div>


                        </div>



                        <!-- modal Guia ----------->
                        <?php require_once 'view/documentocabecera/modalguias.php'; ?>



                        <!------------------------------>
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


