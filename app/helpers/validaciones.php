<?php



/**
 * 
 * @param String $status El estatus de la respuesta que queremos devolver
 * @param String $el mensaje que queremos devolver al frontend
 * 
 */


function enviarRespuesta($status, $mensaje)
{

    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'message' => $mensaje]);
    exit;
}


/**
 * Esta funcion comprueba si los caracteres del telefono son todos caracteres numericos y no de otro tipo
 * 
 * @param String $numeros_telefono El arreglo de caracteres que queremos verificar si cumple con los caracteres validos pars almacenarse en la base de datos
 * 
 */


//Funcion para verificar si el telefono contiene caracteres validos (numeros)
function esTelefonoValido($numeros_telefono)
{

    $numeros = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $telefono = str_split($numeros_telefono);

    foreach ($telefono as $num) {

        if (!in_array($num, $numeros))
            return false;
    }

    return true;
}


/**
 * 
 * @param String $accion Es la accion que realizara la funcion para saber si veririficar el estado del id o el estado
 * 
 * 
 */

function validarDatosServicios($data, $accion)
{

    if ($accion == 'editar') {

        // Verificamos si se pasó el id y si es válido
        if (!isset($data['id']) || empty($data['id'])) {
            return false;
        }
        
        if (!isset($data['estado']) || empty($data['estado'])) {
            return false;
        }
    }


    $camposRequeridos = ['cliente', 'tecnico', 'direccion', 'descripcion', 'fecha'];
    foreach ($camposRequeridos as $campo) {
        if (empty($data[$campo])) {
            return false;
        }
    }
    return true;
}



function validarDatosUsuario($data, $accion)
{

    if ($accion == 'editar') {

        // Verificamos si se pasó el id y si es válido
        if (!isset($data['id']) || empty($data['id'])) {
            return false;
        }
    }

    if ($accion == 'crear') {

        if (!isset($data['password']) || empty($data['password'])) {
            return false;
        }

    }

    $camposRequeridos = ['nombre', 'correo', 'telefono', 'nivel', 'codigo'];
    foreach ($camposRequeridos as $campo) {
        if (empty($data[$campo])) {
            return false;
        }
    }
    return true;

    
}


function validarDatosCliente($data) {

    $camposRequeridos = ['nombre', 'correo', 'telefono', 'password', 'codigo'];
    foreach ($camposRequeridos as $campo) {
        if (empty($data[$campo])) {
            return false;
        }
    }

    return true;
}

function validarDatosCategoria($data, $accion) {

    if ($accion == 'editar') {

        if (!isset($data['id']) || empty($data['id'])) {
            return false;
        }

    }

    $camposRequeridos = ['nombre', 'descripcion'];
    foreach ($camposRequeridos as $campo) {
        if (empty($data[$campo])) {
            return false;
        }
    }

    return true;

}

function numeroProductosIsNull($numeroProductos) {

    if ($numeroProductos == NULL) {

        return $numeroProductos = 0;
    }

    return $numeroProductos;

}