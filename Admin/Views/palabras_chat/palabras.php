<?php require_once('../html/head2.php') ?>
<h5 class="card-title fw-semibold mb-4">Lista de Palabras</h5>

<div class="table-responsive" style="overflow-x: auto;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_palabras">
        Nuevo Palabras
    </button>
    <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Palabras</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Opciones</h6>
                </th>
            </tr>
        </thead>
        <tbody id="tabla_palabras">

        </tbody>
    </table>
</div>





<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_palabras" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_palabras">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Palabras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="codigo" id="codigo">

                    <div class="form-group">
                        <label for="palabras">Palabras</label>
                        <input type="text" required class="form-control" id="palabras" name="palabras" placeholder="Ejp:Palabras:COMPUTDAORA,PC">
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

<!-- <script src="palabras.controller.js"></script>
<script src="palabras.model.js"></script> -->
<script src="./palabras.js"></script>