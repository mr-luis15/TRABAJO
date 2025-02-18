<?php

session_start();

$title = "Registrarse";
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/navar.php';
require_once '../../helpers/helpers.php';

$codigos = obtenerCodigosPaises();

?>
<div class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #2f74c8;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Registrarse</h3>
                        <form id="formulario-register">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="recipient-name" class="col-form-label">Codigo de telefono:</label>
                                <select class="form-select" aria-label="Default select example" name="codigo" id="codigo">

                                    <?php

                                    foreach ($codigos as $pais => $cod) {

                                        echo "<option value=" . $cod . "> " . $pais . ": " . $cod . " </option>";
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <button type="button" id="registrarse" class="btn btn-success">Registrarse</button>
                                <button type="button" class="btn btn-outline-secondary mt-2" onclick="document.location.href='<?php echo Route::url('login') ?>'">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require_once '../resources/layout/footer.php';

?>