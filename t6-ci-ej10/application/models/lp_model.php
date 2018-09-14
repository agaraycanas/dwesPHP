<?php
class Lp_model extends CI_Model {
	private function existeLP($nombre) {
		return  R::findOne('lp','nombre = ?',[$nombre]) != null ? true : false;
	}
	
	public function crear($nombre) {
		$status = 0;
		if (!$this->existeLP($nombre)) {
			$c = R::dispense('lp');
			$c -> nombre = $nombre;
			R::store($c);
			R::close();
		}
		else {
			$status = -1;
		}
		return $status;
	}
	
	public function getTodos() {
		return  R::findAll('lp','order by nombre');
	
	}

	public function getLpPorId($id_lp) {
		return R::load('lp',$id_lp);
	}

	public function editar($id_lp,$nombre) {
		$lp = R::load('lp', $id_lp);
		$lp -> nombre = $nombre;
		R::store($lp);
	}

	public function borrar($id_lp) {
		$lp = R::load('lp',$id_lp);
		R::trash($lp);
	}

	public function filtrar($filtro) {
		return R::find('lp','nombre like ?', [ '%'.$filtro.'%' ]);
	}
}
?>