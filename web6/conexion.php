<?php

// declaro variables para realizar la conexion a BBDD
$localhost= 'localhost';
$user = 'user_influencer';
$password = 'influencer';


// conecto con servidor y compruebo su error. 
$conexion = mysqli_connect($localhost,$user,$password);

if(mysqli_connect_errno()){

	echo "No pude realizar la conexión con el servidor";
 	exit();
 }

// seleccionamos la BBDD y se comprueba si es real. 
mysqli_select_db($conexion, 'crm_influencers') or die("no fue posible conectar con BBDD");

// se fijan la codificación.
mysqli_set_charset($conexion, 'utf8');


?>