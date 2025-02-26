<?php

session_start();

require_once '../../routes/RouteController.php';
nivelesPermitidos(['Admministrador', 'Secretaria de Compras', 'Secretaria de Ventas']);



$title = "Vista de Productos";
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Productos.php';
require_once '../../helpers/helpers.php';


?>



<div class="main">
    <h2 class="h2">Lista de Productos</h2>
    <hr>
    <div class="card">
        <div class="recuadro-button">
            
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalProductos">
                <i class="fas fa-cart-plus"></i> Agregar producto
            </button>

            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalProductos">
                <i class="fas fa-user-plus"></i> Productos no disponibles
            </button>
        
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Imagen del producto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php


                    $productos = new Producto();
                    $resultado = $productos->obtenerProductos();
                    $img_dir = "../uploaded_images/";

                    if ($resultado != false) :

                        foreach ($resultado as $prod):

                    ?>

                            <tr>
                                <td><?php echo $prod['id']; ?></td>
                                <td><?php echo $prod['nombre']; ?></td>
                                <td><?php echo $prod['descripcion']; ?></td>
                                <td><?php echo "$" . $prod['precio']; ?></td>
                                <td><?php echo $prod['stock']; ?></td>
                                <td><?php echo isNull($prod['categoria_nombre'], '<b>Categoria no asignada</b>'); ?></td>
                                <td><?php echo isNull($prod['img_producto'], '<img class="rounded" loading="lazy" src="' . $img_dir . 'default.jpg">') ?></td>
                                <td><?php echo mostrarEstado($prod['estado']); ?></td>

                                <td>

                                    <a class="btn btn-success" onclick="">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                            
                                    <a class="btn btn-danger" onclick="eliminarProducto(<?php echo $prod['id']; ?>) ">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <a class="btn btn-warning" href="editarProducto.php?id=<?php echo $prod['id']; ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                </td>
                            </tr>

                    <?php

                        endforeach;

                    else :

                        echo "<tr><td colspan='7' class='text-center'>No hay datos disponibles</td></tr>";

                    endif;


                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<?php

require_once '../resources/layout/footer.php';
require_once '../resources/layout/form_productos.php';

?>