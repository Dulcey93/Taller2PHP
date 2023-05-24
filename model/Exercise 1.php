<?php
    // Construir el algoritmo para un programa que ingrese tres
    // notas de un alumno, si el promedio es menor o igual a 3.9
    // mostrar un mensaje "Estudie“, de lo contrario un mensaje que
    // diga "becado"
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    function validacion($res){
        return ($res<=3.9) ? "Estudie" : "becado";
    }
    function promedio($_DATA){
        $suma = (float) 0;
        foreach ($_DATA as $key => $value) {
            if(!is_numeric($value)){
                $suma=0;
                break;
            }else{
                $suma += $value;
            }
        }
        return $suma;
    }
    function algoritmo($_DATA){
        $res = promedio($_DATA);
        $res = ($res==0) ? 0 : $res/count($_DATA);
        return $res;
    }
   
    $res = match($METHOD){
        "POST" => algoritmo($_DATA)
    };

    $mensaje = (array) [
        "mensaje"=> validacion($res),
        "notas"=> $_DATA,
        "promedio"=> $res
    ];
    echo json_encode($mensaje, JSON_PRETTY_PRINT);
?>