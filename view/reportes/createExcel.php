<?php 
require_once 'functions/excel.php';

activeErrorReporting();
noCli();

require_once ('../../vendor/PHPExcel/Classes/PHPExcel.php');
//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/vendor/PHPExcel/Classes/PHPExcel.php");


$objPHPExcel = new PHPExcel();

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];


require_once ("../../conexion/datasource.php");
//require_once ($_SERVER['DOCUMENT_ROOT']."/aquavita/conexion/datasource.php");

$data_source = new DataSource();
$data_tabla = $data_source->ejecutarconsulta("select doc.fecha_vencimiento,tc.op,doc.serie,doc.numero,p.rucdni,concat(p.nombre,' ',p.apellidos) as nombre,SUM(d.cantidad)as cant,doc.total/1.18 as base
,(doc.total)-doc.total/1.18 as igv,doc.total,doc.op as tipo from documento as doc inner JOIN tipo_comprobante as tc
on tc.id_comprobante = doc.id_comprobante INNER JOIN persona as p on p.id_persona = doc.id_persona INNER JOIN
detalle as d on d.id_documento = doc.id_documento where doc.fecha_vencimiento BETWEEN ? and ?  and tc.comprobante='FACTURA'
GROUP BY doc.id_documento ORDER BY doc.op, doc.fecha_vencimiento ASC;",array($desde,$hasta));

        


// Set document properties
$objPHPExcel->getProperties()->setCreator("vtechnology")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLSX Test Document")
               ->setSubject("Office 2007 XLSX Test Document")
               ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);            

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'N°')
            ->setCellValue('B1', 'Fecha')
            ->setCellValue('C1', 'Tipo de Doc')
            ->setCellValue('D1', 'Serie')
            ->setCellValue('E1', 'Numero')
            ->setCellValue('F1', 'RUC')
            ->setCellValue('G1', 'Razón Social o Denominación')
            ->setCellValue('H1', 'Cantidad')
            ->setCellValue('I1', 'Base')
            ->setCellValue('J1', 'IGV')
            ->setCellValue('K1', 'Total')
            ->setCellValue('L1', 'Operación');



            

//$informe = getAllListsAndVideos();
//$i = 2;
//while($row = $informe->fetch_array(MYSQLI_ASSOC))
//{

    $i = 2;
    
   foreach ($data_tabla as $clave => $valor){
       
       $tipo =$data_tabla[$clave]["tipo"];
       
       if($tipo == 'liquidacion'){
           $tipo = 'venta';
           
       }else {
           $tipo = 'compra';
       }
       
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $i-1)
            ->setCellValue("B".$i, $data_tabla[$clave]["fecha_vencimiento"])
            ->setCellValue("C".$i, $data_tabla[$clave]["op"])
            ->setCellValue("D".$i, $data_tabla[$clave]["serie"])
            ->setCellValue("E".$i, $data_tabla[$clave]["numero"])
            ->setCellValue("F".$i, $data_tabla[$clave]["rucdni"])
            ->setCellValue("G".$i, $data_tabla[$clave]["nombre"]) 
            ->setCellValue("H".$i, $data_tabla[$clave]["cant"])
            ->setCellValue("I".$i, number_format($data_tabla[$clave]["base"],2))
            ->setCellValue("J".$i, number_format($data_tabla[$clave]["igv"],2))
            ->setCellValue("K".$i, number_format($data_tabla[$clave]["total"],2))
            ->setCellValue("L".$i, $tipo);
           
         
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
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->setTitle('PDT');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;