<?php
class Resultado_model extends CI_Model  {
    public function c($idJornada,$idEquipoLocal,$idEquipoVisitante,$gl,$gv) {
       $resultado = R::dispense('resultado');
       
       $resultado->gl = $gl;
       $resultado->gv = $gv;
       
       $resultado->jornada = R::load('jornada',$idJornada);
       
       $resultado->local = R::load('equipo',$idEquipoLocal);
       $resultado->visitante = R::load('equipo',$idEquipoVisitante);
       
       R::store($resultado);
    }
}