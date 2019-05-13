<?php 

  /** Actual month last day **/
  function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('d/m/Y', mktime(0,0,0, $month, $day, $year));
  }
 
  /** Actual month first day **/
  function _data_first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('d/m/Y', mktime(0,0,0, $month, 1, $year));
  }



?>

<section class="content">
    <div class="container-fluid">
        
       
        
        <div class="block-header">
            <!--    <br>-->
            <div class="RespuestaAjax"></div>
        </div>
        <!-- Basic Examples -->

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Comprobantes
                            

                        </h2>
                       
                    
                    </div>
                    <div class="body">
                        <input type="hidden"value="<?=base_url ?>" id="url" name="url">  
                     <form action="<?= base_url?>documento/search" method="POST"  id="FormularioAjaxBuscar" data-form="insert" enctype="multipart/form-data" autocomplete="off" >   
                        <div class="row">  
                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">Desde </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" class="form-control" placeholder="Desde" id="dpdesde" name="dpdesde" value="<?= _data_first_month_day()?>" required="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">Hasta </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" class="form-control" placeholder="Hasta" id="dphasta" name="dphasta" value="<?= _data_last_month_day()?>" required="">
                                    </div>
                                </div>

                            </div>
                        </div>
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label>Tipo Comprobante</label>
                                <select  class="form-control show-tick" id="cbtipocomprobante" name="cbtipocomprobante">
<!--                                    <option value="">- Tipo comprobante -</option>-->
                                    <?php 
                                    $pred= array('Factura','Boleta','Nota de venta','Nota de crédito','Nota de débito');
                                    $value= array('Factura','Boleta','nota_venta','nota_credito','nota_debito');
                                    
                                    for($i=0;$i < count($pred);$i++){

                                            echo '<option value="'.$value[$i].'" >'.$pred[$i].'</option>';


                                    }

                                    ?>

                            </select>
                            </div>
                        </div>
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                                <label class="form-label">(Ruc, Dni, Nombre, Rz. Social) </label>
                                <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="txtbuscar" name="txtbuscar">
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Serie </label>
                                    <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtserie" name="txtserie">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group form-float">
                                    <label class="form-label">Número </label>
                                    <!--                                <h2 class="card-inside-title">Aniversario</h2>-->

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="txtnumero" name="txtnumero">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group form-float">
                            
                                <label>Punto de Venta</label>
                                <select class="form-control show-tick" id="cbsucursal" name="cbsucursal">
                                    
                                    <?php 
                                   
                                                                        
                                        foreach ($sucursales as $sucursal){
                                            if($_SESSION['idsucursal'] == $sucursal->getId()){
                                                echo '<option value="'.$sucursal->getId().'" selected="selected" >'.$sucursal->getNombre().'</option>';
                                                
                                            }else{
                                                echo '<option value="'.$sucursal->getId().'" >'.$sucursal->getNombre().'</option>';
                                                
                                            }
                                            


                                    }

                                    ?>

                            </select>
                            </div>
                        </div>
                            
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <label>Acciones</label>
                            <div class="form-group form-float">
                                
                                <button class="btn btn-sm btn-primary waves-effect" type="submit"><span class="glyphicon glyphicon-search "></span> Buscar</button>
                                
                         
                                
                                <button class="btn btn-sm btn-success waves-effect" id="exceldocument" url="<?= base_url?>documento/imprimirexcel"><span class="glyphicon glyphicon-file"></span> Excel</button>
                                
                            </div>
                        </div>
                            
                            
                            
                            
                        </div>
                     </form>
                        
                        
                        
                        
                        <div id="respuestaExcel"></div>
                        <div class="table-responsive" id="respuestaAjax">
                            <table class="table  table-hover table-bordered" id="tabladocumento">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
                                        <th>Número</th>
                                        <th>RUC/ DNI</th>
                                        <th>Nombre / Rz. Social</th>
                                        <th>Total</th>
                                        <th>Est. Local</th>
                                        <th>Est. Sunat</th>
                                        <th>Imprimir</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
