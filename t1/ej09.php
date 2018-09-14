<?php
echo "Introduce N: ";
fscanf(STDIN,"%d\n",$n);

echo "Introduce formato: ";
fscanf(STDIN,"%s\n",$formato);

$num = [
		'nombre' => ['uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez'],
		'romano' => ['i','ii','iii','iv','v','vi','vii','viii','ix','x']
];


for ($i = 0; $i < $n; $i ++) {
	echo $num[$formato][$i];
	echo ($i==$n-1)?'':', '; //quita la última coma
}


?>