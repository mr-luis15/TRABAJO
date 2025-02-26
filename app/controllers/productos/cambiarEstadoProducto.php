<?php

require_once '../../model/Productos.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id']) && !is_numeric($_POST['id'])) {
    enviarRespuesta('error', 'Este ID no es valido');
    exit;
}


$producto = new Producto();
$producto->setId($_POST['id']);


if (!$producto->existeProductoById()) {
    enviarRespuesta('error', 'No existe un producto con este ID');
    exit;
}






?>