<?php
    // Dado un número indicar si es par o impar y si es mayor de 10.
    // Escuchamos la petición que nos envía el cliente en el json
    
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
    //Accedemos a la clase Analizador
    require("Clases/Analizador.php");
    //Validamos que el dato ingresado sea un número
    function validacion($_DATA){
        $data = is_numeric($_DATA["numero"]) ? $_DATA["numero"] : 0;
        //Instanciamos la clase Analizador
        $resultado = new Analizador($data);
        $res = $resultado->parImpar();
        return $res;
    }

   
    $res = match($METHOD){
        "POST" => validacion($_DATA)
    };

    $mensaje = (array) [
        "mensaje"=> "Esta es mi respuesta: ".$res,
        "data"=> $_DATA,
        "return"=> $res
    ];
    echo json_encode($mensaje, JSON_PRETTY_PRINT);
    
?>