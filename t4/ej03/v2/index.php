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

	var conexion;
	
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		etiqueta = textoRecibido.split("#");
		
		lPalabra=etiqueta[0];
		lTraduccion=etiqueta[1];
		lEnviar=etiqueta[2];
		
		document.getElementById("lPalabra").innerHTML=lPalabra;
		document.getElementById("lTraduccion").innerHTML=lTraduccion;
		document.getElementById("bEnviar").value=lEnviar;
}
	
	function cambiarIdioma() {
		idioma = document.querySelector('input[name="idioma"]:checked').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'ajaxIdiomas.php?idioma='+idioma, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
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
