<?php

session_start();

require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Categorias.php';
require_once '../../routes/RouteController.php';

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

                        $categoria = new Categorias();
                        $resultado = $categoria->obtenerCategorias();

                        if ($resultado != NULL) :

                            foreach ($resultado as $cat) :

                                ?>
                                    <tr>
                                        <td><?php echo $cat['id']; ?></td>
                                        <td><?php echo $cat['nombre']; ?></td>
                                        <td><?php echo $cat['descripcion']; ?></td>
                
                                        <td>
                                            <a class="btn btn-danger" onclick="eliminarCategoria(<?php echo $cat['id'] ?>)">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <a href="editarCategoria.php?id=<?php echo $cat['id']; ?>" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                        </td>
                                    </tr>
                                <?php

                            endforeach;
                            
                        else :

                            echo "<tr><td colspan='6' class='text-center'>No hay datos disponibles</td></tr>";
                        
                        endif;

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