<?php

class Persona_model extends CI_Model
{

    public function c($nombre, $apellido, $pwd, $idPaisNace,$idPaisVive,$idsAficionGusta, $idsAficionOdia)
    {
        $persona = R::dispense('persona');

        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        $persona->pwd = password_hash($pwd,PASSWORD_DEFAULT );

        $paisNace = R::load('pais', $idPaisNace);
        $persona->nace = $paisNace;
        
        $paisVive = R::load('pais', $idPaisVive);
        $persona->vive = $paisVive;
        
        foreach ($idsAficionGusta as $idAficionGusta) {
            $aficionGusta = R::load('aficion',$idAficionGusta);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficionGusta;
            R::store($gusto);
        }
        
        foreach ($idsAficionOdia as $idAficionOdia) {
            $aficionOdia = R::load('aficion',$idAficionOdia);
            $odio = R::dispense('odio');
            $odio->persona = $persona;
            $odio->aficion = $aficionOdia;
            R::store($odio);
        }
        
        R::store($persona);
    }

    public function r()
    {
        return R::findAll('persona', 'order by apellido');
    }

    public function rById($id) {
        return R::load('persona',$id);
    }
    
    public function d($id) {
        $persona = R::load('persona',$id);
        foreach ($persona->ownGustoList as $gusto) {
            R::trash($gusto);
        }
        foreach ($persona->ownOdioList as $odio) {
            R::trash($odio);
        }
        R::trash($persona);
    }
 
    public function u($idPersona, $nombre, $apellido, $idPaisNace,$idPaisVive,$idsAficionGusta, $idsAficionOdia)
    {
        $persona = R::load('persona',$idPersona);
        
        $persona->nombre = $nombre;
        $persona->apellido = $apellido;
        
        $paisNace = R::load('pais', $idPaisNace);
        $persona->nace = $paisNace;
        
        $paisVive = R::load('pais', $idPaisVive);
        $persona->vive = $paisVive;
        
        foreach ($persona->ownGustoList as $gusto) {
            $gusto->persona = null;
            $gusto->aficion = null;
            R::trash($gusto);
            R::store($persona);
        }
        foreach ($persona->ownOdioList as $odio) {
            $odio->persona = null;
            $odio->aficion = null;
            R::trash($odio);
            R::store($persona);
        }

        foreach ($idsAficionGusta as $idAficionGusta) {
            $aficionGusta = R::load('aficion',$idAficionGusta);
            $gusto = R::dispense('gusto');
            $gusto->persona = $persona;
            $gusto->aficion = $aficionGusta;
            R::store($gusto);
        }
        
        foreach ($idsAficionOdia as $idAficionOdia) {
            $aficionOdia = R::load('aficion',$idAficionOdia);
            $odio = R::dispense('odio');
            $odio->persona = $persona;
            $odio->aficion = $aficionOdia;
            R::store($odio);
        }
      
    }
    
    public function comprobarLogin($nombre,$pwd)  {
        $persona = R::findOne('persona','nombre=?',[ $nombre ]);
        if ($persona != null ){
            if (!password_verify($pwd, $persona->pwd)) {
                throw new Exception('Usuario o contraseña incorrectas');
            }
        }
        else {
            throw new Exception('Usuario o contraseña incorrectas');
        }
        return $persona;
    }
}