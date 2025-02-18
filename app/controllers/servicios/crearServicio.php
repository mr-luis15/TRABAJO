<?php

session_start();

require_once '../../model/Servicios.php';
require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosServicios($_POST, 'crear')) {
    enviarRespuesta('error', 'No se han recibido todos los datos');
    exit;
}



$servicio = new Servicios();
$usuario = new Usuario();

$servicio->setCliente($_POST['cliente']);
$servicio->setTecnico($_POST['tecnico']);
$servicio->setDescripcion($_POST['descripcion']);
$servicio->setDireccion($_POST['direccion']);
$servicio->setFecha($_POST['fecha']);
$servicio->setEstado("No realizado");


if (!$usuario->existeClienteById($servicio->getCliente()) || !$usuario->existeTecnicoById($servicio->getTecnico())) {
    
    enviarRespuesta('error', 'No existe este cliente o tecnico');
    exit;
}


if (strlen($servicio->getDescripcion()) > 255) {
    enviarRespuesta('error', 'La descripcion debe tener menos de 255 caracteres');
    exit;
}


if ($servicio->crear()) {
    enviarRespuesta('success', 'Se ha agregado un nuevo servicio');
    exit;
}

enviarRespuesta('error', 'No se ha agregado el servicio');
