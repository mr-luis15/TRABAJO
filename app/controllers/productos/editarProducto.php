<?php

require_once '../../model/Productos.php';
require_once '../../helpers/validaciones.php';


if (!validarDatosProductos($_POST, 'editar')) {
    enviarRespuesta('error', 'No se han recibido los datos');
    exit;
}


enviarRespuesta('success', 'Datos recibidos con exito');


?>