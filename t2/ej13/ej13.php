<?php
include ("../ej09/utilHTML.php");
echo "<form>";

echo 
pintarSelect(
	'deporte',
	[	
	'T'=>'Tenis', 
	'F'=>'Fútbol',
	'B'=>'Baloncesto',
	'P'=>'Petanca'
	],
	['T','B'],
	'multiple'
	);

echo '<input type="submit">'.PHP_EOL;
echo "</form>";

?>