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
require_once 'model/serieProducto.php';
require_once 'model/serieDetalle.php';
require_once 'model/documentoOtros.php';
require_once 'model/documentoGuia.php';
require_once 'model/producto.php';
require_once 'model/cuentaBancaria.php';
require_once 'model/persona.php';
//require_once 'model/serieDetalle.php';


class documentoController {

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
    

    function sale() {


        $detalles = array();
//        $documentossuc = $this->docsucursal->selectAll();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();
        $seriesm = new serieProducto();
        $series = $seriesm->select(74);
        $sucurm = new sucursal();
        $sucursales= $sucurm->selectAll();
        $tipodoc = 'Venta';
        $documento = new documento();
        $personam = new persona();
        $personabydefault = $personam->bydefault(1);
//        var_dump($personabydefault);
        require_once 'view/layout/header.php';
        require_once 'view/documentocabecera/form_documento.php';

        require_once 'view/documentosucursal/modalnewdocumentosucursal.php';
        require_once 'view/layout/footer.php';
    }

    function notecredit() {
        $detalles = array();
        $idsucur = $_SESSION['idsucursal'];
        $documentossuc = $this->docsucursal->selectAll($idsucur,'nota_credito');
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();
        $nota = new tiponota();
        $notas = $nota->select('credito');
        $tipo = 'nota_credito';
//        $nro = $this->documento->selectMax($tipo,$tipo)->getNumero() + 1;
        $titulo = "Emitir nota de crédito electrónica";
         $sucurm = new sucursal();
        $sucursales= $sucurm->selectAll();
        ///////////// cargo un nuevo documento ////////
        $documento = new documento();
        ////////////////////////////////////////
        require_once 'view/layout/header.php';

        require_once 'view/documentocabecera/nota/form_documento_note.php';
        require_once 'view/documentosucursal/modalnewdocumentosucursal.php';

        require_once 'view/layout/footer.php';
    }

    function notedebit() {
        $detalles = array();
        $idsucur = $_SESSION['idsucursal'];
        $documentossuc = $this->docsucursal->selectAll($idsucur,'nota_debito');
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();

        $nota = new tiponota();
        $notas = $nota->select('debito');

        $tipo = 'nota_debito';
//        $nro = $this->documento->selectMax($tipo,$tipo)->getNumero() + 1;
        $titulo = "Emitir nota de débito electrónica";

        ///////////// cargo un nuevo documento ////////
        $documento = new documento();
        ////////////////////////////////////////
        $sucurm = new sucursal();
        $sucursales= $sucurm->selectAll();
        require_once 'view/layout/header.php';
        require_once 'view/documentocabecera/nota/form_documento_note.php';
        require_once 'view/documentosucursal/modalnewdocumentosucursal.php';

        require_once 'view/layout/footer.php';
    }

    function selectdocument() {
        
        require_once 'view/layout/header.php';
        
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        $desde = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


        $sucursal = new sucursal();

        $sucursales = $sucursal->selectAll();

        $documentos = $this->documento->select($desde, $hasta, 'Factura','Venta' ,'', '', '', $_SESSION['idsucursal']);
        
        require_once 'view/documentocabecera/listar.php';
        require_once 'view/layout/footer.php';
    }
    function selectdetallado() {
        
        require_once 'view/layout/header.php';
        
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        $desde = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


        $sucursal = new sucursal();

        $sucursales = $sucursal->selectAll();

        $detallado = $this->documento->selectdetallado($desde, $hasta, 'Factura','Venta' ,'', '', '','Soles', $_SESSION['idsucursal']);
//        var_dump($detallado);
        require_once 'view/reportes/venta/listar.php';
        require_once 'view/layout/footer.php';
    }
    function selectcompra(){
        
        require_once 'view/layout/header.php';
        
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        $desde = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


        $sucursal = new sucursal();

        $sucursales = $sucursal->selectAll();

        $documentos = $this->documento->select($desde, $hasta, 'Factura','Compra', '', '', '', $_SESSION['idsucursal']);
        
        require_once 'view/documentocabecera/compra/listarcompras.php';
        require_once 'view/layout/footer.php';
    }
    function selectordencompra(){
        
        require_once 'view/layout/header.php';
        
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        $desde = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


        $sucursal = new sucursal();

        $sucursales = $sucursal->selectAll();

        $documentos = $this->documento->select($desde, $hasta, 'orden_compra','orden_compra', '', '', '', $_SESSION['idsucursal']);
        
        require_once 'view/documentocabecera/ordencompra/listarordencompra.php';
        require_once 'view/layout/footer.php';
    }
    
    function selectcotizacion() {
        require_once 'view/layout/header.php';
        $month = date('m');
        $year = date('Y');
        $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
        $desde = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        $hasta = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


        $sucursal = new sucursal();

        $sucursales = $sucursal->selectAll();

        $documentos = $this->documento->select($desde, $hasta, 'Cotizacion','Cotizacion', '', '', '', $_SESSION['idsucursal']);
       
        require_once 'view/documentocabecera/cotizacion/listar_cotizacion.php';
        require_once 'view/layout/footer.php';
    }

