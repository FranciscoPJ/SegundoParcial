<?php

class Torneo{
    //Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.
    private $colPartdios; // baquet o futbol
    private $importePremio; 

	public function __construct($colPartdios, $importePremio) {

		$this->colPartdios = $colPartdios;
        $this->importePremio = $importePremio;
	}

	public function getColPartdios() {
		return $this->colPartdios;
	}

	public function setColPartdios($value) {
		$this->colPartdios = $value;
	}

	public function getImportePremio() {
		return $this->importePremio;
	}

	public function setImportePremio($value) {
		$this->importePremio = $value;
	}

    private function mostrarArray($array){
        $lista = "";
        foreach($array as $obj){
            $lista .= $obj . "\n";
        }
        return $lista;
    }

    public function __toString(){
        $colPartidos = $this->getColPartdios();
        $info = "Coleccion de Partidos: " . $this->mostrarArray($colPartidos);
        $info .= "Importe del Premio: " . $this->getImportePremio();

        return $info;
    }

    /*
    Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol. 
    
    El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. 
    
    Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.
    */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        
        $colPartidos = $this->getColPartdios();
        $objPartido = null;

        if($OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores() && $OBJEquipo1->getObjCategoria()->getDescripcion() == $OBJEquipo2->getObjCategoria()->getDescripcion()){

            if($tipoPartido == "futbol"){

                $objPartido = new Partido_Futbol((count($colPartidos) + 1), $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
    
                array_push($colPartidos, $objPartido);
                $this->setColPartdios($colPartidos);
            }
            else {
                if($tipoPartido == "basquetbol")
                $objPartido = new Partido_Basquetbol((count($colPartidos) + 1), $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
    
                array_push($colPartidos, $objPartido);
                $this->setColPartdios($colPartidos);
            }

        }      

        return $objPartido;
    }

    /*
    Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
    */
    public function darGanadores($deporte){ // string parametro
        $colPartdos = $this->getColPartdios();
        $equipoGanador = [];

        foreach($colPartdos as $partido){
            
            if($deporte == "futbol" && $partido instanceof Partido_Futbol){
                
                $equipoFutbol = $partido->darEquipoGanador();
                array_push($equipoGanador, $equipoFutbol);

            }
            else{
                if($deporte == "basquetbol" && $partido instanceof Partido_Basquetbol){
                    
                    $equipoBasquetbol = $partido->darEquipoGanador();
                    array_push($equipoGanador, $equipoBasquetbol);
                }
            }
            
        }

        return $equipoGanador;
    }

    /*
    Implementar el método calcularPremioPartido($OBJPartido) que debe 
    retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo.
    
    (premioPartido = Coef_partido * ImportePremio)
    */
    public function calcularPremioPartido($OBJPartido){
        $colPartidos = $this->getColPartdios();
        $importePartido = $this->getImportePremio();
        $arrayAsociativoPremio = [];
        $encontrado = false;
        $i = 0;

        while($i < count($colPartidos) && !$encontrado){

            $objEquipo = $colPartidos->darEquipoGanador();
            if($objEquipo != null){
                $premioPartido = $importePartido * $objEquipo->coeficientePartido();
                $arrayAsociativoPremio = ["equipoGanador" => $objEquipo , "premioPartido" => $premioPartido];
            }
            $i++;
        }

        return $arrayAsociativoPremio;
    }
}
?>