<?php
require_once "Clases/Estudiante6.php";
// Encontrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Construir el algoritmo que solicite el nombre y edad de 3 personas y determine el nombre de la persona con mayor edad.
header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

$res = match ($METHOD) {
    "POST" => ejecutar()
};

$mensaje = [
    "mensaje" => "Operación realizada correctamente.",
    "input" => $_DATA,
    "resultado" => $res
];

echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
