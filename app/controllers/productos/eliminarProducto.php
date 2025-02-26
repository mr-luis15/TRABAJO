<?php


require_once '../../model/Productos.php';
require_once '../../helpers/validaciones.php';



if (empty($_POST['id'])) {
    enviarRespuesta('error', 'El ID no se ha recibido');
    exit;
}


$producto = new Producto();
$producto->setId($_POST['id']);





/**
 * 
 * Hacer una verificacion para eliminar las imagenes si se elimina el producto relacionado
 * con excepto default.jpg y las imagenes que son compartidas por varios productos
 * 
 */




 try {

    if ($producto->eliminar()) {
        enviarRespuesta('success', 'Se ha eliminado con exito');
        exit;
    }
    
} catch (Exception $e) {

    enviarRespuesta('error', 'No se ha eliminado. Hubo un error: ' . $e->getMessage());
    exit;
}
