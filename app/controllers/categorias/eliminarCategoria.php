<?php

require_once '../../model/Categorias.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id'])) {
    enviarRespuesta('error', 'No se ha recibido el ID');
    exit;
}








?>