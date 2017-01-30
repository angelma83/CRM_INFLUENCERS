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
// // 2. palabraClave --> tendencia que se debe buscar
//  3. se utiliza el metodo de búsqueda GET porque es como twitter devuelve los cambios. 
$palabraClave = $_POST['keyword'];
$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = 'GET';


 // $palabraClave = '?screen_name=angelma83';
 // $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
 // $requestMethod = 'GET';

// creo objeto a la clase donde se accede a twiiter. 
// pasamos los parámetros con lo que queremos hcer la búsqueda. 
// guardamos en variable ficheroJson, lo que nos expulsa twitter según los varialbes de búsqueda. 
$twitter = new TwitterAPIExchange($settings);
$ficheroJson = $twitter->setGetfield($palabraClave)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

echo $ficheroJson;
// decodificamos el fichero y lo guardamos en variable para ir accediendo a sus parámetros. 
$datosTwitter = json_decode($ficheroJson,TRUE);

// recorremos fichero y obtenemos los datos de los usuarios. 
foreach($datosTwitter['statuses'] as $tweet)
{
  $nombreUsuario = $tweet['user']['name'];
  $idTwitter = $tweet['user']['screen_name'];
  $descripcion = $tweet['user']['description'];
  $seguidores = $tweet['user']['followers_count'];
  $localidad = $tweet['user']['location'];
  $text = $tweet['text'];
  $fechaCreacion = $tweet['created_at'];
 
  echo "<br>";
  echo "$nombreUsuario <br />";
  echo "$idTwitter <br />";
  echo "$descripcion <br />";
  echo "$seguidores <br />";
  echo "$localidad <br />";
  echo "$text <br />";
  echo "$fechaCreacion <br />";
  echo "<br>";
}
?>