<?php
require_once('../Models/cls_televisores.model.php'); 

$televisores = new Clase_Televisores; 

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $televisores->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $televisorId = $_POST["televisorId"]; 
        $datos = array();
        $datos = $televisores->uno($televisorId);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $marca = $_POST["marca"];
        $pulgadas = $_POST["pulgadas"];
        $cantidad = $_POST["cantidad"];
        $tasaRefresco = $_POST["tasaRefresco"];

        $datos = array();
        $datos = $televisores->insertarTelevisor($marca, $pulgadas, $cantidad, $tasaRefresco);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $televisorId = $_POST["televisorId"];
        $marca = $_POST["marca"];
        $pulgadas = $_POST["pulgadas"];
        $cantidad = $_POST["cantidad"];
        $tasaRefresco = $_POST["tasaRefresco"];

        $datos = array();
        $datos = $televisores->actualizarTelevisor($televisorId, $marca, $pulgadas, $cantidad, $tasaRefresco);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $televisorId = $_POST["televisorId"];
        $datos = array();
        $datos = $televisores->eliminarTelevisor($televisorId);
        echo json_encode($datos);
        break;
}
?>
