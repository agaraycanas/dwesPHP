<?php
require_once ('controller/BaseController.class.php');
class DepartamentoController extends BaseController {
	function listarGet() {
		$this->createModel ();
		$d['mainView'] = $this->model->listarDepartamentos ();
		$this->returnView($d);
	}
	function crearGet() {
		$this->returnView();
	}
	function crearPost() {
		$this->createModel();
		try {
			$this->model->crearDepartamento($_POST['nomdep']);
			$d['footer']['status']='ok';
			$d['footer']['mensaje']=$_POST['nomdep'];
		}
		catch (Exception $e) {
			$d['footer']['status']='fail';
			$d['footer']['mensaje']=$e->getMessage();
		}
		$this->returnView($d,false);
	}
}
?>