<?php
class Departamento_model extends CI_Model {
	public $iddep;
	public $nombre;
	
	function crear($nombre) {
		$this->nombre=$nombre;
		$this->db->insert('departamentos',$this);
		return true;
	}
	
	function leerTodos() {
		return $this->db->get('departamentos')->result();
	}
}