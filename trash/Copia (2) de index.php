<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Querys SIAGJ</title>
<style type="text/css">
body {
	background-color: #CF9;
	font-family: Verdana, Geneva, sans-serif;
}
.verdana10 {
	font-size: 14px;
}
.verdana10 {
	font-size: 10px;
}
.verdana11 strong {
	font-size: 9px;
}
.verdana12 strong {
	font-size: 12px;
	color: #F00;
}
.verdana10 .verdana12 {
	font-weight: bold;
}
.verdana101 {	font-size: 14px;
}
.verdana101 {	font-size: 10px;
}
.verdana101 {	font-size: 14px;
}
.verdana101 {	font-size: 10px;
}
.nuevo {
	color: #F00;
}
.nuevo1 {	color: #F00;
}
.nuevo1 {	color: #F00;
}
.verdana1011 {font-size: 14px;
}
.verdana1011 {font-size: 10px;
}
.verdana1011 {font-size: 14px;
}
.verdana1011 {font-size: 10px;
}
.verdana1011 {font-size: 14px;
}
.verdana1011 {font-size: 10px;
}
.verdana1011 {font-size: 14px;
}
.verdana1011 {font-size: 10px;
}
.verdana11 tr .verdana101 .verdana10 .verdana11 .verdana12 .verdana11 .verdana12 .verdana10 {
	color: #000;
}
.nuevo11 {color: #F00;
}
.nuevo11 {color: #F00;
}
.nuevo11 {color: #F00;
}
.nuevo11 {color: #F00;
}
.verdana10 {
	font-size: 14px;
}
.naranja {
	color: #C90;
}
.clase9 {
	font-size: 9px;
}
.clase91 {	font-size: 9px;
}
.clase91 {	font-size: 9px;
}
.verdana11 .verdana11 .verdana11 .verdana11 {
	font-size: 9px;
}
.clase911 {font-size: 9px;
}
.clase911 {font-size: 9px;
}
.clase911 {font-size: 9px;
}
.clase911 {font-size: 9px;
}
.clase9 .verdana12 {
	color: #00F;
}
.verdana10 {
	font-weight: bold;
}
.verdana11 .verdana11 .verdana11 .verdana12 {
	color: #00F;
}
.clase91 .verdana11 .verdana12 .verdana12 {
	color: #00F;
}
</style>

<SCRIPT LANGUAGE="JavaScript">
function valida_imp(){
	//valido que se hayan ingresado al menos 2 campos
	var contador=0;
	if (document.formimputado.nombreimp.value){
		contador++;
	}	
	if (document.formimputado.apaternoimp.value){
		contador++;
	}	
	if (document.formimputado.amaternoimp.value){
		contador++;
	}	
	if(contador<2){
		alert("Debe llenar por lo menos 2 campos o me revienta el servidor");
		document.formimputado.nombreimp.focus();
		}
	document.formimputado.submit();
	
}
function valida_imp2(){
	//valida que se hayan ingresado el rut
	var contador=0;
	if (document.formimputado2.rutimp.value){
		contador++;
	}	
	if(contador<1){
		alert("Debe ingresar el RUT");
		document.formimputado2.rutimp.focus();
		
		}
	document.formimputado2.submit();
	
}
</script>
</head>

<body>
<p class="verdana10"><strong>Querys
SIAGJ</p>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">Estado de Eventos[Resoluciones, Actuaciones,Audiencias, Solicitudes] entre fechas(dd-mm-aaaa) x tipo de causa</span></strong></td>
  </tr>
  <tr>
    <td><form id="formres" name="formres" method="post" action="estadoeventos.php">
      <span class="clase9"> Inicio:
        <input name="finicioev" type="text" id="finicioev" value="<?php echo date("d-m-Y"); ?>" />
        Fin:
        <input type="text" name="ffinev" id="ffinev" value="<?php echo date("d-m-Y"); ?>" />
        Tipo evto:
        <select name="tipoev" id="tipoev">
          <option value="2">Resoluci&oacute;n</option>
          <option value="1">Audiencia</option>
          <option value="3">Solicitud</option>
          <option value="7">Actuaci&oacute;n</option>
          <option value="1,2,3,7">TODOS</option>
        </select>
        Tipo causa:
        <select name="tipocausa" id="tipocausa">
          <option value="1,2,3,4,5">Todas</option>
          <option value="1">Ordinaria</option>
          <option value="2">Exhorto</option>
          <option value="3">Administrativa</option>
          <option value="4">Extradici&oacute;n</option>
          <option value="5">Militar</option>
        </select>
        Glosa?:
        <input type="text" name="glosaev" id="glosaev" />
        <input type="submit" name="Enviar6" id="Enviar6" value="Submit" />
        </span>
    </form></td>
  </tr>
