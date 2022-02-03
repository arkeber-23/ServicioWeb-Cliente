<?php
#permitir acceso desde otros dominios
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


$metodo = $_SERVER['REQUEST_METHOD'];
$resultado = array();

switch ($metodo) {
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'), true);
        //$resultado['datos'] =  json_encode($datos);
        if ($datos['selector'] == 1) {
            $resultado['datos'] = suma($datos['num1'], $datos['num2']);
            break;
        }
        if ($datos['selector'] == 2) {
            $resultado['datos'] = resta($datos['num1'], $datos['num2']);
            break;
        }
        if ($datos['selector'] == 3) {
            $resultado['datos'] = multiplicacion($datos['num1'], $datos['num2']);
            break;
        }
        if ($datos['selector'] == 4) {
            if ($datos['num2'] != 0) {
                $resultado['datos'] = division($datos['num1'], $datos['num2']);
            } else {
                $resultado['datos'] = "Error";
            }

            break;
        }
        break;
}

function suma($num1, $num2)
{
    return $num1 + $num2;
}
function resta($num1, $num2)
{
    return $num1 - $num2;
}
function multiplicacion($num1, $num2)
{
    return $num1 * $num2;
}
function division($num1, $num2)
{
    return $num1 / $num2;
}

echo json_encode($resultado);
