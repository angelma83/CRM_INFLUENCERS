<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resultado búsqueda</title>
	<link rel="stylesheet" type="text/css" href="css/crm_influencers.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body>


<?php
include 'header.php';
include ('CrearLista.php');
include ('RegistroUsuarios.php');
?>

<a href="index.php"><button name="submit" type="button" id="volver" data-submit="sending">INICIO</button></a>
<a href="editarlista.php"><button name="submit" type="button" id="crearlista" data-submit="sending">EDITAR LISTA</button></a>

</body>
</html>