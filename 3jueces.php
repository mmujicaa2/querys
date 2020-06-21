<html>
<body class="CENTRO">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <span class="titulo">****Jueces Integrantes de Juicio Oral**** </BR>
 <p><strong>
  <a href="xls3jueces.php?ctrib2=<?php echo trim(strtoupper($_POST['ctrib3jueces']));?>
  &rit2=<?php echo trim(strtoupper($_POST['rit3jueces']));?>
  &anio2=<?php echo trim(strtoupper($_POST['anio3jueces']));?>
  ">Exportar a excel</a></strong></p>

  </BR>
 </span>
</body>
</html>

<style type="text/css">
body {
	background-color: #CF9;
}
.centro {
	text-align: center;
}
.CENTRO {
	text-align: center;
}
.titulo {
	font-weight: bold;
}
</style>
<?php

$conn = oci_connect('tg_penaltg', 'tg20170523', 'rpenprod','AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error en conexion";
}

$ctrib2=trim(strtoupper($_POST['ctrib3jueces']));
$rit2=trim(strtoupper($_POST['rit3jueces']));
$anio2=trim(strtoupper($_POST['anio3jueces']));

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


//echo $querypass;

$stid = oci_parse($conn,$querypass);


if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentiaties($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error en query";
	
}

// Perform the logic of the query
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	echo "error al ejecutar query";
}

// Fetch the results of the query
print "<table border='1'>\n";echo "<tr>\n";
	     echo "    <td><strong>" ."RIT"."<strong></td>\n";
 	     echo "    <td><strong>" ."AÑO"."<strong></td>\n";
  	     echo "    <td><strong>" ."Jueces Integrantes (Ultima audiencia)"."<strong></td>\n";
		 echo "    <td><strong>" ."Cod Trib. "."<strong></td>\n";
     echo "    <td><strong>" ."Fecha"."<strong></td>\n";   
    echo "</tr>\n";

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	
    print "<tr>\n";
    foreach ($row as $item) {
        //print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
		print "    <td>" . ($item) . "</td>\n";
		
    }
    print "</tr>\n";
}
print "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?> 
