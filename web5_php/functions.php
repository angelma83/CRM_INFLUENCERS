<?php

function crearLista(){
	$conexion=  new mysqli('localhost', 'user_influencer', 'influencer', 'crm_influencers'); 
  	if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	$paso = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '$nombreLista'") or die ('Error al buscar la lista en la tabla');
  	$filaListas = mysqli_num_rows($paso);
  	if ($filaListas==0){
		$consultaBd = "SELECT * FROM listas";
	    $ejecucionBd = mysqli_query($conexion, $consultaBd);
	    
	    mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores, localizacion) VALUES ('$nombreLista', '$palabraClave', '$redSocial', '$seguidoresMinimos', '$localidad')") or die ('Error en la conexión con la tabla listas');
	    //echo "Lista guardada en la base de datos ¡viva!";

	    //CREAMOS LA TABLA EN LA QUE SE VAN A GUARDAR LOS USUARIOS
	    $crear_tabla= "CREATE TABLE $nombreLista(
	    nombre VARCHAR(50) COLLATE utf8_spanish_ci, 
	    usuario VARCHAR(50) COLLATE utf8_spanish_ci PRIMARY KEY,
	    bio VARCHAR(140) COLLATE utf8_spanish_ci,
	    seguidores VARCHAR(20) COLLATE utf8_spanish_ci,
	    localidad VARCHAR(70) COLLATE utf8_spanish_ci,
	    texto VARCHAR(140) COLLATE utf8_spanish_ci,
	    enlace_publicacion VARCHAR(100) COLLATE utf8_spanish_ci,
	    web VARCHAR(70) COLLATE utf8_spanish_ci,
	    enlace_perfil VARCHAR(70) COLLATE utf8_spanish_ci)";

	    
	    if(mysqli_query($conexion,$crear_tabla)){
	      echo "Tabla creada correctamente";
	    }else{
	      echo "Error al crear la tabla". mysqli_connect_error($conexion);
	    }    
	}else{
		echo "El nombre de la lista ya existe";
	}    
    mysqli_close($conexion);
}

function guardarUsuarios(){
	//Registro usuarios
	//Comprobamos el número de usuarios a través de las filas de la tabla
	$conexion=  new mysqli('localhost', 'user_influencer', 'influencer', 'crm_influencers'); 
  	if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	$paso1 = mysqli_query($conexion, "SELECT * FROM $nombreLista WHERE usuario = '$idTwitter'") or die ('Error al buscar los usuarios en la tabla');
	$filas = mysqli_num_rows($paso1);

	//Si el usuario no está registrado vuelve a empezar el bucle
	if ($filas==0){
	//Limitamos el número de seguidores a los que se indiquen en el formulario
		if ($followers>$seguidoresMinimos){
		  $consultaUsuarios = "SELECT * FROM $nombreLista";
		  $ejecucionUsuarios = mysqli_query($conexion, $consultaUsuarios);
		  mysqli_query($conexion, "INSERT INTO $nombreLista (nombre, usuario, bio, seguidores, localidad, texto, enlace_publicacion, web, enlace_perfil) VALUES ('$nombreUsuario', '$idTwitter', '$descripcion', '$followers', '$localizacion', '$text', '$enlacePublicacion', '$web', '$enlacePerfil')") or die ('Error en la conexión con la tabla usuarios'.mysqli_connect_error($conexion));
		}
		//echo "<br>Usuario guardado en la base de datos";
	} //else{
	//echo "El usuario ya está registrado";
	
	mysqli_close($conexion);
}
?>