<?php
include ("bdEtiquetas.php");
include ("util.php");

session_start ();

$idioma = isset ( $_SESSION ['idioma'] ) ? $_SESSION ['idioma'] : null;
$introNum = $BDetiquetas [$idioma] ['introNum'];
$play = $BDetiquetas [$idioma] ['play'];

echo <<<OUT
<head>
<meta charset="utf-8">
<script>
	var conexion;
	var idioma;
	var numAzar;
	var miNumero;

	
	// ETIQUETAS
		var win;
		var introNum;
		var play;
		var yourNumber;
		var myNumber;
		var lower;
		var higher; 
		var back; 
		
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		etiqueta = textoRecibido.split("#");
		
		win=etiqueta[0];
		introNum=etiqueta[1];
		play=etiqueta[2];
		yourNumber=etiqueta[3];
		myNumber=etiqueta[4];
		lower=etiqueta[5];
		higher=etiqueta[6];
		back=etiqueta[7];
		
		document.getElementById("lIntroNum").innerHTML=introNum;
		document.getElementById("bPlay").value=play;
		document.getElementById("idIdioma").value=idioma;
		document.getElementById("idBack").value=back;
		mensaje=document.getElementById("idMensaje").innerHTML;
		if (mensaje!='') {
			mostrarMensaje();
		}
	}
	
	function cambiarIdioma() {
		idioma = document.querySelector('input[name="idioma"]:checked').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'ajaxIdiomasJuego.php?idioma='+idioma, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
		
	function mostrarMensaje() {
		salida = '';
		salida += (myNumber +   ": " + numAzar  + "<br/>");
		salida += (yourNumber + ": " + miNumero + "<br/>");
		
		if (miNumero==numAzar) {
			salida += win;
		}
		else if (miNumero<numAzar) {
			salida += lower;
		}
		else {
			salida += higher;
		}
		document.getElementById("idMensaje").innerHTML=salida;
		
	}
		
	function jugar() {
		numAzar = Math.floor((Math.random() * 10) + 1);
		miNumero= document.getElementById("idNum").value;
		mostrarMensaje();
	}
		
	
</script>
</head>
<body onload="cambiarIdioma()">
OUT;

pintarBarraIdioma ( $idioma );

echo <<<OUT
<label for="idNum" id="lIntroNum">$introNum</label>
<input type="text" id="idNum" onsubmit="jugar()">
<br />
<input type="button" id="bPlay" value="$play" onClick="jugar()">
<div id="idMensaje"></div>
OUT;

pintarBotonVolver ( $idioma );

echo "</body>";
?>