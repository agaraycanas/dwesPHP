<?php
abstract class BaseModel {
	protected $db = null;
	public function __construct($host = 'localhost', $schema = 'test', $usu = 'root', $pwd = '') {
		try {
			$dsn = "mysql:host=$host;dbname=$schema;charset=UTF8";
			$db = new PDO ( $dsn, $usu, $pwd );
			$this->db = $db;
		} catch ( PDOException $e ) {
			echo "ERROR de CONEXION a la BD"; //TODO
			die ();
		}
	}
}