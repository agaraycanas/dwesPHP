<?php
require_once ('controller/BaseController.class.php');
class EmpleadoController extends BaseController {
	private function adaptar($dptos,$filtro= true) {
		if ($filtro) {
			$listaFinal = [ 
					'todos' => 'Todos' 
			];
		}
		foreach ( $dptos as $d ) {
			$listaFinal [$d ['iddep']] = $d ['nombre'];
		}
		return $listaFinal;
	}
	public function listarGet() {
		$this->createModel ();
		//$d ['nav'] = $this->getDatosNav ();
		$d ['mainView'] ['listaEmpleados'] = $this->model->getEmpleadosTodos ();
		$this->createModel ( 'Departamento' );
		$departamentos = $this->model->listarDepartamentos ();
		$d ['mainView'] ['listaDptos'] = $this->adaptar ( $departamentos );
		
		$this->returnView ( $d );
	}
	public function listarPost() {
		$iddep = isset ( $_POST ['iddep'] ) ? $_POST ['iddep'] : null;
		$this->createModel ();
		$d ['mainView'] ['listaEmpleados'] = $this->model->getEmpleadosPorDpto ( $iddep );
		$this->returnView ( $d, false );
	}
	public function crearGet() {
		//$d ['nav'] = $this->getDatosNav ();
		$this->createModel ( 'Departamento' );
		$departamentos = $this->model->listarDepartamentos ();
		$d ['mainView'] ['listaDptos'] = $this->adaptar ( $departamentos, false );
		$this->returnView ( $d );
	}
	public function crearPost() {
		$nombre = (isset ( $_POST ['nombre'] )) ? $_POST ['nombre'] : null;
		$apellido = (isset ( $_POST ['apellido'] )) ? $_POST ['apellido'] : null;
		$fnac = (isset ( $_POST ['fnac'] )) ? $_POST ['fnac'] : null;
		$iddep = (isset ( $_POST ['iddep'] )) ? $_POST ['iddep'] : null;
		$this->createModel ();
		$this->model->crearEmpleado ( $nombre, $apellido, $fnac, $iddep );
		$this->returnView ();
	}
}
?>