<?php
class Pais_model extends CI_Model {
    
    public function c($nombre) {
        if (R::findOne('pais','nombre=?',[ $nombre ]) == null) {
            $pais = R::dispense('pais');
            $pais->nombre = $nombre;
            R::store($pais);
        }
        else {
          throw new Exception("El país de nombre $nombre ya existe");  
        }
    }
    
    public function r() {
        return R::findAll('pais');
    }
    
    public function rById($id) {
        return R::load('pais',$id);
    }

    public function d($id) {
        $pais = R::load('pais',$id);
        $nacidos = $pais -> alias('nace') -> ownPersonaList;
        $residentes = $pais -> alias('vive') -> ownPersonaList;
        
        if ($nacidos == [] && $residentes==[]) {
            R::trash($pais);
        }
        else {
            if ($residentes == []) {
                throw new Exception("El país {$pais->nombre} tiene algún nacido");
            }
            else {
                throw new Exception("El país {$pais->nombre} tiene algún residente");
            }
        }
    }

    public function u($id,$nombre) {
        $paisExistente = R::findOne('pais','nombre=?',[$nombre]);
        if ($paisExistente == null || $paisExistente->id == $id) {
            $pais = R::load('pais',$id);
            $pais -> nombre = $nombre;
            R::store($pais);
        }
        else {
            throw new Exception("El país $nombre ya está registrado");
        }
    }

}