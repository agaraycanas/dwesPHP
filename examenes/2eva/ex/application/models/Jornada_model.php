<?php
class Jornada_model extends CI_Model {
    
    public function c($numero,$ini,$fin) {
        if ($numero == '' || empty($ini) || empty($fin) ){
            throw new Exception("La jornada, la fecha de inicio o fin no pueden estar vacías");
        }
        
        if ($numero < 1) {
            throw new Exception("La jornada no puede tener un número negativo");
        }
        if (R::findOne('jornada','numero=?',[ $numero]) == null) {
            $jornada = R::dispense('jornada');
            $jornada->numero = $numero;
            $jornada->ini= $ini;
            $jornada->fin = $fin;
            R::store($jornada);
        }
        else {
            throw new Exception("La jornada número $numero ya existe");
        }
    }
    
    public function r() {
        return R::findAll('jornada');
    }
    
    public function rById($id) {
        return R::load('jornada',$id);
    }

    public function getResultadosByNumero($numero) {
        $jornada = R::findOne('jornada','numero=?',[ $numero ]);
        return $jornada->ownResultadoList;
    }
  
}