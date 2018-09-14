<?php
class Ej02 extends CI_Controller {
	public function index() {
		$this->get();
	}
	
	public function get() {
		$this->load->view('ej02/formularioNombre');
	}
	
	public function post() {
		//$datos['nombre'] = isset ($_REQUEST['nombre'])?$_REQUEST['nombre']:'desconocido';
		$this->load->view('ej02/saludar',$_REQUEST);
	}
	
	public function despedirse() {
		$this->load->view('ej02/adios');
	}
}
?>