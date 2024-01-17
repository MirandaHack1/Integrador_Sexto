<?php
require_once('../Models/cls_clientes.model.php');
$clientes = new Clase_Clientes;
switch ($_GET["op"]) {
    // ******************************************************************************************************************************************************************************
    // ******************************************************************************************************************************************************************************
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $clientes->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
   }
