<?php
class Aficion_model extends CI_Model {
    public function r() {
        return R::findAll('aficion');
    }
    
    public function c($nombre) {
        if (R::findOne('aficion','nombre=?',[ $nombre ]) == null) {
            $aficion = R::dispense('aficion');
            $aficion->nombre = $nombre;
            R::store($aficion);
        }
        else {
            throw new Exception("La afición de nombre $nombre ya existe");
        }
    }

    public function d($id) {
        $aficion = R::load('aficion',$id);
        $gustos = $aficion -> ownGustoList;
        $odios = $aficion -> ownOdioList;
        
        if ($gustos == [] && $odios == []) {
            R::trash($aficion);
        }
        else {
            if ($gustos == []) {
                throw new Exception("La afición {$aficion->nombre} tiene algún hater");
            }
            else {
                throw new Exception("La afición {$aficion->nombre} tiene algún apasionado");
            }
        }
    }
  
    
    public function rById($id) {
        return R::load('aficion',$id);
    }
    
    public function u($id,$nombre) {
        $aficionExistente = R::findOne('aficion','nombre=?',[$nombre]);
        if ($aficionExistente == null || $aficionExistente->id == $id) {
            $aficion = R::load('aficion',$id);
            $aficion-> nombre = $nombre;
            R::store($aficion);
        }
        else {
            throw new Exception("La afición $nombre ya está registrada");
        }
    }
    
}
?>