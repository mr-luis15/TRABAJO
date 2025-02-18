<?php

//RECORDAR EDITAR ESTA VISTA PARA QUE APAREZCAN 2 RECUADROS, UNO DONDE APAREZCA UNA TABLA CON LOS DATOS DE LOS USUARIOS SIN PODER MODIFICAR Y OTRO DE UN FORMULARIO CONDE APAREZCA UN FORMULARIO DONDE LOS DATOS SE PUEDAN MODIFICAR

session_start();

if (!isset($_GET['id'])) {

    echo "Error al recibir el ID";
    exit;

}

$title = "Modificar Usuario";

require_once '../../model/Usuario.php';
require_once '../../helpers/helpers.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';


$usuario = new Usuario();

$usuario->setId($_GET['id']);


if ($usuario->obtenerUsuarioById() == false) {

    echo "Ha habido un error. No se encontró el usuario";
    exit;
}


$resultado = $usuario->obtenerUsuarioById();

foreach ($resultado as $datos):


?>
    <div class="main">
        <h2 style="text-align: center;">Editar usuarios</h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Modificar Usuario</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" id="nombre" name="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Codigo del telefono</label>
                                    <select class="form-select" name="codigo" id="codigo">

                                        <option value="<?php echo $datos['codigo_telefono']; ?>"><?php echo $datos['codigo_telefono']; ?></option>

                                        <?php

                                        $codigos = obtenerCodigosPaises();

                                        foreach ($codigos as $pais => $cod) {

                                            if ($cod != $datos['codigo_telefono'])
                                                echo "<option value='$cod'>$pais : $cod</option>";
                                        }

                                        ?>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" value="<?php echo $datos['telefono'] ?>" class="form-control" id="telefono" name="telefono" required>
                                </div>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <input type="email" value="<?php echo $datos['correo'] ?>" class="form-control" id="correo" name="correo" required>
                                </div>

                                <?php

                                if ($datos['nivel'] != 'Tecnico'):

                                ?>
                                    <div class="mb-3">
                                        <label for="nivel" class="form-label">Nivel de usuario</label>
                                        <select class="form-select" name="nivel" id="nivel">

                                            <option value="<?php echo $datos['nivel']; ?>"> <?php echo $datos['nivel']; ?> </option>

                                            <?php

                                            $niveles = ["Administrador", "Tecnico", "Secretaria de Compras", "Secretaria de Ventas", "Cliente"];

                                            foreach ($niveles as $nivel_opcion) {

                                                if ($nivel_opcion != $datos['nivel'])
                                                    echo "<option value='$nivel_opcion'>$nivel_opcion</option>";
                                            }

                                            ?>

                                        </select>
                                    </div>

                                <?php

                                endif;

                                ?>

                                <?php

                                if ($datos['nivel'] == 'Tecnico'):

                                ?>

                                    <input type="hidden" name="nivel" id="nivel" value="Tecnico">

                                <?php

                                endif;

                                ?>

                                <input type="hidden" name="id" id="id" value="<?php echo $datos['id_usuario']; ?>">
                                
                                <div class="text-center d-grid gap-2">
                                    <button type="button" id="editar_usuario" class="btn btn-success">Modificar Usuario</button>
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
                            <h3 class="card-title text-center">Datos Actuales del Usuario</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre_actual" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre']; ?>" class="form-control" id="nombre_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="codigo_actual" class="form-label">Codigo del telefono</label>
                                    <input type="text" value="<?php echo $datos['codigo_telefono']; ?>" class="form-control" id="codigo_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono_actual" class="form-label">Teléfono</label>
                                    <input type="text" value="<?php echo mostrarTelefono($datos['telefono']); ?>" class="form-control" id="telefono_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="correo_actual" class="form-label">Correo Electrónico</label>
                                    <input type="text" value="<?php echo $datos['correo']; ?>" class="form-control" id="correo_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nivel_actual" class="form-label">Nivel de usuario</label>
                                    <input type="text" value="<?php echo $datos['nivel']; ?>" class="form-control" id="nivel_actual" disabled>
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