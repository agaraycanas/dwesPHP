<?php

function esAJAX() {
	return isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest';
}

function getResultadoConsulta($filtro, $cadena) {
	require_once 'bd.php';
	$resultado = [ ];
	$cont = 0;
	foreach ( $bd as $fila ) {
		if ($cadena != null) {
			foreach ( $fila as $k => $v ) {
				
				if ($k == $filtro && strpos ( strtolower ( $v ), strtolower ( $cadena ) ) !== false) {
					$resultado [$cont ++] = $fila;
				}
			}
		} else {
			$resultado [$cont ++] = $fila;
		}
	}
	return $resultado;
}

function generarHTML($filas, $cabeceraTabla = [], $marcaTable = true) {
	$salida = '';
	
	if ($filas != [ ]) {
		// APERTURA MARCA TABLE
		if ($marcaTable) {
			$salida .= '<table>' . PHP_EOL;
		}
		
		// ENCABEZADO (<th>)
		if ($cabeceraTabla == [ ]) {
			$columnas = array_keys ( $filas [0] );
		} else {
			$columnas = $cabeceraTabla;
		}
		$salida .= '<tr>' . PHP_EOL;
		foreach ( $columnas as $columna ) {
			$titulo = ucfirst ( $columna );
			$salida .= "<th>$titulo</th>" . PHP_EOL;
		}
		$salida .= '</tr>' . PHP_EOL;
		
		// FILAS (<td>)
		foreach ( $filas as $fila ) {
			$salida .= '<tr>' . PHP_EOL;
			
			foreach ( $fila as $k => $v ) {
				$salida .= "<td>$v</td>" . PHP_EOL;
			}
			$salida .= '</tr>' . PHP_EOL;
		}
		
		// FIN de MARCA TABLA
		if ($marcaTable) {
			$salida .= '</table>';
		}
	} else {
		$salida = '<h4>No hay ninguna coincidencia</h4>';
	}
	
	return $salida;
}

function generarXML($filas, $cabeceraTabla = []) {
	$salida = '<datos>' . PHP_EOL . PHP_EOL;
	
	if ($filas != [ ]) {
		
		// ENCABEZADO (<th>)
		if ($cabeceraTabla == [ ]) {
			$columnas = array_keys ( $filas [0] );
		} else {
			$columnas = $cabeceraTabla;
		}
		$salida .= '<cabecera>' . PHP_EOL;
		foreach ( $columnas as $columna ) {
			$titulo = ucfirst ( $columna );
			$salida .= "<dato>$titulo</dato>" . PHP_EOL;
		}
		$salida .= '</cabecera>' . PHP_EOL.PHP_EOL;
		
		// FILAS (<td>)
		foreach ( $filas as $fila ) {
			$salida .= '<fila>' . PHP_EOL;
			
			foreach ( $fila as $k => $v ) {
				$salida .= "<dato>$v</dato>" . PHP_EOL;
			}
			$salida .= '</fila>' . PHP_EOL . PHP_EOL;
		}
		
		$salida .= PHP_EOL;
	}
	
	$salida .= '</datos>';
	
	return $salida;
}

// ===================================================
// ==================== MAIN =========================
// ===================================================

if (! esAJAX ()) {
	echo '<h1>S&oacute peticiones AJAX </h1>';
} else {
	 echo generarHTML ( getResultadoConsulta ( $_REQUEST ['filtro'], $_REQUEST ['palabra'] ) );
	//echo generarXML ( getResultadoConsulta ( $_REQUEST ['filtro'], $_REQUEST ['palabra'] ) );
}
?>