<?php
class Test extends CI_Controller {
	public function index() {
		$this->load->view('test/test');
	}
	public function ajax() {
		$datos['seleccion']=$_POST['dato'];
		$this->load->view('test/ajax.php',$datos);
	}
}