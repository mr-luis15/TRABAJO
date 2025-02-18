<?php

require_once '../resources/layout/head.php';

?>

    <div class="text-center">
        <!-- Mensaje de acceso denegado -->
        <h1 class="text-danger">¡Acceso Denegado!</h1>
        <p class="lead">Lo siento, no tienes permiso para acceder a esta página.</p>
        <!-- Botón para redirigir o cerrar -->
        <a href="../../controllers/autenticar/logout.php" class="btn btn-danger">Volver</a>
    </div>

<?php 

require_once '../resources/layout/footer.php';

?>
