<?php
class Empleado_model extends CI_Model {
	
	public function crear($nombre, $ape1, $ape2, $pwd, $tlf, $id_ciudad, $ids_lp) {
		$empleado = R::dispense('empleado');
		$empleado -> nombre = $nombre;
		$empleado->ape1 = $ape1;
		$empleado->ape2 = $ape2;
		$empleado->pwd = $pwd;
		$empleado->tlf = $tlf;
		
		$ciudad = R::load('ciudad', $id_ciudad);
		
		$ciudad -> xownEmpleadolist[] = $empleado; 
		
		foreach ($ids_lp as $id_lp) {
			$empleado->sharedLpList[] = R::load('lp',$id_lp);
		}
		
		R::store($ciudad);
		
		R::close();
	}
	
	public function editar($id_empleado, $nombre, $ape1, $ape2, $tlf, $id_ciudad, $ids_lp) {
		$empleado = R::load('empleado',$id_empleado);
		$empleado -> nombre = $nombre;
		$empleado->ape1 = $ape1;
		$empleado->ape2 = $ape2;
		$empleado->tlf = $tlf;
		$empleado->ciudad = R::load('ciudad', $id_ciudad);
		$empleado->sharedLpList = []; // vacío todos los lenguajes
		foreach ($ids_lp as $id_lp) {
			$empleado->sharedLpList[] = R::load('lp',$id_lp);
		}
	
		R::store($empleado);
		R::close();
	}

	public function getTodos() {
		return R::findAll('empleado','order by ape1, ape2, nombre');
	}
	
	public function borrarEmpleadoPorId($id_empleado) {
		$empleado = R::load('empleado',$id_empleado);
		if ($empleado->id!=0) {
			R::trash($empleado);
		}
	}

	public function getEmpleadoPorId($id_empleado) {
		return R::load('empleado',$id_empleado);
	}
	
	public function getEmpleadoPorNombre($nombre) {
		return R::findOne('empleado','nombre like ?',[$nombre]);
	}
	
	public function verificar($nombre,$pwd) {
		$ok = false;
		$empleado = R::findOne('empleado','nombre = ?',[$nombre]);
		if ($empleado!=null && $empleado->pwd == $pwd) {
			$ok = true;
		}
		return $ok;
	}
	public function filtrar($filtro) {
		return R::find('empleado','nombre like ?', [ '%'.$filtro.'%' ]);
	}
}
?>