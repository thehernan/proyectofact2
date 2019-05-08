<?php 
//   set_include_path(get_include_path() . PATH_SEPARATOR . "/path/to/dompdf");
   
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
ob_start();



$codhtml = '
<!DOCTYPE html>
<html>
 
<head>
    <style type="text/css">
        td,
        th,
        tr,
        table {
          font-size: 12px;
          font-family: Arial;  
          border-top: 1px solid #5878ca;
          border-collapse: collapse;
        }
        table{
            position: absolute;
            top: 270;
        }
        td.producto,
        th.producto {
          width: 430px;
          max-width: 430px;
          word-break: break-all;
        }

        td.cantidad,
        th.cantidad {
          width: 100px;
          max-width: 100px;
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
          font-size: 14px;
          font-family: Arial;  
          background-color: #889ccf;
          color: white;
        /*  border-radius: 5px;*/
          border: 2px solid #5878ca;
        }


        .centrado {
          text-align: center;
          align-content: center;
        }
        .justificado {
          text-align: justify;

        } 

        .A4 {
          width: 750px;
          max-width: 750px;
          margin-left: auto;
          margin-right:auto;

        }

        img {
        /*  max-width: inherit;
          width: inherit;*/
        display:block;


        }

        /*----------- CAJA ----------- */
            .cajaruc { 
        font-family: Arial; 
        color: #ffffff; 
        font-size: 20px; 
        text-align: center;
        background: #889ccf;
        padding: 10px;
        border-radius: 15px 15px 15px 15px;  
        border: 2px solid #5878ca;
        width: 200px;
        height: 100px;
        max-width: 200px;
        position:absolute;
        left: 515;
        top: 10;
       
        }
        .cajacliente { 
        font-family: Arial;
        color: #ffffff; 
        font-size: 14px; 
        text-align: left; 
        background: #889ccf; 
       
        overflow: auto; 
        padding: 10px; 
        border-radius: 15px 15px 15px 15px; 

        border: 2px solid #5878ca;
        width:450px;
        height: 65px;
        max-width: 450px;
         position: absolute;
        top: 150;
        left:15;
        
        }
        .cajafecha { 
        font-family: Arial; 
        color: #ffffff; 
        font-size: 13px; 
        text-align: left; 
        background: #889ccf; 
       
        overflow: auto; 
        padding: 10px; 
        border-radius: 15px 15px 15px 15px;  
        border: 2px solid #5878ca;
        width: 200px;
        height: 77px;
        max-width:200px;
        position: absolute;
        right: 15;
        top: 150;
       
        }
        .importeletra{
            font-family: Arial; 
            font-size: 12px;
        }

        .divempresa { 
        font-family: Arial;
        color: black; 
        font-size: 16px; 
        
        text-align: left; 
        /*background: #889ccf; */
    
        overflow: auto; 
        padding: 0px; 
        /*border-radius: 15px 15px 15px 15px; */

       /* border: 2px solid #5878ca;*/
        width: 300px;
        height: 100px;
        max-width: 400px;
        position:absolute;
        left: 15;
        top: 20;
        
        }
    </style>
 
 
</head>'; 
 $dir= "temp/";
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
    $filename = $dir.'test.png';
    $opc = '';
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
    };
    
   

$codhtml.='

 
<body>
    
   
  <div class="A4">
      
    <div class="divempresa">
    <strong>'.$sucur->getEmpresa().'</strong><br>'.$sucur->getDireccion().'<br>'.$sucur->getDpto().' - '.$sucur->getProvincia().' - '.$sucur->getDistrito().'<br>'.$sucur->getTelf().'<br>'.
    '</div><div class="cajacliente"><strong>   ADQUIRIENTE </strong><br>'.
        $document->getRuc().'<br>'.
        $document->getRazonsocial().'<br>'.
        $document->getDireccion().'<br><br>
    </div>
    <div class="cajaruc">
    <strong>RUC.: '.$sucur->getRuc().'<br>'.$comprobante.'<br>'.
        $document->getSerie().'-'.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT)
    .'</strong></div>
    <div class="cajafecha">
    <strong>FECHA EMISIÓN:  </strong>'.$document->getFechaemision().'<br>
    <strong>FECHA DE VENC:  </strong>'.$document->getFechavencimiento().'<br>
    <strong>MONEDA: </strong>'.$document->getMoneda().'<br>
    <strong>IGV: </strong>18.00 %
    </div>
    <table>
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
        
        
          } 
          
          $gravada = $total/1.18;
          $igv = $total - ($total/1.18);
      
$codhtml.='
        <tr>
          <td></td>
          <td></td>
          <td class="precio">GRAVADA S/</td>
          <td class="precio">'.number_format($gravada,2).'</td>
          </tr>
          <tr>
           <td></td>
           <td></td>
           <td class="precio">IGV     S/</td>
          <td class="precio">'.number_format($igv,2).'</td>     
          </tr>
          <tr>
          <td></td>
          <td></td>
          <td class="precio">TOTAL   S/</td>
          <td class="precio">'.number_format($total,2).'</td>
          </tr>
      </tbody>
    </table>
    <hr>';
    $qr = $sucur->getRuc().' | '.$opc.' | '.$document->getSerie().' | '.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT).' | '.$igv.' | '.$total.' | '.$document->getFechaemision().' | '.$document->getRuc().' || ';
    
$codhtml.='
    <p class="centrado"><strong>IMPORTE EN LETRAS: </strong>'.strtoupper(CifrasEnLetras::convertirEurosEnLetras($total)).'</p><hr>
    <p class="justificado"> Representación impresa de la '.$comprobante.'</p>';
    QRcode::png($qr,$filename,'M',20,15);
    
$codhtml.='
    <img src="'.$filename.'" alt="QR" width="160" height="160">
 
    <hr>
  </div>
</body>
</html>';
 
$html2pdf = new Html2Pdf();
//$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($codhtml);
$html2pdf->output('documento.pdf');
    
    
    
