<?php
echo "Introduce n: \n";
fscanf ( STDIN, "%d\n", $n );

echo "Introduce p: \n";
fscanf ( STDIN, "%d\n", $p );

for($i = 0; $i < $n; $i ++) {
	for($j = 0; $j < $p; $j ++) {
		echo $j, ' ';
	}
	echo " // ";
}
?>