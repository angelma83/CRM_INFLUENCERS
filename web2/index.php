<!DOCTYPE html>
<html>
<head>
	<title>CRM Influencers</title>
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>

<!-- CONTENEDOR GENERAL -->
<div id="container">


<!-- CONTENEDOR GENERAL -->

		<header>
			<div id="logo">
			<img align="center"  src="img/logo.gif" width="350px">
			</div>
		</header>


<!-- MENÚ INICIAL -->


<div id="contenido" align="center">
	
	

			<div id="amarillo">	</div>
			<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>

		<div class="wrapper-menu">

                <h1 class="animacion1">¿Qué quieres hacer?</h1>
                <a class="animacion2" href="formulario.php" >Crear lista</a>
                <br><br>
                <a class="animacion3" href="listas.php">Mostrar todas las listas</a>
         </div>
         <script type="text/javascript">
		$(document).ready(function(){
			$(".animacion1").animate({top:'0px', opacity:'1'}, "slow");
		
		$(".animacion2").delay(600).animate({opacity:'1'}, "slow");
		$(".animacion3").delay(800).animate({opacity:'1'}, "slow");
		});
		


         </script>

<div class="header-1" >También puedes buscar <br>una lista ya creada<form action="listas.php" method="post"> <br><input placeholder="Buscar..." type="search" name="buscar"><br><button type="submit" name="buscar">ENVIAR</button></form>
</div>
		


</div>


</div>

</body>
</html>