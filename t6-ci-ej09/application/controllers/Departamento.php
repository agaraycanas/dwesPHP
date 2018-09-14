<?php
class Departamento extends CI_Controller {
	function crear() {
		enmarcar ( $this, 'departamento/crear' );
	}
	function crearPost() {
		$this->load->model ( 'departamento_model', '', true );
		$datos ['status'] = $this->departamento_model->crear ( $_POST ['nomdep'] );
		$this->load->view ( 'departamento/crearPost', $datos );
	}
	function listar() {
		$this->load->model ( 'Departamento_model', 'dep', true );
		$datos ['departamentos'] = $this->dep->leerTodos ();
		enmarcar($this, 'departamento/listar',$datos);
	}
}
?>