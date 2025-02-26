<?php

require_once '../layout/head.php';
require_once '../layout/navbar.php';
require_once '../../app/model/Productos.php';
require_once '../../app/helpers/helpers.php';

?>


<div class="container mt-5">
    <h2 class="text-primary mb-4 text-center">Nuestros Productos</h2>
    <div class="row">

        <?php

        $productos = new Producto();
        $resultado = $productos->obtenerProductos();

        foreach ($resultado as $producto) :

        ?>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="../../app/views/uploaded_images/default.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        <p class="card-text"><?php echo "Precio: " . $producto['precio']; ?></p>
                        <p class="card-text"><?php echo "Estado: " . mostrarEstado($producto['estado']); ?></p>
                        <a href="detalle_producto.php?id=1" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>

        <?php

        endforeach;

        ?>

    </div>
</div>

<?php

require_once '../layout/footer.php';

?>