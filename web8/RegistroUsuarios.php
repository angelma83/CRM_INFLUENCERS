<?php
include('conexion.php');
include('IndexTwitter.php');


//echo "entramos en clase registro usuarios";
echo "<table width='80%'>";
  // recorremos fichero y obtenemos los datos de los usuarios. 
  foreach($datosTwitter['statuses'] as $tweet)
  {
    $nombreUsuario = addslashes($tweet['user']['name']);
    $idTwitter = addslashes($tweet['user']['screen_name']);
    $descripcion = addslashes($tweet['user']['description']);
    $followers = addslashes($tweet['user']['followers_count']);
    $localizacion = addslashes($tweet['user']['location']);
    $text = addslashes($tweet['text']);
    $enlacePerfil = addslashes("https://twitter.com/$idTwitter");
    $web = addslashes($tweet['user']['url']);
    $idStr = addslashes($tweet['id_str']);
    $enlacePublicacion = addslashes("https://twitter.com/$idTwitter/status/$idStr");
    $fecha = addslashes($tweet['crated_at']);


  echo "<tr>
    <td class='tr90'  width='170px'><a class='perfil' target='_blank' href='$enlacePerfil'>$idTwitter</a></td>
    <td class='tr80' width='170px'>$descripcion </td>
    <td class='tr70' width='170px'>$followers</td>
    <td class='tr60' width='170px'>$localizacion</td>
    <td class='tr50' width='170px'><a class='perfil' target='_blank' href='$enlacePublicacion'>$text</a></td>
    <td class='tr100'>$nombreUsuario</td>
    <td class='tr60' width='170px'><ul>
    <li>< class='twitter-follow-button' data-show-count='false'>Follow</a> </li>

  
  <li>mensaje directo</li></td>

    </tr>";



    $paso1 = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$idTwitter' AND red_social = '$redSocial') or die ('Error al buscar los usuarios en la tabla'");
    $filas = mysqli_num_rows($paso1);
    
   //Si el usuario no está registrado vuelve a empezar el bucle
  if ($filas==0){

    $consultaUsuarios = "SELECT * FROM $usuarios";
    $ejecucionUsuarios = mysqli_query($conexion, $consultaUsuarios); 
    mysqli_query($conexion, "INSERT INTO $usuarios (id_lista, red_social, usuario, bio, seguidores, texto, id_str, web, fecha, comunicacion) VALUES ('$idlista', $redSocial', $idTwitter', '$descripcion', '$followers', '$text', '$id_str', '$web', '$fecha', 'no')") or die ('Error en la conexión con la tabla usuarios');

    }
  }
    echo "</table>";
  // falta poner un if. 
  // header('Location:nohayresultados.php');
  // mysqli_close($conexion);


?>