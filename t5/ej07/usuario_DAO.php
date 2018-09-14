<?php
require_once 'DAO.php';

class usuario_DAO extends DAO{

	public function crearUsuario($nombre, $id_aficion) {
		$sql = <<<SQL
		insert into usuario(nombre,aficion_id)
		values (:nombre, :id_aficion)
SQL;
		$preparada = $this-> bd -> prepare($sql);
		
		$preparada->bindParam(':nombre', $nombre);
		$preparada->bindParam(':id_aficion', $id_aficion);
		
		$preparada->execute();
		$this-> bd = null;
		}
}