<?php //Ejemplo aprenderaprogramar.com

$texto = file_get_contents("https://servicios.pjud.cl/OODD/rrpp_orden.php");

$texto = nl2br($texto);

echo $texto;

?>