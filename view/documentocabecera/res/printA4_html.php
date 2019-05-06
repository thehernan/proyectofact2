<?php 
    
    $dir= "temp/";
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
    $filename = $dir.'test.png';


    $opc = '';
    $moneda = '';
    $simbolo='';
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
    }else{
        $comprobante='ORDEN DE COMPRA';
    }
    
    if($document->getMoneda()== 'Soles'){
        $simbolo='S/ ';
        $moneda= 'SOLES';
    }else {
        $simbolo='$ ';
        $moneda= 'DOLARES AMERICANOS';
    }
?>
  <link rel="stylesheet" href="<?= base_url?>css/cssprintA4.css"> 
  <div class="A4">
      <div class="divempresa">
<!--          <img src="data:image/jpg;base64 ,<?=  $sucur->getImgtoplogo() ?>" width="100" height="100" alt="Logo" />-->
          <p><?= $sucur->getEmpresa()?></p>
          <p><?= $sucur->getDireccion() ?> </p>
          <p> <?= $sucur->getDpto().' - '.$sucur->getProvincia().' - '.$sucur->getDistrito() ?></p>
          <p> <?= $sucur->getTelf() ?></p>
      </div>
      <div class="cajaruc">
      
          <p> <?= 'RUC.: '.$sucur->getRuc() ?></p>
          <p><?=  $comprobante?></p>
          <p><?= $document->getSerie().'-'.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT)?></p>
      </div>
    <div class="cajacliente">
        <p><strong>   ADQUIRIENTE </strong><br></p>
        <p>N° DOC.:        <?= $document->getRuc() ?></p>
        <p>DENOMINACION:   <?= $document->getRazonsocial() ?></p>
        <p>DIRECCION:      <?= $document->getDireccion() ?></p>
    </div>
      <div class="cajafecha">
          <p>FECHA EMISIÓN: <?= $document->getFechaemision()?></p>
    
          <p>FECHA DE VENC:  <?= $document->getFechavencimiento() ?></p>
          <p>MONEDA: <?= $moneda ?></p>
          <p>IGV: 18.00 %</p>
      </div>
    <table>
<!--      <thead>-->
        <tr>
          <th class="cantidad">[CANT.]</th>
          <th class="producto">DESCRIPCIÓN</th>
          <th class="precio">P/U</th>
          <th class="precio">TOTAL</th>
        </tr>
      <!--</thead>-->
      <!--<tbody>-->
          <?php
//          $temp = new Temp(); 
          $total=0;
          $exporta = 0;
          $inafecto = 0;
          $gratuita= 0;
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
            
            $inafecto+= $temp->getMontobaseinafecto();
            $exporta+= $temp->getMontobaseexpo();
            $gratuita+=$temp->getMontobasegratuito();
        
        
          } 
          
          $gravada = $total/1.18;
          $igv = $total - ($total/1.18);
          
          if($gratuita > 0){
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="precio"><strong>GRATUITA   '.$simbolo.'</strong></td>';

            echo '<td class="precio">'.number_format($gratuita,2).'</td>';
            echo '</tr>';
              
          }
          
          if($exporta > 0){
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="precio"><strong>EXPORTACION   '.$simbolo.'</strong></td>';

            echo '<td class="precio">'.number_format($exporta,2).'</td>';
            echo '</tr>';
              
          }
          if($inafecto > 0){
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="precio"><strong>INAFECTA   '.$simbolo.'</strong></td>';

            echo '<td class="precio">'.number_format($inafecto,2).'</td>';
            echo '</tr>';
              
          }
        
        
        ?>
        <tr>
          <td></td>
          <td></td>
          <td class="precio"><strong>GRAVADA   <?= $simbolo ?></strong></td>
          
          <td class="precio"><?php echo number_format($gravada,2) ?></td>
        </tr>
          <tr>
           <td></td>
          <td></td>
          <td class="precio"><strong>IGV   <?= $simbolo ?></strong>    </td>
           
          <td class="precio"><?php echo number_format($igv,2) ?></td>
          
          </tr>
          <tr>
           <td></td>
           <td></td>
          <td class="precio"><strong>TOTAL   <?= $simbolo ?></strong></td>
          
          <td class="precio"><?php echo number_format($total,2) ?></td>
          </tr>
      <!--</tbody>-->
    </table>
    <hr>
     <?php $qr = $sucur->getRuc().' | '.$opc.' | '.$document->getSerie().' | '.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT).' | '.$igv.' | '.$total.' | '.$document->getFechaemision().' | '.$document->getRuc().' || ' ?>
    <p class="centrado importeletra">IMPORTE EN LETRAS: <?= strtoupper(CifrasEnLetras::convertirEurosEnLetras($total)).' '.$moneda ?></p><hr>
    <p class="justificado importeletra"> Representación impresa de la <?= $comprobante ?></p>
    <?php QRcode::png($qr,$filename,'M',20,15)?>
    <img src="<?= $filename; ?>" alt="QR" width="160" height="160">
    <hr>
  </div>



