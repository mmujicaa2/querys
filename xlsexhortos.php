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
$finicioexh=trim(strtoupper($_GET['finicioexh']));
$ffinexh=trim(strtoupper($_GET['ffinexh']));
$tipoexh=trim(strtoupper($_GET['tipoexh']));

$querypass= "SELECT TATP_CAUSA.IDF_ROLINTERNO AS RIT, 
       TATP_CAUSA.FEC_ERA AS A�O, 
       TG_TIPEVENTO.GLS_TIPEVENTO AS TIPO_TRAMITE, 
       TGES_EVENTO.GLS_OBSERVACION AS Evento, 
       TO_CHAR(TGES_EVENTO.FEC_EVENTO, 'DD/MM/YYYY') AS FechaEvento, 
       TO_CHAR(TGES_EVENTO.FEC_FIRMA, 'DD/MM/YYYY') AS FechaFirma, 
       TG_ESTEVENTO.GLS_ESTEVENTO AS EstadoEvento, 
       TGES_EVENTO.IDF_USUARIODIGITA AS Digitador, 
       TGES_EVENTO.IDF_USUARIO AS Firmante 
  FROM JUDPENAL.TATP_CAUSA, 
       JUDPENAL.TG_TIPEVENTO, 
       JUDPENAL.TGES_EVENTO, 
       JUDPENAL.TG_ESTEVENTO 
 WHERE TATP_CAUSA.COD_TRIBUNAL = 953 
   AND TATP_CAUSA.IDF_ROLINTERNO > 0 
   AND TGES_EVENTO.CRR_CAUSA = TATP_CAUSA.CRR_IDCAUSA 
   AND TGES_EVENTO.TIP_EVENTO = TG_TIPEVENTO.TIP_EVENTO 
   AND TGES_EVENTO.TIP_EVENTO = TG_ESTEVENTO.TIP_EVENTO 
   AND TGES_EVENTO.EST_EVENTO = TG_ESTEVENTO.EST_EVENTO 
   AND TATP_CAUSA.TIP_CAUSAREF = 2
   AND TGES_EVENTO.TIP_EVENTO IN ($tipoexh) 
   AND TGES_EVENTO.FEC_EVENTO >= TO_DATE('$finicioexh', 'DD/MM/YYYY') 
   AND TGES_EVENTO.FEC_EVENTO < TO_DATE('$ffinexh', 'DD/MM/YYYY') + 1
 ORDER BY JUDPENAL.TGES_EVENTO.FEC_EVENTO DESC";




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
->setCellValue('A1', 'RIT')
->setCellValue('B1', utf8_encode('A�O'))
->setCellValue('C1', 'TIPO')
->setCellValue('D1', 'GLOSA')
->setCellValue('E1', 'FECHA DIG')
->setCellValue('F1', 'FECHA FIRMA')
->setCellValue('G1', 'ESTADO')
->setCellValue('H1', 'CTA. DIG')
->setCellValue('I1', 'CTA. FIRMA')
;

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