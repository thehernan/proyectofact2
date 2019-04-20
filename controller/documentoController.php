<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'model/documentoSucursal.php';
require_once 'model/documento.php';
require_once 'model/sunatTransaction.php';
require_once 'model/usuario.php';
require_once 'model/tipoImpuesto.php';
require_once 'model/unidmedida.php';
require_once 'model/tiponota.php';
require_once 'model/sucursal.php';
require_once 'model/Detalle.php';
require_once 'model/tipocambio.php';
require_once 'model/Detalle.php';

class documentoController{
    private $documento;
    private $docsucursal;
    private $sunattrans;
    private $usuario;
    private $impuesto;
    private $unidad;
    function __construct() {
        $this->docsucursal = new documentoSucursal();
        $this->documento = new documento();
        $this->sunattrans = new sunatTransaction();
        $this->usuario = new usuario();
        $this->impuesto = new tipoImpuesto();
        $this->unidad = new unidmedida();
    }
    
    
    function sale(){
        
        
        $detalles = array();
        $documentossuc =$this->docsucursal->selectAll();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos=$this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();
        require_once 'view/layout/header.php';
        require_once 'view/documentocabecera/form_documento.php';
      
        
        require_once 'view/layout/footer.php';
        
    }
    
    function notecredit(){
        
        $documentossuc =$this->docsucursal->selectAll();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos=$this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();
        $nota = new tiponota();
        $notas = $nota->select('credito');
        $tipo= 'nota_credito';
        $titulo= "Emitir nota de crédito electrónica";
        
        ///////////// cargo un nuevo documento ////////
        $documento = new documento();
        ////////////////////////////////////////
        require_once 'view/layout/header.php';
        
        require_once 'view/documentocabecera/nota/form_documento_note.php';
      
        
        require_once 'view/layout/footer.php';
        
    }
    
     function notedebit(){
        
        $documentossuc =$this->docsucursal->selectAll();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos=$this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();
        
        $nota = new tiponota();
        $notas = $nota->select('debito');
        
        $tipo= 'nota_debito';
        $titulo= "Emitir nota de débito electrónica";
        
        ///////////// cargo un nuevo documento ////////
        $documento = new documento();
        ////////////////////////////////////////
        
        require_once 'view/layout/header.php';
        require_once 'view/documentocabecera/nota/form_documento_note.php';
      
        
        require_once 'view/layout/footer.php';
        
    }
    
