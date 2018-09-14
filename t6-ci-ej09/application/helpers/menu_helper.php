<?php

function esPadre($menu, $idp) {
	foreach ( $menu as $menu ) {
		if ($menu ['idp'] == $idp) {
			return true;
		}
	}
	return false;
}

function hijos($menu, $idp) {
	$hijos = [ ];
	foreach ( $menu as $candidato ) {
		if ($candidato ['idp'] == $idp) {
			array_push ( $hijos, $candidato );
		}
	}
	return $hijos;
}

function dibujarMenu($menu, $id = 0) {
	$salida = '';
	if (esPadre ( $menu, $id )) {
		$salida .= '<ul' . ($id == 0 ? ' id="navigation"' : '') . '>' . PHP_EOL;
		foreach ( hijos ( $menu, $id ) as $hijo ) {
			$salida .= '<li>' . PHP_EOL;
			$salida .= '<a ';
			$salida .= $hijo ['accion'] != '' ? 'href="' . base_url () . "{$hijo['accion']}\"" : '';
			$salida .= ">{$hijo['nombre']}</a>" . PHP_EOL;
			$salida .= dibujarMenu ( $menu, $hijo ['id'] );
			$salida .= '</li>' . PHP_EOL;
		}
		$salida .= '</ul>' . PHP_EOL;
	}
	return $salida;
}

?>