    function search() {
//        var_dump($_POST);

        if (isset($_POST['dpdesde']) && isset($_POST['dphasta']) && isset($_POST['cbtipocomprobante']) && isset($_POST['txtbuscar'])
                && isset($_POST['txtserie']) && isset($_POST['txtnumero']) && isset($_POST['cbsucursal']) && isset($_POST['tipodoc'])) {


            $desde = $_POST['dpdesde'];
            $dated = DateTime::createFromFormat('d/m/Y', $desde);
            $datedf = $dated->format('Y-m-d');

            $hasta = $_POST['dphasta'];
            $dateh = DateTime::createFromFormat('d/m/Y', $hasta);
            $datehf = $dateh->format('Y-m-d');

            $tipocomp = $_POST['cbtipocomprobante'];
            $tipodoc = $_POST['tipodoc'];

            $buscar = $_POST['txtbuscar'];
            $serie = $_POST['txtserie'];
            $numero = $_POST['txtnumero'];
            $sucursal = $_POST['cbsucursal'];

            $documentos = $this->documento->select($datedf, $datehf, $tipocomp,$tipodoc, $buscar, $serie, $numero, $sucursal);

            ////// tabla ///// 
            ?>
            <table class="table  table-hover table-bordered" id="tabladocumento">
                <thead>
                <?php echo $tipodoc; if($tipodoc == 'Venta' ){ ?>
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
                <?php }elseif($tipodoc == 'Compra' ){ ?>
                
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Serie</th>
                        <th>Número</th>
                        <th>RUC/ DNI</th>
                        <th>Nombre / Rz. Social</th>
                        <th>Total</th>
                      
                        <th>Imprimir</th>
                        <th>Acciones</th>
                    </tr>
                    <?php }else{?>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                       
                        <th>Número</th>
                        <th>RUC/ DNI</th>
                        <th>Nombre / Rz. Social</th>
                        <th>Total</th>
                      
                        <th>Imprimir</th>
                        <th>Acciones</th>
                    </tr>
                    
                    
                    
                <?php }?>
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
            <?php
            foreach ($documentos as $documento) {
                $estados = '';
                $estadol = '';
                if ($documento->getEstadosunat() == 'Aceptado') {
                    $estados = '<span class="label bg-green">' . $documento->getEstadosunat() . '</span>';
                } else {
                    $estados = '<span class="label bg-red">' . $documento->getEstadosunat() . '</span>';
                }
                
                if ($documento->getEstadolocal() == 'Aceptado') {
                    $estadol = '<span class="label bg-green">' . $documento->getEstadolocal() . '</span>';
                } else {
                    $estadol = '<span class="label bg-red">' . $documento->getEstadolocal() . '</span>';
                }



             
                
                if($tipodoc == 'Cotizacion'){
                       echo '<tr>';
                        echo '<td>' . $documento->getFechaemision() . '</td>';
                        echo '<td>' . $documento->getTipo() . '</td>';
                    
                        echo '<td>' . $documento->getNumero() . '</td>';
                        echo '<td>' . $documento->getRuc() . '</td>';
                        echo '<td>' . $documento->getRazonsocial() . '</td>';
                        echo '<td>' . $documento->getTotal() . '</td>';
                      
                    
                    echo '<td><a  href="'.base_url.'documento/imprimircotizacion&id='.$documento->getId().'" target="_blank" data-toggle="tooltip" data-placement="top" title="PDF" style="background: none;"> <i class="material-icons">picture_as_pdf</i></a></td>';
                    echo '<td>'
                    . '<a href="' . base_url . 'documento/sale"  data-toggle="tooltip" data-placement="top" title="VENDER"><i class="material-icons">add_shopping_cart</i></a> </div></td>';
                }elseif($tipodoc == 'Venta' ){
                    
                    echo '<tr>';
                    echo '<td>' . $documento->getFechaemision() . '</td>';
                    echo '<td>' . $documento->getTipo() . '</td>';
                    echo '<td>' . $documento->getSerie() . '</td>';
                    echo '<td>' . $documento->getNumero() . '</td>';
                    echo '<td>' . $documento->getRuc() . '</td>';
                    echo '<td>' . $documento->getRazonsocial() . '</td>';
                    echo '<td>' . $documento->getTotal() . '</td>';
                    echo '<td>' . $estadol . '</td>';
                    echo '<td>' . $estados . '</td>';
                    
                    echo '<td><a  href="'.base_url.'documento/imprimir&id='.$documento->getId().'" target="_blank" data-toggle="tooltip" data-placement="top" title="PDF" style="background: none;"> <i class="material-icons">picture_as_pdf</i></a><button type ="text" style="border:none;background: none;" data-toggle="tooltip" data-placement="top" title="TICKET" onclick ="VentanaCentrada('."'".base_url.'documento/printticket&id='.$documento->getId()."'".','."'".'Ticket'."'".','."''".','."''".','."''".','."'false'".');">  <i class="material-icons">confirmation_number</i> </button> </td>';
                    echo '<td><div class="demo-google-material-icon"> <i class="material-icons">code</i> <i class="material-icons">done</i> '
                    . '<a href="'.base_url.'documento/loaddebit&id='.$documento->getId().'" data-toggle="tooltip" data-placement="top" title="NOTA DE DÉBITO"><i class="material-icons">control_point</i></a>'
                            . ' <a href="'.base_url.'documento/loadcredit&id='.$documento->getId().'" data-toggle="tooltip" data-placement="top" title="NOTA DE CRÉDITO"><i class="material-icons">remove_circle_outline</i></a>';
                    if($documento->getEstadolocal() != 'Anulado'){
                         echo '<a  data-toggle="modal" data-target=".modalanulardoc" data-id="'.$documento->getId().'" data-documento="'.$documento->getSerie().'-'.$documento->getNumero().'" data-placement="top" title="ANULAR"><i class="material-icons">block</i></a></div></td>';
                    }     
                }elseif($tipodoc == 'Compra') {
                    
                    
                    
                          echo '<tr>';
                    echo '<td>' . $documento->getFechaemision() . '</td>';
                    echo '<td>' . $documento->getTipo() . '</td>';
                    echo '<td>' . $documento->getSerie() . '</td>';
                    echo '<td>' . $documento->getNumero() . '</td>';
                    echo '<td>' . $documento->getRuc() . '</td>';
                    echo '<td>' . $documento->getRazonsocial() . '</td>';
                    echo '<td>' . $documento->getTotal() . '</td>';
                  
                    
                    
                    echo '<td><a  href="'.base_url.'documento/imprimir&id='.$documento->getId().'" target="_blank" data-toggle="tooltip" data-placement="top" title="PDF" style="background: none;"> <i class="material-icons">picture_as_pdf</i></a><button type ="text" style="border:none;background: none;" data-toggle="tooltip" data-placement="top" title="TICKET" onclick ="VentanaCentrada('."'".base_url.'documento/printticket&id='.$documento->getId()."'".','."'".'Ticket'."'".','."''".','."''".','."''".','."'false'".');">  <i class="material-icons">confirmation_number</i> </button> </td>';
                                            
                    echo '<td><div class="demo-google-material-icon"> ';

                    echo '<a  href="" data-toggle="tooltip" data-placement="top"  title="EDITAR"><i class="material-icons">create</i></a></div></td>';
                    
                }else{
                    echo '<tr>';
                        echo '<td>' . $documento->getFechaemision() . '</td>';
                        echo '<td>' . $documento->getTipo() . '</td>';
                    
                        echo '<td>' . $documento->getNumero() . '</td>';
                        echo '<td>' . $documento->getRuc() . '</td>';
                        echo '<td>' . $documento->getRazonsocial() . '</td>';
                        echo '<td>' . $documento->getTotal() . '</td>';
                    
                    echo '<td><a  href="'.base_url.'documento/imprimir&id='.$documento->getId().'" target="_blank" data-toggle="tooltip" data-placement="top" title="PDF" style="background: none;"> <i class="material-icons">picture_as_pdf</i></a><button type ="text" style="border:none;background: none;" data-toggle="tooltip" data-placement="top" title="TICKET" onclick ="VentanaCentrada('."'".base_url.'documento/printticket&id='.$documento->getId()."'".','."'".'Ticket'."'".','."''".','."''".','."''".','."'false'".');">  <i class="material-icons">confirmation_number</i> </button> </td>';
                                            
                    echo '<td><div class="demo-google-material-icon"> '
                    . '<a href="'.base_url.'documento/loadcompra&id='.$documento->getId().'" data-toggle="tooltip" data-placement="top" title="COMPRAR"><i class="material-icons">shopping_basket</i></a>';

                    echo '<a  href="" data-toggle="tooltip" data-placement="top"  title="EDITAR"><i class="material-icons">create</i></a></div></td>';   
                }
                
                echo '</tr>';
            }
            ?>



                </tbody>

            </table>
          
            <div class="pagination">
                <nav>
                    <ul class="pagination"></ul>

                </nav>

            </div>
            <script>

                var table = '#tabladocumento'
                $(document).ready(function () {

                    $('.pagination').html('')
                    var trnum = 0
                    var maxRows = 20
                    var totalRows = $(table + ' tbody tr').length
                    $(table + ' tr:gt(0)').each(function () {
                        trnum++
                        if (trnum > maxRows) {
                            $(this).hide()
                        }
                        if (trnum <= maxRows) {
                            $(this).show()

                        }



                    })
                    if (totalRows > maxRows) {
                        var pagenum = Math.ceil(totalRows / maxRows)
                        for (var i = 1; i <= pagenum; ) {
                            $('.pagination').append('<li data-page="' + i + '">\<span>' + i++ + '<span class="sr-only">(current)</span>\n\
                            </span>\</li>').show()

                        }

                    }
                    $('.pagination li:first-child').addClass('active')
                    $('.pagination li').on('click', function () {

                        var pageNum = $(this).attr('data-page')
                        var trIndex = 0;
                        $('.pagination li').removeClass('active')
                        $(this).addClass('active')
                        $(table + ' tr:gt(0)').each(function () {
                            trIndex++
                            if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                                $(this).hide()
                            } else {
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
    function searchdetallado() {
//        var_dump($_POST);

        if (isset($_POST['dpdesde']) && isset($_POST['dphasta']) && isset($_POST['cbtipocomprobante']) && isset($_POST['txtbuscar'])
                && isset($_POST['txtserie']) && isset($_POST['txtnumero']) && isset($_POST['cbsucursal']) && isset($_POST['cbmoneda'])) {


            $desde = $_POST['dpdesde'];
            $dated = DateTime::createFromFormat('d/m/Y', $desde);
            $datedf = $dated->format('Y-m-d');

            $hasta = $_POST['dphasta'];
            $dateh = DateTime::createFromFormat('d/m/Y', $hasta);
            $datehf = $dateh->format('Y-m-d');

            $tipocomp = $_POST['cbtipocomprobante'];
           
            $moneda = $_POST['cbmoneda'];
            $buscar = $_POST['txtbuscar'];
            $serie = $_POST['txtserie'];
            $numero = $_POST['txtnumero'];
            $sucursal = $_POST['cbsucursal'];

            $detallado = $this->documento->selectdetallado($datedf, $datehf, $tipocomp,'Venta', $buscar, $serie, $numero,$moneda, $sucursal);

            ////// tabla ///// 
            ?>
            <table class="table  table-hover table-bordered" id="tabladocumento">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Serie / Num</th>
                        <th>Fecha</th>
                        <th>Nombre / Rz. Social</th>
                        <th>Vendedor</th>
                        <th>Tipo pago</th>
                        <th>Descripción</th>
                        <th>Total</th>
                        <th>Inc. Igv</th>
                        <th>Tipo Igv</th>
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
                    <?php 
                        $total = 0;
                        foreach ($detallado as $detalle){

                                echo '<tr>';

                                echo '<td>'.$detalle['tipo'].'</td>';
                                echo '<td>'.$detalle['serien'].'</td>';
                                echo '<td>'.$detalle['fechaemision'].'</td>';
                                echo '<td>'.$detalle['razonsocial'].'</td>';
                                echo '<td>'.$detalle['vendedor'].'</td>';
                                echo '<td>'.$detalle['tipo_pago'].'</td>';
                                echo '<td>'.$detalle['descripcionprod'].'</td>';
                                echo '<td>'.number_format($detalle['total'],2).'</td>';
                                echo '<td>'.$detalle['incigv'].'</td>';
                                echo '<td>'.$detalle['impuesto'].'</td>';

                                echo '</tr>';

                            $total += $detalle['total'];

                        } 


                                echo '<tr>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td colspan="2" class="h4"><strong>Total</strong></td>';
//                                            echo '<td></td>';
                                echo '<td>'.number_format($total,2).'</td>';
                                echo '</tr>';

                        ?>
            



                </tbody>

            </table>
          
            <div class="pagination">
                <nav>
                    <ul class="pagination"></ul>

                </nav>

            </div>
            <script>

                var table = '#tabladocumento'
                $(document).ready(function () {

                    $('.pagination').html('')
                    var trnum = 0
                    var maxRows = 20
                    var totalRows = $(table + ' tbody tr').length
                    $(table + ' tr:gt(0)').each(function () {
                        trnum++
                        if (trnum > maxRows) {
                            $(this).hide()
                        }
                        if (trnum <= maxRows) {
                            $(this).show()

                        }



                    })
                    if (totalRows > maxRows) {
                        var pagenum = Math.ceil(totalRows / maxRows)
                        for (var i = 1; i <= pagenum; ) {
                            $('.pagination').append('<li data-page="' + i + '">\<span>' + i++ + '<span class="sr-only">(current)</span>\n\
                            </span>\</li>').show()

                        }

                    }
                    $('.pagination li:first-child').addClass('active')
                    $('.pagination li').on('click', function () {

                        var pageNum = $(this).attr('data-page')
                        var trIndex = 0;
                        $('.pagination li').removeClass('active')
                        $(this).addClass('active')
                        $(table + ' tr:gt(0)').each(function () {
                            trIndex++
                            if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                                $(this).hide()
                            } else {
                                $(this).show()
                            }

                        })

                    });

                    
                });
                
    


            </script>    


            <?php
        }
    }

    function loaddebit() {
//        var_dump($_GET);
        require_once 'view/layout/header.php';
        if (isset($_GET['id']) && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $idsucur = $_SESSION['idsucursal'];
            $detallesmod = new Detalle();
            $seriedet = new serieDetalle();
            $documentossuc = $this->docsucursal->selectAll($idsucur,'nota_debito');
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();

            $nota = new tiponota();
            $notas = $nota->select('debito');

            ///////////// carga el documento deseado (cabecera )///////////
            $documento = $this->documento->selectOne($id);
            // carga detalle del domento ///////
            $detalles = $detallesmod->selectOneDoc($id);

            $tipo = 'nota_debito';
            $titulo = "Emitir nota de débito electrónica";
            
            require_once 'view/documentocabecera/nota/form_documento_note.php';


            require_once 'view/layout/footer.php';
        } else {

       
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }
    function loadcompra() {
//        var_dump($_GET);
        require_once 'view/layout/header.php';
        if (isset($_GET['id']) && !empty($_GET['id'])) {


            $id = $_GET['id'];

            $seriedet = new serieDetalle();
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();
            
            $tipocambio = new tipocambio();
            $cambio = $tipocambio->selectMax();
            $tipo = 'Compra';
            $detallem = new Detalle();
            $detalles = $detallem->selectOneDoc($id);
        
            $documento = $this->documento->selectOne($id);
           
 
            require_once 'view/documentocabecera/compra/form_documento_compra.php';


            require_once 'view/layout/footer.php';
        } else {

       
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }
    function loadcompraedit() {
//        var_dump($_GET);
        require_once 'view/layout/header.php';
        if (isset($_GET['id']) && !empty($_GET['id'])) {


            $id = $_GET['id'];

            $seriedet = new serieDetalle();
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();
           
          
            $detallem = new Detalle();
            $detalles = $detallem->selectOneDoc($id);
        
            $documento = $this->documento->selectOne($id);
           
 
            require_once 'view/documentocabecera/compra/form_documento_compra_editar.php';


            require_once 'view/layout/footer.php';
        } else {

       
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }
    function loadcotizacion() {
//        var_dump($_GET);
        
        if (isset($_GET['id']) && !empty($_GET['id'])) {

            require_once 'view/layout/header.php';
            $id = $_GET['id'];

            $detallesmod = new Detalle();
            $seriedet  = new serieDetalle();
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();
            $seriesm = new serieProducto();
//            $series = $seriesm->select(74);
            $sucurm = new sucursal();
            $sucursales= $sucurm->selectAll();
            $tipodoc = 'Venta';

            ///////////// carga el documento deseado (cabecera )///////////
            $documento = $this->documento->selectOne($id);
//            var_dump($documento);
            // carga detalle del domento ///////
            $detalles = $detallesmod->selectOneDoc($id);

//            $tipo = 'nota_debito';
//            $titulo = "Emitir nota de débito electrónica";
            
            require_once 'view/documentocabecera/form_documento.php';
            require_once 'view/documentosucursal/modalnewdocumentosucursal.php';

            require_once 'view/layout/footer.php';
        } else {

            
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }

    function loadcredit() {
//        var_dump($_GET);
        require_once 'view/layout/header.php';
        if (isset($_GET['id']) && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $idsucur = $_SESSION['idsucursal'];
            $detallesmod = new Detalle();
            $seriedet = new serieDetalle();
            $documentossuc = $this->docsucursal->selectAll($idsucur,'nota_credito');
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();

            $nota = new tiponota();
            $notas = $nota->select('credito');

            ///////////// carga el documento deseado (cabecera )///////////
            $documento = $this->documento->selectOne($id);
            // carga detalle del domento ///////
            $detalles = $detallesmod->selectOneDoc($id);

            $tipo = 'nota_credito';
            $titulo = "Emitir nota de crédito electrónica";
           
            require_once 'view/documentocabecera/nota/form_documento_note.php';


            require_once 'view/layout/footer.php';
        } else {

            
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }
    function loadorden() {
//        var_dump($_GET);
        require_once 'view/layout/header.php';
        if (isset($_GET['id']) && !empty($_GET['id'])) {


            $id = $_GET['id'];
//            $idsucur = $_SESSION['idsucursal'];
            $detallesmod = new Detalle();
            $seriedet = new serieDetalle();
            $transactions = $this->sunattrans->selectAll();
            $usuarios = $this->usuario->selectAll();
            $impuestos = $this->impuesto->selectAll();
            $unidades = $this->unidad->selectAll();


            ///////////// carga el documento deseado (cabecera )///////////
            $documento = $this->documento->selectOne($id);
            // carga detalle del domento ///////
            $detalles = $detallesmod->selectOneDoc($id);

//            $tipo = 'nota_credito';
//            $titulo = "Emitir nota de crédito electrónica";
           
            require_once 'view/documentocabecera/ordencompra/form_documento_ordcompra_edit.php';


            require_once 'view/layout/footer.php';
        } else {

            
            require_once 'view/error.php';


            require_once 'view/layout/footer.php';
        }
    }

    function ordencompra() {
        require_once 'view/layout/header.php';
//        $documentossuc = $this->docsucursal->select();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();

        $tipocambio = new tipocambio();
        $cambio = $tipocambio->selectMax();

        $detalles = array();
        $tipodoc = 'orden_compra';
        $nro = $this->documento->selectMax($tipodoc,$tipodoc,'ORDEN_COMPRA')->getNumero() + 1;

        
        require_once 'view/documentocabecera/ordencompra/form_documento_ordcompra.php';


        require_once 'view/layout/footer.php';
    }
    function cotizacion() {
        require_once 'view/layout/header.php';
//        $documentossuc = $this->docsucursal->select();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();

        $tipocambio = new tipocambio();
        $cambio = $tipocambio->selectMax();

        $detalles = array();
        $tipodoc = 'cotizacion';
        $nro = $this->documento->selectMax($tipodoc,$tipodoc,'COTIZACION')->getNumero() + 1;

        
        require_once 'view/documentocabecera/cotizacion/form_documento_cotizacion.php';


        require_once 'view/layout/footer.php';
    }

    function compra() {
        require_once 'view/layout/header.php';
//        $documentossuc = $this->docsucursal->selectAll();
        $personam = new persona();
        $transactions = $this->sunattrans->selectAll();
        $usuarios = $this->usuario->selectAll();
        $impuestos = $this->impuesto->selectAll();
        $unidades = $this->unidad->selectAll();

        $tipocambio = new tipocambio();
        $cambio = $tipocambio->selectMax();
        $tipo = 'Compra';
        $detalles = array();
        $documento = new documento();
        $personabydefault = $personam->bydefault(2);
        require_once 'view/documentocabecera/compra/form_documento_compra.php';


        require_once 'view/layout/footer.php';
    }

    function insertcompra(){

//        var_dump($_POST);
        $id = 0;
        if (isset($_POST['tipodoc']) && isset($_POST['txtserie']) && isset($_POST['txtnro']) && isset($_POST['cbmoneda']) && isset($_POST['incigv']) && 
                isset($_POST['dpfechaemision']) && isset($_POST['dpfechavencimiento']) && isset($_POST['txttipocambio']) && isset($_POST['txtrucbuscar']) && 
                isset($_POST['txtcliente']) && isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtordenc']) && isset($_POST['txtobservacion']) &&
                !empty($_POST['tipodoc']) && !empty($_POST['txtserie']) && !empty($_POST['txtnro']) && !empty($_POST['cbmoneda']) && !empty($_POST['dpfechaemision']) && !empty($_POST['dpfechavencimiento']) 
                && !empty($_POST['txttipocambio']) && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) && isset($_POST['id'])) {
            $serier = str_replace(PHP_EOL, ' ', $_POST['txtserie']);
            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
            
            $serie = ltrim($serier,'0');
            $numero = (int)($numeror);
            
        if($this->documento->duplicado($serie, $numero,'Compra') == 'valido'){
            $emision = trim($_POST['dpfechaemision']);

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = trim($_POST['dpfechavencimiento']);
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');
            
            if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }


            $documento = new documento();


//            $serie = $_POST['txtserie'];
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
            $tipodoc = $_POST['tipodoc'];
            
           
            $idpersona = $_POST['idcliente'];
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_SESSION['id'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
            $norden = $_POST['txtordenc'];
            $observacion = $_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipocambio = $_POST['txttipocambio'];


            $documento->setSerie($serie);
            $documento->setNumero($numero);
            $documento->setMoneda($moneda);
            $documento->setFechaemision($fechaemision);
            $documento->setFechavencimiento($fechavencimiento);
            $documento->setTipodoc('Compra');
            $documento->setIdusuario($idusuario);
            $documento->setIdpersona($idpersona);
            $documento->setRuc($ruc);
            $documento->setRazonsocial($razonsocial);
            $documento->setDireccion($direccion);
            $documento->setEmail($email);
            $documento->setNorden($norden);
            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipocambio($tipocambio);
            $documento->setTipo($tipodoc);
            $documento->setSujetoa($sujetoa);
            $documento->setIncigv($incigv);
            $documento->setGarantia(0);
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);
            
            
            
            
            
            $id = $documento->insert($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];

            $detalles = array();
            $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {
               $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);
                                                                                                                                                                                                                                                                                                              
                $produp = array(
                    $cantidad[$i],
                   $idpro
                );
                array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
            $producto = new producto();
            $iddetalle =$detalle->insert($detalles);
            $producto->updatestock($produpdate);


            if (isset($_POST['serieprod']) && isset($_POST['serieidprod'])) { //&& isset($_POST['idserie'])
//            var_dump($_POST['idserieitem']);
//            $idserie = $_POST['idserieitem'];
                $idprodserie = $_POST['serieidprod'];
                $serie = $_POST['serieprod'];

                $seriesd = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) { //////////// series de cada item q incluir = si                           //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


//                        $idup = array($idserie[$j]);
//                        array_push($idupdate, $idup);
                            array_push($seriesd, $da);
                        }


                        

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                    
                    ////////////////////////////////////////////////////
                    $series = array();
                        for ($i = 0; $i < count($serie); $i++) { ////////////// series de producto 
                            $d = array(
                                $serie[$i],
                                $idprodserie[$i],
                                1
                            );
                            array_push($series, $d);
                        }
                        $seriem = new serieProducto();
                        $seriem->insert($series); ////////////// insert de las series segun array input 
                }
                $seried = new serieDetalle();
                $seried->insert($seriesd, $idupdate);
//            
            }
            
            
            /////////////////////////////////

//            if (isset($_POST['serieidprod']) && isset($_POST['serieprod'])) {
////            var_dump($_POST['serieprod']);
//                $idprodserie = $_POST['serieidprod'];
//                $serie = $_POST['serieprod'];
//
//                $series = array();
//                for ($i = 0; $i < count($serie); $i++) {
//                    $d = array(
//                        $serie[$i],
//                        $idprodserie[$i],
//                        1
//                    );
//                    array_push($series, $d);
//                }
//                $seriem = new serieProducto();
//                $seriem->insert($series);
//            }
            
            ///////////////////////////
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
        }else {
            
             ?> 
            <script>
               
                 swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
            </script>  <?php
        }
        
            if($id > 0 ){
            ?>
            
            <script>
                
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                
                $('#FormularioAjaxDocumento').trigger("reset");
               
               $('#tabla').empty();
               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
    }else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
            
        }
    }
    function updatecompra(){

//        var_dump($_POST);
       
        if ( isset($_POST['cbmoneda']) && isset($_POST['incigv']) && 
                isset($_POST['dpfechaemision']) && isset($_POST['dpfechavencimiento']) && isset($_POST['txttipocambio']) && isset($_POST['txtrucbuscar']) && 
                isset($_POST['txtcliente']) && isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtordenc']) && isset($_POST['txtobservacion']) &&
                !empty($_POST['cbmoneda']) && !empty($_POST['dpfechaemision']) && !empty($_POST['dpfechavencimiento']) 
                && !empty($_POST['txttipocambio']) && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) && isset($_POST['id'])
                && isset($_POST['iddoc']) && !empty($_POST['iddoc']) && !is_nan($_POST['iddoc'])) {
//            $serier = str_replace(PHP_EOL, ' ', $_POST['txtserie']);
//            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
//            
//            $serie = ltrim($serier,'0');
//            $numero = (int)($numeror);
            $id = $_POST['iddoc'];
//        if($this->documento->duplicado($serie, $numero,'Compra') == 'valido'){
            $emision = trim($_POST['dpfechaemision']);

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = trim($_POST['dpfechavencimiento']);
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');
            
            if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }


            $documento = new documento();


//            $serie = $_POST['txtserie'];
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
//            $tipodoc = $_POST['tipodoc'];
            
           
            $idpersona = $_POST['idcliente'];
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_SESSION['id'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
            $norden = $_POST['txtordenc'];
            $observacion = $_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipocambio = $_POST['txttipocambio'];

            $documento->setId($id);
//            $documento->setSerie($serie);
//            $documento->setNumero($numero);
            $documento->setMoneda($moneda);
            $documento->setFechaemision($fechaemision);
            $documento->setFechavencimiento($fechavencimiento);
//            $documento->setTipodoc('Compra');
            $documento->setIdusuario($idusuario);
            $documento->setIdpersona($idpersona);
            $documento->setRuc($ruc);
            $documento->setRazonsocial($razonsocial);
            $documento->setDireccion($direccion);
            $documento->setEmail($email);
            $documento->setNorden($norden);
            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipocambio($tipocambio);
//            $documento->setTipo($tipodoc);
            $documento->setSujetoa($sujetoa);
            $documento->setIncigv($incigv);
            $documento->setGarantia(0);
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);
            
            $documento->update($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];

            $detalles = array();
            $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {
               $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);
                                                                                                                                                                                                                                                                                                              
                $produp = array(
                    $cantidad[$i],
                   $idpro
                );
                array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
            $producto = new producto();
            $detalle->delete($id);
            $iddetalle =$detalle->insert($detalles);
            $producto->updatestock($produpdate);


            if (isset($_POST['serieprod']) && isset($_POST['serieidprod'])) { //&& isset($_POST['idserie'])
//            var_dump($_POST['idserieitem']);
//            $idserie = $_POST['idserieitem'];
                $idprodserie = $_POST['serieidprod'];
                $serie = $_POST['serieprod'];

                $seriesd = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) { //////////// series de cada item q incluir = si                           //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


//                        $idup = array($idserie[$j]);
//                        array_push($idupdate, $idup);
                            array_push($seriesd, $da);
                        }


                        

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                    
                    ////////////////////////////////////////////////////
                    $series = array();
                        for ($i = 0; $i < count($serie); $i++) { ////////////// series de producto 
                            $d = array(
                                $serie[$i],
                                $idprodserie[$i],
                                1
                            );
                            array_push($series, $d);
                        }
                        $seriem = new serieProducto();
                        $seriem->insert($series); ////////////// insert de las series segun array input 
                }
                $seried = new serieDetalle();
                $seried->insert($seriesd, $idupdate);
//            
            }
            
            
            /////////////////////////////////

//            if (isset($_POST['serieidprod']) && isset($_POST['serieprod'])) {
////            var_dump($_POST['serieprod']);
//                $idprodserie = $_POST['serieidprod'];
//                $serie = $_POST['serieprod'];
//
//                $series = array();
//                for ($i = 0; $i < count($serie); $i++) {
//                    $d = array(
//                        $serie[$i],
//                        $idprodserie[$i],
//                        1
//                    );
//                    array_push($series, $d);
//                }
//                $seriem = new serieProducto();
//                $seriem->insert($series);
//            }
            
            ///////////////////////////
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }

            if($id > 0 ){
            ?>
            
            <script>
                
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
              
            </script>
            <?php
            
            
            
            }else{
                ?> 
                <script>

                     swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
                </script>  <?php

            }
    }else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
            
        }
    }

    function insertordencompra() {

//        var_dump($_POST);

        if (isset($_POST['tipodoc']) && isset($_POST['txtnro']) && isset($_POST['cbmoneda']) && isset($_POST['incigv']) && isset($_POST['dpfechaemision']) 
                && isset($_POST['dpfechavencimiento']) && isset($_POST['txttipocambio']) && isset($_POST['txtrucbuscar']) && isset($_POST['txtcliente']) && 
                isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtgarantia']) && !empty($_POST['txtnro']) && !empty($_POST['cbmoneda']) && !empty($_POST['dpfechaemision'])
                && !empty($_POST['dpfechavencimiento']) && !empty($_POST['txttipocambio']) && !empty($_POST['txtgarantia']) && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) &&
                isset($_POST['id'])) {
//            $serier = str_replace(PHP_EOL, ' ', $_POST['txtserie']);
            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
            
            $serie = '';
            $numero = (int)($numeror);
            
        if($this->documento->duplicado($serie, $numero,'orden_compra') == 'valido'){
            $emision = $_POST['dpfechaemision'];

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = $_POST['dpfechavencimiento'];
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');

            
            
            
           if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }
            
            $documento = new documento();


            $serie='orden_compra';
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
            $tipodoc = $_POST['tipodoc'];
            
            $idpersona = $_POST['idcliente'];
            
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_SESSION['id'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
//        $norden=$_POST['txtordenc'];
//        $observacion=$_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipocambio = $_POST['txttipocambio'];
            $garantia = $_POST['txtgarantia'];
            if(empty($garantia)){
                $garantia = 0;
            }

            $documento->setSerie($serie);
            $documento->setNumero($numero);
            $documento->setMoneda($moneda);
            $documento->setFechaemision($fechaemision);
            $documento->setFechavencimiento($fechavencimiento);
            $documento->setTipodoc($tipodoc);
            $documento->setIdusuario($idusuario);
            $documento->setIdpersona($idpersona);
            $documento->setRuc($ruc);
            $documento->setRazonsocial($razonsocial);
            $documento->setDireccion($direccion);
            $documento->setEmail($email);
//            $documento->setNorden($norden);
//            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipocambio($tipocambio);
            $documento->setTipo($tipodoc);
            $documento->setGarantia($garantia);
            
            $documento->setIncigv($incigv);  
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);
            $id = $documento->insert($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];

            $detalles = array();
//         $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {

                $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);

//            $produp = array(
//                $cantidad[$i],
//                $idprod[$i]
//                
//            );
//            array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
//        $producto = new producto();
            $iddetalle =$detalle->insert($detalles);
//        $producto->updatestock($produpdate);

            if (isset($_POST['serieprod']) && isset($_POST['serieidprod'])) { //&& isset($_POST['idserie'])
//            var_dump($_POST['idserieitem']);
//            $idserie = $_POST['idserieitem'];
                $idprodserie = $_POST['serieidprod'];
                $serie = $_POST['serieprod'];

                $seriesd = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) { //////////// series de cada item q incluir = si                           //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


                            array_push($seriesd, $da);
                        }


                        

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                    

                }
                $seried = new serieDetalle();
                $seried->insert($seriesd, $idupdate);
//            
            }



            
            
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
        }else{
            ?> 
            <script>
               
                 swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
            </script>  <?php
        }
         if($id > 0 ){
            ?>
            
            <script>
                
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                 var nro = $('#txtnro').val();
                $('#FormularioAjaxDocumento').trigger("reset");
               if(nro != '' || !isNaN(nro)){
                   $('#txtnro').val(parseInt(nro.trim()) + 1);
               }
               $('#tabla').empty();
               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
    } else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
            
        }
    }
    function insertcotizacion() {

//        var_dump($_POST);
        $id = 0;
        if ( isset($_POST['txtnro']) && isset($_POST['cbmoneda']) 
                && isset($_POST['dpfechaemision']) && isset($_POST['txtvalidezdia'])
                && isset($_POST['txtplazoentrega']) && isset($_POST['cbvendedor'])  
                && isset($_POST['txtatencion']) && isset($_POST['txttipocambio']) && isset($_POST['txtrucbuscar']) && isset($_POST['txtcliente']) 
                && isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtgarantia'])
                && isset($_POST['txtobservacion']) && !empty($_POST['txtnro']) && !empty($_POST['cbmoneda']) && !empty($_POST['dpfechaemision']) &&
                !empty($_POST['txtvalidezdia']) && !empty($_POST['txtplazoentrega']) && !empty($_POST['txttipocambio']) && !empty($_POST['txtgarantia']) 
                && !empty($_POST['cbvendedor']) && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) && isset($_POST['id'])) {
            
//            $serier = str_replace(PHP_EOL, ' ', $_POST['txtserie']);
            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
            
            $serie = 'COTIZACION';
            $numero = (int)($numeror);
            
        if($this->documento->duplicado($serie, $numero,'Cotizacion') == 'valido'){

            $emision = $_POST['dpfechaemision'];

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


//            $vencimiento = $_POST['dpfechavencimiento'];
//            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = '0000-00-00';
            $condicionpago = 'Contado';
            $validezdia = 0;
            $plazoentrega = 0;
//            $diacredito = 0;
            $garantia=0;
            if(!empty($_POST['txtvalidezdia'])){
                
                $validezdia = $_POST['txtvalidezdia'];
            }
            if(!empty($_POST['txtplazoentrega'])){
                
                $plazoentrega = $_POST['txtplazoentrega'];
            }
//            if(!empty($_POST['txtdiacredito'])){
//                
//                $diacredito = $_POST['txtdiacredito'];
//            }
            if(!empty($_POST['txtgarantia'])){
                
                $garantia = $_POST['txtgarantia'];
            }
            
            if(!isset($_POST['ckcondicion'])){
                $condicionpago = 'Credito';
                
                
            }

            $condionpagodia = 0;
            if(isset($_POST['txtdiacredito'])){
                $condionpagodia = $_POST['txtdiacredito'];
                
            }
            
            if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }
            
            $documento = new documento();


//        $serie=$_POST['txtserie'];
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
            $tipodoc = 'Cotizacion';
            
            $idpersona = $_POST['idcliente'];
            
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_POST['cbvendedor'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
//        $norden=$_POST['txtordenc'];
//        $observacion=$_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipocambio = $_POST['txttipocambio'];
//            $garantia = $garantia;
            $atencion = $_POST['txtatencion'];
            $observacion = $_POST['txtobservacion'];
            $documento->setSerie('COTIZACION');
            $documento->setNumero($numero);
            $documento->setMoneda($moneda);
            $documento->setFechaemision($fechaemision);
            $documento->setFechavencimiento($fechavencimiento);
            $documento->setTipodoc($tipodoc);
            $documento->setIdusuario($idusuario);
            $documento->setIdpersona($idpersona);
            $documento->setRuc($ruc);
            $documento->setRazonsocial($razonsocial);
            $documento->setDireccion($direccion);
            $documento->setEmail($email);
//            $documento->setNorden($norden);
//            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipocambio($tipocambio);
            $documento->setTipo($tipodoc);
            $documento->setGarantia($garantia);
            $documento->setValidezdias($validezdia);
            $documento->setPlazoentregadias($plazoentrega);
            $documento->setCondicionpagodias($condionpagodia);
            $documento->setCondicionpago($condicionpago);
            $documento->setAtencion($atencion);
            $documento->setObservacion($observacion);
            $documento->setIncigv($incigv);
            
            $id = $documento->insert($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];
            
            

            $detalles = array();
//         $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {
                 $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);

//            $produp = array(
//                $cantidad[$i],
//                $idprod[$i]
//                
//            );
//            array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
//        $producto = new producto();
            $iddetalle =$detalle->insert($detalles);
//        $producto->updatestock($produpdate);

            if (isset($_POST['serieprod']) && isset($_POST['serieidprod'])) { //&& isset($_POST['idserie'])
//            var_dump($_POST['idserieitem']);
//            $idserie = $_POST['idserieitem'];
                $idprodserie = $_POST['serieidprod'];
                $serie = $_POST['serieprod'];

                $seriesd = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) { //////////// series de cada item q incluir = si                           //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


//                        $idup = array($idserie[$j]);
//                        array_push($idupdate, $idup);
                            array_push($seriesd, $da);
                        }


                        

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                    
                    ////////////////////////////////////////////////////
//                    $series = array();
//                        for ($i = 0; $i < count($serie); $i++) { ////////////// series de producto 
//                            $d = array(
//                                $serie[$i],
//                                $idprodserie[$i],
//                                1
//                            );
//                            array_push($series, $d);
//                        }
//                        $seriem = new serieProducto();
//                        $seriem->insert($series); ////////////// insert de las series segun array input 
                }
                $seried = new serieDetalle();
                $seried->insert($seriesd, $idupdate);
