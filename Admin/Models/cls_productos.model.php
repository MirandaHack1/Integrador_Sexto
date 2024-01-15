<?php
require_once('cls_conexion.model.php');
class Clase_Productos
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT productos.ProductoID, productos.CodigoReferencia, productos.Nombre, productos.Precio, productos.Descripcion, productos.Imagen, productos.CategoriaID, productos.FechaIngreso, productos.Stock, categorias.Nombre as categorias FROM `productos` inner JOIN categorias on categorias.CategoriaID  = productos.CategoriaID";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ProductoID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `productos` WHERE ProductoID =$ProductoID ";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // public function insertar($ID_Provedores,$Nombre_Producto, $Cantidad, $Precio_Unitario)
    // {
    //     try {
    //         $con = new Clase_Conectar_Base_Datos();
    //         $con = $con->ProcedimientoConectar();
    //         $cadena = "INSERT INTO `inventario`(`ID_Provedores`, `Nombre_Producto`, `Cantidad`, `Precio_Unitario`)VALUES ($ID_Provedores,'$Nombre_Producto', '$Cantidad','$Precio_Unitario')";
    //         $result = mysqli_query($con, $cadena);
    //         return 'ok';
    //     } catch (Throwable $th) {
    //         return $th->getMessage();
    //     } finally {
    //         $con->close();
    //     }
    // }
    public function insertar($ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();

            // Validar si el Nombre_Producto ya existe
            $consulta_existencia = "SELECT COUNT(*) as total FROM `inventario` WHERE `Nombre_Producto` = '$Nombre_Producto'";
            $resultado_existencia = mysqli_query($con, $consulta_existencia);
            $total_existencia = mysqli_fetch_assoc($resultado_existencia)["total"];

            if ($total_existencia > 0) {
                return "Error: El producto '$Nombre_Producto' Ya existe en la base de datos.";
            }

            // Si no existe, proceder con la inserción
            $cadena = "INSERT INTO `inventario`(`ID_Provedores`, `Nombre_Producto`, `Cantidad`, `Precio_Unitario`) VALUES ($ID_Provedores,'$Nombre_Producto', '$Cantidad','$Precio_Unitario')";
            $result = mysqli_query($con, $cadena);

            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }


    public function actualizar($ID_Producto, $ID_Provedores, $Nombre_Producto, $Cantidad, $Precio_Unitario)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `inventario` SET  `ID_Provedores` ='$ID_Provedores', `Nombre_Producto`='$Nombre_Producto', `Cantidad`='$Cantidad', `Precio_Unitario`='$Precio_Unitario'  WHERE `ID_Producto`='$ID_Producto'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_Producto)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE  FROM `inventario` WHERE `ID_Producto`='$ID_Producto'";
            // from inventario where ID_Producto =$ID_Producto ;
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
