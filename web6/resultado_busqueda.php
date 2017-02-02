<!DOCTYPE html>
<html>
<head>
	<title>Resultado búsqueda</title>
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>

<?php

include 'header.php';

?>

<div id="contenido" align="center">
	

			<!--<div id="amarillo">	</div>-->
			<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>



			<div id="wrap-result">
			<h1>Resultados</h1>

				<div id="resultadolista" style="overflow: scroll;">
				<?php
					include 'DatosLista.php';
					include 'IndexTwitter.php';
			
				?>
				</div>
				<br><br>

				<a href="formulario.php"><button name="submit" type="button" id="volver" data-submit="sending" >
				VOLVER</button></a>

				<a href="lista.php"><button name="submit" type="button" id="crearlista" data-submit="sending">GUARDAR LISTA</button></a>
				

			</div>
</div>
<?php

	include 'footer.php';

	?>
</body>
</html>