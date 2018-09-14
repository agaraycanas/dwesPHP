<?php
require_once 'DAO.php';

class aficion_DAO extends DAO{

	
	public function getTodas() {
		
		$aficiones = R::findAll('aficion');
		R::close();
		return $aficiones;
	}
}