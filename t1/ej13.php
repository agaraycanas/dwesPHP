<?php
$cadena = 'Eres tonto, y tu padre es muy feo. Eso es todo, asqueroso';
$prohibidas = ['tonto', 'asqueroso'];
$cadenaOriginal = $cadena;

foreach ($prohibidas as $prohibida) {
	$cadena = str_replace($prohibida, '*****', $cadena);
}

echo $cadenaOriginal, PHP_EOL, $cadena;
?>