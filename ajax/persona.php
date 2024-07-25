<?php
require_once "../models/persona.php";

$persona = new Persona();

$idpersona = isset($_POST["idpersona"]) ? limpiarCadena($_POST["idpersona"]) : "";
$tipo_persona = isset($_POST["tipo_persona"]) ? limpiarCadena($_POST["tipo_persona"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$tipo_documento = isset($_POST["tipo_documento"]) ? limpiarCadena($_POST["tipo_documento"]) : "";
$num_documento = isset($_POST["num_documento"]) ? limpiarCadena($_POST["num_documento"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";

switch ($_GET["op"]) {
    case 'guardar_editar':
        if (empty($idpersona)) {
            $response = $persona->insertar($tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email);
            echo $response ? "Persona registrada." : "La persona no se pudo registrar.";
        } else {
            $response = $persona->editar($idpersona, $tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email);
            echo $response ? "Persona actualizada." : "La persona no se pudo actualizar.";
        }
    break;

    case 'eliminar':
        $response = $persona->eliminar($idpersona);
        echo $response ? "Persona eliminada." : "La persona no se pudo eliminar.";
        break;
    break;

    case 'mostrar':
        $response = $persona->mostrar($idpersona);
        echo json_encode($response);
        break;
    break;

    case 'listarp':
        $response = $persona->listarp();
        $data = Array();

        while ($resp = $response->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $resp->idpersona . ')"><i class="fa fa-pencil-alt"></i></button>' .
                       ' <button class="btn btn-danger" onclick="eliminar(' . $resp->idpersona . ')"><i class="fa fa-trash"></i></button>',
                "1" => $resp->nombre,
                "2" => $resp->tipo_documento,
                "3" => $resp->num_documento,
                "4" => $resp->telefono,
                "5" => $resp->email
            );
        }

        $result = array(
            "echo" => 1,
            "totalrecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($result);
    break;

    case 'listarc':
        $response = $persona->listarc();
        $data = Array();

        while ($resp = $response->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="mostrar(' . $resp->idpersona . ')"><i class="fa fa-pencil-alt"></i></button>' .
                       ' <button class="btn btn-danger" onclick="eliminar(' . $resp->idpersona . ')"><i class="fa fa-trash"></i></button>',
                "1" => $resp->nombre,
                "2" => $resp->tipo_documento,
                "3" => $resp->num_documento,
                "4" => $resp->telefono,
                "5" => $resp->email
            );
        }

        $result = array(
            "echo" => 1,
            "totalrecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($result);
    break;
}
