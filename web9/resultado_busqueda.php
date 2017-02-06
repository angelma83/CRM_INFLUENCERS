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

	<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>
<div id="wrap-result">
		<h1>Resultados</h1><br>

<table >
<thead>
	<th class='tr100' width='170px'><b>Nombre usuario</b></th>
    <th class='tr90' width='170px'><b>ID Twitter</b></th>
    <th class='tr80' width='170px'><b>Descripcion</b></th>
    <th class='tr70' width='170px'><b>Seguidores</b></th>
    <th class='tr60' width='170px'><b>Localidad</b></th>
    <th class='tr50' width='170px'><b>Texto</b></th>
</thead>
</table>


	<div id="resultadolista" style="overflow: scroll;">
				<?php
					include 'DatosLista.php';
					include 'conexion.php';
					$paso = mysqli_query($conexion, "SELECT * FROM nombre_listas WHERE nombre_lista = '".$_SESSION['nombreLista']."'") or die ('Error al buscar la lista en la tabla');
 					$filaListas = mysqli_num_rows($paso);

 					if($_SESSION{'redSocial'}=="1"){


	 					if ($filaListas==0){
							include 'IndexTwitter.php';//Muestra la búsqueda, falta edición
						}else{
							//header('Location:mensajelistarepetida.php');
							echo "La tabla ya existe, realiza una nueva búsqueda";
						}

 					}else{


					echo "Introduzca una red social indexada.";

 					}
 					
				?>

	</div>
				<br><br>

				<a href="formulario.php"><button name="submit" type="button" id="volver" data-submit="sending" >
				VOLVER</button></a>

				<a href="lista.php"><button name="submit" type="button" id="crearlista" data-submit="sending">GUARDAR LISTA</button></a>
</div>		


<?php

	include 'footer.php';

?>
</body>
</html>