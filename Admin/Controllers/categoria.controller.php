<?php
require_once('../Models/cls_categoria.model.php');
$categoria = new Clase_Categoria;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $categoria->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $CategoriaID = $_POST["CategoriaID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $categoria->uno($CategoriaID); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
   
        $Nombre = $_POST["Nombre"];
        $Descripcion = $_POST["Descripcion"];
        $Estado = $_POST["Estado"];
        $datos = array(); //defino un arreglo
        $datos = $categoria->insertar($Nombre, $Descripcion, $Estado); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $CategoriaID = $_POST["CategoriaID"];
        $Nombre = $_POST["Nombre"];
        $Descripcion = $_POST["Descripcion"];
        $Estado = $_POST["Estado"];
        $datos = array(); //defino un arreglo
        $datos = $categoria->actualizar($CategoriaID, $Nombre, $Descripcion,$Estado); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $CategoriaID = $_POST["CategoriaID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $categoria->eliminar($CategoriaID); //llamo al modelo de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
