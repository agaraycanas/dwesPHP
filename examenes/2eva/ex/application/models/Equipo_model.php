<?php
class Equipo_model extends CI_Model {
    
    public function c($nombre) {
        if (empty($nombre)) {
            throw new Exception("El nombre del equipo no puede ser nulo");
        }
        
        if (R::findOne('equipo','nombre=?',[ $nombre ]) == null) {
            $equipo = R::dispense('equipo');
            $equipo->nombre = $nombre;
            R::store($equipo);
        }
        else {
          throw new Exception("El equipo de nombre $nombre ya existe");  
        }
    }
    
    public function r() {
        return R::findAll('equipo');
    }
    
    public function rById($id) {
        return R::load('equipo',$id);
    }

    public function d($id) {
        $equipo = R::load('equipo',$id);
        $nacidos = $equipo -> alias('nace') -> ownPersonaList;
        $residentes = $equipo -> alias('vive') -> ownPersonaList;
        
        if ($nacidos == [] && $residentes==[]) {
            R::trash($equipo);
        }
        else {
            if ($residentes == []) {
                throw new Exception("El equipo {$equipo->nombre} tiene algún nacido");
            }
            else {
                throw new Exception("El equipo {$equipo->nombre} tiene algún residente");
            }
        }
    }

    public function u($id,$nombre) {
        $equipoExistente = R::findOne('equipo','nombre=?',[$nombre]);
        if ($equipoExistente == null || $equipoExistente->id == $id) {
            $equipo = R::load('equipo',$id);
            $equipo -> nombre = $nombre;
            R::store($equipo);
        }
        else {
            throw new Exception("El equipo $nombre ya está registrado");
        }
    }

}