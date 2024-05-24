<?php
class Fotbool extends Partido{
        
    public function __construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2){
        parent::__construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2);
    }

    public function __toString(){
        $msj = parent::__toString();
        return $msj;
    }
}