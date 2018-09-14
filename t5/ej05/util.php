<?php
/**
 * Conexion BD tema5 - ejercicio 4
 * @param string $schema
 * @param string $usu
 * @param string $pwd
 * @param string $host
 * @return PDO
 */
function conectarMySql($schema = 'test', $usu = 'root', $pwd = '', $host = 'localhost') {
	try {
		$dsn = "mysql:host=$host;dbname=$schema";
		$db = new PDO ( $dsn, $usu, $pwd );
		return $db;
	} catch ( PDOException $e ) {
		echo "ERROR de CONEXION a la BD $schema";
		die ();
	}
}

?>