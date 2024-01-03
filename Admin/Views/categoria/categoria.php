<?php require_once('../html/head2.php') ?>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Categoria</h5>
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_categoria">
                        Nueva Categoria
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <!-- /*****************************************************************************NOMBRE DE LOS CAMPOS DE TABLA***************************************************************************************** */ -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Descripcion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estado</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_categoria">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ventana Modal-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Modal_categoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_categoria">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="CategoriaID" id="CategoriaID">
                    <div class="form-group">
                        <!-- /*****************************************************************************CAMPOS QUE VOY A LLENAR EN EL MODAL***************************************************************************************** */ -->
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="Descripcion">Descripcion</label>
                            <input type="text" required class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion">
                        </div>
                        
                        <div class="form-group">
                            <label for="Estado">Estado</label>
                            <select name="Estado" id="Estado" class="form-control">
                                <option value="Publicar">Publicar</option>
                                <option value="No_Publicar">No Publicar</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>
<script src="./categoria.controller.js"></script>
<script src="./categoria.model.js"></script>