<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<title>Querys SIAGJ Participantes</title>


<!-- Jquery --> 
<script src="js/jquery.min.js"></script>

<!-- Viewport --> 
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<!-- Bootstrap -->
<link rel="stylesheet" href="js/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link href="js/font-awesome.min.css" rel="stylesheet">

<!--Estilos CSS-->
<link rel="stylesheet" href="css/estilo.css">

</head>

<body>

  <div class="container-fluid">
    <nav class="navbar navbar-nav  navbar-expand-lg bg-secondary">
    <a class="navbar-text navbar-center text-light">Búsqueda de Participantes por Nombre</a>
    </nav>
</div>

<div class="container">
    <form id="formimputado" name="formimputado" method="post" action="impdelito.php">
   
      <p class="text-dark form-group form-inline">Nombre:</p>
        <input class="form-control form-group" type="text"  id="nombreimp"name="nombreimp" required />
   
      <p class="text-dark form-group form-inline">Apellido Paterno:</p>
        <input class="form-control form-group" type="text" id="apaternoimp" name="apaternoimp" required/>
   
      <p class="text-dark form-group form-inline">Apellido Materno:</p>
      <input class="form-control form-group" type="text" id="amaternoimp" name="amaternoimp"   />
   
      <p class="text-dark form-group form-inline">Código de Tribunal</p>
        <input class="form-control form-group" type="text" id="codtrib" name="codtrib"  value="928" size="6" maxlength="6" />

        <p class="text-dark form-group">Tipo</p>
        
        <select class="form-control form-group" id="tipo" name="tipo" >
          <option value="2">Imputado</option>
          <option value="5">Victima</option>
          <option value="7">Fiscal</option>
          <option value="8">Defensor</option>
          <option value="12">Testigo</option>
          <option value="14">Perito</option>
        </select>

      <button id="Enviar6" type="button bnt btn-lg" class="btn btn-primary col-lg">Buscar</button>

    </form>
</div>    

<div class="footer">
  <p class="rights fixed-bottom"><a href="mailto:mmujica@pjud.cl">Desarrollado por Marcelo Mujica</a></p>
</div>


</body>
</html>
