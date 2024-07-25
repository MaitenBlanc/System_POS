<?php
require_once "../models/articulo.php";

$articulo = new Articulo();

$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$stock = isset($_POST['stock']) ? limpiarCadena($_POST['stock']) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

// localhost. com?op="case"
switch ($_GET["op"]) {
    case 'guardar_editar':

        if (!file_exists($_FILES["imagen"]["tmp_name"]) || !is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
            $imagen = $_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["type"] == "image/png") {
                $imagen = microtime(true) . "." . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
            }
        }

        if (empty($idarticulo)) {
            $response = $articulo->insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $response ? "Artículo registrado." : "El artículo no se pudo registrar.";
        } else {
            $response = $articulo->editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $response ? "Artículo actualizado." : "El artículo no se pudo actualizar.";
        }
    break;

    case 'desactivar':
        $response = $articulo->desactivar($idarticulo);
        echo $response ? "Artículo desactivado." : "El artículo no se pudo desactivar.";
        break;
    break;

    case 'activar':
        $response = $articulo->activar($idarticulo);
        echo $response ? "Artículo activado." : "El artículo no se pudo activar.";
        break;
    break;

    case 'mostrar':
        $response = $articulo->mostrar($idarticulo);
        echo json_encode($response);
        break;
    break;

    case 'listar':
        $response = $articulo->listar();
        $data = Array();

        while ($resp = $response->fetch_object()) {
            $data[] = array(
                "0" => ($resp->condicion) ? '<button class="btn btn-warning" onclick="mostrar(' . $resp->idarticulo . ')"><i class="fa fa-pencil-alt"></i></button>' .
                    ' <button class="btn btn-danger" onclick="desactivar(' . $resp->idarticulo . ')"><i class="fa fa-times"></i></button>' :
                    '<button class="btn btn-warning" onclick="mostrar(' . $resp->idarticulo . ')"><i class="fa fa-pencil-alt"></i></button>' .
                    ' <button class="btn btn-primary" onclick="activar(' . $resp->idarticulo . ')"><i class="fa fa-check"></i></button>',
                "1" => $resp->nombre,
                "2" => $resp->idcategoria,
                "3" => $resp->codigo,
                "4" => $resp->stock,
                "5" => "<img src='../files/articulos/" . $resp->imagen . "' height='50px' width='50px'>",
                "6" => ($resp->condicion) ? '<p class="label text-success font-weight-bold">Activado</p>' :
                    '<p class="label text-danger font-weight-bold">Desactivado</p>',
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

    case 'selectCategoria':
        require_once "../models/categoria.php";
        $categoria = new Categoria();

        $response = $categoria->select();

        while ($resp = $response->fetch_object()) {
            echo '<option value=' . $resp->idcategoria . '>' . $resp->nombre . '</option>';
        }
    break;
}
