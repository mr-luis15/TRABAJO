<?php


require_once '../../model/Productos.php';
require_once '../../helpers/validaciones.php';

if (empty($_POST['id'])) {
    enviarRespuesta('error', 'El ID no se ha recibido');
    exit;
}


$producto = new Producto();
$producto->setId($_POST['id']);


if ($producto->eliminar()) {
    enviarRespuesta('success', 'Se ha eliminado con exito');
    exit;

} else {
    enviarRespuesta('error', 'No se ha eliminado');
    exit;
}



?>