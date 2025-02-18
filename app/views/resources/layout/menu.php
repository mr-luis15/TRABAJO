<?php

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
?>