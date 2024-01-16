<?php require_once('../html/head2.php') ?>




<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Lista de productos</h5>

            <div class="table-responsive">
                <button type="button" onclick="cargaCategoria()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_productos">
                    Nuevo productos
                </button>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">#</h6>
                            </th>
                            <!-- *******************************************************************************************
                                                                    /NOMBRE DE LAS TABLAS
                           ******************************************************************************************* -->
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">C.Referencia</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nombre</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Precio</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Descripcion</h6>
                            </th>

                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Imagen</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">CategoriaID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">F.Ingreso</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Stock</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Iva</h6>
                            </th>

                            <!-- ******************************************************************************************* -->

                        </tr>
                    </thead>
                    <tbody id="tabla_productos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_productos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_productos">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- *******************************************************************************************
                                                                    /NOMBRE DE LAS TABLAS
                    ******************************************************************************************* -->
                    <input type="hidden" name="ProductoID" id="ProductoID">
                    <div class="form-group">

                        <!-- nuevo -->
                        <div class="form-group">
                            <label for="CodigoReferencia">C.Referencia</label>
                            <input type="text" required class="form-control" id="CodigoReferencia" name="CodigoReferencia" placeholder="Ejm=1234" maxlength="20">
                        </div>

                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Ejm=Nombre" maxlength="25">
                        </div>

                        <div class="form-group">
                            <label for="Precio">Precio</label>
                            <input type="text" required class="form-control" id="Precio" name="Precio" placeholder="Ejm=$12" maxlength="10,2">
                        </div>

                        <div class="form-group">
                            <label for="IVA">IVA</label>
                            <select name="Iva" id="Iva" class="form-control">
                                <option value="0">0%</option>
                                <option value="8">8%</option>
                                <option value="12">12%</option>
                                <option value="14">14%</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="Descripcion">Descripcion</label>
                            <input type="text" required class="form-control" id="Descripcion" name="Descripcion" placeholder="Ejm=Descripcion" maxlength="25">
                        </div>

                        <div class="form-group">
                            <label for="Imagen">Fotografia</label>
                            <img id="img_producto" name="img_producto" class="card-img-top d-none" width="100" height="100" alt="">
                            <input type="file" class="form-control" id="Imagen" name="Imagen" placeholder="Ingrese imagen">
                        </div>

                        <div class="form-group">
                            <label for="CategoriaID">CategoriaID </label>
                            <select name="CategoriaID" id="CategoriaID" class="form-control">
                                <option value="0">Seleccione una Categoria</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="FechaIngreso">Fecha y Hora Ingreso</label>
                            <input type="datetime-local" required class="form-control" id="FechaIngreso" name="FechaIngreso" placeholder="" maxlength="25">
                        </div>

                        <div class="form-group">
                            <label for="Stock">Stock</label>
                            <input type="text" required class="form-control" id="Stock" name="Stock" placeholder="Ejm=12" maxlength="1000">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="limpia_Cajas()" data-bs-dismiss="modal">Close</button>
                    </div>

                    <!-- ******************************************************************************************* -->
                </div>

            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<!-- <script src="productos.controller.js"></script>
<script src="productos.model.js"></script> -->
<script src="./productos2.js"></script>
<!-- <script> -->
