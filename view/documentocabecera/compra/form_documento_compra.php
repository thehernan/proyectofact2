


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
                    <span class="glyphicon glyphicon-shopping-cart"></span> Emitir compra
                    <!--<small>Edición</small>-->
                    
                </h1>
   
            </div>
            <div class="body">
                <form action="<?= base_url?>" method="POST"  id="FormularioAjax" data-form="insert" enctype="multipart/form-data" autocomplete="off" >
                    <div class="row clearfix">
                        <!--<form >-->
                        
                        <div class="row">
                    
                    
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <label class="text-danger">Tipo Doc. </label>
                                            <select class="form-control show-tick" id="cbserie" name="cbserie" required="">
                                                <option value="" class="">- Documento  -</option>
                                                <?php 

                                                $pred= array('Factura','Boleta','Guia','Liquidacion');

                                                for($i=0;$i < count($pred);$i++){

                                                        echo '<option value="'.$pred[$i].'" >'.$pred[$i].'</option>';


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
                                                $pred= array('Soles','Dolares');

                                                for($i=0;$i < count($pred);$i++){

                                                        echo '<option value="'.$pred[$i].'" >'.$pred[$i].'</option>';


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
                                        <div class="form-group">
                                            <div class="form-line error" id="bs_datepicker_container">
                                                <input type="text" class="form-control" placeholder="Fecha Emisión" id="dpfechaemision" name="dpfechaemision" value="<?=  date('d/m/Y') ?>" required="">
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
                                                <input type="text" class="form-control" placeholder="Fecha Vencimiento" id="dpfechavencimiento" name="dpfechavencimiento" value=" <?=  date('d/m/Y') ?> " required="">
                                            </div>
                                        </div>

                                    </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger" >Tipo Cambio</label>
                                    <div class="form-line focused error">
                                        <input type="text" class="form-control" id="txttipocambio" name="txttipocambio" value="<?= $cambio->getVenta();?>" >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label" >Sujeto a</label>
                                    <select class="form-control show-tick" id="cbmoneda" name="cbmoneda">
                                        <option value="">- Sujeto a  -</option>
                                        <?php 
                                        $pred= array('Detracción','Retención','Percepcion');
                                      
                                        for($i=0;$i < count($pred);$i++){
                                            
                                                echo '<option value="'.$pred[$i].'" >'.$pred[$i].'</option>';
                                          
                                           
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
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">RUC/DNI</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtrucbuscar" name="txtrucbuscar" value="" required="" onkeyup="consultarucDoc('<?= base_url.'persona/buscar' ?>');">
                                        
                                    </div>
                                </div>
                                 <div id="respuestabusqueda"></div>
                            </div>
                            
                             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label text-danger">Razón Social / Nombre </label>
                                    <div class="form-line">
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
                   
                        </div>
                        <!--</form>-->
                   
                </form>
                
                <!--<label> Productos / Servicios </label>-->
            <?php require_once 'view/documentodetalle/detalleventa.php';?>
                
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        
                        <div class="card">
                    
                    
                            <div class="body">
                             
                                
                                <div class="row">
                                    <div class="form-group">
                                    <label for="textordenc">Orden de compra</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="textordenc"/>
                                    </div>
                                    
                                    
                                    </div>
                                    <div class="form-group">
                                    <label for="textobservacion">Observación</label>
                                    <div class="form-line">
                                    <input type="text" class="form-control" id="textobservacion"/>
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
                         <button class="btn btn-lg btn-success waves-effect">REGISTRAR COMPROBANTE</button>
                    
                    
                </div>
                

            </div>
                
                
                
                
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


