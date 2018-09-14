<?php
class Empleado extends CI_Controller {
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
			$this->load->model ( 'ciudad_model' );
			$this->load->model ( 'lp_model' );
			
			$datos ['body'] ['ciudades'] = $this->ciudad_model->getTodas ();
			$datos ['body'] ['lps'] = $this->lp_model->getTodos ();
			
			enmarcar ( $this, 'empleado/crear', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function crearPost() {
		if ($this->autenticado ()) {
			$this->load->model ( 'empleado_model' );
			$nombre = $_POST ['nombre'];
			$ape1 = $_POST ['ape1'];
			$ape2 = $_POST ['ape2'];
			$pwd = $_POST ['pwd'];
			$tlf = $_POST ['tlf'];
			$id_ciudad = $_POST ['idCiudad'];
			$ids_lp = isset ( $_POST ['idLP'] ) ? $_POST ['idLP'] : [ ];
			
			$this->empleado_model->crear ( $nombre, $ape1, $ape2, $pwd, $tlf, $id_ciudad, $ids_lp );
			
			enmarcar ( $this, 'empleado/crearPost' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editar() {
		if ($this->autenticado ()) {
			
			$id_empleado = $_POST ['id_empleado'];
			
			$this->load->model ( 'ciudad_model' );
			$this->load->model ( 'lp_model' );
			$this->load->model ( 'empleado_model' );
			
			$datos ['body'] ['ciudades'] = $this->ciudad_model->getTodas ();
			$datos ['body'] ['lps'] = $this->lp_model->getTodos ();
			$datos ['body'] ['empleado'] = $this->empleado_model->getEmpleadoPorId ( $id_empleado );
			$datos ['body'] ['id_lps'] = [ ];
			
			foreach ( $datos ['body'] ['empleado']->sharedLpList as $lp ) {
				array_push ( $datos ['body'] ['id_lps'], $lp->id );
			}
			enmarcar ( $this, 'empleado/editar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function editarPost() {
		if ($this->autenticado ()) {
			
			$this->load->model ( 'empleado_model' );
			$id_empleado = $_POST ['id_empleado'];
			$nombre = $_POST ['nombre'];
			$ape1 = $_POST ['ape1'];
			$ape2 = $_POST ['ape2'];
			$tlf = $_POST ['tlf'];
			$id_ciudad = $_POST ['idCiudad'];
			$ids_lp = isset ( $_POST ['idLP'] ) ? $_POST ['idLP'] : [ ];
			
			$this->empleado_model->editar ( $id_empleado, $nombre, $ape1, $ape2, $tlf, $id_ciudad, $ids_lp );
			
			enmarcar ( $this, 'empleado/editarPost' );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function listar() {
		$this->load->model ( 'empleado_model' );
		$datos ['body'] ['empleados'] = $this->empleado_model->getTodos ();
		enmarcar ( $this, 'empleado/listar', $datos );
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
			
			$id_empleado = $_POST ['id_empleado'];
			$this->load->model ( 'empleado_model' );
			$this->empleado_model->borrarEmpleadoPorId ( $id_empleado );
			switch ($_POST ['v']) {
				case 'filtrar' :
					$datos ['body'] ['accion'] = 'borrar';
					$datos ['body'] ['filtro'] = $_POST ['filtro'];
					$datos ['head'] ['onload'] = 'filtrar()';
					$this->filtrar ( $datos );
					break;
				case 'listarTodos' :
					header ( 'Location:' . base_url () . 'empleado/listar' );
					break;
			}
			
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function filtrar($datos) {
		if ($this->autenticado ()) {
			enmarcar ( $this, 'empleado/filtrar', $datos );
		} else {
			header ( 'Location:' . base_url () ); // Patrón PRG
		}
	}
	public function filtrarPost() {
		if ($this->autenticado ()) {
			$filtro = $_POST ['filtro'];
			$accion = $_POST ['accion'];
			$this->load->model ( 'empleado_model' );
			$datos ['body'] ['empleados'] = $this->empleado_model->filtrar ( $filtro );
			$datos ['body'] ['filtro'] = $filtro;
			$datos ['body'] ['accion'] = $_POST ['accion'];
			$this->load->view ( 'empleado/Xfiltro', $datos );
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
	public function login() {
		enmarcar ( $this, 'empleado/login' );
	}
	public function loginPost() {
		$nombre = $_POST ['nombre'];
		$pwd = $_POST ['pwd'];
		
		$this->load->model ( 'empleado_model' );
		$ok = $this->empleado_model->verificar ( $nombre, $pwd );
		
		if ($ok) {
			session_start ();
			$empleado = $this->empleado_model->getEmpleadoPorNombre ( $nombre );
			$_SESSION ['empleado'] ['id'] = $empleado->id;
			$_SESSION ['empleado'] ['nombre'] = $empleado->nombre;
			$_SESSION ['empleado'] ['ape1'] = $empleado->ape1;
			header ( 'Location:' . base_url () ); // Patrón PRG
		} else {
			enmarcar ( $this, 'empleado/loginERROR' );
		}
	}
	public function logout() {
		if (session_status () == PHP_SESSION_NONE) {
			session_start ();
		}
		session_destroy ();
		header ( 'Location:' . base_url () );
	}
}
?>