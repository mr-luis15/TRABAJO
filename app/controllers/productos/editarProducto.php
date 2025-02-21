<?php

require_once '../../model/Productos.php';
require_once '../../helpers/validaciones.php';


if (!validarDatosProductos($_POST, 'editar')) {
    enviarRespuesta('error', 'No se han recibido los datos');
    exit;
}


//enviarRespuesta('success', 'Datos recibidos con exito');

$producto = new Producto();

$producto->setId($_POST['id']);
$producto->setNombre($_POST['nombre']);
$producto->setDescripcion($_POST['descripcion']);
$producto->setPrecio($_POST['precio']);
$producto->setStock($_POST['stock']);
$producto->setEstado($_POST['estado']);
$producto->setCategoria($_POST['id_categoria']);


//HACER UNA VALIDACION QUE MARQUE EL ESTADO COMO NO DISPONIBLE SI EL STOCK ES 0 Y RETORNARLO EN EL MENSAJE


$resultado = $producto->obtenerProductoById();


if ($resultado['nombre'] != $producto->getNombre()) {
    if ($producto->existeProductoByNombre()) {
        enviarRespuesta('error', 'Ya hay un producto con este nombre');
    }
}


if ($producto->editar()) {
    enviarRespuesta('success', 'Se ha modificado con exito');
    exit;
}

enviarRespuesta('error', 'No se ha modificado. Hubo un error');

?>