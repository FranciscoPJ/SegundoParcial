<?php

class Partido_Futbol extends Partido{

    private $coef_Menores;
    private $coef_Juveniles;
    private $coef_Mayores;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2){

        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        
        $this->coef_Menores = 0.13;
        $this->coef_Juveniles = 0.19;
        $this->coef_Mayores = 0.27;
    }

	public function getCoef_Menores() {
		return $this->coef_Menores;
	}

	public function setCoef_Menores($value) {
		$this->coef_Menores = $value;
	}

	public function getCoef_Juveniles() {
		return $this->coef_Juveniles;
	}

	public function setCoef_Juveniles($value) {
		$this->coef_Juveniles = $value;
	}

	public function getCoef_Mayores() {
		return $this->coef_Mayores;
	}

	public function setCoef_Mayores($value) {
		$this->coef_Mayores = $value;
	}

    public function __toString(){
        
        $info = parent::__toString();
        $info .= "Coef Menor: " . $this->getCoef_Menores() . "\n";
        $info .= "Coef Juvenil: " . $this->getCoef_Juveniles() . "\n";
        $info .= "Coef Mayor: " . $this->getCoef_Mayores() . "\n";

        return $info;
    }

    public function coeficientePartido(){
        $categoriaEquipoUno = parent::getObjEquipo1()->getObjCategoria();
        //$categoriaEquipoDos = parent::getObjEquipo2()->getObjCategoria();
        $coeBase = parent::coeficientePartido();
        $coef_Mayor = $this->getCoef_Mayores();
        $coef_Juvenil = $this->getCoef_Juveniles();
        $coef_Menor = $this->getCoef_Menores();
        
        $nuevoCoef = $coeBase / 0.5;

        if($categoriaEquipoUno == "Coef_Menores"){
            
            $nuevoCoef * $coef_Menor;

        }
        elseif($categoriaEquipoUno == "Coef_Juveniles"){
            $nuevoCoef * $coef_Juvenil;
        } 
        else{
            if($categoriaEquipoUno == "Coef_Mayor")
            $nuevoCoef * $coef_Mayor;
        }
        
        return $nuevoCoef;
    }
}