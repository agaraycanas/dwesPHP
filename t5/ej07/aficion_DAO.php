<?php
require_once 'DAO.php';

class aficion_DAO extends DAO {

	public function getTodas() {
		
		$sql = <<<SQL
		select * 
		from aficion
SQL;
		return $this-> bd -> query($sql);
	}
}
?>