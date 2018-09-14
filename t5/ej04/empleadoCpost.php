<?php
$numemp = isset ( $_POST ['numemp'] ) ? $_POST ['numemp'] : null;
$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : null;
$apellido = isset ( $_POST ['apellido'] ) ? $_POST ['apellido'] : null;
$telefono = isset ( $_POST ['telefono'] ) ? $_POST ['telefono'] : null;
$sexo = isset ( $_POST ['sexo'] ) ? $_POST ['sexo'] : null;

include ('util.php');
$bd = conectarMySql ( );
$query = <<<SQL
insert into 
	EMPLEADOS(numemp,nombre,apellido,telefono,sexo) 
	values (:numemp,:nombre,:apellido,:telefono,:sexo)
SQL;

$sentencia = $bd->prepare ( $query );

$sentencia->bindParam ( ':numemp', $numemp );
$sentencia->bindParam ( ':nombre', $nombre );
$sentencia->bindParam ( ':apellido', $apellido );
$sentencia->bindParam ( ':telefono', $telefono );
$sentencia->bindParam ( ':sexo', $sexo );
$ok = $sentencia->execute ();
//echo $bd->errorInfo();

//Aplicación patrón PRG
header("Location:empleadoCpostMensaje.php?ok=$ok");

?>