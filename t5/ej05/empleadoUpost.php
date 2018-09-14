<?php
include 'util.php';

$numemp = isset ( $_POST ['numemp'] ) && ! empty ( $_POST ['numemp'] ) ? $_POST ['numemp'] : null;
$nombre = isset ( $_POST ['nombre'] ) && ! empty ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
$apellido = isset ( $_POST ['apellido'] ) && ! empty ( $_POST ['apellido'] ) ? $_POST ['apellido'] : '';
$telefono = isset ( $_POST ['telefono'] ) && ! empty ( $_POST ['telefono'] ) ? $_POST ['telefono'] : '';
$sexo = isset ( $_POST ['sexo'] ) && ! empty ( $_POST ['sexo'] ) ? $_POST ['sexo'] : '';


if ($numemp != null) {
	$bd = conectarMySql (  );
	$query = <<<SQL
		update EMPLEADOS
		set NOMBRE=:nombre,
			APELLIDO=:apellido,
			TELEFONO=:telefono,
			SEXO=:sexo
		where NUMEMP=:numemp
SQL;
	
	$sentencia = $bd->prepare ( $query );
	
	$sentencia->bindParam ( ':numemp', $numemp );
	$sentencia->bindParam ( ':nombre', $nombre );
	$sentencia->bindParam ( ':apellido', $apellido );
	$sentencia->bindParam ( ':telefono', $telefono );
	$sentencia->bindParam ( ':sexo', $sexo );
	
	$ok = $sentencia->execute ();
	
} else {
	$ok = false;
}

// Aplicación patrón PRG
header ( "Location:empleadoUpostMensaje.php?ok=$ok" );
?>