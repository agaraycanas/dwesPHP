<?php
include ('util.php');

// ---------------_FUNCIONES------------------
function datosEmpleado($numemp) {
	$bd = conectarMySql ();
	$query = <<<HTML
		select * from EMPLEADOS
		where numemp = :numemp
HTML;
	$sentencia = $bd->prepare ( $query );
	$sentencia->bindParam ( ':numemp', $numemp );
	$sentencia->execute ();
	return $sentencia->fetchAll ();
}
// ----------------COMIENZO-------------------

$numemp = $_POST ['numemp'];
if (datosEmpleado ( $numemp ) != [ ]) {
	echo 'ok';
} else {
	echo 'nok';
}
?>