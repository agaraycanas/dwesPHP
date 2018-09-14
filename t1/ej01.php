<?php
//include ("C:\Users\Alberto\workspacePHP\dwesPHP\php5FIX.php");
echo "Introduce n: \n";
fscanf ( STDIN, "%d\n", $n );
$minimo = $n;
$maximo = $n;

while ( $n != 0 ) {
	if ($n > $maximo) {
		$maximo = $n;
	}
	if ($n < $minimo) {
		$minimo = $n;
	}
	echo "Introduce n: \n";
	fscanf ( STDIN, "%d\n", $n );
}

if ($maximo == 0) {
	echo "Introduce un número al menos: ";
} else {
	echo "(Max/Min) $maximo/$minimo";
}
?>