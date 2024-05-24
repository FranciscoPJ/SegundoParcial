<?php

class Partido_Basquetbol extends Partido{

    private $coef_Penalizacion;
    private $cantInfracciones;


    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones){

        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        
        $this->coef_Penalizacion = 0.75;
        $this->cantInfracciones = $cantInfracciones;
    }

	public function getCoef_Penalizacion() {
		return $this->coef_Penalizacion;
	}

	public function setCoef_Penalizacion($value) {
		$this->coef_Penalizacion = $value;
	}

	public function getCantInfracciones() {
		return $this->cantInfracciones;
	}

	public function setCantInfracciones($value) {
		$this->cantInfracciones = $value;
	}

    public function __toString(){
        
        $info = parent::__toString();
        $info .= "cantidad de infracciones: " . $this->getCantInfracciones() . "\n";
        $info .= "Coef Penalizacion: " . $this->getCoef_Penalizacion();

        return $info;
    }

    /*
    coef = coeficiente_base_partido - (coef_penalización*cant_infracciones);
    */
    public function coeficientePartido(){

        $coefBase = parent::coeficientePartido();
        $coefPenal = $this->getCoef_Penalizacion();
        $cantInfracciones = $this->getCantInfracciones();

        $coefBase -= ($coefPenal * $cantInfracciones);

        return $coefBase;
    }
}
?>