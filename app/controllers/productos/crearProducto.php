<?php

require_once '../../model/Productos.php';
require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


if (!validarDatosProductos($_POST, 'crear')) {

    enviarRespuesta('error', 'No se han recibido los datos');
    exit;
}


$producto = new Producto();
$categoria = new Categorias();

$categoria->setId($_POST['id_categoria']);

$producto->setId($_POST['id']);
$producto->setNombre($_POST['nombre']);
$producto->setDescripcion($_POST['descripcion']);
$producto->setStock($_POST['stock']);
$producto->setPrecio($_POST['precio']);
$producto->setCategoria($_POST['id_categoria']);
$producto->setEstado($_POST['estado']);


//HACER UNA VALIDACION QUE MARQUE EL ESTADO COMO NO DISPONIBLE SI EL STOCK ES 0 Y RETORNARLO EN EL MENSAJE

/*
if ($producto->getPrecio() < 0 || $producto->getStock() < 0) {
    enviarRespuesta('error', 'El precio y el stock no pueden ser nagativos. El valor minimo es cero.');
    exit;   
}


if ($producto->getStock() == 0) {
    $producto->setEstado('No disponible');
}
    */


if (!$categoria->existeCategoriaById()) {

    enviarRespuesta('error', 'Esta categoria no existe');
    exit;
}


if ($producto->existeProductoByNombre()) {

    enviarRespuesta('error', 'Ya hay un producto con este nombre. Tienes que usar otro');
    exit;
}


if ($producto->crear()) {
    
    enviarRespuesta('success', 'Se ha agregado con exito');
    exit;

} else {

    error_log("Error al modificar el servicio: " . json_encode($servicio));
    enviarRespuesta('error', 'No se ha agregado el producto');
    exit;
}
