<?php
$niveles = [
    'Administrador' => [
        'Dashboard' => ['ruta' => 'dashboard.php', 'icono' => 'fas fa-home'],
        'Empleados' => ['ruta' => 'empleados.php', 'icono' => 'fas fa-user-tie'],
        'Técnicos' => ['ruta' => 'tecnicos.php', 'icono' => 'fas fa-users-cog'],
        'Clientes' => ['ruta' => 'clientes.php', 'icono' => 'fas fa-users'],
        'Productos' => ['ruta' => 'productos.php', 'icono' => 'fas fa-box'],
        'Categorías' => ['ruta' => 'categorias.php', 'icono' => 'fas fa-sitemap'],
        'Pedidos' => ['ruta' => 'pedidos.php', 'icono' => 'fas fa-truck-moving'],
        'Servicios' => ['ruta' => 'servicios.php', 'icono' => 'fas fa-box-open']
    ],
    'Empleado' => [
        'Dashboard' => ['ruta' => 'dashboard.php', 'icono' => 'fas fa-home'],
        'Empleados' => ['ruta' => 'empleados.php', 'icono' => 'fas fa-user-tie'],
        'Técnicos' => ['ruta' => 'tecnicos.php', 'icono' => 'fas fa-users-cog'],
        'Clientes' => ['ruta' => 'clientes.php', 'icono' => 'fas fa-users']
    ],
    'Secretaria de Compras' => [
        'Dashboard' => ['ruta' => 'dashboard.php', 'icono' => 'fas fa-home'],
        'Empleados' => ['ruta' => 'empleados.php', 'icono' => 'fas fa-user-tie'],
        'Productos' => ['ruta' => 'productos.php', 'icono' => 'fas fa-box'],
        'Categorías' => ['ruta' => 'categorias.php', 'icono' => 'fas fa-sitemap'],
        'Pedidos' => ['ruta' => 'pedidos.php', 'icono' => 'fas fa-truck-moving'],
        'Servicios' => ['ruta' => 'servicios.php', 'icono' => 'fas fa-box-open']
    ],
    'Secretaria de Ventas' => [
        'Dashboard' => ['ruta' => 'dashboard.php', 'icono' => 'fas fa-home'],
        'Productos' => ['ruta' => 'productos.php', 'icono' => 'fas fa-box'],
        'Categorías' => ['ruta' => 'categorias.php', 'icono' => 'fas fa-sitemap'],
        'Pedidos' => ['ruta' => 'pedidos.php', 'icono' => 'fas fa-truck-moving'],
        'Servicios' => ['ruta' => 'servicios.php', 'icono' => 'fas fa-box-open']
    ],
    'Tecnico' => [
        'Dashboard' => ['ruta' => 'dashboard.php', 'icono' => 'fas fa-home'],
        'Pedidos' => ['ruta' => 'pedidos.php', 'icono' => 'fas fa-truck-moving'],
        'Servicios' => ['ruta' => 'servicios.php', 'icono' => 'fas fa-box-open']
    ]
];

// Obtener el nivel del usuario
$nivelUsuario = $_SESSION['usuario']['nivel'] ?? null;

// Si el nivel de usuario existe en el array, mostrar el menú correspondiente
if ($nivelUsuario && isset($niveles[$nivelUsuario])) :

?>

    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" alt="Logo" />
        </div>
        <ul>

            <?php

            foreach ($niveles[$nivelUsuario] as $nombre => $datos) :

            ?>
                <li>
                    <a href="<?= $datos['ruta'] ?>">
                        <i class="<?= $datos['icono'] ?>"></i> <b><?= $nombre ?></b>
                    </a>
                </li>

            <?php

            endforeach;

            ?>
            <hr>
            <li>
                <a id="logout" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> <b>Salir</b>
                </a>
            </li>
            <hr>
        </ul>
    </div>

<?php

endif;








/*
if ($_SESSION['usuario']['nivel'] === 'Administrador') :

?>
    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" />
        </div>
        <ul>
            <a href="dashboard.php">
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a>
            <a href="empleados.php">
                <i class="fas fa-user-tie"></i> <span>Empleados</span>
            </a>
            <a href="tecnicos.php">
                <i class="fas fa-users-cog"></i> <span>Técnicos</span>
            </a>
            <a href="clientes.php">
                <i class="fas fa-users"></i> <span>Clientes</span>
            </a>
            <a href="productos.php">
                <i class="fas fa-voicemail"></i> <span>Productos</span>
            </a>
            <a href="categorias.php">
                <i class="fas fa-sitemap"></i> <span>Categorías</span>
            </a>
            <a href="pedidos.php">
                <i class="fas fa-truck-moving"></i> <span>Pedidos</span>
            </a>
            <a href="servicios.php">
                <i class="fas fa-box-open"></i> <span>Servicios</span>
            </a>
            <hr>
            <a id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> <span>Salir</span></a>
            <hr>
        </ul>
    </div>

<?php
endif;

if ($_SESSION['usuario']['nivel'] === 'Empleado'):

?>

    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" />
        </div>
        <ul>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="empleados.php">
                <i class="fas fa-user-tie"></i>
                Empleados
            </a>
            <a href="tecnicos.php">
                <i class="fas fa-users-cog"></i>
                Tecnicos
            </a>
            <a href="clientes.php">
                <i class="fas fa-users"></i>
                Clientes
            </a>
            <hr>
            <a id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i></a>
            <hr>
        </ul>
    </div>

<?php
endif;
if ($_SESSION['usuario']['nivel'] === 'Secretaria de Compras') :

?>

    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" />
        </div>
        <ul>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="empleados.php">
                <i class="fas fa-user-tie"></i>
                Empleados
            </a>
            <a href="productos.php">
                <i class="fas fa-voicemail"></i>
                Productos
            </a>
            <a href="categorias.php">
                <i class="fas fa-sitemap"></i>
                Categorias
            </a>
            <a href="pedidos.php">
                <i class="fas fa-truck-moving"></i>
                Pedidos
            </a>
            <a href="servicios.php">
                <i class="fas fa-box-open"></i>
                Servicios
            </a>
            <hr>
            <a id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i></a>
            <hr>
        </ul>
    </div>

<?php
endif;

if ($_SESSION['usuario']['nivel'] === 'Secretaria de Ventas') :

?>

    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" />
        </div>
        <ul>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="productos.php">
                <i class="fas fa-voicemail"></i>
                Productos
            </a>
            <a href="categorias.php">
                <i class="fas fa-sitemap"></i>
                Categorias
            </a>
            <a href="pedidos.php">
                <i class="fas fa-truck-moving"></i>
                Pedidos
            </a>
            <a href="servicios.php">
                <i class="fas fa-box-open"></i>
                Servicios
            </a>
            <hr>
            <a id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i></a>
            <hr>
        </ul>
    </div>

<?php
endif;

if ($_SESSION['usuario']['nivel'] === 'Tecnico') :

?>

    <div class="sidebar">
        <div class="image-container">
            <img src="../resources/img/oso_polar.jpg" />
        </div>
        <ul>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="pedidos.php">
                <i class="fas fa-truck-moving"></i>
                Pedidos
            </a>
            <a href="servicios.php">
                <i class="fas fa-box-open"></i>
                Servicios
            </a>
            <hr>
            <a id="logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i></a>
            <hr>
        </ul>
    </div>

<?php
endif;

*/
?>