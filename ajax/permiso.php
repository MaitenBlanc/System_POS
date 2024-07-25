<?php
require_once "../models/permiso.php";

$permiso = new Permiso();

$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

switch ($_GET["op"]) {
    case 'listar':
        $response = $permiso->listar();
        $data = array();

        while ($reg = $response->fetch_object()) {
            $data[] = array(
                "0" => $reg->idpermiso,
                "1" => $reg->nombre
            );
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
