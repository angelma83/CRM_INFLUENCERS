<?php
include('Conexion.php');


// Acceso a los parámetros del formulario de entrada y que se deben incluir en la lista
session_start();

 $nombreLista = $_SESSION['nombreLista'];
 $palabraClaveBBDD = $_SESSION ['palabraClave'];
 $redSocial = $_SESSION['redSocial'];
 $seguidoresMinimos = $_SESSION['seguidoresMinimos'];
 $localidad = $_SESSION['localidad'];



//$palabraClaveBBDD = $_POST['keyword'];
 // Se comprueba si hay lista ya creada en tabla y se cre
$paso = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '$nombreLista'") or die ('Error al buscar la lista en la tabla');
 $filaListas = mysqli_num_rows($paso);
 if ($filaListas==0){
   $consultaBd = "SELECT * FROM listas";
   $ejecucionBd = mysqli_query($conexion, $consultaBd);
  
  mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores, localizacion) VALUES ('$nombreLista', '$palabraClaveBBDD', '$redSocial', '$seguidoresMinimos', '$localidad')") or die ('Error en la conexión con la tabla listas');
 } else {


 header('Location:mensajelistarepetida.php');

 }
?>