<?php

session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel'] != 'Administrador') {

    echo json_encode(['status' => 'error', 'message' => 'No tienes permiso para realizar esta acción']);
    exit;
}


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