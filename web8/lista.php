<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resultado búsqueda</title>
  <link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

</head>
<body>

<?php
include 'header.php';
?>

<div class="row">
<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>
<div id="wrap-result">




		<?php
		include ('CrearLista.php');?>

<table>
<thead>
    <th class='tr90' width='170px'><b>ID Twitter</b></th>
    <th class='tr80' width='170px'><b>Descripcion</b></th>
    <th class='tr70' width='170px'><b>Seguidores</b></th>
    <th class='tr60' width='170px'><b>Localidad</b></th>
    <th class='tr50' width='170px'><b>Texto</b></th>
    <th class='tr50' width='170px'><b>Fecha</b></th>
    <th class='tr50' width='170px'><b>Acciones</b></th>
</thead>
		<?php
		include ('RegistroUsuarios.php');//Muestra la lista guardada, falta edición
		?>
		
</table>

		<a href="#"><button name="submit" type="button" id="volver" data-submit="sending" >EDITAR</button></a>

		<a href="#"><button name="submit" type="button" id="crearlista" data-submit="sending">ELIMINAR</button></a>
</div>

</body>
</html>