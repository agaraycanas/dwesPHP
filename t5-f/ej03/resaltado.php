<?php
$palabraAResaltar = $_GET ['palabra'];
$f = fopen ( '../ej01/articulo.txt', 'r' );
$texto = '';

while ( ! feof ( $f ) ) {
	$linea = fgets ( $f );
	$palabras = explode(' ', $linea);
	foreach ($palabras as $palabra) {
		$p = $palabra;
		if ($palabra== $palabraAResaltar) {
			$p = '<b><u>'.$palabra.'</u></b>';
		}
		$texto .= $p.' ';
	}
	$texto .= "<br/>";
}

$textoOriginal = file_get_contents('../ej01/articulo.txt');
?>

<h3>ORIGINAL</h3>
<textarea cols="40" rows="20" readonly="readonly"><?= $textoOriginal ?></textarea>

<h3>RESALTADO</h3>
<div><?= $texto ?></div>
