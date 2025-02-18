<?php

require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


if (!validarDatosCategoria($_POST, 'editar')) {
    enviarRespuesta('error', 'Este ID no es valido');
    exit;
}

$categoria = new Categorias();

$categoria->setId($_POST['id']);
$categoria->setNombre($_POST['nombre']);
$categoria->setDescripcion($_POST['descripcion']);


if (!$categoria->existeCategoriaById()) {
    enviarRespuesta('erro', 'No existe una categoria con este ID');
    exit;
}


//Encontrar la forma de hacer que solo detecte el nombre repetido de otra categoria y no de la que se está modificando
$resultado = $categoria->obtenerCategoriaById();
foreach ($resultado as $datos) {

    if ($categoria->getNombre() != $datos['nombre']) {

        if ($categoria->existeCategoriaByNombre()) {
            enviarRespuesta('error', 'Ya hay una categoria con este nombre. Usa otro Porfavor');
            exit;
        }
    }

}


if (strlen($categoria->getDescripcion()) > 255) {
    enviarRespuesta('erro', 'La descripcion debe tener menos de 255 caracteres');
    exit;
}


if ($categoria->editar()) {
    enviarRespuesta('success', 'Se ha modificado la categoria ' . $categoria->getNombre());
    exit;

} else {

    enviarRespuesta('error', 'No se ha modificado. Hubo un error');
    exit;

}




?>