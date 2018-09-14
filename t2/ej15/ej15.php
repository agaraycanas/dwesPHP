<?php
function pintarFormulario($usuario="",  $pwd="") {
	echo '<form action="ej15.php">' . PHP_EOL;
	
	echo '<label for="idusuario">Usuario: </label>' . PHP_EOL;
	echo '<input type="text" id="idusuario" name="usuario" value="'.$usuario.'">' . PHP_EOL;
	echo '<br/>';
	
	echo '<label for="idpwd">Contrase&ntilde;a: </label>' . PHP_EOL;
	echo '<input type="password" id="idpwd" name="pwd" value="'.$pwd.'">' . PHP_EOL;
	echo '<br/>';
	
	echo '<input type="submit">';
	
	echo "</form>" . PHP_EOL;
}

// ==============================
function condicionesUsuario($usuario) {
	if ($usuario != '') {
		return true;
	} else {
		return false;
	}
}
// ==============================
function condicionesPwd($pwd) {
	$tamanyo = strlen ( $pwd );
	
	if ($tamanyo >= 6 && $tamanyo <= 12) {
		return true;
	} else {
		return false;
	}
}

// ==============================

if (isset ( $_REQUEST ['usuario'] ) && isset ( $_REQUEST ['pwd'] )) {
	if (! condicionesUsuario ( $_REQUEST ['usuario'] )) {
		echo "El usuario no puede estar vac&iacute;o <br/>" . PHP_EOL;
	}
	
	if (! condicionesPwd ( $_REQUEST ['pwd'] )) {
		echo "La contrase&ntilde;a debe tener entre 6 y 12 caracteres <br/>" . PHP_EOL;
	}
	
	if (condicionesUsuario ( $_REQUEST ['usuario'] ) && condicionesPwd ( $_REQUEST ['pwd'] )) {
		echo "Hola {$_REQUEST ['usuario']}. Tu contrase&ntilde;a es {$_REQUEST ['pwd']}" . PHP_EOL;
	}
	else {
		echo pintarFormulario($_REQUEST ['usuario'],$_REQUEST ['pwd']);
	}
} else {
	pintarFormulario ();
}
?>