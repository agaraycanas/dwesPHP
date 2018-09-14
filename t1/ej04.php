<?php
echo "Introduce n: ";
fscanf ( STDIN, "%d\n", $n );

$i = 0;

while ( $n != 0 ) {
	$a [$i] = $n;
	$i ++;
	echo "Introduce n: ";
	fscanf ( STDIN, "%d\n", $n );
}

echo "Operación?: ";
fscanf ( STDIN, "%s\n", $operacion );

switch ($operacion) {
	case "sumar" :
		mostrarSuma ( $a );
		break;
	case "multiplicar" :
		mostrarMult ( $a );
		break;
	default :
		echo "Operación no válida";
}

/**
 * Suma todos los elementos del array $a 
 * pasado como parámetro y los muestra por pantalla
 * 
 * @param array $a
 *        	el array que contiene los datos a sumar
 */
function mostrarSuma($a) {
	$acc = 0;
	foreach ($a as $v) {
		$acc += $v;
	}
	echo "La suma vale $acc";
}

/**
 * Multiplica todos los elementos del array $a
 * pasado como parámetro y los muestra por pantalla
 *
 * @param array $a
 *        	el array que contiene los datos a multiplicar
 */
function mostrarMult($a) {
	$acc = 1;
	foreach ($a as $v) {
		$acc *= $v;
	}
	echo "El producto vale $acc";
}
?>