<?php 
//   set_include_path(get_include_path() . PATH_SEPARATOR . "/path/to/dompdf");
   
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
//use Spipu\Html2Pdf\Exception\Html2PdfException;
//use Spipu\Html2Pdf\Exception\ExceptionFormatter;
//header("Content-type: image/jpg"); 
// $path =  base_url.'images/user-lg.jpg';
// $type = pathinfo($path, PATHINFO_EXTENSION);
// $data = file_get_contents($path);
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
ob_start();


$codhtml = '
<!DOCTYPE html>
<html>
 
<head>
    <style type="text/css">
    
        body {
          position: relative;
          width: 750px;
          max-width: 750px;
         
          margin: 0 auto; 
        }
        table#detalle{ 
        
        
        
        
        border: 1px solid black;
        border-collapse: separate;
        
        border-radius: 7px;
        border-spacing: 0px;
        width: 750px;
        max-width: 750px;
        }
        thead#detalle {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
            border-collapse: separate;
        }
        tr#detalle {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        th, td#detalle {
            
            text-align: left;
            vertical-align: top;
           

             
        }
        td#detalle {
            border-top: 1px solid black;
        }
       
        thead#detalle:first-child tr#detalle:first-child th:first-child, tbody#detalle:first-child tr#detalle:first-child td#detalle:first-child {
            border-radius: 7px 0 0 0;
        }
        thead#detalle:last-child tr#detalle:last-child th#detalle:first-child, tbody#detalle:last-child tr#detalle:last-child td#detalle:first-child {
            border-radius: 0 0 0 7px;
        }
        td.producto,
        th.producto {
          width: 450px;
          max-width: 450px;
          word-break: break-all;
        }

        td.cantidad,
        th.cantidad {
          width: 80px;
          max-width: 80px;
          text-align: center;
          word-break: break-all;
        }

        td.precio,
        th.precio {
          width: 100px;
          max-width: 100px;
          text-align: center;
          word-break: break-all;
        }

        th {
          font-size: 12px;
          font-family: Arial;  

        }


        .centrado {
          text-align: center;
          align-content: center;
        }
        .justificado {
          text-align: justify;

        } 

        

        img {
        /*  max-width: inherit;
          width: inherit;*/
        display:block;


        }

        /*----------- CAJA ----------- */
        #cajaruc { 
        font-family: Arial; 
        
        font-size: 16px; 
        text-align: center;
        line-height : 20px;
        padding: 10px;
        border-radius: 15px 15px 15px 15px;  
        border: 1px solid black;
        width: 250px;
        height: 70px;
        max-width: 250px;
      /*  float: right !important;
        margin-left: 500px;*/
position:absolute;
        left: 490;
        top: 20;
       
        }
        .cajacliente { 
        font-family: Arial;
        font-size: 11px; 
        line-height: 18px;
        text-align: left; 
        overflow: auto; 
        width:400px;
        height: 65px;
        max-width: 400px;
       /* float: left !important;*/

        position: absolute;
        top: 130;
        left:5;
        
        
        }
        .cajafecha { 
        font-family: Arial;  
        font-size: 11px; 
        line-height: 18px;
        text-align: left;  
        
        width: 200px;
        height: 77px;
        max-width:200px;
       /* float: right !important;
        margin-left: 200px;*/
        position: absolute;
        right: 120;
        top: 130;
       
        }
        .importeletra{
            font-family: Arial; 
            font-size: 12px;
        }
        
        .divlogo{
            
            padding: 0px; 

            width: 200px;
            height: 200px;
            max-width: 200px;
           /* position:absolute;
            left: 30;
            top: 0; */


        }

        .divempresa { 
        font-family: Arial;
        color: black; 
        font-size: 12px; 
        
        text-align: center; 
        line-height: 5px;
        padding: 0px; 
        width: 300px;
        height: 200px;
        max-width: 400px;
        position:absolute;
        left: 180;
        top: 20; 
        
        }
        table#resultados{
           
            
            width: 300px;
           max-width: 300px;
           font-size: 12px;
           padding: 10px;
        }
        .rletra{
            text-align: left;
            width: 140px;
            max-width: 140px;
            
        }
        .rnum{
             text-align: right;
             width: 80px;
            max-width: 80px;
        }
        .qr{
            font-family: Arial; 
        
        font-size: 16px; 
        text-align: center;
        line-height : 20px;
        padding: 10px;
        border-radius: 15px 15px 15px 15px;  
        border: 1px solid black;
        width: 730px;
        height: 70px;
        max-width: 730px;
  

        }
        .rqr{
            text-align: center;
            width: 470px;
            max-width: 470px;
        
        }
        
        
     
       
    </style>
 
 
