<?php 
/** Incluir la libreria PHPExcel */
require_once("../PHPExcel/Classes/PHPExcel.php");
//require_once("../PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");
 
 
// Crea un nuevo objeto PHPExcel 
$objPHPExcel = new PHPExcel(); 
 
 
// Establecer propiedades 
$objPHPExcel->getProperties() 
->setCreator("Marcelo Mujica") 
->setLastModifiedBy("MMujica") 
->setTitle("Documento Excel Participantes") 
->setSubject("Query ORACLE Participantes") 
->setDescription("Participantes") 
->setKeywords("Excel Office 2007 openxml php") 
->setCategory("Query SIAGJ"); 
 
 
$conn = oci_connect('tg_penaltg', 'tg20170523', 'rpenprod');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error en conexion";
}
$ctrib2=trim(strtoupper($_GET['ctrib2']));
$rit2=trim(strtoupper($_GET['rit2']));
$anio2=trim(strtoupper($_GET['anio2']));



$querypass= "SELECT tatp_causa.idf_rolinterno,
            tatp_causa.fec_era,
            tasg_juecescausa.gls_jueces,
            tatp_causa.cod_tribunal,
            tasg_juecescausa.fec_asignacion
            from tasg_juecescausa  inner join   tatp_causa
            on tasg_juecescausa.crr_causa=tatp_causa.crr_idcausa
            where
                    tatp_causa.cod_tribunal like '$ctrib2%'
                and tatp_causa.idf_rolinterno like '$rit2%'
                and tatp_causa.fec_era like '$anio2%'
                and tatp_causa.tip_causaref=1
                order by tatp_causa.idf_rolinterno asc ,tatp_causa.fec_era asc";

$stid = oci_parse($conn,$querypass);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentiaties($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error en query";
	
}
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error al ejecutar query";
}

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B1', 'RIT')
->setCellValue('C1', utf8_encode('AÑO'))
->setCellValue('D1', 'INTEGRANTES')
->setCellValue('E1', 'FECHA ')
->setCellValue('F1', 'COD. TRIB');


$fila=2;
$col=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {	
    foreach ($row as $item) {

		$objPHPExcel->setActiveSheetIndex()->setCellValueByColumnAndRow($col,$fila,utf8_encode($item));
		$col++;
    }
	$col=0;
	$fila++;
}
 
//Autofiltro, BOLD
$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());
$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);

// Renombrar Hoja 
$objPHPExcel->getActiveSheet()->setTitle('Evento'); 

 
 
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero. 
$objPHPExcel->setActiveSheetIndex(0); 
 
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel. 
$archivo ="Eventos ". date("d-m-Y"). ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header("Content-Disposition: attachment; filename=\"$archivo\"");
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
$objWriter->save('php://output'); 


oci_free_statement($stid);
oci_close($conn);

exit; 
?>