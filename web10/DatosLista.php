 <?php
// Acceso a los parámetros del formulario de entrada y que se deben incluir en la lista
$_SESSION['nombreLista'] = $_POST['lista'];
$_SESSION['palabraClave'] = $_POST['keyword'];
$_SESSION['redSocial'] = $_POST['rrss'];
$_SESSION['seguidoresMinimos'] = $_POST['seguidores'];
$_SESSION['localidad'] = $_POST['ciudad'];
$_SESSION['idioma'] = $_POST['idioma'];
 ?>