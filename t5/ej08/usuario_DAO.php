<?php

require_once 'DAO.php';

class usuario_DAO extends DAO {
	public function crearUsuario($nombre, $id_aficion) {
		
		$u = R::dispense('usuario');
		
		$u -> nombre = $nombre;
		$a = R::load('aficion',$id_aficion);
		$u -> aficion = $a;
		
		R::store($u);
		R::close();
	}
}