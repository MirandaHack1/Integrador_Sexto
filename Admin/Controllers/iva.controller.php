<?php
require_once('../Models/cls_iva.model.php');
$iva1 = new Clase_porcentaje;
switch ($_GET["op"]) {
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $iva1->todos(); //llamo al modelo de porcentaje e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case "uno":
        $id_iva = $_POST["id_iva"]; //defino una variable para almacenar el id_iva del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $iva1->uno($id_iva); //llamo al modelo de porcentaje e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case 'insertar':
        $porcentaje = $_POST["porcentaje"];
        $datos = array(); //defino un arreglo
        $datos = $iva1->insertar($porcentaje); //llamo al modelo de porcentaje e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case 'actualizar':
        $id_iva = $_POST["id_iva"];
        $porcentaje = $_POST["porcentaje"];
        $datos = array(); //defino un arreglo
        $datos = $iva1->actualizar($id_iva, $porcentaje); //llamo al modelo de porcentaje e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case 'eliminar':
        $id_iva = $_POST["id_iva"]; //defino una variable para almacenar el id_iva del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $iva1->eliminar($id_iva); //llamo al modelo de porcentaje e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************

}
