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
        if($objEquipo1 instanceof Fotbool && $objEquipo2 instanceof Fotbool || $objEquipo1 instanceof Basket && $objEquipo2 instanceof Basket){
            if (!$this->mismaCategoriaYCantJug($objEquipo1, $objEquipo2)) {
                $partido = null;
            } else {
                $id = count($this->getColecPartidos()) + 1;
                if($tipoPartido === 'Futbol'){
                    $partido = new Fotbool($id, $fecha, $objEquipo1, 0, $objEquipo2, 0);//0 son los goles
                } elseif ($tipoPartido === 'Basquetbol'){
                    $partido = new Basket($id, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
                }
                $this->colecPartidos[] = $partido;
            }
            return $partido;
        }
    }

    //private funcion para verificar q tengan mismas caracterísitcas
    private function mismaCategoriaYCantJug($equipo1, $equipo2){
        return ($equipo1->getObjCategoria()->getDescripcion() === $equipo2->getObjCategoria()->getDescripcion() &&
                $equipo1->getCantJugadores() === $equipo2->getCantJugadores());
    }

    //Ejercicio 6
    public function darGanadores($deporte) {
        $colecPart = $this->getColecPartidos();
        $equiposGanadores = [];

        foreach ($colecPart as $partido) {
            if ($deporte === 'Futbol' && $partido instanceof Fotbool) {
                $equipoGanador = $partido->darEquipoGanador();
                $equiposGanadores[] = $equipoGanador;
            } elseif ($deporte === 'Basquetbol' && $partido instanceof Basket) {
                $equipoGanador = $partido->darEquipoGanador();
                $equiposGanadores[] = $equipoGanador;
            }
        }

        return $equiposGanadores;
    }

    public function imprimirArray($col){
        $msj = "";
        foreach ($col as $obj){
            $msj .= $obj;
        }
        return $msj;
    }

    //Ejercicio 7
    public function calcularPremioPartido($objPartido){
        $coeficiente = $objPartido->coeficientePartido(); 
        $partidoGanador = $objPartido->darEquipoGanador();
        $importePremio = $this->getImportePremio(); 
        $premioPartido = $coeficiente * $importePremio; 
        $premio = ['EquipoGanador' => $partidoGanador, 'PremioPartido'=> $premioPartido];
        return $premio;
    }

    public function __toString() {
        $cadena = "Partidos:\n";
        foreach ($this->colecPartidos as $partido) {
            $cadena .= $partido . "\n";
        }
        return $cadena;
    }

}