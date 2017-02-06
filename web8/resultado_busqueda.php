
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
include 'DatosLista.php';

?>




<div class="container-fluid">

	<div id="fondo" style="background-image: url('img/fondo.jpg');opacity: 0.1;" ></div>

  <div id="wrap-result">
<div class="row">


    <div class="col-md-6">
      <h1 class="xs">Resultados</h1>

       <a href="lista.php"><button name="submit" type="button" id="crearlista" data-submit="sending">GUARDAR LISTA</button></a>
     </div>

    <div class="col-md-6">
        <form id="form_resultado"  action="resultado_busqueda.php" method="post" enctype="multipart/form-data">
       
     
       <label>Nombre lista</label><p> <?php echo $_SESSION['nombreLista']; ?></p>
        
       
        <label>Palabra clave / hashtag</label>
        <input type="text" class=" cajas" name="keyword" title="keyword" required placeholder='<?php 
        echo $_SESSION['palabraClave'] ?>' required>
        <br>
        <label>Red social</label>
        
        <select  name="rrss" placeholder="Indica la red required>
        <option class="red" value="" selected data-default class="red">Indica la red social</option>
        <option value="Twitter">Twitter</option>
        <option value="Instragram">Instragram</option>
        <option value="YouTube">YouTube</option>
        </select>
        <br>
        <label>Seguidores</label>
        
        <input type="num" class=" cajas" name="seguidores" title="seguidores" size="35" placeholder='<?php 
        echo $_SESSION['seguidoresMinimos']; ?>'>
        <br>
        <label>Localidad</label>
        <input type="text" class=" cajas" name="ciudad" title="ciudad" size="35" placeholder='<?php 
        echo $_SESSION['localidad']; ?>'>

      
      </form>
      <br>
      <a href="resultado_busqueda.php"><button name="submit" type="button" id="crearlista" data-submit="sending">MODIFICAR BÚSQUEDA</button></a>
     

    </div>
   

    
  
</div>  



<br><br>

<table class="table">
<thead>
	<th class='tr100' width='170px'><b>Nombre usuario</b></th>
    <th class='tr90' width='170px'><b>ID Twitter</b></th>
    <th class='tr80' width='170px'><b>Descripcion</b></th>
    <th class='tr70' width='170px'><b>Seguidores</b></th>
    <th class='tr60' width='170px'><b>Localidad</b></th>
    <th class='tr50' width='170px'><b>Texto</b></th>
</thead>
</table>


	<div id="resultadolista">
				<?php
					
					include 'conexion.php';
					$paso = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '".$_SESSION['nombreLista']."'") or die ('Error al buscar la lista en la tabla');
 					$filaListas = mysqli_num_rows($paso);

 					if($_SESSION{'redSocial'}=="Twitter"){


	 					if ($filaListas==0){
							include 'IndexTwitter.php';//Muestra la búsqueda, falta edición

echo "<table>";
  // recorremos fichero y obtenemos los datos de los usuarios. 
  foreach($datosTwitter['statuses'] as $tweet)
  {
    $nombreUsuario = addslashes($tweet['user']['name']);
    $idTwitter = addslashes($tweet['user']['screen_name']);
    $descripcion = addslashes($tweet['user']['description']);
    $followers = addslashes($tweet['user']['followers_count']);
    $localizacion = addslashes($tweet['user']['location']);
    $text = addslashes($tweet['text']);
    $enlacePerfil = addslashes("https://twitter.com/$idTwitter");
    $web = addslashes($tweet['user']['url']);
    $idStr = addslashes($tweet['id_str']);
    $enlacePublicacion = addslashes("https://twitter.com/$idTwitter/status/$idStr");

     echo "<tr> <td class='tr100'>$nombreUsuario</td>
    <td class='tr90'  width='170px'><a class='perfil' target='_blank' href='$enlacePerfil'>$idTwitter</a></td>
    <td class='tr80' width='170px'>$descripcion </td>
    <td class='tr70' width='170px'>$followers</td>
    <td class='tr60' width='170px'>$localizacion</td>
    <td class='tr50' width='170px'><a class='perfil' target='_blank' href='$enlacePublicacion'>$text</a></td>
    </tr>";

   // echo "Enlace perfil: $enlacePerfil";
    //echo "Fecha creación: $fechaCreacion <br />";

   

} echo "</table>";
 echo "<br><br/>";


   // echo "Enlace perfil: $enlacePerfil";
    //echo "Fecha creación: $fechaCreacion <br />";

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

			
</div>		

<!--
<?php

	include 'footer.php';

?>-->
</body>
</html>