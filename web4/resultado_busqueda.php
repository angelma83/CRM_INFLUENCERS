<!DOCTYPE html>
<html>
<head>
	<title>Resultado búsqueda</title>
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>


<?php

include 'header.php';

?>

<div id="contenido" align="center">
	
	

			<div id="amarillo">	</div>
			<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>



			<div id="wrap-result">
			<h1>¿Guardar lista?</h1>

				<div id="resultadolista"></div>
				<br><br>
				<?php
					include '../IndexTwitter.php';


					echo $nombreLista;
					echo $palabraClave;
					echo $redSocial;
					echo $seguidoresMinimos; 
					echo $localidad; 

					// echo "<br><br/>";
    	// 				echo "Nombre usuario: $nombreUsuario <br />";
    	// 				echo "ID Twitter: $idTwitter <br />";
    	// 				echo "Descripcion: $descripcion <br />";
    	// 				echo "Seguidores: $followers <br />";
    	// 				echo "Localidad: $localidad <br />";
    	// 				echo "Texto: $text <br />";
    	// 				echo "Enlace perfil: $enlacePerfil";
    	// 				//echo "Fecha creación: $fechaCreacion <br />";
    	// 			echo "<br><br/>";

				?>
				
				<a href="lsta.php"><button name="submit" type="button" id="crearlista" data-submit="sending">SÍ, CREAR LISTA</button></a>
				
				<a href="formulario.php"><button name="submit" type="button" id="volver" data-submit="sending" >
				VOLVER</button></a>
				


			</div>
</div>
</body>
</html>