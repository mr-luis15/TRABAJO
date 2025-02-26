<?php



//Funcion para devolver "No asignado" en caso de que no haya un Tecnico asignado
function isNull($dato, $mensaje)
{

    if ($dato == NULL || $dato == "") {
        return $mensaje;
    }

    return $dato;
}



//Mostrar telefonos con guiones
function mostrarTelefono($tel)
{

    return preg_replace("/(\d{3})(\d{3})(\d{4})/", "$1-$2-$3", $tel);
}



function mostrarServicioRealzizado($estado) {

    return $estado == "Realizado"? "<b style='color: green'>".$estado."</b>" : "<b style='color: orange'>".$estado."</b>";

}


//Funcion para obtener los codigos telefonicos de los paises
function obtenerCodigosPaises()
{

    $codigos = array(
        "México" => "+52",
        "Estados Unidos" => "+1",
        "Canadá" => "+1",
        "Argentina" => "+54",
        "Brasil" => "+55",
        "Colombia" => "+57",
        "Chile" => "+56",
        "Perú" => "+51",
        "Ecuador" => "+593",
        "Guatemala" => "+502",
        "Cuba" => "+53",
        "Bolivia" => "+591",
        "República Dominicana" => "+1",
        "Honduras" => "+504",
        "Paraguay" => "+595",
        "El Salvador" => "+503",
        "Nicaragua" => "+505",
        "Costa Rica" => "+506",
        "Panamá" => "+507",
        "Uruguay" => "+598",
        "Venezuela" => "+58",
        "Belice" => "+501",
        "Surinam" => "+597",
        "Guyana" => "+592",
        "Francia" => "+33", 
        "España" => "+34",
        "Reino Unido" => "+44",
        "Italia" => "+39",
        "Alemania" => "+49",
        "Francia" => "+33",
        "Portugal" => "+351",
        "Rumanía" => "+40",
        "Polonia" => "+48",
        "Irlanda" => "+353",
        "Bélgica" => "+32",
        "Suiza" => "+41",
        "Países Bajos" => "+31",
        "Suecia" => "+46",
        "Noruega" => "+47",
        "Dinamarca" => "+45",
        "Finlandia" => "+358",
        "Hungría" => "+36",
        "Lituania" => "+370",
        "Letonia" => "+371",
        "Estonia" => "+372",
        "Luxemburgo" => "+352",
        "Moldavia" => "+373",
        "Eslovenia" => "+386",
        "Croacia" => "+385",
        "Serbia" => "+381",
        "Bulgaria" => "+359",
        "Grecia" => "+30",
        "Chequia" => "+420",
        "Eslovaquia" => "+421",
        "Albania" => "+355",
        "Armenia" => "+374",
        "Azerbaiyán" => "+994",
        "Kazajistán" => "+7",
        "Georgia" => "+995",
        "San Marino" => "+378",
        "Mónaco" => "+377",
        "Malta" => "+356",
        "Liechtenstein" => "+423",
        "Andorra" => "+376"
    );


    return $codigos;
}
