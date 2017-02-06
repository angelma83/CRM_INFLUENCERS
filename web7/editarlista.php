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
include 'conexion.php';
$nombreLista = $_SESSION['nombreLista'];
$paso = mysqli_query($conexion, "SELECT * FROM $nombreLista") or die ('Error al buscar la tabla en la base de datos');
$filasLista = mysqli_num_rows($paso) or die ("No se han caclulado las filas de la lista");
?>

<table class="col-md-12"><thead>
	<th class='tr100' width='170px'><b>Nombre usuario</b></th>
	<th class='tr90' width='170px'><b>ID Twitter</b></th>
	<th class='tr80' width='170px'><b>Descripcion</b></th>
	<th class='tr70' width='170px'><b>Seguidores</b></th>
	<th class='tr60' width='170px'><b>Localidad</b></th>
	<th class='tr50' width='170px'><b>Publicación</b></th>
	<th class='tr50' width='170px'><b>Contacto</b></th>
	</thead>
</table>



<?php
echo "<table>";
for ($i=0; $i<$filasLista ; $i++) { 
	$nombreUsuario = mysqli_query("SELECT nombre FROM $nombreLista"); 
	$idTwitter = mysqli_query("SELECT usuario FROM $nombreLista");
	$descripcion = mysqli_query("SELECT bio FROM $nombreLista");
	$seguidores = mysqli_query("SELECT seguidores FROM $nombreLista");
	$localidad = mysqli_query("SELECT localidad FROM $nombreLista");
	$texto = mysqli_query("SELECT texto FROM $nombreLista");
	$enlacePublicacion = mysqli_query("SELECT enlace_publicacion FROM $nombreLista");
	$web = mysqli_query("SELECT web FROM $nombreLista");
	$enlacePerfil = mysqli_query("SELECT enlace_perfil FROM $nombreLista");
	$contacto = mysqli_query("SELECT contacto FROM $nombreLista");
	$usuarioTwitter = "<a href='http://twitter.com/$idTwitter' target='_blank'>$idTwitter</a>";
	$publicacion = "<a href='$enlacePublicacion' target='_blank'>$texto</a>";
	
	echo "<tr>
    <td class='tr90'  width='170px'>$nombreUsuario</td>
    <td class='tr80' width='170px'>$usuarioTwitter</td>
    <td class='tr70' width='170px'>$descripcion</td>
    <td class='tr60' width='170px'>$seguidores</td>
    <td class='tr50' width='170px'>$localidad</td>
    <td class='tr50' width='170px'>$publicacion</td>
    <td class='tr50' width='170px'>$contacto</td>
    </tr>";
}
	echo "</table>";

?>

<div class="acciones_lista">
	<a href="index.php"><button name="submit" type="button" id="volver" data-submit="sending">DESCARTAR</button></a>
	<a href="listaeditada.php"><button name="submit" type="button" id="crearlista" data-submit="sending">GUARDAR</button></a>
</div>
</body>
</html>