<!--                                <tfoot>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
                                        <th>Número</th>
                                        <th>RUC/ DNI</th>
                                        <th>Nombre / Rz. Social</th>
                                        <th>Total</th>
                                        <th>Est. Local</th>
                                        <th>Est. Sunat</th>
                                        <th>Imprimir</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>-->
                                <tbody >
                                    <?php foreach ($documentos as $documento){
                                        
                                           $estados = '';  
                                           $estadol = '';
                                           if($documento->getEstadosunat() == 'Aceptado'){
                                               $estados = '<span class="label bg-green">'.$documento->getEstadosunat().'</span>';
                                           }else {
                                               $estados = '<span class="label bg-red">'.$documento->getEstadosunat().'</span>';
                                           }
                                           
                                           if ($documento->getEstadolocal() == 'Aceptado') {
                                                $estadol = '<span class="label bg-green">' . $documento->getEstadolocal() . '</span>';
                                            } else {
                                                $estadol = '<span class="label bg-red">' . $documento->getEstadolocal() . '</span>';
                                            }

                                            echo '<tr>';
                                            
                                            echo '<td>'.$documento->getFechaemision().'</td>';
                                            echo '<td>'.$documento->getTipo().'</td>';
                                            echo '<td>'.$documento->getSerie().'</td>';
                                            echo '<td>'.$documento->getNumero().'</td>';
                                            echo '<td>'.$documento->getRuc().'</td>';
                                            echo '<td>'.$documento->getRazonsocial().'</td>';
                                            echo '<td>'.$documento->getTotal().'</td>';
                                            echo '<td>'.$estadol.'</td>';
                                            echo '<td>'.$estados.'</td>';
                                            echo '<td><a  href="'.base_url.'documento/imprimir&id='.$documento->getId().'" target="_blank" data-toggle="tooltip" data-placement="top" title="PDF" style="background: none;"> <i class="material-icons">picture_as_pdf</i></a><button type ="text" style="border:none;background: none;" data-toggle="tooltip" data-placement="top" title="TICKET" onclick ="VentanaCentrada('."'".base_url.'documento/printticket&id='.$documento->getId()."'".','."'".'Ticket'."'".','."''".','."''".','."''".','."'false'".');">  <i class="material-icons">confirmation_number</i> </button> </td>';
                                            if($documento->getTipo() == 'Cotizacion'){


                                                echo '<td>'
                                                . '<a href="' . base_url . 'documento/sale"  data-toggle="tooltip" data-placement="top" title="VENDER"><i class="material-icons">add_shopping_cart</i></a> </div></td>';
                                            }else{

                                                echo '<td><div class="demo-google-material-icon"> <i class="material-icons">code</i> <i class="material-icons">done</i> '
                                                . '<a href="'.base_url.'documento/loaddebit&id='.$documento->getId().'" data-toggle="tooltip" data-placement="top" title="NOTA DE DÉBITO"><i class="material-icons">control_point</i></a>'
                                                        . ' <a href="'.base_url.'documento/loadcredit&id='.$documento->getId().'" data-toggle="tooltip" data-placement="top" title="NOTA DE CRÉDITO"><i class="material-icons">remove_circle_outline</i></a>';
                                                if($documento->getEstadolocal() != 'Anulado'){
                                                    echo '<a  data-toggle="modal" data-target=".modalanulardoc" data-placement="top" title="ANULAR"><i class="material-icons">block</i></a></div></td>';
                                                }     
                                            }
                                            echo '</tr>';
                                        
                                        
                                        
                                    } ?>



                                </tbody>
                               
                            </table>
                            <div class="pagination">
                                <nav>
                                    <ul class="pagination"></ul>
                                    
                                </nav>
                                
                            </div>
                            
                        </div>
                        <?php require_once 'view/documentocabecera/modalanulardoc.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>

<script>

   var table = '#tabladocumento'
   $(document).ready( function (){   
     
       $('.pagination').html('')
       var trnum =0
       var maxRows = 20
       var totalRows = $(table+' tbody tr').length
       $(table+' tr:gt(0)').each( function (){
           trnum++
           if(trnum > maxRows){
               $(this).hide()
           }
           if(trnum <= maxRows){
               $(this).show()
               
           }
           
           
           
       })
       if(totalRows > maxRows){
           var pagenum = Math.ceil(totalRows/maxRows)
           for(var i=1; i<= pagenum;){
               $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span>\n\
                </span>\</li>').show()
               
           }
           
       }
       $('.pagination li:first-child').addClass('active')
       $('.pagination li').on('click', function (){
       
        var pageNum = $(this).attr('data-page')
        var trIndex = 0;
        $('.pagination li').removeClass('active')
        $(this).addClass('active')
        $(table+' tr:gt(0)').each(function (){
            trIndex++
            if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)- maxRows)){
                $(this).hide()
            }else {
                $(this).show()
            }
                
            })
            
        });
       
       
       });
       
//       $(function (){
//        $('table tr:eq(0)').prepend('<th>ID</th>')
//        var id=0;
//        $('table tr:gt(0)').each(function (){
//            id++
//            $(this).prepend('<td>'+id+'</td>')
//            
//        })
//       
//       
//       
//       
//       })
       
       
       
       

    
    
  
</script>    




















