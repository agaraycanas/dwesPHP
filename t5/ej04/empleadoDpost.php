<?php
include 'util.php';

$numemp = isset ( $_POST ['numemp'] ) && ! empty ( $_POST ['numemp'] ) ? $_POST ['numemp'] : null;

if ($numemp != null) {
	$bd = conectarMySql ( );
	$query = <<<SQL
		delete from EMPLEADOS 
		where numemp = :numemp
SQL;
	
	$sentencia = $bd->prepare ( $query );
	
	$sentencia->bindParam ( ':numemp', $numemp );
	$ok = $sentencia->execute ();
	$ok = ($ok && ($sentencia->rowCount() > 0));
} else {
	$ok=false;
}
// Aplicación patrón PRG
header ( "Location:empleadoDpostMensaje.php?ok=$ok" );

?>