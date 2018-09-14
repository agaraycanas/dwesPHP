<?php
require_once 'DAO.php';
class usuario_DAO extends DAO {
	public function crearUsuario($nombre, $id_aficiones) {
		$u = R::dispense ( 'usuario' );
		
		$u->nombre = $nombre;
		
		foreach ( $id_aficiones as $id_aficion ) {
			$a = R::load ( 'aficion', $id_aficion );
			$u->sharedAficionList [] = $a;
		}
		
		R::store ( $u );
		R::close ();
	}
	public function getTodos() {
		return R::findAll('usuario');
	}
}