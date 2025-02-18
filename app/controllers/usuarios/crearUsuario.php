<?php


session_start();

if ($_SESSION['usuario']['nivel'] != 'Administrador') {
    echo json_encode(['status' => 'error', 'message' => 'No tienes permitido hacer esta accion']);
}



require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosUsuario($_POST, 'crear')) {
    enviarRespuesta('error', 'No se han recibido todos los datos');
    exit;
}



$usuario = new Usuario();

$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->codigo = $_POST['codigo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = $_POST['nivel'];
$usuario->password = $_POST['password'];



//RECORDAR AGREGAR UN SCRIPT QUE CREE UNA CONTRASEÑA AL AZAR Y LUEGO LA ENVIÉ AL CORREO ELECTRONICO DADO POR EL USUARIO


//TAMBIEN RECORDAR HACER UNA ACCION PARA CAMBIAR LA CONTRASEÑA DEL USUARIO A SU GUSTO




if (!$usuario->esNivelValido()) {

    enviarRespuesta('error', 'El nivel de usuario no es valido');
    exit;
}




if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {

    enviarRespuesta('error', 'El correo no es valido');
    exit;
}




if ($usuario->existeUsuarioById()) {

    enviarRespuesta('error', 'Ya existe este usuario');
    exit;
}



if ($usuario->existeUsuarioByEmail()) {

    enviarRespuesta('error', 'Ya hay un usuario con este correo');
    exit;
}



if (strlen($usuario->telefono) != 10) {

    enviarRespuesta('error', 'El telefono debe tener 10 digitos');
    exit;
}



if (!esTelefonoValido($usuario->telefono)) {

    enviarRespuesta('error', 'El telefono solo puede contener numeros');
    exit;
}




if ($usuario->existeTelefono()) {

    enviarRespuesta('error', 'Este telefono ya esta registrado. Usa otro');
    exit;
}




$usuario->passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);




if (!$usuario->crear()) {

    enviarRespuesta('error', 'Ha habido un error. El usuario no se ha creado');
    exit;
} else {

    enviarRespuesta('success', 'Agregado con exito');
    exit;
}



?>
