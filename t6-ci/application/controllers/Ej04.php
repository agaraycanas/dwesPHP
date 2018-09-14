<?php
class Ej04 extends CI_Controller {
	public function index() {
		$this->listarLinks ();
	}
	public function listarLinks() {
		$this->load->model ( 'enlace_model' );
		$datos['links'] = $this->enlace_model->getTodos ();
		$this->load->view ( 'ej04/listaDeLinks', $datos );
	}
	public function crearLink() {
		$this->crearLinkGet ();
	}
	public function crearLinkGet() {
		$this->load->view('templates/head');
		$this->load->view ( 'ej04/crearLinkGet' );
		$this->load->view('templates/end');
	}
	public function crearLinkPost() {
		$this->load->model ( 'enlace_model' );
		
		$url = $_REQUEST ['url'];
		$etiqueta = $_REQUEST ['etiqueta'];
		
		$ok = $this->enlace_model->guardar ( $url, $etiqueta );
		
		if ($ok) {
			$this->load->view ( 'ej04/crearLinkPostOK' );
		} else {
			$this->load->view ( 'ej04/crearLinkPostMAL' );
		}
	}
}