<?php
// =============FUNCIONES===================
/**
 * Devuelve una "table" HTML con la palabra que le digas
 *  * @param unknown $palabra La palabra en curso en la
 *  que las letras desconocidas salen con guiones
 * @return string
 */
function pintarPalabra($palabra) {
	$salida = '';
	$EOL = PHP_EOL;
	$salida .= '<table border="1">' . $EOL;
	$salida .= '<tr>' . $EOL;
	for($i = 0; $i < mb_strlen ( $palabra ); $i ++) {
		$letra = mb_substr ( $palabra, $i, 1 );
		$salida .= '<td><input align="center" type="text" size="1" readonly="readonly" value="';
		$salida .= $letra;
		$salida .= '" /></td>' . $EOL;
	}
	$salida .= '</tr>' . $EOL;
	$salida .= '</table>' . $EOL;
	return $salida;
}
// .....................................
/**
 * 
 * @param string $letra la letra a la que se quiere quitar la tilde
 * @return string La letra $letra sin tildes 
 */
function quitaTildes($letra) {
	$sol = $letra;
	switch ($letra) {
		case 'á' :
			$sol = 'a';
			break;
		case 'é' :
			$sol = 'e';
			break;
		case 'í' :
			$sol = 'i';
			break;
		case 'ó' :
			$sol = 'o';
			break;
		case 'ú' :
			$sol = 'u';
			break;
		case 'Á' :
			$sol = 'A';
			break;
		case 'É' :
			$sol = 'E';
			break;
		case 'Í' :
			$sol = 'I';
			break;
		case 'Ó' :
			$sol = 'O';
			break;
		case 'Ú' :
			$sol = 'U';
			break;
	}
	return $sol;
}
// .....................................
/**
 *
 * @param string $letra        	
 * @return string la $letra sin diéresis
 */
function quitaDieresis($letra) {
	$sol = $letra;
	switch ($letra) {
		case 'ü' :
			$sol = 'u';
			break;
		case 'Ü' :
			$sol = 'U';
			break;
	}
	return $sol;
}
// .....................................
/**
 *
 * @param string $letra
 *        	la letra a normalizar
 * @return la letra original en minúscula y sin tildes ni diéresis
 *        
 */
function normaliza($letra) {
	return mb_strtolower ( quitaDieresis ( quitaTildes ( $letra ) ) );
}
// .....................................
/**
 * Elige una palabra al azar de entre las alamcenadas en el array $palabras
 */
function inicializarPalabraOculta() {
	$palabras = [ 
			'Avión',
			'Cañería',
			'Ungüento',
			'Idiazábal' 
	];
	
	return ($palabras [rand ( 0, sizeof ( $palabras ) - 1 )]);
}

// .....................................

/**
 * Crea una palabra con el mismo número de caracteres
 * que la proporcionada pero con el carácter
 * '-' únicamente
 *
 * @return una palabra formada por $numCaractereres guiones
 */
function inicializarPalabraEnCurso($numCaracteres) {
	$sol = '';
	for($i = 0; $i < $numCaracteres; $i ++) {
		$sol .= '-';
	}
	return $sol;
}

// .....................................
/**
 * Si $letra está en $pOrig, ésta se descubre en $pCurso
 *
 * @param string $pOrig
 *        	la palabra original oculta
 * @param unknown $pCurso
 *        	la palabra en curso, semidescubierta
 * @param unknown $letra
 *        	la letra a comprobar
 * @return string
 */
function actualizarPalabraEnCurso($pOrig, $pCurso, $letra) {
	$letra = normaliza ( $letra );
	$sol = '';
	for($i = 0; $i < mb_strlen ( $pCurso ); $i ++) {
		$letraActual = mb_substr ( $pCurso, $i, 1 );
		$sol .= ($letraActual != '-' ? $letraActual : ($letra == normaliza ( mb_substr ( $pOrig, $i, 1 ) ) ? mb_substr ( $pOrig, $i, 1 ) : '-'));
	}
	return $sol;
}
// .....................................
function esta($letra, $palabra) {
	$letra = normaliza ( $letra );
	$sol = false;
	for($i = 0; (! $sol) && $i < mb_strlen ( $palabra ); $i ++) {
		$letraActual = mb_substr ( $palabra, $i, 1 );
		$sol = ($letra == normaliza ( $letraActual ));
	}
	return $sol;
}
// .....................................

