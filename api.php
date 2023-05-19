<?php
    // Construir el algoritmo para un programa que ingrese tres
    // notas de un alumno, si el promedio es menor o igual a 3.9
    // mostrar un mensaje "Estudie“, de lo contrario un mensaje que
    // diga "becado"
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
/*     function suma($acun, $number):mixed{
        $acun += $number;
        return $acun;
    } */
    //Puedo reducir el código si llamo a la función array_sum, en lugar de mandar la funcion "suma" al array_reduce
    //PDTT: me gané un punto por esta idea
/*     $promedio = (float) array_reduce($_DATA, "suma")/count($_DATA); */
    $promedio = (float) array_sum($_DATA)/count($_DATA);
    $res = (array) [
        "mensaje"=> ($promedio<=3.9) ? "Estudie" : "becado",
        "notas"=> $_DATA,
        "promedio"=> $promedio
    ];
    echo json_encode($res, JSON_PRETTY_PRINT);
?>