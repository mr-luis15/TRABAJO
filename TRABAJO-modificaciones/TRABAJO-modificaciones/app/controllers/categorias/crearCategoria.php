<?php



session_start();


require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


if (!validarDatosCategoria($_POST, 'crear')) {

    enviarRespuesta('error', 'No se han recibido todos los datos');
    exit;
}


$cat = new Categorias();

$cat->setNombre($_POST['nombre']);
$cat->setDescripcion($_POST['descripcion']);


if ($cat->existeCategoriaByNombre()) {
    enviarRespuesta('error', 'Ya hay una categoria con este nombre. usa otro');
    exit;
}



try {

    if ($cat->crear()) {

        enviarRespuesta('success', 'La categoria ' . $cat->getNombre() . ' se ha agragado con exito.');
        exit;
    
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'Ha habido un error. No se  ha agregado. Error: ' . $e->getMessage());
    exit;

}



?>