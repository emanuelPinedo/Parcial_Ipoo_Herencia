<?php
class Fotbool extends Partido{
        
    public function __construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2){
        parent::__construct($vIdPartido, $vFecha,$vObjEquipo1,$vCantGolesE1,$vObjEquipo2,$vCantGolesE2);
    }
    
    public function coeficientePartido(){
        $coeficienteRetorno =0;
        if (parent::getObjEquipo1()->getCategoria() == 'menores'){
            $coeficienteRetorno = parent::coeficientePartido() + 0.13;
        } else if(parent::getObjEquipo1()->getCategoria() == 'juveniles'){
            $coeficienteRetorno = parent::coeficientePartido() + 0.19;
        } else if (parent::getObjEquipo1()->getCategoria() == 'mayores'){
            $coeficienteRetorno = parent::coeficientePartido() + 0.27;
        }
        return parent::coeficientePartido() + $coeficienteRetorno;
    }

    public function __toString(){
        $msj = parent::__toString();
        return $msj;
    }
}