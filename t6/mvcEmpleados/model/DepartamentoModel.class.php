<?php
require_once ('model/BaseModel.class.php');
class DepartamentoModel extends BaseModel {
	function listarDepartamentos() {
		$s = "select iddep,nombre from departamentos";
		$sp = $this->db->prepare ( $s );
		$sp->execute ();
		$listaDptos = $sp->fetchAll ();
		$this->db = null;
		return $listaDptos;
	}
	function crearDepartamento($nombreDpto) {
		$s = "select count(*) as num from departamentos where nombre='$nombreDpto'";
		$sp = $this->db->prepare ( $s );
		$sp->execute ();
		if ($sp->fetchObject ()->num != 0) {
			throw new Exception('Departamento existente');
		}
		
		$s = "insert into departamentos(nombre) values (:nombre)";
		$sp = $this->db->prepare ( $s );
		$sp->bindParam ( ':nombre', $nombreDpto );
		$sp->execute ();
		$this->db = null;
	}
}
?>