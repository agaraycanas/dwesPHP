<?php
use RedBeanPHP\RedException\SQL;

require_once 'DAO.php';

class aficion_DAO extends DAO {

	public function getTodas() {
		
		$sql = <<<SQL
		select * 
		from aficion
SQL;
		return $this-> bd -> query($sql);
	}
	
	public function getByIdUsuario($id_usuario) {
		$sql = <<<SQL
		select nombre
		from aficion a, aficion_usuario af
		where a.id = af.aficion_id and
		af.usuario_id = :id_usuario
SQL;
		$p = $this -> bd -> prepare($sql);
		$p -> bindParam(':id_usuario', $id_usuario);
		$p -> execute();
		return $p -> fetchAll();
	}
}
?>