<?php 
class Persona {
    private $nombre;
    private $edad;
    
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        if ($edad < 0 || !is_numeric($edad)) {
            throw new Exception("La edad no puede ser negativa y debe ser un número.");
        }
        $this->edad = $edad;
    }
  
    public function getNombre() {
        return $this->nombre;
    }
  
    public function setNombre($nuevoNombre) {
        $this->nombre = $nuevoNombre;
    }
  
    public function getEdad() {
        return $this->edad;
    }
  
    public function setEdad($nuevaEdad) {
        $this->edad = $nuevaEdad;
    }
}
?>