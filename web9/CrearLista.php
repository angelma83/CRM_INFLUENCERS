<!DOCTYPE html>
<html>
<head>
  <title>Crear lista</title>

  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
 



</head>
<body>

<?php

// Acceso a los parámetros del formulario de entrada y que se deben incluir en la lista

echo "<h2>".$_SESSION['nombreLista']."</h2>";
echo "<h3>  <i class='fa fa-search'></i>&nbsp &nbsp".$_SESSION ['palabraClave']."</h3>";

 $nombreLista = $_SESSION['nombreLista'];
 $palabraClaveBBDD = $_SESSION ['palabraClave'];
 $redSocial = $_SESSION['redSocial'];
 $seguidoresMinimos = $_SESSION['seguidoresMinimos'];
 $localidad = $_SESSION['localidad'];
 $idioma = $_SESSION['idioma']


//$palabraClaveBBDD = $_POST['keyword'];
 // Se comprueba si hay lista ya creada en tabla y se cre
include('Conexion.php');
$paso = mysqli_query($conexion, "SELECT * FROM nombre_listas WHERE nombre_lista = '$nombreLista'") or die ('Error al buscar la lista en la tabla');
 $filaListas = mysqli_num_rows($paso);
 if ($filaListas==0){
   $consultaBd = "SELECT * FROM listas";
   $ejecucionBd = mysqli_query($conexion, $consultaBd);
  
  //Insertamos los valores del formulario en su tabla correspondiente (excepto idioma y red social)
  mysqli_query($conexion, "INSERT INTO nombre_listas (nombre_lista) VALUES ('$nombreLista')") or die ('Error en la conexión con la tabla listas');
  mysqli_query($conexion, "INSERT INTO keywords (keyword) VALUES ('$palabraClaveBBDD')") or die ('Error en la conexión con la tabla listas');
  mysqli_query($conexion, "INSERT INTO seguidores_minimos (seguidores) VALUES ('$seguidoresMinimos')") or die ('Error en la conexión con la tabla listas');
  //Sacamos la id de los valores que hemos introducido en las distintas tablas
  $idlista = mysqli_query($conexion, "SELECT id FROM nombre_listas WHERE nombre_lista = '$nombreLista'") or die ("Error al buscar el id en la tabla nombre_listas");
  $idkeyword = mysqli_query($conexion, "SELECT id FROM keywords WHERE keyword = '$palabraClaveBBDD'") or die ("Error al buscar el id en la tabla keywords"); 
  $idseguidores = mysqli_query($conexion, "SELECT id FROM seguidores_minimos WHERE seguidores_minimos = '$seguidoresMinimos'") or die ("Error al buscar el id en la tabla seguidores_minimos");  
  //Guardamos en la tabla listas toda la información
  mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores_minimos, localizacion, idioma) VALUES ('$idlista', '$idkeyword', '$redSocial', '$idseguidores', '$localidad', '$idioma')") or die ('Error en la conexión con la tabla listas');
 
?>

</body>
</html>
