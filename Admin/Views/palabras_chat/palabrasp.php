<?php require_once('../html/head2.php') ?>
<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Ordenes</h5>

                <div class="table-responsive">
                    <!-- <button type="button" onclick="cargaInventario()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_orden">
                        Nueva Inventario
                    </button> -->
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <!-- // ******************************************************************************************************************************************************************************
                                CONTENIDO DE CLIENTE
// ****************************************************************************************************************************************************************************** -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre </h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Telefono</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ciudad</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Pais</h6>
                                </th>
                                <!-- // ******************************************************************************************************************************************************************************
                                CONTENIDO DE ORDENES
 // ****************************************************************************************************************************************************************************** -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">DireccionEnvio </h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">FechaOrden</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">FormaEnvio</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Total</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estado</h6>
                                </th>

                                <!-- // ******************************************************************************************************************************************************************************
                                CONTENIDO DE ORDENES-DETALLES
 // ****************************************************************************************************************************************************************************** -->
                                <!-- <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Producto</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">C.Factura</h6>
                                </th> -->



                                <!-- // ****************************************************************************************************************************************************************************** -->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_orden">

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
<div class="modal fade" id="Modal_orden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_orden">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Orden</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="OrdenID" id="OrdenID">
                    <!-- // ******************************************************************************************************************************************************************************
                                Contenido ORDENES PAR ACTUALIZAR
// ****************************************************************************************************************************************************************************** -->
                    <div class="form-group">
                        <label for="ClienteID">Nombre-Cliente</label>
                        <select name="ClienteID" id="ClienteID" class="form-control" readonly>
                            <option value="0"></option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label for="ClienteID">Nombre-Cliente</label>
                        <input type="text" required class="form-control" id="ClienteID" name="ClienteID" readonly>
                    </div> -->

                    <div class="form-group">
                        <label for="FormaEnvio">Forma Envio</label>
                        <input type="text" required class="form-control" id="FormaEnvio" name="FormaEnvio" readonly>
                    </div>

                    <div class="form-group">
                        <label for="DireccionEnvio">Direccion-Envio</label>
                        <input type="text" required class="form-control" id="DireccionEnvio" name="DireccionEnvio" readonly>
                    </div>

                    <div class="form-group">
                        <label for="FechaOrden">Fecha-Orden</label>
                        <input type="datetime-local" required class="form-control" id="FechaOrden" name="FechaOrden" readonly>
                    </div>

                    <div class="form-group">
                        <label for="Total">Total</label>
                        <input type="text" required class="form-control" id="Total" name="Total" readonly>
                    </div>


                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <select name="Estado" id="Estado" class="form-control">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Procesado">Procesado</option>
                            <option value="Enviado">Enviado</option>
                        </select>
                    </div>

                </div>
                <!-- // ******************************************************************************************************************************************************************************
                                Contenido ORDENES PAR ACTUALIZAR
// ****************************************************************************************************************************************************************************** -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- MODAL DE PRODUCTOS  -->
<!-- <div class="modal fade" id="Modal_productoso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_productoso">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Porductos-Ordenes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_empleado" id="id_empleado">
                    <div class="form-group">

                 </div>

            </form>
        </div>
    </div>
</div> -->
<!-- MODAL DE PRODUCTOS -->
<div class="modal fade" id="Modal_productoso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Productos-Ordenes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Lista de nombres de productos -->
                <ul id="lista_productos"></ul>
            </div>
            <div class="modal-footer">
                <!-- Puedes agregar botones de acción aquí si es necesario -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>






<?php require_once('../html/script2.php') ?>
<!--
<script src="inventario.js"></script> -->
<script src="./orden.js"></script>