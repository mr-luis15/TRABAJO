<?php

session_start();

require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';

?>




<div class="main">
    <h2 class="h2">Lista de Productos</h2>
    <hr>
    <div class="card">



    <div class="recuadro-button">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                <i class="fas fa-user-plus"></i> Agregar producto
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



                    if ($listado) {


                        foreach ($listado as $usuario) {
                            
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

?>