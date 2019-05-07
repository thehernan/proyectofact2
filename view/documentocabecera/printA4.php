<?php 


    
    $dir= "temp/";
    if(!file_exists($dir)){
        mkdir($dir);
        
    }
    $filename = $dir.'test.png';

//
//    $opc = '';
//    $moneda = '';
//    $simbolo='';
//    if($document->getTipo() =='Factura' and $document->getTipodoc()=='Venta'){
//        $comprobante='FACTURA ELECTRÓNICA'; 
//        $opc = '01';
//    }elseif($document->getTipo() =='Boleta' and $document->getTipodoc()=='Venta') {
//        $comprobante='BOLETA DE VENTA ELECTRÓNICA';
//        $opc = '02';
//    }elseif($document->getTipo() =='nota_debito'){
//        $comprobante='NOTA DE CREDITO ELECTRÓNICA';
//        $opc = '03';
//    }elseif($document->getTipo() =='nota_credito' ){
//        $comprobante='NOTA DE DEBITO ELECTRÓNICA';
//        $opc = '04';
//    }elseif($document->getTipo() =='Factura' and $document->getTipodoc()=='Compra'){
//        $comprobante='COMPRA';
//    }else{
//        $comprobante='ORDEN DE COMPRA';
//    }
//    
//    if($document->getMoneda()== 'Soles'){
//        $simbolo='S/ ';
//        $moneda= 'SOLES';
//    }else {
//        $simbolo='$ ';
//        $moneda= 'DOLARES AMERICANOS';
//    }
//

/////////////////////////////////////////// php
require_once('plugins/pdf/html2pdf.class.php');
//ob_start();
require_once 'view/documentocabecera/res/printA4_html.php';
$content = ob_get_clean();
try {



//echo '<h1>HOla mundo</h1>';
//$content = ob_get_clean();
$html2pdf = new Html2Pdf('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
//$html2pdf->writeHTML('<h1>Hola mundo</h1>');
$html2pdf->output('PrintA4.pdf');
//use Spipu\Html2Pdf\Exception\Html2PdfException;
//use Spipu\Html2Pdf\Exception\ExceptionFormatter;
//    
//
//    try
//    {
//        ob_start();
//        require_once 'res/printA4_html.php';
//       $content = ob_get_clean();
//        
//        // init HTML2PDF
//          $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
//        // display the full page
//        $html2pdf->pdf->SetDisplayMode('fullpage');
//        // convert
//        $html2pdf->writeHTML($content);
//        // send the PDF
//        $html2pdf->Output('productividad_doc.pdf');
//    }
//    catch(HTML2PDF_exception $e) {
//         $html2pdf->clean();
//
//        $formatter = new ExceptionFormatter($e);
//        echo $formatter->getHtmlMessage();
//        
//    }
} catch (HTML2PDF_exception $e){
//    $html2pdf->clean();
//    $formatter = new ExceptionFormatter($e);
//    echo $formatter->getHtmlMessage();
    echo $e;
    exit;
}

