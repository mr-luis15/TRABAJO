

<!-- Modal -->
<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nueva categoria</h5>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion de la categoria (menos de 255 caracteres)" required></textarea>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="agregar_categoria"><i class="fas fa-user-plus"></i> Agregar categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>