<?php

$num = [
		'nombre' => ['uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez'],
		'romano' => ['i','ii','iii','iv','v','vi','vii','viii','ix','x']
];

do {
	echo "Introduce N: ";
	fscanf(STDIN,"%d\n",$n);
} while ($n<1 || $n>10);

do {
	echo "Introduce formato: ";
	fscanf(STDIN,"%s\n",$formato);
} while (!array_key_exists($formato,$num));

// Versión con foreach
foreach ( $num [$formato] as $numNombre ) {
	echo $numNombre, ($numNombre == end($num[$formato])) ? '' : ', ';
}
 
?>