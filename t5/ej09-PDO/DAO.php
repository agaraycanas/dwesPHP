<?php
class DAO {
	public  $bd;
	
	public function __construct() {
		$this->bd = $this->conectarBD();	
	}
	public function conectarBD($schema='test',$usu='root',$pwd='',$host='localhost') {
		try {
			$dsn = "mysql:host=$host;dbname=$schema";
			$db = new PDO($dsn,$usu,$pwd);
			return $db;
		}
		catch (PDOException $e) {
			print("ERROR de conexión a $schema");
			die();
		}
	}
}
?>
