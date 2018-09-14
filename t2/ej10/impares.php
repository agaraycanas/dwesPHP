<?php
//include ("../ej09/utilHTML.php");
include("../ej09/utilHTML.php");
for($i = 1; $i <= 50; $i ++) {
	if ($i % 2 == 0) {
		echo "$i";
	}
	else {
		echo resaltar($i);
	}
	echo "<br/>" . PHP_EOL;
}
?>