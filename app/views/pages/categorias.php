<?php

session_start();

require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Categorias.php';

?>




<div class="main">
    <h2 class="h2">Lista de Categorias</h2>
    <hr>
    <div class="card">



        <div class="recuadro-button">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalCategorias">
                <i class="fas fa-user-plus"></i> Agregar categoria
            </button>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php

                        $cat = new Categorias();
                        $resultado = $cat->obtenerCategorias();

                        if ($resultado != NULL) {

                            foreach ($resultado as $categoria) {

                                ?>
                                    <tr>
                                        <td><?php echo $categoria['id']; ?></td>
                                        <td><?php echo $categoria['nombre']; ?></td>
                                        <td><?php echo $categoria['descripcion']; ?></td>
                
                                        <td>
                                            <a class="btn btn-danger" onclick="eliminarCategoria(<?php echo $categoria['id'] ?>)">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <a class="btn btn-warning">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        } else {

                            echo "<tr><td colspan='6' class='text-center'>No hay datos disponibles</td></tr>";
                        }

                        ?>

                    </tbody>
            </table>
        </div>
    </div>
</div>





<?php

require_once '../resources/layout/footer.php';
require_once '../resources/layout/form_categorias.php';

?>