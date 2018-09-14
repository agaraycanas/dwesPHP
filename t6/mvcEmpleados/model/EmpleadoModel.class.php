<?php
require_once ('model/BaseModel.class.php');
class EmpleadoModel extends BaseModel {
	public function getEmpleadosTodos() {
		$s = <<<SQL
		select e.nombre as nomemp, apellido, fnac, d.nombre as nomdep
		from empleados e
		left join departamentos d
		on e.iddep = d.iddep
SQL;
		$sp = $this->db->prepare ( $s );
		$sp->execute ();
		return $sp->fetchAll ();
	}
	public function getEmpleadosPorDpto($iddep) {
		$s = <<<SQL
		select e.nombre as nomemp, apellido, fnac, d.nombre as nomdep
		from empleados e
		left join departamentos d
		on e.iddep = d.iddep
		where e.iddep like 
SQL;
		if ($iddep != 'todos') {
			$s .= "$iddep";
		} else {
			$s .= "'%'";
		}
		
		$sp = $this->db->prepare ( $s );
		$sp->execute ();
		return $sp->fetchAll ();
	}
	function crearEmpleado($nombre, $apellido, $fnac, $iddep) {
		$s = <<<SQL
	insert into empleados(nombre,apellido,fnac,iddep)
	values (:nombre, :apellido, :fnac, :iddep)
SQL;
		$sp = $this->db->prepare ( $s );
		$sp->bindParam ( ':nombre', $nombre );
		$sp->bindParam ( ':apellido', $apellido );
		$sp->bindParam ( ':fnac', $fnac );
		$sp->bindParam ( ':iddep', $iddep );
		$sp->execute ();
	}
}
?>