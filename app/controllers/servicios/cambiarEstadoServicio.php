<?php

require_once '../../model/Servicios.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id'])) {
    
    enviarRespuesta('error', 'No se ha recibido el ID del servicio');
    exit;
}


$servicio = new Servicios();

$servicio->setId($_POST['id']);
$estado = $_POST['estado'];



if ($estado == "Realizado") {


    if ($servicio->cambiarEstadoServicio($estado)) {

        echo json_encode(['status' => 'success', 'title' => 'Realizado', 'message' => 'Se ha marcado como realizado']);
        exit;
    }
    
    enviarRespuesta('error', 'No ha cambiado el estado del servicio. Hubo un error');
    exit;
    
}

if ($estado == "No realizado") {

    if ($servicio->cambiarEstadoServicio($estado)) {
        
        echo json_encode(['status' => 'success', 'title' => 'Marcado como No realizado', 'message' => 'Se ha marcado como No realizado']);
        exit;
    }
    
    enviarRespuesta('error', 'No ha cambiado el estado del servicio. Hubo un error');
    exit;
    
}

?>