<?php
require_once('../Models/cls_productos.model.php');
$productos = new Clase_Productos;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $productos->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ProductoId = $_POST["ProductoId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $productos->uno($ProductoId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Precio_Compra = $_POST["Precio_Compra"];
        $Precio_Venta = $_POST["Precio_Venta"];
        $Iva = $_POST["Iva"];
        $cantidad = $_POST["cantidad"];
        $Unidad_Medida = $_POST["Unidad_Medida"];
        $Fecha = $_POST["Fecha"];
        $Imagen = $_FILES["Imagen"];

        $datos = array(); //defino un arreglo
        $datos = $productos->insertar($Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ProductoId = $_POST["ProductoId"];
        $Nombre = $_POST["Nombre"];
        $Precio_Compra = $_POST["Precio_Compra"];
        $Precio_Venta = $_POST["Precio_Venta"];
        $Iva = $_POST["Iva"];
        $cantidad = $_POST["cantidad"];
        $Unidad_Medida = $_POST["Unidad_Medida"];
        $Fecha = $_POST["Fecha"];
        $Imagen = $_FILES["Imagen"];
        $datos = array(); //defino un arreglo
        $datos = $productos->actualizar($ProductoId, $Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar_imagen':
        $ProductoId = $_POST["ProductoId2"];
        $Imagen = $_FILES["Imagen"];
        try {
            $productos->guardar_imagen($ProductoId);
            echo json_encode("ok");
        } catch (\Throwable $th) {
            echo json_encode("erro");
        }
        break;
    case 'eliminar':
        $ProductoId = $_POST["ProductoId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $productos->eliminar($ProductoId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
