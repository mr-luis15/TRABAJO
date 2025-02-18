<?php

session_start();

$title = "Iniciar Sesion";
require_once '../../routes/RouteController.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/navar.php';

?>

<div id="contenedor-form" class="d-flex justify-content-center align-items-center vh-100" style="background-color: #2f74c8;">
    <form id="formulario-login" class="bg-white p-4 rounded shadow-lg" style="width: 100%; max-width: 400px;">
        <h1 class="text-center mb-4">Inicio de sesión</h1>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="d-grid gap-2">
            <button type="button" id="login" class="btn btn-success btn-lg">Iniciar sesión</button>
            <button type="button" class="btn btn-outline-secondary btn-lg" onclick="document.location.href='<?php echo Route::url('registrarse') ?>'">Registrarse</button>
        </div>
    </form>
</div>


<?php

require_once '../resources/layout/footer.php';

?>