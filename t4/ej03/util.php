<?php
$BDetiquetas = [ 
		"ES" => [ 
				"Palabra",
				"Traducción",
				"Enviar" 
		],
		"EN" => [ 
				"Word",
				"Translation",
				"Send" 
		],
		"FR" => [ 
				"Mot",
				"Traduction",
				"Envoyer" 
		] 
];

function pintarRadioPaises($seleccionado) {
	global $BDetiquetas;
	$paises = array_keys($BDetiquetas);
	foreach ( $paises as $v ) {
		echo "<input type=\"radio\" name=\"idioma\" id=\"id$v\" value=\"$v\"" . ($v == $seleccionado ? 'checked="checked"' : '') . ' onChange="cambiarIdioma()">' . PHP_EOL;
		echo "<img src=\"../img/$v.png\" heigth=\"30\" width=\"60\">";
	}
}
?>