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
// 2. textoMessage --> user al que se le manda y texto que se manda. 
//  3. se utiliza el metodo de búsqueda POST porque se ejecuta acción. 

// si estas siguiendo al usuario lo identifca con un 1, si no estas siguiendo a user, es un 0
// al mostrar en pantalla final habría que comprobar dicha información para dar opción a seguirle o no. 
// if $tweet['user']['following'] == 1, no hay opción a seguir o se muestra icono como que ya está haciendolo como en twitter; 
// esto se debe hacer al guardar el listado de usuarios. 
	
$seguirUser = array ( 'screen_name' => 'Lorena_lgp', 'follow' => "true");

// Utilizamos la API de Twitter para acceder al timeline de los usuarios.
//$url = "https://api.twitter.com/1.1/friendships/create.json";
//$requestMethod = 'POST';

// Se crea objeto a la clase donde se accede a twiiter y se pasan parámetros de búsqueda
// guardamos en variable ficheroJson, lo que nos expulsa twitter según los varialbes de búsqueda. 
$twitter = new TwitterAPIExchange($settings);
$ficheroJson = $twitter->setPostfields($seguirUser)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

echo $ficheroJson;
// decodificamos el fichero y lo guardamos en variable para ir accediendo a sus parámetros. 
$datosTwitter = json_decode($ficheroJson,TRUE);

echo "<br>";
echo "muestro datos ". $datosTwitter['following'];


// if ($datosTwitter['status'] as $seguimiento['following'] == true){


// 	echo "entro en esta siguiendo a lorena";
// }


echo $datosTwitter;
   
?>