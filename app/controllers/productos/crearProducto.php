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


//AQUI HAREMOS LA LOGICA DE LAS IMAGENES Y LAS RUTAS

$upload_dir = "../../views/uploaded_images";



// Verifica si se ha cargado un archivo
if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
    $file = $_FILES['foto'];
    $tipo_imagen = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $tipos_permitidos = ['jpg', 'jpeg', 'png'];

    // Verifica si el tipo de archivo es permitido
    if (in_array($tipo_imagen, $tipos_permitidos)) {
        $new_file_name = "../uploaded_images/" . $producto->getNombre() . "_img." . $file_type;
        $file_path = $upload_dir . "/" . $new_file_name;

        // Mueve el archivo a la carpeta de destino
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            $producto->setImage($new_file_name); // Guarda el nombre de la imagen
        } else {
            enviarRespuesta('error', 'Error al subir la imagen: ' . $file['name']);
            exit;
        }
    } else {
        enviarRespuesta('error', 'Tipo de archivo no permitido: ' . $file['name']);
        exit;
    }
} else {
    // Si no se subió una imagen, puedes asignar un valor predeterminado o no hacer nada.
    $producto->setImage('uploaded_images/default.jpg'); // Imagen predeterminada si no se sube ninguna
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
