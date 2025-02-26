<?php



require_once '../../model/Usuario.php';
require_once '../../helpers/validaciones.php';



if (!validarDatosCliente($_POST)) {
    enviarRespuesta('error', 'No se han recibido todos los datos');
    exit;
}


$usuario = new Usuario();

$usuario->nombre = $_POST['nombre'];
$usuario->correo = $_POST['correo'];
$usuario->telefono = $_POST['telefono'];
$usuario->nivel = 'Cliente';
$usuario->password = $_POST['password'];
$usuario->codigo = $_POST['codigo'];


if (!filter_var($usuario->correo, FILTER_VALIDATE_EMAIL)) {
    enviarRespuesta('error', 'El correo electronico no es valido');
    exit;
}


if ($usuario->existeUsuarioByEmail()) {
    enviarRespuesta('error', 'Este correo ya esta registrado');
    exit;
}


if (strlen($usuario->telefono) != 10) {
    enviarRespuesta('error', 'El telefono debe tener 10 digitos');
    exit;
}


if (!esTelefonoValido($usuario->telefono)) {
    enviarRespuesta('error', 'El telefono no es valido. Debe contener solo numeros');
    exit;
}


if ($usuario->existeTelefono()) {
    enviarRespuesta('error', 'Este telefono ya esta registrado');
    exit;
}


$usuario->passwordHash = password_hash($usuario->password, PASSWORD_BCRYPT);



try {

    if ($usuario->crear()) {

        enviarRespuesta('success', 'Bienvenido ' . $usuario->nombre . ' es un placer que te hayas registrado con nosotros');
        exit;
    
    }

} catch (Exception $e) {

    enviarRespuesta('error', 'No se ha registrar. Hubo un error: ' . $e->getMessage());
    exit;

}



?>