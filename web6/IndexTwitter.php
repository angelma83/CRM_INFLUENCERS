<?php


include ("TwitterAPIExchange.php");


// meto la configuracion de la app que se creo en twitter para poder acceder a sus datos. 
$settings = array(
    'oauth_access_token' => "77177045-7zhQGPaiiSQln2TQ6ipyxgL3AV0OzEzvR5WC0Y8kq",
    'oauth_access_token_secret' => "fGYKUawmzPU8yeTRx2tcB8jzi0rDNrEYHorYVQaPNk3rg",
    'consumer_key' => "sqLEuKj4g4w9o1OdLoz5XIuwZ",
    'consumer_secret' => "IfgvhHzgu0pT7qTYBmaPy1rs7kucObP4fUqwYNOxq6TJHy3RTc");

// configuro el metodo de acceso y la info que voy a seleccionar. 
// 1. url --> recurso que se quiere consultar.
// 2. palabraClave --> tendencia que se debe buscar
//  3. se utiliza el metodo de búsqueda GET porque es como twitter devuelve los cambios. 

// Se hace la comprobación del parámetro que nos pasan, # --> %23, @ --> %40 espacio en blanco --> %20 o +

$hashtag = '#';
$arroba = '@';

 $palabraClave=$_SESSION['palabraClave'];

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

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = 'GET';

// Se crea objeto a la clase donde se accede a twiiter y se pasan parámetros de búsqueda
// guardamos en variable ficheroJson, lo que nos expulsa twitter según los varialbes de búsqueda. 
$twitter = new TwitterAPIExchange($settings);
$ficheroJson = $twitter->setGetfield($palabraClave)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

//echo $ficheroJson;
// decodificamos el fichero y lo guardamos en variable para ir accediendo a sus parámetros. 
$datosTwitter = json_decode($ficheroJson,TRUE);

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

    echo "<table>";
    echo "<tr class='tr100'><td><b>Nombre usuario<b></td> <td>$nombreUsuario</td></tr>";
    echo "<tr class='tr90'><td><b>ID Twitter<b></td> <td><a href='$enlacePerfil'>$idTwitter</a></td></tr>";
    echo "<tr class='tr80'><td><b>Descripcion<b></td> <td>$descripcion </td></tr>";
    echo "<tr class='tr70'><td><b>Seguidores<b></td> <td>$followers</td></tr>";
    echo "<tr class='tr60'><td><b>Localidad<b></td> <td>$localizacion</td></tr>";
    echo "<tr class='tr50'><td><b>Texto<b></td> <td>$text</td></tr>";
   // echo "Enlace perfil: $enlacePerfil";
    //echo "Fecha creación: $fechaCreacion <br />";
    echo "<br><br/>";
    echo "</table>";

}
//     //Registro usuarios

//     //Comprobamos el número de usuarios a través de las filas de la tabla
    

?>