//            
            }





//            if (isset($_POST['serieidprod']) && isset($_POST['serieprod'])) {
////            var_dump($_POST['serieprod']);
//                $idprodserie = $_POST['serieidprod'];
//                $serie = $_POST['serieprod'];
//
//                $series = array();
//                for ($i = 0; $i < count($serie); $i++) {
//                    $d = array(
//                        $serie[$i],
//                        $idprodserie[$i],
//                        1
//                    );
//                    array_push($series, $d);
//                }
//                $seriem = new serieProducto();
//                $seriem->insert($series);
//            }
            
            
            
            
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
        }else {
            
             ?> 
            <script>
               
                 swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
            </script>  <?php
        }
        
        
             if($id > 0 ){
            ?>
            
            <script>
                VentanaCentrada('<?=base_url?>documento/imprimircotizacion&id=<?= $id ?>','PDF','','','','false');
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                 var nro = $('#txtnro').val();
                $('#FormularioAjaxDocumento').trigger("reset");
               if(nro != '' || !isNaN(nro)){
                   $('#txtnro').val(parseInt(nro.trim()) + 1);
               }
               $('#tabla').empty();
               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
        
    }
        else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
            
        }
        
 
    }
    
    
    function insertsale() {

//    var_dump($_POST);
        $id = 0;
        
        if (isset($_POST['cbserie']) && isset($_POST['txtnro']) && isset($_POST['cbmoneda']) && isset($_POST['dpfechaemision']) 
                && isset($_POST['dpfechavencimiento']) && isset($_POST['cbtipoop']) && isset($_POST['cbvendedor'])
                        && isset($_POST['txtrucbuscar']) && isset($_POST['txtcliente']) && isset($_POST['txtdireccion']) 
                && isset($_POST['txtemail']) && isset($_POST['txtordenc']) && isset($_POST['txtobservacion'])  && isset($_POST['cbtipopago']) && 
                isset($_POST['txtnroop']) && isset($_POST['cbtipoventa']) && isset($_POST['tipodoc']) && !empty($_POST['tipodoc']) && !empty($_POST['cbserie']) &&
                !empty($_POST['dpfechaemision']) && !empty($_POST['dpfechavencimiento']) && !empty($_POST['cbtipoop']) && !empty($_POST['cbvendedor']) && 
                !empty($_POST['cbtipoventa']) && !empty($_POST['cbtipopago'])  && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) && isset($_POST['id']) )  {
            $serier = str_replace(PHP_EOL, ' ', $_POST['cbserie']);
            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
            
            $serie = ltrim($serier,'0');
            $numero = (int)($numeror);
            
        if($this->documento->duplicado($serie, $numero,'Venta') == 'valido'){
            
        
            
            $emision = $_POST['dpfechaemision'];

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = $_POST['dpfechavencimiento'];
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');
            
            
            if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }

            $documento = new documento();


            $tipoventa = $_POST['cbtipoventa'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
            $tipoventaop = $_POST['cbtipoop'];
            $idpersona = $_POST['idcliente'];
            
             $idpersona = $_POST['idcliente'];
             if(empty($idpersona)){
                $idpersona = 0;
            }
            $idusuario = $_POST['cbvendedor'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
            $norden = $_POST['txtordenc'];
            $observacion = $_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipodoc = $_POST['tipodoc'];
            $tipopago = $_POST['cbtipopago'];
            $nrotipopago = $_POST['txtnroop'];

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
            $documento->setTipodoc('Venta');
            $documento->setTipo($tipodoc);
            
            $documento->setGarantia(0);
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);
            $documento->setTipopago($tipopago);
            $documento->setNrooptipopago($nrotipopago);
            $documento->setIncigv($incigv);
            $documento->setTipoventa($tipoventa);

            $id = $documento->insert($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];
            

            $detalles = array();
            $iddetalle = array();
            $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {
                $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                    
                );
                array_push($detalles, $d);

                $produp = array(
                    ($cantidad[$i]) * -1,
                    $idprod[$i]
                );
                array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
            $producto = new producto();
            $iddetalle = $detalle->insert($detalles);
            $producto->updatestock($produpdate);


            if (isset($_POST['serieprod']) && isset($_POST['idserie'])) {
//            var_dump($_POST['idserieitem']);
                $idserie = $_POST['idserieitem'];
                $serie = $_POST['serieprod'];

                $series = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) {                            //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


                            $idup = array($idserie[$j]);
                            array_push($idupdate, $idup);
                            array_push($series, $da);
                        }

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                }
                $seried = new serieDetalle();
                $seried->insert($series, $idupdate);
//            
            }
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
        }else{ 
            ?> 
            <script>
               
                 swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
            </script>  <?php
        }
        
        if($id > 0 ){
            ?>
            
            <script>
                VentanaCentrada('<?=base_url?>documento/printticket&id=<?= $id ?>','Ticket','','','','false');
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                 var nro = $('#txtnro').val();
                $('#FormularioAjaxDocumento').trigger("reset");
               if(nro != '' || !isNaN(nro)){
                   $('#txtnro').val(parseInt(nro.trim()) + 1);
               }
               $('#tabla').empty();
               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
        }else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
            
        }
    }

    function insertnota() {

//    var_dump($_POST);
        $id=0;
        if (isset($_POST['cbserie']) && isset($_POST['txtnro']) && isset($_POST['cbmoneda']) && isset($_POST['dpfechaemision']) && isset($_POST['dpfechavencimiento']) 
                && isset($_POST['cbtipoop']) && isset($_POST['txtrucbuscar']) && isset($_POST['txtcliente']) && isset($_POST['txtdireccion']) && isset($_POST['txtemail'])
                        && isset($_POST['cbdocref']) && isset($_POST['txtserieref']) && isset($_POST['txtnumeroref']) && isset($_POST['cbidtiponota']) 
                && isset($_POST['txtobservacion']) && !empty($_POST['cbserie']) && !empty($_POST['txtnro']) &&
                !empty($_POST['dpfechaemision']) && !empty($_POST['dpfechavencimiento']) && !empty($_POST['cbtipoop'])  && 
                 !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) && isset($_POST['id']) && !empty($_POST['cbdocref']) && !empty($_POST['txtserieref']) && !empty($_POST['txtnumeroref'])
                && !empty($_POST['cbidtiponota']) && !empty($_POST['txtobservacion'])) {

            $serier = str_replace(PHP_EOL, ' ', $_POST['cbserie']);
            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
            $tiponota = $_POST['tiponota'];
            $serie = ltrim($serier,'0');
            $numero = (int)($numeror);
            
        if($this->documento->duplicado($serie, $numero,$tiponota) == 'valido'){
            $emision = $_POST['dpfechaemision'];

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = $_POST['dpfechavencimiento'];
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');

            if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }

            $documento = new documento();


//            $serie = $_POST['cbserie'];
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
            $tipoventaop = $_POST['cbtipoop'];
            
            
            $idpersona = $_POST['idcliente'];
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_SESSION['id'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
//        $norden=$_POST['txtordenc'];
            $observacion = $_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipodoc = $_POST['tiponota'];
            $serieref = $_POST['txtserieref'];
            $numeroref = $_POST['txtnumeroref'];
            $idtiponota = $_POST['cbidtiponota'];
            $observacion = $_POST['txtobservacion'];
            $docref = $_POST['cbdocref'];

            

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
//        $documento->setNorden($norden);
            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipodoc($tiponota);
            $documento->setTipo($tipodoc);
            $documento->setSerieref($serieref);
            $documento->setNumeroref($numeroref);
            $documento->setIdtiponota($idtiponota);
            $documento->setObservacion($observacion);
            $documento->setDocref($docref);
            $documento->setIncigv($incigv);
            
            $documento->setGarantia(0);
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);

            $id = $documento->insert($documento);
            
            $idprod = $_POST['id'];
            
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
             $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];
            


            $detalles = array();
            $iddetalle = array();
            $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {
                $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);

                if ($tiponota == 'nota_debito') {
                    $cantidad = ($cantidad[$i]) * -1;
                } else {
                    $cantidad = ($cantidad[$i]);
                }

                $produp = array(
                    $cantidad,
                    $idprod[$i]
                );
                array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
            $producto = new producto();
            $iddetalle = $detalle->insert($detalles);
            $producto->updatestock($produpdate);


            if (isset($_POST['serieprod']) && isset($_POST['idserie'])) {
//            var_dump($_POST['idserieitem']);
                $idserie = $_POST['idserieitem'];
                $serie = $_POST['serieprod'];

                $series = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) {                            //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


                            $idup = array($idserie[$j]);
                            array_push($idupdate, $idup);
                            array_push($series, $da);
                        }

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                }
                $seried = new serieDetalle();
                $seried->insert($series, $idupdate);
