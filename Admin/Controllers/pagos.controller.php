<?php
require_once('../Models/cls_pagos.model.php');
$pagos = new Clase_Pagos;
switch ($_GET["op"]) {
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $pagos->todos(); //llamo al modelo de palabras e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    // case "uno":
    //     $codigo = $_POST["codigo"]; //defino una variable para almacenar el codigo del usuario, la variable se obtiene mediante POST
    //     $datos = array(); //defino un arreglo
    //     $datos = $pagos->uno($codigo); //llamo al modelo de palabras e invoco al procedimiento uno y almaceno en una variable
    //     $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
    //     echo json_encode($uno); //devuelvo el arreglo en formato json
    //     break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    // case 'insertar':
    //     $palabras = $_POST["palabras"];
    //     $datos = array(); //defino un arreglo
    //     $datos = $pagos->insertar($palabras); //llamo al modelo de palabras e invoco al procedimiento insertar
    //     echo json_encode($datos); //devuelvo el arreglo en formato json
    //     break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    // case 'actualizar':
    //     $codigo = $_POST["codigo"];
    //     $palabras = $_POST["palabras"];
    //     $datos = array(); //defino un arreglo
    //     $datos = $pagos->actualizar($codigo, $palabras); //llamo al modelo de palabras e invoco al procedimiento actual
    //     echo json_encode($datos); //devuelvo el arreglo en formato json
    //     break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************
    // case 'eliminar':
    //     $codigo = $_POST["codigo"]; //defino una variable para almacenar el codigo del usuario, la variable se obtiene mediante POST
    //     $datos = array(); //defino un arreglo
    //     $datos = $pagos->eliminar($codigo); //llamo al modelo de palabras e invoco al procedimiento uno y almaceno en una variable
    //     echo json_encode($datos); //devuelvo el arreglo en formato json
    //     break;
        // ******************************************************************************************************************************************************************************************************************
        // ******************************************************************************************************************************************************************************************************************

}