</table>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase91"><strong class="verdana11"><span class="verdana12"><span class="verdana12">Hito  entre fechas (dd-mm-aaaa)</span></span></strong></td>
  </tr>
  <tr>
    <td><form id="formoarchivo" name="formoarchivo" method="post" action="oarchivo.php">
      <span class="clase91"> Inicio:
        <input type="text" name="finicio" id="finicio" />
        Fin:
        <input type="text" name="ffin" id="ffin" />
        <select name="hito" id="hito">
          <option value="84">Absoluci&oacute;n o condena</option>
          <option value="145">Ordena Archivo</option>
          <option value="83">Lectura de sentencia</option>
          <option value="93">Fija audiencia</option>
          <option value="112">Declara admisibilidad del recurso de nulidad</option>
          <option value="119">C&uacute;mplase y rechaza recurso de nulidad</option>
          <option value="72">Ordena detenci&oacute;n</option>
          <option value="32">Contra orden de detenci&oacute;n</option>
          <option value="70">Declara sobreseimiento</option>
          <option value="137">Audiencia de Juicio Oral</option>
          <option value="86">Suspende Audiencia</option>
          <option value="90">Auto de apertura de juicio oral art.277</option>
          <option value="57">Ordena mantener P.P</option>
          <option value="142">C&uacute;mplase y acoge RR.NN</option>
          <option value="276">G&iacute;rese Cheque</option>
        </select>
        <input type="submit" name="Enviar3" id="Enviar3" value="Submit" />
        </span>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">RUC Duplicado?</span></strong></td>
  </tr>
  <tr>
    <td><form id="formrucduplicado" name="formrucduplicado" method="post" action="rucduplicado.php">
      <span class="clase9"> RUC:
        <input type="text" name="rucduplicado" id="rucduplicado" />
        <input type="submit" name="Enviar9" id="Enviar9" value="Submit" />
        </span>
    </form></td>
  </tr>
</table>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">RUC X RIT</span></strong></td>
  </tr>
  <tr>
    <td><form id="formrucxrit" name="formrucxrit" method="post" action="rucxrit.php">
      <span class="clase9"> RIT:
        <input name="rit" type="text" id="rit" size="5" />
        A&ntilde;o
        <input name="anio" type="text" id="anio" size="6" />
        <input type="submit" name="Enviar13" id="Enviar13" value="Submit" />
        </span>
    </form></td>
  </tr>
</table>
<p class="verdana10">&nbsp;</p>
<table width="1100" height="50" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana12">Participante X causa X tribunal (Todos los TG y TOP...demora dependiendo de los par&aacute;metros)</strong></td>
  </tr>
  <tr>
    <td><form id="formimputado" name="formimputado" method="post" action="impdelito.php">
      <p class="clase9">Nombre:
        <input type="text" name="nombreimp" id="nombreimp" />
        A.Paterno:
        <input type="text" name="apaternoimp" id="apaternoimp" />
        A.Materno:
        <input type="text" name="amaternoimp" id="amaternoimp" />
        Tipo:
        <select name="tipo" id="tipo">
          <option value="2">Imputado</option>
          <option value="5">Victima</option>
          <option value="7">Fiscal</option>
          <option value="8">Defensor</option>
          <option value="12">Testigo</option>
          <option value="14">Perito</option>
        </select>
        <input type="submit" name="Enviar2" id="Enviar2" value="Enviar" onclick="valida_imp()"/>
        </p>
    </form></td>
  </tr>
