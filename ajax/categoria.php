<?php
require_once "../models/categoria.php";

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

// localhost. com?op="case"
switch ($_GET["op"]) {
    case 'guardar_editar':
        if(empty($idcategoria)){
            $response = $categoria->insertar($nombre, $descripcion);
            echo $response ? "Categoría registrada." : "La categoría no se pudo registrar.";
        } else {
            $response = $categoria->editar($idcategoria, $nombre, $descripcion);
            echo $response ? "Categoría actualizada." : "La categoría no se pudo actualizar.";
        }
    break;

    case 'desactivar':
        $response = $categoria->desactivar($idcategoria);
        echo $response ? "Categoría desactivada." : "La categoría no se pudo desactivar.";
        break;
    break;    

    case 'activar':
        $response = $categoria->activar($idcategoria);
        echo $response ? "Categoría activada." : "La categoría no se pudo activar.";
        break;
    break;

    case 'mostrar':
        $response = $categoria->mostrar($idcategoria);
        echo json_encode($response);
        break;
    break;

    case 'listar':
        $response = $categoria->listar();
        $data = Array();

        while($resp = $response->fetch_object()) {
            $data[] = array(
                "0" => ($resp->condicion) ? '<button class="btn btn-warning" onclick="mostrar('.$resp->idcategoria.')"><i class="fa fa-pencil-alt"></i></button>'.
                       ' <button class="btn btn-danger" onclick="desactivar('.$resp->idcategoria.')"><i class="fa fa-times"></i></button>' :
                       '<button class="btn btn-warning" onclick="mostrar('.$resp->idcategoria.')"><i class="fa fa-pencil-alt"></i></button>'.
                       ' <button class="btn btn-primary" onclick="activar('.$resp->idcategoria.')"><i class="fa fa-check"></i></button>',
                "1" => $resp->nombre,
                "2" => $resp->descripcion,
                "3" => ($resp->condicion) ? '<p class="label text-success font-weight-bold">Activado</p>' : 
                                            '<p class="label text-danger font-weight-bold">Desactivado</p>',
            );
        }

        $result = array(
            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data
        );
        echo json_encode($result);
    break;

    }

?>