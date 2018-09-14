<?php
echo "Introduce n: ";
fscanf ( STDIN, "%d\n", $n );

$carta = ['as','dos','tres','cuatro','cinco','seis','siete','sota','caballo','rey'];

for($i = 0; $i < $n; $i ++) {
	echo $carta[$i%10], ' ';
}
?>