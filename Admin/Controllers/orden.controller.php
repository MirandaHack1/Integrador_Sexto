<?php
require_once('../Models/cls_orden.model.php');
$ordenes = new Clase_Ordenes;
switch ($_GET["op"]) {
        // ******************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $ordenes->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************
    case "uno":
        $OrdenID = $_POST["OrdenID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $ordenes->uno($OrdenID); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************
    case 'actualizar':
        $OrdenID = $_POST["OrdenID"];
        $ClienteID = $_POST["ClienteID"];
        $Total = $_POST["Total"];
        $FormaEnvio = $_POST["FormaEnvio"];
        $DireccionEnvio = $_POST["DireccionEnvio"];
        $FechaOrden = $_POST["FechaOrden"];
        $Estado = $_POST["Estado"];
        $datos = array(); //defino un arreglo
        $datos = $ordenes->actualizar($OrdenID, $ClienteID, $Total, $FormaEnvio, $DireccionEnvio, $FechaOrden, $Estado); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************
        // case "unover":
        //     $OrdenID = $_POST["OrdenID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        //     $datos = array(); //defino un arreglo
        //     $datos = $ordenes->uno($OrdenID); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        //     $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        //     echo json_encode($uno); //devuelvo el arreglo en formato json
        //     break;
    case "unover":
        $OrdenID = $_POST["OrdenID"];
        $datos = array();
        $datos = $ordenes->unover($OrdenID);
        $productos = array();

        while ($row = mysqli_fetch_assoc($datos)) {
            $productos[] = $row;
        }

        echo json_encode($productos);
        break;
}
