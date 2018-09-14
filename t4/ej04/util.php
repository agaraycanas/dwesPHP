<?php
include ("bdEtiquetas.php");

$BDusuarios = [ 
		'pepe' => 'pp',
		'ana' => 'a' 
];
function validar($u, $p) {
	global $BDusuarios;
	return $u != null && isset ( $BDusuarios [$u] ) && $BDusuarios [$u] == $p;
}
function pintarBarraIdioma($seleccionado) {
	$sel='checked="checked">';
	
	echo '<img src="img/es.png" width="40" heigth="30">',PHP_EOL;
	echo '<input type="radio" id="idIdiomaEs" name="idioma" value="es" onChange="cambiarIdioma()" ';
	echo $seleccionado=='es'?$sel:'>',PHP_EOL;
	
	echo '<img src="img/uk.png" width="40" heigth="30">',PHP_EOL;
	echo '<input type="radio" id="idIdiomaUk" name="idioma" value="uk" onChange="cambiarIdioma()" ';
	echo $seleccionado=='uk'?$sel:'>',PHP_EOL;
	
	/*
	echo '<img src="img/fr.png" width="40" heigth="30">',PHP_EOL;
	echo '<input type="radio" id="idIdiomaFr" name="idioma" value="fr" onChange="cambiarIdioma()" ';
	echo $seleccionado=='fr'?$sel:'>',PHP_EOL;
	*/
	
	echo "<br/><hr/>";
}
function pintarBotonVolver($idioma) {
	global $BDetiquetas;
	echo <<<OUT
	<form action="login.php">
		<input type="hidden" name="idioma" value="$idioma" id="idIdioma">
		<input type="submit" id="idBack" value="{$BDetiquetas[$idioma]['back']}">
	</form>
OUT;
}
?>
 
