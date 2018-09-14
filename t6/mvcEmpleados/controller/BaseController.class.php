<?php
abstract class BaseController {
	protected $baseName;
	protected $action;
	protected $model;
	protected $d;
	public function __construct($baseName, $action) {
		$this->baseName = $baseName;
		$this->action = $action;
		$d ['nav'] = $this->getDatosNav ();
		$this->d = $d;
	}
	public function executeAction() {
		return $this->{($this->action) . ($_POST != [ ] ? 'Post' : 'Get')} ();
	}
	protected function returnView($dController = '', $enmarcado = true, $fVista = '') {
		$d = $this->d;
		if ($dController != '') {
			if (isset ( $dController ['head'] )) {
				$d ['head'] = $dController ['head'];
			}
			if (isset ( $dController ['header'] )) {
				$d ['header'] = $dController ['header'];
			}
			if (isset ( $dController ['mainView'] )) {
				$d ['mainView'] = $dController ['mainView'];
			}
			if (isset ( $dController ['footer'] )) {
				$d ['footer'] = $dController ['footer'];
			}
		}
		
		if ($fVista == '') {
			$fVista = 'view/' . $this->baseName . '/' . $this->action . ($_POST != [ ] ? 'Post' : 'Get') . '.php';
		}
		
		require_once ('view/_templates/head.php');
		
		if ($enmarcado) {
			require_once ('view/_templates/header.php');
			require_once ('view/_templates/nav.php');
		}
		
		require_once ($fVista);
		
		if ($enmarcado) {
			require_once ('view/_templates/footer.php');
		}
		
		require_once ('view/_templates/end.php');
	}
	protected function getDatosNav() {
		$menu = [ 
				[ 
						'Departamentos',
						'',
						[ 
								[ 
										'Crear',
										'Departamento/crear' 
								],
								[ 
										'Listar',
										'Departamento/listar' 
								] 
						] 
				],
				[ 
						'Empleados',
						'',
						[ 
								[ 
										'Crear',
										'Empleado/crear' 
								],
								[ 
										'Listar',
										'Empleado/listar' 
								] 
						] 
				] 
		];
		return $menu;
	}
	function createModel($nombreBase = '') {
		if ($nombreBase == '') {
			$nombreBase = $this->baseName;
		}
		
		$fModelo = 'model/' . $nombreBase . 'Model.class.php';
		if (file_exists ( $fModelo )) {
			require_once ($fModelo);
			$clase = $nombreBase . 'Model';
			$this->model = new $clase ();
		} else {
			echo "Modelo inexistente"; // TODO
		}
	}
}
?>