// =========COMIENZO SCRIPT=================
mb_internal_encoding ( "UTF-8" );

session_start ();
$letraAProbar = (isset ( $_REQUEST ['letra'] ) ? $_REQUEST ['letra'] : null);
$primeraVez = ($letraAProbar == null);
$fin = false;
$maxFallos = 6;

if ($primeraVez) { // Comienza el juego
	session_unset ();
	$palabraOculta = inicializarPalabraOculta ();
	$_SESSION ['palabraOculta'] = $palabraOculta;
	
	$palabraEnCurso = inicializarPalabraEnCurso ( mb_strlen ( $palabraOculta ) );
	$_SESSION ['palabraEnCurso'] = $palabraEnCurso;
	
	$letrasProbadas = '';
	$_SESSION ['letrasProbadas'] = $letrasProbadas;
	
	$nIntentos = 0;
	$_SESSION ['nIntentos'] = $nIntentos;
	
	$nFallos = 0;
	$_SESSION ['nFallos'] = $nFallos;
	
	$mensaje = 'BIENVENIDO. Para empezar a jugar introduce una letra';
} else { // Juego en curso
	$palabraOculta = $_SESSION ['palabraOculta'];
	$palabraEnCurso = $_SESSION ['palabraEnCurso'];
	$letrasProbadas = $_SESSION ['letrasProbadas'];
	$nIntentos = $_SESSION ['nIntentos'] + 1;
	$_SESSION ['nIntentos'] = $nIntentos;
	$nFallos = $_SESSION ['nFallos'];
	
	if (esta ( $letraAProbar, $letrasProbadas )) { // La letra ya estaba probada
		$mensaje = "La letra $letraAProbar ya la habías introducido antes";
	} else { // La letra NO está probada todavía
		$letrasProbadas .= (($letrasProbadas == '' ? '' : ' ') . normaliza ( $letraAProbar ));
		$_SESSION ['letrasProbadas'] = $letrasProbadas;
		if (esta ( $letraAProbar, $palabraOculta )) { // Acertó con la letra
			$mensaje = "¡¡ACERTASTE!! La letra $letraAProbar pertenece a la palabra";
			$palabraEnCurso = actualizarPalabraEnCurso ( $palabraOculta, $palabraEnCurso, $letraAProbar );
			$_SESSION ['palabraEnCurso'] = $palabraEnCurso;
			if (esta ( '-', $palabraEnCurso )) { // Todavía quedan letras por descubrir
				$mensaje .= '. Introduce otra letra';
			} else { // GANA el juego.
				$fin = true;
				$mensaje .= '<br/> <h1>GANASTE</h1>';
			}
		} else { // Falló. La letra no estaba en la palabra original.
			$nFallos ++;
			$_SESSION ['nFallos'] = $nFallos;
			$mensaje = "Lo siento, la letra $letraAProbar no está en la palabra";
			$fin = ($nFallos == $maxFallos);
			$mensaje .= ($fin ? ". PERDISTE por cometer $maxFallos fallos" : '');
		}
	}
}

// ==========================================
// SALIDA ESTÁNDAR
// ==========================================

header ( 'Content-Type: text/html; charset=UTF-8' );
$EOL = PHP_EOL;

echo <<<SALIDA
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body onload="document.getElementById('idLetra').focus();">
<h4>$mensaje</h4> 
SALIDA;

if (! $fin) {
	echo <<<SALIDA
<form action="ahorcado.php">
<label for="idLetra">Introduce letra: </label>
<input type="text" size="1" id="idLetra" name="letra">
</form>
SALIDA;
} else {
	echo <<<SALIDA
<form action="ahorcado.php">
<input type="submit" value="Nuevo juego">
</form>
SALIDA;
}

echo pintarPalabra ( $palabraEnCurso );

echo <<<SALIDA
<div id="info" style="border: 3px black solid; width: 400px;">
<b>Palabra oculta: </b>$palabraOculta<br/>
<b>Letras probadas: </b>$letrasProbadas<br/>
<b>Número de intentos: </b>$nIntentos <br/>
<b>Número de fallos: </b>($nFallos/$maxFallos)<br/>
</div>
</body>
</html>
SALIDA;
?>