//            
            }
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
        }else{
            
             ?> 
            <script>
               
                 swal('No se realizo registro', 'El documento ya se encuentra emitido', 'error');
            </script>  <?php
        }
        
            if($id > 0 ){
            ?>
            
            <script>
                VentanaCentrada('<?=base_url?>documento/printticket&id=<?= $id ?>','Ticket','','','','false');
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
                 var nro = $('#txtnro').val();
                $('#FormularioAjaxDocumento').trigger("reset");
               if(nro != '' || !isNaN(nro)){
                   $('#txtnro').val(parseInt(nro.trim()) + 1);
               }
               $('#tabla').empty();
               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
    }else {
        
        ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatorios', 'error');
            </script>  <?php
        
        
        
    }
    }
    
    function updateordencompra() {

//        var_dump($_POST);

        if ( isset($_POST['cbmoneda']) && isset($_POST['incigv']) && isset($_POST['dpfechaemision']) 
                && isset($_POST['dpfechavencimiento']) && isset($_POST['txttipocambio']) && isset($_POST['txtrucbuscar']) && isset($_POST['txtcliente']) && 
                isset($_POST['txtdireccion']) && isset($_POST['txtemail']) && isset($_POST['txtgarantia'])  && !empty($_POST['cbmoneda']) && !empty($_POST['dpfechaemision'])
                && !empty($_POST['dpfechavencimiento']) && !empty($_POST['txttipocambio']) && !empty($_POST['txtgarantia']) && !empty($_POST['txtrucbuscar']) && !empty($_POST['txtcliente']) &&
                isset($_POST['id']) && isset($_POST['iddoc']) && !empty($_POST['iddoc']) && !is_nan($_POST['iddoc'])) {
//            $serier = str_replace(PHP_EOL, ' ', $_POST['txtserie']);
//            $numeror = str_replace(PHP_EOL, ' ', $_POST['txtnro']);
//            
//            $serie = '';
//            $numero = (int)($numeror);
            $id = $_POST['iddoc'];
            
//        if($this->documento->duplicado($serie, $numero,'orden_compra') == 'valido'){
            $emision = $_POST['dpfechaemision'];

            $dateemis = DateTime::createFromFormat('d/m/Y', $emision);
            $emisionf = $dateemis->format('Y-m-d');


            $vencimiento = $_POST['dpfechavencimiento'];
            $dateven = DateTime::createFromFormat('d/m/Y', $vencimiento);
            $vencimientof = $dateven->format('Y-m-d');

            
            
            
           if(isset($_POST['incigv'])){
                $incigv = 1;
            }else {
                $incigv = 0;
            }
            
            if(!empty($_POST['cbsujetoa'])){
                $sujetoa = $_POST['cbsujetoa'];
                
            }else {
                $sujetoa = 0;
            }
            
            $documento = new documento();


//            $serie='orden_compra';
//            $numero = $_POST['txtnro'];
            $moneda = $_POST['cbmoneda'];
            $fechaemision = $emisionf;
            $fechavencimiento = $vencimientof;
//            $tipodoc = $_POST['tipodoc'];
            
            $idpersona = $_POST['idcliente'];
            
             if(empty($idpersona)){
                $idpersona = 0;
            }
            
            $idusuario = $_SESSION['id'];
            $ruc = $_POST['txtrucbuscar'];
            $razonsocial = $_POST['txtcliente'];
            $direccion = $_POST['txtdireccion'];
            $email = $_POST['txtemail'];
//        $norden=$_POST['txtordenc'];
//        $observacion=$_POST['txtobservacion'];
            $idsucursal = $_SESSION['idsucursal'];
            $tipocambio = $_POST['txttipocambio'];
            $garantia = $_POST['txtgarantia'];
            if(empty($garantia)){
                $garantia = 0;
            }
            $documento->setId($id);
//            $documento->setSerie($serie);
//            $documento->setNumero($numero);
            $documento->setMoneda($moneda);
            $documento->setFechaemision($fechaemision);
            $documento->setFechavencimiento($fechavencimiento);
//            $documento->setTipodoc($tipodoc);
            $documento->setIdusuario($idusuario);
            $documento->setIdpersona($idpersona);
            $documento->setRuc($ruc);
            $documento->setRazonsocial($razonsocial);
            $documento->setDireccion($direccion);
            $documento->setEmail($email);
//            $documento->setNorden($norden);
//            $documento->setObservacion($observacion);
            $documento->setIdsucursal($idsucursal);
            $documento->setTipocambio($tipocambio);
//            $documento->setTipo($tipodoc);
            $documento->setGarantia($garantia);
            
            $documento->setIncigv($incigv);  
            $documento->setValidezdias(0);
            $documento->setPlazoentregadias(0);
            $documento->setCondicionpagodias(0);
            $documento->update($documento);

            $idprod = $_POST['id'];
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcionprod'];
            $unidad = $_POST['unidad'];
            $tipoigv = $_POST['tipoigv'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $subtotal = $_POST['subtotal'];
            $total = $_POST['total'];
            
            $igvprod = $_POST['igvprod'];
            $valorunitref = $_POST['valorunitref'];
            $montobaseigv = $_POST['montobaseigv'];
            $montobaseexpo = $_POST['montobaseexpo'];
            $montobaseexonerado = $_POST['montobaseexonerado'];
            $montobaseinafecto = $_POST['montobaseinafecto'];
            $montobasegratuito = $_POST['montobasegratuito'];
            $montobaseivap = $_POST['montobaseivap'];
            $montobaseotrostributos = $_POST['montobaseotrostributos'];
            $tributoventagratuita = $_POST['tributoventagratuita'];
            $otrostributos = $_POST['otrostributos'];
            $porcentajeigv = $_POST['porcentajeigv'];
            $porcentajeotrostributos = $_POST['porcentajeotrostributos'];
            $porcentajetributoventagratuita = $_POST['porcentajetributoventagratuita'];
            $montooriginal = $_POST['montooriginal'];
            $monedaoriginal = $_POST['monedaoriginal'];
            $incluye = $_POST['incluye'];

            $detalles = array();
//         $produpdate = array();  //////////// array de productos actualizar stock
            for ($i = 0; $i < count($codigo); $i++) {

                $idpro = $idprod[$i];
                $igvp = $igvprod[$i];
                $valorunitr = $valorunitref[$i];
                $montobaseig = $montobaseigv[$i];
                $montobaseexp = $montobaseexpo[$i];
                $montobaseexon = $montobaseexonerado[$i];
                $montobaseinaf = $montobaseinafecto[$i];
                $montobasegratu = $montobasegratuito[$i];
                $montobaseiv = $montobaseivap[$i];
                $montobaseotrostrib = $montobaseotrostributos[$i];
                $tributoventagrat = $tributoventagratuita[$i];
                $otrostrib = $otrostributos[$i];
                $porceigv = $porcentajeigv[$i];
                $porcotrostrib = $porcentajeotrostributos[$i];
                $porcentajetribventgrat = $porcentajetributoventagratuita[$i];
                $montoorig = $montooriginal[$i];
                if(empty($idprod[$i])){
                    $idpro = 0;
                }
                if(empty($igvprod[$i])){
                    $igvp = 0;
                }
                if(empty($valorunitref[$i])){
                    $valorunitr = 0;
                }
                if(empty($montobaseigv[$i])){
                    $montobaseig = 0;
                }
                if(empty($montobaseexpo[$i])){
                    $montobaseexp = 0;
                }
                if(empty($montobaseexonerado[$i])){
                    $montobaseexon = 0;
                }
                if(empty($montobaseinafecto[$i])){
                    $montobaseinaf = 0;
                }
                if(empty($montobasegratuito[$i])){
                    $montobasegratu = 0;
                }
                if(empty($montobaseivap[$i])){
                    $montobaseiv = 0;
                }
                if(empty($montobaseotrostributos[$i])){
                    $montobaseotrostrib = 0;
                }
                if(empty($tributoventagratuita[$i])){
                    $tributoventagrat = 0;
                }
                if(empty($otrostributos[$i])){
                    $otrostrib = 0;
                }
                if(empty($porcentajeigv[$i])){
                    $porceigv = 0;
                }
                if(empty($porcentajeotrostributos[$i])){
                    $porcotrostrib = 0;
                }
                if(empty($porcentajetributoventagratuita[$i])){
                    $porcentajetribventgrat = 0;
                }
                if(empty($montooriginal[$i])){
                    $montoorig = 0;
                }
                $d = array(
                    $idpro,
                    $codigo[$i],
                    $descripcion[$i],
                    $unidad[$i],
                    $tipoigv[$i],
                    $cantidad[$i],
                    $precio[$i],
                    $subtotal[$i],
                    $total[$i],
                    $id,
                    $igvp,
                    $valorunitr,
                    $montobaseig,
                    $montobaseexp,
                    $montobaseexon,
                    $montobaseinaf,
                    $montobasegratu,
                    $montobaseiv,
                    $montobaseotrostrib,
                    $tributoventagrat,
                    $otrostrib,
                    $porceigv,
                    $porcotrostrib,
                    $porcentajetribventgrat,
                    $montoorig,
                    $monedaoriginal[$i],
                    $incluye[$i]
                );
                array_push($detalles, $d);

//            $produp = array(
//                $cantidad[$i],
//                $idprod[$i]
//                
//            );
//            array_push($produpdate, $produp);
            }

            $detalle = new Detalle();
//        $producto = new producto();
            $detalle->delete($id);
            $iddetalle =$detalle->insert($detalles);
//        $producto->updatestock($produpdate);

            if (isset($_POST['serieprod']) && isset($_POST['serieidprod'])) { //&& isset($_POST['idserie'])
//            var_dump($_POST['idserieitem']);
//            $idserie = $_POST['idserieitem'];
                $idprodserie = $_POST['serieidprod'];
                $serie = $_POST['serieprod'];

                $seriesd = array();
                $idupdate = array();
                $cant = 0;
                $cantini = 0;
                for ($i = 0; $i < count($codigo); $i++) { //recorro cada unos de los item
                    if ($incluye[$i] == 'Si') { //// pregunto si incluye serie // 
                        $cant = $cantidad[$i]; /// recojo la cantida de series a incluir en el item
//                    echo 'cantidad '.$cant;

                        for ($j = $cantini; $j < $cant + $cantini; $j++) { //////////// series de cada item q incluir = si                           //recorro las series 
                            $da = array(
                                $serie[$j],
//                            $idserie[$j],
                                $iddetalle[$i],
                                1
                            );


                            array_push($seriesd, $da);
                        }


                        

                        $cantini += $cant;
//                    echo 'cant '.$cantini;
//                    echo 'j '.$j;
                    }
                    

                }
                $seried = new serieDetalle();
                $seried->insert($seriesd, $idupdate);
//            
            }



            
            
            if (isset($_POST['serieguia']) && isset($_POST['tipoguia'])) {
//            var_dump($_POST['serieguia']);
                $serieguia = $_POST['serieguia'];
                $tipoguia = $_POST['tipoguia'];

                $guias = array();
                for ($i = 0; $i < count($serieguia); $i++) {
                    $d = array(
                        $serieguia[$i],
                        $tipoguia[$i],
                        $id
                    );
                    array_push($guias, $d);
                }
                $docguias = new documentoGuia();
                $docguias->insert($guias);
            }
            if (isset($_POST['nombreotros']) && isset($_POST['descripcionotros'])) {
//            var_dump($_POST['nombreotros']);
                $nombre = $_POST['nombreotros'];
                $descripcion = $_POST['descripcionotros'];

                $otros = array();
                for ($i = 0; $i < count($nombre); $i++) {
                    $d = array(
                        $nombre[$i],
                        $descripcion[$i],
                        $id
                    );
                    array_push($otros, $d);
                }
                $otrosm = new documentoOtros();
                $otrosm->insert($otros);
            }
       
         if($id > 0 ){
            ?>
            
            <script>
                
                 swal("Éxitosamente!", "Operación realizada correctamente.", "success");
//                 var nro = $('#txtnro').val();
////                $('#FormularioAjaxDocumento').trigger("reset");
//               if(nro != '' || !isNaN(nro)){
//                   $('#txtnro').val(parseInt(nro.trim()) + 1);
//               }
//               $('#tabla').empty();
//               $('#lblgravada').html('<strong>GRAVADA: </strong>  S/ 0.00');
//               $('#lbligv').html('<strong>IGV 18%: </strong>  S/ 0.00');
//               $('#lbltotal').html('<strong>TOTAL: </strong>    S/ 0.00');
            </script>
            <?php
            
            
            
        }else{
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor recargue la página', 'error');
            </script>  <?php
            
        }
    } else {
            ?> 
            <script>
               
                 swal('No se realizarón cambios', 'Por favor ingrese campos obligatoriosss', 'error');
            </script>  <?php
            
        }
    }
    
    
    
    function selectmaxnro(){
        
//        var_dump($_POST);
        if(isset($_POST['tipo']) && isset($_POST['tipod']) && isset($_POST['serie'])){
//            var_dump($_POST);
            $tipo = $_POST['tipo'];
            $tipod = $_POST['tipod'];
            $serie = $_POST['serie'];
                    
            $documento = $this->documento->selectMax($tipod,$tipo,$serie);
             $numeror = str_replace(PHP_EOL, ' ', $documento->getNumero());
            echo (int)$numeror + 1;
        }
        
        
        
        
    }
    
    function anular(){
        $fila = 0;
        if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['txtmotivo'])){        
            
            if(!empty($_POST['txtmotivo'])){
                $id = $_POST['id'];
                $motivo = $_POST['txtmotivo'];
                
                $fila = $this->documento->anular($id,$motivo);
               
                if($fila>0){
                    echo 'Redireccionando ...';
                    echo "<META HTTP-EQUIV ='Refresh' CONTENT='0; URL=".base_url."documento/selectdocument'>";

                }else {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> YA SE ENCUENTRA ANULADA
                    </div>';

                }
                
            }else {
                
                echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> INGRESE MOTIVO DE ANULACIÓN
                </div>';
            }
            
        
        }
        
        
