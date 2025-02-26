<?php

session_start();

require_once '../../routes/RouteController.php';
nivelesPermitidos(['Admministrador', 'Secretaria de Compras', 'Secretaria de Ventas']);




if (!isset($_GET['id'])) {

    echo "<script>alert('No se encontró la categoria'); window.history.back();</script>";
    exit;
}


require_once '../../model/Categorias.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';


$categoria = new Categorias();
$categoria->setId($_GET['id']);


if ($categoria->existeCategoriaById() === false) {

    echo "<script>alert('No se encontró la categoria'); window.history.back();</script>";
    exit;
}


$datos = $categoria->obtenerCategoriaById();

//foreach ($resultado as $datos):


?>
    <div class="main">
        <h2 style="text-align: center;">Editar categoria</h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Modificar categoria</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" id="nombre" name="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion (Maximo 255 caracteres)</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo $datos['descripcion']; ?></textarea>
                                </div>

                                <input type="hidden" name="id" id="id" value="<?php echo $datos['id']; ?>">

                                <div class="text-center d-grid gap-2">
                                    <button type="button" id="editar_categoria" class="btn btn-success">Modificar Categoria</button>
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
                            <h3 class="card-title text-center">Datos Actuales de la categoria</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre_actual" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre']; ?>" class="form-control" id="nombre_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion_actual" class="form-label">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" disabled> <?php echo $datos['descripcion']; ?> </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php


//endforeach;
require_once '../resources/layout/footer.php';


?>