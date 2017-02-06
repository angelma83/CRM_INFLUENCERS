<!DOCTYPE html lang="es">
<html>
<head>
	<title>CRM Influencers</title>
	
		<meta charset="UTF-8">
	<meta name="language" content="Spanish">
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>

</head>
<body>

<!-- CONTENEDOR GENERAL -->

<div id="container">


<!-- MENÚ INICIAL -->

		<header>
			<div id="logo">
			<img align="center"  src="img/logo.gif" width="350px">
			</div>
		</header>


<div id="amarillo">	</div>
<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;background-attachment: fixed;" ></div>

<div class="container-fluid">


<!-- MENÚ INICIAL -->

		


<!-- ENTRADA -->


<div id="row">
	
	

			

		<div class="wrapper-menu col-md-12">

                <h1 class="animacion1 col-md-12 ">¿Qué quieres hacer?</h1>
                <a class="animacion2 col-md-6" href="formulario.php" >Crear lista</a>
                <br><br>
   
                <a class="animacion3 col-xs-7 col-md-7" href="listasLSSLSL.php">Mostrar todas las listas</a>

         <div class="header-1 col-xs-7 col-sm-12 buscadorpeque" >También puedes buscar <br>una lista ya creada<form action="listas.php" method="post"> <br><input placeholder="Buscar..." type="search" name="buscar"><br><button type="submit" name="buscar">ENVIAR</button></form>
	</div>
         </div>

<!-- ANIMACIÓN INICIO -->

              <script type="text/javascript">

		$(document).ready(function(){
		$(".animacion1").animate({left:'0px', opacity:'1'}, "slow");
		$(".animacion2").delay(600).animate({opacity:'1'}, "slow");
		$(".animacion3").delay(800).animate({opacity:'1'}, "slow");
		$(".header-1").delay(1000).animate({bottom:'30px', opacity:'1'},"slow");

		});
		
         </script>


<!-- FOOTER -->

	


</div>


</div>

	<?php

	include 'footer.php';

	?>

</body>

</html>


