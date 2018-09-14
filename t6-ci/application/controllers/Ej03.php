<?php
class Ej03 extends CI_Controller {
	
	public function index() {
		$this->desplegarLinks();
	}
	
	private function desplegarLinks() {
		$datos = [
			'links' => [
					['url'=>'http://www.google.com', 'etiqueta'=>'Google'] , 
					['url'=>'http://www.bing.com', 'etiqueta'=>'Bing'],
					['url'=>'http://www.youtube.com', 'etiqueta'=>'YUTUF']
			]	
		];
		$this->load->helper('url');
		$this->load->view('ej03/listaDeLinks',$datos);
	}
	
}