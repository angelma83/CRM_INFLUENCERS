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


//$palabraClaveBBDD = $_POST['keyword'];
 // Se comprueba si hay lista ya creada en tabla y se cre
include('Conexion.php');
$paso = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '$nombreLista'") or die ('Error al buscar la lista en la tabla');
 $filaListas = mysqli_num_rows($paso);
 if ($filaListas==0){
   $consultaBd = "SELECT * FROM listas";
   $ejecucionBd = mysqli_query($conexion, $consultaBd);
  
  mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores, localizacion) VALUES ('$nombreLista', '$palabraClaveBBDD', '$redSocial', '$seguidoresMinimos', '$localidad')") or die ('Error en la conexión con la tabla listas');

  //Creamos la tabla en la bbdd con el nombre de la lista donse se guardarán los usuarios
 $crear_tabla= "CREATE TABLE $nombreLista(
      nombre VARCHAR(50) COLLATE utf8_spanish_ci, 
      usuario VARCHAR(50) COLLATE utf8_spanish_ci PRIMARY KEY,
      bio VARCHAR(180) COLLATE utf8_spanish_ci,
      seguidores VARCHAR(20) COLLATE utf8_spanish_ci,
      localidad VARCHAR(70) COLLATE utf8_spanish_ci,
      texto VARCHAR(140) COLLATE utf8_spanish_ci,
      enlace_publicacion VARCHAR(100) COLLATE utf8_spanish_ci,
      web VARCHAR(70) COLLATE utf8_spanish_ci,
      enlace_perfil VARCHAR(70) COLLATE utf8_spanish_ci)";

      
      if(mysqli_query($conexion,$crear_tabla)){
        echo "Tabla creada correctamente";
      }else{
        echo "Error al crear la tabla". mysqli_error($conexion);
      }
 } else {
 echo "La lista ya existe y no se ha guardado, seleccione otro nombre";
 //header('Location: mensajelistarepetida.php');


 }
?>

</body>
</html>
