<?php
class Basket extends Partido{
    private $infraccion;
        public function __construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2, $infraccion){
            parent::__construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2);
            $this->infraccion = $infraccion;
        }

        public function getInfraccion() {
            return $this->infraccion;
        }
    
        public function setInfraccion($infra) {
            $this->infraccion = $infra;
        }

        public function __toString(){
        $msj = parent::__toString();
        $msj .= "\nInfracciones: " . $this->getInfraccion();
        return $msj;
    }

}