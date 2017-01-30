<?php
if(isset($_REQUEST['submit'])){
		if ($_REQUEST['lista']=="" or! preg_match("/^[a-zA-Z]/", $_REQUEST['lista'])){
			$error[1]='<span class="error">"Por favor, introduce un nombre para la lista"</span>';
		}elseif ($_REQUEST['rrss']=="" r! preg_match("/^[a-zA-Z]/", $_REQUEST['rrss'])){
			$error[3]='<span class="error">"Por favor, introduce tu email"</span>';
		}
	}

	$conexion=  new mysqli('localhost', 'user_influencer', 'influencer', 'CRM_Influencers'); 
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
 	mysqli_select_db ($conexion, '') or die ('No se puede hacer la conexion');
	$consultaBd = "SELECT * FROM listas";
	$ejecucionBd = mysqli_query($conexion, $consultaBd);

	$lista=($_REQUEST['lista']);
	$keyword=($_REQUEST['keyword']);
	$rrss=($_REQUEST['rrss']);
	$seguidores=($_REQUEST['seguidores']);
	$localizacion=($_REQUEST['localizacion']);
	$confirmacion="Base de datos cargada correctamente ¡viva!";

	mysqli_query($conexion, "INSERT INTO listas (nombre_lista, keyword, red_social, seguidores, localizacion) VALUES ('$lista', '$keyword', '$rrss', '$seguidores', '$localizacion')") or die ('Error en la conexión');
	echo $confirmacion;

	mysqli_close($conexion);
?>