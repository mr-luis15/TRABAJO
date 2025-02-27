<?php

/**
 * 
 * @param Array $niveles Este array contiene los niveles de usuario que estan permitidos en cada vista
 * @return Class Si no está definido el nivel de usuario o no se encuentra en los niveles permitidos
 *               retorna una funcion estatica que redirige a un mensaje de Error
 * 
 */

function nivelesPermitidos($niveles)
{
    $nivel = $_SESSION['usuario']['nivel'];

    if (empty($nivel) || !in_array($nivel, $niveles)) {
        Route::msg('Error');
        exit;
    }
}


class Route
{

    //Ruta de vista a controlador
    public static function user($file)
    {
        return "../../controllers/usuarios/" . $file . ".php";
    }


    //Ruta para controladores de productos
    public static function product($file)
    {
        return "../../controllers/productos/" . $file . ".php";
    }


    public static function service($file)
    {
        return "../../controllers/servicios/" . $file . ".php";
    }


    //Ruta para ir a autenticar usuairio
    public static function auth($file)
    {
        return "../../controllers/autenticar/" . $file . ".php";
    }


    //Ruta para ir de los controladores a las vistas
    public static function view($view)
    {
        header("Location: ../../views/pages/" . $view . ".php");
    }


    //Ruta de archivos publicos a vistas de App
    public static function app($view)
    {
        return "../../app/views/pages/" . $view . ".php";
    }


    //Ruta de archivos publicos
    public static function url($view)
    {
        return $view . ".php";
    }


    //Ruta para ir de las vistas de App a los archivos publicos
    public static function public($view)
    {
        return "../../../public/pages/" . $view . ".php";
    }


    //Ruta para enviar al usuario a los mensajes
    public static function msg($msg)
    {
        header("Location: ../messages/" . $msg . ".php");
    }
}
