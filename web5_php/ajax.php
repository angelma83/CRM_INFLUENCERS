<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'descartar':
            descartar();
            break;
        case 'submit':
            submit();
            break;
    }
}

function submit() {
    
    $conexion=  new mysqli('localhost', 'user_influencer', 'influencer', 'crm_influencers'); 
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_select_db ($conexion, 'crm_influencers') or die ('No se puede hacer la conexion');
    $mostrarLista = mysqli_query($conexion, "SELECT * FROM listas WHERE nombre_lista = '$nombre_lista'");
    echo "$mostrarLista";
    exit;
}

function descartar() {
    echo "The insert function is called.";
    exit;
}
?>