</head>'; 
    $dir= "temp/";
 
    $moneda = '';
    $simbolo = '';
    
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
   $filename = $dir.'test.png';
    $opc = '';  
    
 $dirimg= "temp/img/";
    if(!file_exists($dirimg)){
        mkdir($dirimg);
        
    }
    file_put_contents($dirimg."logo.jpg", base64_decode($sucur->getImgtoplogo()));
    
    $logo = 'temp/img/logo.jpg';
   
    if($document->getTipo() =="Factura" and $document->getTipodoc()=="Venta"){
        $comprobante="FACTURA ELECTRÓNICA"; 
        $opc = "01";
    }elseif($document->getTipo() =="Boleta" and $document->getTipodoc()=="Venta") {
        $comprobante="BOLETA DE VENTA ELECTRÓNICA";
        $opc = "02";
    }elseif($document->getTipo() =="nota_debito"){
        $comprobante="NOTA DE CREDITO ELECTRÓNICA";
        $opc = "03";
    }elseif($document->getTipo() =="nota_credito" ){
        $comprobante="NOTA DE DEBITO ELECTRÓNICA";
        $opc = "04";
    }elseif($document->getTipo() =="Factura" and $document->getTipodoc()=="Compra"){
        $comprobante="COMPRA";
    }else{
        $comprobante="ORDEN DE COMPRA";
    }
    if($document->getMoneda()== 'Soles'){
        $moneda = 'PEN';
        $simbolo = 'S/ ';
        
    }
    if($document->getMoneda()== 'Dolares'){
        $moneda= 'USD';
        $simbolo = '$ ';
    }
   

$codhtml.='

 
<body>
    
   
  <div class="A4">
    <div class="divlogo">
      <img src="'.$logo.'" width="100" height="100" alt="Logo" />'. 
        
    '</div><div class="divempresa"><h4>'
     
    .$sucur->getEmpresa().'</h4><hr>'.$sucur->getDireccion().'<br>'.$sucur->getDpto().' - '.$sucur->getProvincia().' - '.$sucur->getDistrito().'<br>'.$sucur->getTelf().'<br>'.
    '</div><div class="cajacliente">'
        . '<strong>FECHA EMISIÓN:  </strong>'.$document->getFechaemision().'<br>'
        . '<strong>SEÑOR(ES): </strong>'.
        $document->getRazonsocial().'<br>'.
        $document->getRuc().'<br>'.
        'DIRECCIÓN: '.$document->getDireccion().'<br><br>
    </div>
    <div id="cajaruc">
    RUC.: '.$sucur->getRuc().'<br>'.$comprobante.'<br>'.
        $document->getSerie().'-'.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT)
    .'</div>
    <div class="cajafecha">
    <strong>FECHA DE VENC:  </strong>'.$document->getFechavencimiento().'<br>
    <strong>MONEDA: </strong>'.$moneda.'<br>
    <strong>ORDEN DE COMPRA: </strong>'.$document->getNorden().' <br>
    <strong>OBSERVACION: </strong>'.$document->getObservacion().
    '</div>
    <table id="detalle">
      <thead>
        <tr>
          <th class="cantidad">[CANT.]</th>
          <th class="producto">DESCRIPCIÓN</th>
          <th class="precio">P/U</th>
          <th class="precio">TOTAL</th>
        </tr>
      </thead>
      <tbody>';
            $total=0;
            $gravada = 0;
            $igv = 0;
            $gratuita = 0;
            $exonerada = 0;
            $inafecta = 0;
            $ivap = 0;
            $expo = 0;
          foreach ($detalles as $temp){
              $importe = $temp->getCantidad() * $temp->getPrecio();
$codhtml.='
        <tr>
            <td class="cantidad">['.number_format($temp->getCantidad() ,2).']</td>
            <td class="producto">'.$temp->getDescripcionprod().'</td>
            <td class="precio">'.number_format($temp->getPrecio(),2).'</td>
            <td class="precio">'.number_format($importe,2).'</td>
        </tr>';

            $total+=$importe;
            $gratuita += $temp->getMontobasegratuito();
            $exonerada += $temp->getMontobaseexonarado();
            $inafecta += $temp->getMontobaseinafecto();
            $ivap += $temp->getMontobaseivap();
            $expo += $temp->getMontobaseexpo();
        
        
          } 
          
          $total = $total - ($gratuita + $ivap);
          
          $gravada = ($total -($expo + $exonerada + $inafecta))/1.18;
          $igv =($total -($expo + $exonerada + $inafecta)) - $gravada;
          
          if($document->getIncigv() == false){
              $gravada = $total;
              $total += $igv;
              $igv = $total - $gravada;
              
          }
          
          $totalf = (float)number_format($total,2);
          $qr = $sucur->getRuc().' | '.$opc.' | '.$document->getSerie().' | '.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT).' | '.$igv.' | '.$total.' | '.$document->getFechaemision().' | '.$document->getRuc().' || ';
          QRcode::png($qr,$filename,'M',20,15);