    function selectdocument(){
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0,0,0, $month+1, 0, $year));
        $desde = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0,0,0, $month, $day, $year));
        
        
        $sucursal = new sucursal();
        
        $sucursales = $sucursal->selectAll();
        
        $documentos = $this->documento->select($desde, $hasta,'','','','',$_SESSION['idsucursal']);
        require_once 'view/layout/header.php';
        require_once 'view/documentocabecera/listar.php';
        require_once 'view/layout/footer.php';
        
        
    }
    
    function search(){
//        var_dump($_POST);
        
        if(isset($_POST['dpdesde']) && isset($_POST['dphasta']) && isset($_POST['cbtipocomprobante']) && isset($_POST['txtbuscar']) && isset($_POST['txtserie']) 
                && isset($_POST['txtnumero']) && isset($_POST['cbsucursal'])){
            
            
            $desde = $_POST['dpdesde'];
            $dated = DateTime::createFromFormat('d/m/Y', $desde);      
            $datedf = $dated->format('Y-m-d');
                      
            $hasta = $_POST['dphasta'];
            $dateh = DateTime::createFromFormat('d/m/Y', $hasta);      
            $datehf = $dateh->format('Y-m-d');

            $tipocomp = $_POST['cbtipocomprobante'];
            
            
            $buscar = $_POST['txtbuscar'];
            $serie = $_POST['txtserie'];
            $numero = $_POST['txtnumero'];
            $sucursal = $_POST['cbsucursal'];
            
            $documentos = $this->documento->select($datedf, $datehf,$tipocomp,$buscar,$serie,$numero,$sucursal);
            
            ////// tabla ///// ?>
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
                               if($documento->getEstadosunat() == 'Aceptado'){
                                   $estados = '<span class="label bg-green">'.$documento->getEstadosunat().'</span>';
                               }else {
                                   $estados = '<span class="label bg-red">'.$documento->getEstadosunat().'</span>';
                               }



                                echo '<tr>';
                                echo '<td>'.$documento->getFechaemision().'</td>';
                                echo '<td>'.$documento->getTipo().'</td>';
                                echo '<td>'.$documento->getSerie().'</td>';
                                echo '<td>'.$documento->getNumero().'</td>';
                                echo '<td>'.$documento->getRuc().'</td>';
                                echo '<td>'.$documento->getRazonsocial().'</td>';
                                echo '<td>'.$documento->getTotal().'</td>';
                                echo '<td>'.$documento->getEstadolocal().'</td>';
                                echo '<td>'.$estados.'</td>';
                                echo '<td><div class="demo-google-material-icon"> <i class="material-icons">picture_as_pdf</i> <i class="material-icons">confirmation_number</i> </div></td>';
                                echo '<td><div class="demo-google-material-icon"> <i class="material-icons">code</i> <i class="material-icons">done</i> '
                                . '<a href="'.base_url.'documento/loaddebit&id='.$documento->getId().'"  data-toggle="tooltip" data-placement="top" title="NOTA DE DÉBITO"><i class="material-icons">control_point</i></a> <a href="'.base_url.'documento/loadcredit&id='.$documento->getId().'"  data-toggle="tooltip" data-placement="top" title="NOTA DE CRÉDITO"><i class="material-icons">remove_circle_outline</i></a> <i class="material-icons">block</i></div></td>';

                                 echo '</tr>';



                        } ?>



                    </tbody>

                </table>
                <div class="pagination">
                    <nav>
                        <ul class="pagination"></ul>

                    </nav>

                </div>
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


     <?php           



            
            
            
        }
       
        
}

function  loaddebit(){
    var_dump($_GET);
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
    
        
    $id=$_GET['id'];    
        
    $detallesmod = new Detalle();
    
    $documentossuc =$this->docsucursal->selectAll();
    $transactions = $this->sunattrans->selectAll();
    $usuarios = $this->usuario->selectAll();
    $impuestos=$this->impuesto->selectAll();
    $unidades = $this->unidad->selectAll();

    $nota = new tiponota();
    $notas = $nota->select('debito');
    
    ///////////// carga el documento deseado (cabecera )///////////
    $documento = $this->documento->selectOne($id);
    // carga detalle del domento ///////
    $detalles = $detallesmod->selectOneDoc($id);
    
    $tipo= 'nota_debito';
    $titulo= "Emitir nota de débito electrónica";
    require_once 'view/layout/header.php';
    require_once 'view/documentocabecera/nota/form_documento_note.php';


    require_once 'view/layout/footer.php';
    
    }
    
    
    else {
        
        require_once 'view/layout/header.php';
        require_once 'view/error.php';


        require_once 'view/layout/footer.php';
        
        
    }
    
    
    
}

function  loadcredit(){
    var_dump($_GET);
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
    
        
    $id=$_GET['id'];    
        
    $detallesmod = new Detalle();
    
    $documentossuc =$this->docsucursal->selectAll();
    $transactions = $this->sunattrans->selectAll();
    $usuarios = $this->usuario->selectAll();
    $impuestos=$this->impuesto->selectAll();
    $unidades = $this->unidad->selectAll();

    $nota = new tiponota();
    $notas = $nota->select('credito');
    
    ///////////// carga el documento deseado (cabecera )///////////
    $documento = $this->documento->selectOne($id);
    // carga detalle del domento ///////
    $detalles = $detallesmod->selectOneDoc($id);
    
    $tipo= 'nota_credito';
    $titulo= "Emitir nota de crédito electrónica";
    require_once 'view/layout/header.php';
    require_once 'view/documentocabecera/nota/form_documento_note.php';


    require_once 'view/layout/footer.php';
    
    }
    
    
    else {
        
        require_once 'view/layout/header.php';
        require_once 'view/error.php';


        require_once 'view/layout/footer.php';
        
        
    }
    
    
    
}

