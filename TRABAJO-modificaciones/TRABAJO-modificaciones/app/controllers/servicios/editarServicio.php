<?php


require_once '../../model/Servicios.php';
require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosServicios($_POST, 'editar')) {

    enviarRespuesta('error', 'No se han recibido todos los tados');
    exit;
}


/**
 * 
 * 
 * Nota: no comentar o dejar este print_r($_POST) en el codigo genera un problema al momento 
 * de devolver la respuesta json al frontend aparentemente porque devuelve los datos del array 
 * POST
 * 
 * 
 * */

 
//print_r($_POST);

$servicio = new Servicios();

$usuario = new Usuario();

$servicio->setId($_POST['id']);
$servicio->setCliente($_POST['cliente']);
$servicio->setTecnico($_POST['tecnico']);
$servicio->setEstado($_POST['estado']);
$servicio->setDescripcion($_POST['descripcion']);
$servicio->setDireccion($_POST['direccion']);
$servicio->setFecha($_POST['fecha']);



if (!$servicio->existeServicioById()) {
    enviarRespuesta('error', 'No existe este servicio');
    exit;
}



if (!$usuario->existeTecnicoById($servicio->getTecnico())) {

    if ($servicio->getTecnico() == "No asignado") {
        $servicio->setTecnico(NULL);

    } else {

        enviarRespuesta('error', 'No existe este tecnico');
        exit;
    }

}

//Recordar hacer una verificacion para saber si el cliente y tecnico existen y tienen el nivle de usuario que se espera de ellos
if (!$usuario->existeClienteById($servicio->getCliente())) {

    enviarRespuesta('error', 'No existe este cliente');
    exit;

}



try {

    if ($servicio->editar()) {

        enviarRespuesta('success', 'El servicio se ha modificado con exito');
        exit;
    
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'No se ha modificaro. Hubo un error: ' . $e->getMessage());
    exit;

}





?>