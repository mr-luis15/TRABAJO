<div class="main">
    <h1>Dashboard</h1>
    <h4>Bienvenid@ <?php echo $_SESSION['usuario']['nombre']; ?></h5>
    <hr>
        <div class="contenedor-botones">
            <a id="productos" href="<?php echo Route::url('productos'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-wind"></i>
                </div>
                <div class="contenedor-texto">
                    <p>Productos</p>
                </div>
            </a>
            <a id="pedidos" href="<?php echo Route::url('pedidos'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <div class="contenedor-texto">
                    <p>Pedidos</p>
                </div>
            </a>
            <a id="servicios" href="<?php echo Route::url('servicios'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <div class="contenedor-texto">
                    <p>Servicios</p>
                </div>
            </a>
            <a id="categoria" href="<?php echo Route::url('categorias'); ?>">
                <div class="contenedor-imagen">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div class="contenedor-texto">
                    <p>Categoria</p>
                </div>
            </a>
        </div>
</div>