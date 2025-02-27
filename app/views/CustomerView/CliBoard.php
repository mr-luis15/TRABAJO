<?php

session_start();

require_once '../../routes/RouteController.php';
nivelesPermitidos(['Cliente']);


$nombreCliente = $_SESSION['usuario']['nombre'];


require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';

?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        height: 100vh;
        background-color: #f4f4f4;
    }

    /* Contenido */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
    }

    h1 {
        font-size: 2rem;
    }

    .contenedor {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .card i {
        margin-right: 10px;
        font-size: 24px;
    }

    /* Colores de tarjetas */
    .card:nth-child(1) {
        background-color: #2f74c8;
    }

    .card:nth-child(2) {
        background-color: #d04141;
    }

    .card:nth-child(3) {
        background-color: #5a2fc8;
    }

    .card:nth-child(4) {
        background-color: #2fc87a;
    }

    .card:hover {
        opacity: 0.8;
    }

    /* Estilos para el catálogo */
    .catalogo {
        margin-top: 30px;
    }

    .catalogo h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .productos {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .producto {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        width: 250px;
        text-align: center;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .producto img {
        width: 100%;
        border-radius: 10px;
    }

    .producto h3 {
        font-size: 18px;
        margin: 10px 0;
    }

    .producto p {
        font-size: 14px;
        color: #555;
    }

    .producto button {
        background-color: #2f74c8;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .producto button:hover {
        background-color: #1e5aa4;
    }
</style>

<!-- Contenido principal -->
<div class="main-content">
    <h1>Bienvenido, <?php echo $nombreCliente; ?></h1>
    <p>Aquí puedes ver un resumen de tu cuenta.</p>

    <!-- Contenedor de tarjetas o Barra -->
    <div class="contenedor">
        
        <?php
        
        $tarjetas = [
            ["Pedidos Actuales", "fa-box"],
            ["Historial de Compras", "fa-history"],
            ["Soporte Técnico", "fa-headset"],
            ["Promociones", "fa-tag"]
        ];

        foreach ($tarjetas as $tarjeta) {
            echo "<div class='card'><i class='fas {$tarjeta[1]}'></i> {$tarjeta[0]}</div>";
        }

        ?>

    </div>

    <!-- Catálogo de Aires Acondicionados -->
    <div class="catalogo">
        <h2>Catálogo de Aires Acondicionados</h2>
        <div class="productos">

            <?php
            
            $productos = [
                ["Aire Split LG", "lg.png", "$450"],
                ["Aire Samsung 12000 BTU", "samsung.png", "$500"],
                ["Aire Daikin Inverter", "daikin.png", "$620"],
                ["Aire Carrier 18000 BTU", "carrier.png", "$700"]
            ];

            foreach ($productos as $producto) {
                echo "
                            <div class='producto'>
                                <img src='{$producto[1]}' alt='{$producto[0]}'>
                                <h3>{$producto[0]}</h3>
                                <p>Precio: {$producto[2]}</p>
                                <button>Comprar</button>
                            </div>
                        ";
            }
            
            ?>

        </div>
    </div>

</div>

<?php

require_once '../resources/layout/footer.php';

?>