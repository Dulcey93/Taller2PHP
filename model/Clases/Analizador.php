<?php
class Analizador {
    //Definimos el constructor que recibe el numero
    public function __construct($number) {
        $this->number = $number;
    }
    //El método recibe el numero que se ingresó en el constructor y analiza si es par o impar
    public function parImpar(): string {
        /* $result = (string) "";
        $result = ["es impar", "es par"][$this->number % 2] + " y " + ($this->number > 10 ? "es mayor que 10" : "no es mayor que 10"); */

        $result = "";

        if ($this->number % 2 == 0) {
            $result .= "$this->number es par. ";
        } else {
            $result .= "$this->number es impar. ";
        }

        if ($this->number > 10) {
            $result .= "$this->number es mayor que 10.";
        } else {
            $result .= "$this->number no es mayor que 10.";
        }

        return $result;
    }
}
?>