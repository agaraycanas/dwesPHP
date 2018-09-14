<?php
function pintarBanderas($seleccionado) {
	$pais = [ 
			'es',
			'uk',
			'fr' 
	];
	foreach ( $pais as $p ) {
		echo "<image src=\"img/$p.png\" width=\"27\" height=\"18\">" . PHP_EOL;
		echo "<input type=\"radio\" name=\"bandera\" id=\"idBandera\" value=\"$p\"" . 
			($p == $seleccionado ? ' checked="checked"' : '') . '>' . PHP_EOL;
	}
	echo "<br/>". PHP_EOL;
}
?>
