<?php
include ('../util.php');

$idioma = isset ( $_REQUEST ['idioma'] ) ? $_REQUEST ['idioma'] : 'ES';
$etiquetas = $BDetiquetas[$idioma];

$lpalabra = $etiquetas[0];
$ltraduccion = $etiquetas[1];
$lenviar = $etiquetas[2];

// SALIDA ESTANDAR
echo <<<OUT
<head>
<meta charset="utf-8">
<script>
function cambiarIdioma() {
		document.getElementById("idFCambioIdioma").submit();
}
</script>
</head>
<body>
OUT;
echo '<form id="idFCambioIdioma" action="index.php">';
pintarRadioPaises ( $idioma );
echo '</form>';

echo <<<OUT
<hr/>
<form>
<label for="idPalabra">$lpalabra</label>
<input type="text" id="idPalabra"><br/>
		
<label for="idTraduccion">$ltraduccion</label>
<input type="text" id="idTraduccion"><br/>
		
<input type="submit" value="$lenviar">
		
</form>
</body>
OUT;
?>
