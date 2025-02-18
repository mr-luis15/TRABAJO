<?php

require_once '../../routes/RouteController.php';


session_start();


if (
    !isset($_SESSION['usuario']) ||

    $_SESSION['usuario']['nivel'] != 'Administrador' && $_SESSION['usuario']['nivel'] != 'Secretaria de Ventas' &&
    $_SESSION['usuario']['nivel'] != 'Secretaria de Compras' && $_SESSION['usuario']['nivel'] != 'Tecnico'
) {

    Route::msg('Error');
    exit;
}




$title = "Servicios Realizados";
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../model/Usuario.php';
require_once '../../model/Servicios.php';
require_once '../../helpers/helpers.php';



?>

<div class="main">
    <h2 class="h2">Lista de Servicios Realizados</h2>
    <hr>
    <div class="card">
        <!-- Recuadro superior con el botón -->
        <div class="recuadro-button">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#modalServicios">
                <i class="far fa-calendar-plus"></i> Agregar pedido
            </button>
            <button class="btn btn-light" type="button" onclick="window.location.href='servicios.php'">
                <i class="far fa-calendar-plus"></i> Ver pedidos no realizados
            </button>
            <button class="btn btn-light" type="button">
                <i class="fas fa-user-plus"></i> Exportar PDF
            </button>
        </div>
        <!-- Tabla con borde separado -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead">
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Tecnico</th>
                        <th>Direccion</th>
                        <th>Descripcion del Servicio</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php
                        $servicios = new Servicios();
                        $listado = $servicios->obtenerServiciosRealizados();

                        if ($listado) {
                            foreach ($listado as $servicio) {

                                ?>
                                
                                <tr>
                                    <td><?php echo $servicio['id_servicio']; ?></td>

                                    <td><?php echo $servicio['nombre_cliente']; ?></td>

                                    <td><?php echo isNull($servicio['nombre_tecnico'], "<b style='color: red'>No Asignado</b>"); ?></td>

                                    <td><?php echo $servicio['direccion']; ?></td>

                                    <td><?php echo $servicio['descripcion']; ?></td>

                                    <td><?php echo mostrarServicioRealzizado($servicio['estado']); ?></td>

                                    <td><?php echo $servicio['fecha_servicio']; ?></td>

                                    <td>
                                        <a class="btn btn-dark" onclick="setNoRealizado(<?php echo $servicio['id_servicio'] ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Marcar servicio como realizado">
                                            <i class="far fa-bookmark"></i>
                                        </a>

                                        <a href="<?php echo Route::url('editarServicio') . '?id=' . $servicio['id_servicio'] ?>" class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <a class="btn btn-danger" onclick="eliminarServicio(<?php echo $servicio['id_servicio'] ?>)">
                                            <i class="fas fa-trash-alt"></i>
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
require_once '../resources/layout/form_servicios.php';


?>