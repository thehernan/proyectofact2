<?php 
    ini_set('memory_limit', '2048M');
//    error_reporting(0);
    require_once 'plugins/pdf/html2pdf.class.php';
    // get the HTML
     ob_start();
     include ('view/documentocabecera/printA4.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('productividad_doc.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


