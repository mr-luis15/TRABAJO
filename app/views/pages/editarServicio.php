<?php

//RECORDAR EDITAR ESTA VISTA PARA QUE APAREZCAN 2 RECUADROS, UNO DONDE APAREZCA UNA TABLA CON LOS DATOS DE LOS USUARIOS SIN PODER MODIFICAR Y OTRO DE UN FORMULARIO CONDE APAREZCA UN FORMULARIO DONDE LOS DATOS SE PUEDAN MODIFICAR

session_start();

if (!isset($_GET['id'])) {

    echo "Error al recibir el ID";
    exit;
}

$title = "Modificar Servicio";

require_once '../../model/Usuario.php';
require_once '../../model/Servicios.php';
require_once '../../helpers/helpers.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';


$servicio = new Servicios();
$usuario = new Usuario();

$servicio->setId($_GET['id']);

$resultado = $servicio->obtenerServicioById();



if (!$resultado) {

    echo "Ha habido un error. No se encontró el servicio";
    exit;
}


foreach ($resultado as $service):


?>
    <div class="main">
        <h2 style="text-align: center;">Editar servicios</h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Modificar Servicio</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Clientes: </label>
                                    <select class="form-select" name="cliente" id="cliente">

                                        <option value="<?php echo $service['id_cliente']; ?>"><?php echo $service['nombre_cliente']; ?></option>

                                        <?php

                                        $clientes = $usuario->obtenerClientes();

                                        foreach ($clientes as $cliente) {

                                            if ($cliente['id_usuario'] != $service['id_cliente'])
                                                echo "<option value=" . $cliente['id_usuario'] . ">" . $cliente['nombre'] . "</option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Tecnicos: </label>
                                    <select class="form-select" name="tecnico" id="tecnico">

                                        <option value="<?php echo isNull($service['id_tecnico'], "No asignado"); ?>"><?php echo isNull($service['nombre_tecnico'], "No asignado"); ?></option>

                                        <?php

                                        $tecnicos = $usuario->obtenerTecnicos();

                                        foreach ($tecnicos as $tecnico) {

                                            if ($tecnico['id_usuario'] != $service['id_tecnico'])
                                                echo "<option value=" . $tecnico['id_usuario'] . ">" . $tecnico['nombre'] . "</option>";
                                        }

                                        ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Direccion: </label>
                                    <input type="text" value="<?php echo $service['direccion'] ?>" class="form-control" name="direccion" id="direccion" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Descripcion: </label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" required><?php echo $service['descripcion'] ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Estado del servicio: </label>
                                    <select class="form-select" name="estado" id="estado">

                                        <?php

                                        if ($service['estado'] == "Realizado") {

                                            echo "<option value=" . $service['estado'] . ">" . $service['estado'] . "</option>";
                                            echo "<option value='No realizado'>No realizado</option>";

                                        } else {
                                            
                                            echo "<option value=\"" . htmlspecialchars($service['estado']) . "\">" . htmlspecialchars($service['estado']) . "</option>";
                                            echo "<option value='Realizado'>Realizado</option>";
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Fecha: </label>
                                    <input type="date" value="<?php echo $service['fecha_servicio'] ?>" name="fecha" id="fecha" class="form-control" required>
                                </div>

                                <input type="hidden" name="id" id="id" value="<?php echo $service['id_servicio'] ?>">

                                <div class="text-center d-grid gap-2">
                                    <button type="button" id="editar_servicio" class="btn btn-success">Modificar Servicio</button>
                                </div>
                                <br>
                                <div class="text-center d-grid gap-2">
                                    <button type="button" class="btn btn-danger" onclick="history.back()">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Datos Actuales del Servicio</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre_actual" class="form-label">CLiente</label>
                                    <input type="text" value="<?php echo $service['nombre_cliente']; ?>" class="form-control" id="nombre_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="codigo_actual" class="form-label">Tecnico</label>
                                    <input type="text" value="<?php echo isNull($service['nombre_tecnico'], "No asignado"); ?>" class="form-control" id="codigo_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono_actual" class="form-label">Direccion: </label>
                                    <input type="text" value="<?php echo  $service['direccion'] ?>" class="form-control" id="telefono_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="correo_actual" class="form-label">Descripcion</label>
                                    <textarea class="form-control" name="" id="" disabled><?php echo $service['descripcion'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="nivel_actual" class="form-label">Estado del servicio</label>
                                    <input type="text" value="<?php echo $service['estado']; ?>" class="form-control" id="nivel_actual" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="nivel_actual" class="form-label">Fecha</label>
                                    <input type="text" value="<?php echo $service['fecha_servicio']; ?>" class="form-control" id="nivel_actual" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php


endforeach;
require_once '../resources/layout/footer.php';


?>