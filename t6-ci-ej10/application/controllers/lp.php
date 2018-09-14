<?php
class Lp extends CI_Controller {
	private function autenticado() {
		$autenticado = false;
		if (session_status () == PHP_SESSION_NONE) {
			session_start ();
		}
		if (isset ( $_SESSION ['empleado'] ['id'] )) {
			$autenticado = true;
		}
		return $autenticado;
	}
	public function crear() {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'lp/crear' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearOK() {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'lp/crearOK' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearERROR() {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'lp/crearERROR' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearPost() { // AJAX
		if ($this->autenticado ()) {
			$nombre = $_POST ['nombre'];
			$this->load->model ( 'lp_model' );
			$datos ['body'] ['status'] = $this->lp_model->crear ( $nombre );
			$datos ['body'] ['nombre'] = $nombre;
			$this->load->view ( 'lp/XcrearPost', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editar() {
		if ($this->autenticado ()) {
			$this->load->model ( 'lp_model' );
			$id_lp = $_POST ['id_lp'];
			$datos ['body'] ['lp'] = $this->lp_model->getLpPorId ( $id_lp );
			$datos ['body'] ['v'] = isset ( $_POST ['v'] ) ? $_POST ['v'] : 'listarTodos';
			$datos ['body'] ['filtro'] = isset ( $_POST ['filtro'] ) ? $_POST ['filtro'] : '';
			enmarcar ( $this, 'lp/editar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editarPost() {
		if ($this->autenticado ()) {
			$nombre = $_POST ['nombre'];
			$id_lp = $_POST ['id_lp'];
			
			$this->load->model ( 'lp_model' );
			$this->lp_model->editar ( $id_lp, $nombre );
			
			switch ($_POST ['v']) {
				case 'filtrar' :
					$datos ['body'] ['accion'] = 'modificar';
					$datos ['body'] ['filtro'] = $_POST ['filtro'];
					$datos ['head'] ['onload'] = 'filtrar()';
					$this->filtrar ( $datos );
					break;
				case 'listarTodos' :
					header ( 'Location:' . base_url () . 'lp/listar' );
					break;
			}
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function listar() {
		$this->load->model ( 'lp_model' );
		$datos ['body'] ['lps'] = $this->lp_model->getTodos ();
		enmarcar ( $this, 'lp/listar', $datos );
	}
	public function borrar() {
		if ($this->autenticado ()) {
			$datos ['body'] ['accion'] = 'borrar';
			$datos ['body'] ['filtro'] = '';
			$this->filtrar ( $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function borrarPost() {
		if ($this->autenticado ()) {
			
			$this->load->model ( 'lp_model' );
			$id_lp = $_POST ['id_lp'];
			$this->lp_model->borrar ( $id_lp );
			switch ($_POST ['v']) {
				case 'filtrar' :
					$datos ['body'] ['accion'] = 'borrar';
					$datos ['body'] ['filtro'] = $_POST ['filtro'];
					$datos ['head'] ['onload'] = 'filtrar()';
					$this->filtrar ( $datos );
					break;
				case 'listarTodos' :
					header ( 'Location:' . base_url () . 'lp/listar' );
					break;
			}
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function modificar() {
		if ($this->autenticado ()) {
			$datos ['body'] ['accion'] = 'modificar';
			$datos ['body'] ['filtro'] = '';
			$this->filtrar ( $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function filtrar($datos) {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'lp/filtrar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function filtrarPost() {
		if ($this->autenticado ()) {
			$filtro = $_POST ['filtro'];
			$accion = $_POST ['accion'];
			$this->load->model ( 'lp_model' );
			$datos ['body'] ['lps'] = $this->lp_model->filtrar ( $filtro );
			$datos ['body'] ['filtro'] = $filtro;
			$datos ['body'] ['accion'] = $_POST ['accion'];
			$this->load->view ( 'lp/Xfiltro', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
}
?>