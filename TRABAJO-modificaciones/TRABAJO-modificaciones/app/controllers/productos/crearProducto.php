<?php

require_once '../../model/Productos.php';
require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


// Validar que los datos sean correctos antes de proceder
if (!validarDatosProductos($_POST, 'crear')) {
    enviarRespuesta('error', 'No se han recibido los datos correctamente.');
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


if ($producto->getPrecio() < 0 || $producto->getStock() < 0) {
    enviarRespuesta('error', 'El precio y el stock no pueden ser negativos. El valor mínimo es cero.');
    exit;   
}


$estado = ($producto->getStock() == 0) ? 'No disponible' : 'Disponible';
$producto->setEstado($estado);


// Verificar si la categoría existe
if (!$categoria->existeCategoriaById()) {
    enviarRespuesta('error', 'La categoría seleccionada no existe.');
    exit;
}


if ($producto->existeProductoByNombre()) {
    enviarRespuesta('error', 'Ya existe un producto con este nombre. Debes elegir otro.');
    exit;
}


try {

    if ($producto->crear()) {
        enviarRespuesta('success', 'El producto se ha agregado con éxito.');
        exit;
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'Se ha producido un error: ' . $e->getMessage());
    exit;
}
