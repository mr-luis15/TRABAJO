<?php

require_once '../../model/Servicios.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id'])) {
    enviarRespuesta('error', 'No se ha recibido el ID del servicio');
    exit;
}

$servicio = new Servicios();
$servicio->setId($_POST['id']);


if ($servicio->eliminar()) {
    echo json_encode(['status' => 'success', 'title' => 'ELiminado', 'message' => 'Se ha eliminado el servicio']);
    exit;
} else {
    enviarRespuesta('error', 'No se ha eliminado. Hubo un error');
    exit;
}


?>