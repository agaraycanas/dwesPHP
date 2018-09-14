<?php
include ('util.php');
echo <<<OUT
<html>
<head>
<meta charset="utf-8">
<script>
	var conexion;
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		document.getElementById("idProvincias").innerHTML=textoRecibido;
	}
	
	function cambiarccaa() {
		nombre = document.getElementById('idccaa').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'ajaxProvincias.php?ca='+nombre, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}	

function cambiarprovincias() {
	// NADA POR EL MOMENTO
}

</script>
		
</head>
<body>
<h1>Comunidades autónomas</h1>
OUT;

$comunidades = array_keys ( $BDccaa );
pintarSelect ( 'ccaa', $comunidades, [ 
		'0' 
], 'simple' );
echo '<br/>', PHP_EOL;
echo '<div id="idProvincias">' . PHP_EOL;
pintarSelect ( 'provincias', $BDccaa [$comunidades ['0']], [ 
		'0' 
], 'simple' );
echo '</div>';
echo '<br/>', PHP_EOL;

echo <<<OUT
<h3>Escoge una comunidad autónoma</h3>
Observa el cambio de provincias vía AJAX
</body>
</html>
OUT;
?>

