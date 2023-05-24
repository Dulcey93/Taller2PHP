<?php 
class Circuit {
    private $resistance;
    private $current;
    private $voltage;
    
    public function __construct($resistance, $current) {
        $this->resistance = $resistance;
        $this->current = $current;
        $this->voltage = 0;
    }
  
    public function calcularVoltaje(): string {
        if (!is_numeric($this->resistance) || !is_numeric($this->current)) {
            throw new Exception('La resistencia y la corriente deben ser números.');
        }
        $this->voltage = $this->current * $this->resistance;

        return "El voltaje del circuito es $this->voltage V.";
    }
  
    public function getResistance() {
        return $this->resistance;
    }
  
    public function setResistance($value) {
        if (!is_numeric($value) || $value <= 0) {
            throw new Exception('El valor de la resistencia debe ser un número positivo.');
        }
        $this->resistance = $value;
    }
  
    public function getCurrent() {
        return $this->current;
    }
  
    public function setCurrent($value) {
        if (!is_numeric($value) || $value <= 0) {
            throw new Exception('El valor de la corriente debe ser un número positivo.');
        }
        $this->current = $value;
    }
  
    public function getVoltage() {
        return $this->voltage;
    }
}


?>