<?php

session_start();

if (empty($_GET['id'])) {
    echo "No se recibió el ID";
    exit;
}


require_once '../../model/Categorias.php';
require_once '../../model/Productos.php';
require_once '../resources/layout/head.php';
require_once '../resources/layout/menu.php';
require_once '../../helpers/helpers.php';


$categorias = new Categorias();

$categoria = $categorias->obtenerCategorias();


$productos = new Producto();
$productos->setId($_GET['id']);
$resultados = $productos->obtenerProductoById();


foreach ($resultados as $datos):

?>
    <div class="main">
        <h2 style="text-align: center;">Editar producto</h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-center">Modificar Producto</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" id="nombre">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $datos['descripcion'] ?></textarea>
                                </div>

                                <!-- Poner el select con las categorias dispibibles con ID y nombre -->
                                <div class="mb-3">
                                    <label for="id_categoria" class="form-label">Categoria</label>
                                    <select name="id_categoria" id="id_categoria" class="form-control">


                                        <option value="<?php echo isNull($datos['categoria'], "No asignada") ?>"> <?php echo isNull($datos['categoria_nombre'], "No asignada") ?> </option>

                                        <?php

                                        foreach ($categoria as $cad) {

                                            if ($cad['id'] != $datos['categoria']) {

                                                echo "<option value=" . $cad['id'] . "> " . $cad['nombre'] . " </option>";
                                            }
                                        }

                                        ?>


                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado del producto</label>
                                    <select name="estado" id="estado" class="form-control">

                                        <option value="Disponible" <?php echo ($datos['estado'] == 'Disponible') ? 'selected' : ''; ?>>Disponible</option>
                                        <option value="No disponible" <?php echo ($datos['estado'] == 'No disponible') ? 'selected' : ''; ?>>No disponible</option>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" value="<?php echo $datos['precio'] ?>" class="form-control" id="precio">
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" value="<?php echo $datos['stock'] ?>" class="form-control" id="stock">
                                </div>

                                <input type="hidden" name="id" id="id" value="<?php echo $datos['id']; ?>">

                                <div class="text-center d-grid gap-2">
                                    <button type="button" id="editar_producto" class="btn btn-success">Modificar Producto</button>
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
                            <h3 class="card-title text-center">Datos Actuales del Producto</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre_actual" class="form-label">Nombre</label>
                                    <input type="text" value="<?php echo $datos['nombre']; ?>" class="form-control" id="nombre_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion_actual" class="form-label">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" id="descripcion_actual" disabled><?php echo $datos['descripcion']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="categoria_actual" class="form-label">Categoria</label>
                                    <input type="text" value="<?php echo isNull($datos['categoria_nombre'], "No asignada"); ?>" class="form-control" id="categoria_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="estado_actual" class="form-label">Estado del producto</label>
                                    <input type="text" value="<?php echo $datos['estado']; ?>" class="form-control" id="estado_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="precio_actual" class="form-label">Precio</label>
                                    <input type="text" value="<?php echo $datos['precio']; ?>" class="form-control" id="precio_actual" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="stock_actual" class="form-label">Stock</label>
                                    <input type="text" value="<?php echo $datos['stock']; ?>" class="form-control" id="stock_actual" disabled>
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