<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['nivel'] != 'Administrador') {

    enviarRespuesta('error', 'No tienes permiso para realizar esta accion');
    exit;
}


require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosUsuario($_POST, 'editar')) {

    enviarRespuesta('error', 'No se han recibido todos los datos');
    exit;
}



$usuario = new Usuario();

$usuario->setId($_POST['id']);
$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->codigo = $_POST['codigo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = $_POST['nivel'];



if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    enviarRespuesta('error', 'Este correo no es valido');
    exit;
}


if (strlen($usuario->telefono) != 10) {
    enviarRespuesta('error', 'EL telefono debe tener 10 digitos');
    exit;
}

if (!esTelefonoValido($usuario->telefono)) {
    enviarRespuesta('error', 'El telefono debe contener solo numeros');
    exit;
}


$resultado = $usuario->obtenerUsuarioById();
foreach ($resultado as $datos) {

    if ($_SESSION['usuario']['id'] === $datos['id_usuario']) {
        enviarRespuesta('error', 'No puedes modificar tu propia cuenta');
        exit;
    }


    if ($usuario->correo != $datos['correo']) {
        if ($usuario->existeUsuarioByEmail()) {
            enviarRespuesta('error', 'Ya hay un usuario con este correo');
            exit;
        }
    }


    if ($usuario->telefono != $datos['telefono']) {
        if ($usuario->existeTelefono()) {
            enviarRespuesta('error', 'Este telefono ya esta registrado. Prueba con otro');
            exit;
        }
    }
}


if (!$usuario->esNivelValido()) {
    enviarRespuesta('error', 'Este nivel de usuario no es valido');
    exit;
}


if ($usuario->editar()) {

    echo json_encode(['status' => 'success', 'nivel' => $usuario->nivel, 'message' => 'El usuario ' . $usuario->nombre . ' se ha modificado con exito']);
    exit;
} else {
    enviarRespuesta('success', 'Ha habido un error. No se  modificó el usuario');
}
