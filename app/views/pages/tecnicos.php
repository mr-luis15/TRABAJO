<?php

session_start();

$title = "Tecnicos";
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Usuario.php';
require_once '../../helpers/helpers.php';

?>
<div class="main">
    <h2 class="h2">Lista de Tecnicos</h2>
    <hr>
    <div class="card">
        <!-- Recuadro superior con el botón -->
        <div class="recuadro-button">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                <i class="fas fa-user-plus"></i> Agregar Tecnico
            </button>

            <button class="btn btn-light" type="button">
                <i class="fas fa-user-plus"></i> Exportar PDF
            </button>
        </div>
        <!-- Tabla con borde separado -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Codigo</th>
                        <th>Teléfono</th>
                        <th>Nivel</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios = new Usuario();
                    $listado = $usuarios->obtenerTecnicos();

                    if ($listado) {
                        foreach ($listado as $usuario) {
                            ?>
                            <tr>
                                <td><?php echo $usuario['id_usuario']; ?></td>
                                <td><?php echo $usuario['nombre']; ?></td>
                                <td><?php echo $usuario['correo']; ?></td>
                                <td><?php echo $usuario['codigo_telefono']; ?></td>
                                <td><?php echo mostrarTelefono($usuario['telefono']); ?></td>
                                <td><?php echo $usuario['nivel']; ?></td>
                                <td>
                                    <a class="btn btn-danger" onclick="eliminarUsuario(<?php echo $usuario['id_usuario'] ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <a href="<?= htmlspecialchars(Route::url('editarUsuario') . '?id=' . $usuario['id_usuario']) ?>" class="btn btn-warning">
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
require_once '../resources/layout/form_tecnicos.php';


?>