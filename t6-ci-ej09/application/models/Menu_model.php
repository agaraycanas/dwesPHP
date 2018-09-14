<?php
class Menu_model extends CI_Model {
	public $id;
	public $idp;
	public $nombre;
	public $accion;
	
	private function obj2asoc($menu, $id = 0) {
		$sol = [ ];
		foreach ( $menu as $obj ) {
			$elem ['id'] = $obj->id;
			$elem ['idp'] = $obj->idp;
			$elem ['nombre'] = $obj->nombre;
			$elem ['accion'] = $obj->accion;
			array_push ( $sol, $elem );
		}
		return $sol;
	}

	function leerTodos() {
		return $this->obj2asoc ( $this->db->get ( '_menus' )->result () );
	}
}
?>