<?php
require_once('cls_conexion.model.php');

class Clase_Televisores
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `televisores`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function uno($televisorId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `televisores` WHERE televisorId=$televisorId";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertarTelevisor($marca, $pulgadas, $cantidad, $tasaRefresco)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `televisores`(`marca`, `pulgadas`, `cantidad`, `tasa de refresco`) VALUES ('$marca','$pulgadas','$cantidad','$tasaRefresco')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    
    public function actualizarTelevisor($televisorId, $marca, $pulgadas, $cantidad, $tasaRefresco)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `televisores` SET `marca`='$marca',`pulgadas`='$pulgadas',`cantidad`='$cantidad',`tasa de refresco`='$tasaRefresco' WHERE `televisorId`= $televisorId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }


    public function eliminarTelevisor($televisorId)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `televisores` WHERE televisorId=$televisorId";
        $result = mysqli_query($con, $cadena);
        return "ok";
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}

    
}
?>
