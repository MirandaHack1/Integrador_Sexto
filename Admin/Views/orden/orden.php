<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Inventario</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaInventario()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_inventario">
                        Nueva Inventario
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <!--                              -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Provedor</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre Producto</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio Unitario</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_inventario">

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
<div class="modal fade" id="Modal_inventario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_inventario">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Inventario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_Producto" id="ID_Producto">

                    <!-- <div class="form-group">
                        <label for="nombre">Nombre de la Provincia</label>
                        <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre de la provincia">
                    </div>-->
                    <div class="form-group">
                        <label for="ID_Provedores">Provedor</label>
                        <select name="ID_Provedores" id="ID_Provedores" class="form-control">
                            <option value="0">Seleccione un Provedor</option>
                        </select>
                    </div>
                    <!-- 
                    <div class="form-group">
                        <label for="Nombre_Producto">Nombre Producto</label>
                        <input type="text" required class="form-control" id="Nombre_Producto" name="Nombre_Producto" placeholder="Ingrese el Nombre Producto"  maxlength="25">
                    </div>

                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="Cantidad" name="Cantidad" placeholder="Ingrese la Cantidad del Producto" maxlength="6">
                    </div>

                    <div class="form-group">
                        <label for="Precio_Unitario">Precio Unitario</label>
                        <input type="text" required class="form-control" id="Precio_Unitario" name="Precio_Unitario" placeholder="Ingrese el Precio Unitario del Producto"  maxlength="6">
                    </div> -->

                    <div class="form-group">
                        <label for="Nombre_Producto">Nombre Producto</label>
                        <input type="text" required class="form-control" id="Nombre_Producto" name="Nombre_Producto" placeholder="Ingrese el Nombre Producto" maxlength="25" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Solo se permiten letras y espacios">
                    </div>

                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="Cantidad" name="Cantidad" placeholder="Ingrese la Cantidad del Producto" maxlength="6" pattern="[0-9]+" title="Solo se permiten números">
                    </div>

                    <div class="form-group">
                        <label for="Precio_Unitario">Precio Unitario</label>
                        <input type="text" required class="form-control" id="Precio_Unitario" name="Precio_Unitario" placeholder="Ingrese el Precio Unitario del Producto" maxlength="6" pattern="[0-9]+" title="Solo se permiten números">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>
<!-- 
<script src="inventario.js"></script> -->
<script src="./inventario.js"></script>