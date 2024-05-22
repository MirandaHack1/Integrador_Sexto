<?php
require_once('../Models/cls_productos2.model.php');
require_once('../Models/cls.imagen.model.php');
$productos = new Clase_Productos;
$subirfoto = new SubirFoto;
switch ($_GET["op"]) {
    
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $productos->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

        case 'todos1':
            $datos = array(); //defino un arreglo
            $datos = $productos->todos1(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
            while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
                $todos[] = $fila;
            }
            echo json_encode($todos); //devuelvo el arreglo en formato json
            break;

    case "uno":
        $ProductoID=$_POST["ProductoID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $productos->uno($ProductoID); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;

    case 'insertar':
        $CodigoReferencia=$_POST["CodigoReferencia"];
        $Nombre = $_POST["Nombre"];
        $Precio = $_POST["Precio"];
        $Descripcion = $_POST["Descripcion"];

        if ($_FILES['Imagen'] != '') {
            $Imagen = $_FILES['Imagen'];
            $direccionimg = $subirfoto->guardar($Imagen);
            $Imagen = '';
            $Imagen = $direccionimg;
        }
        $CategoriaID=$_POST["CategoriaID"];
        $FechaIngreso = $_POST["FechaIngreso"];
        $Stock = $_POST["Stock"];
        $Iva = $_POST["Iva"];
        $Descuento=0;

        $datos = array(); //defino un arreglo
        $datos = $productos->insertar($CodigoReferencia, $Nombre, $Precio, $Descripcion, $Imagen, $CategoriaID, $FechaIngreso, $Stock, $Iva,  $Descuento); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ProductoID=$_POST["ProductoID"];
        $CodigoReferencia = $_POST["CodigoReferencia"];
        $Nombre = $_POST["Nombre"];
        $Precio = $_POST["Precio"];
        $Descripcion = $_POST["Descripcion"];
        //procedimeinto para guardar la imagen en los archivos del proyecto

        if ($_FILES['Imagen'] != '') {
            $Imagen = $_FILES['Imagen'];
            $direccionimg = $subirfoto->guardar($Imagen);
            $Imagen = '';
            $Imagen = $direccionimg;
        }
        $CategoriaID=$_POST["CategoriaID"];
        $FechaIngreso = $_POST["FechaIngreso"];
        $Stock = $_POST["Stock"];
        $Iva = $_POST["Iva"];
        $Descuento=0;
        $datos = array(); //defino un arreglo
        $datos = $productos->actualizar($ProductoID,$CodigoReferencia, $Nombre, $Precio, $Descripcion, $Imagen, $CategoriaID, $FechaIngreso, $Stock, $Iva, $Descuento); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

    case 'eliminar':
        $ProductoID=$_POST["ProductoID"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $productos->eliminar($ProductoID); //llamo al modelo de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
   
}
