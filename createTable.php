<?php

include ("TwitterAPIExchange.php");

// Acceso a los parámetros del formulario de entrada
$nombreLista = $_POST['lista'];
$palabraClave = $_POST['keyword'];
$redSocial = $_POST['rrss'];
$seguidoresMinimos = $_POST['seguidores'];
$localidad = $_POST['localizacion'];

if ($redSocial=="Twitter"){
  // meto la configuracion de la app que se creo en twitter para poder acceder a sus datos. 
  $settings = array(
      'oauth_access_token' => "77177045-7zhQGPaiiSQln2TQ6ipyxgL3AV0OzEzvR5WC0Y8kq",
      'oauth_access_token_secret' => "fGYKUawmzPU8yeTRx2tcB8jzi0rDNrEYHorYVQaPNk3rg",
      'consumer_key' => "sqLEuKj4g4w9o1OdLoz5XIuwZ",
      'consumer_secret' => "IfgvhHzgu0pT7qTYBmaPy1rs7kucObP4fUqwYNOxq6TJHy3RTc");

  // configuro el metodo de acceso y la info que voy a seleccionar. 
  // 1. url --> recurso que se quiere consultar.
  // // 2. palabraClave --> tendencia que se debe buscar
  //  3. se utiliza el metodo de búsqueda GET porque es como twitter devuelve los cambios. 


  // Se hace la comprobación del parámetro que nos pasan. 
  // # --> %23
  // @ --> %40
  // espacio en blanco --> %20 o +

  $hashtag = '#';
  $arroba = '@';

  if (substr($palabraClave, 0,0) === $hashtag){
    $palabraClave='?q=%23'.$palabraClave;
  } else{
    if (substr($palabraClave, 0,0) === $arroba){
  $palabraClave='?q=%40'.$palabraClave;
    } else {
    $palabraClave='?q='.$palabraClave;
  }
  }


  // Utilizamos la API de Twitter para acceder al timeline de los usuarios.
  //$palabraClave = '?q=%23UltimoDiaSuma';
  $url = "https://api.twitter.com/1.1/search/tweets.json";
  $requestMethod = 'GET';


   //$palabraClave = '?screen_name=angelma83';
   // $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
   // $requestMethod = 'GET';

  // creo objeto a la clase donde se accede a twiiter. 
  // pasamos los parámetros con lo que queremos hcer la búsqueda. 
  // guardamos en variable ficheroJson, lo que nos expulsa twitter según los varialbes de búsqueda. 
  $twitter = new TwitterAPIExchange($settings);
  $ficheroJson = $twitter->setGetfield($palabraClave)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

  //echo $ficheroJson;
  // decodificamos el fichero y lo guardamos en variable para ir accediendo a sus parámetros. 
  $datosTwitter = json_decode($ficheroJson,TRUE);



  //Conexion base de datos 
  $conexion=  new mysqli('localhost', 'user_influencer', 'influencer', 'crm_influencers'); 
  if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  mysqli_select_db ($conexion, 'crm_influencers') or die ('No se puede hacer la conexion');

  //Registro listas, sólo se guarda si el nombre de la lista no existe
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
      echo "Error al crear la tabla". mysqli_error($conexion);
    }


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

      echo "<br><br/>";
      echo "Nombre usuario: $nombreUsuario <br />";
      echo "ID Twitter: $idTwitter <br />";
      echo "Descripcion: $descripcion <br />";
      echo "Seguidores: $followers <br />";
      echo "Localidad: $localidad <br />";
      echo "Texto: $text <br />";
      echo "Enlace perfil: $enlacePerfil";
      //echo "Fecha creación: $fechaCreacion <br />";
      echo "<br><br/>";


      
      //Registro usuarios

      //Comprobamos el número de usuarios a través de las filas de la tabla
      
      $paso1 = mysqli_query($conexion, "SELECT * FROM $nombreLista WHERE usuario = '$idTwitter'") or die ('Error al buscar los usuarios en la tabla');
      $filas = mysqli_num_rows($paso1);

      //Si el usuario no está registrado vuelve a empezar el bucle
      if ($filas==0){
        //Limitamos el número de seguidores a los que se indiquen en el formulario
        if ($followers>$seguidoresMinimos){
          $consultaUsuarios = "SELECT * FROM $nombreLista";
          $ejecucionUsuarios = mysqli_query($conexion, $consultaUsuarios);
          mysqli_query($conexion, "INSERT INTO $nombreLista (nombre, usuario, bio, seguidores, localidad, texto, enlace_publicacion, web, enlace_perfil) VALUES ('$nombreUsuario', '$idTwitter', '$descripcion', '$followers', '$localizacion', '$text', '$enlacePublicacion', '$web', '$enlacePerfil')") or die ('Error en la conexión con la tabla usuarios');
        }
        //echo "<br>Usuario guardado en la base de datos";
        
      } else{
        //echo "El usuario ya está registrado";
      }
    }
    mysqli_close($conexion);
  }else{ 
    echo "El nombre de la lista ya existe, selecciona otro nombre";
    include ('index.php');
  }
}else{
  echo "Estás introduciendo una red social no indexada";
}  
?>