<?php
require_once('../html/head2.php');
?>

<h5 class="card-title fw-semibold mb-4">Envio de publicidad masiva</h5>
<form id="miFormulario" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="asunto">Asunto:</label>
        <input type="text" class="form-control" id="asunto" name="asunto" required>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label for="mensaje">Mensaje:</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label for="adjuntar">Adjuntar Imagen :</label>
        <input type="file" class="form-control-file" id="adjuntar" name="adjuntar">
    </div>
    <br>
    <br>
    <button type="button" id="enviarBtn" class="btn btn-primary">Enviar</button>
</form>
</div>
</div>
</div>
<div>

</div>
<div class="container mt-5" id="resultadoContainer">
    <!-- Aquí se mostrará la respuesta -->
</div>


</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php require_once('../html/script2.php') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("enviarBtn").addEventListener("click", function () {
        var asunto = document.getElementById("asunto").value;
        var mensaje = document.getElementById("mensaje").value;
        var adjuntar = document.getElementById("adjuntar").files[0]; // Obtiene el archivo adjunto

        // Crear un objeto FormData para enviar los datos
        var formData = new FormData();
        formData.append("asunto", asunto);
        formData.append("mensaje", mensaje);
        formData.append("adjuntar", adjuntar);

        // Realizar una solicitud AJAX para enviar los datos al servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./Publicidad.correo.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Manejar la respuesta del servidor aquí
                document.getElementById("resultadoContainer").innerHTML = xhr.responseText;
                // Mostrar SweetAlert2
                Swal.fire({
                    title: 'Correo(s) enviado(s)',
                    text: 'Se han enviado la publicidad a los correos electrónicos exitosamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Recargar la página
                        location.reload();
                    }
                });
            }
        };
        xhr.send(formData);
    });
</script>
