<?php
$BDdptos = [ 
		'mar' => 'Márketing',
		'ven' => 'Ventas',
		'com' => 'Compras',
		'rrhh' => 'Recursos humanos' 
];

$BDnacionalidades = [ 
		'es' => 'Española',
		'fr' => 'Francesa',
		'it' => 'Italiana',
		'pt' => 'Portuguesa' 
];

$BDgeneros = [ 
		'h' => 'Hombre',
		'm' => 'Mujer',
		'o' => 'Otro' 
];

function pintarBarraNavegacion($pasoActivo) {
	$nombreEtapa = [ 
			'Datos personales',
			'Datos profesionales',
			'Datos bancarios',
			'Resumen' 
	];
	
	$html = <<< HTML
<!DOCTYPE HTML>
<html>
<head>
	<title>Tema 3: Ej07</title>
	<meta charset="UTF-8">
</head>
<body>
HTML;
	$html .= '<div id="navegacion">';
	for ($paso = 1; $paso <= 4; $paso ++) {
		if ($paso == $pasoActivo) {
			$html .= "<a href=\"paso$paso.php\"><img src=\"img/$paso.png\" title=\"{$nombreEtapa[($paso-1)]}\" width=\"40\" height=\"40\" /></a>";
		} else {
			$html .= "<a href=\"paso$paso.php\"><img src=\"img/$paso.png\" title=\"{$nombreEtapa[($paso-1)]}\" width=\"40\" height=\"40\" style=\"opacity:0.4;\" /></a>";
		}
	}
	$html .= '</div>';
	return $html;
}

?>
