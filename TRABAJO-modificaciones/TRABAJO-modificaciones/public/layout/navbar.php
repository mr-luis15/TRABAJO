<?php

    require_once '../../app/routes/RouteController.php';

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="bienvenido.php">Clima Polar del Pacífico</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="bienvenido.php">Home</a>
                <a class="nav-link" href=<?php echo Route::app("login"); ?>>Iniciar Sesión</a>
                <a class="nav-link" href=<?php echo Route::app("registrarse"); ?>>Registrarse</a>
                <a class="nav-link" href="mision.php">Misión</a>
                <a class="nav-link" href="vision.php">Visión</a>
                <a class="nav-link" href="contactanos.php">Contáctanos</a>
            </div>
        </div>
    </div>
</nav>
