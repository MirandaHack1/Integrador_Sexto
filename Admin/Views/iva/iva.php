<?php require_once('../html/head2.php') ?>
<h5 class="card-title fw-semibold mb-4">IVA</h5>

<div class="table-responsive" style="overflow-x: auto;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_iva">
        Nuevo iva
    </button>
    <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">iva</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Opciones</h6>
                </th>
            </tr>
        </thead>
        <tbody id="tabla_iva">

        </tbody>
    </table>
</div>





<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_iva" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_iva">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">iva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_iva" id="id_iva">

                    <div class="form-group">
                        <label for="porcentaje">iva</label>
                        <input type="text" required class="form-control" id="porcentaje" name="porcentaje" placeholder="Ejemplo: 12">
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

<!-- <script src="iva.controller.js"></script>
<script src="iva.model.js"></script> -->
<script src="./iva.js"></script>