function ordencompra(){
    
    
    $tipocambio = new tipocambio();
    $cambio = $tipocambio->selectMax();
    
    require_once 'view/layout/header.php';
    require_once 'view/documentocabecera/ordencompra/form_documento_ordcompra.php';


    require_once 'view/layout/footer.php';
    
    
    
}

function compra(){
    $documentossuc =$this->docsucursal->selectAll();
    $transactions = $this->sunattrans->selectAll();
    $usuarios = $this->usuario->selectAll();
    $impuestos=$this->impuesto->selectAll();
    $unidades = $this->unidad->selectAll();
    
    $tipocambio = new tipocambio();
    $cambio = $tipocambio->selectMax();
    
    $detalles = array();
    require_once 'view/layout/header.php';
    require_once 'view/documentocabecera/compra/form_documento_compra.php';


    require_once 'view/layout/footer.php';
    
    
    
}

function insert(){
    
    var_dump($_POST);
    
    if (isset($_POST['cbserie']) && isset($_POST['txtnro']) &&  isset($_POST['cbmoneda']) && isset($_POST['dpfechaemision'])
            && isset($_POST['dpfechavencimiento']) && isset($_POST['cbtipoop']) && isset($_POST['cbvendedor']) && isset($_POST['txtrucbuscar'])
            && isset($_POST['txtcliente']) && isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtordenc'])
            && isset($_POST['txtobservacion'])){
        
        $emision = $_POST['dpfechaemision'];
       
        $dateemis = DateTime::createFromFormat('d/m/Y', $emision);      
        $emisionf = $dateemis->format('Y-m-d');
        

        $vencimiento = $_POST['dpfechavencimiento'];
        $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);      
        $vencimientof = $dateven->format('Y-m-d');
        
        
        $documento = new documento();
        
        
        $serie=$_POST['cbserie'];
        $numero=$_POST['txtnro'];
        $moneda=$_POST['cbmoneda'];
        $fechaemision=$emisionf;
        $fechavencimiento=$vencimientof;
        $tipoventaop=$_POST['cbtipoop'];
        $idpersona=$_POST['idcliente'];
        $idusuario= $_POST['cbvendedor'];
        $ruc=$_POST['txtrucbuscar'];
        $razonsocial=$_POST['txtcliente'];
        $direccion=$_POST['txtdireccion'];
        $email=$_POST['txtemail'];
        $norden=$_POST['txtordenc'];
        $observacion=$_POST['txtobservacion'];
        $idsucursal=$_SESSION['idsucursal'];
                
                
        $documento->setSerie($serie);
        $documento->setNumero($numero);
        $documento->setMoneda($moneda);
        $documento->setFechaemision($fechaemision);
        $documento->setFechavencimiento($fechavencimiento);
        $documento->setTipoventaop($tipoventaop);
        $documento->setIdusuario($idusuario);
        $documento->setIdpersona($idpersona);
        $documento->setRuc($ruc);
        $documento->setRazonsocial($razonsocial);
        $documento->setDireccion($direccion);
        $documento->setEmail($email);
        $documento->setNorden($norden);
        $documento->setObservacion($observacion);
        $documento->setIdsucursal($idsucursal);
        
        echo $id = $documento->insert($documento);
        
        $idprod = $_POST['id'];
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcionprod'];
        $unidad = $_POST['unidad'];
        $tipoigv = $_POST['tipoigv'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $subtotal = $_POST['subtotal'];
        $total = $_POST['total'];
        
        
        $detalles = array();
        for ($i = 0; $i<count($codigo); $i++){
            $d = array(
                $idprod[$i],
                $codigo[$i],
                $descripcion[$i],
                $unidad[$i],
                $tipoigv[$i],
                $cantidad[$i],
                $precio[$i],
                $subtotal[$i],
                $total[$i],
                $id
            );      
            array_push($detalles, $d);
        }
        $detalle = new Detalle();
        $detalle->insert($detalles);
        
        
        
        
                
        
            
        
        
        
    }
    
}




    
    
    
    
    
    
    
    
    
}

