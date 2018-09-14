<?php
include ("util.php");
include ("bdEtiquetas.php");
session_start ();

$usuario = isset ( $_REQUEST ['usuario'] ) ? $_REQUEST ['usuario'] : null;
$password = isset ( $_REQUEST ['password'] ) ? $_REQUEST ['password'] : null;
$idioma = isset ( $_REQUEST ['idioma'] ) ? $_REQUEST ['idioma'] : null;
$unauthorized = $BDetiquetas[$idioma]['unauthorized'];



if (validar ( $usuario, $password )) {
	$_SESSION ['usuario'] = $usuario;
	$_SESSION ['idioma'] = $idioma;
	header ( 'Location: juego.php' );
} else {
	$_SESSION ['usuario'] = null;
	echo <<<OUT
	<head><meta charset="utf-8"></head><body>
	<h1>$unauthorized</h1>
OUT;
	
	pintarBotonVolver ($idioma);
	
	echo <<<OUT
	</body>
OUT;
}
?>