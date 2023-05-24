<?php 
// Construir el algoritmo para determinar el voltaje de un circuito a partir de la resistencia y la intensidad de corriente.
    
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
    //Accedemos a la clase Analizador
    require("Clases/Circuit.php");

    function validacion($_DATA){
        //Instanciamos la clase Analizador
        $circuit = new Circuit($_DATA["resistance"], $_DATA["current"]);
        $res = $circuit->calcularVoltaje();
        return $res;
    }

   
    $res = match($METHOD){
        "POST" => validacion($_DATA)
    };

    $mensaje = (array) [
        "mensaje"=> "Respuesta: $res",
        "data"=> $_DATA,
        "return"=> "La clase retornó $res"
    ];
    echo json_encode($mensaje, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>