<?php
echo "Introduce n: ";
fscanf ( STDIN, "%d\n", $n );

echo "Introduce línea de texto: ";
fscanf ( STDIN, "%s\n", $linea );

for($i = 1; $i <= $n; $i ++) {
	echo "<h$i> $linea </h$i>" . "\n";
}

for($i = $n - 1; $i >= 1; $i --) {
	echo "<h$i> $linea </h$i>" . "\n";
}
?>