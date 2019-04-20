


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
                            <span class="glyphicon glyphicon-shopping-cart"></span> Emitir comprobante electrónico
                            <!--<small>Edición</small>-->

                        </h1>


                        <hr>
                        <input id="url" type="hidden" value="<?= base_url ?>documento/insert" >


                    </div>
                    <div class="body">
                        <form action="<?= base_url ?>documento/insert" method="POST"  id="FormularioAjaxDocumento" data-form="insert" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <button type="button" data-color="deep-purple" class="btn bg-teal waves-effect" data-toggle="modal" data-target=".modalcambioclave"><span class="glyphicon glyphicon-plus"></span> DOC-SERIE</button>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Doc-Serie </label>
                                            <select class="form-control show-tick" id="cbserie" name="cbserie" required="">
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
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtnro" name="txtnro" value="" required="">
                                                <label class="form-label">Nro: (*)</label>
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
                                        <input type="checkbox" id="incigv" checked />
                                        <label for="incigv">Inc. IGV</label>
                                        <!--</div>-->
                                    </div>




                                </div>
                                <div class="row">

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <!--                                <h2 class="card-inside-title">Aniversario</h2>-->
                                            <label for="dpfechaemision">Fecha Emisión</label>
                                            <div class="form-group ">
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

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Vendedor </label>
                                            <select class="form-control show-tick" id="cbvendedor" name="cbvendedor" required="">
                                                <option value="">- Vendedor (*) -</option>
                                                <?php
                                                foreach ($usuarios as $usuario) {
                                                    if ($usuario->getId() == $_SESSION['id']) {

                                                        echo '<option value="' . $usuario->getId() . '" selected>' . $usuario->getNombre() . ' ' . $usuario->getApellidop() . '</option>';
                                                    } else {
                                                        echo '<option value="' . $usuario->getId() . '" >' . $usuario->getNombre() . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>






                                </div>
                                <div class="row">







                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Tipo de Venta </label>
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda" required="">

                                                <?php
                                                $pred = array('Contado', 'Credito');

                                                for ($i = 0; $i < count($pred); $i++) {

                                                    echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Tipo de Pago </label>
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda" required="">

                                                <?php
                                                $pred = array('Efectivo', 'C.Entrega', 'MasterCard', 'Visa', 'American Express');

                                                for ($i = 0; $i < count($pred); $i++) {

                                                    echo '<option value="' . $pred[$i] . '" >' . $pred[$i] . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtnroop" name="txtnroop" value="" disabled="" >
                                                <label class="form-label">Nro OP</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <select class="form-control show-tick" id="cbmoneda" name="cbmoneda">
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
                                <div class="row">















                                </div>
                                <!--                        <div class="h3 text-danger">DATOS DEL CLIENTE</div>
                                                        <HR>-->
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <input type="hidden" name="idcliente" id="idcliente">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">RUC/DNI</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtrucbuscar" name="txtrucbuscar" value="" required="" onkeyup="consultarucDoc('<?= base_url . 'persona/buscar' ?>');">

                                            </div>
                                        </div>
                                        <div id="respuestabusqueda"></div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Razón Social / Nombre </label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txtcliente" name="txtcliente" value="" required="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Dirección </label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" value="" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label">Email</label>
                                            <div class="form-line">
                                                <input type="email" class="form-control" id="txtemail" name="txtemail" value="">

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


                                    <div class="body">
                                        <div class="row align-center" >
                                            <button type="button"  class="btn btn-primary waves-effect" data-toggle="modal" data-target=".modalguia">Guías, Condiciones y Otros datos</button>

                                        </div>
                                        <hr>

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
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
                                                <label class="text-danger" id="lblgravada"><strong>GRAVADA: </strong>  S/ 0.00</label>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">

                                                <label class="text-danger" id="lbligv"><strong>IGV 18%: </strong>  S/ 0.00</label>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <!--<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">-->
                                            <label class="text-danger h1 " id="lbltotal"><strong>TOTAL: </strong>    S/ 0.00</label>
                                            <!--</div>--> 
                                        </div>





                                    </div>



                                </div>
                                <button type="submit" class="btn btn-lg btn-success waves-effect" id="guardardocumento" name="guardardocumento">REGISTRAR COMPROBANTE</button>


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


