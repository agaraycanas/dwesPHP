<?php
/**
 *
 * @param string $nombre
 * @param array(string=>string) $etiquetas array (k = > v) de name(k) y etiquetas(v) de cada option
 * @param array(string) $seleccionados array (v) de name(v) de pre-seleccionados
 * @param string $tipo multiple o simple
 */
function pintarSelect($nombre, $etiquetas, $seleccionados = [], $tipo = 'simple', $funcJS='#') {
	$salida = '';
	//$salida .= ('<label for="id' . $nombre . '">' . $nombre . '</label>' . PHP_EOL);
	$salida .= ('<select ' . ($tipo == 'multiple' ? 'multiple="multiple"' : '') . ' id="id' . $nombre . '" ' . 'name="' . $nombre . ($tipo == 'multiple' ? '[]' : '') . '" onchange="'.$funcJS.'">' . PHP_EOL)
	;
	foreach ( $etiquetas as $k => $v ) {
		$salida .= ('<option ' . (in_array ( $k, $seleccionados ) ? 'selected="selected"' : '') . ' value="' . $k . '">' . $v . '</option>' . PHP_EOL);
	}
	$salida .= ('</select>' . PHP_EOL);
	return $salida;
}
?>