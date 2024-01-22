<?php require_once('../html/head2.php') ?>
<h5 class="card-title fw-semibold mb-4">Lista de pagos</h5>

<div class="table-responsive" style="overflow-x: auto;">
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_pagos">
        Nuevo pagos
    </button> -->
    <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">id_transaccion</h6>
                </th>

                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">fecha</h6>
                </th>
                
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">email</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nombre cliente</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">total</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">status</h6>
                </th>
            </tr>
        </thead>
        <tbody id="tabla_pagos">

        </tbody>
    </table>
</div>





<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<!-- <div class="modal fade" id="Modal_pagos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_pagos">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">pagos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="codigo" id="codigo">

                    <div class="form-group">
                        <label for="pagos">pagos</label>
                        <input type="text" required class="form-control" id="pagos" name="pagos" placeholder="Ejp:pagos:COMPUTDAORA,PC">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<?php require_once('../html/script2.php') ?>

<!-- <script src="pagos.controller.js"></script>
<script src="pagos.model.js"></script> -->
<script src="./pagos.js"></script>