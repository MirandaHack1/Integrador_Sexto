<?php
require_once "../../Models/model.conexion.php";

$descuento = $_POST['descuento'];
$productos = $_POST['productos'];
$precios = $_POST['precios'];
$descuentos = $_POST['descuentos'];

// Verificar si algún descuento es mayor que 0
$descuentoMayorQueCero = false;
foreach ($descuentos as $desc) {
    if ($desc > 0) {
        $descuentoMayorQueCero = true;
        break;
    }
}

// Si hay descuento mayor que cero, mostrar alerta y salir
if ($descuentoMayorQueCero) {
    echo json_encode(array('success' => false, 'message' => 'No se pudo agregar un descuento porque ya tiene.'));
    exit();
}

// Actualizar precios y descuentos
for ($i = 0; $i < count($productos); $i++) {
    $precioConDescuento = $precios[$i] * (1 - ($descuento / 100));
    $query = "UPDATE `productos` SET `Precio` = '$precioConDescuento', `Descuento` = '$descuento' WHERE `ProductoID` = '$productos[$i]'";
    mysqli_query($conexion, $query);
}

echo json_encode(array('success' => true, 'message' => 'Descuento aplicado correctamente.'));
?>