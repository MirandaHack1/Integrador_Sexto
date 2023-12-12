<?php
require_once('cls_conexion.model.php');
class Clase_Productos
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Productos`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ProductoId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Productos` WHERE ProductoId=$ProductoId";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha)
    {
        try {
            $produpdate = new Clase_Productos();
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `Productos`( `Nombre`, `Precio_Compra`, `Precio_Venta`, `Iva`, `cantidad`, `Unidad_Medida`, `Imagen`, `Fecha`) VALUES ('$Nombre','$Precio_Compra','$Precio_Venta',$Iva,$cantidad,'$Unidad_Medida','$Imagen','$Fecha')";
            $result = mysqli_query($con, $cadena);
            $iultimoid = mysqli_insert_id($con);
           $produpdate->guardar_imagen($iultimoid);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
   
    public function actualizar($ProductoId, $Nombre, $Precio_Compra, $Precio_Venta, $Iva, $cantidad, $Unidad_Medida, $Imagen, $Fecha)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `Productos` SET `Nombre`='$Nombre',`Precio_Compra`='$Precio_Compra',`Precio_Venta`='$Precio_Venta',`Iva`=$Iva,`cantidad`=$cantidad,`Unidad_Medida`='$Unidad_Medida',`Fecha`='$Fecha' WHERE `ProductoId`='$ProductoId'";
            //$cadena = "UPDATE `Productos` SET `Nombre`='$Nombre',`Precio_Compra`='$Precio_Compra',`Precio_Venta`='$Precio_Venta',`Iva`=$Iva,`cantidad`=$cantidad,`Unidad_Medida`='$Unidad_Medida',`Imagen`='$Imagen',`Fecha`=CURDATE() WHERE `ProductoId`='$ProductoId'";
            $result = mysqli_query($con, $cadena);
            $produpdate = new Clase_Productos();
            $produpdate->guardar_imagen($ProductoId);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function guardar_imagen($iultimoid){
        if ($_FILES["Imagen"]["tmp_name"] != '') {
            $extension = explode('.', $_FILES["Imagen"]["name"]); //split     osito.jpg     [osito , jpg]
            $nuevo_nombre = $iultimoid . '.' . $extension[1]; //1.jpg
            $destino = "../Public/assets/images/products/" . $nuevo_nombre;
            move_uploaded_file($_FILES["Imagen"]["tmp_name"], $destino);
            $produpdate = new Clase_Productos();
            $produpdate->actualizarImagen("../".$destino, $iultimoid);
        }

    }

    public function actualizarImagen($destino, $iultimoid)
    {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Productos` SET `Imagen`='$destino' WHERE `ProductoId`=$iultimoid";
        $result = mysqli_query($con, $cadena);
    }

    public function eliminar($ProductoId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from Productos where ProductoId=$ProductoId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
