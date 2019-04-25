

<!DOCTYPE html>
<html>
 
<head>

  <link rel="stylesheet" href="<?= base_url?>css/cssticket.css">
<!--  <script src="css/cssticket.css"></script>-->
 
</head>



 
<body>
    
   
  <div class="ticket">
      
      <img src="data:image/jpg;base64 ,<?=  $sucur->getImgtoplogo(); ?>" width="100" height="100" alt="Logo" /> 
      <p class="centrado"><strong><?= $sucur->getEmpresa(); ?></strong><br><?= $sucur->getDireccion(); ?> <br> <?= $sucur->getDpto().' - '.$sucur->getProvincia().' - '.$sucur->getDistrito() ?><br> <?= $sucur->getTelf(); ?> <br><strong> <?= 'RUC.: '.$sucur->getRuc(); ?> <br><?= ($document->getTipo() =='Factura') ? $comprobante='FACTURA ELECTRÓNICA' : $comprobante='BOLETA DE VENTA ELECTRÓNICA';?><br>
      <?= $document->getSerie().'-'.str_pad($document->getNumero(), 6, "0", STR_PAD_LEFT)?></strong></p>
    <p> <strong>   ADQUIRIENTE </strong><br>
     <?= $document->getRuc() ?> <br>
    <?= $document->getRazonsocial() ?><br>
    <?= $document->getDireccion() ?><br><br>
    <strong>FECHA EMISIÓN:  </strong><?= $document->getFechaemision()?><br>
    <strong>FECHA DE VENC:  </strong><?= $document->getFechavencimiento() ?><br>
    <strong>MONEDA: </strong><?= $document->getMoneda() ?><br>
    <strong>IGV: </strong>18.00 %</p><br>
    <table>
      <thead>
        <tr>
          <th class="cantidad">[CANT.]</th>
          <th class="producto">DESCRIPCIÓN</th>
          <th class="precio">P/U</th>
          <th class="precio">TOTAL</th>
        </tr>
      </thead>
      <tbody>
          <?php
//          $temp = new Temp(); 
          $total=0;
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
        
        
          } 
          
          $gravada = $total/1.18;
          $igv = $total - ($total/1.18);
          ?>
     
        <tr>
          <td></td>
          
          <td class="producto">GRAVADA S/</td>
          <td></td>
          <td class="precio"><?php echo number_format($gravada,2) ?></td>
          </tr>
          <tr>
           <td></td>
          
          <td class="producto">IGV     S/</td>
           <td></td>
          <td class="precio"><?php echo number_format($igv,2) ?></td>
          
          </tr>
          <tr>
           <td></td>
           
          <td class="producto">TOTAL   S/</td>
          <td></td>
          <td class="precio"><?php echo number_format($total,2) ?></td>
          </tr>
      </tbody>
    </table>
    <hr>
    <p class="centrado"><strong>IMPORTE EN LETRAS: </strong><?php echo strtoupper(CifrasEnLetras::convertirEurosEnLetras($total)); ?></p><hr>
    <p class="justificado"> Representación impresa de la <?= $comprobante; ?></p>
 
    <hr>
  </div>
 <script>
window.print();

</script>   
    
</body>


  
</html>


