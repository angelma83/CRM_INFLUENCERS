<?php

include('Conexion.php');

session_start();
// Acceso a los parámetros del formulario de entrada y que se deben incluir en la lista
$_SESSION['nombreLista'] = $_POST['lista'];
$_SESSION['palabraClave'] = $_POST['keyword'];
$_SESSION['redSocial'] = $_POST['rrss'];
$_SESSION['seguidoresMinimos'] = $_POST['seguidores'];
$_SESSION['localidad'] = $_POST['ciudad'];

$_SESSION['palabraClaveBBDD'] = $_POST['keyword'];

 $nombreLista = $_SESSION['nombreLista'];

 $redSocial = $_SESSION['redSocial'];
 $seguidoresMinimos = $_SESSION['seguidoresMinimos'];
 $localidad = $_SESSION['localidad'];

// echo "muestro los valores del formulario en acceo tabla listas";
// echo $nombreLista;
// echo $palabraClave;
// echo $redSocial;
// echo $seguidoresMinimos;
// echo $localidad;

// echo "fin de mostracion de valores";

// // // Se comprueba si hay lista ya creada en tabla. 
// $paso = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '$nombreLista'") or die ('Error al buscar la lista en la tabla');
//  $filaListas = mysqli_num_rows($paso);
//  if ($filaListas==0){
//    $consultaBd = "SELECT * FROM listas";
//    $ejecucionBd = mysqli_query($conexion, $consultaBd);
  
//  //   mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores, localizacion) VALUES ('$nombreLista', '$palabraClaveBBDD', '$redSocial', '$seguidoresMinimos', '$localidad')") or die ('Error en la conexión con la tabla listas');
//  } else {


//  header('Location:mensajelistarepetida.php');

//  }

  ?>