//        if($fila > 0){
//            
//        } else {
//            require_once 'view/layout/header.php';
//            require_once 'view/error.php';
//            require_once 'view/layout/footer.php';
//        }
    }
            
    function printticket(){
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            $sucursal = new sucursal();
            $detalle = new Detalle();
            $sucur = $sucursal->selectOne($_SESSION['idsucursal']);
            $document = $this->documento->selectOne($id);
            $detalles = $detalle->selectOneDoc($id);
//            var_dump($sucur);
            require_once 'view/CifrasEnLetras.php';
            require_once 'view/documentocabecera/ticket.php';   
        }
 
    }
    function imprimir(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];           
            $sucursal = new sucursal();
            $detalle = new Detalle();
            $sucur = $sucursal->selectOne($_SESSION['idsucursal']);
            $document = $this->documento->selectOne($id);
            $detalles = $detalle->selectOneDoc($id);
//            require_once "vendor/autoload.php";
            require_once 'libs/phpqrcode/qrlib.php';
            require_once 'view/CifrasEnLetras.php'; 
//            require_once 'libs/dompdf';
            require_once 'view/documentocabecera/printA4.php'; 
        }
    }
    function imprimircotizacion(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];           
            $sucursal = new sucursal();
            $detalle = new Detalle();
            $cuentam  = new cuentaBancaria();
            $sucur = $sucursal->selectOne($_SESSION['idsucursal']);
            $document = $this->documento->selectOne($id);
            $detalles = $detalle->selectOneDoc($id);
            $cuentas= $cuentam->selectAll();
