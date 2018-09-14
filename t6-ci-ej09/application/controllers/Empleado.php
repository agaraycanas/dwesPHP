<?php
class Empleado extends CI_Controller {

	function crear() {
		enmarcar ( $this, 'empleado/crear' );
	}

	function listar() {
		enmarcar ( $this, 'empleado/listar' );
	}
}
?>