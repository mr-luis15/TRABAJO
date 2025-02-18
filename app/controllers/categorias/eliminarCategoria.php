<?php

require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id'])) {
    enviarRespuesta('error', 'No se ha recibido el ID');
    exit;
}


$cat = new Categorias();
$cat->setId($_POST['id']);


if (!is_numeric($cat->getId())) {
    enviarRespuesta('error', 'Este ID no es valido. Debe der un numero');
    exit;
}

if (!$cat->existeCategoriaById()) {
    enviarRespuesta('error', 'No existe una categoria con este ID');
    exit;
}

if ($cat->eliminar()) {
    enviarRespuesta('success', 'Se ha eliminado la categoria con exito');
    exit;
}

enviarRespuesta('error', 'Hubo un error. No se eliminó la categoria');
exit;



?>