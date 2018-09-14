<?php
class Enlace_model extends CI_Model {
	public $url;
	public $etiqueta;

	public function getTodos() {
		$this->load->database (); // Conexión a la BBDD
		$datosPreProcesados = $this->db->get ( 'enlaces' )->result ();
		return  $datosPreProcesados;
	}

	public function guardar($url, $etiqueta) {
		$this->url = $url;
		$this->etiqueta = $etiqueta;
		
		$this->load->database (); // Conexión a la BBDD
		$this->db->insert ( 'enlaces', $this );
		return true;
	}
}
?>