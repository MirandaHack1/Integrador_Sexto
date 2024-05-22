<?php
// Verificar si los arrays están definidos y no están vacíos
if(isset($_POST['productoID']) && isset($_POST['precios']) && isset($_POST['descuentos']) &&
   !empty($_POST['productoID']) && !empty($_POST['precios']) && !empty($_POST['descuentos'])) {

    // Obtener los datos de los arrays
    $productoID = $_POST['productoID'];
    $precios = $_POST['precios'];
    $descuentos = $_POST['descuentos'];

    // Conexión a la base de datos
    $host = "localhost";
    $user = "root";
    $clave = "";
    $bd = "integrador_sexto";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");

    // Iterar sobre los datos proporcionados
    for($i = 0; $i < count($productoID); $i++) {
        // Calcular el nuevo precio
        $nuevoPrecio = $precios[$i] / (1 - ($descuentos[$i] / 100));

        // Consulta SQL para actualizar los registros
        $sql = "UPDATE productos SET Precio = $nuevoPrecio, Descuento = 0 WHERE ProductoID = $productoID[$i]";

        // Ejecutar la consulta
        if(mysqli_query($conexion, $sql)) {
            echo "Actualización exitosa para ProductoID: $productoID[$i]<br>";
        } else {
            echo "Error al actualizar ProductoID: $productoID[$i]. Error: " . mysqli_error($conexion) . "<br>";
        }
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Los arrays no están definidos o están vacíos.";
}
?>