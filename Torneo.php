<?php
class Torneo{
    private $colecPartidos;
    private $importePremio;

    public function __construct($importePremio) {
        $this->colecPartidos = [];
        $this->importePremio = $importePremio;
    }

	public function getColecPartidos() {
		return $this->colecPartidos;
	}

	public function setColecPartidos($col) {
		$this->colecPartidos = $col;
	}

	public function getImportePremio() {
		return $this->importePremio;
	}

	public function setImportePremio($premio) {
		$this->importePremio = $premio;
	}

    //Ejercicio 4
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $objPartido = null;
        $colPartidos = $this->getColecPartidos();
        $cantidadPartidos = count($colPartidos);
        if (
        $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion()
        &&
        $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()
        ) {
        if ($tipoPartido == "futbol") {
            $objPartido = new Fotbool($cantidadPartidos, $fecha, $objEquipo1, 0, $objEquipo2, 0);
            $colPartidos[] = $objPartido;
            $this->setColecPartidos($colPartidos);
        } else {
            $objPartido = new Basket($cantidadPartidos, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
            $colPartidos[] = $objPartido;
            $this->setColecPartidos($colPartidos);
        }
        }
        return $objPartido;
    }

    //Ejercicio 6
    public function darGanadores($deporte){
        $colGanadores = [];
        $colPartidos = $this->getColecPartidos();

        if ($deporte == "futbol") {
        foreach ($colPartidos as $partido) {
            if ($partido instanceof Fotbool) {
            $colGanadores[] = $partido->darEquipoGanador();
            }
        }
        } else {
        foreach ($colPartidos as $partido) {
            if ($partido instanceof Basket) {
            $colGanadores[] = $partido->darEquipoGanador();
            }
        }
        }
        return $colGanadores;
    }

    //Ejercicio 7
    public function calcularPremioPartido($objPartido){
        $coeficientePartido = $objPartido->coeficientePartido();
        $premioPartido = $coeficientePartido * $this->getImportePremio();
        $equipoGanador = null;
        if ($objPartido->getCantGolesE1() > $objPartido->getCantGolesE2()) {
        $equipoGanador = $objPartido->getObjEquipo1();
        } else {
        $equipoGanador = $objPartido->getObjEquipo2();
        }
        $premioDelGanador = [
        "equipoGanador" => $equipoGanador,
        "premioPartido" => $premioPartido
        ];
        return $premioDelGanador;
    }

    public function __toString(){
        $cadena = "";
        $cadena .= "Partidos: \n";
        foreach ($this->getColecPartidos() as $partido) {
        $cadena .= $partido . "\n\n";
        }
        $cadena .= "Premio: " . $this->getImportePremio() . "\n";
        return $cadena;
    }
}