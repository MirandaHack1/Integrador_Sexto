<?php
require_once('../html/head2.php');
require_once "../../Models/model.conexion.php";
?>

<div class="row">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Lista de Productos</h5>
            <div class="table-responsive">
                <button type="button" type="hidden" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_categoria" hidden>
                    Nueva Categoria
                </button>
                <br>
                <br>
                <h5>Selecciona los productos para aplicar un descuento</h5>
                <br>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Seleccionar</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">ProductoID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nombre</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Precio</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Descuento</h6>
                            </th>

                        </tr>
                    </thead>
                    <tbody id="tabla_producto">
                        <?php
                        // Realizar la consulta SQL para seleccionar todos los productos
                        $query = "SELECT `ProductoID`, `Nombre`, `Precio`, `Descuento` FROM `productos`";
                        $resultado = mysqli_query($conexion, $query);

                        // Verificar si hay resultados
                        if (mysqli_num_rows($resultado) > 0) {
                            // Mostrar los productos en la tabla HTML
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo '<td> <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  
                                </label>
                              </div> </td>';
                                echo "<td>" . $fila['ProductoID'] . " </td>";
                                echo "<td>" . $fila['Nombre'] . "</td>";
                                echo "<td>" . $fila['Precio'] . "</td>";

                                echo "<td>" . $fila['Descuento'] . "</td>";



                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No se encontraron productos.</td></tr>";
                        }

                        // Liberar el resultado
                        mysqli_free_result($resultado);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>

    <h4>Gestión de Descuentos (%)</h4>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ingrese el % del descuento" aria-label="Ingrese el descuento" aria-describedby="basic-addon2" id="descuentoInput">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="guardarDescuentoBtn" disabled>Guardar</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <button class="btn btn-danger float-right" type="button" id="eliminarDescuentosBtn" disabled>Eliminar Descuentos</button></button>
        </div>
    </div>

</div>







<?php require_once('../html/script2.php') ?>
<script>
$(document).ready(function() {
    // Función para verificar si al menos un producto está seleccionado
    function verificarSeleccion() {
        var alMenosUnoSeleccionado = $('#tabla_producto input[type=checkbox]:checked').length > 0;
        var descuentoIngresado = $('#descuentoInput').val().trim().length > 0;
        $('#guardarDescuentoBtn').prop('disabled', !(alMenosUnoSeleccionado && descuentoIngresado));
        $('#eliminarDescuentosBtn').prop('disabled', !alMenosUnoSeleccionado);
    }

    // Verificar selección de productos al cargar la página
    verificarSeleccion();

    // Verificar selección de productos al hacer clic en un checkbox
    $('#tabla_producto input[type=checkbox]').change(function() {
        verificarSeleccion();
    });

    // Verificar descuento al escribir en el input
    $('#descuentoInput').on('input', function() {
        verificarSeleccion();
    });

    // Guardar descuento
    $('#guardarDescuentoBtn').click(function() {
        var productosSeleccionados = [];
        var precios = [];
        var descuentos = [];
        var descuentoInput = $('#descuentoInput').val();

        // Recopilar los ProductID, precios y descuentos de los productos seleccionados
        $('#tabla_producto input[type=checkbox]:checked').each(function() {
            var productoID = $(this).closest('tr').find('td:eq(1)').text();
            var precio = $(this).closest('tr').find('td:eq(3)').text();
            var descuento = $(this).closest('tr').find('td:eq(4)').text();
            productosSeleccionados.push(productoID);
            precios.push(precio);
            descuentos.push(descuento);
        });

        // Enviar los datos al archivo PHP utilizando AJAX
        $.ajax({
    type: 'POST',
    url: 'aplicar_descuentos.php',
    data: {
        productos: productosSeleccionados,
        precios: precios,
        descuentos: descuentos,
        descuento: descuentoInput
    },
    success: function(response) {
        response = JSON.parse(response);
        if (response.success) {
            Swal.fire({
                icon: 'success',
                title: 'Guardado con éxito',
                text: response.message
            }).then(function() {
                // Recargar la página después de hacer clic en el botón "Aceptar"
                location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message
            });
        }
    },
    error: function(xhr, status, error) {
        // Manejar errores si es necesario
        console.error(xhr.responseText);
    }
});
    });

    $('#eliminarDescuentosBtn').click(function() {
        // Definir arrays para almacenar los datos
        var productoID = [];
        var precios = [];
        var descuentos = [];

        // Iterar sobre cada fila de la tabla de productos
        $('#tabla_producto tr').each(function() {
            // Si el checkbox está marcado
            if ($(this).find('.form-check-input').prop('checked')) {
                // Obtener los datos de la fila actual y agregarlos a los arrays
                productoID.push($(this).find('td:eq(1)').text());
                precios.push($(this).find('td:eq(3)').text());
                descuentos.push($(this).find('td:eq(4)').text());
            }
        });

        // Enviar los datos al archivo PHP mediante una solicitud AJAX
        $.ajax({
            type: "POST",
            url: "eliminar_descuentos.php",
            data: { 
                productoID: productoID,
                precios: precios,
                descuentos: descuentos
            },
            success: function(response) {
                // Si la ejecución es exitosa, mostrar un mensaje
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Los descuentos han sido eliminados con éxito.'
                }).then(function() {
                // Recargar la página después de hacer clic en el botón "Aceptar"
                location.reload();
            });


                


            },
            error: function(xhr, status, error) {
                // Si hay un error, mostrar un mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ha ocurrido un error al intentar eliminar los descuentos.'
                });
            }
        });
    });
});
</script>