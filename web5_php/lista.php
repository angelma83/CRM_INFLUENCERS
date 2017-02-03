<!DOCTYPE html>
<html>
<head>
	<title>Resultado búsqueda</title>
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>




<div id="contenido" align="center">

	

			<!--<div id="amarillo">	</div>
			<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>-->

				
				<?php
				session_start();
				echo "Titulo";
				echo "La red social es $redSocial";
				echo "<h1>$_SESSION['nombreLista']</h1>"; 
				header ('Location:resultado_busqueda.php');
				?>

				</div>

<!--</div>-->
</body>
</html>