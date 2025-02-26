<?php

session_start();

require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';


if (empty($_POST['id'])) {

    enviarRespuesta('error', 'No se ha recibido el ID del usuario');
    exit;
}


$usuario = new Usuario();
$usuario->setId($_POST['id']);


if ($_SESSION['usuario']['id'] == $usuario->getId()) {

    enviarRespuesta('error', 'No puedes eliminar tu propia cuenta');
    exit;
}


//HACER UNA CONDICIONAL PARA ASEGURARNOS DE QUE SI SOLO HAY 1 ADMINISTRADOR, NO SE PUEDA


if (!$usuario->existeUsuarioById()) {

    enviarRespuesta('error', 'Este usuario no existe');
    exit;
}


try {

    if ($usuario->eliminar()) {

        enviarRespuesta('success', 'Se ha eliminado con exito');
        exit;
    
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'No se ha eliminado el usuario. Hubo un error: ' . $e->getMessage());
    exit;

}