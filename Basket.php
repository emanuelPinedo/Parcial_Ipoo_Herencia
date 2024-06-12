<?php
class Basket extends Partido{
    private $infraccion;
    private $coefPenalizacion;
        public function __construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2, $infraccion){
            parent::__construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2);
            $this->infraccion = $infraccion;
            $this->coefPenalizacion = 0.75;
        }

        public function getInfraccion() {
            return $this->infraccion;
        }
    
        public function setInfraccion($infra) {
            $this->infraccion = $infra;
        }

        public function getCoefPenalizacion(){
            return $this->coefPenalizacion;
        }

        public function setCoefPenalizacion($coefPenalizacion){
            $this->coefPenalizacion = $coefPenalizacion;
        }

        public function coeficientePartido(){
            $coeficienteBase = parent::coeficientePartido();

            $coefFinal = $coeficienteBase - ($this->getCoefPenalizacion() * $this->getInfraccion());

            return $coefFinal;
        }

        public function __toString(){
        $msj = parent::__toString();
        $msj .= "\nInfracciones: " . $this->getInfraccion();
        return $msj;
    }

}