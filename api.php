<?php
/* <?php
// Construir el algoritmo para un programa que ingrese tres
// notas de un alumno, si el promedio es menor o igual a 3.9
// mostrar un mensaje "Estudie“, de lo contrario un mensaje que
// diga "becado"
header("Content-Type: application/json; charset:UTF-8");
$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function validacion($arg){
    return ($arg<=3.9) ? "Estudie" : "becado";
}
function algoritmo(float $nota, float $nota2, float $nota3){
    $promedio = ($nota+$nota2+$nota3)/3;
    return validacion($promedio);;
}
try {
    $res = match($METHOD){
        "POST" => algoritmo(...$_DATA)
    };
} catch (\Throwable $th) {
    $res = "Error";
}
$mensaje = (array) [
    "mensaje"=> validacion($res),
    "notas"=> $_DATA,
    "promedio"=> $res
];

echo json_encode($mensaje,JSON_PRETTY_PRINT);
?> */




    // Construir el algoritmo para un programa que ingrese tres
    // notas de un alumno, si el promedio es menor o igual a 3.9
    // mostrar un mensaje "Estudie“, de lo contrario un mensaje que
    // diga "becado"
    header("Content-Type: application/json; charset:UTF-8");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    function validacion(){
        $arg = func_num_args();
        $arg = array_pop($arg);
        ($arg<=3.9) ? "Estudie" : "becado";
    }
    function promedio(){
        var_dump(func_num_args());
        $arg = func_num_args();
        $arg = array_pop($arg);
        $suma = (float) 0;
        foreach ($arg as $key => $value) {
            if(!is_numeric($value)){
                $suma=0;
                break;
            }else{
                $suma += $value;
            }
        }
        return $suma;
    }
    function algoritmo($nota, $nota2, $nota3){
        $res = promedio();
        return (float) $res/count($_DATA);
    }
   
    $res = match($METHOD){
        "POST" => algoritmo(...$_DATA)
    };

    $mensaje = (array) [
        "mensaje"=> validacion($res),
        "notas"=> $_DATA,
        "promedio"=> $res
    ];

    // echo json_encode($mensaje,JSON_PRETTY_PRINT);

    class Operacion{

        //Definimos el constructor de la clase
        function __construct(){
            print "La clase ha sido inicializada".__CLASS__."\n";
        }
        //Definimos el destructor de la clase
        //El destructor se utiliza para liberar recursos que se hayan reservado en el constructor de la clase o en cualquier otro método de la clase y que ya no sean necesarios para el programa.
        function __destruct(){
            print "La clase ha sido destruida".__CLASS__."\n";
        }

        //Funcion para recibir un JSON y convertirlo a objeto para poder acceder a sus atributos
        public function jsonToObject(string $json): object{
            $obj = json_decode($json);
            return $obj;
        }

        //Funcion para recibir un JSON y convertirlo a objeto para poder acceder a sus atributos utilizando func_get_arg
        public function jsonToObject2(): object{
            $obj = json_decode(func_get_arg(0));
            return $obj;
        }

    }
?>