<?php
function conectarMySql($schema = 'cdcol', $usu = 'root', $pwd = '', $host = 'localhost') {
	try {
		$dsn = "mysql:host=$host;dbname=$schema";
		$db = new PDO ( $dsn, $usu, $pwd );
		return $db;
	} catch ( PDOException $e ) {
		echo "ERROR de CONEXION a la BD";
		die ();
	}
}

?>