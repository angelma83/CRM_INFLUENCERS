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
include 'DatosLista.php';
include 'header.php';
?>



<div class="container-fluid fondo_amarillo">

	
    <div class="container-fluid panelbusqueda">
 			<div class="row listacreada">

			    <div class="col-md-2">
							<?php

							echo "<h2 class='xs'>".$_SESSION['nombreLista']."</h2>";?>
				</div>
				<div class="col-md-2">
							<?php echo "<h3 >  <i class='fa fa-search'></i>&nbsp &nbsp".$_SESSION ['palabraClave']."</h3>";?>
				</div>


				<div class="col-md-8">			
				  <a href="lista.php">
					    <button name="submit" type="button" id="crearlista" data-submit="sending">GUARDAR LISTA</button></a>
			     </div>


			</div>

			<div class="row"> 
	</div>


				 <div class="col-md-12">
				
				        <form class="form-inline" id="form_resultado"  action="resultado_busqueda.php" method="post" enctype="multipart/form-data">
				       
						<h4>Editar búsqueda</h4>
				        <div class="form-group">
				        <input type="text" class=" cajas" name="keyword" title="keyword" required placeholder="Palabra clave o hashtag" required>
				     	</div>

				        <div class="form-group"> 
				       <select  name="rrss" placeholder="Indica la red" required>
				        <option class="red" value="" selected data-default class="red">Indica la red social</option>
				        <option value="Twitter">Twitter</option>
				        <option value="Instragram">Instragram</option>
				        <option value="YouTube">YouTube</option>
				        </select>
				        </div>

				        <div class="form-group">
				        <input type="num" class=" cajas" name="seguidores" title="seguidores" size="35" placeholder="Indica el número de seguidores">
				        </div>

				        <div class="form-group">       
					      	
					        <input type="text" class=" cajas" name="ciudad" title="ciudad" size="35" placeholder="Indica tu ciudad">
			       		</div>
			       		
						<div class="form-group"> 
				      	<a href="resultado_busqueda"><button name="submit" type="submit" id="contacto" data-submit="sending">APLICAR</button></a>
				      	</div>
			      	
			       		</form>
			   </div>
			</div>	


	<div id="resultadolista">
				<?php
					
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

<!--
<?php

	include 'footer.php';

?>-->
</body>
</html>