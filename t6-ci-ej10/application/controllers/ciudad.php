<?php
class Ciudad extends CI_Controller {
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
			enmarcar ( $this, 'ciudad/crear' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearOK() {
		if ($this->autenticado ()) {
			
			enmarcar ( $this, 'ciudad/crearOK' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearERROR() {
		if ($this->autenticado ()) {
			
			enmarcar ( $this, 'ciudad/crearERROR' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearPost() {
		if ($this->autenticado ()) {
			
			$nombre = $_POST ['nombre'];
			$this->load->model ( 'ciudad_model' );
			$status = $this->ciudad_model->crear ( $nombre );
			if ($status >= 0) {
				header ( 'Location:' . base_url () . 'ciudad/crearOK' );
			} else {
				header ( 'Location:' . base_url () . 'ciudad/crearERROR' );
			}
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function modificar() {
		if ($this->autenticado ()) {
			
			enmarcar ( $this, 'errors/custom/obras' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editar() {
		if ($this->autenticado ()) {
			
			$this->load->model ( 'ciudad_model' );
			$id_ciudad = $_POST ['id_ciudad'];
			$datos ['body'] ['ciudad'] = $this->ciudad_model->getCiudadPorId ( $id_ciudad );
			enmarcar ( $this, 'ciudad/editar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editarPost() {
		if ($this->autenticado ()) {
			
			$nombre = $_POST ['nombre'];
			$id_ciudad = $_POST ['id_ciudad'];
			
			$this->load->model ( 'ciudad_model' );
			$this->ciudad_model->editar ( $id_ciudad, $nombre );
			
			header ( 'Location:' . base_url ( 'ciudad/listar' ) );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function listar() {
		$this->load->model ( 'ciudad_model' );
		$datos ['body'] ['ciudades'] = $this->ciudad_model->getTodas ();
		enmarcar ( $this, 'ciudad/listar', $datos );
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
			
			$this->load->model ( 'ciudad_model' );
			$id_ciudad = $_POST ['id_ciudad'];
			$this->ciudad_model->borrar ( $id_ciudad );
			switch ($_POST ['v']) {
				case 'filtrar' :
					$datos ['body'] ['accion'] = 'borrar';
					$datos ['body'] ['filtro'] = $_POST ['filtro'];
					$datos ['head'] ['onload'] = 'filtrar()';
					$this->filtrar ( $datos );
					break;
				case 'listarTodos' :
					header ( 'Location:' . base_url () . 'ciudad/listar' );
					break;
			}
			
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	
	public function filtrar($datos) {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'ciudad/filtrar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function filtrarPost() {
		if ($this->autenticado ()) {
			$filtro = $_POST ['filtro'];
			$accion = $_POST ['accion'];
			$this->load->model ( 'ciudad_model' );
			$datos ['body'] ['ciudades'] = $this->ciudad_model->filtrar ( $filtro );
			$datos ['body'] ['filtro'] = $filtro;
			$datos ['body'] ['accion'] = $_POST ['accion'];
			$this->load->view ( 'ciudad/Xfiltro', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
}
?>