<?php
session_start();
include 'datosFormulario.php';
if ($redSocial=="Twitter"){
	include 'rastreoTwitter.php';
	include 'guardarBbdd.php';
}else{
    echo "Estás introduciendo una red social no indexada";
  } 
?>