<?php
require_once ('BaseController.class.php');
class HomeController extends BaseController {
	public function indexGet() {
		$this->returnView ('',false);
	}
}
?>