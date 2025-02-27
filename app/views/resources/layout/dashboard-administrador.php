<div class="main">
    <h1>Dashboard</h1>
    <h4>Bienvenid@ <?php echo $_SESSION['usuario']['nombre']; ?></h5>
        <hr>
        <div class="contenedor-botones">
            <a id="usuarios" href="<?php echo Route::url('clientes'); ?>">
                <div class=" contenedor-imagen">
                    <i class="fas fa-users"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Clientes</b>
                </div>
            </a>
            <a id="productos" href="<?php echo Route::url('productos'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-wind"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Productos</b>
                </div>
            </a>
            <a id="pedidos" href="<?php echo Route::url('pedidos'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Pedidos</b>
                </div>
            </a>
            <a id="servicios" href="<?php echo Route::url('servicios'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Servicios</b>
                </div>
            </a>
        </div>
        <div class="contenedor-botones">
            <a id="empleados" href="<?php echo Route::url('empleados'); ?>">
                <div class=" contenedor-imagen">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Empleados</b>
                </div>
            </a>
            <a id="categoria" href="<?php echo Route::url('categorias'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Categorias</b>
                </div>
            </a>
            <a id="tecnicos" href="<?php echo Route::url('tecnicos'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Tecnicos</b>
                </div>
            </a>
            <a id="inventario" href="<?php echo Route::url('inventario'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="contenedor-texto">
                    <b>Inventario</b>
                </div>
            </a>
        </div>
</div>