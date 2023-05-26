<?php
// Encontrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("Clases/Calculadora5.php");

// Construir el algoritmo que solicite el nombre y edad de 3 personas y determine el nombre de la persona con mayor edad.
header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];
global $num1;
global $num2;
$num1 = $_DATA["num1"];
$num2 = $_DATA["num2"];
function ejecutar($num1, $num2) {
    $calculadora = new Calculadora($num1, $num2);
    $res= $num1>= $num2 ? $calculadora->sumarYRestar() : $calculadora->multiplicarYDividir();
    return $res;
  }

$res = match ($METHOD) {
    "POST" => ejecutar($num1, $num2)
};

$mensaje = [
    "mensaje" => "Operación realizada correctamente.",
    "input" => $_DATA,
    "resultado" => $res
];

echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>