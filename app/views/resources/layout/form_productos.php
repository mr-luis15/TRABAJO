
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
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <textarea name="descipcion" id="descripcion" class="form-control" required></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Categoria:</label>
                        <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
                            
                            <?php

                                foreach ($resultado as $cat) {

                                    echo "<option value=" . $cat['id'] . "> " . $cat['nombre'] . " </option>";

                                }

                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" id="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock:</label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>
                    <input type="hidden" value="Tecnico" name="nivel" id="nivel">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="enviar"><i class="fas fa-user-plus"></i> Registrar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>