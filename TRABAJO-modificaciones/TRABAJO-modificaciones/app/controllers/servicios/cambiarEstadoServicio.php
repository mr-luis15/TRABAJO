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


    try {

        if ($servicio->cambiarEstadoServicio($estado)) {

            echo json_encode(['status' => 'success', 'title' => 'Realizado', 'message' => 'Se ha marcado como realizado']);
            exit;
        }
    } catch (Exception $e) {

        enviarRespuesta('error', 'No se ha cambiado el estado. Hubo un error: ' . $e->getMessage());
        exit;
    }
}

if ($estado == "No realizado") {


    try {

        if ($servicio->cambiarEstadoServicio($estado)) {

            echo json_encode(['status' => 'success', 'title' => 'Marcado como No realizado', 'message' => 'Se ha marcado como No realizado']);
            exit;
        }
    } catch (Exception $e) {

        enviarRespuesta('error', 'No se ha cambiado el estado. Hubo un error: ' . $e->getMessage());
        exit;
    }
}
