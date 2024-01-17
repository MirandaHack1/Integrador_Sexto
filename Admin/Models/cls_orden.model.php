<?php
require_once('cls_conexion.model.php');
class Clase_Ordenes
{
    // ******************************************************************************************************************************************************************************
    // ******************************************************************************************************************************************************************************
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT ordenes.OrdenID, ordenes.ClienteID, ordenes.DireccionEnvio, ordenes.Estado, ordenes.FechaOrden, ordenes.FormaEnvio, ordenes.Total, clientes.Nombre, clientes.Telefono, clientes.Ciudad, clientes.Pais FROM ordenes INNER JOIN clientes ON ordenes.ClienteID = clientes.ClienteID";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // ******************************************************************************************************************************************************************************
    // ******************************************************************************************************************************************************************************
    public function uno($OrdenID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `ordenes` WHERE OrdenID =$OrdenID";
            // $cadena = "SELECT ordenes.*, clientes.Nombre FROM ordenes INNER JOIN clientes ON ordenes.ClienteID = clientes.ClienteID WHERE ordenes.OrdenID = $OrdenID";

            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // ******************************************************************************************************************************************************************************
    // ******************************************************************************************************************************************************************************
    public function actualizar($OrdenID, $ClienteID, $Total, $FormaEnvio, $DireccionEnvio, $FechaOrden, $Estado)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `ordenes` SET  `ClienteID` ='$ClienteID', `Total`='$Total', `FormaEnvio`='$FormaEnvio', `DireccionEnvio`='$DireccionEnvio', `FechaOrden`='$FechaOrden',`Estado`= '$Estado' WHERE `OrdenID`='$OrdenID'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    // ******************************************************************************************************************************************************************************
    // ******************************************************************************************************************************************************************************
    // public function unover($OrdenID)
    // {
    //     try {
    //         $con = new Clase_Conectar_Base_Datos();
    //         $con = $con->ProcedimientoConectar();
    //         //  $cadena = "SELECT * FROM `ordenes` WHERE OrdenID =$OrdenID";
    //         // $cadena = "SELECT ordenes.*, clientes.Nombre FROM ordenes INNER JOIN clientes ON ordenes.ClienteID = clientes.ClienteID WHERE ordenes.OrdenID = $OrdenID";
    //         $cadena="SELECT *
    //         FROM ordenes
    //         INNER JOIN ordendetalle ON ordenes.OrdenID = ordendetalle.OrdenID
    //         INNER JOIN productos ON ordendetalle.ProductoID = productos.ProductoID WHERE ordenes.OrdenID=$OrdenID";
    //         $result = mysqli_query($con, $cadena);
    //         return $result;
    //     } catch (Throwable $th) {
    //         return $th->getMessage();
    //     } finally {
    //         $con->close();
    //     }
    // }


    public function unover($OrdenID)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();

            $cadena = "SELECT ordenes.*, ordendetalle.Cantidad, ordendetalle.*, productos.*
            FROM ordenes
            INNER JOIN ordendetalle ON ordenes.OrdenID = ordendetalle.OrdenID
            INNER JOIN productos ON ordendetalle.ProductoID = productos.ProductoID WHERE ordenes.OrdenID=$OrdenID";

            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
