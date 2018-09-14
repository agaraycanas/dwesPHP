<?php
header ( 'Content-Type: text/html; charset=UTF-8' );
$BDsaludos = [ 
		'Hola ',
		'Qué tal ',
		'¡¡ Qué pasa !! ' 
];

$esAjax = isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest';
if (! $esAjax) {
	echo "<h1>AJAX request only</h1>";
} else {
	$nombre = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre'] : null;
	$saludo = $BDsaludos [rand ( 0, sizeof ( $BDsaludos ) - 1 )];
	$nEstilo = rand(1,3);
	echo "<h$nEstilo>$saludo $nombre</h$nEstilo>";
}
?>