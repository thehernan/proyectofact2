<?php 


//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/vendor/PHPExcel/Classes/PHPExcel.php");


$objPHPExcel = new PHPExcel();

//$desde = $_POST['desde'];
//$hasta = $_POST['hasta'];
//
//
//require_once ("../../conexion/datasource.php");
////require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/conexion/datasource.php");
//
//$data_source = new DataSource();
//$data_tabla = $data_source->ejecutarconsulta("select doc.fecha_vencimiento,tc.op,doc.serie,doc.numero,p.rucdni,concat(p.nombre,' ',p.apellidos) as nombre,SUM(d.cantidad)as cant,doc.total/1.18 as base
//,(doc.total)-doc.total/1.18 as igv,doc.total,doc.op as tipo from documento as doc inner JOIN tipo_comprobante as tc
//on tc.id_comprobante = doc.id_comprobante INNER JOIN persona as p on p.id_persona = doc.id_persona INNER JOIN
//detalle as d on d.id_documento = doc.id_documento where doc.fecha_vencimiento BETWEEN ? and ?  and tc.comprobante='FACTURA'
//GROUP BY doc.id_documento ORDER BY doc.op, doc.fecha_vencimiento ASC;",array($desde,$hasta));

        


// Set document properties
$objPHPExcel->getProperties()->setCreator("vtechnology")
               ->setLastModifiedBy("HERNAN VILCHEZ")
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);            

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Documento')
            ->setCellValue('B1', 'Serie/Num')
            ->setCellValue('C1', 'Fecha')
            ->setCellValue('D1', 'Nombre / Razón social')
            ->setCellValue('E1', 'Vendedor')
            ->setCellValue('F1', 'Tipo de pago')
            ->setCellValue('G1', 'Descripción')
            ->setCellValue('H1', 'Total')
            ->setCellValue('I1', 'Inc. Igv')
            ->setCellValue('J1', 'Tipo Igv');



            

//$informe = getAllListsAndVideos();
//$i = 2;
//while($row = $informe->fetch_array(MYSQLI_ASSOC))
//{

    $i = 2;
    
   foreach ($detallado as $detalle){
       
            
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $detalle['tipo'])
            ->setCellValue("B".$i, $detalle['serien'])
            ->setCellValue("C".$i, $detalle['fechaemision'])
            ->setCellValue("D".$i, $detalle['razonsocial'])
            ->setCellValue("E".$i, $detalle['vendedor'])
            ->setCellValue("F".$i, $detalle['tipo_pago'])
            ->setCellValue("G".$i, $detalle['descripcionprod']) 
            ->setCellValue("H".$i, $detalle['total'])
            ->setCellValue("I".$i, $detalle['incigv'])
            ->setCellValue("J".$i, $detalle['impuesto']);
           
//            ->setCellValue("B".$i, "hol")
//            ->setCellValue("C".$i, "hola")
//            ->setCellValue("D".$i, "hola")
//            ->setCellValue("E".$i, "hola")
//            ->setCellValue("F".$i, "hola")
//            ->setCellValue("G".$i, "hola") 
//            ->setCellValue("H".$i, "hola")
//            ->setCellValue("I".$i, "hola");
           
         
        $i++;
        

}


//$i++;
//}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);



$objPHPExcel->getActiveSheet()->setTitle('Reporte');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 /* Limpiamos el búfer */
ob_end_clean();
$objWriter->save('php://output');
exit;