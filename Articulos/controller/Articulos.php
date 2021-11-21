<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: o');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/Conexion.php");
    require_once("../models/articulos.php");
    $Articulos = new articulos();

    $body = json_decode(file_get_contents("php://input"), true);
   
    switch($_GET["op"]){

        case"GetArticulos";
            $datos=$Articulos->get_Articulos();
            echo json_encode($datos);
        break;

        case"GetUno";
            $datos= $Articulos->get_Articulo($body["ID_ma_articulos"]);
            echo json_encode($datos);
        break;

        case "InsertArticulo";
            $datos=$Articulos->insert_Articulo($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID"]);
            echo json_encode("Articulo Agregado");
        break;

        case"Delete_articulo";
            $datos= $Articulos->Delete_Articulo($body["ID_ma_articulos"]);
            echo json_encode("Articulo Eliminado");
        break;

        case "update_articulo";
            $datos=$Articulos->update_Articulo($body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID"],$body["ID_ma_articulos"]);
            echo json_encode("Articulo Actualizado");
        break;
    }
?>