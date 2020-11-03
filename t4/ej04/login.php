<?php
include ("util.php");
include ('bdEtiquetas.php');

session_start ();

$_SESSION ['idioma'] = isset ( $_REQUEST ['idioma'] ) && $_REQUEST ['idioma'] != '' ? $_REQUEST ['idioma'] : (isset ( $_SESSION ['idioma'] ) && $_SESSION ['idioma'] != '' ? $_SESSION ['idioma'] : 'es');
$idioma = $_SESSION ['idioma'];
$usuario = isset ( $_SESSION ['usuario'] ) ? $_SESSION ['usuario'] : '';

$lUsuario = $BDetiquetas [$idioma] ['user'];
$lPassword = $BDetiquetas [$idioma] ['pwd'];
$lEntrar = $BDetiquetas [$idioma] ['login'];

// SALIDA ESTÁNDAR

echo <<<OUT
<head>
<meta charset="utf-8">
<script>
	var conexion;
	var idioma;
	
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		etiqueta = textoRecibido.split("#");
		
		lUsuario=etiqueta[0];
		lPassword=etiqueta[1];
		lEntrar=etiqueta[2];
		
		document.getElementById("lUsuario").innerHTML=lUsuario;
		document.getElementById("lPassword").innerHTML=lPassword;
		document.getElementById("bEntrar").value=lEntrar;
		document.getElementById("idIdioma").value=idioma;
}
	
	function cambiarIdioma() {
		idioma = document.querySelector('input[name="idioma"]:checked').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'ajaxIdiomasLogin.php?idioma='+idioma, true);
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

pintarBarraIdioma ( $idioma );

echo <<<OUT
<form action="autenticacion.php">

<label for="idUsuario" id="lUsuario">$lUsuario</label>
<input type="text" name="usuario" id="idUsuario" value="$usuario"><br/>
		
<label for="idPassword" id="lPassword">$lPassword</label>
<input type="password" name="password" id="idPassword"><br/>
<input type="hidden" name="idioma" value="$idioma" id="idIdioma">		
<input type="submit" id="bEntrar" value="$lEntrar">
		
</form>		

<h6>Usuarios(contraseñas) válidos: pepe(pp) y ana(a)
</body>
OUT;
?>
