<?php

require_once '../../routes/RouteController.php';
require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';


$usuario = new Usuario();
$usuario->correo = $_POST['correo'];
$usuario->password = $_POST['password'];


if (!$usuario->existeUsuarioByEmail()) {
    enviarRespuesta('error', 'No existe este usuario');
    exit;
}


$usuario->obtenerPasswordHash();
if (!password_verify($usuario->password, $usuario->passwordHash)) {
    enviarRespuesta('error', 'Contraseña incorrecta');
    exit;
}


$datos = $usuario->obtenerDatos();

if (!$datos) {
    enviarRespuesta('error', 'No se han podido obtener los datos');
    exit;
}


session_start();

$_SESSION['usuario'] = [
    'id' => $datos['id_usuario'],
    'nombre' => $datos['nombre'],
    'correo' => $datos['correo'],
    'nivel' => $datos['nivel'],
    'telefono' => $datos['telefono']
];


$niveles = ['Administrador', 'Secretaria de Compras', 'Secretaria de Ventas', 'Tecnico', 'Cliente'];

foreach ($niveles as $nivel) {
    if ($datos['nivel']== $nivel) {
        echo json_encode(['status' => 'success', 'nivel' => $nivel]);
        exit;
    }
}

enviarRespuesta('error', 'No es un nivel de usuario valido');


?>
