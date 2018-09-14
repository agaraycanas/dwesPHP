<?php
$estilo = <<<ESTILO
.rojo {
	color:RED;
}
.azul {
	color:BLUE;
}
.verde {
	color:GREEN;
}
ESTILO;

file_put_contents('estilo.css', $estilo);

$palabraAResaltar = $_GET ['palabra'];
$f = fopen ( 'textos/'.$_GET['fichero'].'.txt', 'r' );

$texto = '';

while ( ! feof ( $f ) ) {
	$linea = fgets ( $f );
	$palabras = explode ( ' ', $linea );
	
	foreach ( $palabras as $palabra ) {
		$p = trim($palabra);
		if (strtolower($p) == strtolower($palabraAResaltar)) {
			$p = "<span class=\"{$_GET['color']}\">";
			$p .= isset ( $_GET ['negrita'] ) ? '<b>' : '';
			$p .= isset ( $_GET ['subrayar'] ) ? '<u>' : '';
			$p .= $palabra;
			$p .= isset ( $_GET ['subrayar'] ) ? '</u>' : '';
			$p .= isset ( $_GET ['negrita'] ) ? '</b>' : '';
			$p .= '</span>';
		}
		$texto .= $p . ' ';
	}
	$texto .= "<br/>".PHP_EOL;
}

$textoOriginal = file_get_contents ( 'textos/'.$_GET['fichero'].'.txt' );
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
</head>
<h3>ORIGINAL</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $textoOriginal ?></textarea>

<h3>RESALTADO</h3>
<div><?= $texto ?></div>
</html>