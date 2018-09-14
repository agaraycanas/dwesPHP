<?php
class Ej08 extends CI_Controller {

	function verMenus() {
		$this->load->model ( 'menu_model', '', true );
		$datos ['menus'] = $this->menu_model->leerTodos ();
		$this->load->helper('url');
		$this->load->helper('menu');
		$this->load->view ( 'ej08/verMenus',$datos );

	}
}
?>