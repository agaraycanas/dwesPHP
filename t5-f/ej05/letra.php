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

file_put_contents ( 'estilo.css', $estilo );

$f = fopen ( '../ej01/articulo.txt', 'r' );
$texto = '';

while ( ! feof ( $f ) ) {
	$linea = fgets ( $f );
	
	$primeraLetra = substr($linea, 0, 1);
	
	$p = "<span class=\"{$_GET['color']}\">";
	$p .= isset ( $_GET ['negrita'] ) ? '<b>' : '';
	$p .= isset ( $_GET ['subrayar'] ) ? '<u>' : '';
	$p .= $primeraLetra;
	$p .= isset ( $_GET ['subrayar'] ) ? '</u>' : '';
	$p .= isset ( $_GET ['negrita'] ) ? '</b>' : '';
	$p .= '</span> ';
	
	$p .= substr($linea, 1);
	$texto .= $p.'<br/>';
}

$textoOriginal = file_get_contents ( '../ej01/articulo.txt' );
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