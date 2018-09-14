<?php
function sigCaracter($c) {
	switch ($c) {
		case "+" :
			$sol = "-";
			break;
		case "-" :
			$sol = ".";
			break;
		case "." :
			$sol = "+";
			break;
	}
	return $sol;
}

echo "Introduce n: \n";
fscanf ( STDIN, "%d\n", $n );

$c = "+";

for($i = $n; $i >= 1; $i --) {
	for($j = 1; $j <= $i; $j ++) {
		echo $c;
		$c = sigCaracter ( $c );
	}
	echo "\n";
}
?>