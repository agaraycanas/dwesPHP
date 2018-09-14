<?php
require_once 'DAO.php';

class usuario_DAO extends DAO{

	public function crearUsuario($nombre, $id_aficiones) {
		$sql = <<<SQL
		insert into usuario(nombre)
		values (:nombre)
SQL;
		$preparada = $this-> bd -> prepare($sql);
		$preparada->bindParam(':nombre', $nombre);
		$preparada->execute();
		
		$idUsuario = $this ->bd->lastInsertId ();
		$sql = <<<SQL
		insert into usuario_aficion(usuario_id,aficion_id)
		values (:usuario_id,:aficion_id)
SQL;
		$preparada = $this-> bd -> prepare($sql);
		$preparada->bindParam(':usuario_id', $idUsuario);
		
		
		foreach ($id_aficiones as $id_aficion) {
			$preparada->bindParam(':aficion_id', $id_aficion);
			$preparada->execute();
		}
		
		$this-> bd = null;
		}
	
	public function getTodos() {
		$sql = <<<SQL
		select id, nombre
		from usuario
SQL;
		return $this-> bd -> query($sql);
	}

}