//            require_once "vendor/autoload.php";
            require_once 'libs/phpqrcode/qrlib.php';
            require_once 'view/CifrasEnLetras.php'; 
//            require_once 'libs/dompdf';
            require_once 'view/documentocabecera/printCotizacion.php'; 
        }
    }
    function imprimirexcel(){
//        var_dump($_GET);
         if (isset($_GET['dpdesde']) && isset($_GET['dphasta']) && isset($_GET['cbtipocomprobante']) && isset($_GET['txtbuscar'])
                 && isset($_GET['txtserie']) && isset($_GET['txtnumero']) && isset($_GET['cbsucursal']) && isset($_GET['tipodoc'])) {


            $desde = $_GET['dpdesde'];
//            $dated = DateTime::createFromFormat('d/m/Y', $desde);
//            $datedf = $dated->format('Y-m-d');

            $hasta = $_GET['dphasta'];
//            $dateh = DateTime::createFromFormat('d/m/Y', $hasta);
//            $datehf = $dateh->format('Y-m-d');

            $tipocomp = $_GET['cbtipocomprobante'];
            $tipodoc = $_GET['tipodoc'];

            $buscar = $_GET['txtbuscar'];
            $serie = $_GET['txtserie'];
            $numero = $_GET['txtnumero'];
            $sucursal = $_GET['cbsucursal'];
            
            $documentos = $this->documento->select($desde, $hasta, $tipocomp,$tipodoc, $buscar, $serie, $numero, $sucursal);
//            var_dump($documentos);
            require_once 'view/reportes/functions/excel.php';
            
//            activeErrorReporting();
//            noCli();

            require_once 'plugins/PHPExcel/Classes/PHPExcel.php';
            require_once 'view/reportes/searchdocumentExcel.php';
            
        }
        
        
        
    }
    function imprimirexcelventadetallado(){
        var_dump($_GET);
         if (isset($_GET['dpdesde']) && isset($_GET['dphasta']) && isset($_GET['cbtipocomprobante']) 
                 && isset($_GET['txtbuscar']) && isset($_GET['txtserie']) && isset($_GET['txtnumero']) && isset($_GET['cbsucursal'])
                 && isset($_GET['cbmoneda'])) {


            $desde = $_GET['dpdesde'];
//            $dated = DateTime::createFromFormat('d/m/Y', $desde);
//            $datedf = $dated->format('Y-m-d');

            $hasta = $_GET['dphasta'];
//            $dateh = DateTime::createFromFormat('d/m/Y', $hasta);
//            $datehf = $dateh->format('Y-m-d');

            $tipocomp = $_GET['cbtipocomprobante'];

            $moneda = $_GET['cbmoneda'];
            $buscar = $_GET['txtbuscar'];
            $serie = $_GET['txtserie'];
            $numero = $_GET['txtnumero'];
            $sucursal = $_GET['cbsucursal'];
//            
            $detallado = $this->documento->selectdetallado($desde, $hasta, $tipocomp, 'Venta',$buscar, $serie, $numero,$moneda, $sucursal);
//            var_dump($documentos);
            require_once 'view/reportes/functions/excel.php';
//            
//            activeErrorReporting();
//            noCli();

            require_once 'plugins/PHPExcel/Classes/PHPExcel.php';
            require_once 'view/reportes/venta/detalladoExcel.php';
            
        }
        
        
        
    }
}
