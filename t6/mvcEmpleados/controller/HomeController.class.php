<?php
require_once ('BaseController.class.php');
class HomeController extends BaseController {
	public function indexGet() {
		$this->d ['footer'] ['mensaje'] = 'BUENOS DÍAS';
		$this->d ['header'] ['usuario'] = 'Pepe';
		$this->returnView ();
	}
}
?>