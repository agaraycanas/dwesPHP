<?php
class Ciudad_model extends CI_Model {
	private function existeCiudad($nombre) {
		return  R::findOne('ciudad','nombre = ?',[$nombre]) != null ? true : false;
	}
	
	public function crear($nombre) {
		$status = 0;
		if (!$this->existeCiudad($nombre)) {
			$c = R::dispense('ciudad');
			$c -> nombre = $nombre;
			R::store($c);
			R::close();
		}
		else {
			$status = -1;
		}
		return $status;
	}
	
	public function getTodas() {
		return  R::findAll('ciudad','order by nombre');
	
	}

	public function getCiudadPorId($id_ciudad) {
		return R::load('ciudad',$id_ciudad);
	}
	
	public function editar($id_ciudad, $nombre) {
		$ciudad = R::load('ciudad', $id_ciudad);
		$ciudad -> nombre = $nombre;
		R::store($ciudad);
	}
	
	public function borrar($id_ciudad) {
		$ciudad = R::load('ciudad',$id_ciudad);
		R::trash($ciudad);
	}
	public function filtrar($filtro) {
		return R::find('ciudad','nombre like ?', [ '%'.$filtro.'%' ]);
	}
}
?>