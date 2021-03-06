


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
                            <span class="glyphicon glyphicon-shopping-cart"></span> Emitir orden de compra
                            <!--<small>Edición</small>-->

                        </h1>


                        <hr>


                    </div>
                    <input id="print" type="hidden" value="<?= base_url ?>documento/printticket" >
                    <div class="body">
                        <form action="<?= base_url ?>documento/insertordencompra" method="POST"  id="FormularioAjaxDocumento" data-form="insert" enctype="multipart/form-data" autocomplete="off" >
                            <div class="row clearfix">
                                <!--<form >-->
                                <input type="hidden" class="form-control" id="tipodoc" name="tipodoc" value="<?= $tipodoc ?>">
                                <div class="row">



                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label ">Nro </label>
                                            <div class="form-line ">
                                                <input type="text" class="form-control" id="txtnro" name="txtnro" value="<?= $nro ?>" readonly="">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Moneda </label>
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
                                            <label for="dpfechaemision" class="text-danger">Fecha Emisión</label>
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
                                            <label for="dpfechavencimiento" class="text-danger">Fecha Entrega</label>
                                            <div class="form-group">
                                                <div class="form-line error" id="bs_datepicker_container">
                                                    <input type="text" class="form-control" placeholder="Fecha Vencimiento" id="dpfechavencimiento" name="dpfechavencimiento" value="<?= date('d/m/Y') ?>" required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Tipo de cambio</label>
                                            <div class="form-line focused error">
                                                <input type="text" class="form-control" id="txttipocambio" name="txttipocambio" value="<?= $cambio->getVenta(); ?>" required="" >

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="form-label text-danger">Garantia</label>
                                            <div class="form-line focused error">
                                                <input type="number" class="form-control" id="txtgarantia" name="txtgarantia" value="" required="" >

                                            </div>
                                        </div>
                                    </div>



                                </div>


                                <div class="h4 text-danger">DATOS DEL PROVEEDOR</div>
                                <hr>
                                <div class="row">
                                    <input type="hidden" name="idcliente" id="idcliente">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
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


                            <!--<label> Productos / Servicios </label>-->
                            <?php require_once 'view/documentodetalle/detallecompra.php'; ?>


                            <div class="row">


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

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