</table>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana12">Participante X RUT X tribunal(Todos los TG y TOP...demora)</strong></td>
  </tr>
  <tr>
    <td><form id="formimputado2" name="formimputado2" method="post" action="impdelito2.php">
      <span class="clase9">
      
      RUT:
        <input type="text" name="rutimp" id="rutimp" />
        <select name="tipo2" id="tipo2">
          <option value="2">Imputado</option>
          <option value="5">Victima</option>
          <option value="7">Fiscal</option>
          <option value="8">Defensor</option>
          <option value="12">Testigo</option>
          <option value="14">Perito</option>
        </select>
        <input type="submit" name="Enviar10" id="Enviar10" value="Enviar" onclick="valida_imp2()"/>
      </span>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">Ingreso  entre fechas(dd-mm-aaaa) (glosa delito...ej. dro o Drog o DROGAS)</span></strong></td>
  </tr>
  <tr>
    <td><form id="formsent" name="formsent" method="post" action="sentxfecha.php">
      <span class="clase9">
      
        Inicio:
        <input type="text" name="finiciosent" id="finiciosent" />
        Fin:
        <input type="text" name="ffinsent" id="ffinsent" />
        Delito:
        <input type="text" name="glosasent" id="glosasent" />
        <input type="submit" name="Enviar5" id="Enviar5" value="Submit" />
      </span>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">Cod. Fiscal/Defensor (puede ser parte de nombres Ej: lui casti) </span></strong></td>
  </tr>
  <tr>
    <td><form id="formrfd" name="formrfd" method="post" action="codfd.php">
      <span class="clase9"> Nombre:
        <input type="text" name="nombrefd" id="nombrefd" />
        A.Paterno:
        <input type="text" name="apaternofd" id="apaternofd" />
        Tipo:
        <select name="tipofd" id="tipofd">
          <option value="1">Fiscal</option>
          <option value="2">Defensor</option>
        </select>
        <input type="submit" name="Enviar8" id="Enviar8" value="Submit" />
        </span>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">Solicitud sin doc (ni word ni pdf) (dd-mm-aaaa)</span></strong></td>
  </tr>
  <tr>
    <td><form id="formssdoc" name="formssdoc" method="post" action="ssindoc.php">
      <span class="clase9">
      
        Inicio:
        <input type="text" name="finiciossdoc" id="finiciossdoc" />
        Fin:
        <input type="text" name="ffinssdoc" id="ffinssdoc" />
        <input type="submit" name="Enviar4" id="Enviar4" value="Submit" />
      </span>
    </form></td>
  </tr>
</table>
<table width="1100" height="57" border="1">
  <tr>
    <td width="848" class="clase9"><strong class="verdana11"><span class="verdana12">Resoluciones sin doc  (dd-mm-aaaa)</span></strong></td>
  </tr>
  <tr>
    <td><form id="formrsdoc" name="formrsdoc" method="post" action="rsindoc.php">
      <span class="clase9">
      
        Inicio:
        <input type="text" name="finiciorsdoc" id="finiciorsdoc" />
        Fin:
        <input type="text" name="ffinrsdoc" id="ffinrsdoc" />
        <input type="submit" name="Enviar" id="Enviar" value="Submit" />
      </span>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1100" height="52" border="1" class="verdana11">
  <tr class="verdana11">
    <td width="848" height="16" class="verdana11"><span class="verdana12"><strong class="verdana11"><span class="verdana12">Custodia entre fechas (dd-mm-aaaa)</span></strong></span></td>
  </tr>
  <tr class="clase9">
    <td height="28"><form id="formssdoc2" name="formssdoc" method="post" action="especiesfecha.php">
       Inic<span class="clase9">io:
<input type="text" name="finicioesp" id="finicioesp" />
        Fin:
        <input type="text" name="ffinesp" id="ffinesp" />
        <input type="submit" name="Enviar7" id="Enviar7" value="Submit" />
      </span>
    </form></td>
  </tr>
</table>
<table width="1100" height="52" border="1">
  <tr class="verdana11">
    <td width="848" height="16" class="verdana11"><strong class="verdana11"><span class="verdana12">Custodia X RIT </span></strong></td>
  </tr>
  <tr class="clase9">
    <td height="28"><form id="formssdoc3" name="formssdoc" method="post" action="especiesrit.php">
      RIT
        <input name="ritesp" type="text" id="ritesp" size="6" />
        A&ntilde;o:
        <input name="anoesp" type="text" id="anoesp" size="6" />
        <input type="submit" name="Enviar11" id="Enviar11" value="Submit" />
      
    </form></td>
  </tr>
</table>
<table width="1100" height="52" border="1">
  <tr class="verdana11">
    <td width="848" height="16" class="verdana11"><strong class="verdana11"><span class="verdana12">Direcciones de participantes X RIT</span></strong></td>
  </tr>
  <tr class="clase91">
    <td height="28"><form id="formssdoc4" name="formssdoc" method="post" action="participantes.php">
      RIT
      <input name="ritpart" type="text" id="ritpart" size="6" />
      A&ntilde;o:
      <input name="anopart" type="text" id="anopart" size="6" />
      <input type="submit" name="Enviar12" id="Enviar12" value="Submit" />
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
