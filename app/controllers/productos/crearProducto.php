<?php

require_once '../../model/Productos.php';
require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosProductos($_POST, 'crear')) {
    enviarRespuesta('error', 'No se han recibido los datos correctamente.');
    exit;
}


$producto = new Producto();
$categoria = new Categorias();


$categoria->setId($_POST['id_categoria']);
$producto->setNombre($_POST['nombre']);
$producto->setDescripcion($_POST['descripcion']);
$producto->setStock($_POST['stock']);
$producto->setPrecio($_POST['precio']);
$producto->setCategoria($_POST['id_categoria']);



if ($producto->getPrecio() < 0 || $producto->getStock() < 0) {
    enviarRespuesta('error', 'El precio y el stock no pueden ser negativos. El valor mínimo es cero.');
    exit;
}


if (!is_numeric($producto->getPrecio()) || !is_numeric($producto->getStock())) {
    enviarRespuesta('error', 'Tanto el precio como el stoc deben ser valores numericos');
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



//AQUI HAREMOS LA LOGICA DE LAS IMAGENES Y LAS RUTAS

$dir = "../uploaded_images/";

if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {


    $nombreImagen = $_FILES['foto']['name'];
    $tipoImagen = $_FILES['foto']['type'];
    $tmp_name = $_FILES['foto']['tmp_name'];




    //Aqui varificamos si la imagen es de tipo jpg, png o jpeg
    $tipos_permitidos = array('image/jpg', 'image/png', 'image/jpeg');

    if (!in_array($tipoImagen, $tipos_permitidos)) {
        enviarRespuesta('error', 'No es una imagen del tipo aceptado');
        exit;
    }



    //Verificar si existe una imagen con ese nombre elejido
    $ruta = "../../views/uploaded_images/";
    $bandera = false;


    //Obtenemos un array donde obtenemos los nombres d elos archivos de uploaded_images
    $archivos = scandir($ruta);

    //Comparamos y si la imagen actual tiene el mismo nombre que una ya insertada, no se insertara
    foreach ($archivos as $arc) {
        if ($arc == $nombreImagen) {
            $bandera = true;
            break;
        }
    }


    if (!$bandera) {

        //Si no encontramos una imagen con el mismo nombre, intentamos mover la imagen actual a la carpetta de upload_images
        $destino = "../../views/uploaded_images/" . basename($nombreImagen);

        if (!move_uploaded_file($tmp_name, $destino)) {
            //$error = error_get_last();
            //enviarRespuesta('error', 'No se pudo mover la imagen al directorio destino. Error: ' . $error['message']);
            enviarRespuesta('error', 'No se pudo mover la imagen al directorio destino.');
            exit;
        }
    }


    //Independientemente de si se agrego o no la imagen, se inserta la ruta
    $rutaImagen = $dir . basename($nombreImagen);
    $producto->setImage($rutaImagen);

} else {

    $producto->setImage($dir . 'default.jpg');

}




try {

    if ($producto->crear()) {
        enviarRespuesta('success', 'El producto '.$producto->getNombre().' se ha agregado con éxito.');
        exit;
    }
    
} catch (Exception $e) {

    enviarRespuesta('error', 'Se ha producido un error: ' . $e->getMessage());
    exit;
}
