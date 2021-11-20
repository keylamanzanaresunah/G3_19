<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');
    
require_once("../../Config/conexion.php");
require_once("../../Socios/Models/Proveedores.php");
$proveedores = new Proveedores();

$body =json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case  "Getsocios":
        $datos=$proveedores->get_socios();
        echo json_encode($datos);
    break;

    case "Getsocio":
        $datos=$proveedores->get_socio($body["id"]);
        echo json_encode($datos);
    break;

    case "Insertsocio":
    $datos=$proveedores->insert_socio($body["nombre"],$body["razon_social"],$body["direccion"],$body["contacto"],$body["email"],$body["telefono"]);
        echo json_encode("Socio Agregado");
    break;

    case "Deletesocio":
        $datos=$proveedores->delete_socio($body["id"]);
        echo json_encode("Socio Eliminado");
    break;

    case "Actualizarsocio":
        $datos=$proveedores->Actualizar_socio($body["nombre"],$body["razon_social"],$body["direccion"],$body["contacto"],$body["email"],$body["telefono"],$body["id"]);
        echo json_encode("Socio Actualizado");
    break;



}

?>