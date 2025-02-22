<?php

    $codigos = obtenerCodigosPaises();

?>


<!-- Modal -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Correo electronico:</label>
                        <input type="email" class="form-control" name="correo" id="correo" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Codigo de telefono:</label>
                        <select class="form-select" aria-label="Default select example" name="codigo" id="codigo">
                            
                            <?php

                                foreach ($codigos as $pais => $cod) :

                                    echo "<option value=" . $cod . "> " . $pais . ": " .$cod . " </option>";

                                endforeach;

                            ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Telefono:</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="El telefono debe tener 10 digitos" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nivel de usuario:</label>
                        <select class="form-select" aria-label="Default select example" name="nivel" id="nivel">
                            <!--<option selected>Seleccona un nivel de usuario</option>-->
                            <option value="Administrador">Administrador</option>
                            <!--<option value="Empleado">Empleado</option> -->
                            <!--<option value="Tecnico">Tecnico</option>-->
                            <option value="Secretaria de Compras">Secretaria de Compras</option>
                            <option value="Secretaria de Ventas">Secretaria de Ventas</option>
                            <!--<option value="Cliente">Cliente</option>-->
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="enviar"><i class="fas fa-user-plus"></i> Registrar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>