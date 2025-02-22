<?php

require_once '../../model/Categorias.php';

$categorias = new Categorias;
$resultado = $categorias->obtenerCategorias();

?>


<!-- Modal -->
<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo producto</h5>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <textarea name="descipcion" id="descripcion" class="form-control" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="id_categoria" class="col-form-label">Categoria:</label>
                        <select class="form-select" aria-label="Default select example" name="id_categoria" id="id_categoria">

                            <?php

                            foreach ($resultado as $cat) :

                                echo "<option value=" . $cat['id'] . "> " . $cat['nombre'] . " </option>";
                            
                            endforeach;

                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estado" class="col-form-label">Estado del producto:</label>
                        <select class="form-select" aria-label="Default select example" name="estado" id="estado">

                            <option value="Disponible">Disponible</option>
                            <option value="No disponible">No disponible</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="stock" class="col-form-label">Stock:</label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>

                    <div class="form-group">
                        <label for="formFile" class="form-label">Agregar una imagen</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <input type="hidden" value="Tecnico" name="nivel" id="nivel">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="agregar_producto"><i class="fas fa-user-plus"></i> Registrar producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>