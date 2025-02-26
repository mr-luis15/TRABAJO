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
if ($producto->getPrecio() <= 0 || $producto->getStock() < 0) {
    enviarRespuesta('error', 'El valor del precio o del stock no estan permitidos. Solo numeros mayores a cero');
    exit;   
}




$estado = ($producto->getStock() == 0) ? 'No disponible' : 'Disponible';
$producto->setEstado($estado);



$resultado = $producto->obtenerProductoById();

//Verificamos si el nombre a modificar es igual al del mismo producto
if ($resultado['nombre'] != $producto->getNombre()) {
    if ($producto->existeProductoByNombre()) {
        enviarRespuesta('error', 'Ya hay un producto con este nombre');
    }
}

// Si no se ha cambiado la categoria, se cambia por NULL
if ($producto->getCategoria() == 'No asignada' || $producto->getCategoria() == NULL) {
    $producto->setCategoria(NULL);
}



try {

    if ($producto->editar()) {
        enviarRespuesta('success', 'Se ha modificado con exito');
        exit;
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'No se ha modificado. Hubo un error : ' . $e->getMessage());
    exit;

}


?>