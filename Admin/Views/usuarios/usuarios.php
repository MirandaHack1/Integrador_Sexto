<?php require_once('../html/head2.php') ?>









<h5 class="card-title fw-semibold mb-4">Lista de Usuarios</h5>

<div class="table-responsive" style="overflow-x: auto;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_usuario">
        Nuevo Usuario
    </button>
    <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">#</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nombres</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Apellidos</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Rol</h6>
                </th>
                <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Opciones</h6>
                </th>
            </tr>
        </thead>
        <tbody id="tabla_usuarios">

        </tbody>
    </table>
</div>





<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_usuarios">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="UsuarioId" id="UsuarioId">


                    <div class="form-group">
                        <label for="Cédula">Cédula</label>
                        <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cédula">
                        <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" required class="form-control" id="Nombres" name="Nombres" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="Apellidos">Apellidos</label>
                        <input type="text" required class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" required class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <select name="Rol" id="Rol" class="form-control">
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>
                            <!-- <option value="Cliente">Cliente</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Cajero">Cajero</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" required onfocusout="verifica_correo()" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                        <div class="alert alert-danger d-none" role="alert" id="CorreoRepetido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Contrasenia">Contraseña</label>
                        <input type="password" required onfocusout="verifica_contrasenias()" class="form-control" id="Contrasenia" name="Contrasenia" placeholder="Contrasenia">
                        <div class="alert alert-danger d-none" role="alert" id="errorContrasenia">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Repita su contraseña</label>
                        <input type="password" required class="form-control" onfocusout="verifica_contrasenias()" id="Contrasenia2" placeholder="Contrasenia2">
                        <div class="alert alert-danger d-none" role="alert" id="errorContrasenia">
                        </div>
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

<script src="usuarios.controller.js"></script>
<script src="usuarios.model.js"></script>
<script>
            /*-------------------------------------------------------------solo letras------------------------------------*/
            // Función para bloquear la entrada de números en un campo de texto
            function blockNumbersInput(inputElement) {
                inputElement.addEventListener('keydown', (event) => {
                    // Obtener el código de la tecla pulsada
                    const keyCode = event.which || event.keyCode;

                    // Permitir las teclas de control (por ejemplo, las teclas de flecha, retroceso, etc.)
                    if (event.ctrlKey || event.altKey || event.metaKey || keyCode === 8 || keyCode === 9) {
                        return;
                    }

                    // Bloquear la entrada si la tecla es un número (códigos de teclas del 0 al 9 y teclado numérico)
                    if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105)) {
                        event.preventDefault();
                    }
                });
            }

            // Obtener la referencia a los elementos de entrada de nombres y apellidos
            const nombreInputElement = document.getElementById('Nombres');
            const apellidoInputElement = document.getElementById('Apellidos');

            // Aplicar la restricción de no permitir números en ambos campos
            blockNumbersInput(nombreInputElement);
            blockNumbersInput(apellidoInputElement);


            /*-------------------------------------------------------------solo numeross------------------------------------*/

            // Función para bloquear la entrada que no sea números en un campo de texto
            function blockNonNumbersInput(inputElement) {
                inputElement.addEventListener('keydown', (event) => {
                    // Obtener el código de la tecla pulsada
                    const keyCode = event.which || event.keyCode;

                    // Permitir las teclas de control (por ejemplo, las teclas de flecha, retroceso, etc.)
                    if (event.ctrlKey || event.altKey || event.metaKey || keyCode === 8 || keyCode === 9) {
                        return;
                    }

                    // Bloquear la entrada si la tecla no es un número (códigos de teclas del 0 al 9 y teclado numérico)
                    if (!((keyCode >= 48 && keyCode <= 57) || (keyCode >= 96 && keyCode <= 105))) {
                        event.preventDefault();
                    }
                });
            }

            // Obtener la referencia a los elementos de entrada de nombres y apellidos
            const telefonoInputElement = document.getElementById('Cedula');
            const pesoInputElement = document.getElementById('Telefono');


            // Aplicar la restricción de solo permitir números en ambos campos
            blockNonNumbersInput(telefonoInputElement);
            blockNonNumbersInput(pesoInputElement);



            /*-------------------------------------------------------------solo numeros y Punto------------------------------------*/

            // Función para bloquear la entrada que no sean números y puntos en un campo de texto
            function blockNonNumbersAndDecimalInput(inputElement) {
                inputElement.addEventListener('keydown', (event) => {
                    // Obtener el código de la tecla pulsada
                    const keyCode = event.which || event.keyCode;

                    // Permitir las teclas de control (por ejemplo, las teclas de flecha, retroceso, etc.)
                    if (event.ctrlKey || event.altKey || event.metaKey || keyCode === 8 || keyCode === 9) {
                        return;
                    }

                    // Permitir números y el punto decimal (códigos de teclas del 0 al 9, teclado numérico y el punto)
                    if (
                        (keyCode >= 48 && keyCode <= 57) || // Números desde el teclado principal
                        (keyCode >= 96 && keyCode <= 105) || // Números desde el teclado numérico
                        keyCode === 110 || keyCode === 190 // Punto decimal (tanto el punto como el numpad decimal)
                    ) {
                        // Verificar que no haya más de un punto decimal en el campo
                        if ((keyCode === 110 || keyCode === 190) && inputElement.value.includes('.')) {
                            event.preventDefault();
                        }
                    } else {
                        event.preventDefault();
                    }
                });
            }

            // Obtener la referencia a los elementos de entrada de nombres y apellidos
            const alturaInputElement = document.getElementById('Precio');

            // Aplicar la restricción de solo permitir números y puntos en ambos campos
            blockNonNumbersAndDecimalInput(alturaInputElement);


            /*-------------------------------------------------------------FIN------------------------------------*/
        </script>