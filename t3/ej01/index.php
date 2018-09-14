<?php
include ("util.php");
$uid = isset ( $_COOKIE ['UID'] ) ? $_COOKIE ['UID'] : null;
$primeraVez = ($uid == null);

if ($primeraVez) {
	$cadena = generaCadenaAleatoria ();
	setcookie ( "UID", $cadena );
	echo "Hola desconocido. A partir de ahora te recordar&eacute;";
} else {
	echo "Hola de nuevo. Te conozco como UID=$uid";
}
?>
