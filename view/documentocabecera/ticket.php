
<!DOCTYPE html>
<html>
 
<head>

  <link rel="stylesheet" href="<?= base_url?>css/cssticket.css">
<!--  <script src="css/cssticket.css"></script>-->
 
</head>

<?php 
    require_once 'libs/phpqrcode/qrlib.php';

    $dir= "temp/";
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
    
    
    $filename = base_url.'temp/test.png';
    $moneda = '';
    $simbolo = '';


    if($document->getTipo() =='Factura' and $document->getTipodoc()=='Venta'){
        $comprobante='FACTURA ELECTRÓNICA'; 
        $opc = '01';
    }elseif($document->getTipo() =='Boleta' and $document->getTipodoc()=='Venta') {
        $comprobante='BOLETA DE VENTA ELECTRÓNICA';
        $opc = '02';
    }elseif($document->getTipo() =='nota_debito'){
        $comprobante='NOTA DE CREDITO ELECTRÓNICA';
        $opc = '03';
    }elseif($document->getTipo() =='nota_credito' ){
        $comprobante='NOTA DE DEBITO ELECTRÓNICA';
        $opc = '04';
    }elseif($document->getTipo() =='Factura' and $document->getTipodoc()=='Compra'){
        $comprobante='COMPRA';
        $opc = '05';
    }elseif($document->getTipo()== 'nota_venta' and $document->getTipodoc() == 'Venta'){
        $comprobante='NOTA DE VENTA';
        $opc = '06';
    }else {
        $comprobante='ORDEN DE COMPRA';
        $opc = '07';
    }
    
    if($document->getMoneda()== 'Soles'){
        $moneda = 'PEN';
        $simbolo = 'S/ ';
        
    }
    if($document->getMoneda()== 'Dolares'){
        $moneda= 'USD';
        $simbolo = '$ ';
    }
    
    
   

?>

 
<body>
    
   
  <div class="ticket">
      
      <img src="data:image/jpg;base64 ,<?=  $sucur->getImgtoplogo(); ?>" width="100" height="100" alt="Logo" /> 
      <div class="titulo">
      <p class="centrado"><strong><?= $sucur->getEmpresa(); ?></strong><br><?= $sucur->getDireccion(); ?> <br> <?= $sucur->getDpto().' - '.$sucur->getProvincia().' - '.$sucur->getDistrito() ?><br> <?= $sucur->getTelf(); ?> <br><strong> <?= 'RUC.: '.$sucur->getRuc(); ?> <br><?=  $comprobante;?><br>
      <?= $document->getSerie().'-'.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT)?></strong></p>
      </div>
      <div class="encabezado">
    <p> <strong>   ADQUIRIENTE </strong><br>
     <?= $document->getRuc() ?> <br>
    <?= $document->getRazonsocial() ?><br>
    <?= $document->getDireccion() ?><br><br>
    <strong>FECHA EMISIÓN:  </strong><?= $document->getFechaemision()?><br>
    <strong>FECHA DE VENC:  </strong><?= $document->getFechavencimiento() ?><br>
    <strong>MONEDA: </strong><?= $moneda?><br>
    <strong>IGV: </strong>18.00 %</p><br>
      </div>
    <table>
        <thead class="headdetalle">
        <tr>
          <th class="cantidad">[CANT.]</th>
          <th class="producto">DESCRIPCIÓN</th>
          <th class="precio">P/U</th>
          <th class="precio">TOTAL</th>
        </tr>
      </thead>
      <tbody class="tbodydetalle">
          <?php
//          $temp = new Temp(); 
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
              ?>
        <tr>
            <td class="cantidad">[<?php echo number_format($temp->getCantidad() ,2)?>]</td>
            <td class="producto"><?php echo $temp->getDescripcionprod() ?></td>
            <td class="precio"><?php echo number_format($temp->getPrecio(),2) ?></td>
            <td class="precio"><?php echo number_format($importe,2) ?></td>
        </tr>
       
        
        
        <?php 
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
          
          if($document->getIncigv() == 0){
              $gravada = $total;
              $total += $igv;
              $igv = $total - $gravada;
              
          }
          
          $totalf = (float)number_format($total,2);
          ?>
     
         </tbody>
      </table>
    <table class="resultados">
        <tbody >
            
        <tr>
          
          <td ></td>
          <td></td>
          <td class="rletra">TOTAL ANTICIPOS <?= $simbolo?></td>
         
          <td class="rnum">0.00</td>
         </tr>
        <tr>
         <td ></td>
          <td></td>
          
          <td class="rletra" >OP. GRATUITA <?= $simbolo?></td>
        
          <td class="rnum"><?php echo number_format($gratuita,2) ?></td>
          </tr>
        <tr>
         <td ></td>
          <td></td>
          
          <td class="rletra">OP. EXONERADA <?= $simbolo?></td>
         
          <td class="rnum"><?php echo number_format($exonerada,2) ?></td>
          </tr>
        <tr>
          <td ></td>
          <td></td>
          
          <td class="rletra">OP. INAFECTA <?= $simbolo?></td>
         
          <td class="rnum"><?php echo number_format($inafecta,2) ?></td>
          </tr>
        <tr>
          <td ></td>
          <td></td>
          
          <td class="rletra">OP. GRAVADA <?= $simbolo?></td>
          
          <td class="rnum"><?php echo number_format($gravada,2) ?></td>
          </tr>
          <tr>
           <td ></td>
          <td></td>   
          <td class="rletra">DESCUENTO <?= $simbolo?></td>
         
          <td class="rnum">0.00</td>
          </tr>
          <tr>
          
          <td ></td>
          <td></td>
          <td class="rletra">IGV <?= $simbolo?></td>
           
          <td class="rnum"><?php echo number_format($igv,2) ?></td>
          
          </tr>
          <tr>
           <td ></td>
          <td></td>
          
          <td class="rletra">I.S.C <?= $simbolo?></td>
          
          <td class="rnum">0.00</td>
          
          </tr>
          <tr>
          <td ></td>
          <td></td>
           
          <td class="rletra">TOTAL A PAGAR <?= $simbolo?></td>
         
          <td class="rnum"><?php echo number_format($total,2) ?></td>
          </tr>
      </tbody>
    </table>
    <hr>
    <div class="footerup">
        <?php $qr = $sucur->getRuc().' | '.$opc.' | '.$document->getSerie().' | '.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT).' | '.$igv.' | '.$total.' | '.$document->getFechaemision().' | '.$document->getRuc().' || '; ?>
        <p class="centrado"><strong>IMPORTE EN LETRAS: </strong><?php echo strtoupper(CifrasEnLetras::convertirEurosEnLetras($totalf)); ?></p><hr>
        
    </div>
        <?php // QRcode::png($qr,$filename,'M',20,15)?>
        <img src="<?= $filename ?>" alt="QR" width="160" height="160">
        
    <div class="footerdown">

        <p> Representación impresa de la <?= $comprobante; ?></p>
    </div>
        
        
        
        
        
    </div>
     
 
    <hr>
 
 <script>
//window.print();

</script>   
    
</body>


  
</html>