$codhtml.='
      </tbody>
      
      </table>
      
      <p style="font-size: 12px;"><strong>IMPORTE EN LETRAS: </strong>'.strtoupper(CifrasEnLetras::convertirEurosEnLetras($totalf)).'</p>
     <div class="qr">
      <table id="resultados">
        <tbody>
        <tr>
            <td rowspan="10" class="rqr"><img src="'.$filename.'" alt="QR" width="150" height="150"><br>
             REPRESENTACION IMPRESA DE LA '.$comprobante.'<br> Puede consultar este documento en 
        </td>
        </tr>
        <tr>
         
          <td class="rletra">TOTAL ANTICIPOS </td>
         
          <td class="rnum">'.$simbolo.' 0.00</td>
         </tr>
        <tr>
         
          
          <td class="rletra" >OP. GRATUITA </td>
        
          <td class="rnum">'.$simbolo.' '.number_format($gratuita,2).'</td>
          </tr>
        <tr>
        
          
          <td class="rletra">OP. EXONERADA '.$simbolo.'</td>
         
          <td class="rnum">'.$simbolo.' '.number_format($exonerada,2).'</td>
          </tr>
        <tr>
       
          
          <td class="rletra">OP. INAFECTA </td>
         
          <td class="rnum">'.$simbolo.' '.number_format($inafecta,2).'</td>
          </tr>
        <tr>
        
          
          <td class="rletra">OP. GRAVADA </td>
          
          <td class="rnum">'.$simbolo.' '.number_format($gravada,2).'</td>
          </tr>
          <tr>
          
          <td class="rletra">DESCUENTO </td>
         
          <td class="rnum">'.$simbolo.' 0.00</td>
          </tr>
          <tr>
     
          <td class="rletra">IGV </td>
           
          <td class="rnum">'.$simbolo.' '.number_format($igv,2).'</td>
          
          </tr>
          <tr>
         
          
          <td class="rletra">I.S.C </td>
          
          <td class="rnum">'.$simbolo.' 0.00</td>
          
          </tr>
          <tr>
        
           
          <td class="rletra">TOTAL A PAGAR </td>
         
          <td class="rnum">'.$simbolo.' '.number_format($total,2).'</td>
          </tr>
      </tbody>
    </table>
    
    ';
    
    
$codhtml.='
    
    
        
        
    </div>
        ';
    
    
$codhtml.='
    
        
    
  </div>
</body>
//</html>';
//ob_get_clean();  
$html2pdf = new Html2Pdf();

//$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($codhtml);
$html2pdf->output('documento.pdf');
    
    
    
