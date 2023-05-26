<?php
class Estudiante {
    public $nombre;
    public $sexo;
    public $notaDefinitiva;

    public function __construct($nombre, $sexo, $notaDefinitiva) {
        $this->nombre = $nombre;
        $this->sexo = $sexo;
        $this->notaDefinitiva = $notaDefinitiva;
    }

    public static function encontrarMayorNota($estudiantes) {
        return array_reduce($estudiantes, function ($estudianteMayorNota, $estudiante) {
            return $estudiante->notaDefinitiva > $estudianteMayorNota->notaDefinitiva ? $estudiante : $estudianteMayorNota;
        }, $estudiantes[0]);
    }

    public static function encontrarMenorNota($estudiantes) {
        return array_reduce($estudiantes, function ($estudianteMenorNota, $estudiante) {
            return $estudiante->notaDefinitiva < $estudianteMenorNota->notaDefinitiva ? $estudiante : $estudianteMenorNota;
        }, $estudiantes[0]);
    }

    public static function contarHombresMujeres($estudiantes) {
        $hombres = array_filter($estudiantes, function ($estudiante) {
            return $estudiante->sexo === "Hombre";
        });

        $mujeres = array_filter($estudiantes, function ($estudiante) {
            return $estudiante->sexo === "Mujer";
        });

        return ['hombres' => $hombres, 'mujeres' => $mujeres];
    }
}
?>
