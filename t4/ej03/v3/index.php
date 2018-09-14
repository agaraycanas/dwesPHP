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
<script src="util.js"></script>
<script>
	var conexion;
	
	function accionAJAX() {
		
}
	
	function cambiarIdioma() {
		idioma = document.querySelector('input[name="idioma"]:checked').value;

		lPalabra=bdEtiquetas[idioma][0];
		lTraduccion=bdEtiquetas[idioma][1];
		lEnviar=bdEtiquetas[idioma][2];
		
		document.getElementById("lPalabra").innerHTML=lPalabra;
		document.getElementById("lTraduccion").innerHTML=lTraduccion;
		document.getElementById("bEnviar").value=lEnviar;
		
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
<label id="lPalabra" for="idPalabra">$lpalabra</label>
<input type="text" id="idPalabra"><br/>
		
<label id="lTraduccion" for="idTraduccion">$ltraduccion</label>
<input type="text" id="idTraduccion"><br/>
		
<input id="bEnviar" type="submit" value="$lenviar">
		
</form>
</body>
OUT;
?>
