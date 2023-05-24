<?php
//Encontrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("Clases/Persona4.php");

// Construir el algoritmo que solicite el nombre y edad de 3 personas y determine el nombre de la persona con mayor edad.
header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];
$nombre = $_DATA["name"];
$edad = $_DATA["age"];

session_start(); // Iniciar la sesión

if (!isset($_SESSION["personas"])) {
    $_SESSION["personas"] = []; // Inicializar el array de personas en la sesión
}

function agregarPersona($nombre, $edad): Persona {
    $persona = new Persona($nombre, $edad);
    $_SESSION["personas"][] = $persona; // Agregar la persona al array en la sesión
    return $persona;
}

function obtenerMayorEdad($personas): string {
    $mayorEdad = $personas[0];
    foreach ($personas as $persona) {
        if ($persona->getEdad() > $mayorEdad->getEdad()) {
            $mayorEdad = $persona;
        }
    }
    return $mayorEdad->getNombre();
}

//Función para validar si se ingresaron las 3 personas
function validarPersonas($personas): string{
    if (count($personas) === 3) {
        $resultado = obtenerMayorEdad($personas);
        return "La persona de mayor edad es: " . $resultado;
    } else {
        return "Persona agregada correctamente.";
    }
}

$res = match($METHOD) {
    "POST" => agregarPersona($nombre, $edad),
};

$mensaje = [
    "mensaje" => validarPersonas($_SESSION["personas"]),
    "data" => $_DATA,
    "resultado" => obtenerMayorEdad($_SESSION["personas"])
];

echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
